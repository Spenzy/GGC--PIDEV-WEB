<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Personne;
use App\Form\ClientType;
use App\Form\PersonneType;
use App\Repository\ClientRepository;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Knp\Component\Pager\PaginatorInterface;


/**
 * @Route("/client")
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/", name="app_client_index", methods={"GET"})
     */
    public function index(Request $request, SessionInterface $session, PersonneRepository $personneRepository, ClientRepository $clientRepository, PaginatorInterface $paginator): Response
    {
        if ($personneRepository->findOneBy(array('idPersonne' => $session->get("user_id")))->getRoles() == "admin") {

            $clients = $clientRepository->findAll();
            $clients = $paginator->paginate(
                $clients, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                3 /*limit per page*/
            );
            return $this->render('client/index.html.twig', [
                'clients' => $clients,
            ]);
        } else {
            //page not found
            return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);

        }
    }


    /**
     * @Route("/new2", name="app_client_new2", methods={"GET", "POST"})
     */
    public function new2(SessionInterface $session, Request $request, ClientRepository $clientRepository, PersonneRepository $personneRepository): Response
    {

        $personne = new Personne();
        $form = $this->createForm(PersonneType::class, $personne);
        $form->handleRequest($request);
        $client = new Client();


        if ($form->isSubmitted() && $form->isValid()) {
            //$em = $this->getDoctrine()->getManager();
            //$em->persist($personne);          
            //$em->flush();
            $personne->setRoles("user");
            $personneRepository->add($personne);
            //$id_selected = $form->getData()->getIdPersonne();
            $client->setIdclient($personne);
            //$em->persist($client);
            //$em->flush();
            $clientRepository->add($client);
            return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
        }

        $em = $this->getDoctrine()->getManager();

        return $this->render('client/new.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);


    }


    /**
     * @Route("/{idclient}", name="app_client_show", methods={"GET"})
     */
    public function show(SessionInterface $session, PersonneRepository $personneRepository, Client $client): Response
    {
        if ($personneRepository->findOneBy(array('idPersonne' => $session->get("user_id")))->getRoles() == "admin") {

            return $this->render('client/show.html.twig', [
                'client' => $client,
            ]);
        } else {
            //page not found
            return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);

        }
    }

    /**
     * @Route("/{idclient}/edit", name="app_client_edit", methods={"GET", "POST"})
     */
    public function edit(SessionInterface $session, PersonneRepository $personneRepository, Request $request, Client $client, ClientRepository $clientRepository): Response
    {
        if ($personneRepository->findOneBy(array('idPersonne' => $session->get("user_id")))->getRoles() == "admin") {

            $form = $this->createForm(ClientType::class, $client);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $clientRepository->add($client);
                return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->render('client/edit.html.twig', [
                'client' => $client,
                'form' => $form->createView(),
            ]);
        } else {
            //page not found
            return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);

        }
    }

    /**
     * @Route("/{idclient}", name="app_client_delete", methods={"POST"})
     */
    public function delete(SessionInterface $session, PersonneRepository $personneRepository, Request $request, Client $client, ClientRepository $clientRepository): Response
    {
        if ($personneRepository->findOneBy(array('idPersonne' => $session->get("user_id")))->getRoles() == "admin") {

            if ($this->isCsrfTokenValid('delete' . $client->getIdclient(), $request->request->get('_token'))) {
                $clientRepository->remove($client);
            }

            return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
        } else {
            //page not found
            return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);

        }
    }


}
