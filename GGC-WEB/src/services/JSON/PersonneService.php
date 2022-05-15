<?php

namespace App\services\JSON;

use App\Entity\Personne;
use App\Form\PersonneType;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;



/**
 * @Route("/JSON/personne")
 */
class PersonneService extends AbstractController
{

    /**
     * @Route("/liste/api", name="listeapi", methods={"GET"})
     */
    public function liste(PersonneRepository $client, SerializerInterface $serializerInterface)
    {
        // On récupère la liste des articles
        $clients = $client->findAll();



        $json= $serializerInterface->serialize($clients, 'json', ['groups' => 'cl']);

        $response = new Response($json, 200, [
            "Content_Type" => "application/json"
        ]);
        return $response;
    }

    /**
     * @Route("/login/{id}" , name="log")
     */
    public function login($id,Request $request,PersonneRepository $personneRepository, NormalizerInterface $Normalizer)
    {
        $email = $request->get("email");
        $password = $request->get("password");
        if ($email != "" && $password != "") {
            //$personne = $personneRepository->login($email,$password);
            $personne=$personneRepository->findOneBy(array('email'=>$email,'password'=>$password));

            if($personne==null) {
                return new JsonResponse(array('idclient'=>0));
            }else{
                return new JsonResponse(array('idclient'=>$personne->getIdPersonne()));

            }


        }

    }

    /**
     * @Route("/api/liste/{id}", name="listeper", methods={"GET"})
     */
    public function clientdetails(PersonneRepository $client, SerializerInterface $serializerInterface,$id)
    {
        // On récupère la liste des articles
        $clients = $client->find($id);



        $json= $serializerInterface->serialize($clients, 'json', ['groups' => 'cl']);

        $response = new Response($json, 200, [
            "Content_Type" => "application/json"
        ]);
        return $response;
    }

    /**
     * @Route("/ajoutercl/new", name="ajouteper")
     * methods={"POST"}
     */
    public function addclient(SessionInterface $session, Request $request, PersonneRepository $personneRepository): Response
    {

        $personne = new Personne();


        $em =$this->getDoctrine()->getManager();
        $personne->setNom($request->get('nom'));
        $personne->setPrenom($request->get('prenom'));
        $personne->setDatenaissance(new \DateTime($request->get('datenaissance')));

        $personne->setEmail($request->get('email'));
        $personne->setTelephone($request->get('telephone'));
        $personne->setPassword($request->get('password'));





        $personne->setRoles("user");
        $em->persist($personne);

        //$personneRepository->add($personne);
        //$id_selected = $form->getData()->getIdPersonne();

        $em->flush();
        // $clientRepository->add($client);
        return new Response("client added");



    }
    /**
     * @Route("/modifier/{id}", name="modifierper")
     * methods={"POST"}
     */
    public function modifierclient($id,SessionInterface $session, Request $request,  PersonneRepository $personneRepository): Response
    {


        $em = $this->getDoctrine()->getManager();
        $personne = $em->getRepository(Personne::class)->find($id);


        $em =$this->getDoctrine()->getManager();
        $personne->setNom($request->get('nom'));
        $personne->setPrenom($request->get('prenom'));
        $personne->setDatenaissance(new \DateTime($request->get('datenaissance')));

        $personne->setEmail($request->get('email'));
        $personne->setTelephone($request->get('telephone'));
        $personne->setPassword($request->get('password'));





        $personne->setRoles("user");
        $em->persist($personne);

        //$personneRepository->add($personne);
        //$id_selected = $form->getData()->getIdPersonne();

        $em->flush();
        // $clientRepository->add($client);
        return new Response("client modifier");
    }
    /**
     * @param $id
     * @Route("/deleteblApi/{id}", name="deleteblApipers")
     * methods={"GET"}
     */
    public function deleteBlogApi(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository(Personne::class)->find($id);
        if ($client) {
            $em->remove($client);
            $em->flush();
            return new JsonResponse('Deleted', 200);
        }
        return new JsonResponse('Error not found', 500);
    }

}