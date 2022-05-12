<?php

namespace App\services\JSON;

use App\Entity\Publication;
use App\Form\CommentaireType;
use App\Form\PublicationType;
use App\Repository\ClientRepository;
use App\Repository\CommentaireRepository;
use App\Repository\PublicationRepository;
use App\Repository\VoteRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/JSON/forum")
 */
class PubService extends AbstractController
{

    /**
     * @Route("/getAll", name="AllPublication")
     * @throws ExceptionInterface
     */
    public function allPublication(NormalizerInterface $normalizer, PublicationRepository $publicationRepository,
                             CommentaireRepository $cr, VoteRepository $vr): Response
    {
        $rs = $publicationRepository->findAll();
        $publications = array();
        foreach ($rs as $p) {

            $pub = $this->objectToArray($p);
            $pub["idclient"] = $p->getIdClient()->getIdClient()->getIdPersonne();
            $pub["nomclient"] = $p->getIdClient()->getIdClient()->getNom();
            $pub["nbrVote"] = $vr->findVoteCountByPost($p->getIdpublication());
            $pub["nbrCommentaire"] = $cr->findCommentCountByPost($p->getIdpublication());

            $publications[] = $pub;
        }

        $jsonContent = $normalizer->normalize($publications, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }

    /**
     * @Route("/new", name="AddPost")
     */
    public function new(Request $request, NormalizerInterface $Normalizer,PublicationRepository $publiRepo, ClientRepository $clientRepo): Response
    {
        $publication = new Publication();
        $parameters = json_decode($request->getContent(), true);

        $publication->setDescription($parameters['description']);
        $publication->setArchive(false);
        $publication->setDate(new \DateTime('today'));
        $publication->setObject($parameters['object']);
        $publication->setIdclient($clientRepo->find($parameters['idclient']));

        $publiRepo->add($publication);

        $publication = $this->objectToArray($publication);

        $jsonContent = $Normalizer->normalize($publication, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }

    /**
     *  @Route("/edit/{id}", name="EditPost")
     */
    public function edit (Request $request, NormalizerInterface $Normalizer, $id, PublicationRepository $publiRepo)
    {
        $publication = $publiRepo->find($id);

        $parameters = json_decode($request->getContent(), true);

        $publication->setDescription($parameters['description']);
        $publication->setObject($parameters['object']);

        $publiRepo->add($publication);

        $jsonContent = $Normalizer->normalize($publication, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }

    /**
     *  @Route("/delete/{id}", name="DeletePublication")
     */
    public function deletePublication ($id,PublicationRepository $commentaireRepo)
    {
        $commentaire = $commentaireRepo->find($id);
        $commentaireRepo->remove($commentaire);

        return new Response ("Livraison supprime avec succes");
    }

    public function objectToArray($publication): array
    {
        $pub = (array)$publication;
        foreach ($pub as $k => $v) {
            $newkey = substr($k, 24);
            $pub[$newkey] = $pub[$k];
            unset($pub[$k]);
        }
        return $pub;
    }


    /**
     *  @Route("/archiver/{id}", name="ArchiverPost")
     */
    public function archiver (Request $request,MailerInterface $mailer, NormalizerInterface $Normalizer, $id, PublicationRepository $publiRepo)
    {
        $publication = $publiRepo->find($id);

        $parameters = json_decode($request->getContent(), true);

        if($publication->getArchive()==true){
            $publication->setArchive(false);
            mail("Désarchivé", $publication, $mailer);
        }else{
            mail("Archivé", $publication, $mailer);
            $publication->setArchive(true);
        }

        $publiRepo->add($publication);

        $jsonContent = $Normalizer->normalize($publication, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }

    public function mail(string $etat, Publication $publication, MailerInterface $mailer)
    {
        $email = (new TemplatedEmail())
            ->from('gamergeekscommunity@gmail.com')
            ->to($publication->getIdclient()->getIdclient()->getEmail())
            ->subject('Archivage publication!')
            ->embedFromPath('img/LogoGGC.png', 'logo')
            ->htmlTemplate('emails/archivemail.html.twig')
            ->context([
                'p' => $publication,
                'date' => new \DateTime('today'),
                'archive' => $etat
            ]);

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            var_dump($e->getMessage());
        }
    }

}
