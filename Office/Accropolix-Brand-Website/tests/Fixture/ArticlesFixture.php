<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArticlesFixture
 */
class ArticlesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '6e7c0a2e-ec52-43ed-a444-1ae11ac438f1',
                'image' => 'Lorem ipsum dolor sit amet',
                'title' => 'Lorem ipsum dolor sit amet',
                'category_id' => '459adb57-4120-4b0b-a801-0c7d85e0b821',
                'created' => 1726756139,
                'modified' => 1726756139,
            ],
        ];
        parent::init();
    }
}
