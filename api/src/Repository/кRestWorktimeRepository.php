<?php

namespace App\Repository;

use App\Entity\кRestWorktime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method кRestWorktime|null find($id, $lockMode = null, $lockVersion = null)
 * @method кRestWorktime|null findOneBy(array $criteria, array $orderBy = null)
 * @method кRestWorktime[]    findAll()
 * @method кRestWorktime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class кRestWorktimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, кRestWorktime::class);
    }

    // /**
    //  * @return кRestWorktime[] Returns an array of кRestWorktime objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('�')
            ->andWhere('�.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('�.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?кRestWorktime
    {
        return $this->createQueryBuilder('�')
            ->andWhere('�.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
