<?php

namespace App\Controller;


use App\Repository\HousingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/housing", name="index_housing")
     * @param HousingRepository $housingRepository
     * @return Response
     */

    /**
     * @Route("/housing/show", name="show_housing")
     * @param HousingRepository $housingRepository
     * @return Response
     */
    public function housing(HousingRepository $housingRepository): Response
    {
        return $this->render('home/housing.html.twig', [
            'housings' => $housingRepository->findAll(),
        ]);
    }

    public function showHousing(): Response
    {
        return $this->render('home/showHousing.html.twig');
    }
}
