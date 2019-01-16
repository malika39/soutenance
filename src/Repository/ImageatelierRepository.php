<?php

namespace App\Repository;

use App\Entity\Imageatelier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Imageatelier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imageatelier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imageatelier[]    findAll()
 * @method Imageatelier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageatelierRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Imageatelier::class);
    }

    // /**
    //  * @return Imageatelier[] Returns an array of Imageatelier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Imageatelier
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
