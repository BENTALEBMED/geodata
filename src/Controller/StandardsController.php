<?php

namespace App\Controller;

use App\Entity\Standards;
use App\Form\StandardsType;
use App\Repository\StandardsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/standards")
 */
class StandardsController extends AbstractController
{
    /**
     * @Route("/", name="standards_index", methods={"GET"})
     */
    public function index(StandardsRepository $standardsRepository): Response
    {
        return $this->render('standards/index.html.twig', [
            'standards' => $standardsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="standards_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $standard = new Standards();
        $form = $this->createForm(StandardsType::class, $standard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($standard);
            $entityManager->flush();

            return $this->redirectToRoute('standards_index');
        }

        return $this->render('standards/new.html.twig', [
            'standard' => $standard,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="standards_show", methods={"GET"})
     */
    public function show(Standards $standard): Response
    {
        return $this->render('standards/show.html.twig', [
            'standard' => $standard,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="standards_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Standards $standard): Response
    {
        $form = $this->createForm(StandardsType::class, $standard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('standards_index');
        }

        return $this->render('standards/edit.html.twig', [
            'standard' => $standard,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="standards_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Standards $standard): Response
    {
        if ($this->isCsrfTokenValid('delete'.$standard->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($standard);
            $entityManager->flush();
        }

        return $this->redirectToRoute('standards_index');
    }
}
