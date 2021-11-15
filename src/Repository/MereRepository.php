<?php

namespace App\Repository;

use App\Entity\Mere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mere[]    findAll()
 * @method Mere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mere::class);
    }

    // /**
    //  * @return Mere[] Returns an array of Mere objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mere
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @param mixed $nom
     * @return array
     */
    public function findBynom($nom)
    {

        $qb =$this->createQueryBuilder('m');
        $qb->where('m.nom LIKE :name')
            ->setParameter('name','%'.$nom.'%')
            ->orderBy('m.id','DESC');

        return $qb->getQuery()
        ->getArrayResult();
        


    }

    /**
     * @return array
     */
    public function findmes()
    {

        $qb =$this->createQueryBuilder('m');
        $qb->orderBy('m.id','DESC');

        return $qb->getQuery()
        ->getResult();
        


    }


}
