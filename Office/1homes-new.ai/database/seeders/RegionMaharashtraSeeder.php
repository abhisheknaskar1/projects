<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegionMaharashtraSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var \App\Models\Country $country */
        $country = Country::query()->where('iso_alpha_2', '=', 'IN')->firstOrFail();
        DB::table('regions')->insert([
            'id' => Str::uuid(),
            'country_id' => $country->id,
            'code' => 'IN-MH',
            'title' => 'Maharashtra',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
