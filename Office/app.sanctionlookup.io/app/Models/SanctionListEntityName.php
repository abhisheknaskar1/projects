<?php

declare(strict_types=1);

namespace App\Models;

use App\Enum\AliasStrength;
use App\Enum\NameType;
use App\Enum\SanctionEntityType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property string $sanction_list_entity_id
 * @property int $slenn
 * @property string $publisher_reference
 * @property string $name
 * @property \App\Enum\NameType $name_type
 * @property \App\Enum\AliasStrength|null $strength
 * @property string $integrity_hash
 * @property \Illuminate\Support\Carbon|null $publisher_listed_on
 * @property \Illuminate\Support\Carbon|null $publisher_de_listed_on
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \App\Models\SanctionListEntity $sanctionListEntity
 */
class SanctionListEntityName extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sanction_list_entity_names';

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
            'slenn' => 'integer',
            'publisher_reference' => 'string',
            'name' => 'string',
            'name_type' => NameType::class,
            'strength' => AliasStrength::class,
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
        'publisher_reference',
        'name',
        'name_type',
        'strength',
        'integrity_hash',
        'publisher_listed_on',
        'publisher_de_listed_on',
    ];

    public function sanctionListEntity(): BelongsTo
    {
        return $this->belongsTo(SanctionListEntity::class);
    }

    public static function lookup(string $queryTerm, ?SanctionEntityType $entityType = null, ?int $threshold = 100): Collection
    {
        $query = self::query()
            ->select([
                'sanction_list_entity_names.id as id',
                'sanction_list_entity_names.sanction_list_entity_id as sanction_list_entity_id',
                'sanction_list_entity_names.publisher_reference as publisher_reference',
                'sanction_list_entity_names.slenn as slenn',
                'sanction_list_entity_names.name as name',
                'sanction_list_entity_names.name_type as name_type',
                'sanction_list_entity_names.strength as strength',
            ])
            ->with([
                'sanctionListEntity',
            ])
            ->selectRaw('similarity(sanction_list_entity_names.name, ?) as slen_similarity_score', [
                trim($queryTerm),
            ])
            ->selectRaw('word_similarity(sanction_list_entity_names.name, ?) as slen_word_similarity_score', [
                trim($queryTerm),
            ])
            ->selectRaw('difference(sanction_list_entity_names.name, ?) as slen_soundex_score', [
                trim($queryTerm),
            ])
            ->selectRaw('levenshtein(sanction_list_entity_names.name, ?) as slen_levenshtein_distance', [
                trim($queryTerm),
            ])
            ->join(
                'sanction_list_entities',
                'sanction_list_entity_names.sanction_list_entity_id',
                '=',
                'sanction_list_entities.id'
            )
            ->join(
                'sanction_lists',
                'sanction_list_entities.sanction_list_id',
                '=',
                'sanction_lists.id'
            )
            ->whereRaw('sanction_lists.is_enabled')
            ->whereRaw('similarity(sanction_list_entity_names.name, ?) >= ?', [
                trim($queryTerm),
                $threshold / 100,
            ]);

        if ($entityType) {
            $query->where('sanction_list_entities.entity_type', '=', $entityType->value);
        }

        return $query->orderByDesc('slen_similarity_score')->get();
    }
}
