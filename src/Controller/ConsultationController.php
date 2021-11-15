<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\Mere;

use App\Entity\Standards;
use App\Form\ConsultationType;
use App\Repository\ConsultationRepository;
use App\Repository\MereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StandardsRepository;
use Symfony\Component\HttpFoundation\Session\Session;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/consultation")
 */
class ConsultationController extends AbstractController
{
    /**
     * @Route("/", name="consultation_index", methods={"GET"})
     */
    public function index(Request $request,ConsultationRepository $consultationRepository,PaginatorInterface $paginator): Response
    {
       
        $donnees = $consultationRepository->findmes();       
        $consultations = $paginator->paginate(
            $donnees,
            $request->query->getInt('page',1),
            8
        );
        return $this->render('consultation/index.html.twig', [
            'consultations' => $consultations,
        ]);
    }

    /**
     * @Route("/statistique", name="consultation_satatistique", methods={"GET"})
     */
    public function statistique(Request $request,ConsultationRepository $consultationRepository,PaginatorInterface $paginator): Response
    {
       
        //$donnees = $consultationRepository->findmes();
       //die('test');
       
             
       //----------------------------Totale 3 cercles------------------------------------
       //total enfan mesure
       $Totalenfantmesures = $consultationRepository->enfantmesure();       
       // dd($Totalenfantmesures);
        foreach( $Totalenfantmesures as $Totalenfantmesure  ){            
            foreach ($Totalenfantmesure  as $valeur){
                    $valeurs[]=$valeur;             
           }
        }

        $valeursmesure[]=$valeurs[0];
       
       // Nombre Total enfant mesuré retard
       $paramet='Oui';
       $enfantmesureretardouis = $consultationRepository->enfantmesureretard($paramet);
      
       foreach( $enfantmesureretardouis as $enfantmesureretardoui  ){       
        foreach ($enfantmesureretardoui  as $valeuroui){
                $valeursoui[]=$valeuroui;             
            }
      }     
      $valeursmesure[]=$valeursoui[0];
      $indices=['Totale','Retard'];
    //----------------------------------------------------------------
       
       //---------Nombre total enfant mesuré par sexe et retard----------------
       $sexe='M';
       $enfantmesuremasculains = $consultationRepository->enfantmesuresexe($sexe);             
       foreach( $enfantmesuremasculains as $enfantmesuremasculain  ){       
        foreach ($enfantmesuremasculain  as $valeurMasculain){
            $valeurMasculains[]=$valeurMasculain;             
            }
       }      
       $valeurmesuremasculains[]=$valeurMasculains[0];
       //----------------------------------------------
       $sexe='M';
       $retard="Oui";
       $enfantmesuremasculainretards = $consultationRepository->enfantmesuresexeretard($sexe,$retard);      
       foreach( $enfantmesuremasculainretards as $enfantmesuremasculainretard  ){
      
            foreach ($enfantmesuremasculainretard  as $valeurMasculainretardoui){
                    $valeurMasculainretardouis[]=$valeurMasculainretardoui;             
                }
        }
      
      $valeurmesuremasculains[]=$valeurMasculainretardouis[0];     
      $indicessexe=['Masculain','retard'];      
     //----------------------------------------------
       $sexe='F';
       $enfantmesurerfeminins = $consultationRepository->enfantmesuresexe($sexe);      
       foreach( $enfantmesurerfeminins as $enfantmesurefeminin ){       
        foreach ($enfantmesurefeminin  as $valeurfeminin){
            $valeurfeminins[]=$valeurfeminin;             
            }
       } 
       $valeurmesurefeminins[]=$valeurfeminins[0];
       //----------------------------------------------
       $sexe='F';
       $retard="Oui";
       $enfantmesurerfemininretards = $consultationRepository->enfantmesuresexeretard($sexe,$retard);
       foreach( $enfantmesurerfemininretards as $enfantmesurefemininretard  ){
      
        foreach ($enfantmesurefemininretard as $valeurfemininretardoui){
                $valeurfemininretardouis[]=$valeurfemininretardoui;             
            }
       }
  
        $valeurmesurefeminins[]=$valeurfemininretardouis[0];   
        $indicessexeF=['Feminin','retard'];  
       
       
       //----------------------------------------------------------------

        //---------nbre total par cercle-------------------------------------------------------
        $enfantmesurecercles = $consultationRepository->enfantmesurecercle();       
       
        foreach ($enfantmesurecercles as $enfantmesurecercle){
            $nomcertle[]=$enfantmesurecercle['cercle'];
            $nombremesure[]=$enfantmesurecercle[1];           
        }
       //dd($nombremesure);
        $retard='Oui';
        $enfantmesurecercleretards = $consultationRepository->enfantmesurecercleretard($retard);       
        
       
        foreach ($enfantmesurecercleretards as $enfantmesurecercleretard){
            //$nomcertleretard[]=$enfantmesurecercleretard['cercle'];
            $nombremesureretard[]=$enfantmesurecercleretard[1];           
        }

       


         /*

        //----------------------------------------------------------------
      
       //---------nbre total par douar-------------------------------------------------------
       
       $enfantmesuredouar = $consultationRepository->enfantmesuredouar();
      
       dd($enfantmesuredouar);

       
       $sexe="Feminin";
       $retard="Oui";
       $enfantmesuredouarsexeretard = $consultationRepository->enfantmesuredouarexeretard($sexe,$retard);
        
       dd($enfantmesuredouarsexeretard);

       //----------------------------------------------------------------
      
     */ 
  
      
       return $this->render('consultation/statistique.html.twig', [
       
        'indices' => json_encode($indices),
        'valeurs' => json_encode($valeursmesure),
        'indicessexe'=>json_encode($indicessexe),
        'valeurmesuremasculains'=>json_encode($valeurmesuremasculains),
        'indicessexeF'=>json_encode($indicessexeF),
        'valeurmesurefeminins'=>json_encode($valeurmesurefeminins),
    ]);
    }
     //-------------------------------------------------------------------

     





