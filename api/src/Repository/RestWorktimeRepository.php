<?php

namespace App\Repository;

use App\Entity\RestWorktime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RestWorktime|null find($id, $lockMode = null, $lockVersion = null)
 * @method RestWorktime|null findOneBy(array $criteria, array $orderBy = null)
 * @method RestWorktime[]    findAll()
 * @method RestWorktime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RestWorktimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RestWorktime::class);
    }

    // /**
    //  * @return RestWorktime[] Returns an array of RestWorktime objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RestWorktime
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
