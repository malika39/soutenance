<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }

    #Pour afficher les articles dans l'ordre décroissant (du plus récent au plus ancien), 5 articles maximum
    public function findLatestArticles()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findArticlesSuggestions($idArticle)
    {
        return $this->createQueryBuilder('a')
            # Tous les articles d'une catégorie ($idCategorie)
            ->where('a.id = :article_id')
            ->setParameter('article_id', $idArticle)

            # par ordre décroissant
            ->orderBy('a.id', 'DESC')

            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
