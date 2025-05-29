<?php

declare(strict_types=1);

namespace App\Services\SanctionList\Model;

use App\Enum\SanctionEntityType;
use Illuminate\Support\Carbon;

final class Entity extends Model
{
    private SanctionEntityType $entityType;

    private string $publisherReference;

    private ?string $remark = null;

    private ?Carbon $publisherListedOn = null;

    private ?Carbon $publisherDeListedOn = null;

    /**
     * @var \App\Services\SanctionList\Model\Name[]
     */
    private array $names = [];

    /**
     * @var \App\Services\SanctionList\Model\DateOfBirth[]
     */
    private array $dateOfBirths = [];

    /**
     * @var \App\Services\SanctionList\Model\Nationality[]
     */
    private array $nationalities = [];

    public function getEntityType(): SanctionEntityType
    {
        return $this->entityType;
    }

    public function setEntityType(SanctionEntityType $entityType): void
    {
        $this->entityType = $entityType;
    }

    public function getPublisherReference(): string
    {
        return $this->publisherReference;
    }

    public function setPublisherReference(string $publisherReference): void
    {
        $this->publisherReference = $publisherReference;
    }

    public function getRemark(): ?string
    {
        return $this->remark;
    }

    public function setRemark(?string $remark): void
    {
        $this->remark = $remark;
    }

    public function getPublisherListedOn(): ?Carbon
    {
        return $this->publisherListedOn;
    }

    public function setPublisherListedOn(?Carbon $publisherListedOn): void
    {
        $this->publisherListedOn = $publisherListedOn;
    }

    public function getPublisherDeListedOn(): ?Carbon
    {
        return $this->publisherDeListedOn;
    }

    public function setPublisherDeListedOn(?Carbon $publisherDeListedOn): void
    {
        $this->publisherDeListedOn = $publisherDeListedOn;
    }

    public function getNames(): array
    {
        return $this->names;
    }

    /**
     * @param  \App\Services\SanctionList\Model\Name[]  $names
     */
    public function setNames(array $names): void
    {
        $this->names = $names;
    }

    /**
     * @return \App\Services\SanctionList\Model\DateOfBirth[]
     */
    public function getDateOfBirths(): array
    {
        return $this->dateOfBirths;
    }

    /**
     * @param  \App\Services\SanctionList\Model\DateOfBirth[]  $dateOfBirths
     */
    public function setDateOfBirths(array $dateOfBirths): void
    {
        $this->dateOfBirths = $dateOfBirths;
    }

    /**
     * @return \App\Services\SanctionList\Model\Nationality[]
     */
    public function getNationalities(): array
    {
        return $this->nationalities;
    }

    /**
     * @param  \App\Services\SanctionList\Model\Nationality[]  $nationalities
     */
    public function setNationalities(array $nationalities): void
    {
        $this->nationalities = $nationalities;
    }

    public function getIntegrityHash(): string
    {
        return sha1(implode('', array_filter([
            $this->publisherReference,
            $this->entityType->value,
        ])));
    }

    public function toArray(): array
    {
        $names = [];
        foreach ($this->getNames() as $name) {
            $names[] = $name->toArray();
        }
        $dateOfBirths = [];
        foreach ($this->getDateOfBirths() as $dateOfBirth) {
            $dateOfBirths[] = $dateOfBirth->toArray();
        }
        $nationalities = [];
        foreach ($this->getNationalities() as $nationality) {
            $nationalities[] = $nationality->toArray();
        }
        $entity = [
            'entity_type' => $this->getEntityType()->value,
            'publisher_reference' => $this->getPublisherReference(),
            'remark' => $this->getRemark(),
            'integrity_hash' => $this->getIntegrityHash(),
            'publisher_listed_on' => $this->getPublisherListedOn(),
            'publisher_de_listed_on' => $this->getPublisherDeListedOn(),
            'names' => $names,
            'date_of_births' => $dateOfBirths,
            'nationalities' => $nationalities,
        ];
        if ($this->getId()) {
            $entity['id'] = $this->getId();
        }

        return $entity;
    }
}
