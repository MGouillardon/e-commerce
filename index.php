<?php

use App\Controllers\RegisterController;

require_once './vendor/autoload.php';

$register = new RegisterController();
switch (getUri()) {
    case '/':
        echo $register->index();
        break;
    
}
