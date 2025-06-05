<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Locality;
use App\Models\PropertyCategory;
use App\Models\PropertySectorUnitVariation;
use App\Models\PropertyUnitType;
use App\Utility\IndianMoney;

// trait PropertySearchFiltersTrait
// {
//     protected function getFilterOptions(): array
//     {
//         /** @var \App\Models\PropertyCategory[] $categories */
//         $categories = PropertyCategory::query()->get([
//             'title',
//             'code',
//         ])->all();

//         $minPrice = 4000000; 
//         $maxPrice = 60000000; 

//         $minPriceFilterOptions = [];
//         $maxPriceFilterOptions = [];
//         $i = $minPrice;
//         while ($i < $maxPrice) {
//             $minPriceFilterOptions[] = [
//                 'id' => $i,
//                 'value' => IndianMoney::getInWords($i, true, false),
//             ];

//             // Adjust increments for min price options
//             $i += $i < 5000000 ? 500000 : ($i >= 5000000 && $i < 10000000 ? 1000000 : 5000000);
//         }
//         $price = $minPrice + 500000;
//         while ($price <= $maxPrice) {
//             $maxPriceFilterOptions[] = [
//                 'id' => $price,
//                 'value' => IndianMoney::getInWords($price, true, false),
//             ];

//             // Adjust increments for max price options
//             $price += $price < 5000000 ? 500000 : ($price >= 5000000 && $price < 10000000 ? 1000000 : 5000000);
//         }

//         $unitTypes = PropertyUnitType::query()->whereRaw('NOT filterable')->orderBy('title')->get();
//         $localities = Locality::query()->orderBy('title')->get();

//         return [
//             $categories,
//             $minPriceFilterOptions,
//             $maxPriceFilterOptions,
//             $unitTypes,
//             $localities
//         ];
//     }
// }

trait PropertySearchFiltersTrait
{
    protected function getFilterOptions(): array
    {
        /** @var \App\Models\PropertyCategory[] $categories */
        $categories = PropertyCategory::query()->get([
            'title',
            'code',
        ])->all();

        $minPrice = 2000000; 
        $maxPrice = 60000000; 

        $minPriceFilterOptions = [];
        $maxPriceFilterOptions = [];
        $i = $minPrice;
        while ($i < $maxPrice) {
            $minPriceFilterOptions[] = [
                'id' => $i,
                'value' => IndianMoney::getInWords($i, true, false),
            ];
            if ($i < 30000000) { 
                // (Before 3 crores)
                $i += $i < 5000000 ? 2000000 : ($i >= 5000000 && $i < 10000000 ? 2000000 : 5000000);
            } else { 
                // (After 3 crores)
                $i += 10000000; 
                // (Increment by 1 crore)
            }
        }

        $price = $minPrice + 2000000;
        while ($price <= $maxPrice) {
            $maxPriceFilterOptions[] = [
                'id' => $price,
                'value' => IndianMoney::getInWords($price, true, false),
            ];          
            if ($price < 30000000) { 
                // (Before 3 crores)
                $price += $price < 5000000 ? 2000000 : ($price >= 5000000 && $price < 10000000 ? 2000000 : 5000000);
            } else { 
                // (After 3 crores)
                $price += 10000000; 
                // (Increment by 1 crore)
            }
        }

        //------flat type codes I want to include----------
        $specificFlatTypecodes = ["1-bhk","2-bhk","25-bhk","3-bhk","35-bhk","4-bhk","45-bhk","55-bhk","villas"]; 

        $unitTypes = PropertyUnitType::query()
            ->whereRaw('NOT filterable')
            ->whereIn('code', $specificFlatTypecodes) 
            ->orderBy('title')
            ->get();

        $localities = Locality::query()->orderBy('title')->get();

        return [
            $categories,
            $minPriceFilterOptions,
            $maxPriceFilterOptions,
            $unitTypes,
            $localities
        ];
    }
}

