<?php


namespace App\services\JSON;
use \Datetime;
use App\Entity\Livraison;
use App\Repository\ClientRepository;
use App\Repository\CommandeRepository;
use App\Repository\LivraisonRepository;
use App\Repository\LivreurRepository;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/JSON/livraison")
 */
class LivraisonService extends AbstractController
{
    /**
     * @Route("/getAll/", name="AllLivraison")
     * @throws ExceptionInterface
     */
    public function AllLivraison(NormalizerInterface $normalizer,LivraisonRepository $livraisonRepository): Response
    {
        $livraisons = $livraisonRepository->findAll();
        $List = array();
        foreach ($livraisons as $p) {

            $liv = (array)$p;
            foreach ($liv as $k => $v) {
                $newkey = substr($k, 22);
                $liv[$newkey] = $liv[$k];
                unset($liv[$k]);
            }
            $liv["idcommande"] = $p->getIdcommande()->getIdcommande();
            $liv["nomlivreur"] =$p->getIdlivreur()->getIdlivreur()->getNom();
            $liv["idlivreur"] =$p->getIdlivreur()->getIdlivreur()->getIdPersonne();
            $List[] = $liv;

        }

        $jsonContent = $normalizer->normalize($List, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }
    /**
     * @Route("/getAllLivreurs/", name="AllLivreur")
     * @throws ExceptionInterface
     */
    public function AllLivreur(NormalizerInterface $normalizer,LivreurRepository $livreurRepository): Response
    {
        $livreurs = $livreurRepository->findAll();
        $List = array();
        foreach ($livreurs as $p) {

            $liv = (array)$p;
            foreach ($liv as $k => $v) {
                $newkey = substr($k, 20);
                $liv[$newkey] = $liv[$k];
                unset($liv[$k]);
            }

            $liv["idlivreur"] =$p->getIdlivreur()->getIdPersonne();
            $List[] = $liv;

        }

        $jsonContent = $normalizer->normalize($List, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }
    /**
     * @Route("/new", name="addLivrai")
     */
    public function new(Request $request, NormalizerInterface $Normalizer,LivraisonRepository $livraisonRepository,CommandeRepository $commandeRepository,LivreurRepository $livreurRepository): Response
    {
        $liv = new Livraison();
        $parameters = json_decode($request->getContent(), true);

        $liv->setIdcommande($commandeRepository->find($parameters['idcommande']));
        $liv->setIdlivreur($livreurRepository->find($parameters['idlivreur']));
        $liv->setDateheure(new \DateTime($parameters['dateheure']));
        $livraisonRepository->add($liv);

        $livraison = (array)$liv;
        foreach ($livraison as $k => $v) {
            $newkey = substr($k, 22);
            $livraison[$newkey] = $livraison[$k];
            unset($livraison[$k]);
        }
        $livraison["idcommande"] = $liv->getIdcommande()->getIdcommande();
        $livraison["idlivreur"] =$liv->getIdlivreur()->getIdlivreur()->getIdPersonne();

        $jsonContent = $Normalizer->normalize($livraison, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($livraison));
    }
    /**
     *  @Route("/edit", name="editLivr")
     */
    public function editLivraison (Request $request, NormalizerInterface $Normalizer,LivraisonRepository $livraisonRepository,LivreurRepository $livreurRepository)
    {
        $parameters = json_decode($request->getContent(), true);
        $livraison = $livraisonRepository->find($parameters['idcommande']);

        $livraison->setIdlivreur($livreurRepository->find($parameters['idlivreur']));
        $livraison->setDateheure(new \DateTime($parameters['dateheure']));
        $livraisonRepository->add($livraison);

        $jsonContent = $Normalizer->normalize($livraison, 'json', ['groups' => 'post: read']);
        return new Response ("livraison modifier avec succes".json_encode($jsonContent));
    }

    /**
     *  @Route("/delete/{idcommande}", name="deleteLiv")
     */
    public function deleteLivraison (Request $request, NormalizerInterface $Normalizer, $idcommande,LivraisonRepository $livraisonRepository)
    {
        $liv = $livraisonRepository->find($idcommande);
        $livraisonRepository->remove($liv);

        $jsonContent = $Normalizer->normalize($liv, 'json', ['groups' => 'post: read']);
        return new Response ("Livraison supprime avec succes".json_encode($jsonContent));
    }

    public function objectToArray($publication): array
    {
        $pub = (array)$publication;
        foreach ($pub as $k => $v) {
            $newkey = substr($k, 21);
            $pub[$newkey] = $pub[$k];
            unset($pub[$k]);
        }
        return $pub;
    }
}