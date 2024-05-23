<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Attribute\Route;

class ForumController extends AbstractController
{
    #[Route('/forum', name: 'app_forum')]
    public function index( ArticleRepository $repository ): Response
    {
        $articles=$repository->findAll();

        return $this->render('forum/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
