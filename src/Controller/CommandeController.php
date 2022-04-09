<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Commande;
use App\Entity\Lignecommande;
use App\Form\CommandeType;
use App\Form\LignecommandeType;
use App\Repository\ClientRepository;
use App\Repository\CommandeRepository;
use App\Repository\LignecommandeRepository;
use App\Repository\ProduitRepository;
use App\services\PanierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/commande")
 */
class CommandeController extends AbstractController
{
    /**
     * @Route("/", name="app_commande_index", methods={"GET"})
     */
    public function index(CommandeRepository $commandeRepository): Response
    {
        return $this->render('commande/index.html.twig', [
            'commandes' => $commandeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_commande_new", methods={"GET", "POST"})
     */
    public function new(Request $request,LignecommandeRepository $lignecommandeRepository, CommandeRepository $commandeRepository,ProduitRepository $produitRepository,PanierService $cartservice ,SessionInterface $session): Response
    {
        $commande = new Commande();

        //ajouter le prix total dans la commande à partir de la session
        $dataPanier=$cartservice->getFullCart();
        $total=$cartservice->getTotal();

        $commande->setPrix($total);

        $client=$this->getDoctrine()->getRepository(Client::class)->find(111);
        $commande->setIdclient($client);

        $commande->setLivree(false);
        $commande->setDatecommande(new \DateTime('today'));

        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandeRepository->add($commande);
            $commande=$form->getData();


            //appel ajout des lignes commandes
            foreach($dataPanier as $item){


                $id = $item["produit"];
                $quantite = $item["quantite"];

                $ligne=new Lignecommande();
                $ligne->setIdcommande($commande);


                $product = $produitRepository->find($id);


                $ligne->setIdproduit($product);
                $ligne->setQuantite($quantite);
                $ligne->setPrix($product->getPrix()*$quantite);


                $lignecommandeRepository->add($ligne);
            }
            $session->remove("panier");

            return $this->redirectToRoute('app_produit_shop', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commande/new.html.twig', [
            'commande' => $commande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show", name="app_commande_show", methods={"GET"})
     */
    public function show(CommandeRepository $commandeRepository,ClientRepository $clientRepository): Response
    {
        $uid=111;
        $commandes=$commandeRepository->afficheCommandesClients($uid);
        return $this->render('commande/show.html.twig', [
            'commandes' => $commandes,
        ]);
    }

    /**
     * @Route("/{idcommande}/edit", name="app_commande_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Commande $commande, CommandeRepository $commandeRepository): Response
    {
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandeRepository->add($commande);
            return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commande/edit.html.twig', [
            'commande' => $commande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idcommande}", name="app_commande_delete", methods={"POST"})
     */
    public function delete(Request $request, Commande $commande, CommandeRepository $commandeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commande->getIdcommande(), $request->request->get('_token'))) {
            $commandeRepository->remove($commande);
        }

        return $this->redirectToRoute('app_commande_show', [], Response::HTTP_SEE_OTHER);
    }
}
