<?php
namespace App\WebService;

use Cake\Cache\Cache;

/**
 * Class Relationship
 * @package App\WebService
 */
class Relationship extends WebService
{
    protected $_relationships = [];

    public function getRelationships()
    {
        return $this->_relationships;
    }

    public function all()
    {
        $relationships = Cache::read("App.Relationships");
        if ( $relationships === false ) {
            $this->get('/relationships');
            if ( $this->_response->isOk() ) {
                $json = $this->_response->getJson();
                $this->_relationships = $json["relationships"] ?? [];
                Cache::write("App.Relationships", $this->_relationships);
                return true;
            } else {
                return $this->getErrors();
            }
        } else {
            $this->_relationships = $relationships;
            return true;
        }

    }
}
