<?php

namespace App\Controller;

use App\Entity\Mere;
use App\Form\MereType;
use App\Repository\MereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/mere")
 */
class MereController extends AbstractController
{
    /**
     * @Route("/", name="mere_index", methods={"GET"})
     */
    public function index(Request $request,MereRepository $mereRepository,PaginatorInterface $paginator): Response
    {
    
          $donnees = $mereRepository->findmes();
          
          $meres = $paginator->paginate(
            $donnees,
            $request->query->getInt('page',1),
            10
        );

        //dd($mere);



        return $this->render('mere/index.html.twig', [
            'meres' => $meres,
        ]);
    }

    /**
     * @Route("/recherchenom", name="mere_recherchenom")
     */
    public function rechercenom(Request $request,MereRepository $mereRepository): Response
    {
        $mere = new Mere();
        $form=$this->createFormBuilder($mere)
            ->add('nom',TextType::class)
            ->getForm();
            $form->handleRequest($request);
            $message ='';
            var_dump($message);
            if($form->isSubmitted()){
               
                $np=$form['nom']->getData();                
                $mere= $mereRepository->findBynom($np);
               

                if (!$mere) {
                    $message="Nom  ".$np." n'existe pas.";                              
                                   
                 }  
                 
                 //dd($mere);
                 //return $this->render('mere/recherchenom.html.twig', [            
                    //'mere' => $mere,
                    
                //]);
                
            }

        return $this->render('mere/recherchenom.html.twig', [            
            'f' => $form->createView(),
            'message' => $message,
            'meres' => $mere,
        ]);
    }
   
    
    /**
     * @Route("/new", name="mere_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mere = new Mere();
        $form = $this->createForm(MereType::class, $mere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mere);
            $entityManager->flush();

            $couleur= true;

            //dd($couleur);

            return $this->redirectToRoute('mere_index',[
                'couleur' => $couleur,
            ]);
        }

        return $this->render('mere/new.html.twig', [
            'mere' => $mere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mere_show", methods={"GET"})
     */
    public function show(Mere $mere): Response
    {
        return $this->render('mere/show.html.twig', [
            'mere' => $mere,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mere_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mere $mere): Response
    {
        $form = $this->createForm(MereType::class, $mere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mere_index');
        }

        return $this->render('mere/edit.html.twig', [
            'mere' => $mere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mere_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Mere $mere): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mere->getId(), $request->request->get('_token'))) {
          
            
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($mere);
            
           
        
        
        }

        return $this->redirectToRoute('mere_index');
    }


    


}
