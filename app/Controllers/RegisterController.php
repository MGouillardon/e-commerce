<?php

namespace App\Controllers;


class RegisterController extends Controller
{
    public function index(): string
    {

        return $this->template->render('home.html.twig');
    }
    
}
