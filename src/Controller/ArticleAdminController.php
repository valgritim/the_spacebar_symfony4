<?php
namespace App\Controller;

use DateTime;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleAdminController extends AbstractController
{
    /**
     * @Route("/admin/article/new")
     *
     */
    public function new(EntityManagerInterface $em){
       
        die('todo');


    }

}