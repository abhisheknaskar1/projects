<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MSoulStringsSeeder extends Seeder
{
    use WithoutModelEvents, PropertySeederTrait;

    /**
     * @return void
     */
    public function run(): void
    {
        $resources = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'properties' . DIRECTORY_SEPARATOR . 'm_soul_strings' . DIRECTORY_SEPARATOR;
        $this->savePropertyFromPath($resources);
    }
}
