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

class UkSanctionList extends AbstractXmlTransformerAdapter
{
    protected static function getNameReference(Name $name, string $entityReference): string
    {
        return sha1(implode('|', [
            $entityReference,
            $name->getName(),
            $name->getAliasStrength(),
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

    protected static function getNameAtIndex(array $name, int $index): ?string
    {
        $nameAtIndex = '';
        if (isset($name['Name'.$index])) {
            if (is_array($name['Name'.$index])) {
                $nameAtIndex = implode(' ', $name['Name'.$index]);
            } else {
                $nameAtIndex = $name['Name'.$index];
            }
        }

        return trim($nameAtIndex);
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
     * @return \App\Services\SanctionList\Model\Name[]
     */
    protected static function getEntityNames(SimpleXMLElement $namesElement, string $publisherReference): array
    {
        $names = [];
        $nameList = json_decode(json_encode($namesElement), true);
        $namesInList = $nameList['Name'];
        if (count(array_filter(array_keys($namesInList), 'is_string')) > 0) {
            $namesInList = [$namesInList];
        }
        foreach ($namesInList as $nameInList) {
            $name = new Name;
            $value = implode(' ', array_filter([
                self::getNameAtIndex($nameInList, 1),
                self::getNameAtIndex($nameInList, 2),
                self::getNameAtIndex($nameInList, 3),
                self::getNameAtIndex($nameInList, 4),
                self::getNameAtIndex($nameInList, 5),
                self::getNameAtIndex($nameInList, 6),
            ]));
            $name->setName($value);
            $nameType = match (mb_strtolower($nameInList['NameType'])) {
                'primary name' => NameType::PRIMARY,
                'alias', 'primary name variation' => NameType::ALIAS,
            };
            $name->setNameType($nameType);
            $name->setPublisherReference(self::getNameReference($name, $publisherReference));
            if (self::isUniqueName($names, $name)) {
                $names[] = $name;
            }
        }

        return $names;
    }

    /**
     * @return \App\Services\SanctionList\Model\Name[]
     */
    protected static function getNonLatinNames(SimpleXMLElement $nonLatinNamesElement, string $publisherReference): array
    {
        $names = [];
        $nonLatinNameList = json_decode(json_encode($nonLatinNamesElement), true);
        $namesInNonLatinNameList = $nonLatinNameList['NonLatinName'];
        if (count(array_filter(array_keys($namesInNonLatinNameList), 'is_string')) > 0) {
            $namesInNonLatinNameList = [$namesInNonLatinNameList];
        }
        foreach ($namesInNonLatinNameList as $nameInNonLatin) {
            if (isset($nameInNonLatin['NameNonLatinScript'])) {
                $name = new Name;
                $name->setName(trim($nameInNonLatin['NameNonLatinScript']));
                $name->setNameType(NameType::ALIAS);
                $name->setPublisherReference(self::getNameReference($name, $publisherReference));
                if (self::isUniqueName($names, $name)) {
                    $names[] = $name;
                }
            }
        }

        return $names;
    }

    /**
     * @return \App\Services\SanctionList\Model\Name[]
     */
    protected static function getNames(SimpleXMLElement $namesElement, string $publisherReference, ?SimpleXMLElement $nonLatinNamesElement = null): array
    {
        $names = [];
        $names = array_merge($names, self::getEntityNames($namesElement, $publisherReference));
        if ($nonLatinNamesElement) {
            $names = array_merge($names, self::getNonLatinNames($nonLatinNamesElement, $publisherReference));
        }

        return $names;
    }

    /**
     * @return \App\Services\SanctionList\Model\DateOfBirth[]
     */
    protected static function getDateOfBirths(SimpleXMLElement $object, string $entityReference): array
    {
        $individualDetails = json_decode(json_encode($object->{'IndividualDetails'}), true);
        $dateOfBirths = [];
        if (isset($individualDetails['Individual']['DOBs']['DOB']) && is_array($individualDetails['Individual']['DOBs']['DOB'])) {
            if (count(array_filter(array_keys($individualDetails['Individual']['DOBs']['DOB']), 'is_string')) > 0) {
                $individualDetails['Individual']['DOBs']['DOB'] = [$individualDetails['Individual']['DOBs']['DOB']];
            }
            $dobs = array_unique($individualDetails['Individual']['DOBs']['DOB']);
            foreach ($dobs as $dob) {
                $dateOfBirth = new DateOfBirth;
                $dateOfBirth->setDateOfBirth(trim($dob));
                $dateOfBirth->setPublisherReference(self::getDateOfBirthReference($dateOfBirth, $entityReference));
                $dateOfBirths[] = $dateOfBirth;
            }
        }

        return $dateOfBirths;
    }

    /**
     * @return \App\Services\SanctionList\Model\Nationality[]
     */
    protected static function getNationalities(SimpleXMLElement $object, string $publisherReference): array
    {
        $nationalities = [];
        $individualDetails = json_decode(json_encode($object->{'IndividualDetails'}), true);
        if (isset($individualDetails['Individual']['Nationalities']['Nationality'])) {
            if (is_string($individualDetails['Individual']['Nationalities']['Nationality'])) {
                $individualDetails['Individual']['Nationalities']['Nationality'] = [$individualDetails['Individual']['Nationalities']['Nationality']];
            }
            $uniqueNationalities = array_unique($individualDetails['Individual']['Nationalities']['Nationality']);
            foreach ($uniqueNationalities as $uniqueNationality) {
                $nationality = new Nationality;
                $nationality->setNationality(trim($uniqueNationality));
                $nationality->setPublisherReference(self::getNationalityReference($nationality, $publisherReference));
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
                if ($reader->name === 'DateGenerated') {
                    $publishedOn = Carbon::createFromFormat('d/m/Y', $reader->readString())->setHour(0)->setMinute(0)->setSecond(0);
                    $vendorSanctionList->setPublisherLastUpdatedAt($publishedOn);
                } elseif ($reader->name === 'Designation') {
                    $entity = new Entity;
                    $object = simplexml_load_string($reader->readOuterXml());
                    $entityType = match ($object->{'IndividualEntityShip'}->__toString()) {
                        'Individual' => SanctionEntityType::INDIVIDUAL,
                        'Entity' => SanctionEntityType::ENTITY,
                        'Ship' => SanctionEntityType::VESSEL,
                        'Aircraft' => SanctionEntityType::AIRCRAFT,
                    };
                    $entity->setDirty();
                    $entity->setEntityType($entityType);
                    $publisherReference = $object->{'UniqueID'}->__toString();
                    $entity->setPublisherReference($publisherReference);
                    /** @var array|null $existingEntity */
                    $existingEntity = Arr::first(
                        $existingEntities,
                        fn (array $value, int $key) => $value['publisher_reference'] === $publisherReference
                    );
                    $names = self::getNames($object->{'Names'}, $publisherReference, $object->{'NonLatinNames'});
                    $dirtyNames = self::getDirtyNames($names, $existingEntity['names'] ?? []);
                    $entity->setNames($dirtyNames);
                    $dateOfBirths = self::getDateOfBirths($object, $entity->getPublisherReference());
                    $dirtyDateOfBirths = self::getDirtyDateOfBirths($dateOfBirths, $existingEntity['date_of_births'] ?? []);
                    $entity->setDateOfBirths($dirtyDateOfBirths);
                    $nationalities = self::getNationalities($object, $entity->getPublisherReference());
                    $dirtyNationalities = self::getDirtyNationalities($nationalities, $existingEntity['nationalities'] ?? []);
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
