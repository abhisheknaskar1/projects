<?php

declare(strict_types=1);

namespace App\Services\SanctionList\Adapters\Transformers;

use App\Enum\NameType;
use App\Enum\SanctionEntityType;
use App\Models\SanctionList;
use App\Services\SanctionList\AbstractXmlTransformerAdapter;
use App\Services\SanctionList\Model\DateOfBirth;
use App\Services\SanctionList\Model\Entity;
use App\Services\SanctionList\Model\Name;
use App\Services\SanctionList\Model\Nationality;
use App\Services\SanctionList\Model\SanctionList as VendorSanctionList;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use SimpleXMLElement;
use XMLReader;

class EuFinancialSanction extends AbstractXmlTransformerAdapter
{
    /**
     * @return \App\Services\SanctionList\Model\Name[]
     */
    protected static function getNames(SimpleXMLElement $object): array
    {
        $names = [];
        $objectAsArray = json_decode(json_encode($object), true);
        $namesInList = $objectAsArray['nameAlias'];
        if (count(array_filter(array_keys($namesInList), 'is_string'))) {
            $namesInList = [$namesInList];
        }

        foreach ($namesInList as $i => $nameInList) {
            $name = new Name;
            $name->setDirty();
            $name->setNameType($i === 0 ? NameType::PRIMARY : NameType::ALIAS);
            $name->setName($nameInList['@attributes']['wholeName']);
            $name->setPublisherReference($nameInList['@attributes']['logicalId']);
            $publishedOn = $nameInList['regulationSummary']['@attributes']['publicationDate'] ?? '';
            if (empty($publishedOn) === false) {
                $name->setPublisherListedOn(Carbon::parse($publishedOn));
            }
            $names[] = $name;
        }

        return $names;
    }

    /**
     * @return \App\Services\SanctionList\Model\Nationality[]
     */
    protected static function getNationalities(SimpleXMLElement $object): array
    {
        $nationalities = [];
        $objectAsArray = json_decode(json_encode($object), true);
        $nationalitiesInList = $objectAsArray['citizenship'] ?? [];
        if (count(array_filter(array_keys($nationalitiesInList), 'is_string'))) {
            $nationalitiesInList = [$nationalitiesInList];
        }
        foreach ($nationalitiesInList as $nationalityInList) {
            $nationality = new Nationality;
            $nationality->setDirty();
            $nationality->setNationality($nationalityInList['@attributes']['countryDescription']);
            $nationality->setPublisherReference($nationalityInList['@attributes']['logicalId']);
            $publishedOn = $nationalityInList['regulationSummary']['@attributes']['publicationDate'] ?? '';
            if (empty($publishedOn) === false) {
                $nationality->setPublisherListedOn(Carbon::parse($publishedOn));
            }
            $nationalities[] = $nationality;
        }

        return $nationalities;
    }

    /**
     * @return \App\Services\SanctionList\Model\DateOfBirth[]
     */
    protected static function getDateOfBirths(SimpleXMLElement $object): array
    {
        $dateOfBirths = [];
        $objectAsArray = json_decode(json_encode($object), true);
        $dateOfBirthsInList = $objectAsArray['birthdate'] ?? [];
        if (count(array_filter(array_keys($dateOfBirthsInList), 'is_string'))) {
            $dateOfBirthsInList = [$dateOfBirthsInList];
        }
        foreach ($dateOfBirthsInList as $dateOfBirthInList) {
            $dateOfBirth = new DateOfBirth;
            $dateOfBirth->setDirty();
            $dateOfBirth->setDateOfBirth(implode('-', array_filter([
                $dateOfBirthInList['@attributes']['year'] ?? null,
                $dateOfBirthInList['@attributes']['monthOfYear'] ?? null,
                $dateOfBirthInList['@attributes']['dayOfMonth'] ?? null,
            ])));
            $dateOfBirth->setPublisherReference($dateOfBirthInList['@attributes']['logicalId']);
            $publishedOn = $dateOfBirthInList['regulationSummary']['@attributes']['publicationDate'] ?? '';
            if (empty($publishedOn) === false) {
                $dateOfBirth->setPublisherListedOn(Carbon::parse($publishedOn));
            }
            $dateOfBirths[] = $dateOfBirth;
        }

        return $dateOfBirths;
    }

    protected static function getEntity(SimpleXMLElement $object): Entity
    {
        $entity = new Entity;
        $entity->setDirty();
        $entity->setRemark($object->{'remark'}->__toString());
        $subjectType = $object->{'subjectType'}->attributes()->{'classificationCode'}->__toString();
        $entityType = match ($subjectType) {
            'P' => SanctionEntityType::INDIVIDUAL,
            'E' => SanctionEntityType::ENTITY
        };
        $entity->setEntityType($entityType);
        $publishedOn = $object->{'regulation'}->attributes()->{'publicationDate'}->__toString();
        if (empty($publishedOn) === false) {
            $entity->setPublisherListedOn(Carbon::parse($publishedOn));
        }

        return $entity;
    }

    /**
     * @param  \App\Services\SanctionList\Model\Entity[]|\App\Services\SanctionList\Model\Name[]|\App\Services\SanctionList\Model\Nationality[]|\App\Services\SanctionList\Model\DateOfBirth[]  $items
     */
    public static function getEntityIndexForPublisherReference(array $items, Entity|Name|Nationality|DateOfBirth $model): int
    {
        /**
         * @var int $index
         */
        foreach ($items as $index => $item) {
            if ($item->getPublisherReference() === $model->getPublisherReference()) {
                return $index;
            }
        }

        return -1;
    }

