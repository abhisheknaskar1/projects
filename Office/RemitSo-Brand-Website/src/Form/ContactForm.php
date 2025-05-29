<?php

namespace App\Form;

use App\Mailer\ContactMailer;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class ContactForm extends Form
{
    /**
     * @param Schema $schema
     * @return Schema
     */
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema
            ->addField('name', ['type' => 'string'])
            ->addField('email', ['type' => 'string'])
            ->addField('message', ['type' => 'string']);
    }

    /**
     * @param Validator $validator
     * @return Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmptyString('message');

        return $validator;
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function _execute(array $data): bool
    {
        $mailer = new ContactMailer();
        $mailer->send('contactFormSubmit', [$data]);
        return true;
    }
}
