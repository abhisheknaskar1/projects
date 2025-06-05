<?php
declare(strict_types=1);

namespace App\Utility;

use Illuminate\Support\Number;

class IndianMoney
{
    /**
     * @param float $amount
     * @param bool $short
     * @param bool $withIcon
     * @return string
     */
    public static function getInWords(float $amount, bool $short = false, bool $withIcon = true): string
    {
        if ($amount > 9999999) {
            $money = $withIcon ? Number::currency(($amount / 10000000), 'INR') : Number::format(($amount / 10000000), 2);

            return $money . ($short ? ' Cr' : ' Crore');
        } elseif ($amount > 99999) {
            $money = $withIcon ? Number::currency(($amount / 100000), 'INR') : Number::format(($amount / 100000), 2);

            return  $money . ' Lac';
        }

        return ($amount / 1000) . ($short ? ' K' : ' Thousands');
    }
}
