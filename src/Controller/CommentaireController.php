<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\CommentaireRepository;
use App\Repository\VoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/forum")
 */

class CommentaireController extends AbstractController
{
    /**
     * @Route("/{idpublication}/{idcommentaire}/modif", name="app_commentaire_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Commentaire $commentaire, CommentaireRepository $commentaireRepository, VoteRepository $vr): Response
    {
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaireRepository->add($commentaire);
            return $this->redirectToRoute('app_publication_show', [
                'idpublication' => $commentaire->getIdpublication()->getIdpublication()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commentaire/edit.html.twig', [
            'p' => $commentaire->getIdpublication(),
            'nbrC' => $commentaireRepository->findCommentCountByPost($commentaire->getIdpublication()->getIdpublication()),
            'nbrV' => $vr->findVoteCountByPost($commentaire->getIdpublication()->getIdpublication()),
            'commentaire' => $commentaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idcommentaire}", name="app_commentaire_delete", methods={"POST"})
     */
    public function delete(Request $request, Commentaire $commentaire, CommentaireRepository $cr): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commentaire->getIdcommentaire(), $request->request->get('_token'))) {
            $cr->remove($commentaire);
        }
        return $this->redirectToRoute('app_publication_show', [
            'idpublication' => $commentaire->getIdpublication()->getIdpublication(),
        ], Response::HTTP_SEE_OTHER);
    }

}
