<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $id
 * @property string $code
 * @property string $title
 * @property string $short_title
 * @property string|null $description
 * @property string|null $uri
 * @property string $publisher
 * @property bool $is_enabled
 * @property \Illuminate\Support\Carbon|null $publisher_last_updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Database\Eloquent\Collection<\App\Models\SanctionListEntity> $entities
 */
class SanctionList extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sanction_lists';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'code' => 'string',
            'title' => 'string',
            'short_title' => 'string',
            'description' => 'string',
            'uri' => 'string',
            'publisher' => 'string',
            'is_enabled' => 'boolean',
            'publisher_last_updated_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'title',
        'short_title',
        'description',
        'uri',
        'publisher',
    ];

    public function entities(): HasMany
    {
        return $this->hasMany(SanctionListEntity::class, 'sanction_list_id');
    }
}
