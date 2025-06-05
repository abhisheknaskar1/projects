<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Locality;
use App\Models\PricingTrend;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyDeveloper;
use App\Models\PropertyLocality;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class PropertiesController extends Controller
{
    use PropertySearchFiltersTrait;

    /**
     * @param string|null $category
     * @param float|null $minPrice
     * @param float|null $maxPrice
     * @param float|null $minArea
     * @param float|null $maxArea
     * @param string|null $unitType
     * @param string|null $locality
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getPropertyItems(
        ?string $category = null,
        ?float $minPrice = null,
        ?float $maxPrice = null,
        ?float $minArea = null,
        ?float $maxArea = null,
        ?string $unitType = null,
        ?string $locality = null
    ): Builder
    {
        $query = Property::query()->with([
            'images' => function (HasMany $query) {
                return $query->orderBy('view_order')->where('view_order', '=', 1);
            },
            'propertyCategory',
        ]);
        if ($category) {
            $query->whereHas('propertyCategory', function (Builder $query) use ($category) {
                return $query->where('code', '=', $category);
            });
        }
        if ($locality) {
            $query->whereHas('locality', function (Builder $query) use ($locality) {
                return $query->where('code', '=', $locality);
            });
        }
        $query->whereHas('sectors', function (Builder $query) use ($minPrice, $maxPrice, $minArea, $maxArea, $unitType, $locality) {
            return $query->whereHas('units', function (Builder $query) use ($minPrice, $maxPrice, $minArea, $maxArea, $unitType, $locality) {
                $query = $query->whereHas('variations', function (Builder $query) use ($minPrice, $maxPrice, $minArea, $maxArea, $locality) {
                    if ($minPrice) {
                        $query->whereRaw('COALESCE(price, min_price) >= ?', [
                            $minPrice,
                        ]);
                    }
                    if ($maxPrice) {
                        $query->whereRaw('COALESCE(price, min_price) <= ?', [
                            $maxPrice,
                        ]);
                    }
                    if ($minArea) {
                        $query->whereRaw('COALESCE(area, min_area) >= ?', [
                            $minArea,
                        ]);
                    }
                    if ($maxArea) {
                        $query->whereRaw('COALESCE(area, min_area) <= ?', [
                            $maxArea,
                        ]);
                    }

                    return $query;
                });
                if ($unitType) {
                    $query->whereHas('propertyUnitType', function (Builder $query) use ($unitType) {
                        return $query->where('code', '=', $unitType);
                    });
                }

                return $query;
            });
        });

        return $query;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProperties(Request $request): JsonResponse
    {
        $phrase = $request->query('prompt');
        $search = [
            'price' => null,
            'area' => null,
            'unit_type' => null,
            'locality' => null
        ];
        $prompt = '';
        if ($phrase) {
            $client = new Client();
            $prompt .= 'Return a json with following structure `{ category_code: string, carpet_area: float, price: float, flat_type: string, property_code: string, locality_codes: string[]}` Fill in the parameters extracted from the phrase:';
            $prompt .= '`' . $phrase . '`' . PHP_EOL;
            $prompt .= 'The `flat_type` should be from the following set only: `1-bhk`, `2-bhk`, `3-bhk`, `35-bhk-duplex`, `4-bhk`.' . PHP_EOL;
            $prompt .= 'The category_code must be from the following set only: `'. implode('`, `', PropertyCategory::query()->get(['code'])->all()) .'`.' . PHP_EOL;
            $prompt .= 'The `property_code` should be strictly the `code` values from the following JSON where the `title` fuzzy matches, and it should be an array containing codes as strings: `'. implode('`, `', Property::query()->get(['code', 'title'])->all()) .'`.' . PHP_EOL;
            $prompt .= 'The `locality_codes` should be strictly the `code` values from the following JSON where the `title` fuzzy matches, and it should be an array containing codes as strings: `'. implode('`, `', Locality::query()->get(['code', 'title'])->all()) .'`.' . PHP_EOL;
            $prompt .= 'Only provide `category_code`, `carpet_area`, `price`, `flat_type`, `property_code`, and `locality_codes` based on the user input. If these parameters are not specified in the input, provide null values for those parameters.';
            $response = $client->post('https://api.openai.com/v1/chat/completions', [
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'response_format' => [
                        'type' => 'json_object',
                    ],
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => $prompt,
                        ]
                    ],
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . env('OPEN_AI_API_SECRET'),
                ],
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            $search = json_decode($result['choices'][0]['message']['content'] ?? '{}', true);
        }

        $category = $search['category_code'] ?? $request->query('category');
        $minPrice = (float)($search['min_price'] ?? $request->query('min_price'));
        $maxPrice = (float)($search['max_price'] ?? $search['price'] ?? $request->query('max_price'));
        $minArea = (float)($search['min_area'] ?? $search['carpet_area'] ?? $request->query('min_area'));
        $maxArea = (float)($search['max_area'] ?? $request->query('max_area'));
        $unitType = $search['flat_type'] ?? $request->query('unit_type');
        $locality = $search['locality_codes'] ?? $request->query('locality');
        $propertyCode = $search['property_code'] ?? null;
        $localities = $search['locality_codes'] ?? [];
        $query = $this->getPropertyItems($category, $minPrice, $maxPrice, $minArea, $maxArea, $unitType, $locality);
        $query->select([
            'id',
            'property_category_id',
            'code',
            'title',
            'price_bracket',
            'possession',
            'banner_content',
            'summary',
            'address_line_1',
            'address_line_2',
            'locality_id',
            'postcode',
        ])->selectRaw(
            'earth_distance(
                ll_to_earth(lat, lng),
                ll_to_earth(?, ?)
            )::integer/1000 AS city_center_distance', [
            '18.5236826',
            '73.8950713',
        ])->orderBy('created_at')->orderByRaw(
            'earth_distance(
                ll_to_earth(lat, lng),
                ll_to_earth(?, ?)
            )::integer/1000 ASC', [
            '18.5236826',
            '73.8950713',
        ])->with([
            'sectors' => function (HasMany $query) {
                return $query->with([
                    'units' => function (HasMany $query) {
                        return $query->with('propertyUnitType');
                    },
                ]);
            },
            'locality' => function (BelongsTo $query) {
                return $query->with([
                    'city',
                ]);
            },
        ]);
        if ($propertyCode) {
            $query->where('code', '=', $propertyCode);
        }
//        if ($localities) {
//            $query->whereHas('locality', function (Builder $query) use ($localities) {
//                return $query->whereIn('code', $localities);
//            });
//        }

        $properties = $query->get()->all();
        foreach ($properties as $property) {
            $units = [];
            /** @var \Illuminate\Database\Eloquent\Collection<\App\Models\PropertySector> $sectors */
            $sectors = $property->sectors;
            foreach ($sectors as $sector) {
                /** @var \Illuminate\Database\Eloquent\Collection<\App\Models\PropertySectorUnit> $unitTypes */
                $unitTypes = $sector->units;
                foreach ($unitTypes as $unit) {
                    $units[$unit->propertyUnitType->code] = $unit->propertyUnitType->title;
                }
            }
            $property->units = implode(', ', $units);
        }

        $items = [];
        $group = 0;
        foreach ($properties as $i => $property) {
            $items[$group][] = $property;
            if ($i < 2) {
                if ($i === 1) {
                    $group++;
                }
            } else {
                if (($i - 1) % 3 === 0) {
                    $group++;
                }
            }
        }

        return response()->json($items)->withHeaders([
            'ai_price' => $search['price'] ?? null,
            'ai_area' => $search['carpet_area'] ?? null,
            'ai_unit_type' => $search['flat_type'] ?? null,
            'ai_category' => $search['category_code'] ?? null,
            'ai_property_code' => $propertyCode,
            'ai_locality_codes' => $localities,
            'category' => $category,
            'min_area' => $minArea ?? $search['area'] ?? null,
            'max_area' => $maxArea,
            'min_price' => $minPrice,
            'max_price' => $maxPrice ?? $search['price'] ?? null,
            'unit_type' => $unitType,
            'locality' => $locality,
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response|\Inertia\ResponseFactory
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index(Request $request): Response|ResponseFactory
    {
        [$categories, $minPriceFilterOptions, $maxPriceFilterOptions, $unitTypes, $localities] = $this->getFilterOptions();

        $phrase = $request->query('prompt');
        // $client = new Client();
        // $response = $client->post('https://api.openai.com/v1/chat/completions', [
        //     'json' => [
        //         'model' => 'gpt-3.5-turbo',
        //         'messages' => [
        //             [
        //                 'role' => 'system',
        //                 'content' => 'Share an interesting fact about "Pune City" in 200 words that few people know it should be fun and it should be copyright free, should not be scary, should include no hate speech, no political views whatsoever etc',
        //             ]
        //         ],
        //     ],
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . env('OPEN_AI_API_SECRET'),
        //     ],
        // ]);
        // $result = json_decode($response->getBody()->getContents(), true);
        // $heroText = $result['choices'][0]['message']['content'] ?? null;

        $call_back_url = route('property_listing',[
            'requested_call_back' => 'registered',
        ]);

        return inertia('Properties/Index', [
            'prompt' => $phrase,
            'heroText' => '$heroText',
            'categories' => $categories,
            'minPriceFilterOptions' => $minPriceFilterOptions,
            'maxPriceFilterOptions' => $maxPriceFilterOptions,
            'unitTypes' => $unitTypes,
            'localities' => $localities,
            'query_category' => $request->query('category', ''),
            'query_min_price' => $request->query('min_price', ''),
            'query_max_price' => $request->query('max_price', ''),
            'query_unit_type' => $request->query('unit_type', ''),
            'query_locality' => $request->query('locality', ''),
            'callBackUrl' => $call_back_url,
            'requested_call_back' => $request->query('requested_call_back', ''),
        ]);
    }

    protected function getProperty(string $code): Property
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->with([
            'locality' => function (BelongsTo $query) {
                return $query->with(['city']);
            },
            'propertyCategory',
            'images' => function (HasMany $query) {
                return $query->orderBy('view_order');
            },
            'galleries' => function (HasMany $query) {
                return $query->orderBy('view_order');
            },
            'highlights' => function (HasMany $query) {
                return $query->with([
                    'items' => function (HasMany $query) {
                        return $query->orderBy('view_order');
                    },
                ])->orderBy('view_order');
            },
            'featuredHighlights' => function (HasMany $query) {
                return $query->with([
                    'items' => function (HasMany $query) {
                        return $query->orderBy('view_order');
                    },
                ])->orderBy('view_order');
            },
            'amenities' => function (BelongsToMany $query) {
                return $query->orderByPivot('view_order');
            },
            'featuredAmenities' => function (HasMany $query) {
                return $query->orderBy('view_order')->with([
                    'items' => function (BelongsToMany $query) {
                        return $query->orderByPivot('view_order');
                    }
                ]);
            },
            'specifications' =>  function (HasMany $query) {
                return $query->with([
                    'category',
                    'items' => function (HasMany $query) {
                        return $query->orderBy('view_order');
                    },
                ])->orderBy('view_order');
            },
            'sectors' =>  function (HasMany $query) {
                return $query->with([
                    'units' => function (HasMany $query) {
                        return $query->with([
                            'propertyUnitType',
                            'variations' => function (HasMany $query) {
                                return $query->orderBy('view_order');
                            },
                        ])->orderBy('view_order');
                    },
                ])->orderBy('view_order');
            },
        ])->firstOrFail();
        $property->grouped_specifications = $property->specifications->chunk(2);
        $property->requested_call_back_url = route($property->propertyCategory->code === 'curated-apartment' ? 'curated_apartment_view' : 'exclusive_properties_view', [
            'code' => $property->code,
            'requested_call_back' => 'registered',
        ]);
        /** @var \Illuminate\Database\Eloquent\Collection<\App\Models\PropertySector> $sectors */
        $sectors = $property->sectors;
        $projectSize = [];
        $configuration = [];
        foreach ($sectors as $sector) {
            /** @var \Illuminate\Database\Eloquent\Collection<\App\Models\PropertySectorUnit> $units */
            $units = $sector->units;
            $unitSize = [];
            foreach ($units as $unit) {
                if ($unit->number_of_flats) {
                    $unitSize[] = implode(': ', array_filter([
                        $unit->propertyUnitType->title,
                        $unit->number_of_flats ? $unit->number_of_flats . ' No. of Flats' : null,
                    ]));
                }
                /** @var \Illuminate\Database\Eloquent\Collection<\App\Models\PropertySectorUnitVariation> $variations */
                $variations = $unit->variations;
                foreach ($variations as $variation) {
                    if (isset($configuration[$unit->propertyUnitType->code])) {
                        $minArea = $configuration[$unit->propertyUnitType->code]['min_area'];
                        $maxArea = $configuration[$unit->propertyUnitType->code]['max_area'];
                        $newMinArea = $variation->min_area ?? $variation->area;
                        $newMaxArea = $variation->max_area ?? $variation->area;
                        $configuration[$unit->propertyUnitType->code]['min_area'] = $minArea > $newMinArea ? $newMinArea : $minArea;
                        $configuration[$unit->propertyUnitType->code]['max_area'] = $maxArea < $newMaxArea ? $newMaxArea : $maxArea;
                    } else {
                        $configuration[$unit->propertyUnitType->code] = [
                            'title' => $unit->propertyUnitType->title,
                            'min_area' => $variation->min_area ?? $variation->area,
                            'max_area' => $variation->max_area ?? $variation->area,
                        ];
                    }
                }
            }
            if ($unitSize) {
                $projectSize[] = implode(', ', array_filter([
                    $sector->title,
                    implode(', ', $unitSize)
                ]));
            } else {
                $projectSize[] = implode(', ', array_filter([
                    count($sectors) > 1 ? $sector->title : null,
                    $sector->towers ? $sector->towers . ' Towers' : null,
                    $sector->floors ? $sector->floors . ' Floors' : null,
                    $sector->number_of_units ? $sector->number_of_units . ' No. of Flats' : null,
                ]));
            }
        }
        $property->projectSize = $projectSize;
        $unitTypes = [];
        foreach ($configuration as $config) {
            $unitTypes[] = $config['title'] . ' Flat' . (
                $config['min_area'] === $config['max_area'] ? ' ' . $config['min_area'] . ' Sq.Ft. (Carpet)' :
                    ' from ' . $config['min_area'] . ' - ' . $config['max_area'] . ' Sq.Ft. (Carpet)'
                );
        }
        $property->unitTypes = $unitTypes;
        $property->config = $configuration;

        return $property;
    }

    /**
     * @param string $code
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function curatedApartment(string $code, Request $request): Response|ResponseFactory
    {
        $property = $this->getProperty($code);
        $minPrice = (float)$request->query('min_price');
        $maxPrice = (float)$request->query('max_price');
        $minArea = (float)$request->query('min_area');
        $maxArea = (float)$request->query('max_area');
        $unitType = $request->query('unit_type');
        $locality = $request->query('locality');
        $query = $this->getPropertyItems($property->propertyCategory->code, $minPrice, $maxPrice, $minArea, $maxArea, $unitType, $locality);
        $query->select([
            'id',
            'property_category_id',
            'code',
            'title',
            'price_bracket',
            'possession',
            'banner_content',
            'summary',
            'address_line_1',
            'address_line_2',
            'locality_id',
            'postcode',
        ])->selectRaw(
            'earth_distance(
                ll_to_earth(lat, lng),
                ll_to_earth(?, ?)
            )::integer/1000 AS city_center_distance', [
            $property->lat,
            $property->lng,
        ])->orderByRaw(
            'earth_distance(
                ll_to_earth(lat, lng),
                ll_to_earth(?, ?)
            )::integer/1000 ASC', [
            $property->lat,
            $property->lng,
        ])->with([
            'sectors' => function (HasMany $query) {
                return $query->with([
                    'units' => function (HasMany $query) {
                        return $query->with('propertyUnitType');
                    },
                ]);
            },
        ])->where('id', '!=', $property->id);
        $similarProperties = $query->limit(5)->get()->all();
        foreach ($similarProperties as $similarProperty) {
            $units = [];
            /** @var \Illuminate\Database\Eloquent\Collection<\App\Models\PropertySector> $sectors */
            $sectors = $similarProperty->sectors;
            foreach ($sectors as $sector) {
                /** @var \Illuminate\Database\Eloquent\Collection<\App\Models\PropertySectorUnit> $unitTypes */
                $unitTypes = $sector->units;
                foreach ($unitTypes as $unit) {
                    $units[$unit->propertyUnitType->code] = $unit->propertyUnitType->title;
                }
            }
            $similarProperty->units = implode(', ', $units);
        }
        $pricingTrends = PricingTrend::query()->where('locality_id', '=', $property->locality_id)->get();
        $propertyLocality = PropertyLocality::query()->where('id', '=', $property->property_locality_id)->get();
        $propertyDeveloper = PropertyDeveloper::query()->where('id', '=', $property->property_developer_id)->get();

        return inertia('Properties/CuratedProperty', [
            'property' => $property,
            'pricing_trends' => $pricingTrends,
            'similarProperties' => $similarProperties,
            'query_min_area' => $minArea,
            'query_max_area' => $maxArea,
            'query_min_price' => $minPrice,
            'query_max_price' => $maxPrice,
            'query_unit_type' => $unitType,
            'query_locality' => $locality,
            'requested_call_back' => $request->query('requested_call_back', ''),
            'property_locality' => $propertyLocality,
            'propertyDeveloper' => $propertyDeveloper,
        ]);
    }

    /**
     * @param string $code
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function exclusiveProperties(string $code, Request $request): Response|ResponseFactory
    {
        $property = $this->getProperty($code);
        $titles = [];
        $areas = [];
        foreach ($property->config as $config) {
            $titles[] = $config['title'];
            $areas[] = $config['min_area'] === $config['max_area'] ? $config['min_area'] : $config['min_area'] . ' - ' . $config['max_area'];
        }
        $property->titles = $titles;
        $property->areas = $areas;

        $pricingTrends = PricingTrend::query()->where('locality_id', '=', $property->locality_id)->get();
        $propertyLocality = PropertyLocality::query()->where('id', '=', $property->property_locality_id)->get();
        $propertyDeveloper = PropertyDeveloper::query()->where('id', '=', $property->property_developer_id)->get();

        return inertia('Properties/ExclusiveProperties', [
            'property' => $property,
            'pricing_trends' => $pricingTrends,
            'similarProperties' => [],
            'query_category' => $request->query('category', ''),
            'query_min_price' => '',
            'query_max_price' => '',
            'query_unit_type' => $request->query('unit_type', ''),
            'query_locality' => $request->query('locality', ''),
            'requested_call_back' => $request->query('requested_call_back', ''),
            'property_locality' => $propertyLocality,
            'propertyDeveloper' => $propertyDeveloper,
        ]);
    }

    /**
     * @param string $code
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function sectorialProperty(string $code, Request $request): Response|ResponseFactory
    {
        $property = $this->getProperty($code);
        $titles = [];
        $areas = [];
        foreach ($property->config as $config) {
            $titles[] = $config['title'];
            $areas[] = $config['min_area'] === $config['max_area'] ? $config['min_area'] : $config['min_area'] . ' - ' . $config['max_area'];
        }
        $property->titles = $titles;
        $property->areas = $areas;

        $pricingTrends = PricingTrend::query()->where('locality_id', '=', $property->locality_id)->get();
        $propertyLocality = PropertyLocality::query()->where('id', '=', $property->property_locality_id)->get();
        $propertyDeveloper = PropertyDeveloper::query()->where('id', '=', $property->property_developer_id)->get();

        return inertia('Properties/SectorialProperty', [
            'property' => $property,
            'pricing_trends' => $pricingTrends,
            'similarProperties' => [],
            'query_category' => $request->query('category', ''),
            'query_min_price' => '',
            'query_max_price' => '',
            'query_unit_type' => $request->query('unit_type', ''),
            'query_locality' => $request->query('locality', ''),
            'requested_call_back' => $request->query('requested_call_back', ''),
            'property_locality' => $propertyLocality,
            'propertyDeveloper' => $propertyDeveloper,
        ]);
    }


    /**
     * @param string $code
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function plotsAndVillas(string $code, Request $request): Response|ResponseFactory
    {
        $property = $this->getProperty($code);
        $titles = [];
        $areas = [];
        foreach ($property->config as $config) {
            $titles[] = $config['title'];
            $areas[] = $config['min_area'] === $config['max_area'] ? $config['min_area'] : $config['min_area'] . ' - ' . $config['max_area'];
        }
        $property->titles = $titles;
        $property->areas = $areas;

        $pricingTrends = PricingTrend::query()->where('locality_id', '=', $property->locality_id)->get();
        $propertyLocality = PropertyLocality::query()->where('id', '=', $property->property_locality_id)->get();
        $propertyDeveloper = PropertyDeveloper::query()->where('id', '=', $property->property_developer_id)->get();

        return inertia('Properties/PlotsAndVillas', [
            'property' => $property,
            'pricing_trends' => $pricingTrends,
            'similarProperties' => [],
            'query_category' => $request->query('category', ''),
            'query_min_price' => '',
            'query_max_price' => '',
            'query_unit_type' => $request->query('unit_type', ''),
            'query_locality' => $request->query('locality', ''),
            'requested_call_back' => $request->query('requested_call_back', ''),
            'property_locality' => $propertyLocality,
            'propertyDeveloper' => $propertyDeveloper,
        ]);
    }
}
