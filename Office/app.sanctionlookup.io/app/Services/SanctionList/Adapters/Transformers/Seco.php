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
use App\Services\SanctionList\Model\SanctionList as VendorSanctionList;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use SimpleXMLElement;
use XMLReader;

class Seco extends AbstractXmlTransformerAdapter
{
    protected static function getAliasReference(Name $name, string $publisherReference): string
    {
        return sha1(implode('|', [
            $publisherReference,
            $name->getName(),
        ]));
    }

    protected static function getEntity(SimpleXMLElement $element): SimpleXMLElement
    {
        $individual = $element->{'individual'};
        $entity = $element->{'entity'};
        $object = $element->{'object'};

        return $individual ?: $entity ?: $object;
    }

    protected static function getEntityType(SimpleXMLElement $element): SanctionEntityType
    {
        $entity = $element->{'entity'};
        $object = $element->{'object'};

        $entityType = SanctionEntityType::INDIVIDUAL;
        if ($entity) {
            $entityType = SanctionEntityType::ENTITY;
        } elseif ($object) {
            $objectType = trim($object->attributes()->{'object-type'}->__toString());
            $entityType = match ($objectType) {
                'vessel' => SanctionEntityType::VESSEL,
            };
        }

        return $entityType;
    }

    protected static function getSpellingVariations(array $namePart): array
    {
        $spellingVariation = [];
        $nameSpellingVariation = $namePart['spelling-variant'] ?? [];
        if (is_string($nameSpellingVariation)) {
            $nameSpellingVariation = [$nameSpellingVariation];
        }
        foreach ($nameSpellingVariation as $spellingVariant) {
            $spellingVariation[$namePart['@attributes']['order']][] = trim($spellingVariant);
        }

        return $spellingVariation;
    }

    /**
     * @return \App\Services\SanctionList\Model\Name[]
     */
    protected static function getAliases(array $spellingVariation, string $publisherReference): array
    {
        $aliases = [];
        $nameVariation = [];
        foreach ($spellingVariation as $item) {
            foreach ($item as $key => $spellingVariant) {
                $nameVariation[$key][] = $spellingVariant;
            }
        }
        foreach ($nameVariation as $nameVariant) {
            $alias = new Name;
            $alias->setDirty();
            $alias->setNameType(NameType::ALIAS);
            $alias->setName(implode(' ', array_filter($nameVariant)));
            $aliasReference = self::getAliasReference($alias, $publisherReference);
            $alias->setPublisherReference($aliasReference);
            $aliasExists = Arr::first($aliases, fn (Name $name) => $name->getPublisherReference() === $aliasReference);
            if (! $aliasExists) {
                $aliases[] = $alias;
            }
        }

        return $aliases;
    }

    /**
     * @return \App\Services\SanctionList\Model\Name[]
     */
    protected static function getNames(SimpleXMLElement $identity): array
    {
        $names = [];
        $identity = json_decode(json_encode($identity), true);
        $namesInList = $identity['name'];
        if (count(array_filter(array_keys($namesInList), 'is_string'))) {
            $namesInList = [$namesInList];
        }
        foreach ($namesInList as $nameInList) {
            $name = new Name;
            $name->setDirty();
            $name->setPublisherReference($nameInList['@attributes']['ssid']);
            $strength = match (trim($nameInList['@attributes']['quality'] ?? '')) {
                'strong' => AliasStrength::STRONG,
                'good' => AliasStrength::GOOD,
                'low' => AliasStrength::WEAK,
            };
            $nameType = match (trim($nameInList['@attributes']['name-type'] ?? '')) {
                'primary-name' => NameType::PRIMARY,
                default => NameType::ALIAS
            };
            $name->setAliasStrength($strength);
            $name->setNameType($nameType);
            $nameParts = [];
            $namePartInName = $nameInList['name-part'];
            if (count(array_filter(array_keys($namePartInName), 'is_string')) > 0) {
                $namePartInName = [$namePartInName];
            }
            $spellingVariation = [];
            foreach ($namePartInName as $namePart) {
                $nameParts[$namePart['@attributes']['order']] = trim($namePart['value']);
                $spellingVariation = array_merge($spellingVariation, self::getSpellingVariations($namePart));
            }
            ksort($nameParts);
            $name->setName(implode(' ', array_filter($nameParts)));
            $names[] = $name;
            ksort($spellingVariation);
            $aliases = self::getAliases($spellingVariation, $name->getPublisherReference());
            $names = array_merge($names, $aliases);
        }

        return $names;
    }

