<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property string $id
 * @property string $property_category_id
 * @property string $property_locality_id
 * @property string $resident_type_id
 * @property string $code
 * @property string $title
 * @property string $price_bracket
 * @property string|null $project_size
 * @property string $banner_content
 * @property string $google_map
 * @property string $summary
 * @property string $truncated_summary
 * @property string $detail
 * @property string|null $specification_welcome_text
 * @property string $address_line_1
 * @property string|null $address_line_2
 * @property string $locality_id
 * @property string $property_developer_id
 * @property string $postcode
 * @property float $lat
 * @property float $lng
 * @property string $property_uri
 * @property string|null $brochure_uri
 * @property string|null $layout_uri
 * @property string|null $site_map_uri
 * @property string|null $ps_home_image_uri
 * @property string|null $ps_overview_image_uri
 * @property string|null $ps_specs_image_uri
 * @property string|null $ps_pricing_image_uri
 * @property string|null $ps_floor_plan_image_uri
 * @property string|null $ps_amenities_image_uri
 * @property string|null $ps_video_image_uri
 * @property string|null $ps_brochure_1_image_uri
 * @property string|null $ps_brochure_2_image_uri
 * @property string|null $possession
 * @property string|null $regulatory_approval_title
 * @property string|null $regulatory_approval_detail
 * @property string|null $regulatory_approval_qr_image
 * @property string|null $video_embed_code
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property string $address
 *
 * @property \App\Models\PropertyCategory $property_category
 * @property \App\Models\Locality $locality
 */
class Property extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var string[]
     */
    protected $fillable = [
        'property_category_id',
        'property_locality_id',
        'resident_type_id',
        'code',
        'title',
        'price_bracket',
        'project_size',
        'banner_content',
        'google_map',
        'summary',
        'detail',
        'specification_welcome_text',
        'address_line_1',
        'address_line_2',
        'locality_id',
        'property_developer_id',
        'postcode',
        'lat',
        'lng',
        'property_uri',
        'brochure_uri',
        'layout_uri',
        'site_map_uri',
        'ps_home_image_uri',
        'ps_overview_image_uri',
        'ps_specs_image_uri',
        'ps_pricing_image_uri',
        'ps_floor_plan_image_uri',
        'ps_amenities_image_uri',
        'ps_video_image_uri',
        'ps_brochure_1_image_uri',
        'ps_brochure_2_image_uri',
        'possession',
        'regulatory_approval_title',
        'regulatory_approval_detail',
        'regulatory_approval_qr_image',
        'video_embed_code',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'id' => 'string',
        'property_category_id' => 'string',
        'property_locality_id' => 'string',
        'resident_type_id' => 'string',
        'code' => 'string',
        'title' => 'string',
        'price_bracket' => 'string',
        'project_size' => 'string',
        'banner_content' => 'string',
        'google_map' => 'string',
        'summary' => 'string',
        'detail' => 'string',
        'specification_welcome_text' => 'string',
        'address_line_1' => 'string',
        'address_line_2' => 'string',
        'locality_id' => 'string',
        'property_developer_id' => 'string',
        'postcode' => 'string',
        'lat' => 'float',
        'lng' => 'float',
        'property_uri' => 'string',
        'brochure_uri' => 'string',
        'layout_uri' => 'string',
        'site_map_uri' => 'string',
        'ps_home_image_uri' => 'string',
        'ps_overview_image_uri' => 'string',
        'ps_specs_image_uri' => 'string',
        'ps_pricing_image_uri' => 'string',
        'ps_floor_plan_image_uri' => 'string',
        'ps_amenities_image_uri' => 'string',
        'ps_video_image_uri' => 'string',
        'ps_brochure_1_image_uri' => 'string',
        'ps_brochure_2_image_uri' => 'string',
        'possession' => 'string',
        'regulatory_approval_title' => 'string',
        'regulatory_approval_detail' => 'string',
        'regulatory_approval_qr_image' => 'string',
        'video_embed_code' => 'string',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'address',
        'truncated_summary',
    ];

    /**
     * @return string
     */
    protected function getAddressAttribute(): string
    {
        return implode(', ', array_filter([
            $this->attributes['address_line_1'] ?? null,
            $this->attributes['address_line_2'] ?? null,
            $this->locality->city->title ?? null,
            $this->attributes['postcode'] ?? null,
            $this->attributes['district'] ?? null,
        ]));
    }

    /**
     * @return string
     */
    protected function getTruncatedSummaryAttribute(): string
    {
        return Str::limit($this->attributes['summary'] ?? '', 300);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyCategory(): BelongsTo
    {
        return $this->belongsTo(PropertyCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function highlights(): HasMany
    {
        return $this->hasMany(PropertyHighlight::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function featuredHighlights(): HasMany
    {
        return $this->hasMany(PropertyFeaturedHighlight::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, AmenityProperty::class, 'property_id', 'amenity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function featuredAmenities(): HasMany
    {
        return $this->hasMany(PropertyFeaturedAmenity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specifications(): HasMany
    {
        return $this->hasMany(PropertySpecification::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sectors(): HasMany
    {
        return $this->hasMany(PropertySector::class);
    }

    public function locality(): BelongsTo
    {
        return $this->belongsTo(Locality::class);
    }

    /**
     * @return BelongsTo
     */
    public function residentType(): BelongsTo
    {
        return $this->belongsTo(ResidentType::class);
    }

    /**
     * @return BelongsTo
     */
    public function propertyDeveloper(): BelongsTo
    {
        return $this->belongsTo(PropertyDeveloper::class);
    }

    /**
     * @return BelongsTo
     */
    public function propertyLocality(): BelongsTo
    {
        return $this->belongsTo(PropertyLocality::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function galleries(): HasMany
    {
        return $this->hasMany(PropertyGallery::class);
    }
}
