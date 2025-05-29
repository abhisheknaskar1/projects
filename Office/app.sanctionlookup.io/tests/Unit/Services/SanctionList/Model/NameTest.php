<?php

declare(strict_types=1);

namespace Tests\Unit\Services\SanctionList\Model;

use App\Enum\AliasStrength;
use App\Enum\NameType;
use App\Services\SanctionList\Model\Name;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Name::class)]
class NameTest extends TestCase
{
    public function test_get_set_publisher_reference(): void
    {
        $model = new Name;
        $model->setPublisherReference('pr-1');
        $this->assertSame('pr-1', $model->getPublisherReference());
    }

    public function test_get_set_name_type(): void
    {
        $model = new Name;
        $model->setNameType(NameType::PRIMARY);
        $this->assertSame(NameType::PRIMARY, $model->getNameType());
    }

    public function test_get_set_name(): void
    {
        $model = new Name;
        $model->setName('John Doe');
        $this->assertSame('John Doe', $model->getName());
    }

    public function test_get_set_alias_strength(): void
    {
        $model = new Name;
        $model->setAliasStrength(AliasStrength::STRONG);
        $this->assertSame(AliasStrength::STRONG, $model->getAliasStrength());
    }

    public function test_get_set_publisher_listed_on(): void
    {
        $model = new Name;
        $now = Carbon::now();
        $model->setPublisherListedOn($now);
        $this->assertEquals($now, $model->getPublisherListedOn());
    }

    public function test_get_set_publisher_de_listed_on(): void
    {
        $model = new Name;
        $now = Carbon::now();
        $model->setPublisherDeListedOn($now);
        $this->assertEquals($now, $model->getPublisherDeListedOn());
    }

    public function test_get_integrity_hash(): void
    {
        $model = new Name;
        $model->setPublisherReference('pr-1');
        $model->setNameType(NameType::PRIMARY);
        $model->setName('John Doe');
        $model->setAliasStrength(AliasStrength::STRONG);
        $this->assertEquals(sha1(implode('', [
            'pr-1',
            NameType::PRIMARY->value,
            'John Doe',
            AliasStrength::STRONG->value,
        ])), $model->getIntegrityHash());
    }

    public function test_to_array(): void
    {
        $model = new Name;
        $model->setId('id-1');
        $model->setPublisherReference('pr-1');
        $model->setNameType(NameType::PRIMARY);
        $model->setName('John Doe');
        $model->setAliasStrength(AliasStrength::STRONG);
        $this->assertEquals([
            'publisher_reference' => 'pr-1',
            'name' => base64_encode('John Doe'),
            'name_type' => NameType::PRIMARY->value,
            'strength' => AliasStrength::STRONG->value,
            'integrity_hash' => sha1(implode('', [
                'pr-1',
                NameType::PRIMARY->value,
                'John Doe',
                AliasStrength::STRONG->value,
            ])),
            'publisher_listed_on' => null,
            'publisher_de_listed_on' => null,
            'id' => 'id-1',
        ], $model->toArray());
    }
}
