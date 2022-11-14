<?php

namespace App\Controllers;

use App\Models\User;

class AuthentificationController extends Controller
{
    public function index(): string
    {

        return $this->template->render('register.html.twig');
    }

    public function isRegistered(): string
    {

        return $this->template->render('login.html.twig');
    }

    public function isConnected(): string
    {

        return $this->template->render('home.html.twig');
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
    public function connection(): void {

        $userModel = new User();
        $email = $_POST['email'];
        $password = $_POST['password'];
        var_dump('hello');
        $user = $userModel->getUser($email);

        if (password_verify($password, $user['password'])){
            $_SESSION['user'] = $user['name'];
            header('Location: /home');
            exit;
        }
               
    }
    
}
