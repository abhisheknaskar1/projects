<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCategoriesTable extends AbstractMigration
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
        $table = $this->table('categories',[
            'id' => false,
            'primary_key' => 'id'
        ])
        ->addColumn('id', 'uuid')
        ->addColumn('title', 'string', [
            'length' => 128
        ])
        ->addColumn('created','datetime')
        ->addColumn('modified','datetime')
        ->create();
    }
}
