<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/blog/article/{slug<[a-zA-Z1-9-_/]+>}", methods={"GET"}, defaults={"slug"="news"}, name="article")
     */
    public function index()
    {
        $repository = $this->getDoctrine()
            ->getRepository(Article::class);
        $articles = $repository->findBy([], ['id' => 'DESC']);

        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

}
