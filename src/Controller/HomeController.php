<?php

namespace App\Controller;

use App\Repository\HousingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Category;
use App\Entity\User;
use App\Form\SearchByCategoryDoctorType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(SearchByCategoryDoctorType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->get('name')->getData();
            if ($data === null) {
                $results = null;
            } else {
                $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['lastname' => $data]);
                if ($user === null) {
                    $category = $this->getDoctrine()->getRepository(Category::class)->findOneBy(['name' => $data]);
                    if ($category === null) {
                        $results = null;
                    } else {
                        $results = $category->getUsers();
                    }
                } else {
                    $results[] = $user;
                }
            }
        } else {
            $results = null;
        }

        return $this->render('home/index.html.twig', [
            'results' => $results,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/profil/{id}'", name="profil")
     */
    public function profil(User $user)
    {
        return $this->render('home/profil.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/housing", name="index_housing")
     * @param HousingRepository $housingRepository
     * @return Response
     */
    public function housing(HousingRepository $housingRepository): Response
    {
        return $this->render('home/housing.html.twig', [
            'housings' => $housingRepository->findAll(),
        ]);
    }

    /**
     * @Route("/housing/show", name="show_housing")
     * @return Response
     */
    public function showHousing(): Response
    {
        return $this->render('home/showHousing.html.twig');
    }

    /**
     * @Route("/housing/detailed", name="detailed_housing")
     * @return Response
     */
    public function detailedHousing(): Response
    {
        return $this->render('home/imageHousing.html.twig');
    }
}
