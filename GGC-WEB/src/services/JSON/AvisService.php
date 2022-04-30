<?php

namespace App\services\JSON;
use App\Entity\Avis;
use App\Entity\Produit;
use App\Entity\Publication;
use App\Form\CommentaireType;
use App\Form\PublicationType;
use App\Repository\AvisRepository;
use App\Repository\ClientRepository;
use App\Repository\CommentaireRepository;
use App\Repository\ProduitRepository;
use App\Repository\PublicationRepository;
use App\Repository\VoteRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/JSON/avis")
 */
class AvisService extends AbstractController
{

    /**
     * @Route("/getAll/{reference}", name="AllAvis")
     * @throws ExceptionInterface
     */
    public function AllAvis(int $reference,NormalizerInterface $normalizer,AvisRepository $avisRepository): Response
    {
        $avis = $avisRepository->findAvis($reference);
        $Listavis = array();
        foreach ($avis as $p) {

            $avi = (array)$p;
            foreach ($avi as $k => $v) {
                $newkey = substr($k, 17);
                $avi[$newkey] = $avi[$k];
                unset($avi[$k]);
            }
            $avi["idclient"] = $p->getIdClient()->getIdClient()->getIdPersonne();
            $avi["nomclient"] =$p->getIdClient()->getIdClient()->getNom();
            $avi["referenceproduit"] =$p->getReferenceproduit()->getReference();
            $Listavis[] = $avi;

        }

        $jsonContent = $normalizer->normalize($Listavis, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }
    /**
     * @Route("/new", name="addAvis")
     */
    public function new(Request $request, NormalizerInterface $Normalizer,AvisRepository $avisRepository,ProduitRepository $produitRepository,ClientRepository $clientRepository): Response
    {
        $avi = new Avis();
        $avi->setReferenceproduit($produitRepository->find($request->get('referenceproduit')));
        $avi->setIdclient($clientRepository->find($request->get('idclient')));
        $avi->setType($request->get('type'));
        $avi->setDescription($request->get('description'));

        $avisRepository->add($avi);

        $av = (array)$avi;
        foreach ($av as $k => $v) {
            $newkey = substr($k, 17);
            $av[$newkey] = $av[$k];
            unset($av[$k]);
        }
        $av["idclient"] = $avi->getIdClient()->getIdClient()->getIdPersonne();
        $av["referenceproduit"] =$avi->getReferenceproduit()->getReference();

        $jsonContent = $Normalizer->normalize($av, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($av));
    }
    /**
     *  @Route("/edit", name="editAvis")
     */
    public function editAvis (Request $request, NormalizerInterface $Normalizer,AvisRepository $avisRepository)
    {
        $avis = $avisRepository->find($request->get('idavis'));

        $avis->setType($request->get('type'));
        $avis->setDescription($request->get('description'));
        $avisRepository->add($avis);

        $jsonContent = $Normalizer->normalize($avis, 'json', ['groups' => 'post: read']);
        return new Response ("Avis modifier avec succes".json_encode($jsonContent));
    }

    /**
     *  @Route("/delete/{idAvis}", name="deleteAvis")
     */
    public function deleteAvis (Request $request, NormalizerInterface $Normalizer, $idAvis,AvisRepository $avisRepository,ProduitRepository $produitRepository)
    {
        $avis = $avisRepository->find($idAvis);
        $avisRepository->remove($avis);

        $jsonContent = $Normalizer->normalize($avis, 'json', ['groups' => 'post: read']);
        return new Response ("Avis supprime avec succes".json_encode($jsonContent));
    }
}