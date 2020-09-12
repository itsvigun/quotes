<?php

namespace App\Repository;

use App\Entity\QuoteType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuoteType|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuoteType|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuoteType[]    findAll()
 * @method QuoteType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuoteTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuoteType::class);
    }

    // /**
    //  * @return QuoteType[] Returns an array of QuoteType objects
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
    public function findOneBySomeField($value): ?QuoteType
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
