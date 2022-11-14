<?php

use App\Controllers\UserController;

require_once './vendor/autoload.php';

$user = new UserController();
switch (getUri()) {
    case '/':
        echo $user->index();
        break;
    case '/login':
        echo $user->getLogIn();
        break;
    case '/home':
        echo $user->isRegistered();
        break;
    
}
