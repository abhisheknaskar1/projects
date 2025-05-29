<?php

declare(strict_types=1);

namespace Tests\Unit\Services\SanctionList\Model;

use App\Services\SanctionList\Model\DateOfBirth;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DateOfBirth::class)]
class DateOfBirthTest extends TestCase
{
    public function test_get_set_publisher_reference(): void
    {
        $model = new DateOfBirth;
        $model->setPublisherReference('pr-1');
        $this->assertSame('pr-1', $model->getPublisherReference());
    }

    public function test_get_set_date_of_birth(): void
    {
        $model = new DateOfBirth;
        $model->setDateOfBirth('Nov 04, 1989');
        $this->assertSame('Nov 04, 1989', $model->getDateOfBirth());
    }

    public function test_get_set_publisher_listed_on(): void
    {
        $model = new DateOfBirth;
        $now = Carbon::now();
        $model->setPublisherListedOn($now);
        $this->assertEquals($now, $model->getPublisherListedOn());
    }

    public function test_get_set_publisher_de_listed_on(): void
    {
        $model = new DateOfBirth;
        $now = Carbon::now();
        $model->setPublisherDeListedOn($now);
        $this->assertEquals($now, $model->getPublisherDeListedOn());
    }

    public function test_get_integrity_hash(): void
    {
        $model = new DateOfBirth;
        $model->setPublisherReference('pr-1');
        $model->setDateOfBirth('Nov 04, 1989');
        $this->assertEquals(sha1('pr-1Nov 04, 1989'), $model->getIntegrityHash());
    }

    public function test_to_array(): void
    {
        $model = new DateOfBirth;
        $model->setId('id-1');
        $model->setPublisherReference('pr-1');
        $model->setDateOfBirth('Nov 04, 1989');
        $this->assertEquals([
            'publisher_reference' => 'pr-1',
            'raw_value' => 'Nov 04, 1989',
            'publisher_listed_on' => null,
            'publisher_de_listed_on' => null,
            'id' => 'id-1',
        ], $model->toArray());
    }
}
