<?php

declare(strict_types=1);

namespace App\Services\SanctionList;

use App\Models\SanctionList;

interface LoaderAdapterInterface
{
    public static function upsert(SanctionList $sanctionList, array $entity): void;
}
