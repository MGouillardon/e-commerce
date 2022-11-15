<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index(): string
    {
        $name = $_SESSION['user'];
        return $this->template->render('home.html.twig', ['username' => $name]);
    }

}
