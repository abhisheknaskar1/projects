<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Customer;
use App\WebService\WebService;
use ArrayObject;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use DateTime;
use Exception;

/**
 * Class DocumentForm
 * @package App\Form
 */
class DocumentForm extends Form
{
    protected $_customer;

    protected $_documentType;

    protected $_documentCategory;

    protected $_flashMessage;

    protected $_flashType = null;

    public function getFlashMessage()
    {
        return $this->_flashMessage;
    }

    public function getFlashType()
    {
        return $this->_flashType;
    }

    public function setDocumentType($documentType): void
    {
        $this->_documentType = $documentType;
    }


    public function setDocumentCategory($documentCategory)
    {
        $this->_documentCategory = $documentCategory;
    }

    public function setCustomer($customer)
    {
        $this->_customer = $customer;
    }

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('frontface', ['type' => 'string'])
            ->addField('backface', ['type' => 'string'])
            ->addField('customer_card_usage_id', ['type' => 'string'])
            ->addField('issuing_country_id', ['type' => 'string'])
            ->addField('place_of_issue', ['type' => 'string'])
            ->addField('document_number', ['type' => 'string'])
            ->addField('issuer', ['type' => 'string'])
            ->addField('valid_from', ['type' => 'string'])
            ->addField('valid_through', ['type' => 'string']);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar("frontface")
            ->requirePresence("frontface")
            ->notBlank("frontface");
        return $validator;
    }

    /**
     * @param ArrayObject $data
     * @throws Exception
     */
    public function marshal(ArrayObject $data)
    {
        if ( isset($data["valid_from"]) ) {
            if ( empty($data["valid_from"]) === false ) {
                $date = (new DateTime())->createFromFormat("d F Y", $data["valid_from"]);
                $data["valid_from"]  = $date->format("Y-m-d");
            }
        }
        if ( isset($data["valid_through"]) ) {
            if ( empty($data["valid_through"]) === false ) {
                $date = (new DateTime())->createFromFormat("d F Y", $data["valid_through"]);
                $data["valid_through"]  = $date->format("Y-m-d");
            }
        }
    }

    protected function _execute(array $data)
    {
        if ( !$this->_customer ) {
            $this->_customer = new Customer();
        }
        $data["files"] = [];
        if ( isset($data["frontface"]) && $data["frontface"] ) {
            $data["pages"][0]["uri"] = fopen(TMP.$data["frontface"], "r");
        }
        if ( isset($data["backface"]) && $data["backface"] ) {
            $data["pages"][1]["uri"] = fopen(TMP.$data["backface"], "r");
        }
        $result = $this->_customer->uploadDocument($this->_documentCategory, $this->_documentType, $data);
        if ( is_bool($result) ) {
            $this->_flashMessage = $this->_customer->getFlashMessage();
            $this->_flashType = $this->_customer->getFlashType();
            return $result;
        } else {
            if ( is_array($result) ) {
                $this->setErrors(ApiErrors::toFormErrors($result));
            }
            return false;
        }
    }

}
