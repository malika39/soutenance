<?php

namespace App\Repository;

use App\Entity\Ateliersweet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @method Ateliersweet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ateliersweet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ateliersweet[]    findAll()
 * @method Ateliersweet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AteliersweetRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ateliersweet::class);
    }

    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return $this->createQueryBuilder('a')
            ->where('a.id = :id')
            ->andWhere('a.deletedAt = 0')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findOneBySlug(string $slug): ?Ateliersweet
    {
        return $this->createQueryBuilder('a')
            ->where('a.slug = :slug')
            ->andWhere('a.deletedAt = 0')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findDuplicateSlug(?int $id, string $slug): ?Ateliersweet
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder
            ->andWhere('a.deletedAt = 0');
        if ($id) {
            $queryBuilder
                ->andWhere('a.id != :id')
                ->setParameter('id', $id);
        }
        $queryBuilder->andWhere('a.slug = :slug OR a.slug LIKE :slug_with_suffix')
            ->setParameter('slug', $slug)
            ->setParameter('slug_with_suffix', $slug . '-%');

        return $queryBuilder
            ->orderBy('a.slug', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findAll()
    {
        return $this->createQueryBuilder('a')
            ->where('a.deletedAt = 0')
            ->getQuery()
            ->getResult();
    }
    /* 'a' -> c'est l'alias. Ca correspond à la première lettre de atelier. Quand il
    cherche dans la base de données il chercher a pour atelier. */

    public function findAllWithDeleted()
    {
        return $this->createQueryBuilder('a')
            ->getQuery()
            ->getResult();
    }

    public function findAllById(array $ids)
    {
        return $this->createQueryBuilder('a')
            ->where('a.id IN (:ids)')
            ->andWhere('a.deletedAt = 0')
            ->setParameter('ids', $ids)
            ->getQuery()
            ->getResult();
    }

    public function search(?string $query, int $firstResult = 0, int $maxResults = 10)
    {
        $query = $this->createQueryBuilder('a')
            ->where('a.name LIKE :query')
            ->andWhere('a.deletedAt = 0')
            ->setFirstResult($firstResult)
            ->setMaxResults($maxResults)
            ->setParameter('query', '%'.addcslashes($query, '%_').'%');

        return new Paginator($query);
    }

    public function getPaginated(int $firstResult = 0, int $maxResults = 10)
    {
        $query = $this->createQueryBuilder('a')
            ->select('a')
            ->where('a.deletedAt = 0')
            ->orderBy('a.dateCreated', 'DESC')
            ->setFirstResult($firstResult)
            ->setMaxResults($maxResults);

        return new Paginator($query);
    }

    public function countCurrentlySelling()
    {
        return $this->createQueryBuilder('a')
            ->select('count(a.id)')
            ->where('a.deletedAt = 0')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findLatest(int $maxResults): array
    {
        return $this->createQueryBuilder('a')
            ->select('a')
            ->where('a.deletedAt = 0')
            ->orderBy('a.dateCreated', 'DESC')
            ->setMaxResults($maxResults)
            ->getQuery()
            ->getResult();
    }
}
