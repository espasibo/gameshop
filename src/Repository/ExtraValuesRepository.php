<?php

namespace App\Repository;

use App\Entity\ExtraValues;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ExtraValues|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExtraValues|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExtraValues[]    findAll()
 * @method ExtraValues[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtraValuesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ExtraValues::class);
    }

    // /**
    //  * @return ExtraValues[] Returns an array of ExtraValues objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExtraValues
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
