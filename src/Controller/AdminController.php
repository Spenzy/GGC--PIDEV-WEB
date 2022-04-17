<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Repository\CommentaireRepository;
use App\Repository\PublicationRepository;
use App\Repository\VoteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;


/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="app_admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/forum/archive", name="app_admin_pubarchive")
     */
    public function forumArchive(Request $request,
                                 PublicationRepository $publicationRepository,
                                 PaginatorInterface $paginator): Response
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
    public function forumNonArchive(Request $request,
                                    PublicationRepository $publicationRepository,
                                    PaginatorInterface $paginator): Response
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
        if($etat)
            $this->mail("Archivé", $publication ,$mailer);
        else $this->mail("Désarchivé", $publication, $mailer);



        return $this->redirectToRoute('app_admin_pubnonarchive',[],Response::HTTP_SEE_OTHER);
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



}

