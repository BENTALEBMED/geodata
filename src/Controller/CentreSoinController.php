<?php

namespace App\Controller;

use App\Entity\CentreSoin;
use App\Form\CentreSoinType;
use App\Repository\CentreSoinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityRepository;

/**
 * @Route("/centre/soin")
 */
class CentreSoinController extends AbstractController
{
    /**
     * @Route("/", name="centre_soin_index", methods={"GET"})
     */
    public function index(CentreSoinRepository $centreSoinRepository): Response
    {
        return $this->render('centre_soin/index.html.twig', [
            'centre_soins' => $centreSoinRepository->findAll(),
        ]);
    }

     /**
     * @Route("/listecentre", name="centre_soin_liste", methods={"GET"})
     */
    public function listecentre(CentreSoinRepository $centreSoinRepository): Response
    {
        return $this->render('centre_soin/listecentre.html.twig', [
            'centre_soins' => $centreSoinRepository->findListecentre(),
        ]);
    }


     /**
     * @Route("/lieusaissie", name="centre_soin_lieusaissie", methods={"GET","POST"})
     */
    public function lieusaissie(Request $request,CentreSoinRepository $centreSoinRepository): Response
    {
        //$centreSoin = new CentreSoin();
       
        $form=$this->createFormBuilder()
            ->add('nom',EntityType::class,[
                'class' => CentreSoin::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')                        
                        ->orderBy('c.nom', 'ASC');
                },
                'choice_label'=>'nom',
            ])           
            ->getForm();
           
            $form->handleRequest($request);
            
            if ($form->isSubmitted()){
                
               
                $centre = $form['nom']->getData();
                


                $nomcentre = $centre->getNom();
                $commune = $centre->getCommune(); 

                 //dd($centre);

                //echo $nomcentre ;
                //echo $commune ;
              //die('test');

                 $session = new Session();
    
                 $session->set('Nomcentre',$nomcentre );
                 $session->set('Commune',$commune);
    
                 $nomcentre=$session->get('Nomcentre');
                 $commune=$session->get('Commune');
                
                 //echo $nomcentre;
                 //echo $commune;

                // die('test');
                
                 return $this->redirectToRoute('mere_index');         
    
    
            }
            
        return $this->render('centre_soin/lieusaissie.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="centre_soin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
       
        $centreSoin = new CentreSoin();
        $form = $this->createForm(CentreSoinType::class, $centreSoin);
        
        $form->handleRequest($request);
       
       
        if ($form->isSubmitted() && $form->isValid()) {
        
          
            $entityManager = $this->getDoctrine()->getManager();
           
            $entityManager->persist($centreSoin);
            $entityManager->flush();

            return $this->redirectToRoute('centre_soin_index');
        }

        return $this->render('centre_soin/new.html.twig', [
            'centre_soin' => $centreSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="centre_soin_show", methods={"GET"})
     */
    public function show(CentreSoin $centreSoin): Response
    {
        return $this->render('centre_soin/show.html.twig', [
            'centre_soin' => $centreSoin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="centre_soin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CentreSoin $centreSoin): Response
    {
        $form = $this->createForm(CentreSoinType::class, $centreSoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('centre_soin_index');
        }

        return $this->render('centre_soin/edit.html.twig', [
            'centre_soin' => $centreSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="centre_soin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CentreSoin $centreSoin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$centreSoin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($centreSoin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('centre_soin_index');
    }
}
