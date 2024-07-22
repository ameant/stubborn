<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sweatshirts;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="app_product")
     */
    public function show(int $id, Request $request): Response
{
    $sweatshirt = $this->getDoctrine()->getRepository(Sweatshirts::class)->find($id);

    if (!$sweatshirt) {
        throw $this->createNotFoundException('Le sweatshirt n\'existe pas');
    }

    if ($request->isMethod('POST')) {
        // Ajout au panier
        $session = $request->getSession();
        $cart = $session->get('cart', []);
        $cart[$sweatshirt->getId()] = [
            'id' => $sweatshirt->getId(),
            'name' => $sweatshirt->getName(),
            'price' => $sweatshirt->getPrice()
        ];
        $session->set('cart', $cart);

        // Redirection vers la page du panier après ajout
        return $this->redirectToRoute('app_cart');
    }

    return $this->render('product/index.html.twig', [
        'sweatshirt' => $sweatshirt,
    ]);
}

}
