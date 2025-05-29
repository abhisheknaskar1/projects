<?php

namespace App\Enum;

enum SanctionEntityType: String
{
    case INDIVIDUAL = 'individual';
    case ENTITY = 'entity';
    case VESSEL = 'vessel';
    case AIRCRAFT = 'aircraft';
}
