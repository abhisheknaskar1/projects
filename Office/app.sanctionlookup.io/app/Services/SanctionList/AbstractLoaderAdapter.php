<?php

declare(strict_types=1);

namespace App\Services\SanctionList;

use App\Models\SanctionList;
use App\Models\SanctionListEntity;
use App\Models\SanctionListEntityDateOfBirth;
use App\Models\SanctionListEntityName;

abstract class AbstractLoaderAdapter implements LoaderAdapterInterface
{
    protected static function upsertNames(SanctionListEntity $entity, $names = []): void
    {
        foreach ($names as $nameEntry) {
            $nameEntry['name'] = base64_decode($nameEntry['name']);
            if (isset($nameEntry['id'])) {
                /** @var \App\Models\SanctionListEntityName $name */
                $name = SanctionListEntityName::query()->where('id', '=', $nameEntry['id'])->firstOrFail();
                unset($nameEntry['id']);
                $name->update($nameEntry);
            } else {
                $entity->names()->create($nameEntry);
            }
        }
    }

    protected static function upsertDateOfBirths(SanctionListEntity $entity, $dateOfBirths = []): void
    {
        foreach ($dateOfBirths as $dateOfBirth) {
            if (isset($dateOfBirth['id'])) {
                /** @var \App\Models\SanctionListEntityDateOfBirth $dob */
                $dob = SanctionListEntityDateOfBirth::query()->where('id', '=', $dateOfBirth['id'])->firstOrFail();
                unset($dateOfBirth['id']);
                $dob->update($dateOfBirth);
            } else {
                $entity->dateOfBirths()->create($dateOfBirth);
            }
        }
    }

    protected static function upsertNationalities(SanctionListEntity $entity, $nationalities = []): void
    {
        foreach ($nationalities as $nationalityEntry) {
            if (isset($nationalityEntry['id'])) {
                /** @var \App\Models\SanctionListEntityNationality $nationality */
                $nationality = SanctionListEntityDateOfBirth::query()->where('id', '=', $nationalityEntry['id'])->firstOrFail();
                unset($nationalityEntry['id']);
                $nationality->update($nationalityEntry);
            } else {
                $entity->nationalities()->create($nationalityEntry);
            }
        }
    }

    public static function upsert(SanctionList $sanctionList, array $entity): void
    {
        if (isset($entity['id'])) {
            /** @var \App\Models\SanctionListEntity $entity */
            $sanctionListEntity = SanctionListEntity::query()->where('id', '=', $entity['id'])->firstOrFail();
            unset($entity['id']);
            $sanctionListEntity->update($entity);
        } else {
            /** @var \App\Models\SanctionListEntity $sanctionListEntity */
            $sanctionListEntity = $sanctionList->entities()->create($entity);
        }
        self::upsertNames($sanctionListEntity, $entity['names'] ?? []);
        self::upsertDateOfBirths($sanctionListEntity, $entity['date_of_births'] ?? []);
        self::upsertNationalities($sanctionListEntity, $entity['nationalities'] ?? []);
    }
}
