<?php

namespace App\Validators;

use App\Models\User;
use App\Exceptions\ValidatorLogInException;

class UserLogInValidator
{
    static public function handle()
    {
        $userModel = new User();
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $user = $userModel->getUserByEmail($email);

        if (!($user && password_verify($password, $user['password']))) {
            throw new ValidatorLogInException('email or password is incorrect');
        }
        return $user;
    }
}
