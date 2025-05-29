<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Customer;
use Cake\Form\Form;
use Cake\Form\Schema;

/**
 * Class CreatePinForm
 * @package App\Form
 */
class CreatePinForm extends Form
{
    protected $_identity;

    protected $_customer;

    public function getCustomer()
    {
        return $this->_customer;
    }

    public function setIdentity($identity)
    {
        $this->_identity = $identity;
    }

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('pin', [
                'type' => 'string'
            ])
            ->addField('confirm_pin', [
                'type' => 'string'
            ]);
    }

    public function setErrors($errors)
    {
        $this->_errors = $errors;
    }

    protected function _execute(array $data)
    {
        $this->_customer = new Customer();
        $this->_customer->addHeaders([
            "X-User-Token" => $this->_identity
        ]);
        $result = $this->_customer->enableTwoFactorAuth($data);
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
