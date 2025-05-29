<?php

declare(strict_types=1);

namespace App\Services\SanctionList\Adapters\Transformers;

use App\Enum\NameType;
use App\Enum\SanctionEntityType;
use App\Models\SanctionList;
use App\Services\SanctionList\AbstractTransformerAdapter;
use App\Services\SanctionList\Model\DateOfBirth;
use App\Services\SanctionList\Model\Entity;
use App\Services\SanctionList\Model\Name;
use App\Services\SanctionList\Model\Nationality;
use App\Services\SanctionList\Model\SanctionList as VendorSanctionList;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use League\Csv\Reader;

class Dfat extends AbstractTransformerAdapter
{
    protected static function getDateOfBirthReference(DateOfBirth $dateOfBirth, string $publisherReference): string
    {
        return sha1(implode('|', [
            $publisherReference,
            $dateOfBirth->getDateOfBirth(),
        ]));
    }

    protected static function getNationalityReference(Nationality $nationality, string $publisherReference): string
    {
        return sha1(implode('|', [
            $publisherReference,
            $nationality->getNationality(),
        ]));
    }

    protected static function appendName(Entity $entity, string $entityName, NameType $nameType, string $publisherReference): void
    {
        if ($entityName) {
            $names = $entity->getNames();
            $nameExists = Arr::first($names, fn (Name $item) => $entityName === $item->getName() && $nameType === $item->getNameType());
            if (! $nameExists) {
                $name = new Name;
                $name->setDirty();
                $name->setPublisherReference($publisherReference);
                $name->setName($entityName);
                $name->setNameType($nameType);
                $names = array_merge($names, [$name]);
                $entity->setNames($names);
            }
        }
    }

    protected static function appendNationality(Entity $entity, string $nationalityText, string $publisherReference): void
    {
        $nationalityText = preg_replace('/\s+/', ' ', $nationalityText);
        if ($nationalityText) {
            $nationalityArray = str_getcsv($nationalityText, ';');
            $nationalityArray = array_map('trim', $nationalityArray);
            $nationalities = $entity->getNationalities();
            foreach ($nationalityArray as $nationalityText) {
                $nationalityExists = Arr::first($nationalities, fn (Nationality $item) => $nationalityText === $item->getNationality());
                if (! $nationalityExists) {
                    $nationality = new Nationality;
                    $nationality->setDirty();
                    $nationality->setNationality($nationalityText);
                    $nationality->setPublisherReference(self::getNationalityReference($nationality, $publisherReference));
                    $nationalities = array_merge($nationalities, [$nationality]);
                    $entity->setNationalities($nationalities);
                }
            }
        }
    }

    protected static function appendDateOfBirth(Entity $entity, string $dob, string $publisherReference): void
    {
        $dob = preg_replace('/\s+/', ' ', $dob);
        if ($dob) {
            $dobArray = str_getcsv($dob, ';');
            $dobArray = array_map('trim', $dobArray);
            $dobs = $entity->getDateOfBirths();
            foreach ($dobArray as $dob) {
                $dobExists = Arr::first($dobs, fn (DateOfBirth $item) => $dob === $item->getDateOfBirth());
                if (! $dobExists) {
                    $dateOfBirth = new DateOfBirth;
                    $dateOfBirth->setDirty();
                    $dateOfBirth->setDateOfBirth($dob);
                    $dateOfBirth->setPublisherReference(self::getDateOfBirthReference($dateOfBirth, $publisherReference));
                    $dobs = array_merge($dobs, [$dateOfBirth]);
                    $entity->setDateOfBirths($dobs);
                }
            }
        }
    }

    protected static function setEntityListedOn(Entity $entity, ?string $listedOn = null): void
    {
        if (empty($listedOn) === false) {
            try {
                $entity->setPublisherListedOn(Carbon::createFromFormat('d/m/Y', $listedOn)->setHour(0)->setMinute(0)->setSecond(0));
            } catch (InvalidFormatException) {
                $entity->setPublisherListedOn(Carbon::createFromFormat('d-M-Y', $listedOn)->setHour(0)->setMinute(0)->setSecond(0));
            }
        }
    }

    /**
     * @throws \League\Csv\Exception
     */
    public static function transform(SanctionList $sanctionList, Reader $reader): VendorSanctionList
    {
        $vendorSanctionList = new VendorSanctionList;
        $existingEntities = self::getExistingEntities($sanctionList);
        $reader->setHeaderOffset(0);
        $entities = [];
        $entity = null;
        foreach ($reader->getRecords() as $record) {
            $publisherReference = trim($record['Reference']);
            if (is_numeric($publisherReference)) {
                if ($entity) {
                    /** @var array|null $existingEntity */
                    $existingEntity = Arr::first(
                        $existingEntities,
                        fn (array $value, int $key) => $value['publisher_reference'] === $entity->getPublisherReference()
                    );
                    $dirtyNames = self::getDirtyNames($entity->getNames(), $existingEntity['names'] ?? []);
                    $entity->setNames($dirtyNames);
                    $dirtyDateOfBirths = self::getDirtyDateOfBirths($entity->getDateOfBirths(), $existingEntity['date_of_births'] ?? []);
                    $entity->setDateOfBirths($dirtyDateOfBirths);
                    $dirtyNationalities = self::getDirtyNationalities($entity->getNationalities(), $existingEntity['nationalities'] ?? []);
                    $entity->setNationalities($dirtyNationalities);
                    $entity->setNew(is_null($existingEntity));
                    self::updateEntity($entity, $existingEntity);
                    if ($entity->isDirty()) {
                        $entities[] = $entity;
                    }
                    $entity = null;
                }
                $entity = new Entity;
                $entity->setDirty();
                $entityType = match (trim($record['Type'])) {
                    'Individual' => SanctionEntityType::INDIVIDUAL,
                    'Entity' => SanctionEntityType::ENTITY,
                };
                $entity->setEntityType($entityType);
                $entity->setPublisherReference((string) $publisherReference);
                self::setEntityListedOn($entity, trim($record['Control Date']));
                $remark = trim($record['Additional Information']);
                $remark = preg_replace('/\s+/', ' ', $remark);
                $entity->setRemark($remark ?: null);
            }
            $entityName = trim($record['Name of Individual or Entity']);
            $nameType = match (mb_strtolower(trim($record['Name Type']))) {
                'primary name' => NameType::PRIMARY,
                'aka', 'original script', 'formerly known as', 'previously listed as' => NameType::ALIAS,
            };

            self::appendName($entity, $entityName, $nameType, $publisherReference);
            $nationalityText = trim($record['Citizenship']);
            self::appendNationality($entity, $nationalityText, $publisherReference);
            $dob = trim($record['Date of Birth']);
            self::appendDateOfBirth($entity, $dob, $publisherReference);
        }
        $vendorSanctionList->setEntities($entities);

        return $vendorSanctionList;
    }
}
