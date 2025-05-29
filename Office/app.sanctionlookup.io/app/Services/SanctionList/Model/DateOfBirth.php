<?php

declare(strict_types=1);

namespace App\Services\SanctionList\Model;

use Illuminate\Support\Carbon;

final class DateOfBirth extends Model
{
    private string $publisherReference;

    private string $dateOfBirth;

    private ?Carbon $publisherListedOn = null;

    private ?Carbon $publisherDeListedOn = null;

    public function getPublisherReference(): string
    {
        return $this->publisherReference;
    }

    public function setPublisherReference(string $publisherReference): void
    {
        $this->publisherReference = $publisherReference;
    }

    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(string $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
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
            $this->dateOfBirth,
        ])));
    }

    public function toArray(): array
    {
        $dateOfBirth = [
            'publisher_reference' => $this->getPublisherReference(),
            'raw_value' => $this->getDateOfBirth(),
            'publisher_listed_on' => $this->getPublisherListedOn(),
            'publisher_de_listed_on' => $this->getPublisherDeListedOn(),
        ];

        if ($this->getId()) {
            $dateOfBirth['id'] = $this->getId();
        }

        return $dateOfBirth;
    }
}
