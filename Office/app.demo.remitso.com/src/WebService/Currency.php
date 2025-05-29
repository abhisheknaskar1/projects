<?php
namespace App\WebService;

use Cake\Cache\Cache;

/**
 * Class Currency
 * @package App\WebService
 */
class Currency extends WebService
{
    protected $_currencies = [];

    public function getCurrencies()
    {
        return $this->_currencies;
    }

    public function all()
    {
        $currencies = Cache::read("App.Currencies");
        if ( $currencies === false ) {
            $this->get('/currencies');
            if ( $this->_response->isOk() ) {
                $json = $this->_response->getJson();
                $this->_currencies = $json["currencies"] ?? [];
                Cache::write("App.Currencies", $this->_currencies);
                return true;
            } else {
                return $this->getErrors();
            }
        } else {
            $this->_currencies = $currencies;
            return true;
        }

    }
}
