<?php

namespace App\Repository;

use App\Entity\AirLines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AirLines|null find($id, $lockMode = null, $lockVersion = null)
 * @method AirLines|null findOneBy(array $criteria, array $orderBy = null)
 * @method AirLines[]    findAll()
 * @method AirLines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AirLinesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AirLines::class);
    }

    // /**
    //  * @return AirLines[] Returns an array of AirLines objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AirLines
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
