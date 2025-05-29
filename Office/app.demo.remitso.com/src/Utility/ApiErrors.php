<?php
namespace App\Utility;

/**
 * Class ApiErrors
 * @package App\Utility
 */
class ApiErrors
{
    public static function toFormErrors($errors = [])
    {
        $formErrors = [];
        foreach ( $errors as $e ) {
            $formErrors[$e["param"]] = [ $e["message"] ];
        }
        return $formErrors;
    }
}
