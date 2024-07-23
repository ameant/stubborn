<?php

namespace App\Controller;

use App\Entity\Sweatshirts;
use App\Form\SweatshirtsType;
use App\Repository\SweatshirtsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class SweatshirtsController extends AbstractController
{
    /**
     * @Route("/", name="app_sweatshirts_index", methods={"GET"})
     */
    public function index(SweatshirtsRepository $sweatshirtsRepository): Response
    {
        return $this->render('sweatshirts/index.html.twig', [
            'sweatshirts' => $sweatshirtsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_sweatshirts_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SweatshirtsRepository $sweatshirtsRepository): Response
    {
        $sweatshirt = new Sweatshirts();
        $form = $this->createForm(SweatshirtsType::class, $sweatshirt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sweatshirtsRepository->add($sweatshirt, true);

            return $this->redirectToRoute('app_sweatshirts_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sweatshirts/new.html.twig', [
            'sweatshirt' => $sweatshirt,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_sweatshirts_show", methods={"GET"})
     */
    public function show(Sweatshirts $sweatshirt): Response
    {
        return $this->render('sweatshirts/show.html.twig', [
            'sweatshirt' => $sweatshirt,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_sweatshirts_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Sweatshirts $sweatshirt, SweatshirtsRepository $sweatshirtsRepository): Response
    {
        $form = $this->createForm(SweatshirtsType::class, $sweatshirt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sweatshirtsRepository->add($sweatshirt, true);

            return $this->redirectToRoute('app_sweatshirts_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sweatshirts/edit.html.twig', [
            'sweatshirt' => $sweatshirt,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_sweatshirts_delete", methods={"POST"})
     */
    public function delete(Request $request, Sweatshirts $sweatshirt, SweatshirtsRepository $sweatshirtsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sweatshirt->getId(), $request->request->get('_token'))) {
            $sweatshirtsRepository->remove($sweatshirt, true);
        }

        return $this->redirectToRoute('app_sweatshirts_index', [], Response::HTTP_SEE_OTHER);
    }
}
