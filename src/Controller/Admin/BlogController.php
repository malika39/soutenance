<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\User;
use App\Controller\SlugTrait;
use App\Form\ArticleFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    use SlugTrait;


    /**
     * @Route("/blog/article/{slug<[a-zA-Z1-9-_/]+>}", methods={"GET"}, defaults={"slug"="news"}, name="article")
     */
    public function articleSingle()
    {
        $repository = $this->getDoctrine()
            ->getRepository(Article::class);
        $articles = $repository->findBy([], ['id' => 'DESC']);

        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }


    /**
     * Formulaire pour ajouter un article.
     * @Route ("/blog/creer-un-article", name="article_new")
     * @Security("has_role('ROLE_ADMIN')")
     */

    public function newArticle(Request $request)
    {
        #Récupération de l'utilisateur
        $membre = $this->getDoctrine()
            ->getRepository(User::class)
            ->find(1);

        #Création d'un Nouvel Article
        $article = new Article();
        $article->setUser($this->getUser());

        #Création du Formulaire
        $form = $this->createForm(ArticleFormType::class, $article)
            ->handleRequest($request);

        #Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()){
            #dump($article);
            #1.Traitement de l'upload de l'image

            /** @var UploadedFile $featuredImage */
            $featuredImage = $article->getFeaturedImage();

            $fileName = $this->slugifyArticle($article->getTitre()) . '.' . $featuredImage->guessExtension();

            // Move the file to the directory where brochures are stored
            try {
                $featuredImage->move(
                    $this->getParameter('articles_assets_dir'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }

            #Mise à jour de l'image
            $article->setFeaturedImage($fileName);

            #Mise à jour du slug
            $article->setSlug($this->slugifyArticle($article->getTitre()));

            #Sauvegarde en BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            #Notification
            $this->addFlash('notice',
                'Félicitations, votre article est en ligne!');

            #Redirection
            return $this->redirectToRoute('blog', [
                'slug' => $article->getSlug(),
                'id' =>$article->getId() ]);
            // ... persist the $product variable or any other work

        }

        #Affichage dans la vue
        return $this->render('form/articleform.html.twig', [
            'form'=> $form->createView()
        ]);
    }

}
