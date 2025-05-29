<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Recipients;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

/**
 * Class RecipientForm
 * @package App\Form
 */
class RecipientForm extends Form
{

    use MarshallerTrait;

    protected $_mask = [];

    protected $_identity;

    protected $_payoutChannel;

    protected $_recipientId;

    protected $_recipient;

    public function setRecipientId($recipientId)
    {
        $this->_recipientId = $recipientId;
    }

    public function setPayoutChannel($payoutChannel)
    {
        $this->_payoutChannel = $payoutChannel;
    }

    public function setIdentity($identity)
    {
        $this->_identity = $identity;
    }

    public function getRecipient()
    {
        return $this->_recipient;
    }

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('first_name', ['type' => 'string'])
            ->addField('middle_name', ['type' => 'string'])
            ->addField('last_name', ['type' => 'string'])
            ->addField('entity_name', ['type' => 'string'])
            ->addField('relationship_id', ['type' => 'string']);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notBlank("recipient_type");

        $validator
            ->requirePresence("relationship_id")
            ->notBlank("relationship_id");

        $validator
            ->requirePresence("first_name", function($context){
                return ($context["data"]["recipient_type"] ?? "") === "INDIVIDUAL";
            })
            ->allowEmptyString("first_name", null, function($context){
                return ($context["data"]["recipient_type"] ?? "") !== "INDIVIDUAL";
            });

        $validator
            ->requirePresence("last_name", function($context){
                return ($context["data"]["recipient_type"] ?? "") === "INDIVIDUAL";
            })
            ->allowEmptyString("last_name", null, function($context){
                return ($context["data"]["recipient_type"] ?? "") !== "INDIVIDUAL";
            });

        $validator
            ->requirePresence("entity_name", function($context){
                return ($context["data"]["recipient_type"] ?? "") === "ENTITY";
            })
            ->allowEmptyString("entity_name", null, function($context){
                return ($context["data"]["recipient_type"] ?? "") !== "ENTITY";
            });

        return $validator;
    }

    protected function _execute(array $data)
    {
        $this->_recipient = new Recipients();
        $this->_recipient->addHeaders([
            "X-User-Token" => $this->_identity
        ]);
        $data += [
            "country_payout_channel_id" => $this->_payoutChannel
        ];
        if ( $this->_recipientId ) {
            $result = $this->_recipient->edit($this->_recipientId, $data);
        } else {
            $result = $this->_recipient->add($data);
        }
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
        if ( $property["type"] === "contact" ) {
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
        }  else {
            $validator->scalar($property["property"]);
            if ( $property["required"] ) {
                $validator
                    ->requirePresence($property["property"])
                    ->notBlank($property["property"]);
            } else {
                $validator->allowEmptyString($property["property"]);
            }
            if ( $property["expression"] ) {
                $validator->regex($property["property"], $property["expression"], $property["expression_error"]);
            }
            $schema->addField($property["property"], [
                "type" => "string"
            ]);
            $this->addPropertyMask($property["property"], $property["mask"]);
        }
    }

}
