<?php
declare(strict_types=1);

namespace App\Models;

use App\Utility\IndianMoney;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property string $property_sector_unit_id
 * @property string|null $description
 * @property float|null $area
 * @property float|null $min_area
 * @property float|null $max_area
 * @property string $area_type
 * @property float|null $price
 * @property float|null $min_price
 * @property float|null $max_price
 * @property string|null $layout_uri
 * @property integer $view_order
 * @property float|null $no_of_bed
 * @property float|null $no_of_bath
 * @property float|null $no_of_kitchen
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property \App\Models\PropertySectorUnit $property_sector_unit
 */
class PropertySectorUnitVariation extends Model
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
        'description',
        'area',
        'min_area',
        'max_area',
        'area_type',
        'price',
        'min_price',
        'max_price',
        'layout_uri',
        'view_order',
        'no_of_bed',
        'no_of_bath',
        'no_of_kitchen',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'property_sector_unit_id' => 'string',
        'description' => 'string',
        'area' => 'float',
        'min_area' => 'float',
        'max_area' => 'float',
        'area_type' => 'string',
        'price' => 'float',
        'min_price' => 'float',
        'max_price' => 'float',
        'layout_uri' => 'string',
        'view_order' => 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'area_nice',
        'price_nice',
    ];

    /**
     * @return string
     */
    protected function getAreaNiceAttribute(): string
    {
        if (isset($this->attributes['area']) || isset($this->attributes['min_area']) || isset($this->attributes['max_area'])) {
            if ((float)$this->attributes['area'] === 0.00) {
                $area = floor((float)$this->attributes['min_area']) . '-' . floor((float)$this->attributes['max_area']);
            } else {
                $area = floor((float)$this->attributes['area']);
            }
            $area .= ' Sq. Ft.' . ' (' . ucfirst($this->attributes['area_type']) . ')';

            return $area;
        }

        return '';
    }

    /**
     * @return string
     */
    protected function getPriceNiceAttribute(): string
    {
        $price = 0;
        if (isset($this->attributes['price']) || isset($this->attributes['min_price']) || isset($this->attributes['max_price'])) {
            if ((float)$this->attributes['price'] === 0.00) {
                if ((float)$this->attributes['min_price'] > 0.00 && (float)$this->attributes['max_price'] === 0.00) {
                    $price = IndianMoney::getInWords((float)$this->attributes['min_price'], true) . ' Onwards';
                } elseif ((float)$this->attributes['min_price'] === 0.00 && (float)$this->attributes['max_price'] > 0.00) {
                    $price = 'Upto ' . IndianMoney::getInWords((float)$this->attributes['max_price'], true);
                } elseif ((float)$this->attributes['min_price'] > 0.00 && (float)$this->attributes['max_price'] > 0.00) {
                    $price = IndianMoney::getInWords((float)$this->attributes['min_price'], true) . ' - ' . IndianMoney::getInWords((float)$this->attributes['max_price'], true);
                }
            } else {
                $price = IndianMoney::getInWords((float)$this->attributes['price'], true);
            }
        }

        return (string)$price;
    }

    public static function getMinPrice(): float
    {
        $min = self::query()->selectRaw('MIN(COALESCE(price, min_price)) AS min_threshold')->first();

        return intval(((float)$min['min_threshold']) / 500000) * 500000;
    }

    public static function getMaxPrice(): float
    {
        $max = self::query()->selectRaw('MAX(COALESCE(price, max_price)) AS max_threshold')->first();

        return ceil(((float)$max['max_threshold']) / 500000) * 500000;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertySectorUnit(): BelongsTo
    {
        return $this->belongsTo(PropertySectorUnit::class);
    }
}
