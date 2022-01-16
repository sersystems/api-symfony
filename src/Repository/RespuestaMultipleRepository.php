<?php

namespace App\Repository;

use App\Entity\RespuestaMultiple;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RespuestaMultiple|null find($id, $lockMode = null, $lockVersion = null)
 * @method RespuestaMultiple|null findOneBy(array $criteria, array $orderBy = null)
 * @method RespuestaMultiple[]    findAll()
 * @method RespuestaMultiple[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RespuestaMultipleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RespuestaMultiple::class);
    }

    // /**
    //  * @return RespuestaMultiple[] Returns an array of RespuestaMultiple objects
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
    public function findOneBySomeField($value): ?RespuestaMultiple
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
