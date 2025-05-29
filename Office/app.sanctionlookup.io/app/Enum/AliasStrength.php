<?php

declare(strict_types=1);

namespace App\Enum;

enum AliasStrength: String
{
    case WEAK = 'weak';
    case GOOD = 'good';
    case STRONG = 'strong';
}
