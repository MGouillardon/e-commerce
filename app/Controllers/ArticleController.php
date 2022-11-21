<?php

namespace App\Controllers;
use App\Middlewares\Auth; 


class ArticleController extends Controller
{
    public function index(): string
    {
        Auth::auth();
        $name = $_SESSION['user'];
        return $this->template->render('article.html.twig', ['username' => $name]);
    }

}