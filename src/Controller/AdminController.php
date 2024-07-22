<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_USER')]
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    // public function admin (ManagerRegistry $manager) :Response
    // {

    //     if(!$this->isGranted('ROLE_ADMIN')){
    //         return $this->redirectToRoute('app_login');
    //     }

    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');
    //     $categories = $manager->getRepository(Categery::class)->findAll();

    //     return $this->render('admin.html.twig', [
    //         'categories' => $categories
    //     ]);
    // }
}
