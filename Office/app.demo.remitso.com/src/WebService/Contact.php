<?php
namespace App\WebService;

/**
 * Class Contact
 * @package App\WebService
 */
class Contact extends WebService
{

    /**
     * @param array $data
     * @return array|bool
     */
    public function newQuery($data)
    {
        $this->post('/contact', $data);
        if ( $this->_response->isOk() ) {
            return true;
        } else {
            return $this->getErrors();
        }
    }

}
