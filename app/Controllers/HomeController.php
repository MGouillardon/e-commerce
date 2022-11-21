<?php

namespace App\Controllers;
use App\Middlewares\Auth; 
use App\Models\Article;


class HomeController extends Controller
{
    public function index(): string
    {
        Auth::auth();
        $name = $_SESSION['user'];
        $articleModel = new Article();
        $articles = $articleModel->all();
        return $this->template->render('home.html.twig', ['username' => $name, 'articles' => $articles]);
    }

}
