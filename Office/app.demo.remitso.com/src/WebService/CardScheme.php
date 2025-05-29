<?php
namespace App\WebService;

use Cake\Cache\Cache;

/**
 * Class CardScheme
 * @package App\WebService
 * @property array $schemes
 */
class CardScheme extends WebService
{
    private $schemes = [];

    public function __construct()
    {
        parent::__construct();
        $schemes = Cache::read("App.CardSchemes");
        if ( $schemes === false ) {
            $this->get('/card-schemes');
            if ( $this->_response->isOk() ) {
                $result = $this->_response->getJson();
                $schemes = $result["card_schemes"] ?? [];
                Cache::write("App.CardSchemes", $schemes);
            }
        }
        $this->schemes = $schemes;
    }

    public function getSchemes()
    {
        return $this->schemes;
    }

}
