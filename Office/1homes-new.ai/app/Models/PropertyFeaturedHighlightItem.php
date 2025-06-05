<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property string $property_featured_highlight_id
 * @property string $title
 * @property string $icon_uri
 * @property integer $view_order
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property \App\Models\PropertyFeaturedHighlight $property_featured_highlight
 */
class PropertyFeaturedHighlightItem extends Model
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
        'view_order',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'property_featured_highlight_id' => 'string',
        'title' => 'string',
        'icon_uri' => 'string',
        'view_order' => 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyFeaturedHighlight(): BelongsTo
    {
        return $this->belongsTo(PropertyFeaturedHighlight::class);
    }
}
