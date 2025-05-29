<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Customer;
use Cake\Form\Form;
use Cake\Form\Schema;
use Psr\Http\Message\RequestInterface;

/**
 * Class SignUpForm
 * @package App\Form
 * @property string $_token
 * @property RequestInterface $_request
 * @property Customer $_customer
 */
class SignUpForm extends Form
{
    private $_token;

    private $_request;

    private $_customer;

    public function getCustomer()
    {
        return $this->_customer;
    }

    public function setRequest(RequestInterface $request)
    {
        $this->_request = $request;
        return $this;
    }

    public function getRequest()
    {
        return $this->_request;
    }

    public function getToken()
    {
        return $this->_token;
    }

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('email', ['type' => 'string'])
            ->addField('password', ['type' => 'string'])
            ->addField('confirm_password', ['type' => 'string']);
    }

    public function setErrors($errors)
    {
        $this->_errors = $errors;
    }

    protected function _execute(array $data)
    {
        $this->_customer = new Customer();
        $this->_customer->addHeaders([
            "X-Client-UA" => $this->getRequest()->getHeaderLine("User-Agent"),
            "X-Client-IP" => $this->getRequest()->clientIp(),
            "X-Client-Fingerprint" => $this->getRequest()->getHeaderLine("X-Client-Fingerprint"),
        ]);
        $result = $this->_customer->register($data);
        if ( is_bool($result) ) {
            if ( $result === true ) {
                $json = $this->_customer->getResponse()->getJson();
                $this->_token = $json["token"] ?? null;
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
