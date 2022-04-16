<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Repository\PublicationRepository;
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
    public function archiver(int $idpublication, PublicationRepository $publicationRepository): Response
    {
        $publication = $publicationRepository->find($idpublication);
        $publication->setArchive(!$publication->getArchive());
        $publicationRepository->add($publication);

        return $this->redirectToRoute('app_admin_pubnonarchive',[],Response::HTTP_SEE_OTHER);
    }
}
