<?php 

namespace App\Validators;

use App\Exceptions\ValidatorException;

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

        return [$email, $name, $hashedPassword];
    }
}
