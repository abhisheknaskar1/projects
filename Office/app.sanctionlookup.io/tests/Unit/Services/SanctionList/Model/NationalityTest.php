<?php

declare(strict_types=1);

namespace Tests\Unit\Services\SanctionList\Model;

use App\Services\SanctionList\Model\Nationality;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Nationality::class)]
class NationalityTest extends TestCase
{
    public function test_get_set_publisher_reference(): void
    {
        $model = new Nationality;
        $model->setPublisherReference('pr-1');
        $this->assertSame('pr-1', $model->getPublisherReference());
    }

    public function test_get_set_nationality(): void
    {
        $model = new Nationality;
        $model->setNationality('Alien');
        $this->assertSame('Alien', $model->getNationality());
    }

    public function test_get_set_publisher_listed_on(): void
    {
        $model = new Nationality;
        $now = Carbon::now();
        $model->setPublisherListedOn($now);
        $this->assertEquals($now, $model->getPublisherListedOn());
    }

    public function test_get_set_publisher_de_listed_on(): void
    {
        $model = new Nationality;
        $now = Carbon::now();
        $model->setPublisherDeListedOn($now);
        $this->assertEquals($now, $model->getPublisherDeListedOn());
    }

    public function test_get_integrity_hash(): void
    {
        $model = new Nationality;
        $model->setPublisherReference('pr-1');
        $model->setNationality('Alien');
        $this->assertEquals(sha1('pr-1Alien'), $model->getIntegrityHash());
    }

    public function test_to_array(): void
    {
        $model = new Nationality;
        $model->setId('id-1');
        $model->setPublisherReference('pr-1');
        $model->setNationality('Alien');
        $this->assertEquals([
            'publisher_reference' => 'pr-1',
            'raw_value' => 'Alien',
            'publisher_listed_on' => null,
            'publisher_de_listed_on' => null,
            'id' => 'id-1',
        ], $model->toArray());
    }
}
