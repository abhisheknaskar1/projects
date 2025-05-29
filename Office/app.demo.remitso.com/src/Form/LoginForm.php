<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Customer;
use Cake\Form\Form;
use Cake\Form\Schema;
use Psr\Http\Message\RequestInterface;

/**
 * Class LoginForm
 * @package App\Form
 * @property string $_token
 * @property RequestInterface $_request
 * @property Customer $_customer
 * @property string|null $_failureMessage
 */
class LoginForm extends Form
{
    private $_token;

    private $_request;

    private $_customer;

    private ?string $_failureMessage;

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
            ->addField('password', ['type' => 'string']);
    }

    public function setErrors($errors)
    {
        $this->_errors = $errors;
    }

    public function getFailureMessage()
    {
        return $this->_failureMessage;
    }

    protected function _execute(array $data)
    {
        $this->_customer = new Customer();
        $this->_customer->addHeaders([
            "X-Client-UA" => $this->getRequest()->getHeaderLine("User-Agent"),
            "X-Client-IP" => $this->getRequest()->clientIp(),
            "X-Client-Fingerprint" => $this->getRequest()->getHeaderLine("X-Client-Fingerprint"),
        ]);
        $result = $this->_customer->login($data);
        if ( $result === true ) {
            $json = $this->_customer->getResponse()->getJson();
            $this->_token = $json["token"] ?? null;
            return true;
        } else {
            $this->_failureMessage = $result["message"] ?? null;
            return false;
        }

    }
}
