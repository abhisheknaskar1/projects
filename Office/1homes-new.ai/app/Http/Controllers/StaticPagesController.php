<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyCategory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class StaticPagesController extends Controller
{
    use PropertySearchFiltersTrait;

    /**
     * @param Request $request
     * @return Response|ResponseFactory
     */
    // public function landing(Request $request): Response|ResponseFactory
    // {
    //     // Fetch filter options from a method (assuming it's defined in PropertySearchFiltersTrait)
    //     [$categories, $minPriceFilterOptions, $maxPriceFilterOptions, $unitTypes, $localities] = $this->getFilterOptions();
    
    //     // Fetch properties with specific codes
    //     $properties = Property::query()
    //         ->whereIn('code', [
    //             'shapoorji-vanaha',
    //             'rachana-bella-casa',
    //             'ornate',
    //             'kolte-patil-24-k-altura',
    //             'mahindra-happinest',
    //             'lodha-magnus',
    //             'kalpataru-jade-skyline',
    //             'kumar-abil-megapolis',
    //             'ravetkar-group-100-prabhat',
    //             'basant-bahar-icon-properties',
    //             'serenity-hills',
    //             'venkatesh-erandwane-central'
    //         ])
    //         ->with(['propertyCategory', 'sectors.units.propertyUnitType'])
    //         ->get();
    
    //     $all_configurations = [];
    
    //     // Iterate through properties and format configurations
    //     foreach ($properties as $property) {
    //         foreach ($property->sectors as $sector) {
    //             foreach ($sector->units as $unit) {
    //                 $all_configurations[] = [
    //                     'title' => $unit->propertyUnitType->title,
    //                     'property_code' => $property->title,
    //                 ];
    //             }
    //         }
    //     }
    
    //     // Prepare callback URL
    //     $call_back_url = route('landing', [
    //         'requested_call_back' => 'registered',
    //     ]);
    
    //     // Return data to Inertia view
    //     return inertia('StaticPages/Landing', [
    //         'apartmentLayouts' => $all_configurations,
    //         'property' => $properties,
    //         'categories' => $categories,
    //         'minPriceFilterOptions' => $minPriceFilterOptions,
    //         'maxPriceFilterOptions' => $maxPriceFilterOptions,
    //         'unitTypes' => $unitTypes,
    //         'localities' => $localities,
    //         'callBackUrl' => $call_back_url,
    //         'requested_call_back' => $request->query('requested_call_back', ''),
    //     ]);
    // }
    // public function browseByCategory(string $category): Response|ResponseFactory
    // {
    //     // Fetch category details
    //     $category = PropertyCategory::query()
    //         ->with(['slides' => function (HasMany $query) {
    //             $query->orderBy('view_order');
    //         }])
    //         ->where('code', '=', $category)
    //         ->firstOrFail();
    
    //     // Fetch properties under the category
    //     $properties = Property::query()
    //         ->with(['images' => function (HasMany $query) {
    //             $query->orderBy('view_order')->where('view_order', '=', 1);
    //         }])
    //         ->where('property_category_id', $category->id)
    //         ->get();
    
    //     // Return data to Inertia view
    //     return inertia('StaticPages/CategoryProperties', [
    //         'category' => $category,
    //         'properties' => $properties,
    //     ]);
    // }
        


    public function landing(Request $request): Response|ResponseFactory
    {
        [$categories, $minPriceFilterOptions, $maxPriceFilterOptions, $unitTypes, $localities] = $this->getFilterOptions();
        $properties = Property::query()->with([
            'images' => function (HasMany $query) {
                return $query->orderBy('view_order')->where('view_order', '=', 1);
            }
        ])
                ->whereIn('code', [
                'shapoorji-vanaha',
                'rachana-bella-casa',
                'ornate',
                'kolte-patil-24-k-altura',

                'mahindra-happinest',
                'lodha-magnus',
                'kalpataru-jade-skyline',
                'kumar-abil-megapolis',

                'ravetkar-group-100-prabhat',
                'basant-bahar-icon-properties',
                'serenity-hills',
                'venkatesh-erandwane-central'])
                // 'basant-bahar-icon-properties','kumar-abil-megapolis','rachana-bella-casa','ravetkar-group-100-prabhat',
                
                // 'venkatesh-erandwane-central','kolte-patil-24-k-altura','shapoorji-vanaha','serenity-hills',

                // 'kalpataru-jade-skyline','lodha-magnus','ornate','mahindra-happinest'           
            
            ->with(['propertyCategory'])
           
            ->get();
        $all_configurations = [];
        foreach ($properties as $property) {
            /** @var \Illuminate\Database\Eloquent\Collection<\App\Models\PropertySector> $sectors */
            $sectors = $property->sectors;
            $configuration = [];
            foreach ($sectors as $sector) {
                /** @var \Illuminate\Database\Eloquent\Collection<\App\Models\PropertySectorUnit> $units */
                $units = $sector->units;
                foreach ($units as $unit) {
                    $configuration[] = [
                        'title' => $unit->propertyUnitType->title,
                        'property_code' => $property->title,
                    ];
                }
            }
            $titles = array_column($configuration, 'title');
            $unique_titles = array_unique($titles);
            foreach ($configuration as &$item) {
                $item['title'] = array_shift($unique_titles);
            }
            $all_configurations[] = $configuration;
        }
        $call_back_url = route('landing',[
            'requested_call_back' => 'registered',
        ]);

        return inertia('StaticPages/Landing', [
            'apartmentLayouts' => $all_configurations,
            'property' => $properties,
            'categories' => $categories,
            'minPriceFilterOptions' => $minPriceFilterOptions,
            'maxPriceFilterOptions' => $maxPriceFilterOptions,
            'unitTypes' => $unitTypes,
            'localities' => $localities,
            'callBackUrl' => $call_back_url,
            'requested_call_back' => $request->query('requested_call_back', ''),
        ]);
    }

    /**
     * @param string $category
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function browseByCategory(string $category): Response|ResponseFactory
    {
        /** @var \App\Models\PropertyCategory $category */
        $category = PropertyCategory::query()->with([
            'slides' => function (HasMany $query) {
                return $query->orderBy('view_order');
            },
        ])->where('code', '=', $category)->firstOrFail();

        $properties = Property::query()->with([
            'images' => function (HasMany $query) {
                return $query->orderBy('view_order')->where('view_order', '=', 1);
            }
        ])->where([
            'property_category_id' => $category->id,
        ])->get()->all();

        return inertia('StaticPages/CategoryProperties', [
            'category' => $category,
            'properties' => $properties,
        ]);
    }


}
