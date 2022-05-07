<?php

namespace App\services\JSON;

use App\Entity\Client;
use App\Entity\Produit;
use App\Entity\Publication;
use App\Form\CommentaireType;
use App\Form\PublicationType;
use App\Repository\AvisRepository;
use App\Repository\ClientRepository;
use App\Repository\CommentaireRepository;
use App\Repository\ProduitRepository;
use App\Repository\PublicationRepository;
use App\Repository\VoteRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Dompdf\Dompdf;
use Dompdf\Options;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/JSON/produit")
 */
class ProduitService extends AbstractController
{
    /**
     * @Route("/getAll", name="AllProducts")
     * @throws ExceptionInterface
     */
    public function AllProducts(NormalizerInterface $normalizer, ProduitRepository $produitRepository): Response
    {
        $products = $produitRepository->findAllProducts();
        $produits = array();
        foreach ($products as $p) {

            $produit = (array)$p;
            foreach ($produit as $k => $v) {
                $newkey = substr($k, 20);
                $produit[$newkey] = $produit[$k];
                unset($produit[$k]);
            }
            $produits[] = $produit;

        }

        $jsonContent = $normalizer->normalize($produits, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }

    /**
     * @Route("/get/{reference}", name="getProduit")
     * @throws ExceptionInterface
     */
    public function getProduit(Request $request, $reference, ProduitRepository $produitRepository, NormalizerInterface $normalizer)
    {
        $produit = $produitRepository->find($reference);
        $product = (array)$produit;
        foreach ($product as $k => $v) {
            $newkey = substr($k, 20);
            $product[$newkey] = $product[$k];
            unset($product[$k]);
        }

        $jsonContent = $normalizer->normalize($product, 'json', ['groups' => 'post: read']);

        return new Response (json_encode($jsonContent));
    }
    /**
     * @Route("/new", name="addProduit")
     */
    public function new(Request $request, NormalizerInterface $Normalizer,ProduitRepository $produitRepository): Response
    {
        $produit = new Produit();
        $produit->setReference($request->get('reference'));
        $produit->setLibelle($request->get('libelle'));
        $produit->setCategorie($request->get('categorie'));
        $produit->setDescription($request->get('description'));
        $produit->setPrix($request->get('prix'));
        $produit->setNote(0);
        $produitRepository->add($produit);

        $prod = (array)$produit;
        foreach ($prod as $k => $v) {
            $newkey = substr($k, 20);
            $prod[$newkey] = $prod[$k];
            unset($prod[$k]);
        }

        
        $jsonContent = $Normalizer->normalize($prod, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($prod));
    }
    /**
     *  @Route("/edit", name="editProduit")
     */
    public function editProduit (Request $request, NormalizerInterface $Normalizer, ProduitRepository $produitRepository)
    {
        $produit = $produitRepository->find($request->get('reference'));

        $produit->setReference($request->get('reference'));
        $produit->setLibelle($request->get('libelle'));
        $produit->setCategorie($request->get('categorie'));
        $produit->setDescription($request->get('description'));
        $produit->setPrix($request->get('prix'));
        $produitRepository->add($produit);

        $jsonContent = $Normalizer->normalize($produit, 'json', ['groups' => 'post: read']);
        return new Response ("Produit modifier avec succes".json_encode($jsonContent));
    }

    /**
     *  @Route("/delete/{reference}", name="deleteProduit")
     */
    public function deleteProduit (Request $request, NormalizerInterface $Normalizer, $reference,ProduitRepository $produitRepository)
    {
        $produit = $produitRepository->find($reference);


        $produitRepository->remove($produit);

        $jsonContent = $Normalizer->normalize($produit, 'json', ['groups' => 'post: read']);
        return new Response ("Produit supprime avec succes".json_encode($jsonContent));
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
     * @Route("/remise", name="Produitremise")
     */
    public function RemiseAffecter(ProduitRepository $produitRepository,NormalizerInterface $Normalizer,Request $request,ClientRepository $clientRepository,MailerInterface $mailer)
    {
        $categorie=$request->get("categorie");
        $montant=$request->get("montant");
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
        return new Response ("Remise effectuee avec succes");
    }

    /**
     * @Route("/note", name="Produitnote")
     */
    public function affecterNote(ProduitRepository $produitRepository,AvisRepository $avisRepository): Response
    {
        $produits=$produitRepository->findAll();
        foreach ($produits as $produit) {
            $nbExcellent=$avisRepository->countExcellentByProduit($produit->getReference());
            $nbMoyen=$avisRepository->countMoyenByProduit($produit->getReference());
            $nbMediocre=$avisRepository->countMediocreByProduit($produit->getReference());
            $note=2*$nbExcellent+$nbMoyen-$nbMediocre;
            $produit->setNote($note);
            $produitRepository->add($produit);
        }
        return new Response ("Notes affectee avec succes");
    }

    /**
     * @Route("/pdf", name="produitpdf")
     */
    public function PdfProduits(ProduitRepository $produitRepository)
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
        return new Response ("pdf");

    }

}