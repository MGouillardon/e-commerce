<?php

namespace App\Controllers;
use App\Middlewares\Auth; 
use App\Models\Article;


class CartController extends Controller
{
    public function index(): string
    {
        Auth::auth();
        $name = $_SESSION['user'];
        $articleModel = new Article();
        $articles = $articleModel->all();
        return $this->template->render('cart.html.twig', ['username' => $name, 'articles' => $articles]);
    }
    public function addToCart(): string
    {
        $_SESSION['cart']++;
        return json_encode(['cart' => $_SESSION['cart']]);
    }
    public function getQuantityCart(): string
    {
        return json_encode(['cart' => $_SESSION['cart']]);
    }

}
