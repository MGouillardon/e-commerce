<?php

namespace App\Controllers;


class UserController extends Controller
{
    public function index(): string
    {

        return $this->template->render('register.html.twig');
    }

    public function isRegistered(): string
    {

        return $this->template->render('home.html.twig');
    }
    public function getLogIn(): string
    {

        return $this->template->render('login.html.twig');
    }
    
}
