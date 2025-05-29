<?php
namespace App\Utility;
use Cake\I18n\Time;

/**
 * Class ExpiryDate
 * @package App\Utility
 */
class ExpiryDate
{
    /**
     * @param string $niceValue
     * @return Time|string|null
     */
    public static function getExpiry(string $niceValue) {
        $expiry = explode("/", $niceValue);
        $expiry = array_map("trim", $expiry);
        array_walk($expiry, function(&$value, $key) use($expiry){
            if ( is_numeric($value) === false ) {
                unset($expiry[$key]);
            }
        });
        if ( count($expiry) !== 2 ) {
            return __("The provided value is invalid");
        }
        $expMonth = intval($expiry[0]);
        $expYear = substr(date("Y"), 0, 2).$expiry[1];
        $endOfMonth = [
            1 => 31,
            2 => ( $expYear%4 === 0 ? 29 : 28 ),
            3 => 31,
            4 => 30,
            5 => 31,
            6 => 30,
            7 => 31,
            8 => 31,
            9 => 30,
            10 => 31,
            11 => 30,
            12 => 31
        ];
        if ( $expMonth < 1 || $expMonth > 12 ) {
            return __("Month value should be between 01 and 12");
        }
        $expiryDate = $expYear."-".str_pad($expMonth, 2, "0", STR_PAD_LEFT)."-".$endOfMonth[$expMonth];
        return new Time($expiryDate);
    }
}
