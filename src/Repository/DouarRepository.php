<?php

namespace App\Repository;

use App\Entity\Douar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Douar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Douar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Douar[]    findAll()
 * @method Douar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DouarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Douar::class);
    }

     /**
    * @return Douar[] Returns an array of Douar objects
    */
    
    public function findListe()
    {
        return $this->createQueryBuilder('d')
            ->orderBy('d.cercle', 'ASC')
            ->addOrderBy('d.commune' , 'ASC')           
            ->getQuery()
            ->getResult()
        ;
    }






   
   
    // /**
    //  * @return Douar[] Returns an array of Douar objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Douar
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
