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
use App\Services\SanctionList\Model\SanctionList as VendorSanctionList;
use Illuminate\Support\Arr;
use SimpleXMLElement;
use XMLReader;

class Csema extends AbstractXmlTransformerAdapter
{
    protected static function getEntityReference(SimpleXMLElement $object, SanctionEntityType $entityType): string
    {
        return sha1(implode('|', [
            trim($object->{'Country'}->__toString()),
            $entityType->value,
            trim($object->{'Schedule'}->__toString()),
            trim($object->{'Item'}->__toString()),
        ]));
    }

    protected static function getNameReference(Name $alias, string $entityReference): string
    {
        return sha1(implode('|', [
            $entityReference,
            $alias->getName(),
            $alias->getAliasStrength(),
        ]));
    }

    protected static function getDateOfBirthReference(DateOfBirth $dateOfBirth, string $entityReference): string
    {
        return sha1(implode('|', [
            $entityReference,
            $dateOfBirth->getDateOfBirth(),
        ]));
    }

    /**
     * @return \App\Services\SanctionList\Model\Name[]
     */
    protected static function getEntityAliases(SimpleXMLElement $object, string $entityReference): array
    {
        $names = [];
        $aka = $object->{'Aliases'}->__toString();
        if ($aka) {
            $akaList = array_filter(array_map('trim', str_getcsv($aka, ';')));
            foreach ($akaList as $akaItem) {
                $name = new Name;
                $name->setDirty();
                $name->setNameType(NameType::ALIAS);
                $name->setName($akaItem);
                $name->setPublisherReference(self::getNameReference($name, $entityReference));
                $names[] = $name;
            }
        }

        return $names;
    }

    /**
     * @return \App\Services\SanctionList\Model\DateOfBirth[]
     */
    protected static function getDateOfBirths(SimpleXMLElement $object, string $entityReference): array
    {
        $dob = trim($object->{'DateOfBirth'}->__toString());
        $dateOfBirths = [];
        if ($dob) {
            $dateOfBirth = new DateOfBirth;
            $dateOfBirth->setDateOfBirth($dob);
            $dateOfBirth->setPublisherReference(self::getDateOfBirthReference($dateOfBirth, $entityReference));
            $dateOfBirths[] = $dateOfBirth;
        }

        return $dateOfBirths;
    }

    public static function transform(SanctionList $sanctionList, XMLReader $reader): VendorSanctionList
    {
        $vendorSanctionList = new VendorSanctionList;
        $existingEntities = self::getExistingEntities($sanctionList);
        $entities = [];
        while ($reader->read()) {
            if ($reader->nodeType === XMLReader::ELEMENT && $reader->name === 'record') {
                $entity = new Entity;
                $object = simplexml_load_string($reader->readOuterXml());
                $individualName = implode(' ', array_filter([
                    trim($object->{'GivenName'}->__toString()),
                    trim($object->{'LastName'}->__toString()),
                ]));
                $entityName = trim($object->{'Entity'}->__toString());
                $entityType = null;
                if ($individualName) {
                    $entityType = SanctionEntityType::INDIVIDUAL;
                } elseif ($entityName) {
                    $entityType = SanctionEntityType::ENTITY;
                }
                $entity->setDirty();
                $entity->setEntityType($entityType);
                $entity->setPublisherReference(self::getEntityReference($object, $entityType));
                $name = new Name;
                $name->setName($individualName ?: $entityName);
                $name->setNameType(NameType::PRIMARY);
                $name->setPublisherReference(self::getNameReference($name, $entity->getPublisherReference()));
                $names = array_merge([$name], self::getEntityAliases($object, $entity->getPublisherReference()));
                /** @var array|null $existingEntity */
                $existingEntity = Arr::first(
                    $existingEntities,
                    fn (array $value, int $key) => $value['publisher_reference'] === $entity->getPublisherReference()
                );
                $dirtyNames = self::getDirtyNames($names, $existingEntity['names'] ?? []);
                $entity->setNames($dirtyNames);
                $dateOfBirths = self::getDateOfBirths($object, $entity->getPublisherReference());
                $dirtyDateOfBirths = self::getDirtyDateOfBirths($dateOfBirths, $existingEntity['date_of_births'] ?? []);
                $entity->setDateOfBirths($dirtyDateOfBirths);
                $entity->setNew(is_null($existingEntity));
                self::updateEntity($entity, $existingEntity);
                if ($entity->isDirty()) {
                    $entities[] = $entity;
                }
            }
        }
        $vendorSanctionList->setEntities($entities);

        return $vendorSanctionList;
    }
}
