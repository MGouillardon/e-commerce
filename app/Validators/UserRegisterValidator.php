<?php 

namespace App\Validators;

use App\Exceptions\ValidatorException;
use App\Exceptions\EmailAlreadyExistsException;
use App\Models\User;


class UserRegisterValidator 
{
    static public function handle(){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $nameIsValid = Validator::userValidation($name);
        $emailIsValid = Validator::emailValidation($email);
        $hashedPassword = password_hash($_POST['password'], PASSWORD_ARGON2I);

        if (!$nameIsValid || !$emailIsValid) {
            throw new ValidatorException('Invalid username, email or password');
            }
        $user = new User();
        if($user->exist($email) === true){
            throw new EmailAlreadyExistsException('Email already exists');
        }

        return [$email, $name, $hashedPassword];
    }
}
