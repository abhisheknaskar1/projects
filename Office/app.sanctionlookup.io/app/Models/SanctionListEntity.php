<?php

declare(strict_types=1);

namespace App\Models;

use App\Enum\SanctionEntityType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $id
 * @property string $sanction_list_id
 * @property \App\Enum\SanctionEntityType $entity_type
 * @property string $publisher_reference
 * @property int $slen
 * @property string|null $remark
 * @property string $integrity_hash
 * @property \Illuminate\Support\Carbon|null $publisher_listed_on
 * @property \Illuminate\Support\Carbon|null $publisher_de_listed_on
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \App\Models\SanctionList $sanctionList
 * @property \Illuminate\Database\Eloquent\Collection<\App\Models\SanctionListEntityDateOfBirth> $dateOfBirths
 * @property \Illuminate\Database\Eloquent\Collection<\App\Models\SanctionListEntityNationality> $nationalities
 * @property \Illuminate\Database\Eloquent\Collection<\App\Models\SanctionListEntityName> $names
 */
class SanctionListEntity extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sanction_list_entities';

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
            'sanction_list_id' => 'string',
            'entity_type' => SanctionEntityType::class,
            'slen' => 'integer',
            'publisher_reference' => 'string',
            'remark' => 'string',
            'integrity_hash' => 'string',
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
        'entity_type',
        'publisher_reference',
        'remark',
        'integrity_hash',
        'publisher_listed_on',
        'publisher_de_listed_on',
    ];

    public function sanctionList(): BelongsTo
    {
        return $this->belongsTo(SanctionList::class);
    }

    public function dateOfBirths(): HasMany
    {
        return $this->hasMany(SanctionListEntityDateOfBirth::class, 'sanction_list_entity_id');
    }

    public function nationalities(): HasMany
    {
        return $this->hasMany(SanctionListEntityNationality::class, 'sanction_list_entity_id');
    }

    public function names(): HasMany
    {
        return $this->hasMany(SanctionListEntityName::class, 'sanction_list_entity_id');
    }
}
