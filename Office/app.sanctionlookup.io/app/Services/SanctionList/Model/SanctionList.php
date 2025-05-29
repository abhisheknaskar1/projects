<?php

declare(strict_types=1);

namespace App\Services\SanctionList\Model;

use Illuminate\Support\Carbon;

final class SanctionList extends Model
{
    private ?Carbon $publisherLastUpdatedAt;

    /**
     * @var \App\Services\SanctionList\Model\Entity[]
     */
    private array $entities = [];

    public function __construct(?Carbon $publisherLastUpdatedAt = null)
    {
        $this->publisherLastUpdatedAt = $publisherLastUpdatedAt;
    }

    public function setPublisherLastUpdatedAt(?Carbon $publisherLastUpdatedAt): void
    {
        $this->publisherLastUpdatedAt = $publisherLastUpdatedAt;
    }

    public function getPublisherLastUpdatedAt(): ?Carbon
    {
        return $this->publisherLastUpdatedAt;
    }

    /**
     * @return \App\Services\SanctionList\Model\Entity[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }

    /**
     * @param  \App\Services\SanctionList\Model\Entity[]  $entities
     */
    public function setEntities(array $entities): void
    {
        $this->entities = $entities;
    }

    public function getIntegrityHash(): string
    {
        return sha1($this->getPublisherLastUpdatedAt()?->format('c'));
    }

    public function toArray(): array
    {
        $entities = [];
        foreach ($this->getEntities() as $entity) {
            $entities[] = $entity->toArray();
        }

        return [
            'publisher_last_updated_at' => $this->getPublisherLastUpdatedAt()?->format('c'),
            'entities' => $entities,
        ];
    }
}
