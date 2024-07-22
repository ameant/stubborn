<?php

// src/Controller/HomeController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sweatshirts;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        $sweatshirtRepository = $this->getDoctrine()->getRepository(Sweatshirts::class);
        $highlightedSweatshirts = $sweatshirtRepository->findBy(['id' => [1, 4, 9]]);

        return $this->render('home/index.html.twig', [
            'highlightedSweatshirts' => $highlightedSweatshirts,
        ]);
    }
}