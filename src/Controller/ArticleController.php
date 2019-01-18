<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $repository = $this->getDoctrine()
            ->getRepository(Article::class);

        $articles = $repository->findBy([], ['id' => 'DESC']);

        return $this->render('blog/index.html.twig', [
            'articles' => $articles
        ]);
    }

    public function article($slug, Article $article = null)
    {

        if(null === $article){
            return $this->redirectToRoute('indexblog', [], Response::HTTP_MOVED_PERMANENTLY);
        }

        #Vérification du SLUG
        if($article->getSlug() !== $slug )
        {
            return $this->redirectToRoute('blog', [
                'slug' => $article->getSlug(),
                'id' =>$article->getId()
            ]);
        }

        # Récupération des suggestions
        $suggestions = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findArticlesSuggestions(
                $article->getId()
            );

        return $this->render('blog/index.html.twig', ['article'=> $article, 'suggestions' =>$suggestions]);
    }

}
