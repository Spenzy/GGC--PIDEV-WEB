<?php

namespace App\Controller;
use App\Entity\Evenement;
use App\Entity\Client;
use App\Entity\Participation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ParticipationRepository;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationRequestHandler;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\ParticipationType;
use Doctrine\ORM\EntityManagerInterface;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\BarChart;

class ParticipationController extends AbstractController
{
    /**
     * @Route("/participation", name="app_participation")
     */
    public function index(): Response
    {
        return $this->render('participation/index.html.twig', [
            'controller_name' => 'ParticipationController',
        ]);
    }
    /**
     * @Route("/addParticipation{id}", name="addParticipation")
     */
    public function ajouterParticipation(Request $request, $id, \Swift_Mailer $mailer)
    {

        $Participation = new Participation();
        $evenement = $this->getDoctrine()->getRepository(Evenement::class)->findOneBy(['reference' => $id]);

        $Participation->setIdEvent($evenement);
    
        $form = $this->createForm(ParticipationType::class, $Participation);


        $form->handleRequest($request);
        $participation = $this->getDoctrine()->getRepository(Participation::class)->findOneBy(['idParticipation' => $id]);
        $idu = $participation->getIdClient();
        $idt = $participation->getIdEvent();

        $utilisateur = $this->getDoctrine()->getRepository(Client::class)->findOneBy(['idClient' => $idu]);
    
        $reference =  $evenement->getReference();

        $eventl = $this->getDoctrine()->getRepository(Evenement::class)->findOneBy(['reference' => $reference]);
        $titre = $eventl->getTitre();
        $message = (new \Swift_Message('Confirmation Email'))
        ->setFrom('gamergeekscommunity@gmail.com')
        #->setTo($Participation->getIdclient()->getIdclient()->getEmail())
        ->setTo('azer.lahmar@esprit.tn')
        ->setBody(
            $this->renderView(
                'emails/contact.html.twig',
                [
                    'titre' => $titre,
                    'idt' => $idt,
                   
                    ]
            ),
            'text/html'

        );

    $mailer->send($message);

        if ($form->isSubmitted() and $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($Participation);
            $em->flush();
            return $this->redirectToRoute('MesPar');





        }

        return $this->render('participation/ajouterP.html.twig', array('participations' => $form->createView()));

    }

      /**
     * @Route("/MesParticipation", name="MesPar")
     */
    public function afficherPart(Request $request)
    {
        $r = $this->getDoctrine()->getRepository(Participation::class);
        $Participation = $r->findAll();


        return $this->render('participation/participation.html.twig', array('participations' => $Participation));


    }
    /**
     * @Route("/modparticipation{idParticipation}", name="modp")
     */
    public function modifierParticipation(Request $request, $idParticipation)
    {
        $em = $this->getDoctrine()->getManager();

        $participation = $em->getRepository(Participation::class)->find($idParticipation);
        $form = $this->createForm(ParticipationType::class, $participation);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($participation);
            $em->flush();
            return $this->redirectToRoute('MesPar');
        }
        return $this->render('participation/ajouterP.html.twig', array('participations' => $form->createView()));

    }

    /**
     * @Route("/supParticipation{idParticipation}", name="suppart")
     */
    public function supprP(Request $request,$idParticipation)
    {
        $em = $this->getDoctrine()->getManager();
        $participation = $this->getDoctrine()->getRepository(Participation::class)->find($idParticipation);
        $em->remove($participation);
        $em->flush();
        return $this->redirectToRoute('MesPar');

    }

    /**
     * @Route("/stats", name="stats")
     */
    public function statistiques(ParticipationRepository $partRepo){
        // On va chercher toutes les commandes

        $participations = $partRepo->countById();
        $titreEvents = [];
        $idParticipations = [];
        $participationsCount = [];


        // On va chercher le nombre de participation par date
        //nombre de participation par titre evenement 
        foreach($participations as $Participation){
            $idParticipations[] = $Participation ['id'];
            $participationsCount[] = $Participation['count'];
            $titreEvents[] = $Participation ['ide'];


        }

        //dump($commandesCount);

        return $this->render('participation/statistique.html.twig', [
            'idParticipations' => json_encode($idParticipations),
            'participationsCount' => json_encode($participationsCount),
            'titreEvents' => json_encode($titreEvents),
        ]);
    }



}
