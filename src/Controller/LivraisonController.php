<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Livraison;
use App\Entity\Livreur;
use App\Entity\Client;
use App\Form\LivraisonType;
use App\Repository\CommandeRepository;
use App\Repository\LivraisonRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/livraison")
 */
class LivraisonController extends AbstractController
{
    /**
     * @Route("/", name="app_livraison_index", methods={"GET"})
     */
    public function index(LivraisonRepository $livraisonRepository): Response
    {
        return $this->render('livraison/index.html.twig', [
            'livraisons' => $livraisonRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_livraison_new", methods={"GET", "POST"})
     */
    public function new(Request $request, LivraisonRepository $livraisonRepository,\Swift_Mailer $mailer): Response
    {
        $livraison = new Livraison();
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livraisonRepository->add($livraison);
            $this->MailsendAffectation($mailer,$livraison->getIdcommande()->getIdclient(),$livraison->getIdlivreur(),$livraison->getIdcommande(),$livraison);
            return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('livraison/new.html.twig', [
            'livraison' => $livraison,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idcommande}", name="app_livraison_show", methods={"GET"})
     */
    public function show(Livraison $livraison): Response
    {
        return $this->render('livraison/show.html.twig', [
            'livraison' => $livraison,
        ]);
    }

    /**
     * @Route("/{idcommande}/edit", name="app_livraison_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Livraison $livraison, LivraisonRepository $livraisonRepository): Response
    {
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livraisonRepository->add($livraison);
            return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('livraison/edit.html.twig', [
            'livraison' => $livraison,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idcommande}", name="app_livraison_delete", methods={"POST"})
     */
    public function delete(Request $request, Livraison $livraison, LivraisonRepository $livraisonRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$livraison->getIdcommande(), $request->request->get('_token'))) {
            $livraisonRepository->remove($livraison);
        }

        return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);
    }

    public function MailsendAffectation(\Swift_Mailer $mailer,Client $client,Livreur $livreur,Commande $commande,Livraison $livraison)
    {


        $message = (new \Swift_Message('Email Livraison'))
            ->setFrom('gamergeekscommunity@gmail.com')
            ->setTo($client->getIdclient()->getEmail())
            ->setBody(
                $this->renderView(
                    'emails/affectation.html.twig', compact('client','livreur','commande','livraison')
                ),
                'text/html'
            )
        ;
        $mailer->send($message);



        return $this->redirectToRoute('app_produit_shop', [], Response::HTTP_SEE_OTHER);
    }

    public function MailsendExcuse(\Swift_Mailer $mailer,Client $client,Livreur $livreur,Commande $commande)
    {


        $message = (new \Swift_Message('Email Excuse'))
            ->setFrom('gamergeekscommunity@gmail.com')
            ->setTo($client->getIdclient()->getEmail())
            ->setBody(
                $this->renderView(
                    'emails/excuse.html.twig', compact('client','livreur','commande')
                ),
                'text/html'
            )
        ;
        $mailer->send($message);



        return $this->redirectToRoute('app_produit_shop', [], Response::HTTP_SEE_OTHER);
    }
    /**
     * @Route("/{idcommande}/excuse", name="app_livraison_excuse", methods={"POST","GET"})
     */
    public function excuse(LivraisonRepository $livraisonRepository,CommandeRepository $commandeRepository,\Swift_Mailer $mailer): Response
    {
        $commandes = $commandeRepository->findAll();
        foreach ($commandes as $commande) {
            $livraison = $livraisonRepository->find($commande->getIdcommande());
            $sysdate = new \DateTime('today');
            if ($livraison!=null && $livraison->getDateheure() < $sysdate && $commande->getLivree()==false) {


                //remise commande
                $commande->setPrix($commande->getPrix() / 2);
                $commandeRepository->add($commande);

                //mail excuse
                $livreur=$livraison->getIdlivreur();
                $client=$commande->getIdclient();
                $this->MailsendExcuse($mailer,$client,$livreur,$commande);
            }

        }


        return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);
    }

}
