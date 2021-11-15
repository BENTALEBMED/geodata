<?php

namespace App\Repository;

use App\Entity\CentreSoin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CentreSoin|null find($id, $lockMode = null, $lockVersion = null)
 * @method CentreSoin|null findOneBy(array $criteria, array $orderBy = null)
 * @method CentreSoin[]    findAll()
 * @method CentreSoin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentreSoinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CentreSoin::class);
    }

   
   
     /**
    * @return CentreSoin [] Returns an array of CentreSoin objects
    */
    
    public function findListecentre()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.commune', 'ASC')                       
            ->getQuery()
            ->getResult()
        ;
    }
   
   
   
   
   
   
   
   
    // /**
    //  * @return CentreSoin[] Returns an array of CentreSoin objects
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
    public function findOneBySomeField($value): ?CentreSoin
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
