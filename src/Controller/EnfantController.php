<?php

namespace App\Controller;

use App\Entity\Enfant;
use App\Form\EnfantType;
use App\Entity\Cercle;
use App\Repository\EnfantRepository;
use App\Repository\CercleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
/**
 * @Route("/enfant")
 */
class EnfantController extends AbstractController
{
    /**
     * @Route("/", name="enfant_index", methods={"GET"})
     */
    public function index(Request $request,EnfantRepository $enfantRepository,PaginatorInterface $paginator): Response
    {
        
        $donnees = $enfantRepository->findmes();        
        $enfants = $paginator->paginate(
            $donnees,
            $request->query->getInt('page',1),
            8
        );              
        return $this->render('enfant/index.html.twig', [
            'enfants' => $enfants,
        ]);
    }
    
    /**
     * @Route("/listesercle", name="enfant_listesercle",  methods={"GET","POST"})
     */
    public function listesercle(EnfantRepository $enfantRepository,CercleRepository $cercleRepository,Request $request,PaginatorInterface $paginator): Response
    {
        $enfants = new Enfant();
        $cercle = new cercle();
        $form=$this->createFormBuilder($cercle)
            ->add('nom',EntityType::class,[
                'class' => Cercle::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->groupBy('c.nom')
                        ->orderBy('c.nom', 'ASC');
                },
                'choice_label'=>'nom'
            ])
            ->getForm();
            $form->handleRequest($request);
           
            
            $nomcercle='';
            if($form->isSubmitted()){
               
                $nomcercle=$form['nom']->getData()->getNom();
                $nomcommune=$form['nom']->getData()->getCommune();
                $nomregion=$form['nom']->getData()->getRegion();
                

                $donnees= $enfantRepository->enfantscercle($nomcercle);
               
               //dd($enfants);
                 $enfants = $paginator->paginate(
                   $donnees,
                   $request->query->getInt('page',1),
                  8
               );

               
                //redirect to a route with parameters
                //return $this->redirectToRoute('enfant_cercle', [
                    //'enfants' => $enfants,
                    //'Cercle'  => $nomcercle 
                //]);
              // return $this->render('enfant/listesercle1.html.twig', [            
                //   'enfants' => $enfants,
                  //  'Cercle'  => $nomcercle         
               // ]);
                
              
           }

