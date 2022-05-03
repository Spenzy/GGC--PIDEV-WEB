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
    public function new(Request $request, NormalizerInterface $Normalizer,ProduitRepository $produitRepository,LignecommandeRepository $lignecommandeRepository,ClientRepository $clientRepository,CommandeRepository $commandeRepository): Response
    {
        $commande = new Commande();
        $parameters = json_decode($request->getContent(), true);

        $commande->setAdresse($parameters['adresse']);
        $commande->setLivree(false);
        $commande->setDatecommande(new \DateTime('today'));
        $commande->setPrix($parameters['prix']);
        $commande->setIdclient($clientRepository->find($parameters['idclient']));

        $commandeRepository->add($commande);

        $lignes = (array) $parameters['lignescommande'];
        foreach ( $lignes as $lc) {
            $idproduit = $lc['idproduit'];
            $quantite = $lc['quantite'];
            $prix = $lc['prix'];

            $ligne = new Lignecommande();
            $ligne->setIdcommande($commande);

            $product = $produitRepository->find($idproduit);
            $ligne->setIdproduit($product);
            $ligne->setQuantite($quantite);
            $ligne->setPrix($prix);

            $lignecommandeRepository->add($ligne);

        }

        $commande= $this->objectToArray($commande);

        $jsonContent = $Normalizer->normalize($commande, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
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
