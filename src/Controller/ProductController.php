<?php
namespace App\Controller;

use App\Repository\AteliersweetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Product;
use App\Repository\ProductRepository;


class ProductController extends AbstractController
{

    public function index(ProductRepository $productRepository, AteliersweetRepository $atelierRepository)
    {
        $allProducts = $productRepository->findAll();
        $latestProducts = $productRepository->findLatest(3);
        $allAteliers = $atelierRepository->findAll();
        $latestAteliers = $atelierRepository->findLatest(3);

        return $this->render('shop/index.html.twig', [
            'all_products' => $allProducts,
            'latest_products' => $latestProducts,
            'all_ateliers' => $allAteliers,
            'latest_ateliers' => $latestAteliers,
        ]);
    }
    // Normalement, on aurait dû créer dans AtelierController une autre fonction index mais avec rendu
    // dans template index.html.twig. Mais le controller a déjà un rendu. et on ne patu pas avoir
    // 2 rendus. C'est limite de Symfony.

    public function show($slug)
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findOneBySlug($slug);

        if (!$product) {
            throw $this->createNotFoundException();
        }

        return $this->render('shop/product_single.html.twig', [
            'product' => $product,
        ]);
    }


    public function allProducts(ProductRepository &$productRepository)
    {
        $allProducts = $productRepository->findAll();
        return $this->render('shop/all_products.html.twig', [
            'allProducts' => $allProducts,

        ]);
    }
}
