<?php
declare(strict_types=1);

namespace App\Mailer;


use Cake\Mailer\Mailer;

/**
 * Class ContactMailer
 * @package App\Mailer
 */

class ContactMailer extends Mailer
{
    /**
     * @param array $data
     */
    public function contactFormSubmit(array $data = [])
    {
        $this->setTransport('smtp');
        $this->setSubject(__('{0} Submitted this Contact Form', $data['name']));
        $this->setTo('abhishek@remitso.com', 'RemitSo');
        $this->setEmailFormat('html');
        $this->setViewVars($data);
        $this->setReplyTo($data['email'], $data['name']);
    }
}
