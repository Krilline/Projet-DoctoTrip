<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/doctors", name="doctors")
     * @return Response
     */
    public function doctors(UserRepository $userRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('home/doctors.html.twig', [
            'doctors' => $userRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}
