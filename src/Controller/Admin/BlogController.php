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
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    /**
     * Démonstration de l'ajout d'un Article avec Doctrine !
     * @Route("/blog/test", name="article_demo")
     */
    public function demo()
    {
        #Appel du membre
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find(1);

        #Création de l'Article
        $article = new Article();
        $article
            ->setTitre("Galette des rois : la meilleure recette")
            ->setSlug("galette-des-rois-la-meilleure-recette")
            ->setContenu("<p>Pour faire une super galette, il vous faut de la pâte feuilleté, du beurre et de la poudre d'amandes !</p>")
            ->setFeaturedImage("croissant.jpg")
            ->setDateCreation(\DateTime::createFromFormat('Y-m-d', "2018-01-16"))
            ->setUser($user);

        /*
         * Récupération du Manager de Doctrine.
         * Le Entity Manager est une classe qui sait
         * comment persister d'autres classes.
         * (Effectuer des opérations CRUD sur nos entités).
         */

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->persist($article);
        $em->flush();

        return new Response('Nouvel article ajouté avec ID:' . $article->getId() . 'de Auteur:' . $user->getLastName());
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

            /*$fileName = $this->slugifyArticle($article->getTitre()) . '.' . $featuredImage->guessExtension();

            // Move the file to the directory where brochures are stored
            try {
                $featuredImage->move(
                    $this->getParameter('articles_assets_dir'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }*/

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
            return $this->redirectToRoute('index', [
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
