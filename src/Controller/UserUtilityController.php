<?php


namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class UserUtilityController extends AbstractController
{
    /**
     * @Route("/utility/categories", name="utility_categories" , methods="GET")
     */
    public function getTagsApi(CategoryRepository $categoryRepository, Request $request)
    {
        $categories = $categoryRepository->findAllMatching($request->query->get('query'));

        return $this->json([
            'categories' => $categories
        ], 200, [], ['groups' => ['search']]);
    }

    /**
     * @Route("/utility/users", name="utility_users" , methods="GET")
     */
    public function getUsersApi(UserRepository $userRepository, Request $request)
    {
        $users = $userRepository->findAllMatching($request->query->get('query'));

        return $this->json([
            'users' => $users
        ], 200, [], ['groups' => ['search']]);
    }
}