<?php

namespace App\Repository;

use App\Entity\TrainRoute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TrainRoute|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrainRoute|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrainRoute[]    findAll()
 * @method TrainRoute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrainRouteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrainRoute::class);
    }

    // /**
    //  * @return TrainRoute[] Returns an array of TrainRoute objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TrainRoute
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
