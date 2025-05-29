<?php

declare(strict_types=1);

namespace App\Enum;

enum SanctionListCode: String
{
    case UN_CONSOLIDATED_LIST = 'un-consolidated';
    case SECO_SANCTIONS_LIST = 'seco';
    case OFAC_SDN_LIST = 'ofac-sdn';
    case OFAC_CONSOLIDATED_SANCTIONS_LIST = 'ofac-consolidated';
    case UK_SANCTIONS_LIST = 'uk-sanctions';
    case EU_CONSOLIDATED_SANCTIONS_LIST = 'eu-consolidated';
    case AU_CONSOLIDATED_SANCTIONS_LIST = 'au-consolidated';
    case CA_CONSOLIDATED_SANCTIONS_LIST = 'ca-consolidated';
}
