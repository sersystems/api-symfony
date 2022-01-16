<?php

namespace App\Repository;

use App\Entity\Preguntero;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Preguntero|null find($id, $lockMode = null, $lockVersion = null)
 * @method Preguntero|null findOneBy(array $criteria, array $orderBy = null)
 * @method Preguntero[]    findAll()
 * @method Preguntero[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PregunteroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Preguntero::class);
    }

    // /**
    //  * @return Preguntero[] Returns an array of Preguntero objects
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
    public function findOneBySomeField($value): ?Preguntero
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
