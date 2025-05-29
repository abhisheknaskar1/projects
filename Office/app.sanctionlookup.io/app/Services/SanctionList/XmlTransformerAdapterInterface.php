<?php

declare(strict_types=1);

namespace App\Services\SanctionList;

use App\Models\SanctionList;
use App\Services\SanctionList\Model\SanctionList as VendorSanctionList;
use XMLReader;

interface XmlTransformerAdapterInterface extends TransformerAdapterInterface
{
    public static function transform(SanctionList $sanctionList, XMLReader $reader): VendorSanctionList;
}