        return $this->render('enfant/listesercle.html.twig', [            
            'f' => $form->createView(),
            'enfants' => $enfants,
            'Cercle' => $nomcercle
                    
        ]);
    }
    
    
    
    /**
     * @Route("/liste", name="enfant_liste", methods={"GET"})
     */
    public function liste(Request $request,EnfantRepository $enfantRepository,PaginatorInterface $paginator): Response
    {
       
         $donnees = $enfantRepository->findListe();
         //dd($donnees);
         $enfants = $paginator->paginate(
             $donnees,
             $request->query->getInt('page',1),
             8
         );
        //dd($enfants);
       
        return $this->render('enfant/liste.html.twig', [
            'enfants' => $enfants,
        ]);
    }
     /**
     * @Route("/message/{message}", name="enfant_message", methods={"GET"})
     */
    public function message($message): Response 
      {
     
              
        return $this->render('enfant/message.html.twig', [
            'message' => $message,
        ]);
    }

    /**
     * @Route("/analyse", name="enfant_analyse", methods={"GET"})
     */
    public function analyse(EnfantRepository $enfantRepository): Response
    {
       
        $enfant = new Enfant();
        $enfants=$enfantRepository->findAnalyse();
        $sercleImilchil = 0;
        $sercleAzilal = 0;
        $sercleAsni = 0;


        $retardImilchil = 0;
        $retardAzilal = 0;
        $retardAsni = 0;

         foreach($enfants as $enfant){
            echo $enfant->getId().'id<br>';
            echo $enfant->getNom().'nom<br>';
            echo $enfant->getSexe().'sexe<br>';
            echo $enfant->getDouars()->getNom().'douard<br>';
            echo $enfant->getDouars()->getCercle().'cercle<br>';

             $cercle =$enfant->getDouars()->getCercle();
             foreach($enfant->getConsultations() as $consultation){
                echo $consultation->getRetard().'retard<br>';
                $retard = $consultation->getRetard();
            }
              if ($cercle == 'Imilchil'){
                $sercleImilchil=$sercleImilchil+1;
                if ($retard == 'Oui'){
                    $retardImilchil=$retardImilchil+1;                
                } 
              };
              if ($cercle == 'Azilal'){
                $sercleAzilal=$sercleAzilal+1;
                if ($retard == 'Oui'){
                    $retardAzilal=$retardAzilal+1;                
                } 
              };

              if ($cercle == 'Asni'){
                $sercleAsni=$sercleAsni+1;
                if ($retard == 'Oui'){
                    $retardAsni=$retardAsni+1;                
                } 
              };

         };

         echo $sercleImilchil.'Imilchil <br>';
         echo $sercleAzilal.'Azilal <br>';
         echo $sercleAsni.'Asni .<br>';


         echo $retardImilchil.'Imilchil retard <br>';
         echo $retardAzilal.'Azilal retard <br>';
         echo $retardAsni.'Asni retard <br>';
        //var_dump($enfants);

         $nomcercle =['Imilchil','Azilal','Asni'];
         $nombreretard=[$retardImilchil,$retardAzilal,$retardAsni];

        return $this->render('enfant/analyse.html.twig', [
            'enfants' => $enfantRepository->findListe(),
            'nomcercle' => json_encode($nomcercle),
            'nombreretard' => json_encode($nombreretard),
        ]);
    }

    /**
     * @Route("/analyse1", name="enfant_analyse1", methods={"GET"})
     */
    public function analyse1(EnfantRepository $enfantRepository): Response
    {
      
        $enfant = new Enfant();
       $enfants=$enfantRepository->findAnalyse();
      // $enfants=$enfantRepository->testAnalyse();
         
       
        $sercleImilchil = 0;
        $sercleAzilal = 0;
        $sercleAsni = 0;
 
        $retardImilchil = 0;
        $retardAzilal = 0;
        $retardAsni = 0;

         foreach($enfants as $enfant){
            echo $enfant->getId().'id<br>';
            echo $enfant->getNom().'nom<br>';
            echo $enfant->getSexe().'sexe<br>';
            echo $enfant->getDouars()->getNom().'douard<br>';
            echo $enfant->getDouars()->getCercle().'cercle<br>';

             $cercle =$enfant->getDouars()->getCercle();
             foreach($enfant->getConsultations() as $consultation){
                echo $consultation->getRetard().'retard<br>';
                $retard = $consultation->getRetard();
            }
              if ($cercle == 'Imilchil'){
                $sercleImilchil=$sercleImilchil+1;
                if ($retard == 'Oui'){
                    $retardImilchil=$retardImilchil+1;                
                } 
              };
              if ($cercle == 'Azilal'){
                $sercleAzilal=$sercleAzilal+1;
                if ($retard == 'Oui'){
                    $retardAzilal=$retardAzilal+1;                
                } 
              };

              if ($cercle == 'Asni'){
                $sercleAsni=$sercleAsni+1;
                if ($retard == 'Oui'){
                    $retardAsni=$retardAsni+1;                
                } 
              };

         };

         echo $sercleImilchil.'Imilchil <br>';
         echo $sercleAzilal.'Azilal <br>';
         echo $sercleAsni.'Asni .<br>';


         echo $retardImilchil.'Imilchil retard <br>';
         echo $retardAzilal.'Azilal retard <br>';
         echo $retardAsni.'Asni retard <br>';
        //var_dump($enfants);

         $nomcercle =['Imilchil','Azilal','Asni'];
         $nombreretard=[$retardImilchil,$retardAzilal,$retardAsni];

       
        return $this->render('enfant/analyse1.html.twig', [
            'enfants' => $enfantRepository->findListe(),
            'nomcercle' => json_encode($nomcercle),
            'nombreretard' => json_encode($nombreretard),

        ]);
    }
    /**
     * @Route("/new", name="enfant_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $enfant = new Enfant();
        $form = $this->createForm(EnfantType::class, $enfant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          
         
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($enfant);
            $entityManager->flush();

            return $this->redirectToRoute('enfant_index');
        }

        return $this->render('enfant/new.html.twig', [
            'enfant' => $enfant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/recherchesmi", name="enfant_recherchesmi")
     */
    public function rechercenom(Request $request,EnfantRepository $enfantRepository): Response
    {
        $enfant = new Enfant();
        $form=$this->createFormBuilder($enfant)
            ->add('smi')
            ->getForm();
            $form->handleRequest($request);
            $message='';
            if($form->isSubmitted()){
               
                $smi=$form['smi']->getData();
              
                $enfant= $enfantRepository->findOneBysmi($smi);
               
                if (!$enfant) {
                    $message="SMI  n'existe pas."; 
                    return $this->redirectToRoute('enfant_message', [
                        'message' => $message,
                    ]);                 
                                 
                 }
                 //dd($enfant);
               // die('test');
                
                // redirect to a route with parameters
                return $this->redirectToRoute('enfant_detail', [
                    'id' => $enfant->getId(),                       
                ]);
                
              
           }

        return $this->render('enfant/recherchesmi.html.twig', [            
            'f' => $form->createView(), 
                
        ]);
    }

     /**
     * @Route("/detail/{id}", name="enfant_detail", methods={"GET"})
     */
    public function detail(Enfant $enfant): Response
    {
        //dd($enfant);
        
        return $this->render('enfant/detail.html.twig', [
            'enfant' => $enfant,
        ]);
    }

    /**
     * @Route("/{id}", name="enfant_show", methods={"GET"})
     */
    public function show(Enfant $enfant): Response
    {
        return $this->render('enfant/show.html.twig', [
            'enfant' => $enfant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="enfant_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Enfant $enfant): Response
    {
        //dd($enfant); 
        $form = $this->createForm(EnfantType::class, $enfant); 
             
        $form->handleRequest($request);
       
       
        if ($form->isSubmitted() && $form->isValid()) {
           
           
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('enfant_index');
        }

        return $this->render('enfant/edit.html.twig', [
            'enfant' => $enfant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="enfant_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Enfant $enfant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$enfant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($enfant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('enfant_index');
    }
}
