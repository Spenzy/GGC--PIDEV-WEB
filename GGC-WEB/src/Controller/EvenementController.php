<?php

namespace App\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Evenement;
use App\Entity\Client;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\Email;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;





/**
 * @Route("/")
 */
class EvenementController extends AbstractController
{
    /**
     * @Route("/evenement", name="event", methods={"GET"})
     */
    public function index(EvenementRepository $evenementRepository,PaginatorInterface $paginator): Response
    {
        return $this->render('evenement/index.html.twig', [
            'evenements' => $evenementRepository->findAll(),
        ]);
        
        
        $eventl = $paginator->paginate(
            $eventl, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            4 // Nombre de résultats par page
        );
    }
    /**
     * @Route("/affichEvent", name="affichEvent", methods={"GET"})
     */
    public function affichEvent(EvenementRepository $evenementRepository ,Request $request,PaginatorInterface $paginator): Response
    {
     
        $ListeEvenements=$evenementRepository->findAll();
        $eventl = $paginator->paginate(
            $ListeEvenements, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            2 // Nombre de résultats par page
        );
        return $this->render('evenement/affichEvent.html.twig', [
            'evenements' => $eventl,
        ]);
    }
    /**
     * @Route("/AffichEventPDF", name="affichEventPDF", methods={"GET"})
     */
    public function pdf(EvenementRepository $evenementRepository ): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $ListeEvenements=$evenementRepository->findAll();

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('evenement/pdf.html.twig', [
            'evenements' => $ListeEvenements,
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
    }



    /**
     * @Route("/evenementadd", name="newevent", methods={"GET", "POST"})
     */
    public function new(Request $request, EvenementRepository $evenementRepository): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $evenement->getPhoto();
            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('images_directory'), $filename);
            $em = $this->getDoctrine()->getManager();
            $evenement->setPhoto($filename);
            $evenementRepository->add($evenement);

