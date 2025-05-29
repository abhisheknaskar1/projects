<?php

declare(strict_types=1);

namespace App\Services\SanctionList\Model;

abstract class Model
{
    private bool $dirty = false;

    private bool $new = true;

    private ?string $id = null;

    public function setDirty(?bool $dirty = true): void
    {
        $this->dirty = $dirty;
    }

    public function isDirty(): bool
    {
        return $this->dirty;
    }

    public function setNew(?bool $new = true): void
    {
        $this->new = $new;
    }

    public function isNew(): bool
    {
        return $this->new;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    abstract public function getIntegrityHash(): string;

    abstract public function toArray(): array;
}
