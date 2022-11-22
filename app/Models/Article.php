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
    public function getNbArticles() : ORM|int 
    {
        return ORM::forTable(self::$table)->count();
    }
    public function getArticlesTwoByTwo(int $first, int $perPage): array 
    {
        return ORM::forTable(self::$table)->order_by_desc('id')->limit($perPage)->offset($first)->find_many();
    }

    
}
