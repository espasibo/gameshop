<?php

namespace App\Repository;

use App\Entity\Demo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Demo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Demo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Demo[]    findAll()
 * @method Demo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Demo::class);
    }

    // /**
    //  * @return Demo[] Returns an array of Demo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Demo
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
