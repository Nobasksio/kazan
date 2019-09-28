<?php

namespace App\Repository;

use App\Entity\RestStation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RestStation|null find($id, $lockMode = null, $lockVersion = null)
 * @method RestStation|null findOneBy(array $criteria, array $orderBy = null)
 * @method RestStation[]    findAll()
 * @method RestStation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RestStationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RestStation::class);
    }

    // /**
    //  * @return RestStation[] Returns an array of RestStation objects
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
    public function findOneBySomeField($value): ?RestStation
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
