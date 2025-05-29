<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Customer;
use Cake\Form\Form;
use Cake\Form\Schema;

/**
 * Class TwoFactorAuthForm
 * @package App\Form
 * @property Customer $_customer
 * @property string $_identity
 * @property string|null $_failureMessage
 */
class TwoFactorAuthForm extends Form
{

    protected $_identity;

    private $_customer;

    private ?string $_failureMessage;

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
            ]);
    }

    public function getFailureMessage()
    {
        return $this->_failureMessage;
    }

    protected function _execute(array $data)
    {
        $this->_customer = new Customer();
        $this->_customer->addHeaders([
            "X-User-Token" => $this->_identity
        ]);
        $result = $this->_customer->twoFactorAuth($data);
        if ( is_bool($result) ) {
            return $result;
        } else {
            $this->_failureMessage = $result["message"] ?? null;
            return false;
        }
    }

}
