<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PivotTableArticleUser extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('article_user',['id' => false, 'primary_key' => ['user_id', 'article_id']]);
        $table->addColumn('article_id', 'integer', ['null' => false, 'signed' => false])
              ->addColumn('user_id', 'integer', ['null' => false, 'signed' => false])
              ->addColumn('quantity', 'integer', ['signed' => false])
              ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
              ->addForeignKey('article_id', 'articles', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
              ->create();
    }
}
