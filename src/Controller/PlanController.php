<?php

namespace App\Controller;

use App\Entity\Plan;
use App\Form\PlanType;
use App\Repository\PlanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
            'plans' => $planRepository->findAll(),
        ]);
    }

    /**
     * @Route("/adminplan", name="adminplan", methods={"GET"})
     */
    public function adminplan(PlanRepository $planRepository): Response
    {
        return $this->render('plan/adminplan.html.twig', [
            'plans' => $planRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_plan_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PlanRepository $planRepository): Response
    {
        $plan = new Plan();
        $form = $this->createForm(PlanType::class, $plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $planRepository->add($plan);
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

}
