<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Customer;
use Cake\Form\Form;
use Cake\Form\Schema;

/**
 * Class ResetPinForm
 * @package App\Form
 */
class ResetPinForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('pin', ['type' => 'string'])
            ->addField('confirm_pin', ['type' => 'string']);
    }

    public function setErrors($errors)
    {
        $this->_errors = $errors;
    }

    protected function _execute(array $data)
    {
        $customer = new Customer();
        $result = $customer->resetPin($data);
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
