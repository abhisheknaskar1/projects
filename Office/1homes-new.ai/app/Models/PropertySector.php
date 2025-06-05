<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property string $id
 * @property string $property_id
 * @property string $code
 * @property string $title
 * @property integer $view_order
 * @property integer|null $number_of_units
 * @property string|null $towers
 * @property string|null $floors
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property \App\Models\Property $property
 */
class PropertySector extends Model
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
        'title',
        'view_order',
        'number_of_units',
        'towers',
        'floors',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'property_id' => 'string',
        'code' => 'string',
        'title' => 'string',
        'view_order' => 'integer',
        'number_of_units' => 'integer',
        'towers' => 'string',
        'floors' => 'string',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function (PropertySector $sector) {
            $sector->code = mb_strtolower(Str::slug(trim($sector->title)));
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function units(): HasMany
    {
        return $this->hasMany(PropertySectorUnit::class, 'property_sector_id', 'id');
    }
}
