<?php

namespace App\Controller;

use App\Entity\Vote;
use App\Form\VoteType;
use App\Repository\VoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vote")
 */
class VoteController extends AbstractController
{
    public function vote(Request $request, Vote $vote, VoteRepository $voteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vote->getIdclient(), $request->request->get('_token'))) {
            $voteRepository->remove($vote);
        }

        return $this->redirectToRoute('app_vote_index', [], Response::HTTP_SEE_OTHER);
    }
}
