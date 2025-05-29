<?php
namespace App\Form;

use App\Utility\ApiErrors;
use App\WebService\Customer;
use Cake\Form\Schema;

class ChangePinForm extends CreatePinForm
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('current_pin', [
                'type' => 'string'
            ])
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
        $result = $this->_customer->changePin($data);
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
