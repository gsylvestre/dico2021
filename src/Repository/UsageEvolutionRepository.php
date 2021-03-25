<?php

namespace App\Repository;

use App\Entity\UsageEvolution;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsageEvolution|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsageEvolution|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsageEvolution[]    findAll()
 * @method UsageEvolution[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsageEvolutionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsageEvolution::class);
    }

    // /**
    //  * @return UsageEvolution[] Returns an array of UsageEvolution objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsageEvolution
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
