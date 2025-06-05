<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property string $id
 * @property string $code
 * @property string $title
 * @property integer $icon_uri
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property \App\Models\Property $property
 */
class Amenity extends Model
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
        'icon_uri',
    ];

    /**
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function (Amenity $amenity) {
            $amenity->code = mb_strtolower(Str::slug(trim($amenity->title)));
        });
    }

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'code' => 'string',
        'title' => 'string',
        'icon_uri' => 'string',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
