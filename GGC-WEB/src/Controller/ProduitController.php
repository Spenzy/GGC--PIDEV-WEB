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
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

use Knp\Component\Pager\PaginatorInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Routing\Annotation\Route;

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
    public function details(SessionInterface $session,int $reference,ProduitRepository $rep,AvisRepository $repAvis): Response
    {
        $userid=$session->get("user_id");

        $produit=$rep->find($reference);
        $avis=$repAvis->findAvis($reference);
        return $this->render('produit/details.html.twig', [
            'produit' => $produit,
            'avis' => $avis,
            'uid' => $userid,
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
    public function affecterNote(ProduitRepository $produitRepository,AvisRepository $avisRepository): Response
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

    public function sendMailRemise(MailerInterface $mailer,Client $client,$categorie,$montant)
    {

        $email = (new TemplatedEmail())
            ->from('gamergeekscommunity@gmail.com')
            ->to($client->getIdclient()->getEmail())
            ->subject('Une remise à ne pas rater!')
            ->text('venez au shop!')
            ->embedFromPath('img/LogoGGC.png', 'logo')
            ->htmlTemplate('emails/EmailRemise.html.twig')
            ->context(compact('client','categorie','montant')
            );

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            var_dump($e->getMessage());
        }


    }

    /**
     * @Route("/remise", name="app_produit_remise", methods={"POST","GET"})
     */
    public function RemiseAffecter(ProduitRepository $produitRepository,Request $request,ClientRepository $clientRepository,MailerInterface $mailer)
    {
        $categorie=$request->get("categorie","");
        $montant=$request->get("montant",0);
        if($categorie!="" && $montant!=0){
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
        }
        return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);

    }

    /**
     * @Route("/search", name="app_produit_search", methods={"POST","GET"})
     */
    public function Recherche(ProduitRepository $produitRepository, PaginatorInterface $paginator,Request $request): Response{

        $libelle=$request->get("search","");
        if($libelle==""){
            return $this->redirectToRoute('app_produit_shop', [], Response::HTTP_SEE_OTHER);
        }else {
            $Listproduits = $produitRepository->rechercheLibelle($libelle);
            $produits = $paginator->paginate(
                $Listproduits, // Requête contenant les données à paginer (ici nos produits)
                $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
                12 // Nombre de résultats par page
            );
            return $this->render('produit/shop.html.twig', [
                'produits' => $produits,
            ]);
        }
    }

    /**
     * @Route("/{reference}//pdf", name="app_produit_pdf", methods={"POST","GET"})
     */
    public function PdfListeProduits(int $reference,ProduitRepository $produitRepository)
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->set('isHtml5ParserEnabled' , true);
        $pdfOptions->setTempDir('css/style.css');
        $pdfOptions->set( 'isRemoteEnabled' , true);

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        $produits=$produitRepository->findAllProducts();
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('produit/ListProduitsPDF.html.twig', [
            'produits' => $produits,

        ]);


        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("Produits.pdf", [
            "Attachment" => true
        ]);
    }

}
