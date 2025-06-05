<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PethkarSiyonaSeeder extends Seeder
{
    use WithoutModelEvents, PropertySeederTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resources = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'properties' . DIRECTORY_SEPARATOR . 'pethkar_siyona' . DIRECTORY_SEPARATOR;
        $this->savePropertyFromPath($resources);
    }
}
