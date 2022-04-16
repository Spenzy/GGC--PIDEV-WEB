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
use Dompdf\Dompdf;
use Dompdf\Options;

use Knp\Component\Pager\PaginatorInterface;
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
    public function new(\Swift_Mailer $mailer,Request $request,LignecommandeRepository $lignecommandeRepository, CommandeRepository $commandeRepository,ProduitRepository $produitRepository,PanierService $cartservice ,SessionInterface $session): Response
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
            $this->PdfCommandeRecu($commande,$session,$produitRepository);
            $session->remove("panier");

            return $this->redirectToRoute('app_produit_shop', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commande/new.html.twig', [
            'commande' => $commande,
            'form' => $form->createView(),
        ]);
    }

    public function PdfCommandeRecu(Commande $commande,SessionInterface $session,ProduitRepository $productsRepository)
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
       $pdfOptions->set('isHtml5ParserEnabled' , true);
       $pdfOptions->set( 'isRemoteEnabled' , true);

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        $panier = $session->get("panier", []);

        // On "fabrique" les données
        $dataPanier = [];
        $total = 0;

        foreach($panier as $id => $quantite){
            $product = $productsRepository->find($id);
            $dataPanier[] = [
                "produit" => $product,
                "quantite" => $quantite
            ];
            $total += $product->getPrix() * $quantite;
        }


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('panier/pdf.html.twig', [
            'commande' => $commande,
            'dataPanier' => $dataPanier,
            'total' =>$total,
        ]);

        $dompdf->set_base_path('css/style.css');

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("Reçu.pdf", [
            "Attachment" => true
        ]);
    }



/*
    public function MailsendReçu(\Swift_Mailer $mailer,SessionInterface $session,ProduitRepository $produitRepository)
    {
        $panier = $session->get("panier", []);
        // On "fabrique" les données
        $dataPanier = [];
        $total = 0;

        foreach($panier as $id => $quantite){
            $product = $produitRepository->find($id);
            $dataPanier[] = [
                "produit" => $product,
                "quantite" => $quantite
            ];
            $total += $product->getPrix() * $quantite;
        }

        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('gamergeekscommunity@gmail.com')
            ->setTo('marwa.ayari97@gmail.com')
            ->setBody('popo',"text/plain"
            )

            // you can remove the following code if you don't define a text version for your emails
            ->addPart(
                $this->renderView(
                // templates/emails/registration.txt.twig
                    'panier/index.html.twig',compact("dataPanier", "total")
                ),
                'text/plain'
            )
        ;

        $mailer->send($message);

        return $this->redirectToRoute('app_produit_shop', [], Response::HTTP_SEE_OTHER);
    }
*/

    /**
     * @Route("/show", name="app_commande_show", methods={"GET"})
     */
    public function show(LignecommandeRepository $lignecommandeRepository,Request $request,CommandeRepository $commandeRepository,ClientRepository $clientRepository, PaginatorInterface $paginator): Response
    {
        $uid=111;

        $donnees=$commandeRepository->afficheCommandesClients($uid);

        $commandes = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            3 // Nombre de résultats par page
        );

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

    /**
     * @Route("/{idcommande}/livree", name="app_commande_livree", methods={"POST","GET"})
     */
    public function Livree(int $idcommande,CommandeRepository $commandeRepository): Response
    {
        $commande=$commandeRepository->find($idcommande);

        if($commande->getLivree()==true)
            $commande->setLivree(false);
        else $commande->setLivree(true);

        $commandeRepository->add($commande);
        return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);
    }
}
