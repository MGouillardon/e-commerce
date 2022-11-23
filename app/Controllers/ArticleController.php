<?php

namespace App\Controllers;

use App\Middlewares\Auth;
use App\Models\Article;


class ArticleController extends Controller
{

    public function show(int $id): string   
    {
        Auth::auth();
        $name = $_SESSION['user'];
        $articleModel = new Article();
        $article = $articleModel->get($id);
        return $this->template->render('article.html.twig', ['article' => $article, 'username' => $_SESSION['user']]);
    }
}
