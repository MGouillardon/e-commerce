<?php
session_start();


use App\Controllers\AuthenticationController;
use App\Controllers\HomeController;
use App\Controllers\ArticleController;
use App\Controllers\CartController;

require_once './vendor/autoload.php';


switch (getUri()) {
    case '/':
        $authentication = new AuthenticationController();
        echo $authentication->index();
        break;
    case '/login':
        $authentication = new AuthenticationController();
        echo $authentication->isRegistered();
        break;
    case '/logout':
        $authentication = new AuthenticationController();
        echo $authentication->logOut();
        break;
    case '/getregistered':
        $authentication = new AuthenticationController();
        echo $authentication->createUser();
        break;
    case '/connection':
        $authentication = new AuthenticationController();
        echo $authentication->connection();
        break;
    case '/home':
        $home = new HomeController();
        echo $home->index();
        break;
    case '/article':
        $article = new ArticleController();
        echo $article->show($_GET['id']);
        break;
    case '/cart':
        $cart = new CartController();
        echo $cart->index();
        break;
}
