<?php

use App\Controllers\UserController;

require_once './vendor/autoload.php';

$user = new UserController();
switch (getUri()) {
    case '/':
        echo $user->index();
        break;
    case '/login':
        echo $user->isRegistered();
        break;
    case '/getregistered':
        echo $user->createUser();
        break;
    case '/connection':
        echo $user->connection();
        break;
    case '/home':
        echo $user->isRegistered();
        break;
}
