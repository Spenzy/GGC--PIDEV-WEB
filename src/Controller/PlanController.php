<?php

namespace App\Controller;

use App\Entity\Plan;
use App\Form\PlanType;
use App\Entity\Personne;
use App\Repository\PlanRepository;
use App\Repository\PersonneRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/plan")
 */
class PlanController extends AbstractController
{
    /**
     * @Route("/", name="app_plan_index", methods={"GET"})
     */
    public function index(PlanRepository $planRepository): Response
    {
        return $this->render('plan/index.html.twig', [
            'plans' => $planRepository->findAllPlans(),
        ]);
    }

    
    /**
     * @Route("/new", name="app_plan_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PlanRepository $planRepository, MailerInterface $mailer, PersonneRepository $pr): Response
    {
        $plan = new Plan();
        $p = new Personne();
        $form = $this->createForm(PlanType::class, $plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            
            $planRepository->add($plan);
            $p = $pr->find($plan->getIdstreamer());
            $this->sendMailPlan($mailer, $plan, $p->getEmail());
            return $this->redirectToRoute('app_plan_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('plan/new.html.twig', [
            'plan' => $plan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idplan}", name="app_plan_show", methods={"GET"})
     */
    public function show(Plan $plan): Response
    {
        return $this->render('plan/show.html.twig', [
            'plan' => $plan,
        ]);
    }

  

    /**
     * @Route("/{idplan}/edit", name="app_plan_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Plan $plan, PlanRepository $planRepository): Response
    {
        $form = $this->createForm(PlanType::class, $plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $planRepository->add($plan);
            return $this->redirectToRoute('app_plan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('plan/edit.html.twig', [
            'plan' => $plan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idplan}", name="app_plan_delete", methods={"POST"})
     */
    public function delete(Request $request, Plan $plan, PlanRepository $planRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plan->getIdplan(), $request->request->get('_token'))) {
            $planRepository->remove($plan);
        }
        return $this->redirectToRoute('app_plan_index', [], Response::HTTP_SEE_OTHER);
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