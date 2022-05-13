<?php

namespace App\services\JSON;

use App\Entity\Client;
use App\Entity\Personne;
use App\Entity\Produit;
use App\Entity\Publication;
use App\Entity\Streamer;
use App\Form\CommentaireType;
use App\Form\PublicationType;
use App\Repository\AvisRepository;
use App\Repository\ClientRepository;
use App\Repository\CommentaireRepository;
use App\Repository\PersonneRepository;
use App\Repository\ProduitRepository;
use App\Repository\PublicationRepository;
use App\Repository\StreamerRepository;
use App\Repository\VoteRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Dompdf\Dompdf;
use Dompdf\Options;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/JSON/streamer")
 */
class StreamerService extends AbstractController
{
    /**
     * @Route("/getAll", name="AllStreamer")
     * @throws ExceptionInterface
     */
    public function AllStreamer(NormalizerInterface $normalizer, StreamerRepository $streamerRepository): Response
    {
        $streamers = $streamerRepository->findAll();
        $listStreamer = array();
        $stream = array();
        foreach ($streamers as $s) {


            $stream["idStreamer"] = $s->getIdstreamer()->getIdPersonne();
            $stream["informations"] =$s->getInformations();
            $stream["lienStreaming"] = $s->getLienstreaming();
            $listStreamer[] = $stream;

        }

        $jsonContent = $normalizer->normalize($listStreamer, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }

    /**
     * @Route("/get/{reference}", name="getStreamer")
     * @throws ExceptionInterface
     */
    public function getStreamer(Request $request, $reference, StreamerRepository $streamerRepository, NormalizerInterface $normalizer)
    {
        $streamer = $streamerRepository->find($reference);
        $stream = (array)$streamer;
        foreach ($stream as $k => $v) {
            $newkey = substr($k, 21);
            $stream[$newkey] = $stream[$k];
            unset($stream[$k]);
        }

        $jsonContent = $normalizer->normalize($stream, 'json', ['groups' => 'post: read']);

        return new Response (json_encode($jsonContent));
    }
    /**
     * @Route("/new", name="addStreamer")
     */
    public function new(Request $request, NormalizerInterface $Normalizer,StreamerRepository $streamerRepository, PersonneRepository $personneRepository): Response
    {
        $streamer = new Streamer();
        $streamer->setIdstreamer($personneRepository->find($request->get('idStreamer')));
        $streamer->setInformations($request->get('informations'));
        $streamer->setLienstreaming($request->get('lienStreaming'));

        $streamerRepository->add($streamer);

        $stream = (array)$streamer;
        foreach ($stream as $k => $v) {
            $newkey = substr($k, 21);
            $stream[$newkey] = $stream[$k];
            unset($stream[$k]);
        }

        
        $jsonContent = $Normalizer->normalize($stream, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }
    /**
     *  @Route("/edit", name="editStreamer")
     */
    public function editStreamer (Request $request, NormalizerInterface $Normalizer,PersonneRepository $personneRepository,StreamerRepository $streamerRepository)
    {
        $streamer = $streamerRepository->find($request->get('idStreamer'));

        $streamer->setIdstreamer($personneRepository->find($request->get('idStreamer')));
        $streamer->setInformations($request->get('informations'));
        $streamer->setLienstreaming($request->get('lienStreaming'));


        $streamerRepository->add($streamer);

        $jsonContent = $Normalizer->normalize($streamer, 'json', ['groups' => 'post: read']);
        return new Response ("Streamer modifier avec succes".json_encode($jsonContent));
    }

    /**
     *  @Route("/delete/{idstreamer}", name="deleteStreamer")
     */
    public function deleteStreamer (Request $request, NormalizerInterface $Normalizer, $idstreamer,StreamerRepository $streamerRepository)
    {
        $streamer = $streamerRepository->find($idstreamer);

        $streamerRepository->remove($streamer);

        $jsonContent = $Normalizer->normalize($streamer, 'json', ['groups' => 'post: read']);
        return new Response ("Produit supprime avec succes".json_encode($jsonContent));
    }



}