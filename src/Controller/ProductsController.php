<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sweatshirts;

class ProductsController extends AbstractController
{
    /**
     * @Route("/products", name="app_products")
     */
    public function index(): Response
    {
        $sweatshirts = $this->getDoctrine()->getRepository(Sweatshirts::class)->findAll();

        return $this->render('products/index.html.twig', [
            'sweatshirts' => $sweatshirts,
        ]);
    }
}