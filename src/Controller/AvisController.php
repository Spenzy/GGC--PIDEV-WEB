<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Entity\Client;
use App\Entity\Personne;
use App\Entity\Produit;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/avis")
 */
class AvisController extends AbstractController
{
    /**
     * @Route("/", name="app_avis_index", methods={"GET"})
     */
    public function index(AvisRepository $avisRepository): Response
    {
        return $this->render('avis/index.html.twig', [
            'avis' => $avisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{reference}/new", name="app_avis_new", methods={"GET", "POST"})
     */
    public function new(SessionInterface $session,int $reference,Request $request, AvisRepository $avisRepository): Response
    {
        $userid=6;//$userid=$session[''];
        $avi = new Avis();
        $client=$this->getDoctrine()->getRepository(Client::class)->find($userid);
        $avi->setIdclient($client);
        $produit=$this->getDoctrine()->getRepository(Produit::class)->find($reference);
        $avi->setReferenceproduit($produit);
        $form = $this->createForm(AvisType::class, $avi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $avisRepository->add($avi);
            return $this->redirectToRoute('app_produit_details', ['reference'=>$reference], Response::HTTP_SEE_OTHER);
        }

        return $this->render('avis/new.html.twig', [
            'avi' => $avi,
            'form' => $form->createView(),
            'referenceProduit' => $reference,
        ]);
    }



    /**
     * @Route("/{idavis}", name="app_avis_show", methods={"GET"})
     */
    public function show(Avis $avi): Response
    {
        return $this->render('avis/show.html.twig', [
            'avi' => $avi,
        ]);
    }

    /**
     * @Route("/{reference}/{idavis}/edit", name="app_avis_edit", methods={"GET", "POST"})
     */
    public function edit(int $reference,Request $request, Avis $avi, AvisRepository $avisRepository): Response
    {
        $form = $this->createForm(AvisType::class, $avi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $avisRepository->add($avi);
            return $this->redirectToRoute('app_produit_details', ['reference'=>$reference], Response::HTTP_SEE_OTHER);
        }

        return $this->render('avis/edit.html.twig', [
            'avi' => $avi,
            'form' => $form->createView(),
            'reference' => $reference,
        ]);
    }

    /**
     * @Route("/{idavis}", name="app_avis_delete", methods={"POST"})
     */
    public function delete(Request $request, Avis $avi, AvisRepository $avisRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avi->getIdavis(), $request->request->get('_token'))) {
            $avisRepository->remove($avi);
        }

        $reference=$avi->getReferenceproduit()->getReference();
        return $this->redirectToRoute('app_produit_details', ['reference'=>$reference], Response::HTTP_SEE_OTHER);
    }
}
