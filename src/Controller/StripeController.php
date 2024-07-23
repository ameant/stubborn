<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StripeController extends AbstractController
{
    /**
     * @Route("/stripe", name="app_stripe")
     */
    public function index(): Response
    {
        $stripeSecretKey = $_ENV["STRIPE_SECRET_KEY"];

        \Stripe\Stripe::setApiKey($stripeSecretKey);
        $YOUR_DOMAIN = 'http://localhost:4242';
        
        header('Content-Type: application/json');

        $checkout_session = \Stripe\Checkout\Session::create([
        'line_items' => [[
            # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
            'price' => '{{PRICE_ID}}',
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => $YOUR_DOMAIN . '/success',
        'cancel_url' => $YOUR_DOMAIN . '/cancel',
        ]);

        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);

        return $this->render('stripe/index.html.twig');
    }

    /**
     * @Route("/success", name="app_success")
     */    
     public function success(): Response
     {
        return $this->render('stripe/success.html.twig');
     }

     /**
     * @Route("/cancel", name="app_cancel")
     */    
    public function cancel(): Response
    {
        $this->addFlash('cancel', 'Votre achat a été annulé');
        
        return $this->redirectToRoute('app_home');
    }


}
