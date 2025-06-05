<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property string $property_sector_id
 * @property string $property_unit_id
 * @property integer|null $number_of_units
 * @property string|null $towers
 * @property string|null $floors
 * @property integer $view_order
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property \App\Models\PropertySector $property_sector
 * @property \App\Models\PropertyUnitType $property_unit_type
 */
class PropertySectorUnit extends Model
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
     * @var array
     */
    protected $fillable = [
        'property_sector_id',
        'property_unit_id',
        'number_of_units',
        'towers',
        'floors',
        'view_order',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'property_sector_id' => 'string',
        'property_unit_id' => 'string',
        'number_of_units' => 'integer',
        'towers' => 'string',
        'floors' => 'string',
        'view_order' => 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertySector(): BelongsTo
    {
        return $this->belongsTo(PropertySector::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyUnitType(): BelongsTo
    {
        return $this->belongsTo(PropertyUnitType::class, 'property_unit_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variations(): HasMany
    {
        return $this->hasMany(PropertySectorUnitVariation::class, 'property_sector_unit_id', 'id');
    }
}
