<?php

namespace App\WebService;

/**
 * Class ServiceTypes
 * @package App\WebService
 */
class ServiceTypes extends WebService
{

    protected array $serviceTypes = [];

    public function getServiceTypes(): array
    {
        if ($this->serviceTypes) {
            return $this->serviceTypes;
        }
        $this->fetch();
        return $this->serviceTypes;
    }

    public function fetch()
    {
        $this->get('/service-types');
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->serviceTypes = $json["service_types"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }
}
