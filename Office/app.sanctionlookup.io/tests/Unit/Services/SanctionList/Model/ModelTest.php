<?php

declare(strict_types=1);

namespace Tests\Unit\Services\SanctionList\Model;

use App\Services\SanctionList\Model\Model;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Model::class)]
class ModelTest extends TestCase
{
    protected Model $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new class extends Model
        {
            public function getIntegrityHash(): string
            {
                return 'test';
            }

            public function toArray(): array
            {
                return [];
            }
        };
    }

    protected function tearDown(): void
    {
        unset($this->model);
        parent::tearDown();
    }

    public function test_get_set_dirty(): void
    {
        $this->model->setDirty();
        $this->assertTrue($this->model->isDirty());
        $this->model->setDirty(false);
        $this->assertFalse($this->model->isDirty());
    }

    public function test_get_set_new(): void
    {
        $this->model->setNew();
        $this->assertTrue($this->model->isNew());
        $this->model->setNew(false);
        $this->assertFalse($this->model->isNew());
    }

    public function test_get_set_id(): void
    {
        $this->model->setId('test-id');
        $this->assertSame('test-id', $this->model->getId());
    }
}
