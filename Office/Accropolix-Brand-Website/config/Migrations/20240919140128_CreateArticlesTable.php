<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateArticlesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('articles', [
            'id' => false,
            'primary_key' => 'id'
        ]);
        $table->addColumn('id', 'uuid')
        ->addColumn('image', 'string', [
            'null' => false,
            'length' => 1024*1024
        ])
        ->addColumn('title', 'string', [
            'length' => 128
        ])
        ->addColumn('category_id', 'uuid')       
        ->addColumn('action_url', 'string')
        ->addColumn('created','datetime')
        ->addColumn('modified','datetime')
        
        ->create();
    }
}
