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
 * @property string $country_id
 * @property string|null $region_id
 * @property string $code
 * @property string $title
 * @property float|null $lat
 * @property float|null $lng
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property \App\Models\Region $region
 * @property \App\Models\Country $country
 */
class City extends Model
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
        'country_id',
        'region_id',
        'code',
        'title',
        'lat',
        'lng',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'country_id' => 'string',
        'region_id' => 'string',
        'code' => 'string',
        'title' => 'string',
        'lat' => 'float',
        'lng' => 'float',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localities(): HasMany
    {
        return $this->hasMany(Locality::class);
    }
}
