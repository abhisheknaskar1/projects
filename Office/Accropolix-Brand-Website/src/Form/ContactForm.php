<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class ContactForm extends Form
{
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema->addField('Your Name', 'string')
        ->addField('Your Email', ['type' => 'string'])
        ->addField('Phone Number', ['type' => 'text'])
        ->addField('Your Message', ['type' => 'text']);
        }

        public function validationDefault(Validator $validator): Validator
        {
            $validator->minLength('Your Name', 50)
            ->email('Your Email')
            ->email('Phone Number')
            ->email('Your Message');

            return $validator;
        }

        protected function _execute(array $data): bool
        {
        // Send an email.
        return true;
    }
}
?>
