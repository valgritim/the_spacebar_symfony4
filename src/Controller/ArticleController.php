<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Article;
use Psr\Log\LoggerInterface;
use Michelf\MarkdownInterface;
use App\Service\MarkdownHelper;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(ArticleRepository $repository)
    {
        $articles = $repository->findAllPublishedByNewest();

        return $this->render('article/homepage.html.twig',
                    [
                        'articles' =>$articles,
                    ]);
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show(Article $article, EntityManagerInterface $em)
    {
         
     
        return $this->render('article/show.html.twig', [
            'article' => $article,
            
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart(Article $article, LoggerInterface $logger, EntityManagerInterface $em)
    {
        // TODO - actually heart/unheart the article!
        $article->incrementHeartCount();
        
        $em->flush();

        $logger->info('Article is being hearted!');

        return new JsonResponse(['hearts' => $article->getHeartCount()]);
    }
}
