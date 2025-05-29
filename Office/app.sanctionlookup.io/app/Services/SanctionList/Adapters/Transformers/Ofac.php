<?php

declare(strict_types=1);

namespace App\Services\SanctionList\Adapters\Transformers;

use App\Enum\AliasStrength;
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

class Ofac extends AbstractXmlTransformerAdapter
{
    /**
     * @return \App\Services\SanctionList\Model\Name[]
     */
    protected static function getEntityAliases(SimpleXMLElement $object): array
    {
        $entityAliases = [];
        $aliasList = json_decode(json_encode($object->{'akaList'}), true);
        if (isset($aliasList['aka']) && is_array($aliasList['aka'])) {
            if (count(array_filter(array_keys($aliasList['aka']), 'is_string')) > 0) {
                $aliasList['aka'] = [$aliasList['aka']];
            }
            foreach ($aliasList['aka'] as $aka) {
                $name = new Name;
                $name->setDirty();
                $publisherReference = $aka['uid'];
                $name->setPublisherReference($publisherReference);
                $name->setNameType(NameType::ALIAS);
                $strength = match ($aka['category']) {
                    'weak' => AliasStrength::WEAK,
                    'good' => AliasStrength::GOOD,
                    'strong' => AliasStrength::STRONG,
                };
                $name->setAliasStrength($strength);
                $alias = implode(' ', array_filter([
                    trim($aka['firstName'] ?? ''),
                    trim($aka['lastName']),
                ]));
                $name->setName($alias);
                $entityAliases[] = $name;
            }
        }

        return $entityAliases;
    }

    /**
     * @return \App\Services\SanctionList\Model\DateOfBirth[]
     */
    protected static function getDateOfBirths(SimpleXMLElement $object): array
    {
        $dateOfBirths = [];
        $dobList = json_decode(json_encode($object->{'dateOfBirthList'}), true);
        if (isset($dobList['dateOfBirthItem']) && is_array($dobList['dateOfBirthItem'])) {
            if (count(array_filter(array_keys($dobList['dateOfBirthItem']), 'is_string')) > 0) {
                $dobList['dateOfBirthItem'] = [$dobList['dateOfBirthItem']];
            }
            foreach ($dobList['dateOfBirthItem'] as $dob) {
                $publisherReference = $dob['uid'];
                $rawValue = trim($dob['dateOfBirth']);
                $dateOfBirth = new DateOfBirth;
                $dateOfBirth->setDateOfBirth($rawValue);
                $dateOfBirth->setPublisherReference($publisherReference);
                $dateOfBirth->setDirty();
                $dateOfBirths[] = $dateOfBirth;
            }
        }

        return $dateOfBirths;
    }

    /**
     * @return \App\Services\SanctionList\Model\Nationality[]
     */
    protected static function getNationalities(SimpleXMLElement $object): array
    {
        $nationalities = [];
        $nationalityList = json_decode(json_encode($object->{'nationalityList'}), true);
        if (isset($nationalityList['nationality']) && is_array($nationalityList['nationality'])) {
            if (count(array_filter(array_keys($nationalityList['nationality']), 'is_string')) > 0) {
                $nationalityList['nationality'] = [$nationalityList['nationality']];
            }
            foreach ($nationalityList['nationality'] as $nationalityItem) {
                $publisherReference = $nationalityItem['uid'];
                $rawValue = trim($nationalityItem['country']);
                $nationality = new Nationality;
                $nationality->setDirty();
                $nationality->setPublisherReference($publisherReference);
                $nationality->setNationality($rawValue);
                $nationalities[] = $nationality;
            }
        }

        return $nationalities;
    }

    public static function transform(SanctionList $sanctionList, XMLReader $reader): VendorSanctionList
    {
        $vendorSanctionList = new VendorSanctionList;
        $existingEntities = self::getExistingEntities($sanctionList);
        $entities = [];
        while ($reader->read()) {
            if ($reader->nodeType === XMLReader::ELEMENT) {
                if ($reader->name === 'publshInformation') {
                    $object = simplexml_load_string($reader->readOuterXml());
                    $publishedOn = Carbon::createFromFormat('m/d/Y', $object->{'Publish_Date'}->__toString())->setHour(0)->setMinute(0)->setSecond(0);
                    $vendorSanctionList->setPublisherLastUpdatedAt($publishedOn);
                } elseif ($reader->name === 'sdnEntry') {
                    $entity = new Entity;
                    $entity->setDirty();
                    $object = simplexml_load_string($reader->readOuterXml());
                    $entityType = match ($object->{'sdnType'}->__toString()) {
                        'Individual' => SanctionEntityType::INDIVIDUAL,
                        'Entity' => SanctionEntityType::ENTITY,
                        'Vessel' => SanctionEntityType::VESSEL,
                        'Aircraft' => SanctionEntityType::AIRCRAFT,
                    };
                    $publisherReference = $object->{'uid'}->__toString();
                    $entity->setPublisherReference($publisherReference);
                    $entity->setEntityType($entityType);
                    $entityName = implode(' ', array_filter([
                        trim($object->{'firstName'}->__toString()),
                        trim($object->{'lastName'}->__toString()),
                    ]));
                    $name = new Name;
                    $name->setName($entityName);
                    $name->setNameType(NameType::PRIMARY);
                    $name->setPublisherReference($publisherReference);
                    $names = array_merge([$name], self::getEntityAliases($object));
                    /** @var array|null $existingEntity */
                    $existingEntity = Arr::first(
                        $existingEntities,
                        fn (array $value, int $key) => $value['publisher_reference'] === $publisherReference
                    );
                    $dirtyNames = self::getDirtyNames($names, $existingEntity['names'] ?? []);
                    $entity->setNames($dirtyNames);
                    $dateOfBirths = self::getDateOfBirths($object);
                    $dirtyDateOfBirths = self::getDirtyDateOfBirths($dateOfBirths);
                    $entity->setDateOfBirths($dirtyDateOfBirths);
                    $nationalities = self::getNationalities($object);
                    $dirtyNationalities = self::getDirtyNationalities($nationalities);
                    $entity->setNationalities($dirtyNationalities);
                    $entity->setNew(is_null($existingEntity));
                    self::updateEntity($entity, $existingEntity);
                    if ($entity->isDirty()) {
                        $entities[] = $entity;
                    }
                }
            }
        }
        $vendorSanctionList->setEntities($entities);

        return $vendorSanctionList;
    }
}
