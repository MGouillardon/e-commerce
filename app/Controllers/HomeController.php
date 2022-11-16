<?php

namespace App\Controllers;
use App\Middlewares\Auth; 

class HomeController extends Controller
{
    public function index(): string
    {
        Auth::auth();
        $name = $_SESSION['user'];
        return $this->template->render('home.html.twig', ['username' => $name]);
    }

}
