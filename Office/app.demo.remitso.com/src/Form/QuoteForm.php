<?php
namespace App\Form;

use App\Utility\ApiErrors;
use App\WebService\Quote;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

/**
 * Class QuoteForm
 * @package App\Form
 * @property Quote|null $_quote
 */
class QuoteForm extends Form
{

    protected $_quote;

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
            ->addField('customer_id', ['type' => 'string'])
            ->addField('payment_country_id', ['type' => 'string'])
            ->addField('payment_currency_id', ['type' => 'string'])
            ->addField('payment_method_id', ['type' => 'string'])
            ->addField('send_amount', ['type' => 'decimal', 'precision' => 2, 'length' => 20])
            ->addField('payout_country_id', ['type' => 'string'])
            ->addField('payout_currency_id', ['type' => 'string'])
            ->addField('payout_method_id', ['type' => 'string'])
            ->addField('payout_partner_id', ['type' => 'string'])
            ->addField('payout_agency_id', ['type' => 'string'])
            ->addField('payout_location_id', ['type' => 'string'])
            ->addField('payout_amount', ['type' => 'decimal', 'precision' => 2, 'length' => 20]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid("payment_country_id")
            ->requirePresence("payment_country_id")
            ->notBlank("payment_country_id");

        $validator
            ->uuid("payment_currency_id")
            ->requirePresence("payment_currency_id")
            ->notBlank("payment_currency_id");

        $validator
            ->uuid("payment_method_id")
            ->requirePresence("payment_method_id")
            ->notBlank("payment_method_id");

        $validator
            ->uuid("payout_country_id")
            ->requirePresence("payout_country_id")
            ->notBlank("payout_country_id");

        $validator
            ->uuid("payout_currency_id")
            ->requirePresence("payout_currency_id")
            ->notBlank("payout_currency_id");

        $validator
            ->uuid("payout_method_id")
            ->requirePresence("payout_method_id")
            ->notBlank("payout_method_id");

        $validator
            ->uuid("payout_partner_id")
            ->allowEmptyString("payout_partner_id");

        $validator
            ->uuid("payout_agency_id")
            ->allowEmptyString("payout_agency_id");

        $validator
            ->uuid("payout_location_id")
            ->allowEmptyString("payout_location_id");

        $validator
            ->decimal("send_amount");

        $validator
            ->decimal("payout_amount");

        return $validator;
    }

    protected function _execute(array $data)
    {
        if ( !$this->_quote ) {
            $this->_quote   =   new Quote();
        }
        $result = $this->_quote->saveQuote($data);
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
