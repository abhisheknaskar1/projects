<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Customer;
use Cake\Form\Form;

/**
 * Class CustomerForm
 * @package App\Form
 * @property Customer $_customer
 * @property array $_mask
 * @property string|null $_section
 * @property string $_identity
 */
class CustomerForm extends Form
{

    use MarshallerTrait;

    private Customer $_customer;

    private string $_section;

    protected array $_mask = [];

    protected string $_identity;

    public function setIdentity($identity)
    {
        $this->_identity = $identity;
    }

    /**
     * @param string $section
     */
    public function setSection(string $section): void
    {
        $this->_section = $section;
    }


    public function getCustomer()
    {
        return $this->_customer;
    }

    protected function _execute(array $data)
    {
        $this->_customer = new Customer();
        $this->_customer->addHeaders([
            "X-User-Token" => $this->_identity
        ]);
        $result = $this->_customer->update($this->_section, $data);
        if ( is_bool($result) ) {
            return $result;
        } else {
            if ( is_array($result) ) {
                $this->setErrors(ApiErrors::toFormErrors($result));
            }
            return false;
        }
    }

    public function addPropertyMask(string $property, string $mask = null)
    {
        if ( $mask ) {
            $this->_mask[$property] = $mask;
        }
    }

    public function addProperty(array $property)
    {
        $schema = $this->schema();
        $validator = $this->getValidator();
        if ( $property["type"] === "date" ) {
            $validator->date($property["property"], ["ymd"]);
            if ( $property["required"] ) {
                $validator
                    ->requirePresence($property["property"])
                    ->notBlank($property["property"]);
            } else {
                $validator->allowEmptyString($property["property"]);
            }
            $schema->addField($property["property"], [
                "type" => "date"
            ]);
        } else if ( $property["type"] === "contact" ) {
            $validator->isArray($property["property"]);
            if ( $property["required"] ) {
                $validator
                    ->requirePresence($property["property"])
                    ->notEmptyArray($property["property"])
                    ->add($property["property"], "_emptyNumber", [
                        "rule" => function($data) {
                            return empty($data["number"] ?? null) === true ? __("This field cannot be left empty") : true;
                        },
                        "last" => true
                    ]);
            }
            if ( $property["expression"] ) {
                $validator
                    ->add($property["property"], "_invalid", [
                        "rule" => function($data) use ($property){
                            if ( $data["number"] ) {
                                return preg_match($property["expression"], $data["number"]) === 1;
                            } else {
                                return true;
                            }
                        },
                        "last" => true,
                        "message" => $property["expression_error"]
                    ]);
            }
            $validator
                ->add($property["property"], "_emptyIsd", [
                    "rule" => function($data, $context) use ($property){
                        if ( $context["data"][$property["property"]]["number"] ) {
                            return empty($data["country"] ?? null) === true ? __("ISD code cannot be left empty") : true;
                        }
                        return true;
                    }
                ]);
            $schema->addField($property["property"], [
                "type" => "contact"
            ]);
            $this->addPropertyMask($property["property"], $property["mask"]);
        }  else if ( $property["type"] === "money" ) {
            if ( $property["required"] ) {
                $validator
                    ->requirePresence($property["property"])
                    ->notEmptyArray($property["property"])
                    ->add($property["property"], "_emptyAmount", [
                        "rule" => function($data) {
                            return empty($data["amount"] ?? null) === true ? __("This field cannot be left empty") : true;
                        },
                        "last" => true
                    ]);
            }
            $validator
                ->add($property["property"], "_emptyCurrency", [
                    "rule" => function($data, $context) use ($property){
                        if ( $context["data"][$property["property"]]["amount"] ) {
                            return empty($data["currency"] ?? null) === true ? __("Currency cannot be left empty") : true;
                        }
                        return true;
                    }
                ]);
            $validator
                ->add($property["property"], "_invalid", [
                    "rule" => function($data) {
                        return  is_numeric($data["amount"]);
                    }
                ]);
            $schema->addField($property["property"], [
                "type" => "money"
            ]);
        } else if ( in_array($property["type"], ["boolean", "checkbox"]) ) {
            if ( $property["required"] ) {
                $validator
                    ->requirePresence($property["property"])
                    ->notBlank($property["property"]);
            } else {
                $validator->allowEmptyString($property["property"]);
            }
            $validator->boolean($property["property"]);
            $schema->addField($property["property"], [
                "type" => "boolean",
                "default" => 0
            ]);
        } else {
            $validator->scalar($property["property"]);
            if ( $property["required"] ) {
                $validator
                    ->requirePresence($property["property"])
                    ->notBlank($property["property"]);
            } else {
                $validator->allowEmptyString($property["property"]);
            }
            if ( $property["expression"] ) {
                $validator->regex($property["property"], $property["expression"]);
            }
            $schema->addField($property["property"], [
                "type" => "string"
            ]);
            $this->addPropertyMask($property["property"], $property["mask"]);
        }
    }

}
