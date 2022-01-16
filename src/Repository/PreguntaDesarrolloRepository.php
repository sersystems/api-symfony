<?php

namespace App\Repository;

use App\Entity\PreguntaDesarrollo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PreguntaDesarrollo|null find($id, $lockMode = null, $lockVersion = null)
 * @method PreguntaDesarrollo|null findOneBy(array $criteria, array $orderBy = null)
 * @method PreguntaDesarrollo[]    findAll()
 * @method PreguntaDesarrollo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreguntaDesarrolloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PreguntaDesarrollo::class);
    }

    // /**
    //  * @return PreguntaDesarrollo[] Returns an array of PreguntaDesarrollo objects
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
    public function findOneBySomeField($value): ?PreguntaDesarrollo
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
