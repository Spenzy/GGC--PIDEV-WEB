<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Repository\CommentaireRepository;
use App\Repository\PublicationRepository;
use App\Repository\StreamerRepository;
use App\Repository\VoteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */

    public function index(SessionInterface $session, PersonneRepository $personneRepository): Response
    {
        if ($personneRepository->findOneBy(array('idPersonne' => $session->get("user_id")))->getRoles() == "admin") {
            return $this->render('admin/index.html.twig', [
                'controller_name' => 'AdminController',
            ]);
        }
        return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);

    }

    /**
     * @Route("/loginnnn", name="loginnnn")
     */
    public function indexLogin(): Response
    {
        return $this->render('Login/login.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/loginm" , name="app_loginm" , methods={"POST","GET"})
     */
    public function login(SessionInterface $session, Request $request, PersonneRepository $personneRepository)
    {
        $email = $request->get("email", "");
        $password = $request->get("password", "");
        if ($email != "" && $password != "") {
            $personne = $personneRepository->findOneBy(array('email' => $email));
            if ($personne->getRoles() == "user") {
                $session->set("user_id", $personne->getIdPersonne());
                return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);
            }elseif ($personne->getRoles() == "admin") {
                $session->set("user_id", $personne->getIdPersonne());
                return $this->redirectToRoute('app_moderateur_index', [], Response::HTTP_SEE_OTHER);
            }elseif ($personne->getRoles() == "moderateur") {
                $session->set("user_id", $personne->getIdPersonne());
                return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
            }
        }
        return $this->redirectToRoute('loginnnn', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/forum/archive", name="app_admin_pubarchive")
     */
    public function forumArchive(Request               $request,
                                 PublicationRepository $publicationRepository,
                                 PaginatorInterface    $paginator): Response
    {
        $pub = $publicationRepository->findByArchivage(1);
        $publication = $paginator->paginate(
            $pub, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            5 // Nombre de résultats par page
        );

        return $this->render('publication/archivage.html.twig', [
            'publications' => $publication,
        ]);
    }

    /**
     * @Route("/forum/NonArchive", name="app_admin_pubnonarchive")
     */
    public function forumNonArchive(Request               $request,
                                    PublicationRepository $publicationRepository,
                                    PaginatorInterface    $paginator): Response
    {
        $pub = $publicationRepository->findByArchivage(0);
        $publication = $paginator->paginate(
            $pub, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            5 // Nombre de résultats par page
        );

        return $this->render('publication/archivage.html.twig', [
            'publications' => $publication,
        ]);
    }

    /**
     * @Route("/forum/{idpublication}", name="app_forum_archive")
     */
    public function archiver(int $idpublication, PublicationRepository $publicationRepository, MailerInterface $mailer): Response
    {
        $publication = $publicationRepository->find($idpublication);
        $etat = $publication->getArchive();
        $publication->setArchive(!$etat);
        $publicationRepository->add($publication);
        if ($etat)
            $this->mail("Archivé", $publication, $mailer);
        else $this->mail("Désarchivé", $publication, $mailer);


        return $this->redirectToRoute('app_admin_pubnonarchive', [], Response::HTTP_SEE_OTHER);
    }

    public function mail(string $etat, Publication $publication, MailerInterface $mailer)
    {
        $email = (new TemplatedEmail())
            ->from('gamergeekscommunity@gmail.com')
            ->to($publication->getIdclient()->getIdclient()->getEmail())
            ->subject('Archivage publication!')
            ->embedFromPath('img/LogoGGC.png', 'logo')
            ->htmlTemplate('emails/archivemail.html.twig')
            ->context([
                'p' => $publication,
                'date' => new \DateTime('today'),
                'archive' => $etat
            ]);

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            var_dump($e->getMessage());
        }
    }

    /**
     * @Route("/streamer/admin", name="app_streamers_admin", methods={"GET","POST"})
     */
    public function adminstreamer(StreamerRepository $streamerRepository): Response
    {
        return $this->render('streamer/adminstreamer.html.twig', [
            'streamers' => $streamerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/plan/admin", name="adminplan", methods={"GET"})
     */
    public function adminplan(PlanRepository $planRepository): Response
    {
        return $this->render('plan/adminplan.html.twig', [
            'plans' => $planRepository->findAll(),
        ]);
    }



}
