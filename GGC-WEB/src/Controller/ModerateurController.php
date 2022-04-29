<?php

namespace App\Controller;
use App\Form\PersonneType;
use App\Entity\Personne;
use App\Repository\PersonneRepository;
use App\Entity\Moderateur;
use App\Form\Moderateur1Type;
use App\Repository\ModerateurRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;


/**
 * @Route("/moderateur")
 */
class ModerateurController extends AbstractController
{
    /**
     * @Route("/", name="app_moderateur_index", methods={"GET"})
     */
    public function index(Request $request,SessionInterface $session,ModerateurRepository $moderateurRepository,PersonneRepository $personneRepository,PaginatorInterface $paginator): Response
    {
        if($personneRepository->findOneBy(array('idPersonne'=>$session->get("user_id")))->getRoles()=="admin"){
            $moderateurs = $moderateurRepository->findAll();
            $moderateurs = $paginator->paginate(
                $moderateurs, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                3 /*limit per page*/
            
        );
        return $this->render('moderateur/index.html.twig', [
           
        'moderateurs' => $moderateurs,
            ]);
    }
    
    else {
        // page not found
        return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);
    }
}

    /**
     * @Route("/new", name="app_moderateur_new", methods={"GET", "POST"})
     */
    public function new(SessionInterface $session,Request $request, ModerateurRepository $moderateurRepository, PersonneRepository $personneRepository): Response
    {
        if($personneRepository->findOneBy(array('idPersonne'=>$session->get("user_id")))->getRoles()=="admin"){
        $personne = new Personne();
        $form = $this->createForm(PersonneType::class, $personne);
        $form->handleRequest($request);
        $moderateur = new Moderateur();
        


        if ($form->isSubmitted() && $form->isValid()) {
            $personne->setRoles("moderateur");

            $personneRepository->add($personne);
            $moderateur->setIdModerateur($personne);
            $moderateurRepository->add($moderateur);
            return $this->redirectToRoute('app_moderateur_index', [], Response::HTTP_SEE_OTHER);
        }
        
        $em = $this->getDoctrine()->getManager();
        
             return $this->render('moderateur/new.html.twig', [
            'moderateur' => $moderateur,
            'form' => $form->createView(),
        ]);

    }else {
        //page not found
        return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);
    }
    }

    /**
     * @Route("/{idModerateur}", name="app_moderateur_show", methods={"GET"})
     */
    public function show(SessionInterface $session,PersonneRepository $personneRepository,Moderateur $moderateur): Response

    
    {
        if($personneRepository->findOneBy(array('idPersonne'=>$session->get("user_id")))->getRoles()=="admin"){
        return $this->render('moderateur/show.html.twig', [
            'moderateur' => $moderateur,
        ]);
        } else {
            //page not found
        return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);
        }
    }

    /**
     * @Route("/{idModerateur}/edit", name="app_moderateur_edit", methods={"GET", "POST"})
     */
    public function edit(SessionInterface $session,PersonneRepository $personneRepository,Request $request, Moderateur $moderateur, ModerateurRepository $moderateurRepository): Response
    {
        if($personneRepository->findOneBy(array('idPersonne'=>$session->get("user_id")))->getRoles()=="admin"){

        $form = $this->createForm(PersonneType::class, $moderateur->getIdModerateur());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $moderateurRepository->add($moderateur);
            return $this->redirectToRoute('app_moderateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('moderateur/edit.html.twig', [
            'moderateur' => $moderateur,
            'form' => $form->createView(),
        ]);
    }else{
        //page not found
        return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);
    }
    }

    /**
     * @Route("/{idModerateur}", name="app_moderateur_delete", methods={"POST"})
     */
    public function delete(SessionInterface $session,PersonneRepository $personneRepository,Request $request, Moderateur $moderateur, ModerateurRepository $moderateurRepository): Response
    {
        if($personneRepository->findOneBy(array('idPersonne'=>$session->get("user_id")))->getRoles()=="admin"){

        if ($this->isCsrfTokenValid('delete'.$moderateur->getIdModerateur(), $request->request->get('_token'))) {
            $moderateurRepository->remove($moderateur);
        }

        return $this->redirectToRoute('app_moderateur_index', [], Response::HTTP_SEE_OTHER);
    }else {
        //page not found
        return $this->redirectToRoute('app_home_page', [], Response::HTTP_SEE_OTHER);

    }
}
}






