<?php

namespace App\Controller;

use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(SessionInterface $session,PersonneRepository $personneRepository): Response
    {
        if($personneRepository->findOneBy(array('idPersonne'=>$session->get("user_id")))->getRoles()=="admin"){


        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }else{
        //page not found
        return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);

    }
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
    public function login(SessionInterface $session,Request $request,PersonneRepository $personneRepository){
        $email=$request->get("email","");
        $password=$request->get("password","");
        if($email!="" && $password!=""){
        
        $personne=$personneRepository->findOneBy(array('email'=>$email));
        if($personne->getRoles()=="user"){
            $session->set("user_id", $personne->getIdPersonne());
            return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);
        }
        if($personne->getRoles()=="admin"){
            $session->set("user_id", $personne->getIdPersonne());
            return $this->redirectToRoute('app_moderateur_index', [], Response::HTTP_SEE_OTHER);

        }
        if($personne->getRoles()=="moderateur"){
            $session->set("user_id", $personne->getIdPersonne());
            return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
        }
        
    }
}
}
