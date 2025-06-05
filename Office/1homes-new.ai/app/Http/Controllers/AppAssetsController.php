<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyGallery;
use App\Models\PropertyImage;
use App\Models\PropertySectorUnitVariation;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AppAssetsController extends Controller
{
    /**
     * @param string $id
     * @param string $file
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyImage(string $id, string $file): BinaryFileResponse
    {
        /** @var \App\Models\PropertyImage $image */
        $image = PropertyImage::query()->where('id', '=', $id)->firstOrFail();
        $path = Storage::disk('local')->path($image->image_uri);

        return response()->file($path);
    }

    /**
     * @param string $id
     * @param string $file
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyGallery(string $id, string $file): BinaryFileResponse
    {
        /** @var \App\Models\PropertyGallery $image */
        $image = PropertyGallery::query()->where('id', '=', $id)->firstOrFail();
        $path = Storage::disk('local')->path($image->gallery_uri);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyLayout(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->layout_uri);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyRegulatoryApprovalQrImage(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->regulatory_approval_qr_image);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyLogoImage(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->property_uri);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyPsHomeImageUri(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->ps_home_image_uri);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyPsOverviewImageUri(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->ps_overview_image_uri);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyPsSpecsImageUri(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->ps_specs_image_uri);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyPsPricingImageUri(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->ps_pricing_image_uri);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyPsFloorPlanImageUri(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->ps_floor_plan_image_uri);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyPsAmenitiesImageUri(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->ps_amenities_image_uri);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyPsVideoImageUri(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->ps_video_image_uri);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyPsBrochure1ImageUri(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->ps_brochure_1_image_uri);

        return response()->file($path);
    }

    /**
     * @param string $code
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyPsBrochure2ImageUri(string $code): BinaryFileResponse
    {
        /** @var \App\Models\Property $property */
        $property = Property::query()->where('code', '=', $code)->firstOrFail();
        $path = Storage::disk('local')->path($property->ps_brochure_2_image_uri);

        return response()->file($path);
    }

    /**
     * @param string $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function propertyVariation(string $id): BinaryFileResponse
    {
        /** @var \App\Models\PropertySectorUnitVariation $variation */
        $variation = PropertySectorUnitVariation::query()->where('id', '=', $id)->firstOrFail();
        $path = Storage::disk('local')->path($variation->layout_uri);

        return response()->file($path);
    }
}
