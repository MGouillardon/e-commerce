<?php

namespace App\Controllers;

use App\Models\User;

class AuthenticationController extends Controller
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

    public function createUser(): string|bool {

        $userModel = new User();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $nameIsValid = Validator::userValidation($name);
        $emailIsValid = Validator::emailValidation($email);
        $hashedPassword = password_hash($_POST['password'], PASSWORD_ARGON2I);

        if($nameIsValid && $emailIsValid){

            $userModel->createUser($name, $email, $hashedPassword);
            return $this->template->render('login.html.twig');
        } else {
            $_SESSION['message'] = 'Invalid username, email or password';
            return $this->template->render('register.html.twig', ['session' => $_SESSION]);

        }
       
    }
    public function connection(): void {

        $userModel = new User();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $userModel->getUserByEmail($email);
        if (password_verify($password, $user['password'])){
            $_SESSION['user'] = $user['name'];
            header('Location: /home');
            exit;
        }
               
    }
    public function logOut(): string
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /login');
            exit;
    }
    
}
