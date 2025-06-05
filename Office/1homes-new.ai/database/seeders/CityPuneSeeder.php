<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CityPuneSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var \App\Models\Country $country */
        $country = Country::query()->where('iso_alpha_2', '=', 'IN')->firstOrFail();
        /** @var \App\Models\Region $region */
        $region = Region::query()->where('code', '=', 'IN-MH')->firstOrFail();
        DB::table('cities')->insert([
            'id' => Str::uuid(),
            'country_id' => $country->id,
            'region_id' => $region->id,
            'code' => 'IN-MH-PUNE',
            'title' => 'Pune',
            'lat' => 18.5236826,
            'lng' => 73.8950713,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
