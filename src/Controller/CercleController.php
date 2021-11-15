<?php

namespace App\Controller;

use App\Entity\Cercle;
use App\Form\CercleType;
use App\Repository\CercleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cercle")
 */
class CercleController extends AbstractController
{
    /**
     * @Route("/", name="cercle_index", methods={"GET"})
     */
    public function index(CercleRepository $cercleRepository): Response
    {
        return $this->render('cercle/index.html.twig', [
            'cercles' => $cercleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cercle_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cercle = new Cercle();
        $form = $this->createForm(CercleType::class, $cercle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cercle);
            $entityManager->flush();

            return $this->redirectToRoute('cercle_index');
        }

        return $this->render('cercle/new.html.twig', [
            'cercle' => $cercle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cercle_show", methods={"GET"})
     */
    public function show(Cercle $cercle): Response
    {
        return $this->render('cercle/show.html.twig', [
            'cercle' => $cercle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cercle_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cercle $cercle): Response
    {
        $form = $this->createForm(CercleType::class, $cercle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cercle_index');
        }

        return $this->render('cercle/edit.html.twig', [
            'cercle' => $cercle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cercle_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Cercle $cercle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cercle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cercle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cercle_index');
    }
}
