<?php

declare(strict_types=1);

namespace Tests\Unit\Services\SanctionList\Model;

use App\Enum\AliasStrength;
use App\Enum\NameType;
use App\Enum\SanctionEntityType;
use App\Services\SanctionList\Model\DateOfBirth;
use App\Services\SanctionList\Model\Entity;
use App\Services\SanctionList\Model\Name;
use App\Services\SanctionList\Model\Nationality;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Entity::class)]
class EntityTest extends TestCase
{
    public function test_get_set_publisher_reference(): void
    {
        $model = new Entity;
        $model->setPublisherReference('pr-1');
        $this->assertSame('pr-1', $model->getPublisherReference());
    }

    public function test_get_set_remark(): void
    {
        $model = new Entity;
        $model->setRemark('Foo Bar');
        $this->assertSame('Foo Bar', $model->getRemark());
    }

    public function test_get_set_entity_type(): void
    {
        $model = new Entity;
        $model->setEntityType(SanctionEntityType::ENTITY);
        $this->assertEquals(SanctionEntityType::ENTITY, $model->getEntityType());
    }

    public function test_get_set_publisher_listed_on(): void
    {
        $model = new Entity;
        $now = Carbon::now();
        $model->setPublisherListedOn($now);
        $this->assertEquals($now, $model->getPublisherListedOn());
    }

    public function test_get_set_publisher_de_listed_on(): void
    {
        $model = new Entity;
        $now = Carbon::now();
        $model->setPublisherDeListedOn($now);
        $this->assertEquals($now, $model->getPublisherDeListedOn());
    }

    public function test_get_set_date_of_births(): void
    {
        $dob = new DateOfBirth;
        $dob->setId('dob-id-1');
        $dob->setPublisherReference('dob-pr-1');
        $dob->setDateOfBirth('Nov 04, 1989');
        $model = new Entity;
        $model->setDateOfBirths([$dob]);
        $this->assertEquals([$dob], $model->getDateOfBirths());
    }

    public function test_get_set_nationalities(): void
    {
        $nationality = new Nationality;
        $nationality->setId('nat-id-1');
        $nationality->setPublisherReference('nat-pr-1');
        $nationality->setNationality('Alien');
        $model = new Entity;
        $model->setNationalities([$nationality]);
        $this->assertEquals([$nationality], $model->getNationalities());
    }

    public function test_get_set_names(): void
    {
        $name = new Name;
        $name->setId('name-id-1');
        $name->setPublisherReference('name-pr-1');
        $name->setNameType(NameType::PRIMARY);
        $name->setName('John Doe');
        $name->setAliasStrength(AliasStrength::STRONG);
        $model = new Entity;
        $model->setNames([$name]);
        $this->assertEquals([$name], $model->getNames());
    }

    public function test_get_integrity_hash(): void
    {
        $model = new Entity;
        $model->setPublisherReference('pr-1');
        $model->setEntityType(SanctionEntityType::ENTITY);
        $this->assertEquals(sha1('pr-1'.$model->getEntityType()->value), $model->getIntegrityHash());
    }

    public function test_to_array(): void
    {
        $model = new Entity;
        $model->setId('entity-id-1');
        $model->setPublisherReference('entity-pr-1');
        $model->setRemark('Foo Bar');
        $model->setEntityType(SanctionEntityType::ENTITY);
        $nationality = new Nationality;
        $nationality->setId('nat-id-1');
        $nationality->setPublisherReference('nat-pr-1');
        $nationality->setNationality('Alien');
        $dob = new DateOfBirth;
        $dob->setId('dob-id-1');
        $dob->setPublisherReference('dob-pr-1');
        $dob->setDateOfBirth('Nov 04, 1989');
        $name = new Name;
        $name->setId('name-id-1');
        $name->setPublisherReference('name-pr-1');
        $name->setNameType(NameType::PRIMARY);
        $name->setName('John Doe');
        $name->setAliasStrength(AliasStrength::STRONG);
        $model->setNames([$name]);
        $model->setDateOfBirths([$dob]);
        $model->setNationalities([$nationality]);
        $result = $model->toArray();
        $this->assertIsArray($result);
    }
}
