<?php

namespace App\Controller;

use App\Entity\Streamer;
use App\Form\StreamerType;
use App\Repository\StreamerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/streamer")
 */
class StreamerController extends AbstractController
{
    /**
     * @Route("/", name="app_streamer_index", methods={"GET"})
     */
    public function index(StreamerRepository $streamerRepository): Response
    {
        return $this->render('streamer/index.html.twig', [
            'streamers' => $streamerRepository->findAll(),
        ]);
    }


    /**
     * @Route("/adminstreamer", name="adminstreamer", methods={"GET"})
     */
    public function adminstreamer(StreamerRepository $streamerRepository): Response
    {
        return $this->render('streamer/adminstreamer.html.twig', [
            'streamers' => $streamerRepository->findAll(),
        ]);
    }


    /**
     * @Route("/new", name="app_streamer_new", methods={"GET", "POST"})
     */
    public function new(Request $request, StreamerRepository $streamerRepository): Response
    {
        $streamer = new Streamer();
        $form = $this->createForm(StreamerType::class, $streamer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $streamerRepository->add($streamer);
            return $this->redirectToRoute('app_streamer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('streamer/new.html.twig', [
            'streamer' => $streamer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idstreamer}", name="app_streamer_show", methods={"GET"})
     */
    public function show(Streamer $streamer): Response
    {
        return $this->render('streamer/show.html.twig', [
            'streamer' => $streamer,
        ]);
    }



    /**
     * @Route("/{idstreamer}", name="app_streamer_show2", methods={"GET"})
     */
    public function show2(Streamer $streamer): Response
    {
        return $this->render('streamer/show2.html.twig', [
            'streamer' => $streamer,
        ]);
    }



    /**
     * @Route("/{idstreamer}/edit", name="app_streamer_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Streamer $streamer, StreamerRepository $streamerRepository): Response
    {
        $form = $this->createForm(StreamerType::class, $streamer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $streamerRepository->add($streamer);
            return $this->redirectToRoute('app_streamer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('streamer/edit.html.twig', [
            'streamer' => $streamer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idstreamer}", name="app_streamer_delete", methods={"POST"})
     */
    public function delete(Request $request, Streamer $streamer, StreamerRepository $streamerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$streamer->getIdstreamer(), $request->request->get('_token'))) {
            $streamerRepository->remove($streamer);
        }

        return $this->redirectToRoute('app_streamer_index', [], Response::HTTP_SEE_OTHER);
    }
}
