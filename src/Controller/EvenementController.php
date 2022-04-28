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

}
