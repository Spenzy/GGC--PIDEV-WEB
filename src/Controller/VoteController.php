<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Entity\Vote;
use App\Repository\ClientRepository;
use App\Repository\PublicationRepository;
use App\Repository\VoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/forum")
 */
class VoteController extends AbstractController
{

    public function vote(string $type,int $idpublication,SessionInterface $session,  VoteRepository $voteRepository,ClientRepository $repC, PublicationRepository $vr)
    {
        $userid=$session->get("user_id");

        $vote=$voteRepository->findVoteByPublication($idpublication, $userid);
        if($vote == null) {
            //ajouter le vote tel qu'il est
            $v = new Vote();
            $v->setIdpublication($vr->find($idpublication));
            $v->setIdclient($repC->find($userid));
            $v->setType($type);
            $voteRepository->add($v);
        } elseif($type != $vote->getType()){
            //modification
            $vote->setType($type);
            $voteRepository->add($vote);
        }else {
            //suppression
            $voteRepository->remove($vote);
        }
    }

    /**
     * @Route("/{idpublication}/upvote", name="app_vote_up", methods={"GET","POST"})
     */
    public function upvote(int $idpublication, VoteRepository $voteRepository,ClientRepository $repC, PublicationRepository $vr): Response
    {
        $type = "UP";
        $this->vote($type, $idpublication,$voteRepository,$repC, $vr);

        return $this->redirectToRoute('app_publication_show', [
            'idpublication' => $idpublication
        ], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/{idpublication}/downvote", name="app_vote_down", methods={"GET","POST"})
     */
    public function downvote(int $idpublication, VoteRepository $voteRepository,ClientRepository $repC, PublicationRepository $vr): Response
    {
        $type = "DOWN";
        $this->vote($type, $idpublication,$voteRepository,$repC, $vr);

        return $this->redirectToRoute('app_publication_show', [
            'idpublication' => $idpublication
        ], Response::HTTP_SEE_OTHER);
    }


}