    /**
     * @Route("/new", name="consultation_new", methods={"GET","POST"})
     */
    public function new(Request $request,StandardsRepository $standardsRepository,MereRepository $mereRepos): Response
    {
       
             
        $consultation = new Consultation();
        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);
  
        if ($form->isSubmitted() && $form->isValid()) {
            
            $sexe = $consultation->getEnfant()->getSexe();
            $datenaissance = $consultation->getEnfant()->getDateNaissance();
            $dateconsultation =$consultation->getDateConsultation();
           
            echo $datenaissance->format('d/m/y') .' :date nai .<br>';
            echo $dateconsultation->format('d/m/y') .' :date consultation .<br>';

            $interval = $dateconsultation->diff($datenaissance);

            //dd($interval);

            $y=$interval->y;//années
            $m=$interval->m;//mois
            $d=$interval->d;//jours
            $h=$interval->h;//heures
            $i=$interval->i;//minutes
            $s=$interval->s;//secondes*/
            $jours= intval($interval->days);


            $month = (12 * $y)+$m;

            $poids = $consultation->getPoids();
            $taille = $consultation->getTaille();
            $sexe = $consultation->getEnfant()->getSexe();
            
            //echo "   sexe: $sexe Age Enfant : $jours Jours , poids :$poids Kg ,Taille :$taille Cm <br>";
              
             if ($sexe == 'Feminin'){
                $sexe= 'F';
             }
             else
             {
                 $sexe = 'M';
             }
            
             //echo $sexe.'sexe<br>';
             //echo $jours.'jours<br>';
              $modu= $jours % 30;
             //var_dump($modu);
             //echo ($modu.'modulo<br>');
             //echo (intval($modu).'modulo<br>');
             //dd($jours);
             //base OMS
             if ($modu >= 19){
                   $jours1 = (intval($jours) - $modu) +30;
                   //var_dump($jours1) ;   
            }
            else
            {
                $jours1 = intval($jours) - $modu ;
                     var_dump($jours1);
                     //die('jours2');

            }

            //echo $sexe.'sexe<br>';
            //echo $jours1.'jours1<br>';
            $standards= new Standards();
            $standards = $standardsRepository->findOneBy([
            'sexe' => $sexe,
            'jours' => $jours1,
            ]);
                    
            if ($standards){

                $n3sd = $standards->getN3sd();
            
                $A2sd = $standards->getA2sd();
                $B2sd = $standards->getB2sd();

                $A3sd = $standards->getA3sd();
                $B3sd = $standards->getB3sd();

                //echo $A2sd.'A2sd.<br>';
                //echo $B2sd.'B2sd.<br>';
                //echo $A3sd.'A3sd.<br>';
                //echo $B3sd.'B3sd.<br>';
               

                $a2sd = str_replace(",",".",$A2sd);
                $b2sd = str_replace(",",".",$B2sd);
                
                $a3sd = str_replace(",",".",$A3sd);
                $b3sd = str_replace(",",".",$B3sd);
                
                
                //var_dump($a2sd) ;
               // die('a2sd');

                
                //var_dump((float)($jours1));
                //var_dump((float)($A2sd));
                //var_dump((float)($B2sd));

                $TSMIN2sd = ($jours1 *  $a2sd)+  $b2sd;
                
                //dd($standards);  
                if ($taille < $TSMIN2sd){
    
                    $retard= 'Oui';
                    }
                    else
                    {
                    $retard = 'Non';
                }
                echo $TSMIN2sd.'TSMIN2sd <br>';
                echo $retard;
                $TSMIN3sd = ($jours1 *  $a3sd)+  $b3sd;
                if ($taille < $TSMIN3sd){
    
                    $retardgrave= 'Oui';
                    }
                    else
                    {
                    $retardgrave = 'Non';
                }
                echo $TSMIN3sd.'TSMIN3sd <br>';
                echo $retardgrave;
                 //die("test");


                $consultation->setRetard($retard);
                $consultation->setRetardgrave($retardgrave);
                $consultation->setAge($jours);
                
                
                   // dd($consultation);
                //die('test');
                //var_dump($n1sd);
                // die('test');
                //$standards = $standardsRepository->findAll();
    
                $session = new Session();
        
                
                $nomcentre=$session->get('Nomcentre');
                $commune=$session->get('Commune');
                    
                $consultation->setCentreSoins($nomcentre);
    
                
                //dd($consultation->getEnfant()->getMeres()->getId());
    
                 $idmere = $consultation->getEnfant()->getMeres()->getId();
                 //var_dump( $idmere);
                 $mere = new Mere();
                 $mere =$mereRepos->find(20);

                  //var_dump($mere);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($consultation);
                $entityManager->flush();
    
                return $this->redirectToRoute('enfant_detail',[
                       'id'=> $consultation->getEnfant()->getId(),
                        'Mere' =>$mere,
                    ]);
            } 
            }

           
      
    
        return $this->render('consultation/new.html.twig', [
            'consultation' => $consultation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consultation_show", methods={"GET"})
     */
    public function show(Consultation $consultation): Response
    {
        return $this->render('consultation/show.html.twig', [
            'consultation' => $consultation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="consultation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Consultation $consultation): Response
    {
        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('consultation_index');
        }

        return $this->render('consultation/edit.html.twig', [
            'consultation' => $consultation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consultation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Consultation $consultation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$consultation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($consultation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('consultation_index');
    }
}
