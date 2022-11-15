<?php
session_start();


use App\Controllers\AuthenticationController;
use App\Controllers\HomeController;

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
}
