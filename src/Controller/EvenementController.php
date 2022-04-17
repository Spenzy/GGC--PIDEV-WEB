<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Knp\Component\Pager\PaginatorInterface;

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
            'evenement' => $eventl,
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
     * @Route("evenementshow{reference}", name="show", methods={"GET"})
     */
    public function show(Evenement $evenement): Response
    {
        return $this->render('evenement/show.html.twig', [
            'evenement' => $evenement,
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

    /**
     * @Route("evenementdelete/{reference}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, Evenement $evenement, EvenementRepository $evenementRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenement->getReference(), $request->request->get('_token'))) {
            $evenementRepository->remove($evenement);
        }

        return $this->redirectToRoute('event', [], Response::HTTP_SEE_OTHER);
    }
}
