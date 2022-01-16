<?php

namespace App\Repository;

use App\Entity\Respondedero;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Respondedero|null find($id, $lockMode = null, $lockVersion = null)
 * @method Respondedero|null findOneBy(array $criteria, array $orderBy = null)
 * @method Respondedero[]    findAll()
 * @method Respondedero[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RespondederoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Respondedero::class);
    }

    // /**
    //  * @return Respondedero[] Returns an array of Respondedero objects
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
    public function findOneBySomeField($value): ?Respondedero
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
