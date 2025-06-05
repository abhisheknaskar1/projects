<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyCategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_categories')->insert([
            'id' => Str::uuid(),
            'code' => 'curated-apartment',
            'title' => 'Curated Apartments',
            'description' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('property_categories')->insert([
            'id' => Str::uuid(),
            'code' => 'exclusive-properties',
            'title' => 'Exclusive Properties',
            'description' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('property_categories')->insert([
            'id' => Str::uuid(),
            'code' => 'plots-and-villas',
            'title' => 'Plots And Villas',
            'description' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('property_categories')->insert([
            'id' => Str::uuid(),
            'code' => 'sectorial-properties',
            'title' => 'Sectorial Property',
            'description' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
