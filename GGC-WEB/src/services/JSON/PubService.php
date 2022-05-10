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
use Symfony\Component\HttpFoundation\JsonResponse;
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
<<<<<<< HEAD
     * @Route("/get/{id}", name="getPub")
     * @throws ExceptionInterface
     */
    public function getPub(Request $request, $id, PublicationRepository $publicationRepository, NormalizerInterface $normalizer)
    {
        $pub = $publicationRepository->find($id);
        $publication = (array)$pub;
        foreach ($publication as $k => $v) {
            $newkey = substr($k, 24);
            $publication[$newkey] = $publication[$k];
            unset($publication[$k]);
        }

        $jsonContent = $normalizer->normalize($publication, 'json', ['groups' => 'post: read']);

        return new Response (json_encode($jsonContent));
    }

    /**
     * @Route("/new", name="addStudentJSON")
=======
     * @Route("/new", name="AddPost")
>>>>>>> zied-mobile
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
<<<<<<< HEAD
     *  @Route("/updateStudentJSON/{id}", name="updateStudentJSON")
=======
     *  @Route("/edit/{id}", name="EditPost")
>>>>>>> zied-mobile
     */
    public function edit (Request $request, NormalizerInterface $Normalizer, $id, PublicationRepository $publiRepo)
    {
        $publication = $publiRepo->find($id);

        $parameters = json_decode($request->getContent(), true);

        $publication->setDescription($parameters['description']);
        $publication->setObject($parameters['object']);

        $publiRepo->add($publication);

        $jsonContent = $Normalizer->normalize($publication, 'json', ['groups' => 'post: read']);
<<<<<<< HEAD
        return new Response ("Information updated successfully".json_encode($jsonContent));
    }

}
=======
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

}
>>>>>>> zied-mobile
