<?php
declare(strict_types=1);

use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time; 
use Cake\Utility\Text;

use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $now = (new Time())->format("Y-m-d H:i:s");
        $data = [
            [
                'id' => Text::uuid(),
                'username' => 'accroadmin',
                'password' => (new DefaultPasswordHasher())->hash('Secret'),
                'created' => $now,
                'modified' => $now
            ]
        ];

        $table = $this->table('users');
        $table->truncate(); 
        $table->insert($data)->save();
    }
}
