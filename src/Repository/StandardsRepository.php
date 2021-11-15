<?php

namespace App\Repository;

use App\Entity\Standards;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Standards|null find($id, $lockMode = null, $lockVersion = null)
 * @method Standards|null findOneBy(array $criteria, array $orderBy = null)
 * @method Standards[]    findAll()
 * @method Standards[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StandardsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Standards::class);
    }

    // /**
    //  * @return Standards[] Returns an array of Standards objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Standards
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
