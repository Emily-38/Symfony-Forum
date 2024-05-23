<?php

namespace App\Controller;

use App\Form\ArticleType;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class CreateArticleController extends AbstractController
{
    #[Route('/create_article', name: 'app_create_article')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $article= new Article();
        $form= $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted()&& $form ->isValid())
        {
            $article= $form->getData();

            $manager->persist($article);
            $manager->flush();

            $this->addFlash('sucess','l article a ete crée avec succes');

            return $this->redirectToRoute('app_forum');

            }else{}

        return $this->render('create_article/index.html.twig', [
            'form' =>$form->createView(),
        ]);
    }
}
