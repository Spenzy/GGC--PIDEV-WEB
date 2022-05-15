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
        $plans = $planRepository->findAll();
        $listeplan = array();
        $plan = array();
        foreach ($plans as $p) {

            $plan["idPlan"] = $p->getIdplan();
            $plan["idStreamer"] = $p->getIdstreamer()->getIdstreamer()->getIdPersonne();
            $plan["nomstreamer"] =$p->getIdstreamer()->getIdstreamer()->getNom();
            $plan["description"] = $p->getDescription();
            $plan["duree"] = $p->getDuree();
            $plan["heure"] = $p->getHeure();
            $plan["date"] = $p->getDate();
            $plan["idEvennement"] = $p->getIdevenement();
            $listeplan[] = $plan;

        }

        $jsonContent = $normalizer->normalize($listeplan, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }

    /**
     * @Route("/new", name="addPlan")
     */
    public function new(Request $request,MailerInterface $mailer, NormalizerInterface $Normalizer,PlanRepository $planRepository,StreamerRepository $streamerRepository): Response
    {
        $plan = new Plan();
        $plan->setIdstreamer($streamerRepository->find($request->get('idStreamer')));
        $plan->setDescription($request->get('description'));
        $plan->setDate($request->get('date'));
        $plan->setDuree($request->get('duree'));
        $plan->setHeure($request->get('heure'));
        $plan->setIdevenement($request->get('idEvennement'));
        $this->sendMailPlan($mailer, $plan, $plan->getIdstreamer()->getIdstreamer()->getEmail());
        $planRepository->add($plan);

        $pln["idStreamer"] = $plan->getIdstreamer()->getIdstreamer()->getIdPersonne();


        $jsonContent = $Normalizer->normalize($pln, 'json', ['groups' => 'post: read']);
        return new Response (json_encode($jsonContent));
    }
    /**
     *  @Route("/edit", name="editPlan")
     */
    public function editPlan (Request $request, NormalizerInterface $Normalizer,PlanRepository $planRepository,StreamerRepository $streamerRepository)
    {
        $plans = $planRepository->find($request->get('idavis'));

        $plan = new Plan();
        $plan->setIdstreamer($streamerRepository->find($request->get('idStreamer')));
        $plan->setDescription($request->get('description'));
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
    public function deletePlan (Request $request, NormalizerInterface $Normalizer, $idplan, PlanRepository $planRepository, ProduitRepository $produitRepository)
    {
        $plan = $planRepository->find($idplan);
        $planRepository->remove($plan);

        $jsonContent = $Normalizer->normalize($plan, 'json', ['groups' => 'post: read']);
        return new Response ("Avis supprime avec succes".json_encode($jsonContent));
    }

    public function sendMailPlan(MailerInterface $mailer,Plan $plan, $email)
        /*$client,$categorie,$montant)*/
    {

        $email = (new TemplatedEmail())
            ->from('gamergeekscommunity@gmail.com')
            ->to($email)
            ->subject('C est le temps !')
            ->text('Votre plan de streaming arrive, les gens vous attends !!')
            ->embedFromPath('img/LogoGGC.png', 'logo')
            ->htmlTemplate('emails/EmailPlan.html.twig')
            ->context([
                'plan'=>$plan,
            ]);

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            var_dump($e->getMessage());
        }


    }

}