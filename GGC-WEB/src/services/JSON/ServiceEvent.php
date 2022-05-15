<?php

namespace App\services\JSON;
use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
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
 * @Route("JSON/evennement")
 */
class ServiceEvent extends AbstractController
{

    /**
     * @Route("/Allevents", name="Allevents")
     */
    public function AlleventsJSON(NormalizerInterface $Normalizer)
    {
        $repository = $this->getDoctrine()->getRepository(Evenement::class);
        $event = $repository->findAll();
        $jsonContent = $Normalizer->normalize($event, 'json', ['groups' => 'event:read']);
        return new Response(json_encode($jsonContent));
    }

    /**
     * @Route("/addevent", name="addevent")
     */
    public function addjsonevent(Request $req,MailerInterface $mailer , NormalizerInterface $Normalizer, EntityManagerInterface $em)
    {
        $em = $this->getDoctrine()->getManager();
        $event = new Evenement();

        $event->setReference($req->get('reference'));
        $event->setDescription($req->get('description'));
        $event->setLocalisation($req->get('localisation'));
        $event->setNbrparticipant($req->get('nbrParticipant'));
        $event->setTitre($req->get('titre'));
        $em->persist($event);
        $em->flush();

        $message = (new Email())
            ->from('gamergeekscommunity@gmail.com')
            ->to('gamergeekscommunity@gmail.com')
            ->subject("GamerGeeks")
            ->html("<p>bonjour Mr , Mdme</p><p> une nouvelle evenement a ete ajoute ". $event->getTitre()."</p> dans la ville ". $event->getLocalisation()."<p></p><p> Cordiallement , </p>");

        $mailer->send($message);

        $jsonContent = $Normalizer->normalize($event, 'json', ['groups' => 'event:read']);
        return new Response(json_encode($jsonContent));
    }

    /**
     * @Route("/deleteEvent/{reference}", name="deleteEvent")
     */

    public function deleteEventAction(Request $request, NormalizerInterface $Normalizer)
    {
        $ref = $request->get("reference");

        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository(Evenement::class)->find($ref);
        if ($event != null) {
            $em->remove($event);
            $em->flush();

            $jsonContent = $Normalizer->normalize($event, 'json', ['groups' => 'event:read']);
            return new Response("Delete successfully" . json_encode($jsonContent));

        }

    }

    /**
     * @Route("/updateEvent", name="updateEvent")
     */
    public function modifierEvent(Request $request ,NormalizerInterface $Normalizer) {
        $em = $this->getDoctrine()->getManager();
        $event = $this->getDoctrine()->getManager()
            ->getRepository(Evenement::class)
            ->find($request->get("reference"));

        $event->setReference($request->get('reference'));
        $event->setDescription($request->get('description'));
        $event->setLocalisation($request->get('localisation'));
        $event->setNbrparticipant($request->get('nbrParticipant'));
        $event->setTitre($request->get('titre'));
        $em->persist($event);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $jsonContent = $Normalizer->normalize($event,'json',['groups'=>'event:read']);
        return new Response("Update successfully".json_encode($jsonContent));

    }

    /**
     * @Route("/get/{reference}", name="getEvent")
     * @throws ExceptionInterface
     */
    public function getEvent(Request $request, $reference, EvenementRepository $evenementRepository, NormalizerInterface $normalizer)
    {
        $event = $evenementRepository->find($reference);
        $evenement = (array)$event;
        foreach ($evenement as $k => $v) {
            $newkey = substr($k, 20);
            $evenement[$newkey] = $evenement[$k];
            unset($evenement[$k]);
        }

        $jsonContent = $normalizer->normalize($evenement, 'json', ['groups' => 'event: read']);

        return new Response (json_encode($jsonContent));
    }



}
