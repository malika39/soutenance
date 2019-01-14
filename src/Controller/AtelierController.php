<?php
/**
 * Created by PhpStorm.
 * User: Surface
 * Date: 05/01/2019
 * Time: 23:24
 */

namespace App\Controller;

use App\Repository\AteliersweetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Ateliersweet;
use Symfony\Component\HttpFoundation\Request;


class AtelierController extends AbstractController
{
    public function index(AteliersweetRepository $atelierRepository)
    {
        $allAteliers = $atelierRepository->findAll();
        $latestAteliers = $atelierRepository->findLatest(3);

        return $this->render('shop/index.html.twig', [
            'all_ateliers' => $allAteliers,
            'latest_ateliers' => $latestAteliers,
        ]);
    }

    public function show($slug)
    {
        $atelier = $this->getDoctrine()
            ->getRepository(Ateliersweet::class)
            ->findOneBySlug($slug);

        if (!$atelier) {
            throw $this->createNotFoundException();
        }

        return $this->render('shop/atelier_single.html.twig', [
            'atelier' => $atelier,

        ]);
    }

    public function allAteliers(AteliersweetRepository $atelierRepository)
    {
        $allAteliers = $atelierRepository->findAll();
        return $this->render('shop/all_ateliers.html.twig', [
            'all_ateliers' => $allAteliers,

        ]);
    }


    public function atelierDetail($id)
    {
        $atelier = $this->getDoctrine()
            ->getRepository(Ateliersweet::class)
            ->find($id);
            /* Ateliersweet::class -> c'est le nom de la classe dans entity
            Ateliersweet */
        return $this->render('shop/atelier_detail.html.twig', [
            'atelier' => $atelier
        ]);
    }
}
