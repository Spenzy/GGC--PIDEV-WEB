<?php


namespace App\services\JSON;

use App\Entity\Client;
use App\Entity\Commande;
use App\Entity\Lignecommande;
use App\Entity\Livraison;
use App\Form\CommandeType;
use App\Form\LignecommandeType;
use App\Repository\ClientRepository;
use App\Repository\CommandeRepository;
use App\Repository\LignecommandeRepository;
use App\Repository\LivraisonRepository;
use App\Repository\LivreurRepository;
use App\Repository\ProduitRepository;
use App\services\PanierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @Route("/JSON/commande")
 */
class ServiceCommande extends AbstractController
{
    /**
     * @Route("/getAll/", name="AllCommande")
     * @throws ExceptionInterface
     */
    public function AllCommande(NormalizerInterface $normalizer,CommandeRepository $commandeRepository): Response
    {
        $commandes = $commandeRepository->findAll();
        $List = array();
        foreach ($commandes as $p) {

            $com = (array)$p;
            foreach ($com as $k => $v) {
                $newkey = substr($k, 21);
                $com[$newkey] = $com[$k];
                unset($com[$k]);
            }

            $com["nomclient"] =$p->getIdclient()->getIdClient()->getNom();
            $com["idclient"] =$p->getIdclient()->getIdClient()->getIdPersonne();
            $List[] = $com;

        }

        $jsonContent = $normalizer->normalize($List, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }
    /**
     * @Route("/new", name="addLivraison")
     */
    public function new(Request $request, NormalizerInterface $Normalizer,LivraisonRepository $livraisonRepository,CommandeRepository $commandeRepository,LivreurRepository $livreurRepository): Response
    {
        $liv = new Livraison();
        $liv->setIdcommande($commandeRepository->find($request->get('idcommande')));
        $liv->setIdlivreur($livreurRepository->find($request->get('idlivreur')));
        $liv->setDateheure($request->get('date'));
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
     *  @Route("/delete/{idcommande}", name="deleteCommande")
     */
    public function deleteCommande (Request $request, NormalizerInterface $Normalizer, $idcommande,CommandeRepository $commandeRepository)
    {
        $liv = $commandeRepository->find($idcommande);
        $commandeRepository->remove($liv);

        $jsonContent = $Normalizer->normalize($liv, 'json', ['groups' => 'post: read']);
        return new Response ("Livraison supprime avec succes".json_encode($jsonContent));
    }

}
