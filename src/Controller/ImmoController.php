<?php

namespace App\Controller;

use App\Entity\Immo;
use App\Form\ImmoType;
use App\Repository\ImmoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/immo', name: 'immo_')]
class ImmoController extends AbstractController
{
    #[Route('/list', name: 'list')]
    public function index(ImmoRepository $immoRepository): Response
    {
        $immos = $immoRepository->findAll();
        return $this->render('immo/list.html.twig', ['immos'=> $immos]);
    }

    #[Route('/add', name: 'add')]
    public function add(ImmoRepository $immoRepository, Request $request): Response
    {
        $immo = new Immo();
        $immoForm = $this->createForm(ImmoType::class, $immo);
        $immoForm->handleRequest($request);

        if ($immoForm->isSubmitted()) {
            $immoRepository->save($immo, true);
            $this->addFlash('success', "Immo added !");
            return $this->redirectToRoute('immo_show', ['id' => $immo->getId()]);
        }
        return $this->render('immo/add.html.twig');
    }

    #[Route('/{id}', name: 'list')]
    public function show(Immo $id): Response
    {
        return $this->render('immo/show.html.twig', ['immo' => $id]);
    }
}
