<?php

declare(strict_types=1);

namespace App\Services\SanctionList\Model;

use App\Enum\AliasStrength;
use App\Enum\NameType;
use Illuminate\Support\Carbon;

final class Name extends Model
{
    private NameType $nameType;

    private string $publisherReference;

    private string $name;

    private ?AliasStrength $aliasStrength = null;

    private ?Carbon $publisherListedOn = null;

    private ?Carbon $publisherDeListedOn = null;

    public function getNameType(): NameType
    {
        return $this->nameType;
    }

    public function setNameType(NameType $nameType): void
    {
        $this->nameType = $nameType;
    }

    public function getPublisherReference(): string
    {
        return $this->publisherReference;
    }

    public function setPublisherReference(string $publisherReference): void
    {
        $this->publisherReference = $publisherReference;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAliasStrength(): ?AliasStrength
    {
        return $this->aliasStrength;
    }

    public function setAliasStrength(?AliasStrength $aliasStrength): void
    {
        $this->aliasStrength = $aliasStrength;
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

    public function getIntegrityHash(): string
    {
        return sha1(implode('', array_filter([
            $this->publisherReference,
            $this->nameType->value,
            $this->name,
            $this->aliasStrength?->value,
        ])));
    }

    public function toArray(): array
    {
        $name = [
            'publisher_reference' => $this->getPublisherReference(),
            'name' => base64_encode($this->getName()),
            'name_type' => $this->getNameType()->value,
            'strength' => $this->getAliasStrength()?->value,
            'integrity_hash' => $this->getIntegrityHash(),
            'publisher_listed_on' => $this->getPublisherListedOn(),
            'publisher_de_listed_on' => $this->getPublisherDeListedOn(),
        ];

        if ($this->getId()) {
            $name['id'] = $this->getId();
        }

        return $name;
    }
}
