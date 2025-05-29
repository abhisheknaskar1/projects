<?php

declare(strict_types=1);

namespace App\Services\SanctionList;

use App\Models\SanctionList;
use App\Models\SanctionListEntity;
use App\Services\SanctionList\Model\DateOfBirth;
use App\Services\SanctionList\Model\Entity;
use App\Services\SanctionList\Model\Name;
use App\Services\SanctionList\Model\Nationality;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

abstract class AbstractTransformerAdapter implements TransformerAdapterInterface
{
    protected static function getExistingEntities(SanctionList $sanctionList): array
    {
        $query = SanctionListEntity::query()->select([
            'sanction_list_entities.id',
            'sanction_list_entities.publisher_reference',
            'sanction_list_entities.integrity_hash',
        ])->with([
            'names' => fn (HasMany $builder) => $builder->select([
                'id',
                'sanction_list_entity_id',
                'publisher_reference',
                'name_type',
                'integrity_hash',
            ]),
            'dateOfBirths' => fn (HasMany $builder) => $builder->select([
                'id',
                'sanction_list_entity_id',
                'publisher_reference',
                'raw_value',
            ]),
            'nationalities' => fn (HasMany $builder) => $builder->select([
                'id',
                'sanction_list_entity_id',
                'publisher_reference',
                'raw_value',
            ]),
        ])->where('sanction_list_id', '=', $sanctionList->id);

        return $query->get()->toArray();
    }

    protected static function updateEntity(Entity $entity, ?array $existingEntity = []): void
    {
        if ($existingEntity) {
            $nameDirty = Arr::first($entity->getNames(), fn (Name $name, int $key) => $name->isDirty());
            $dobDirty = Arr::first($entity->getDateOfBirths(), fn (DateOfBirth $dob, int $key) => $dob->isDirty());
            $nationalityDirty = Arr::first($entity->getNationalities(), fn (Nationality $nationality, int $key) => $nationality->isDirty());
            $entityDirty = $entity->getIntegrityHash() !== $existingEntity['integrity_hash'];
            $isDirty = $entityDirty || $nameDirty || $dobDirty || $nationalityDirty;
            $entity->setId($existingEntity['id']);
            $entity->setDirty($isDirty);
        }
    }

    /**
     * @param  \App\Services\SanctionList\Model\Name[]  $names
     * @return \App\Services\SanctionList\Model\Name[]
     */
    protected static function getDirtyNames(array $names, array $existingNames = []): array
    {
        $dirtyNames = [];
        foreach ($names as $name) {
            /** @var array|null $existingName */
            $existingName = Arr::first(
                $existingNames,
                fn (array $value, int $key) => $value['publisher_reference'] === $name->getPublisherReference() && $value['name_type'] === $name->getNameType()->value
            );
            if ($existingName) {
                $name->setNew(false);
                $name->setId($existingName['id']);
                if ($name->getIntegrityHash() === $existingName['integrity_hash']) {
                    $name->setDirty(false);

                    continue;
                }
            }
            $dirtyNames[] = $name;
        }

        return $dirtyNames;
    }

    /**
     * @param  \App\Services\SanctionList\Model\DateOfBirth[]  $dateOfBirths
     * @return \App\Services\SanctionList\Model\DateOfBirth[]
     */
    protected static function getDirtyDateOfBirths(array $dateOfBirths, array $existingDateOfBirths = []): array
    {
        $dirtyDateOfBirths = [];
        foreach ($dateOfBirths as $dateOfBirth) {
            /** @var array|null $existingDateOfBirth */
            $existingDateOfBirth = Arr::first(
                $existingDateOfBirths,
                fn (array $value, int $key) => $value['publisher_reference'] === $dateOfBirth->getPublisherReference()
            );
            if ($existingDateOfBirth) {
                $dateOfBirth->setNew(false);
                $dateOfBirth->setId($existingDateOfBirth['id']);
                if ($dateOfBirth->getDateOfBirth() === $existingDateOfBirth['raw_value']) {
                    $dateOfBirth->setDirty(false);

                    continue;
                }
            }
            $dirtyDateOfBirths[] = $dateOfBirth;
        }

        return $dirtyDateOfBirths;
    }

    /**
     * @param  \App\Services\SanctionList\Model\Nationality[]  $nationalities
     * @return \App\Services\SanctionList\Model\Nationality[]
     */
    protected static function getDirtyNationalities(array $nationalities, array $existingNationalities = []): array
    {
        $dirtyNationalities = [];
        foreach ($nationalities as $nationality) {
            /** @var array|null $existingNationality */
            $existingNationality = Arr::first(
                $existingNationalities,
                fn (array $value, int $key) => $value['publisher_reference'] === $nationality->getPublisherReference()
            );
            if ($existingNationality) {
                $nationality->setNew(false);
                $nationality->setId($existingNationality['id']);
                if ($nationality->getNationality() === $existingNationality['raw_value']) {
                    $nationality->setDirty(false);

                    continue;
                }
            }
            $dirtyNationalities[] = $nationality;
        }

        return $dirtyNationalities;
    }
}
