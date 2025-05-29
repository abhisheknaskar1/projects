<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property string $sanction_list_entity_id
 * @property string $publisher_reference
 * @property int|null $day_of_birth
 * @property int|null $month_of_birth
 * @property int|null $year_of_birth
 * @property string $raw_value
 * @property \Illuminate\Support\Carbon|null $publisher_listed_on
 * @property \Illuminate\Support\Carbon|null $publisher_de_listed_on
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \App\Models\SanctionListEntity $sanctionListEntity
 */
class SanctionListEntityDateOfBirth extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sanction_list_entity_date_of_births';

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
            'sanction_list_entity_id' => 'string',
            'publisher_reference' => 'string',
            'day_of_birth' => 'integer',
            'month_of_birth' => 'integer',
            'year_of_birth' => 'integer',
            'raw_value' => 'string',
            'publisher_listed_on' => 'datetime',
            'publisher_de_listed_on' => 'datetime',
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
        'publisher_reference',
        'day_of_birth',
        'month_of_birth',
        'year_of_birth',
        'raw_value',
        'publisher_listed_on',
        'publisher_de_listed_on',
    ];

    public function sanctionListEntity(): BelongsTo
    {
        return $this->belongsTo(SanctionListEntity::class);
    }
}
