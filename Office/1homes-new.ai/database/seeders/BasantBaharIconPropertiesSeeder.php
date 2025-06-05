<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasantBaharIconPropertiesSeeder extends Seeder
{
    use WithoutModelEvents, PropertySeederTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resource = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'properties' . DIRECTORY_SEPARATOR . 'basant_bahar_icon_properties' . DIRECTORY_SEPARATOR;
        $this->savePropertyFromPath($resource);
    }
}
