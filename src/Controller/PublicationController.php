<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Publication;
use App\Form\CommentaireType;
use App\Form\PublicationType;
use App\Repository\ClientRepository;
use App\Repository\CommentaireRepository;
use App\Repository\PublicationRepository;
use App\Repository\VoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/forum")
 */
class PublicationController extends AbstractController
{

    /**
     * @Route("/", name="app_publication_index", methods={"GET", "POST"})
     */
    public function index(Request $request, PublicationRepository $publicationRepository, ClientRepository $clientr, CommentaireRepository $cr, VoteRepository $vr): Response
    {
        $userid = 1;
        $rs = $publicationRepository->findAll();
        $publications = array();
        foreach ($rs as $p) {
            $publications[] = array(
                $p,
                $cr->findCommentCountByPost($p->getIdpublication()),
                $vr->findVoteCountByPost($p->getIdpublication())
            );
        }

        $publication = new Publication();
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $publication->setDate(new \DateTime('today'));
            $publication->setArchive(false);
            $publication->setIdclient($clientr->find($userid));
            $publicationRepository->add($publication);
            return $this->redirectToRoute('app_publication_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/home.html.twig', [
            'publications' => $publications,
            'p' => $publication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idpublication}/activity", name="app_publication_show", methods={"GET", "POST"})
     */
    public function show(Request $request, Publication $publication,
                         ClientRepository $clientr, PublicationRepository $pr,
                         CommentaireRepository $cr, VoteRepository $vr): Response
    {
        $userid = 1; //to be changed later

        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $commentaire->setDate(new \DateTime('today'));
            $commentaire->setIdpublication($pr->find($publication->getIdpublication()));
            $commentaire->setIdclient($clientr->find($userid));
            echo"ola mi amor";
            $cr->add($commentaire);
            echo"oops";
            return $this->redirectToRoute('app_publication_show', [
                'idpublication' => $publication->getIdpublication(),
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('publication/show.html.twig', [
            'uid' => $userid,
            'p' => $publication,
            'nbrC' => $cr->findCommentCountByPost($publication->getIdpublication()),
            'nbrV' => $vr->findVoteCountByPost($publication->getIdpublication()),
            'commentaires' => $cr->findByPost($publication->getIdpublication()),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idpublication}/edit", name="app_publication_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Publication $publication, PublicationRepository $publicationRepository, CommentaireRepository $cr, VoteRepository $vr): Response
    {
        $userid = 1; //to be changed later
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $publicationRepository->add($publication);
            return $this->redirectToRoute('app_publication_show', [
                'idpublication' => $publication->getIdpublication()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('publication/show.html.twig', [
            'uid' => $userid,
            'p' => $publication,
            'nbrC' => $cr->findCommentCountByPost($publication->getIdpublication()),
            'nbrV' => $vr->findVoteCountByPost($publication->getIdpublication()),
            'commentaires' => $cr->findByPost($publication->getIdpublication()),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idpublication}", name="app_publication_delete", methods={"POST"})
     */
    public function delete(Request $request, Publication $publication, PublicationRepository $publicationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $publication->getIdpublication(), $request->request->get('_token'))) {
            $publicationRepository->remove($publication);
        }
        return $this->redirectToRoute('app_publication_index', [], Response::HTTP_SEE_OTHER);
    }
}
