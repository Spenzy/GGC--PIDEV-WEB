<?php

namespace App\services\JSON;
use App\Entity\Avis;
use App\Entity\Plan;
use App\Entity\Produit;
use App\Entity\Publication;
use App\Form\CommentaireType;
use App\Form\PublicationType;
use App\Repository\AvisRepository;
use App\Repository\ClientRepository;
use App\Repository\CommentaireRepository;
use App\Repository\PlanRepository;
use App\Repository\ProduitRepository;
use App\Repository\PublicationRepository;
use App\Repository\StreamerRepository;
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
 * @Route("/JSON/plan")
 */
class PlanService extends AbstractController
{

    /**
     * @Route("/getAll", name="AllPlan")
     * @throws ExceptionInterface
     */
    public function AllPlan(NormalizerInterface $normalizer,PlanRepository $planRepository): Response
    {
        $plans = $planRepository->findAllPlans();
        $listeplan = array();
        foreach ($plans as $p) {

            $plan = (array)$p;
            foreach ($plans as $k => $v) {
                $newkey = substr($k, 17);
                $plan[$newkey] = $plan[$k];
                unset($plan[$k]);
            }

            $plan["idclient"] = $p->getIdClient()->getIdClient()->getIdPersonne();
            $plan["nomclient"] =$p->getIdClient()->getIdClient()->getNom();
            $plan["referenceproduit"] =$p->getReferenceproduit()->getReference();
            $listeplan[] = $plan;

        }

        $jsonContent = $normalizer->normalize($listeplan, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }
    /**
     * @Route("/new", name="addPlan")
     */
    public function new(Request $request, NormalizerInterface $Normalizer,PlanRepository $planRepository,StreamerRepository $streamerRepository): Response
    {
        $plan = new Plan();
        $plan->setIdstreamer($produitRepository->find($request->get('idStreamer')));
        $plan->setDescription($clientRepository->find($request->get('description')));
        $plan->setDate($request->get('date'));
        $plan->setDuree($request->get('duree'));
        $plan->setHeure($request->get('heure'));
        $plan->setIdevenement($request->get('idEvenement'));
        $planRepository->add($plan);

        $pln = (array)$plan;
        foreach ($pln as $k => $v) {
            $newkey = substr($k, 17);
            $pln[$newkey] = $pln[$k];
            unset($pln[$k]);
        }
        $pln["idStreamer"] = $plan->getIdstreamer()->getIdstreamer()->getIdPersonne();


        $jsonContent = $Normalizer->normalize($pln, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($pln));
    }
    /**
     *  @Route("/edit", name="editPlan")
     */
    public function editPlan (Request $request, NormalizerInterface $Normalizer,PlanRepository $planRepository)
    {
        $plans = $planRepository->find($request->get('idavis'));

        $plan = new Plan();
        $plan->setIdstreamer($produitRepository->find($request->get('idStreamer')));
        $plan->setDescription($clientRepository->find($request->get('description')));
        $plan->setDate($request->get('date'));
        $plan->setDuree($request->get('duree'));
        $plan->setHeure($request->get('heure'));
        $plan->setIdevenement($request->get('idEvenement'));
        $planRepository->add($plan);

        $jsonContent = $Normalizer->normalize($plans, 'json', ['groups' => 'post: read']);
        return new Response ("Avis modifier avec succes".json_encode($jsonContent));
    }

    /**
     *  @Route("/delete/{idplan}", name="deletePlan")
     */
    public function deleteAvis (Request $request, NormalizerInterface $Normalizer, $idplan, PlanRepository $planRepository, ProduitRepository $produitRepository)
    {
        $plan = $planRepository->find($idplan);
        $planRepository->remove($plan);

        $jsonContent = $Normalizer->normalize($plan, 'json', ['groups' => 'post: read']);
        return new Response ("Avis supprime avec succes".json_encode($jsonContent));
    }
}