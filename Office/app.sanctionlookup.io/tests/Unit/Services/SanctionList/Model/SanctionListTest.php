<?php

declare(strict_types=1);

namespace Tests\Unit\Services\SanctionList\Model;

use App\Enum\SanctionEntityType;
use App\Services\SanctionList\Model\Entity;
use App\Services\SanctionList\Model\SanctionList;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SanctionList::class)]
class SanctionListTest extends TestCase
{
    /**
     * @return \App\Services\SanctionList\Model\Entity[]
     */
    protected function fakeEntities(): array
    {
        $entities = [];
        $entity = new Entity;
        $entity->setId('id-1');
        $entity->setPublisherReference('pr-1');
        $entity->setEntityType(SanctionEntityType::ENTITY);
        $entities[] = $entity;
        $entity = new Entity;
        $entity->setId('id-2');
        $entity->setPublisherReference('pr-2');
        $entity->setEntityType(SanctionEntityType::INDIVIDUAL);
        $entities[] = $entity;

        return $entities;
    }

    public function test_get_set_publisher_last_updated_at(): void
    {
        $object = new SanctionList;
        $now = Carbon::now();
        $object->setPublisherLastUpdatedAt($now);
        $this->assertEquals($now, $object->getPublisherLastUpdatedAt());
    }

    public function test_get_set_entities(): void
    {
        $object = new SanctionList;
        $entities = $this->fakeEntities();
        $object->setEntities($entities);
        $this->assertEquals($entities, $object->getEntities());
    }

    public function test_get_integrity_hash(): void
    {
        $object = new SanctionList;
        $now = Carbon::now();
        $object->setPublisherLastUpdatedAt($now);
        $this->assertEquals(sha1($now->format('c')), $object->getIntegrityHash());
    }

    public function test_to_array(): void
    {
        $object = new SanctionList;
        $now = Carbon::now();
        $object->setPublisherLastUpdatedAt($now);
        $entities = $this->fakeEntities();
        $object->setEntities($entities);
        $result = $object->toArray();
        $this->assertArrayHasKey('publisher_last_updated_at', $result);
        $this->assertArrayHasKey('entities', $result);
        $this->assertEquals($now->format('c'), $result['publisher_last_updated_at']);
        $entityArray = array_map(fn (Entity $entity) => $entity->toArray(), $entities);
        $this->assertEquals($entityArray, $result['entities']);
    }
}
