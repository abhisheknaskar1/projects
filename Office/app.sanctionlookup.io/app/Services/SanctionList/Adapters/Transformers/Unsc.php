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

class Unsc extends AbstractXmlTransformerAdapter
{
    protected static function getNameReference(Name $name, string $entityReference): string
    {
        return sha1(implode('|', [
            $entityReference,
            $name->getName(),
            $name->getAliasStrength()?->value,
        ]));
    }

    protected static function getDateOfBirthReference(DateOfBirth $dateOfBirth, string $entityReference): string
    {
        return sha1(implode('|', [
            $entityReference,
            $dateOfBirth->getDateOfBirth(),
        ]));
    }

    protected static function getNationalityReference(Nationality $nationality, string $entityReference): string
    {
        return sha1(implode('|', [
            $entityReference,
            $nationality->getNationality(),
        ]));
    }

    /**
     * @return \App\Services\SanctionList\Model\Name[]
     */
    protected static function getAliases(SimpleXMLElement $object, string $publisherReference): array
    {
        $aliases = [];
        $entity = json_decode(json_encode($object), true);
        $aliasesInList = $entity['INDIVIDUAL_ALIAS'] ?? [];
        if (count(array_filter(array_keys($aliasesInList), 'is_string')) > 0) {
            $aliasesInList = [$aliasesInList];
        }
        foreach ($aliasesInList as $aliasInList) {
            if (empty($aliasInList['ALIAS_NAME'])) {
                continue;
            }
            $alias = new Name;
            $alias->setName(trim($aliasInList['ALIAS_NAME']));
            $alias->setNameType(NameType::ALIAS);
            $strength = match (trim(mb_strtolower($aliasInList['QUALITY']))) {
                'good' => AliasStrength::GOOD,
                'low' => AliasStrength::WEAK,
            };
            $alias->setAliasStrength($strength);
            $alias->setPublisherReference(self::getNameReference($alias, $publisherReference));
            if (self::isUniqueName($aliases, $alias)) {
                $aliases[] = $alias;
            }
        }

        return $aliases;
    }

    protected static function getNames(SimpleXMLElement $object, string $publisherReference): array
    {
        $names = [];
        $name = new Name;
        $primaryName = implode(' ', array_filter([
            $object->{'FIRST_NAME'}->__toString(),
            $object->{'SECOND_NAME'}->__toString(),
            $object->{'THIRD_NAME'}->__toString(),
        ]));
        $name->setPublisherReference($publisherReference);
        $name->setNameType(NameType::PRIMARY);
        $name->setName($primaryName);
        $names = array_merge($names, [$name]);
        $nameOriginalScript = trim($object->{'NAME_ORIGINAL_SCRIPT'}->__toString());
        if ($nameOriginalScript) {
            $nameNonLatin = new Name;
            $nameNonLatin->setPublisherReference($publisherReference);
            $nameNonLatin->setNameType(NameType::ALIAS);
            $nameNonLatin->setName($nameOriginalScript);
            $names = array_merge($names, [$nameNonLatin]);
        }
        $aliases = self::getAliases($object, $publisherReference);

        return array_merge($names, $aliases);
    }

    /**
     * @param  \App\Services\SanctionList\Model\Name[]  $names
     */
    protected static function isUniqueName(array $names, Name $name): bool
    {
        $nameExist = Arr::first($names, function (Name $existingName) use ($name) {
            return $existingName->getName() === $name->getName() && $existingName->getNameType() === $name->getNameType();
        });

        return is_null($nameExist);
    }

