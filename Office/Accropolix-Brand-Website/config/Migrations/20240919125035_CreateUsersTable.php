<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsersTable extends AbstractMigration
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
        $table = $this->table('users', [
            'id' => false,
            'primary_key' => 'id'
        ]);
        $table
        ->addColumn('id', 'uuid')
        ->addColumn('username','string', [
            'length' => 128
        ])
        ->addColumn('password','string', [
            'length' => 128
        ])
        ->addColumn('created','datetime')
        ->addColumn('modified','datetime')
        ->create();
    }
}
