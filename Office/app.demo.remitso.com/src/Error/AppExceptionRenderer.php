<?php /** @noinspection PhpInconsistentReturnPointsInspection */

namespace App\Error;

use Cake\Error\ExceptionRenderer;

/**
 * Class AppExceptionRenderer
 * @package App\Error
 */
class AppExceptionRenderer extends ExceptionRenderer
{
    public function unauthorized()
    {
        $error = json_decode($this->error->getMessage(), true);
        if ( isset($error["type"]) ) {
            $controller = $this->_getController();
            if ( $error["type"] === "authentication_error" ) {
                return $controller->redirect([
                    "action" => "login",
                    "controller" => "Customers"
                ]);
            }
            if ( $error["type"] === "two_factor_authentication_error" ) {
                return $controller->redirect([
                    "action" => "twoFactorAuthentication",
                    "controller" => "Customers"
                ]);
            }
        }
    }
}
