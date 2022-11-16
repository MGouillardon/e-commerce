<?php

namespace App\Controllers;
use App\Middlewares\Auth; 


class ProductsController extends Controller
{
    public function index(): string
    {
        Auth::auth();
        $name = $_SESSION['user'];
        return $this->template->render('product.html.twig', ['username' => $name]);
    }

}