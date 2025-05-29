<?php
namespace App\WebService;

use Cake\Collection\Collection;

/**
 * Class Order
 * @package App\WebService
 */
class Order extends WebService
{
    protected $_orders = [];

    protected $_pagination = [];

    protected $_order = [];

    public function getOrders()
    {
        return new Collection($this->_orders);
    }

    public function getOrder()
    {
        return $this->_order;
    }

    public function getPagination()
    {
        return $this->_pagination;
    }

    public function findAll($options = [], $download = false)
    {
        $this->get('/orders' . ($download ? ".xlsx" : ""), $options);
        if ( $this->_response->isOk() ) {
            if ($this->_response->getHeaderLine('Content-Type') === "application/json") {
                $response = $this->_response->getJson();
                $this->_orders = $response["orders"];
                $this->_pagination = $response["paginator"];
                return true;
            } else {
                return $this->_response->getBody()->getContents();
            }
        } else {
            return $this->getErrors();
        }
    }

    public function download($options = [])
    {
        $this->get('/orders.xlsx', $options);
        if ( $this->_response->isOk() ) {
            return $this->_response->getBody()->getContents();
        } else {
            return false;
        }
    }

    public function recent($options = [])
    {
        $this->get('/orders/recent', $options);
        if ( $this->_response->isOk() ) {
            $response = $this->_response->getJson();
            $this->_orders = $response["orders"];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function fetch($id = null)
    {
        $this->get('/orders/'.$id);
        if ( $this->_response->isOk() ) {
            $response = $this->_response->getJson();
            $this->_order = $response["order"];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function retryPayment($id = null, $data = [])
    {
        $this->post('/orders/retry-payment/'.$id, $data);
        if ( $this->_response->isOk() ) {
            $response = $this->_response->getJson();
            $this->_order = $response["order"];
            return true;
        } else {
            return $this->getErrors();
        }
    }

}
