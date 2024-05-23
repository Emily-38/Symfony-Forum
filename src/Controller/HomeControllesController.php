<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeControllesController extends AbstractController
{
    #[Route('/home', name: 'app_home_controlles')]
    public function index(): Response
    {
        return $this->render('home_controlles/index.html.twig', [
            'controller_name' => 'HomeControllesController',
        ]);
    }
}
