<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Locality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PricingTrendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = base_path('database/seeders/resources/pricing_trends.csv');
        $csv = array_map('str_getcsv', file($csvFile));

        foreach ($csv as $row) {
            if (isset($row[0], $row[1], $row[2])) {
                $year = $row[0];
                $cost = $row[1];
                $localityTitle = $row[2];

                Log::info('Processing row: ' . implode(',', $row));

                $locality = Locality::query()->where('title', '=', $localityTitle)->first();

                if ($locality === null) {
                    Log::error('Locality not found: ' . $localityTitle);
                    continue;
                } else {
                    Log::info('Found locality: ' . $locality->id . ' for title: ' . $localityTitle);
                }

                $data = [
                    'id' => Str::uuid(),
                    'year' => $year,
                    'cost' => $cost,
                    'locality_id' => $locality->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];

                DB::table('pricing_trends')->insert($data);
            } else {
                Log::warning('Invalid row format: ' . implode(',', $row));
            }
        }
    }
}
