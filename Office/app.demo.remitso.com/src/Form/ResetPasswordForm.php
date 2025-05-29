<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Customer;
use Cake\Form\Form;
use Cake\Form\Schema;

/**
 * Class ResetPasswordForm
 * @package App\Form
 */
class ResetPasswordForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('password', ['type' => 'string'])
            ->addField('confirm_password', ['type' => 'string']);
    }

    public function setErrors($errors)
    {
        $this->_errors = $errors;
    }

    protected function _execute(array $data)
    {
        $customer = new Customer();
        $result = $customer->resetPassword($data);
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
