<?php
/**
 * Created by PhpStorm.
 * User: Surface
 * Date: 05/01/2019
 * Time: 23:05
 */

namespace App\Controller\Admin;

use App\Entity\Ateliersweet;
use App\Entity\Imageatelier;
use App\Form\AteliersweetType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;

use App\Service\Slugger;



class AtelierController extends AbstractController
{
    public function index(Request $req, $page)
    {
        $form = $this->createFormBuilder()
            ->add('search', SearchType::class)
            ->getForm();

        $form->handleRequest($req);
        $maxResults = 10;
        $firstResult = $maxResults * ($page - 1);

        if ($form->isSubmitted() && $form->isValid()) {
            $query = $form->getData();

            $ateliersweets = $this->getDoctrine()
                ->getRepository(Ateliersweet::class)
                ->search($query['search'], $firstResult, $maxResults);
        } else {
            $ateliersweets = $this->getDoctrine()
                ->getRepository(Ateliersweet::class)
                ->getPaginated($firstResult, $maxResults);
        }

        $totalResults = count($ateliersweets);
        $totalPages = 1;
        if ($totalResults > 0) {
            $totalPages = ceil($totalResults / $maxResults);
        }

        return $this->render('admin/all_ateliers.html.twig', [
            'ateliersweets' => $ateliersweets,
            'form' => $form->createView(),
            'total_pages' => $totalPages,
            'current_page' => $page,
        ]);
    }

    public function editor(Request $req, $id, Slugger $slugger)
    {
        $ateliersweet = new Ateliersweet();
        $title = 'Nouveau Atelier';

        if ($id) {
            $ateliersweet = $this->getDoctrine()
                ->getRepository(Ateliersweet::class)
                ->find($id);

            if (!$ateliersweet) {
                throw $this->createNotFoundException('Ce Atelier n\'existe pas');
            }

            $title = 'Modification d\'un Atelier';
        } else {
            $ateliersweet->addImage(new Imageatelier());
        }

        $form = $this->createForm(AteliersweetType::class, $ateliersweet);

        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($ateliersweet->getImagess() as $image) {
                if ($file = $image->getFile()) {
                    $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                    $filesize = filesize($file);
                    $image->setSize($filesize);
                    $image->setName($filename);
                    $file->move($this->getParameter('imagess_directory'), $filename);
                }
            }

            $slug = $slugger->slugify($ateliersweet);
            $ateliersweet->setSlug($slug);

            $em = $this->getDoctrine()->getManager();
            $em->persist($ateliersweet);
            $em->flush();

            $this->addFlash('success', 'Atelier ajouté');

            return $this->redirect($this->generateUrl('admin_atelier-editor', [
                'id' => $ateliersweet->getId(),
            ]));
        }

        return $this->render('admin/atelier_editor.html.twig', [
            'form' => $form->createView(),
            'title' => $title,
        ]);
    }

    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();

        $ateliersweet = $em->getRepository(Ateliersweet::class)->find($id);
        $ateliersweet->setDeletedAt(new \Datetime());

        $em->persist($ateliersweet);
        $em->flush();

        $this->addFlash('success', 'Atelier supprimé');

        return $this->redirectToRoute('admin_index');
    }
}
