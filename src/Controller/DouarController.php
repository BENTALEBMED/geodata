<?php

namespace App\Controller;

use App\Entity\Douar;
use App\Entity\Cercle;
use App\Form\DouarType;
use App\Repository\DouarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

/**
 * @Route("/douar")
 */
class DouarController extends AbstractController
{
    /**
     * @Route("/", name="douar_index", methods={"GET"})
     */
    public function index(DouarRepository $douarRepository): Response
    {
        return $this->render('douar/index.html.twig', [
            'douars' => $douarRepository->findAll(),
        ]);
    }
    /**
     * @Route("/liste", name="douar_liste", methods={"GET"})
     */
    public function liste(DouarRepository $douarRepository): Response
    {
        
        
        return $this->render('douar/list.html.twig', [
            'douars' => $douarRepository->findListe(),
        ]);
    }





    /**
     * @Route("/new", name="douar_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $douar = new Douar();
        $form = $this->createForm(DouarType::class, $douar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
           
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($douar);
            $entityManager->flush();

            return $this->redirectToRoute('douar_index');
        }

        return $this->render('douar/new.html.twig', [
            'douar' => $douar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="douar_show", methods={"GET"})
     */
    public function show(Douar $douar): Response
    {
        return $this->render('douar/show.html.twig', [
            'douar' => $douar,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="douar_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Douar $douar): Response
    {
        $form = $this->createForm(DouarType::class, $douar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('douar_index');
        }

        return $this->render('douar/edit.html.twig', [
            'douar' => $douar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="douar_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Douar $douar): Response
    {
        if ($this->isCsrfTokenValid('delete'.$douar->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($douar);
            $entityManager->flush();
        }

        return $this->redirectToRoute('douar_index');
    }

    /**
     * @Route("map",name="douar_map")
     */
    public function mapdouar():Response
    {

        return $this->render('douar/map.html.twig');
    }

   

}
