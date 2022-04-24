<?php

namespace App\Controller;

use App\Entity\Lignecommande;
use App\Form\LignecommandeType;
use App\Repository\LignecommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lignecommande")
 */
class LignecommandeController extends AbstractController
{

    public function new(Request $request, LignecommandeRepository $lignecommandeRepository, Lignecommande $lignecommande)
    {
        $form = $this->createForm(LignecommandeType::class, $lignecommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lignecommandeRepository->add($lignecommande);
        }
    }

    /**
     * @Route("/{idcommande}", name="app_lignecommande_show", methods={"GET"})
     */
    public function show(int $idcommande,LignecommandeRepository $lignecommandeRepository): Response
    {
        $lignes=$lignecommandeRepository->findCommande($idcommande);
        return $this->render('lignecommande/show.html.twig', [
            'lignes' => $lignes,
        ]);
    }

}
