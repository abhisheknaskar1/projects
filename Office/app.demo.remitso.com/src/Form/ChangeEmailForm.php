<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Customer;
use Cake\Form\Form;
use Cake\Form\Schema;

/**
 * Class ChangeEmailForm
 * @package App\Form
 */
class ChangeEmailForm extends Form
{
    protected $_identity;

    public function setIdentity($identity)
    {
        $this->_identity = $identity;
    }

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('email', ['type' => 'string'])
            ->addField('confirmation_url', ['type' => 'string']);
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
        $result = $customer->updateEmail($data);
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
