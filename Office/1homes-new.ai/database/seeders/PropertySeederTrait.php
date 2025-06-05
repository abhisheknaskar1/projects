<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\AmenityProperty;
use App\Models\City;
use App\Models\Locality;
use App\Models\PropertyCategory;
use App\Models\PropertyDeveloper;
use App\Models\PropertyLocality;
use App\Models\PropertySpecification;
use App\Models\PropertyUnitType;
use App\Models\ResidentType;
use App\Models\SpecificationCategory;
use Directory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait PropertySeederTrait
{
    /**
     * @param string $propertyIdentifier
     * @param \Directory $directory
     * @return void
     */
    protected function savePropertyImagesFromDirectory(string $propertyIdentifier, Directory $directory): void
    {
        while (($file = $directory->read()) !== false) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }
            $imageIdentifier = Str::uuid();
            $image = 'property' . DIRECTORY_SEPARATOR . $propertyIdentifier . DIRECTORY_SEPARATOR .
                'images' . DIRECTORY_SEPARATOR . $imageIdentifier . DIRECTORY_SEPARATOR . microtime(true) . '-' . $file;
           $stored = Storage::disk('local')->put($image, file_get_contents($directory->path . DIRECTORY_SEPARATOR . $file));
            if ($stored) {
                $fileParts = explode('.', $file);
                DB::table('property_images')->insert([
                    'id' => $imageIdentifier,
                    'property_id' => $propertyIdentifier,
                    'image_uri' => $image,
                    'view_order' => $fileParts[0],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }

    protected function savePropertyGalleriesFromDirectory(string $propertyIdentifier, Directory $directory): void
    {
        while (($file = $directory->read()) !== false) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }
            $imageIdentifier = Str::uuid();
            $image = 'property' . DIRECTORY_SEPARATOR . $propertyIdentifier . DIRECTORY_SEPARATOR .
                'galleries' . DIRECTORY_SEPARATOR . $imageIdentifier . DIRECTORY_SEPARATOR . microtime(true) . '-' . $file;
            $stored = Storage::disk('local')->put($image, file_get_contents($directory->path . DIRECTORY_SEPARATOR . $file));
            if ($stored) {
                $fileParts = explode('.', $file);
                DB::table('property_galleries')->insert([
                    'id' => $imageIdentifier,
                    'property_id' => $propertyIdentifier,
                    'gallery_uri' => $image,
                    'view_order' => $fileParts[0],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }

    /**
     * @param string $propertyIdentifier
     * @param array $highlights
     * @return void
     */
    protected function savePropertyHighlights(string $propertyIdentifier, array $highlights): void
    {
        foreach ($highlights as $i => $highlight) {
            $highlightIdentifier = Str::uuid();
            DB::table('property_highlights')->insert([
                'id' => $highlightIdentifier,
                'property_id' => $propertyIdentifier,
                'title' => $highlight['title'],
                'view_order' => $i + 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            foreach (($highlight['items'] ?? []) as $j => $item) {
                DB::table('property_highlight_items')->insert([
                    'id' => Str::uuid(),
                    'property_highlight_id' => $highlightIdentifier,
                    'title' => $item,
                    'view_order' => $j + 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }

    /**
     * @param string $propertyIdentifier
     * @param array $highlights
     * @return void
     */
    protected function savePropertyFeaturedHighlights(string $propertyIdentifier, array $highlights): void
    {
        foreach ($highlights as $i => $highlight) {
            $featuredHighlightIdentifier = Str::uuid();
            DB::table('property_featured_highlights')->insert([
                'id' => $featuredHighlightIdentifier,
                'property_id' => $propertyIdentifier,
                'title' => $highlight['title'],
                'view_order' => $i + 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            foreach (($highlight['items'] ?? []) as $j => $item) {
                DB::table('property_featured_highlight_items')->insert([
                    'id' => Str::uuid(),
                    'property_featured_highlight_id' => $featuredHighlightIdentifier,
                    'title' => $item['title'],
                    'icon_uri' => $item['icon'],
                    'view_order' => $j + 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }

    /**
     * @param array $amenityArray
     * @return \App\Models\Amenity
     */
    protected function getAmenity(array $amenityArray = []): Amenity
    {
        $code = Str::slug(mb_strtolower(trim($amenityArray['title'])));
        /** @var \App\Models\Amenity|null $amenity */
        $amenity = Amenity::query()->where('code', '=', $code)->first();
        if ($amenity) {
            return $amenity;
        }
        $id = Str::uuid();
        DB::table('amenities')->insert([
            'id' => $id,
            'code' => $code,
            'title' => $amenityArray['title'],
            'icon_uri' => $amenityArray['icon'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return Amenity::find($id);
    }

    /**
     * @param string $path
     * @param string $propertyIdentifier
     * @return void
     */
    protected function savePropertyAmenities(string $path, string $propertyIdentifier): void
    {
        $json = $path . 'amenities.json';
        if (($jsonString = file_get_contents($json)) !== false) {
            $response = json_decode($jsonString, true);
            $amenities = $response['amenities'] ?? [];
            foreach ($amenities as $i => $amenityArray) {
                $amenity = $this->getAmenity($amenityArray);
                $linkExists = AmenityProperty::query()->where('amenity_id', '=', $amenity->id)
                    ->where('property_id', '=', $propertyIdentifier)->exists();
                if ($linkExists === false) {
                    DB::table('amenity_property')->insert([
                        'id' => Str::uuid(),
                        'amenity_id' => $amenity->id,
                        'property_id' => $propertyIdentifier,
                        'view_order' => $i + 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }

    /**
     * @param string $path
     * @param string $propertyIdentifier
     * @return void
     */
    protected function savePropertyFeaturedAmenities(string $path, string $propertyIdentifier): void
    {
        $json = $path . 'amenities.json';
        if (($jsonString = file_get_contents($json)) !== false) {
            $response = json_decode($jsonString, true);
            $featuredAmenities = $response['featured_amenities'] ?? [];
            foreach ($featuredAmenities as $i => $amenityArray) {
                $featuredAmenityIdentifier = Str::uuid();
                DB::table('property_featured_amenities')->insert([
                    'id' => $featuredAmenityIdentifier,
                    'property_id' => $propertyIdentifier,
                    'title' => $amenityArray['title'],
                    'view_order' => $i + 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                foreach ($amenityArray["items"] ?? [] as $amenityItem) {
                    $amenity = $this->getAmenity($amenityItem);
                    $linkExists = AmenityProperty::query()->where('amenity_id', '=', $amenity->id)
                        ->where('property_id', '=', $propertyIdentifier)->exists();
                    if ($linkExists === false) {
                        DB::table('property_featured_amenity_items')->insert([
                            'id' => Str::uuid(),
                            'amenity_id' => $amenity->id,
                            'property_featured_amenity_id' => $featuredAmenityIdentifier,
                            'view_order' => $i + 1,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }
                }
            }
        }
    }

    /**
     * @param array $category
     * @return \App\Models\SpecificationCategory
     */
    protected function getSpecificationCategory(array $category = []): SpecificationCategory
    {
        $code = Str::slug(mb_strtolower(trim($category['title'])));
        /** @var \App\Models\SpecificationCategory|null $specificationCategory */
        $specificationCategory = SpecificationCategory::query()->where('code', '=', $code)->first();
        if ($specificationCategory) {
            return $specificationCategory;
        }
        $id = Str::uuid();
        DB::table('specification_categories')->insert([
            'id' => $id,
            'code' => $code,
            'title' => $category['title'],
            'icon_uri' => $category['icon'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return SpecificationCategory::find($id);
    }

    /**
     * @param string $path
     * @param string $propertyIdentifier
     * @return void
     */
    protected function savePropertySpecifications(string $path, string $propertyIdentifier): void
    {
        $json = $path . 'specifications.json';
        if (file_exists($path . 'specifications.json') && ($jsonString = file_get_contents($json)) !== false) {
            $specifications = json_decode($jsonString, true);
            foreach ($specifications as $i => $specification) {
                $category = $this->getSpecificationCategory($specification);
                /** @var \App\Models\PropertySpecification|null $propertySpecification */
                $propertySpecification = PropertySpecification::query()->where('specification_category_id', '=', $category->id)
                    ->where('property_id', '=', $propertyIdentifier)->get()->first();
                $propertySpecificationIdentifier = $propertySpecification->id ?? null;
                if (!$propertySpecification) {
                    $propertySpecificationIdentifier = Str::uuid();
                    DB::table('property_specifications')->insert([
                        'id' => $propertySpecificationIdentifier,
                        'specification_category_id' => $category->id,
                        'property_id' => $propertyIdentifier,
                        'view_order' => $i + 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
                foreach ($specification['items'] as $j => $item) {
                    DB::table('property_specification_items')->insert([
                        'id' => Str::uuid(),
                        'property_specification_id' => $propertySpecificationIdentifier,
                        'title' => trim($item),
                        'view_order' => $j + 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }

    /**
     * @param array $unitType
     * @return \App\Models\PropertyUnitType
     */
    protected function getPropertyUnitType(array $unitType = []): PropertyUnitType
    {
        $code = Str::slug(mb_strtolower(trim($unitType['title'])));
        /** @var \App\Models\PropertyUnitType|null $propertyUnitType */
        $propertyUnitType = PropertyUnitType::query()->where('code', '=', $code)->first();
        if ($propertyUnitType) {
            return $propertyUnitType;
        }
        $id = Str::uuid();
        DB::table('property_unit_types')->insert([
            'id' => $id,
            'code' => $code,
            'title' => $unitType['title'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return PropertyUnitType::find($id);
    }

    /**
     * @param string $path
     * @param string $propertyIdentifier
     * @return void
     */
    protected function savePropertySectors(string $path, string $propertyIdentifier): void
    {
        $json = $path . 'configuration.json';
        if (($jsonString = file_get_contents($json)) !== false) {
            $configuration = json_decode($jsonString, true);
            $sectors = $configuration['items'] ?? [];
            foreach ($sectors as $i => $sector) {
                $sectorIdentifier = Str::uuid();
                $code = Str::slug(mb_strtolower(trim($sector['title'])));
                DB::table('property_sectors')->insert([
                    'id' => $sectorIdentifier,
                    'property_id' => $propertyIdentifier,
                    'code' => $code,
                    'title' => trim($sector['title']),
                    'number_of_units' => intval($sector['number_of_units']),
                    'towers' => trim((string)$sector['towers']),
                    'floors' => trim((string)$sector['floors']),
                    'view_order' => $i + 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $units = $sector['units'] ?? [];
                foreach ($units as $j => $unit) {
                    $unitIdentifier = Str::uuid();
                    $propertyUnitType = $this->getPropertyUnitType($unit);
                    DB::table('property_sector_units')->insert([
                        'id' => $unitIdentifier,
                        'property_sector_id' => $sectorIdentifier,
                        'property_unit_id' => $propertyUnitType->id,
                        'number_of_flats' => $unit['number_of_flats'] ?? null,
                        'view_order' => $j + 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                    $variations = $unit['variations'] ?? [];
                    foreach ($variations as $k => $variation) {
                        $layoutUri = null;
                        $variationIdentifier = Str::uuid();
                        if (!empty($variation['layout']) && file_exists($path . DIRECTORY_SEPARATOR . $variation['layout'])) {
                            $fileParts = explode('/', $variation['layout']);
                            $layoutUri = 'property' . DIRECTORY_SEPARATOR .
                                $propertyIdentifier . DIRECTORY_SEPARATOR .
                                'layouts' . DIRECTORY_SEPARATOR .
                                'units' . DIRECTORY_SEPARATOR .
                                $unitIdentifier . DIRECTORY_SEPARATOR .
                                'variations' . DIRECTORY_SEPARATOR .
                                $variationIdentifier . DIRECTORY_SEPARATOR .
                                end($fileParts);
                            Storage::disk('local')->put($layoutUri, file_get_contents($path . DIRECTORY_SEPARATOR . $variation['layout']));
                        }

                        DB::table('property_sector_unit_variations')->insert([
                            'id' => $variationIdentifier,
                            'property_sector_unit_id' => $unitIdentifier,
                            'description' => trim((string)$variation['description']),
                            'area' => ((float)$variation['area']) ?: null,
                            'min_area' => ((float)$variation['min_area']) ?: null,
                            'max_area' => ((float)$variation['max_area']) ?: null,
                            'area_type' => (string)($variation['area_type']),
                            'price' => ((float)$variation['price']) ?: null,
                            'min_price' => ((float)$variation['min_price']) ?: null,
                            'max_price' => ((float)$variation['max_price']) ?: null,
                            'layout_uri' => $layoutUri,
                            'view_order' => $k + 1,
                            'no_of_bed' => (float)($variation['no_of_bed'] ?? 0) ?: null,
                            'no_of_bath' => (float)($variation['no_of_bath'] ?? 0) ?: null,
                            'no_of_kitchen' => (float)($variation['no_of_kitchen'] ?? 0) ?: null,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }
                }
            }
        }
    }

    /**
     * @param string $propertyIdentifier
     * @param string $path
     * @param string $param
     * @return string|null
     */
    protected function saveBackgroundImage(string $propertyIdentifier, string $path, string $param): ?string
    {
        $imagesJson = $path . 'page_segment_background_images.json';
        if (file_exists($imagesJson)) {
            $images = json_decode(file_get_contents($imagesJson), true);
            $img = $images[$param] ?? null;
            $target = null;
            if ($img && File::exists($path . $img)) {
                $extension = File::extension($path . $img);
                $target = 'property' . DIRECTORY_SEPARATOR . $propertyIdentifier . DIRECTORY_SEPARATOR .
                    'ps_bg_images' . DIRECTORY_SEPARATOR .
                    $param . '.' . $extension;

                $stored = Storage::disk('local')->put($target, file_get_contents($path . $img));
                if ($stored === false) {
                    $target = null;
                }
            }

            return $target;
        }

        return null;
    }

    /**
     * @param string $path
     * @return void
     */
    public function savePropertyFromPath(string $path): void
    {
        $main = $path . 'main.json';
        if (($json = file_get_contents($main)) !== false) {
            $propertyIdentifier = Str::uuid();
            $property = json_decode($json, true);

            /** @var \App\Models\PropertyCategory $category */
            $category = PropertyCategory::query()->where('code', '=', $property['property_category'])->firstOrFail();

            /** @var \App\Models\PropertyLocality $propertyLocality */
            $propertyLocality = PropertyLocality::query()->where('title', '=', $property['property_locality_title'])->firstOrFail();

            /** @var ResidentType $residentType */
            $residentType = ResidentType::query()->where('title', '=', $property['resident_type'])->firstOrFail();

            $brochure = null;
            if (file_exists($path . 'brochure.pdf')) {
                $brochure = 'property' . DIRECTORY_SEPARATOR . $propertyIdentifier . DIRECTORY_SEPARATOR .
                            'brochure_uri' . DIRECTORY_SEPARATOR .
                            $property['code'] . '.' . microtime(true) . '.pdf';
                $stored = Storage::disk('local')->put($brochure, file_get_contents($path . 'brochure.pdf'));
                if ($stored === false) {
                    $brochure = null;
                }
            }
            $propertyLayout = null;
            if (file_exists($path . 'layouts/property.jpg')) {
                $propertyLayout = 'property' . DIRECTORY_SEPARATOR . $propertyIdentifier . DIRECTORY_SEPARATOR .
                    'layout_uri' . DIRECTORY_SEPARATOR .
                    $property['code'] . '.' . microtime(true) . '.jpg';
                $stored = Storage::disk('local')->put($propertyLayout, file_get_contents($path . 'layouts/property.jpg'));
                if ($stored === false) {
                    $propertyLayout = null;
                }
            }
            $regulatoryApprovalQrImage = null;
            if ($property['regulatory_approval_qr_image'] && file_exists($path . DIRECTORY_SEPARATOR . $property['regulatory_approval_qr_image'])) {
                $regulatoryApprovalQrImage = 'property' . DIRECTORY_SEPARATOR . $propertyIdentifier . DIRECTORY_SEPARATOR .
                    'regulatory_approval_qr_image' . DIRECTORY_SEPARATOR .
                    $property['code'] . '.' . microtime(true) . '.png';
                $stored = Storage::disk('local')->put($regulatoryApprovalQrImage, file_get_contents($path . DIRECTORY_SEPARATOR . $property['regulatory_approval_qr_image']));
                if ($stored === false) {
                    $regulatoryApprovalQrImage = null;
                }
            }

            $propertyUriImage = null;
            if ($property['property_uri'] && file_exists($path . DIRECTORY_SEPARATOR . $property['property_uri'])) {
                $propertyUriImage = 'property' . DIRECTORY_SEPARATOR . $propertyIdentifier . DIRECTORY_SEPARATOR .
                    'property_uri' . DIRECTORY_SEPARATOR .
                    $property['code'] . '.' . microtime(true) . '.png';
                $stored = Storage::disk('local')->put($propertyUriImage, file_get_contents($path . DIRECTORY_SEPARATOR . $property['property_uri']));
                if ($stored === false) {
                    $propertyUriImage = null;
                }
            }

            $psHomeImageUriImage = $this->saveBackgroundImage($propertyIdentifier->toString(), $path, 'home');
            $psOverviewImageUri = $this->saveBackgroundImage($propertyIdentifier->toString(), $path, 'overview');
            $psSpecsImageUri = $this->saveBackgroundImage($propertyIdentifier->toString(), $path, 'specs');
            $psPricingImageUri = $this->saveBackgroundImage($propertyIdentifier->toString(), $path, 'pricing');
            $psFloorPlanImageUri = $this->saveBackgroundImage($propertyIdentifier->toString(), $path, 'floor_plan');
            $psAmenitiesImageUri = $this->saveBackgroundImage($propertyIdentifier->toString(), $path, 'amenities');
            $psVideoImageUri = $this->saveBackgroundImage($propertyIdentifier->toString(), $path, 'video');
            $psBrochure1ImageUri = $this->saveBackgroundImage($propertyIdentifier->toString(), $path, 'brochure_1');
            $psBrochure2ImageUri = $this->saveBackgroundImage($propertyIdentifier->toString(), $path, 'brochure_2');

            $siteMapImage = null;
            if (!empty($property['site_map']) && file_exists($path . DIRECTORY_SEPARATOR . $property['site_map'])) {
                $siteMapImage = 'property' . DIRECTORY_SEPARATOR . $propertyIdentifier . DIRECTORY_SEPARATOR .
                    'site_map_uri' . DIRECTORY_SEPARATOR .
                    $property['code'] . '.' . microtime(true) . '.png';
                $stored = Storage::disk('local')->put($siteMapImage, file_get_contents($path . DIRECTORY_SEPARATOR . $property['site_map']));
                if ($stored === false) {
                    $siteMapImage = null;
                }
            }
            $city = trim($property['city']);
            $localityCode = Str::slug(trim($property['locality']));
            /** @var \App\Models\Locality|null $locality */
            $locality = Locality::query()->where('code', '=', $localityCode)->first();
            if ($locality) {
                $localityId = $locality->id;
            } else {
                $localityId = Str::uuid();
                /** @var \App\Models\City $city */
                $city = City::query()->where('title', '=', $city)->firstOrFail();
                DB::table('localities')->insert([
                    'id' => $localityId,
                    'city_id' => $city->id,
                    'code' => $localityCode,
                    'title' => trim($property['locality']),
                ]);
            }

            $propertyDeveloperCode = Str::slug(trim($property['developer_title']));
            /** @var PropertyDeveloper $propertyDeveloper */
            $propertyDeveloper = PropertyDeveloper::query()->where('code', '=', $propertyDeveloperCode)->first();
            if ($propertyDeveloper) {
                $propertyDeveloperId = $propertyDeveloper->id;
            } else {
                $propertyDeveloperId = Str::uuid();
                DB::table('property_developers')->insert([
                    'id' => $propertyDeveloperId,
                    'code' => $propertyDeveloperCode,
                    'title' => trim($property['developer_title']),
                    'detail' =>  $property['developer_detail'],
                    'developer_uri' => $property['developer_uri'],
                ]);
            }

            DB::table('properties')->insert([
                'id' => $propertyIdentifier,
                'property_category_id' => $category->id,
                'property_locality_id' => $propertyLocality->id,
                'resident_type_id' => $residentType->id,
                'code' => $property['code'],
                'title' => $property['title'],
                'price_bracket' => $property['price_bracket'],
                'project_size' => $property['project_size'] ?: null,
                'banner_content' => $property['banner_content'] ?: null,
                'google_map' => $property['google_map'],
                'summary' => $property['summary'],
                'detail' => $property['detail'],
                'specification_welcome_text' => $property['specification_welcome_text'] ?? null,
                'address_line_1' => $property['address_line_1'] ?: null,
                'address_line_2' => $property['address_line_2'] ?: null,
                'locality_id' => $localityId,
                'property_developer_id' => $propertyDeveloperId,
                'postcode' => $property['postcode'] ?: null,
                'lat' => $property['latitude'],
                'lng' => $property['longitude'],
                'possession' => $property['possession'] ?: null,
                'regulatory_approval_title' => $property['regulatory_approval_title'] ?: null,
                'regulatory_approval_detail' => $property['regulatory_approval_detail'] ?: null,
                'regulatory_approval_qr_image' => $regulatoryApprovalQrImage,
                'property_uri' => $propertyUriImage,
                'ps_home_image_uri' => $psHomeImageUriImage,
                'ps_overview_image_uri' => $psOverviewImageUri,
                'ps_specs_image_uri' => $psSpecsImageUri,
                'ps_pricing_image_uri' => $psPricingImageUri,
                'ps_floor_plan_image_uri' => $psFloorPlanImageUri,
                'ps_amenities_image_uri' => $psAmenitiesImageUri,
                'ps_video_image_uri' => $psVideoImageUri,
                'ps_brochure_1_image_uri' => $psBrochure1ImageUri,
                'ps_brochure_2_image_uri' => $psBrochure2ImageUri,
                'brochure_uri' => $brochure,
                'layout_uri' => $propertyLayout,
                'site_map_uri' => $siteMapImage,
                'video_embed_code' => $property['video_embed_code'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            if (is_dir($path . 'images')) {
                $imagesDirector = dir($path . 'images');
                $this->savePropertyImagesFromDirectory($propertyIdentifier->toString(), $imagesDirector);
            }

            if (is_dir($path . 'galleries')) {
                $galleriesDirector = dir($path . 'galleries');
                $this->savePropertyGalleriesFromDirectory($propertyIdentifier->toString(), $galleriesDirector);
            }

            $this->savePropertyHighlights($propertyIdentifier->toString(), ($property['highlights'] ?? []));
            $this->savePropertyFeaturedHighlights($propertyIdentifier->toString(), ($property['featured_highlights'] ?? []));
            $this->savePropertyAmenities($path, $propertyIdentifier->toString());
            $this->savePropertyFeaturedAmenities($path, $propertyIdentifier->toString());
            $this->savePropertySpecifications($path, $propertyIdentifier->toString());
            $this->savePropertySectors($path, $propertyIdentifier->toString());
        }
    }
}
