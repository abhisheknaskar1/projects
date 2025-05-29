<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Quote;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Http\Exception\BadRequestException;
use Cake\Validation\Validator;

class QuoteConfirmationForm extends Form
{
    protected $_quote;

    use CardValidationTrait;

    public function getQuote()
    {
        return $this->_quote;
    }

    public function setQuote($quote)
    {
        $this->_quote = $quote;
    }

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('purpose_id', ['type' => 'string'])
            ->addField('purpose_text', ['type' => 'string'])
            ->addField('message', ['type' => 'string']);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar("purpose_id")
            ->requirePresence("purpose_id", function($context){
                return !isset($context["data"]["purpose_text"]);
            })
            ->allowEmptyString("purpose_id", null, function($context){
                return isset($context["data"]["purpose_text"]);
            });

        $validator
            ->scalar("purpose_text")
            ->requirePresence("purpose_text", function($context){
                return !isset($context["data"]["purpose_id"]);
            })
            ->allowEmptyString("purpose_text", null, function($context){
                return isset($context["data"]["purpose_id"]);
            });

        $validator
            ->scalar("message")
            ->allowEmptyString("message");

        return $validator;
    }

    /**
     * @param array $data
     * @return bool
     * @throws BadRequestException
     */
    protected function _execute(array $data)
    {
        if ( !$this->_quote ) {
            $this->_quote   =   new Quote();
        }
        $result = $this->_quote->confirm($data);
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
