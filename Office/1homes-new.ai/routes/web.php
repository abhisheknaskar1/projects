<?php
declare(strict_types=1);

use App\Http\Controllers\AppAssetsController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\StaticPagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    StaticPagesController::class,
    'landing',
])->name('landing');

Route::get('/curated-apartment/{code}.html', [
    PropertiesController::class,
    'curatedApartment',
])->name('curated_apartment_view');

Route::get('/exclusive-properties/{code}.html', [
    PropertiesController::class,
    'exclusiveProperties',
])->name('exclusive_properties_view');

Route::get('/sectorial-properties/{code}.html', [
    PropertiesController::class,
    'sectorialProperty',
])->name('sectorial_properties_view');

Route::get('/plots-and-villas/{code}.html', [
    PropertiesController::class,
    'plotsAndVillas',
])->name('plots_and_villas_view');

Route::get('/properties', [
    PropertiesController::class,
    'getProperties',
])->name('properties_json');
Route::get('/properties.html', [
    PropertiesController::class,
    'index',
])->name('property_listing');

Route::get('/{category}.html', [
    StaticPagesController::class,
    'browseByCategory',
])->name('category_view');

Route::get('/asset/property-layout/{code}', [
    AppAssetsController::class,
    'propertyLayout',
])->name('asset_property_layout');


Route::get('/asset/property/regulatory-approval-qr-code/{code}', [
    AppAssetsController::class,
    'propertyRegulatoryApprovalQrImage',
])->name('asset_property_regulatory_approval_qr_code');

Route::get('/asset/property/property-uri/{code}', [
    AppAssetsController::class,
    'propertyLogoImage',
])->name('asset_property_uri');

Route::get('/asset/property/ps-home-image-uri/{code}', [
    AppAssetsController::class,
    'propertyPsHomeImageUri',
])->name('asset_property_ps_home_image_uri');

Route::get('/asset/property/ps-overview-image-uri/{code}', [
    AppAssetsController::class,
    'propertyPsOverviewImageUri',
])->name('asset_property_ps_overview_image_uri');

Route::get('/asset/property/ps-specs-image-uri/{code}', [
    AppAssetsController::class,
    'propertyPsSpecsImageUri',
])->name('asset_property_ps_specs_image_uri');

Route::get('/asset/property/ps-pricing-image-uri/{code}', [
    AppAssetsController::class,
    'propertyPsPricingImageUri',
])->name('asset_property_ps_pricing_image_uri');

Route::get('/asset/property/ps-floor-plan-image-uri/{code}', [
    AppAssetsController::class,
    'propertyPsFloorPlanImageUri',
])->name('asset_property_ps_floor_plan_image_uri');

Route::get('/asset/property/ps-amenities-image-uri/{code}', [
    AppAssetsController::class,
    'propertyPsAmenitiesImageUri',
])->name('asset_property_ps_amenities_image_uri');

Route::get('/asset/property/ps-video-image-uri/{code}', [
    AppAssetsController::class,
    'propertyPsVideoImageUri',
])->name('asset_property_ps_video_image_uri');

Route::get('/asset/property/ps-brochure-1-uri/{code}', [
    AppAssetsController::class,
    'propertyPsBrochure1ImageUri',
])->name('asset_property_ps_brochure_1_image_uri');

Route::get('/asset/property/ps-brochure-2-uri/{code}', [
    AppAssetsController::class,
    'propertyPsBrochure2ImageUri',
])->name('asset_property_ps_brochure_2_image_uri');

Route::get('/asset/property-layout-unit/{id}', [
    AppAssetsController::class,
    'propertyVariation',
])->name('asset_property_variation');

Route::get('/asset/{id}/{file}', [
    AppAssetsController::class,
    'propertyImage',
])->name('asset_property_image');

Route::get('/asset/gallery/{id}/{file}', [
    AppAssetsController::class,
    'propertyGallery',
])->name('asset_property_gallery');

