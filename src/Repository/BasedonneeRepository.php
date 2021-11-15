<?php

namespace App\Repository;

use App\Entity\Basedonnee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Basedonnee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Basedonnee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Basedonnee[]    findAll()
 * @method Basedonnee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BasedonneeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Basedonnee::class);
    }

    // /**
    //  * @return Basedonnee[] Returns an array of Basedonnee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Basedonnee
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
