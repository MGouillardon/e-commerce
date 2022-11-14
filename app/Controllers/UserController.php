<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index(): string
    {

        return $this->template->render('register.html.twig');
    }

    public function isRegistered(): string
    {

        return $this->template->render('login.html.twig');
    }

    public function createUser(): string {

        $userModel = new User();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedPassword = password_hash($_POST['password'], PASSWORD_ARGON2I);
        $userModel->createUser($name, $email, $hashedPassword);
        return $this->template->render('login.html.twig');
       
    }
    public function connection(): string {

        $userModel = new User();
        $user = $userModel->getUser($email);
        var_dump($user);
        header( 'Location : /home');
        exit();
        
        return $this->template->render('home.html.twig');
       
    }
    
}
