<?php

namespace App\Middlewares;

class Auth 
{
    static public function auth(){
        if(empty($_SESSION['user']) || $_SESSION['user'] == ''){
            header("Location: /");
            exit();
        }
    }
}