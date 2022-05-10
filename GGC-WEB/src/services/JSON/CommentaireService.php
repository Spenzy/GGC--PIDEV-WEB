<?php

namespace App\services\JSON;

use App\Entity\Commentaire;
use App\Entity\Publication;
use App\Repository\ClientRepository;
use App\Repository\CommentaireRepository;
use App\Repository\PublicationRepository;
use App\Repository\VoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @Route("/JSON/commentaire")
 */
class CommentaireService extends AbstractController
{
    /**
     * @Route("/get/{id}", name="GetCommentaire")
     * @throws ExceptionInterface
     */
    public function getCommentaire(Request $request, $id,NormalizerInterface $normalizer,
                                   CommentaireRepository $commentaireRepo): Response
    {
        $rs = $commentaireRepo->findByPost($id);

        $commentaires = array();
        foreach ($rs as $c) {
            $commentaire = $this->objectToArray($c);
            $commentaire["idpublication"] = $c->getIdPublication()->getIdPublication();
            $commentaire["idclient"] = $c->getIdclient()->getIdClient()->getIdPersonne();
            $commentaire["nomclient"] = $c->getIdclient()->getIdClient()->getNom();

            $commentaires[] = $commentaire;
        }

        $jsonContent = $normalizer->normalize($commentaires, 'json', ['groups' => 'post: read']);

        return new Response (json_encode($jsonContent));
    }

    /**
     * @Route("/new", name="AddCommentaire")
     */
    public function new(Request $request, NormalizerInterface $Normalizer,CommentaireRepository $commentaireRepo,
                        PublicationRepository $publicationRepo, ClientRepository $clientRepo): Response
    {
        $commentaire = new Commentaire();
        $parameters = json_decode($request->getContent(), true);

        $commentaire->setDescription($parameters['description']);
        $commentaire->setDate(new \DateTime('today'));
        $commentaire->setIdclient($clientRepo->find($parameters['idclient']));
        $commentaire->setIdpublication($publicationRepo->find($parameters['idpublication']));

        $commentaireRepo->add($commentaire);

        $c = $this->objectToArray($commentaire);
        $c["idpublication"] = $commentaire->getIdPublication()->getIdPublication();
        $c["idclient"] = $commentaire->getIdclient()->getIdClient()->getIdPersonne();
        $c["nomclient"] = $commentaire->getIdclient()->getIdClient()->getNom();

        $jsonContent = $Normalizer->normalize($c, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }

    /**
     * @Route("/edit/{id}", name="EditCommentaire")
     */
    public function edit(Request $request,int $id, NormalizerInterface $Normalizer,
                         CommentaireRepository $commentaireRepo): Response
    {
        $commentaire = $commentaireRepo->find($id);
        $parameters = json_decode($request->getContent(), true);

        $commentaire->setDescription($parameters['description']);

        $commentaireRepo->add($commentaire);

        $c = $this->objectToArray($commentaire);
        $c["idpublication"] = $commentaire->getIdPublication()->getIdPublication();
        $c["idclient"] = $commentaire->getIdclient()->getIdClient()->getIdPersonne();
        $c["nomclient"] = $commentaire->getIdclient()->getIdClient()->getNom();

        $jsonContent = $Normalizer->normalize($c, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }

    /**
     *  @Route("/delete/{id}", name="deleteCommentaire")
     */
    public function deleteCommentaire ($id,CommentaireRepository $commentaireRepo)
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