<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="app_cart")
     */
    public function index(Request $request): Response
    {
        // Récupération du panier depuis la session
        $session = $request->getSession();
        $cart = $session->get('cart', []);

        // Passer les données au template
        return $this->render('cart/index.html.twig', [
            'cart' => $cart,
        ]);
    }

    /**
     * @Route("/cart/remove/{id}", name="app_remove_from_cart")
     */
    public function removeFromCart(int $id, Request $request): Response
    {
        // Récupération du panier depuis la session
        $session = $request->getSession();
        $cart = $session->get('cart', []);

        // Suppression de l'article du panier
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $session->set('cart', $cart);
        }

        // Redirection vers la page du panier après suppression
        return $this->redirectToRoute('app_cart');
    }
}
