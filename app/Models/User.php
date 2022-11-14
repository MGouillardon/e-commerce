<?php

namespace App\Models;

use ORM;

class User extends Model
{
    static protected string $table = 'users';


    public function createUser(string $name, string $email, string $password): void
    {
        $user = ORM::for_table(self::$table)->create();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();

    }

    public function getUser(string $email): ORM|bool
    {
        return ORM::for_table(self::$table)->where('email', ':email')->find_one($email);

        var_dump("salut");
    }
    
}
