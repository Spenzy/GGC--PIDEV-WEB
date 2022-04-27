<?php

namespace App\Controller;

use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="app_home_page")
     */
    public function index(SessionInterface $session, PersonneRepository $pr): Response
    {
        if ($pr->findOneBy(array('idPersonne' => $session->get("user_id")))->getRoles() == "user") {
            return $this->render('home_page/index.html.twig', [
                'controller_name' => 'HomePageController',
            ]);
        }
        return $this->redirectToRoute('app_login_page', [], Response::HTTP_SEE_OTHER);
    }
}
