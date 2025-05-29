<?php
namespace App\Utility;

/**
 * Class StringMask
 * @package App\Utility
 */
class StringMask
{
    /**
     * @param string $string
     * @param string $pattern
     * @return string
     */
    public static function mask(string $string, string $pattern)
    {
        $chars = str_split($string, 1);
        $patternChars = str_split($pattern, 1);
        $computed = [];
        foreach ( $patternChars as $c ) {
            if ( in_array($c, ["0", "9", "A", "S"]) ) {
                $computed[] = array_shift($chars);
                if ( empty($chars) ) {
                    continue;
                }
            } else {
                $computed[] = $c;
            }
        }
        return implode("", $computed);
    }

    /**
     * @param string $string
     * @param string $pattern
     * @return string
     */
    public static function unmask(string $string, string $pattern)
    {
        $chars = str_split($string, 1);
        $patternChars = str_split($pattern, 1);
        $computed = [];
        foreach ( $patternChars as $i => $c ) {
            if ( in_array($c, ["0", "9", "A", "S"]) ) {
                $computed[] = $chars[$i] ?? null;
            }
        }
        return implode("", $computed);
    }
}
