<?php

namespace App\Controller;
use App\Entity\Basedonnee;
use App\Entity\Enfant;
use App\Entity\Mere;
use App\Entity\Consultation;
use App\Entity\Standards;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BasedonneeRepository;
use App\Repository\ConsultationRepository;
use App\Repository\DouarRepository;
use App\Repository\StandardsRepository;
class BasedonneexcelController extends AbstractController
{
    /**
     * @Route("/basedonneexcel", name="basedonneexcel")
     */
    public function index(BasedonneeRepository $BasedonneeRepository,DouarRepository $douarRepository,ConsultationRepository $consultationRepository,StandardsRepository $standardsRepository): Response
    {
            
            //creer objet basedonnées
            $basedonnee = new Basedonnee();
            $basedonnees= $BasedonneeRepository->FindAll();

            foreach($basedonnees as $basedonnee){


                    // extraire les données de la mere
                    $nom_parent = $basedonnee->getNomParent();
                    $ptrenom_parent = $basedonnee->getPrenomParent();
                    $tele = $basedonnee->getTelParent();
                    $date_naissance_mere=$basedonnee->getDateNaissanceMere();

                    $mere = new Mere();
                    $mere->setNom($nom_parent)
                    ->setPrenom($ptrenom_parent)
                    ->setAge($date_naissance_mere)
                    ->setTel($tele);


                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($mere);
                    $entityManager->flush();
                    // extraire les données de enfant

                    $smi=$basedonnee->getSmi();
                    $nom_enfant=$basedonnee->getNomEnfant();
                    $prenom_enfant=$basedonnee->getPrenomEnfant();
                    $sexe=$basedonnee->getSexe();
                    $date_naissance_enfant=$basedonnee->getDateNaissanceEnfant();
                    $douar=$basedonnee->getDouar();
                    $cpn=$basedonnee->getCPN();
                    $accouchement_enfanta=$basedonnee->getAccouchementEnfanta();
                    $Duree_allaitement=$basedonnee->getDureeAllaitement();
                    $dateprecedentenaissance=$basedonnee->getDateprecedentenaissance();
                    $Prise_Fer_pend_grossesse=$basedonnee->getPriseFerPendGrossesse();
                    $prisevitamineD=$basedonnee->getPrisevitamineD();
                    $priseacidefolique=$basedonnee->getPriseacidefolique();
                    $motif_danger=$basedonnee->getMotifDanger();


                    $douars =$douarRepository->findOneBy(['nom'=>$douar]);

                    $enfant = new Enfant();

                    $enfant->setSmi($smi)
                    ->setNom($nom_enfant)
                    ->setPrenom($prenom_enfant)
                    ->setSexe($sexe)
                    ->setDateNaissance($date_naissance_enfant)
                    ->setNbrcpn($cpn)
                    ->setAccouchement($accouchement_enfanta)
                    ->setDurreeAllaitement($Duree_allaitement)
                    ->setDatedernieracc($dateprecedentenaissance)
                    ->setFer($Prise_Fer_pend_grossesse)
                    ->setVitamineD($prisevitamineD)
                    ->setAcideFolique($priseacidefolique)
                    ->setMotifDGross($motif_danger)
                    ->setCinPereMere('')
                    ->setSuppNutri('')
                    ->setDouars($douars)
                    ->setMeres($mere);

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($enfant);
                    $entityManager->flush();



                    // extraire les données de consultation
                    $centre_de_soin=$basedonnee->getCentreDeSoin();
                    $date_de_mesures=$basedonnee->getDateDeMesures();
                    $poids=$basedonnee->getPoids();
                    $taille=$basedonnee->getTaille();

                    $interval = $date_de_mesures->diff($date_naissance_enfant);

                    //dd($interval);

                    $y=$interval->y;//années
                    $m=$interval->m;//mois
                    $d=$interval->d;//jours
                    $h=$interval->h;//heures
                    $i=$interval->i;//minutes
                    $s=$interval->s;//secondes*/
                    $jours= intval($interval->days);
                    //dd($jours);
                    $month = (12 * $y)+$m;

                    //debut calcul retard----------------------------------------------

                   

                    //echo $jours.'jours<br>';
                    $modu= $jours % 30;
                    //var_dump($modu);
                    //echo ($modu.'modulo<br>');
                    //echo (intval($modu).'modulo<br>');
                    //dd($jours);
                    //base OMS
                    if ($modu >= 19)
                    {
                    $jours1 = (intval($jours) - $modu) +30;
                    //var_dump($jours1) ;   
                    }
                    else
                    {
                    $jours1 = intval($jours) - $modu ;
                    //var_dump($jours1);
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
                //echo $TSMIN2sd.'TSMIN2sd <br>';
                //echo $retard.'retard <br>';
                $TSMIN3sd = ($jours1 *  $a3sd)+  $b3sd;
                if ($taille < $TSMIN3sd){

                $retardgrave= 'Oui';
                }
                else
                {
                $retardgrave = 'Non';
                }
                //echo $TSMIN3sd.'TSMIN3sd <br>';
                //echo $retardgrave.'retardgrave <br>';
                //die('calcule');
                 }
                //fin  calcul retard ----------------------------------------------- 


                // données consultation
                $consultation= new Consultation();
                $consultation->setDateConsultation($date_de_mesures)
                    ->setCentreSoins($centre_de_soin)
                    ->setPoids($poids)
                    ->setTaille($taille)
                    ->setEnfant($enfant)
                    ->setMotif('')
                    ->setAge($jours)
                    ->setRetard($retard)
                    ->setRetardgrave($retardgrave);


      

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($consultation);
                $entityManager->flush();
            }


    return $this->render('basedonneexcel/index.html.twig', [
    'controller_name' => 'BasedonneexcelController',
    ]);
        
    }
}
