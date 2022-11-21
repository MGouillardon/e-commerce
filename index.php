<?php
session_start();


use App\Controllers\AuthenticationController;
use App\Controllers\HomeController;
use App\Controllers\ArticleController;

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
        $product = new ArticleController();
        echo $product->index();
        break;
}
