<?php

namespace App\Repository;

use App\Entity\OrderBasket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method OrderBasket|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderBasket|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderBasket[]    findAll()
 * @method OrderBasket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderBasketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderBasket::class);
    }

    // /**
    //  * @return OrderBasket[] Returns an array of OrderBasket objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderBasket
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
