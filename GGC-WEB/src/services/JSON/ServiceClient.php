<?php

namespace App\services\JSON;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;



/**
 * @Route("JSON/client")
 */
class ServiceClient extends AbstractController
{

    /**
     * @Route("/liste/apii", name="listeapii", methods={"GET"})
     */
    public function liste(ClientRepository $client,NormalizerInterface $normalizer)
    {
        // On récupère la liste des articles
        $clients = $client->findAll();
        $listeClient = array();
        $listeClients = array();

        foreach($clients as $c){
            $nbrAvert = $c->getNbravertissement();
            if($nbrAvert == NULL){
                $nbrAvert = 0;
            }
            $listeClient["nbravertissement"]=$nbrAvert;
            $ban = $c->getBan();
            if($ban == NULL){
                $ban = 0;
            }
            $listeClient["ban"]=$ban;
            $listeClient["idclient"] = $c->getIdClient()->getIdPersonne();
            $listeClients[]=$listeClient;
        }
        $jsonContent = $normalizer->normalize($listeClients, 'json', ['groups' => 'cl']);
        return new Response (json_encode($jsonContent));
    }

    /**
     * @Route("/api/liste/{id}", name="liste", methods={"GET"})
     */
    public function clientdetails(ClientRepository $client, SerializerInterface $serializerInterface,$id)
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
     * @Route("/ajoutercl1/new", name="ajouterc")
     * methods={"POST"}
     */
    public function addclient(SessionInterface $session, Request $request, ClientRepository $clientRepository, PersonneRepository $personneRepository): Response
    {

        $personne = new Personne();

        $client = new Client();
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
        $client->setIdclient($personne);
        $em->persist($client);
        $em->flush();
        // $clientRepository->add($client);
        return new Response("client added");



    }
    /**
     * @Route("/modifier/{id}", name="modifier")
     * methods={"POST"}
     */
    public function modifierclient($id,SessionInterface $session, Request $request, ClientRepository $clientRepository, PersonneRepository $personneRepository): Response
    {


        $em = $this->getDoctrine()->getManager();
        $personne = $em->getRepository(Personne::class)->find($id);

        $client =$em->getRepository(Client::class)->find($id);
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
        $client->setIdclient($personne);
        $em->persist($client);
        $em->flush();
        // $clientRepository->add($client);
        return new Response("client modifier");
    }
    /**
     * @param $id
     * @Route("/deleteblApi/{id}", name="deleteblApi")
     * methods={"GET"}
     */
    public function deleteBlogApi(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository(Client::class)->find($id);
        if ($client) {
            $em->remove($client);
            $em->flush();
            return new JsonResponse('Deleted', 200);
        }
        return new JsonResponse('Error not found', 500);
    }



}
