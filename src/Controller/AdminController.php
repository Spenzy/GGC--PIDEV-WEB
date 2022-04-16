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
use Symfony\Component\Routing\Annotation\Route;


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
    public function archiver(int $idpublication, PublicationRepository $publicationRepository, \Swift_Mailer $mailer): Response
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

    public function mail(string $etat, Publication $publication, \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('gamergeekscommunity@gmail.com')
            ->setTo('dridi.zied@esprit.tn')
            ->setSubject("Publication Archivé")
            ->setBody(
                $this->renderView(
                    'emails/archivemail.html.twig', [
                        'p' => $publication,
                        'date' => new \DateTime('today'),
                        'archive' => $etat
                     ]
                ),
                'text/html'
            )
        ;

        $mailer->send($message);
    }

}

