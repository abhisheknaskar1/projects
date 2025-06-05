<?php
declare(strict_types=1);
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RohanEkamSeeder extends Seeder
{
    use WithoutModelEvents, PropertySeederTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resource = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'properties' . DIRECTORY_SEPARATOR . 'rohan_ekam' . DIRECTORY_SEPARATOR;
        $this->savePropertyFromPath($resource);
    }
}
