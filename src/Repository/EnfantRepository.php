<?php

namespace App\Repository;

use App\Entity\Douar;
use App\Entity\Enfant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Enfant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enfant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enfant[]    findAll()
 * @method Enfant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnfantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Enfant::class);
    }
  
    /**
     * @return array
     */
    public function findmes()
    {

        $qb =$this->createQueryBuilder('e');
        $qb->orderBy('e.id','DESC');
        return $qb->getQuery()
        ->getResult();      


    }
  
  
  
  
  
    /**
    * @return Enfant[] Returns an array of Enfant objects
    */
    
    public function findListe()
    {
        return $this->createQueryBuilder('e')                                
            ->getQuery()
            ->getResult()
        ;
    }
    

  
    


    /**
    * @return Enfant[] Returns an array of Enfant objects avec les consultation
    *     
    */
    public function findAnalyse()
    {
        return $this->createQueryBuilder('e')                            
            ->leftjoin('e.consultations', 'consul' )
            ->addSelect('consul')          
            ->getQuery()
            ->getResult()
        ;
    }

    
    public function findOneBysmi($smi): ?Enfant
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.smi = :val')
            ->setParameter('val', $smi)            
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    

    public function findOneBynomcercle($nomcercle): ?Enfant
    {
        return $this->createQueryBuilder('e')
        ->andWhere('e.douars.cercle = :val')
        ->leftjoin('e.douars', 'douars' )
        ->addSelect('douars') 
        ->setParameter('val', $nomcercle)         
        ->getQuery()
        ->getResult()
            
        
        
        
        //->andWhere('e.nom = :val')
           // ->setParameter('val', $nomcercle)
           // ->getQuery()
           // ->getOneOrNullResult()
        ;
    }

   // Nombre Total enfant mesuré cercle
public function enfantscercle($cercle) : array
{
    $entityManager = $this->getEntityManager();
    $query = $entityManager->createQuery(
        'SELECT e, c ,d
         FROM App\Entity\Enfant e 
         JOIN e.consultations c 
         LEFT JOIN  e.douars d  
         WHERE  d.cercle = :cercle                   
        ');   
          $query->setParameter('cercle',$cercle);   
    return $query->getResult();
    }



    // /**
    //  * @return Enfant[] Returns an array of Enfant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Enfant
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}