    /**
     * @return \App\Services\SanctionList\Model\DateOfBirth[]
     */
    protected static function getDateOfBirths(SimpleXMLElement $object, string $publisherReference): array
    {
        $dateOfBirths = [];
        $entity = json_decode(json_encode($object), true);
        $dateOfBirthsInList = $entity['INDIVIDUAL_DATE_OF_BIRTH'] ?? [];
        if (count(array_filter(array_keys($dateOfBirthsInList), 'is_string')) > 0) {
            $dateOfBirthsInList = [$dateOfBirthsInList];
        }
        foreach ($dateOfBirthsInList as $dateOfBirthInList) {
            $dateOfBirth = new DateOfBirth;
            $dob = implode(' ', array_filter($dateOfBirthInList));
            $dateOfBirth->setDateOfBirth($dob);
            $dateOfBirth->setPublisherReference(self::getDateOfBirthReference($dateOfBirth, $publisherReference));

            $dateOfBirths[] = $dateOfBirth;
        }

        return $dateOfBirths;
    }

    /**
     * @return \App\Services\SanctionList\Model\Nationality[]
     */
    protected static function getNationalities(SimpleXMLElement $object, string $publisherReference): array
    {
        $nationalities = [];
        $entity = json_decode(json_encode($object), true);
        $nationalitiesInList = $entity['NATIONALITY']['VALUE'] ?? [];
        if (is_string($nationalitiesInList)) {
            $nationalitiesInList = [$nationalitiesInList];
        }
        foreach ($nationalitiesInList as $nationalityInList) {
            if (empty($nationalityInList)) {
                continue;
            }
            $nationality = new Nationality;
            $nationality->setNationality(trim($nationalityInList));
            $nationality->setPublisherReference(self::getNationalityReference($nationality, $publisherReference));
            $nationalities[] = $nationality;
        }

        return $nationalities;
    }

    protected static function handleEntityType(Entity $entity, string $elementName, SimpleXMLElement $object, string $publisherReference, array $existingEntity = []): void
    {
        if ($elementName === 'INDIVIDUAL') {
            $entity->setEntityType(SanctionEntityType::INDIVIDUAL);
            $dateOfBirths = self::getDateOfBirths($object, $publisherReference);
            $dirtyDateOfBirths = self::getDirtyDateOfBirths($dateOfBirths, $existingEntity['date_of_births'] ?? []);
            $entity->setDateOfBirths($dirtyDateOfBirths);
            $nationalities = self::getNationalities($object, $publisherReference);
            $dirtyNationalities = self::getDirtyNationalities($nationalities, $existingEntity['nationalities'] ?? []);
            $entity->setNationalities($dirtyNationalities);
        } else {
            $entity->setEntityType(SanctionEntityType::ENTITY);
        }
    }

    public static function transform(SanctionList $sanctionList, XMLReader $reader): VendorSanctionList
    {
        $vendorSanctionList = new VendorSanctionList;
        $existingEntities = self::getExistingEntities($sanctionList);
        $entities = [];
        while ($reader->read()) {
            if ($reader->nodeType === XMLReader::ELEMENT) {
                if ($reader->name === 'CONSOLIDATED_LIST') {
                    $publishedOn = Carbon::parse($reader->getAttribute('dateGenerated'));
                    $vendorSanctionList->setPublisherLastUpdatedAt($publishedOn);
                } elseif ($reader->name === 'INDIVIDUAL' || $reader->name === 'ENTITY') {
                    $entity = new Entity;
                    $object = simplexml_load_string($reader->readOuterXml());
                    $publisherReference = $object->{'DATAID'}->__toString();
                    $entity->setDirty();
                    $listedOn = Carbon::parse($object->{'LISTED_ON'}->__toString());
                    $entity->setPublisherListedOn($listedOn);
                    $entity->setPublisherReference($publisherReference);
                    $entity->setRemark($object->{'COMMENTS1'}->__toString());
                    /** @var array|null $existingEntity */
                    $existingEntity = Arr::first(
                        $existingEntities,
                        fn (array $value, int $key) => $value['publisher_reference'] === $publisherReference
                    );
                    $names = self::getNames($object, $publisherReference);
                    $dirtyNames = self::getDirtyNames($names, $existingEntity['names'] ?? []);
                    $entity->setNames($dirtyNames);
                    self::handleEntityType($entity, $reader->name, $object, $publisherReference);
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
