<?php

namespace App\Repository;

use App\Entity\Camada;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Camada|null find($id, $lockMode = null, $lockVersion = null)
 * @method Camada|null findOneBy(array $criteria, array $orderBy = null)
 * @method Camada[]    findAll()
 * @method Camada[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CamadaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Camada::class);
    }

    // /**
    //  * @return Camada[] Returns an array of Camada objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Camada
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
