<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\PropertyCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyCategorySlideSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /** @var \App\Models\PropertyCategory $curatedApartment */
        $curatedApartment = PropertyCategory::query()->where('code', '=', 'curated-apartment')->first();

        /** @var \App\Models\PropertyCategory $exclusiveProperties */
        $exclusiveProperties = PropertyCategory::query()->where('code', '=', 'exclusive-properties')->first();

        DB::table('property_category_slides')->insert([
            'id' => Str::uuid(),
            'property_category_id' => $curatedApartment->id,
            'title' => 'Discover Your' . PHP_EOL . 'Dream Space',
            'description' => 'Find your perfect home in our curated selection',
            'cta_label' => 'View More',
            'cta_action' => '#',
            'image_uri' => 'property_category_slides/curated-apartment.jpg',
            'view_order' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('property_category_slides')->insert([
            'id' => Str::uuid(),
            'property_category_id' => $exclusiveProperties->id,
            'title' => 'Luxury Living Collection',
            'description' => 'Indulge in opulence with our exclusive properties',
            'cta_label' => 'View More',
            'cta_action' => '#',
            'image_uri' => 'property_category_slides/exclusive-properties-slider.jpg',
            'view_order' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('property_category_slides')->insert([
            'id' => Str::uuid(),
            'property_category_id' => $exclusiveProperties->id,
            'title' => 'Luxury Living Collection',
            'description' => 'Indulge in opulence with our exclusive properties',
            'cta_label' => 'View More',
            'cta_action' => '#',
            'image_uri' => 'property_category_slides/exclusive-properties-slider-1.jpg',
            'view_order' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('property_category_slides')->insert([
            'id' => Str::uuid(),
            'property_category_id' => $exclusiveProperties->id,
            'title' => 'Luxury Living Collection',
            'description' => 'Indulge in opulence with our exclusive properties',
            'cta_label' => 'View More',
            'cta_action' => '#',
            'image_uri' => 'property_category_slides/exclusive-properties-slider-2.jpg',
            'view_order' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
