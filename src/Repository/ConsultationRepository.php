<?php

namespace App\Repository;

use App\Entity\Consultation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\DBAL\DriverManager;


/**
 * @method Consultation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consultation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consultation[]    findAll()
 * @method Consultation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsultationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Consultation::class);
    }

    /**
     * @return array
     */
    public function findmes()
    {

        $qb =$this->createQueryBuilder('c');
        $qb->orderBy('c.id','DESC');

        return $qb->getQuery()
        ->getResult();
        


    }
  //------------------------------------------------------------
    // Nombre Total enfant mesuré
    public function enfantmesure() : array
    {
        
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT COUNT(c.id)
             FROM App\Entity\Consultation c 
            ');       
        return $query->getResult();
        
    }
     // Nombre Total enfant mesuré retard (oui/non)
     public function enfantmesureretard($condition) : array
     {
         $entityManager = $this->getEntityManager();
         $query = $entityManager->createQuery(
             'SELECT COUNT(c.id)
              FROM App\Entity\Consultation c 
              WHERE c.retard = :paramet
             ');
         $query->setParameter('paramet',$condition);        
         return $query->getResult();
         
     }
  //------------------------------------------------------------
   // Nombre Total enfant mesuré sexe (Masculain/Feminin)
   public function enfantmesuresexe($sexe) : array
   {
     
       $entityManager = $this->getEntityManager();
       $query = $entityManager->createQuery(
             'SELECT COUNT(c.id) 
              FROM App\Entity\Consultation c  
              JOIN c.enfant e 
              WHERE e.sexe = :paramet
           ');
       $query->setParameter('paramet',$sexe);     
       return $query->getResult();
       
   }
   // Nombre Total enfant mesuré sexe et retard
   public function enfantmesuresexeretard($sexe,$retard) : array
   {
       
       $entityManager = $this->getEntityManager();
       $query = $entityManager->createQuery(
             'SELECT COUNT(c.id)
              FROM App\Entity\Consultation c  
              JOIN c.enfant e 
              WHERE e.sexe = :paramet and c.retard = :retard
           ');
       $query->setParameter('paramet',$sexe);
       $query->setParameter('retard',$retard);      
       return $query->getResult();
       
   }
   

//--------------nbre total par cercle----------------------------------------------

// Nombre Total enfant mesuré cercle
public function enfantmesurecercle() : array
{
    $entityManager = $this->getEntityManager();
    $query = $entityManager->createQuery(
        'SELECT COUNT(c.id), c ,e ,d.cercle
         FROM App\Entity\Consultation c  
         JOIN c.enfant e 
         LEFT JOIN  e.douars d  
         GROUP BY  d.cercle           
        ');   
    return $query->getResult();
    }

// Nombre Total enfant mesuré  retard
public function enfantmesurecercleretard($retard) : array
{
    
    $entityManager = $this->getEntityManager();
    $query = $entityManager->createQuery(
        'SELECT COUNT(c.id), c ,e ,d.cercle
         FROM App\Entity\Consultation c  
         JOIN c.enfant e 
         LEFT JOIN  e.douars d  
         WHERE  c.retard = :retard
         GROUP BY  d.cercle           
        ');   
          $query->setParameter('retard',$retard);

    // returns an array of Product objects
    return $query->getResult();
    }

   
    // Nombre Total enfant mesuré sexe et retard
public function enfantmesurecerclesexeretard($sexe,$retard) : array
{
    
    $entityManager = $this->getEntityManager();
    $query = $entityManager->createQuery(
        'SELECT COUNT(c.id), c ,e ,d.cercle
         FROM App\Entity\Consultation c  
         JOIN c.enfant e 
         LEFT JOIN  e.douars d  
         WHERE e.sexe = :paramet and c.retard = :retard
         GROUP BY  d.cercle           
        ');
          $query->setParameter('paramet',$sexe);
          $query->setParameter('retard',$retard);

    // returns an array of Product objects
    return $query->getResult();
    }






//--------------------------------------------------------

//--------------nbre total par douar----------------------------------------------

// Nombre Total enfant mesuré masculain
public function enfantmesuredouar() : array
{
    $entityManager = $this->getEntityManager();
    $query = $entityManager->createQuery(
        'SELECT COUNT(c.id), c ,e ,d.nom
         FROM App\Entity\Consultation c  
         JOIN c.enfant e 
         LEFT JOIN  e.douars d  
         GROUP BY  d.nom           
        ');   
    return $query->getResult();
    }
   
    // Nombre Total enfant mesuré masculain
public function enfantmesuredouarexeretard($sexe,$retard) : array
{
    
    $entityManager = $this->getEntityManager();
    $query = $entityManager->createQuery(
        'SELECT COUNT(c.id), c ,e ,d.nom
         FROM App\Entity\Consultation c  
         JOIN c.enfant e 
         LEFT JOIN  e.douars d  
         WHERE e.sexe = :paramet and c.retard = :retard
         GROUP BY  d.nom           
        ');
          $query->setParameter('paramet',$sexe);
          $query->setParameter('retard',$retard);   
    return $query->getResult();
    }

//--------------------------------------------------------

   










   // Nombre Total enfant mesuré Feminin
   public function enfantmesurefeminin() : array
   {
       
       $entityManager = $this->getEntityManager();
       $query = $entityManager->createQuery(
           'SELECT COUNT(c.id)
            FROM App\Entity\Consultation c 
           ');
       // returns an array of Product objects
       return $query->getResult();
       
   }


     
    /* bentaleb base lien entre les # tables
    public function analysetest() : array
    {
        
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT COUNT(c.id), c ,e ,d
             FROM App\Entity\Consultation c  
             JOIN c.enfant e 
             LEFT JOIN  e.douars d              
            ');
       

        // returns an array of Product objects
        return $query->getResult();
        
    }*/
   
   
   
   
   
    // /**
    //  * @return Consultation[] Returns an array of Consultation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Consultation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
