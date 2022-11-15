<?php

namespace App\Controllers;

use App\Models\User;
use App\Validators\UserRegisterValidator;
use App\Validators\UserLogInValidator;
use App\Exceptions\ValidatorException;
use App\Exceptions\ValidatorLogInException;

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

    public function createUser(): string|bool
    {
        
        try {
            [$email, $name, $hashedPassword] = UserRegisterValidator::handle();    
        } catch(ValidatorException $e) {
            
            $_SESSION['message'] = $e->getMessage();
            return $this->template->render('register.html.twig', ['session' => $_SESSION]);
            
        }
        $userModel = new User();
        $userModel->createUser($name, $email, $hashedPassword);
        return $this->template->render('login.html.twig');
    }

    public function connection(): string
    {
        try {
            $user = UserLogInValidator::handle();
                    
        } catch(ValidatorLogInException $e) {
            
            $_SESSION['message'] = $e->getMessage();
            return $this->template->render('login.html.twig', ['session' => $_SESSION]);
            
        }
        $_SESSION['user'] = $user['name'];
        return $this->template->render('home.html.twig', ['session' => $_SESSION]);

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
