<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Route;

/**
 * @property string $id
 * @property string $property_category_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $cta_label
 * @property string|null $cta_action
 * @property string|null $image_uri
 * @property integer $view_order
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \App\Models\PropertyCategory $property_category
 */
class PropertyCategorySlide extends Model
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
        'description',
        'cta_label',
        'cta_action',
        'image_uri',
        'view_order',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'property_category_id' => 'string',
        'title' => 'string',
        'description' => 'string',
        'cta_label' => 'string',
        'cta_action' => 'string',
        'image_uri' => 'string',
        'view_order' => 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(PropertyCategory::class);
    }
}
