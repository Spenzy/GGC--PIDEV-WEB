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
     * @Route("/getAll", name="AllPosts")
     * @throws ExceptionInterface
     */
    public function AllPosts(NormalizerInterface $normalizer, PublicationRepository $publicationRepository,
                             ClientRepository $clientr, CommentaireRepository $cr, VoteRepository $vr): Response
    {
        $rs = $publicationRepository->findAll();
        $publications = array();
        foreach ($rs as $p) {

            $pub = (array)$p;
            foreach ($pub as $k => $v) {
                $newkey = substr($k, 24);
                $pub[$newkey] = $pub[$k];
                unset($pub[$k]);
            }

            $publications[] = array(
                $pub,
                $cr->findCommentCountByPost($p->getIdpublication()),
                $vr->findVoteCountByPost($p->getIdpublication())
            );
        }

        $jsonContent = $normalizer->normalize($publications, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }

    /**
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
     */
    public function new(Request $request, NormalizerInterface $Normalizer,PublicationRepository $publiRepo, ClientRepository $clientRepo): Response
    {
        $publication = new Publication();
        $publication->setDescription($request->get('description'));
        $publication->setArchive(false);
        $publication->setDate($request->get('date'));
        $publication->setObject($request->get('object'));
        $publication->setIdclient($clientRepo->find($request->get('idclient')));
        $publiRepo->add($publication);

        $pub = (array)$publication;
        foreach ($pub as $k => $v) {
            $newkey = substr($k, 24);
            $pub[$newkey] = $pub[$k];
            unset($pub[$k]);
        }

        $jsonContent = $Normalizer->normalize($pub, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($pub));
    }
    /**
     *  @Route("/updateStudentJSON/{id}", name="updateStudentJSON")
     */
        public function edit (Request $request, NormalizerInterface $Normalizer, $id, PublicationRepository $publiRepo, ClientRepository $clientRepo)
    {
        $publication = $publiRepo->find($id);

        $publication->setDescription($request->get('description'));
        $publication->setArchive(false);
        $publication->setDate($request->get('date'));
        $publication->setObject($request->get('object'));
        $publication->setIdclient($clientRepo->find($request->get('idclient')));
        $publiRepo->add($publication);

        $jsonContent = $Normalizer->normalize($publication, 'json', ['groups' => 'post: read']);
        return new Response ("Information updated successfully".json_encode($jsonContent));
    }

}
