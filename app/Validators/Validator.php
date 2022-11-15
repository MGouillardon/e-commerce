<?php 

namespace App\Validators;

use Respect\Validation\Validator as v;

class Validator 
{
    static public function userValidation(string $user): bool
    {

       return v::length(3, 15)->charset('UTF-8')->validate($user);

    }
    static public function emailValidation(string $email): bool
    {

       return v::email()->validate($email);

    }
}