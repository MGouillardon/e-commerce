<?php

namespace App\Controllers;
use App\Middlewares\Auth; 
use App\Models\Article;


class HomeController extends Controller
{
    public function index(): string
    {
        Auth::auth();
        $page = $_GET['page']??'1';
        [$articles, $pages] = $this->pagination($page);
        
        
        return $this->template->render('home.html.twig', ['username' => $_SESSION['user'], 'articles' => $articles, 'page' => $page, 'pages' => $pages]);
    }
    private function pagination(int $page): array {
        $perPage = 2;
        $first = ($page * $perPage)  - $perPage;
        $articleModel = new Article();
        $nbArticles = $articleModel->getNbArticles();
        $pages = ceil($nbArticles / $perPage);
        $articles = $articleModel->getArticlesTwoByTwo($first, $perPage);

        return [$articles, $pages];
    }

}
