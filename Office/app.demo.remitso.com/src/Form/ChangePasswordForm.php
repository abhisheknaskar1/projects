<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Customer;
use Cake\Form\Form;
use Cake\Form\Schema;

/**
 * Class ChangePasswordForm
 * @package App\Form
 * @property string $_identity
 */
class ChangePasswordForm extends Form
{

    protected $_identity;

    public function setIdentity($identity)
    {
        $this->_identity = $identity;
    }

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('current_password', ['type' => 'string'])
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
        $customer->addHeaders([
            "X-User-Token" => $this->_identity
        ]);
        $result = $customer->changePassword($data);
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
