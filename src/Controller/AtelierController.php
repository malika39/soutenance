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


class AtelierController extends AbstractController
{


    public function show($slug)
    {
        $ateliersweet = $this->getDoctrine()
            ->getRepository(Ateliersweet::class)
            ->findOneBySlug($slug);

        if (!$ateliersweet) {
            throw $this->createNotFoundException();
        }

        return $this->render('shop/atelier_single.html.twig', [
            'ateliersweet' => $ateliersweet,
        ]);
    }
}
