<?php
namespace App\WebService;

use Cake\Collection\Collection;

/**
 * Class Recipients
 * @package App\WebService
 */
class Recipients extends WebService
{

    protected $_recipients = [];

    protected $_pagination = [];

    protected $_recipient = [];

    public function getRecipients()
    {
        return new Collection($this->_recipients);
    }

    public function getRecipient()
    {
        return $this->_recipient;
    }

    public function getPagination(): array
    {
        return $this->_pagination;
    }



    public function findAll($options = [])
    {
        $this->get('/recipients', $options);
        if ( $this->_response->isOk() ) {
            $response = $this->_response->getJson();
            $this->_recipients = $response["recipients"];
            $this->_pagination = $response["paginator"];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function add($data = [])
    {
        $this->post('/recipients/add', $data);
        if ( $this->_response->isOk() ) {
            $json = $this->getResponse()->getJson();
            $this->_recipient = $json["recipient"];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function fetch($id = null)
    {
        $this->get('/recipients/'.$id);
        if ( $this->_response->isOk() ) {
            $json = $this->getResponse()->getJson();
            $this->_recipient = $json["recipient"];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function delete($id = null)
    {
        $this->post('/recipients/delete/'.$id);
        if ( $this->_response->isOk() ) {
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function edit($id, $data = [])
    {
        $this->post('/recipients/edit/'.$id, $data);
        if ( $this->_response->isOk() ) {
            $json = $this->getResponse()->getJson();
            $this->_recipient = $json["recipient"];
            return true;
        } else {
            return $this->getErrors();
        }
    }
}
