<?php

namespace App\Repository;

use App\Entity\PreguntaMultiple;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PreguntaMultiple|null find($id, $lockMode = null, $lockVersion = null)
 * @method PreguntaMultiple|null findOneBy(array $criteria, array $orderBy = null)
 * @method PreguntaMultiple[]    findAll()
 * @method PreguntaMultiple[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreguntaMultipleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PreguntaMultiple::class);
    }

    // /**
    //  * @return PreguntaMultiple[] Returns an array of PreguntaMultiple objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PreguntaMultiple
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