    /**
     * @return \App\Services\SanctionList\Model\DateOfBirth[]
     */
    protected static function getDateOfBirths(SimpleXMLElement $identity): array
    {
        $dateOfBirths = [];
        $dateOfBirth = $identity->{'day-month-year'};
        if ($dateOfBirth) {
            $dob = new DateOfBirth;
            $dob->setDirty();
            $dob->setPublisherReference($dateOfBirth->attributes()->{'ssid'}->__toString());
            $dob->setDateOfBirth(implode('-', array_filter([
                $dateOfBirth->attributes()->{'year'} ? $dateOfBirth->attributes()->{'year'}->__toString() : null,
                $dateOfBirth->attributes()->{'month'} ? str_pad($dateOfBirth->attributes()->{'month'}->__toString(), 2, '0', STR_PAD_LEFT) : null,
                $dateOfBirth->attributes()->{'day'} ? str_pad($dateOfBirth->attributes()->{'day'}->__toString(), 2, '0', STR_PAD_LEFT) : null,
            ])));
            $dateOfBirths[] = $dob;
        }

        return $dateOfBirths;
    }

    protected static function getEntityRemark(SimpleXMLElement $xmlEntity): string
    {
        return implode('; ', array_filter([
            trim($xmlEntity->{'justification'}?->__toString() ?: ''),
            trim($xmlEntity->{'other-information'}?->__toString() ?: ''),
        ]));
    }

    public static function transform(SanctionList $sanctionList, XMLReader $reader): VendorSanctionList
    {
        $vendorSanctionList = new VendorSanctionList;
        $existingEntities = self::getExistingEntities($sanctionList);
        $entities = [];
        while ($reader->read()) {
            if ($reader->nodeType === XMLReader::ELEMENT) {
                if ($reader->name === 'swiss-sanctions-list') {
                    $publishedOn = Carbon::parse($reader->getAttribute('date'));
                    $vendorSanctionList->setPublisherLastUpdatedAt($publishedOn);
                } elseif ($reader->name === 'target' && $reader->depth === 1) {
                    $xmlObject = simplexml_load_string($reader->readOuterXml());
                    $xmlEntity = self::getEntity($xmlObject);
                    $entityType = self::getEntityType($xmlObject);
                    $publisherReference = implode('-', [
                        trim($xmlObject->attributes()->{'ssid'}->__toString()),
                        trim($xmlObject->{'sanctions-set-id'}->__toString()),
                        trim($xmlEntity->{'identity'}->attributes()->{'ssid'}->__toString()),
                    ]);
                    /** @var array|null $existingEntity */
                    $existingEntity = Arr::first(
                        $existingEntities,
                        fn (array $value, int $key) => $value['publisher_reference'] === $publisherReference
                    );
                    $entity = new Entity;
                    $entity->setDirty();
                    $entity->setPublisherReference($publisherReference);
                    $entity->setEntityType($entityType);
                    $entity->setRemark(self::getEntityRemark($xmlEntity));
                    $names = self::getNames($xmlEntity->{'identity'});
                    $dirtyNames = self::getDirtyNames($names);
                    $entity->setNames($dirtyNames);
                    $dateOfBirths = self::getDateOfBirths($xmlEntity->{'identity'});
                    $dirtyDateOfBirths = self::getDirtyDateOfBirths($dateOfBirths);
                    $entity->setDateOfBirths($dirtyDateOfBirths);
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
