<?php

namespace App\Repository;

use App\Entity\QuotesType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuotesType|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuotesType|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuotesType[]    findAll()
 * @method QuotesType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuotesTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuotesType::class);
    }

    // /**
    //  * @return QuotesType[] Returns an array of QuotesType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuotesType
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
