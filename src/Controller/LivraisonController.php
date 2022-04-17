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
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Mediumart\Orange\SMS\SMS;
use Mediumart\Orange\SMS\Http\SMSClient;


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
    public function new(Request $request, LivraisonRepository $livraisonRepository, MailerInterface $mailer): Response
    {
        $livraison = new Livraison();
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livraisonRepository->add($livraison);
            //mail affectation
            $this->mailAffectation($livraison->getIdcommande()->getIdclient(),$livraison->getIdlivreur(),
                $livraison->getIdcommande(), $livraison, $mailer);
           //SMS affectation de votre commande a une livraison
            \Mediumart\Orange\SMS\Http\SMSClientRequest::verify(false);
            $client = SMSClient::getInstance('KKUG0EPsCU7Miz6MOAlEC3APdtxKhzYF', 'uMUEAAesOxF515Oe');
            $sms = new SMS($client);
            $sms->message(' Test api')
                ->from('+21654342461')
                ->to('+21652848054')
                ->send();


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

    public function mailAffectation(Client $client,Livreur $livreur,Commande $commande,Livraison $livraison,MailerInterface $mailer)
    {
        $email = (new TemplatedEmail())
            ->from('gamergeekscommunity@gmail.com')
            ->to($client->getIdclient()->getEmail())
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->embedFromPath('img/LogoGGC.png', 'logo')
            ->htmlTemplate('emails/affectation.html.twig')
            ->context(compact('client','livreur','commande','livraison'));

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            var_dump($e->getMessage());
        }
    }



    public function MailsendExcuse(MailerInterface $mailer,Client $client,Livreur $livreur,Commande $commande)
    {
        $email = (new TemplatedEmail())
            ->from('gamergeekscommunity@gmail.com')
            ->to($client->getIdclient()->getEmail())
            ->subject('Email Excuse')
            ->text('Sending emails is fun again!')
            ->embedFromPath('img/LogoGGC.png', 'logo')
            ->htmlTemplate('emails/excuse.html.twig')
            ->context(compact('client','livreur','commande'));

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            var_dump($e->getMessage());
        }


    }

    /**
     * @Route("/{idcommande}/excuse", name="app_livraison_excuse", methods={"POST","GET"})
     */
    public function excuse(LivraisonRepository $livraisonRepository,CommandeRepository $commandeRepository,MailerInterface $mailer): Response
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
