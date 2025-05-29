<?php
namespace App\WebService;

use Cake\Cache\Cache;

/**
 * Class Purpose
 * @package App\WebService
 */
class Purpose extends WebService
{
    protected $_purposes = [];

    public function getPurposes()
    {
        return $this->_purposes;
    }

    public function all()
    {
        $purposes = Cache::read("App.Purposes");
        if ( $purposes === false ) {
            $this->get('/purposes');
            if ( $this->_response->isOk() ) {
                $json = $this->_response->getJson();
                $this->_purposes = $json["purposes"] ?? [];
                Cache::write("App.Purposes", $this->_purposes);
                return true;
            } else {
                return $this->getErrors();
            }
        } else {
            $this->_purposes = $purposes;
            return true;
        }

    }
}
