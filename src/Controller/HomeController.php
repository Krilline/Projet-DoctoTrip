<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Category;
use App\Entity\User;
use App\Form\BookingType;
use App\Form\SearchByCategoryDoctorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * @Route("/profil/{id}", name="profil")
     */
    public function profil(User $user)
    {
        return $this->render('home/profil.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/meet", name="meet")
     */
    public function meet(Request $request)
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($booking);
            $entityManager->flush();

            return $this->render('home/meet.html.twig', [
                'form'=>$form->createView(),
                'submited' => true,
            ]);
        }
        return $this->render('home/meet.html.twig', [
            'submited' => false,
            'form' => $form->createView(),
        ]);
    }
}
