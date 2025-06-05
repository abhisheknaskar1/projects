<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JeevanPradeepSeeder extends Seeder
{
    use WithoutModelEvents, PropertySeederTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resource = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'properties' . DIRECTORY_SEPARATOR . 'jeevan_pradeep' . DIRECTORY_SEPARATOR;
        $this->savePropertyFromPath($resource);
    }
}
