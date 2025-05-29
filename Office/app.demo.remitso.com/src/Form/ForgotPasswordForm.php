<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Customer;
use Cake\Form\Form;
use Cake\Form\Schema;

/**
 * Class ForgotPasswordForm
 * @package App\Form
 * @property string $_recipient
 */
class ForgotPasswordForm extends Form
{

    protected $_recipient;

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('email', ['type' => 'string']);
    }

    public function getRecipient()
    {
        return $this->_recipient;
    }

    public function setErrors($errors)
    {
        $this->_errors = $errors;
    }

    protected function _execute(array $data)
    {
        $customer = new Customer();
        $result = $customer->forgotPassword($data);
        if ( is_bool($result) ) {
            if ( $result === true ) {
                $json = $customer->getResponse()->getJson();
                $this->_recipient = $json["recipient"] ?? null;
            }
            return $result;
        } else {
            if ( is_array($result) ) {
                $this->setErrors(ApiErrors::toFormErrors($result));
            }
            return false;
        }
    }

}