            return $this->redirectToRoute('event', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('evenement/new.html.twig', [
            'evenement' => $evenement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("evenementshow{reference}", name="evenementshow", methods={"GET"})
     */
    public function show(Evenement $evenement,int $reference,Request $request,EvenementRepository $rep,EntityManagerInterface $entityManager): Response
    {
        $reference = $request->get('reference');

        $evenement = $rep->find($reference);

        if (($evenement->getNbrparticipant() > 0)){
        $evenement->setNbrparticipant($evenement->getNbrparticipant() - 1);
      
    }
    $nouveaNombreParticipants = $evenement->getNbrparticipant();
        $entityManager->flush();
        return $this->render('evenement/show.html.twig', [
            'evenement' => $evenement,
            "nouveaNombreParticipants" => $nouveaNombreParticipants
        ]);
    }
    
   
    /**
     * @Route("edit{reference}", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Evenement $evenement, EvenementRepository $evenementRepository): Response
    {
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $evenement->getPhoto();
            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('images_directory'), $filename);
            $em = $this->getDoctrine()->getManager();
            $evenement->setPhoto($filename);
            $evenementRepository->add($evenement);
            return $this->redirectToRoute('event', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('evenement/edit.html.twig', [
            'evenement' => $evenement,
            'form' => $form->createView(),
        ]);
    }

    /* public function mailAnnulation(Client $client ,Evenement $evenement,MailerInterface $mailer)
    {
        $email = (new TemplatedEmail())
            ->from('gamergeekscommunity@gmail.com')
            ->to($client->getIdclient()->getEmail())
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->embedFromPath('img/LogoGGC.png', 'logo')
            ->htmlTemplate('emails/EmailEvent.html.twig')
            ->context(compact('client','evenement'));
        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            var_dump($e->getMessage());
        }
    } */  
         
    
 
    /**
     * @Route("evenementdelete/{reference}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, Evenement $evenement, EvenementRepository $evenementRepository,MailerInterface $mailer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenement->getReference(), $request->request->get('_token'))) {
            $evenementRepository->remove($evenement);
            
        }

        return $this->redirectToRoute('event', [], Response::HTTP_SEE_OTHER);
    }

    /**
    * @Route("/partagerEvent", name="app_verif_wait")
    */
    public function waitverif(){
        return $this->render('evenement/partagerEvent.html.twig') ;
    }
    
 
       /**
     * @Route("/applyajax", name="participer_event")
     */
    public function applyToEvent(Request $request,EntityManagerInterface $entityManager)
    {
        // $eventl= $rep->find($idevent);
        $reference = $request->get('reference');
        $eventl = $this->getDoctrine()->getRepository(Evenement::class)->findOneById($reference);
        // $utilisateur = $this->getDoctrine()->getRepository(Utilisateur::class)->findOneById(1);
        //$eventl->addUser($utilisateur);
        // $utilisateur->addEvent($eventl);

        $eventl->setNbrparticipant($eventl->getNbrparticipant() - 1);

        $nouveaNombreParticipants = $eventl->getNbrparticipant();

        $entityManager->flush();

        return $this->render('evenement/show.html.twig', [
            "nouveaNombreParticipants" => $nouveaNombreParticipants
        ]);

    }

    /////////// Web Service ////////////

    /**
     * @Route("/Allevents", name="Allevents")
     */
    public function AlleventsJSON(NormalizerInterface $Normalizer)
    {
        $repository = $this->getDoctrine()->getRepository(Evenement::class);
        $event = $repository->findAll();
        $jsonContent = $Normalizer->normalize($event, 'json', ['groups' => 'event:read']);
        return new Response(json_encode($jsonContent));
    }
   
    /**
     * @Route("/addevent", name="addevent")
     */
    public function addjsonevent(Request $req,MailerInterface $mailer , NormalizerInterface $Normalizer, EntityManagerInterface $em)
    {
        $em = $this->getDoctrine()->getManager();
        $event = new Evenement();

        $event->setReference($req->get('reference'));
        $event->setDescription($req->get('description'));
        $event->setLocalisation($req->get('localisation'));
        $event->setNbrparticipant($req->get('nbrParticipant'));
        $event->setTitre($req->get('titre'));
        $em->persist($event);
        $em->flush();
        
        $message = (new Email())
            ->from('gamergeekscommunity@gmail.com')
            ->to('gamergeekscommunity@gmail.com')
            ->subject("GamerGeeks")
            ->html("<p>bonjour Mr , Mdme</p><p> une nouvelle evenement a ete ajoute ". $event->getTitre()."</p> dans la ville ". $event->getLocalisation()."<p></p><p> Cordiallement , </p>");

        $mailer->send($message);

        $jsonContent = $Normalizer->normalize($event, 'json', ['groups' => 'event:read']);
        return new Response(json_encode($jsonContent));
    }

    /**
     * @Route("/deleteEvent/{reference}", name="deleteEvent")
     */

    public function deleteEventAction(Request $request, NormalizerInterface $Normalizer)
    {
        $ref = $request->get("reference");

        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository(Evenement::class)->find($ref);
        if ($event != null) {
            $em->remove($event);
            $em->flush();

            $jsonContent = $Normalizer->normalize($event, 'json', ['groups' => 'event:read']);
            return new Response("Delete successfully" . json_encode($jsonContent));

        }

    }

    /**
     * @Route("/updateEvent", name="updateEvent")
     */
    public function modifierEvent(Request $request ,NormalizerInterface $Normalizer) {
        $em = $this->getDoctrine()->getManager();
        $event = $this->getDoctrine()->getManager()
            ->getRepository(Evenement::class)
            ->find($request->get("reference"));

            $event->setReference($request->get('reference'));
            $event->setDescription($request->get('description'));
            $event->setLocalisation($request->get('localisation'));
            $event->setNbrparticipant($request->get('nbrParticipant'));
            $event->setTitre($request->get('titre'));
        $em->persist($event);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $jsonContent = $Normalizer->normalize($event,'json',['groups'=>'event:read']);
        return new Response("Update successfully".json_encode($jsonContent));

    }
    
     /**
     * @Route("/get/{reference}", name="getEvent")
     * @throws ExceptionInterface
     */
    public function getEvent(Request $request, $reference, EvenementRepository $evenementRepository, NormalizerInterface $normalizer)
    {
        $event = $evenementRepository->find($reference);
        $evenement = (array)$event;
        foreach ($evenement as $k => $v) {
            $newkey = substr($k, 20);
            $evenement[$newkey] = $evenement[$k];
            unset($evenement[$k]);
        }

        $jsonContent = $normalizer->normalize($evenement, 'json', ['groups' => 'event: read']);

        return new Response (json_encode($jsonContent));
    }
    
   


}
