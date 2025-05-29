<?php
namespace App\Form;
use App\Utility\ApiErrors;
use App\WebService\Contact;
use Cake\Form\Form;
use Cake\Form\Schema;

/**
 * Class ContactForm
 * @package App\Form
 * @property array $_errors
 */
class ContactForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('first_name', ['type' => 'string'])
            ->addField('last_name', ['type' => 'string'])
            ->addField('email', ['type' => 'string'])
            ->addField('message', ['type' => 'text']);
    }

    public function setErrors($errors)
    {
        $this->_errors = $errors;
    }

    protected function _execute(array $data)
    {
        $contact = new Contact();
        $result = $contact->newQuery($data);
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