    /**
     * @return \App\Services\SanctionList\Model\Name[]
     */
    protected static function amendNames(Entity $amendEntity, Entity $entity): array
    {
        $entityNames = $entity->getNames();
        $names = $amendEntity->getNames();
        foreach ($entityNames as $name) {
            $existingNameIndex = self::getEntityIndexForPublisherReference($names, $name);
            if ($existingNameIndex >= 0) {
                $amendName = $names[$existingNameIndex];
                if ($name->getName()) {
                    $amendName->setName($name->getName());
                }
                if ($name->getNameType()) {
                    $amendName->setNameType($name->getNameType());
                }
                if ($name->getAliasStrength()) {
                    $amendName->setAliasStrength($name->getAliasStrength());
                }
                $names[$existingNameIndex] = $amendName;
            } else {
                $names = array_merge($names, [$name]);
            }
        }

        return $names;
    }

    /**
     * @return \App\Services\SanctionList\Model\Nationality[]
     */
    protected static function amendNationalities(Entity $amendEntity, Entity $entity): array
    {
        $entityNationalities = $entity->getNationalities();
        $nationalities = $amendEntity->getNationalities();
        foreach ($entityNationalities as $nationality) {
            $existingNationalityIndex = self::getEntityIndexForPublisherReference($nationalities, $nationality);
            if ($existingNationalityIndex >= 0) {
                $amendNationality = $nationalities[$existingNationalityIndex];
                if ($nationality->getNationality()) {
                    $amendNationality->setNationality($nationality->getNationality());
                }
                $nationalities[$existingNationalityIndex] = $amendNationality;
            } else {
                $nationalities = array_merge($nationalities, [$nationality]);
            }
        }

        return $nationalities;
    }

    /**
     * @return \App\Services\SanctionList\Model\DateOfBirth[]
     */
    protected static function amendDateOfBirths(Entity $amendEntity, Entity $entity): array
    {
        $entityDateOfBirths = $entity->getDateOfBirths();
        $dateOfBirths = $amendEntity->getDateOfBirths();
        foreach ($entityDateOfBirths as $dateOfBirth) {
            $existingDobIndex = self::getEntityIndexForPublisherReference($dateOfBirths, $dateOfBirth);
            if ($existingDobIndex >= 0) {
                $amendDob = $dateOfBirths[$existingDobIndex];
                if ($dateOfBirth->getDateOfBirth()) {
                    $amendDob->setDateOfBirth($dateOfBirth->getDateOfBirth());
                }
                $dateOfBirths[$existingDobIndex] = $amendDob;
            } else {
                $dateOfBirths = array_merge($dateOfBirths, [$dateOfBirth]);
            }
        }

        return $dateOfBirths;
    }

    /**
     * @param  \App\Services\SanctionList\Model\Entity[]  $entities
     */
    protected static function amendEntity(int $index, array &$entities, Entity $entity): void
    {
        $amendEntity = $entities[$index];
        if ($entity->getEntityType()) {
            $amendEntity->setEntityType($entity->getEntityType());
        }
        if ($entity->getRemark()) {
            $amendEntity->setRemark($entity->getRemark());
        }

        $amendEntity->setNames(self::amendNames($amendEntity, $entity));
        $amendEntity->setNationalities(self::amendNationalities($amendEntity, $entity));
        $amendEntity->setDateOfBirths(self::amendDateOfBirths($amendEntity, $entity));
        $entities[$index] = $amendEntity;
    }

    public static function transform(SanctionList $sanctionList, XMLReader $reader): VendorSanctionList
    {
        $vendorSanctionList = new VendorSanctionList;
        $existingEntities = self::getExistingEntities($sanctionList);
        $entities = [];
        while ($reader->read()) {
            if ($reader->nodeType === XMLReader::ELEMENT && $reader->name === 'sanctionEntity') {
                $object = simplexml_load_string($reader->readOuterXml());
                $entity = self::getEntity($object);
                $entity->setPublisherReference($reader->getAttribute('logicalId'));
                $names = self::getNames($object);
                $nationalities = self::getNationalities($object);
                $dateOfBirths = self::getDateOfBirths($object);
                /** @var array|null $existingEntity */
                $existingEntity = Arr::first(
                    $existingEntities,
                    fn (array $value, int $key) => $value['publisher_reference'] === $entity->getPublisherReference()
                );
                $dirtyNames = self::getDirtyNames($names, $existingEntity['names'] ?? []);
                $entity->setNames($dirtyNames);
                $dirtyNationalities = self::getDirtyNationalities($nationalities, $existingEntity['nationalities'] ?? []);
                $entity->setNationalities($dirtyNationalities);
                $dirtyDateOfBirths = self::getDirtyDateOfBirths($dateOfBirths, $existingEntity['date_of_births'] ?? []);
                $entity->setDateOfBirths($dirtyDateOfBirths);
                $existingEntityIndex = self::getEntityIndexForPublisherReference($entities, $entity);
                if ($existingEntityIndex >= 0) {
                    self::amendEntity($existingEntityIndex, $entities, $entity);
                    $entity = $entities[$existingEntityIndex];
                }
                $entity->setNew(is_null($existingEntity));
                self::updateEntity($entity, $existingEntity);
                if ($entity->isDirty()) {
                    if ($existingEntityIndex >= 0) {
                        $entities[$existingEntityIndex] = $entity;
                    } else {
                        $entities[] = $entity;
                    }
                }
            }
        }
        $vendorSanctionList->setEntities($entities);

        return $vendorSanctionList;
    }
}
