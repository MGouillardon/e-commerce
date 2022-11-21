<?php

namespace App\Models;

use IdiormResultSet;
use ORM;

class Article extends Model
{
    static protected string $table = 'articles';

    public function all(): IdiormResultSet|array
    {   
        return ORM::forTable(self::$table)->findMany();
    }

    public function get(int $id): ORM|bool
    {   
        return ORM::forTable(self::$table)->findOne($id);
    }

    
}
