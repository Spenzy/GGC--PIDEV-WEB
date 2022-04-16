<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Client;
use App\Form\ProduitType;
use App\Repository\AvisRepository;
use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/produit")
 */
class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="app_produit_index", methods={"GET"})
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/index.html.twig', [
            'produits' => $produitRepository->findAllProducts(),
        ]);
    }

    /**
     * @Route("/shop", name="app_produit_shop", methods={"GET"})
     */
    public function shop(ProduitRepository $produitRepository, PaginatorInterface $paginator,Request $request): Response
    {
        $Listproduits=$produitRepository->findAllProducts();
        $produits = $paginator->paginate(
            $Listproduits, // Requête contenant les données à paginer (ici nos produits)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            8 // Nombre de résultats par page
        );
        return $this->render('produit/shop.html.twig', [
            'produits' => $produits,
        ]);
    }

    /**
     * @Route("/new", name="app_produit_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProduitRepository $produitRepository): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {

            //image settings
            $file=$form->get('img')->getData();
            $filename=md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $filename);
            $produit->setImg($filename);

            $produit->setNote(0);
            $produitRepository->add($produit);
            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{reference}", name="app_produit_show", methods={"GET"})
     */
    public function show(Produit $produit): Response
    {
        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
        ]);
    }
    /**
     * @Route("/details/{reference}", name="app_produit_details", methods={"GET"})
     */
    public function details(int $reference,ProduitRepository $rep,AvisRepository $repAvis): Response
    {
        $produit=$rep->find($reference);
        $avis=$repAvis->findAvis($reference);
        return $this->render('produit/details.html.twig', [
            'produit' => $produit,
            'avis' => $avis,
        ]);
    }
    /**
     * @Route("/edit/{reference}", name="app_produit_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Produit $produit, ProduitRepository $produitRepository): Response
    {



        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            //image settings
            $file=$form->get('img')->getData();

            $filename=md5(uniqid()) . '.' . $file->guessExtension();
            try {
                $file->move(
                    $this->getParameter('upload_directory'),
                    $filename
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }
            $produit->setImg($filename);

            $produitRepository->add($produit);
            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{reference}", name="app_produit_delete", methods={"POST"})
     */
    public function delete(Request $request, Produit $produit, ProduitRepository $produitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getReference(), $request->request->get('_token'))) {
            $produitRepository->remove($produit);
        }

        return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/{reference}/note", name="app_produit_note", methods={"POST","GET"})
     */
    public function excuse(ProduitRepository $produitRepository,AvisRepository $avisRepository): Response
    {
        $produits=$produitRepository->findAll();
        foreach ($produits as $produit) {
            $nbExcellent=$avisRepository->countExcellentByProduit($produit->getReference());
            $nbMoyen=$avisRepository->countMoyenByProduit($produit->getReference());
            $nbMediocre=$avisRepository->countMediocreByProduit($produit->getReference());
            echo $nbMediocre;
            $note=2*$nbExcellent+$nbMoyen-$nbMediocre;
            $produit->setNote($note);
            $produitRepository->add($produit);
        }


        return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
    }

    public function sendMailRemise(\Swift_Mailer $mailer,Client $client,$categorie,$montant)
    {


        $message = (new \Swift_Message('Notification Remise au shop'))
            ->setFrom('gamergeekscommunity@gmail.com')
            ->setTo($client->getIdclient()->getEmail())
            ->setBody(
                $this->renderView(
                    'emails/EmailRemise.html.twig', compact('client','categorie','montant')
                ),
                'text/html'
            )
        ;
        $mailer->send($message);



        return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/remise", name="app_produit_remise", methods={"POST","GET"})
     */
    public function RemiseAffecter(ProduitRepository $produitRepository,Request $request,ClientRepository $clientRepository,\Swift_Mailer $mailer){
        $categorie=$request->get("categorie","");
        $montant=$request->get("montant",100);
        $produits=$produitRepository->findAll();
        foreach($produits as $produit){
            if($produit->getCategorie()==$categorie){
                if($montant >= 0){
                $produit->setPrix($produit->getPrix()*(1-($montant/100)));
                $produitRepository->add($produit);
                }
            }
        }
        $clients=$clientRepository->findAll();
        foreach ($clients as $client){
            $this->sendMailRemise($mailer,$client,$categorie,$montant);
        }
        return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);

    }

    /**
     * @Route("/search", name="app_produit_search", methods={"POST","GET"})
     */
    public function Recherche(ProduitRepository $produitRepository, PaginatorInterface $paginator,Request $request): Response{

        $libelle=$request->get("search","");
        $Listproduits=$produitRepository->rechercheLibelle($libelle);
        $produits = $paginator->paginate(
            $Listproduits, // Requête contenant les données à paginer (ici nos produits)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            8 // Nombre de résultats par page
        );
        return $this->render('produit/shop.html.twig', [
            'produits' => $produits,
        ]);

    }


}
