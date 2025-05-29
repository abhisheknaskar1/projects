<?php
namespace App\Form;

use App\Utility\ApiErrors;
use App\Utility\ExpiryDate;
use App\WebService\Order;
use Cake\Form\Form;
use Respect\Validation\Validator as v;

/**
 * Class RetryPaymentForm
 * @package App\Form
 * @property Order $_order
 * @property string $_orderId
 */
class RetryPaymentForm extends Form
{
    protected $_order;

    protected $_orderId;

    use CardValidationTrait;

    public function getOrder()
    {
        return $this->_order;
    }

    public function setOrder($order)
    {
        $this->_order = $order;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->_orderId;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->_orderId = $orderId;
    }

    protected function _execute(array $data)
    {
        $result = $this->_order->retryPayment($this->getOrderId(), $data);
        if ( is_bool($result) ) {
            return $result;
        } else {
            if ( is_array($result) ) {
                $this->setErrors(ApiErrors::toFormErrors($result));
            }
            return false;
        }
    }

}
