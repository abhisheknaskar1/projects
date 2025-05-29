<?php
/** @noinspection PhpInconsistentReturnPointsInspection */

namespace App\Controller;

use Cake\Event\Event;

class FaqController extends AppController
{
    /**
     * @param Event $event Event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        $allowed = [
            'getStarted',
            'sendReceiveMoney',
            'registration',
            'changesKyc',
            'cancellations',
            'accounts',
            'tc',
            'troubleshooting',
            'usingTheApp',
        ];
        $this->Auth->allow($allowed);
        parent::beforeFilter($event);
    }

    /**
     * @return void
     */
    public function getStarted()
    {
        $title = __('Get Started | DemoApp');
        $desc = __('Find answers to commonly asked questions about getting started with DemoApp and begin your hassle-free money transfer journey.');
        $this->set(compact('title', 'desc'));
    }

    /**
     * @return void
     */
    public function sendReceiveMoney()
    {
        $title = __('Send & Receive Money | DemoApp');
        $desc = __('Discover frequently asked questions about sending and receiving money with DemoApp and ensure smooth transactions worldwide.');
        $this->set(compact('title', 'desc'));
    }

    /**
     * @return void
     */
    public function registration()
    {
        $title = __('Registration & Transaction Process | DemoApp');
        $desc = __('Get clarity on the registration and transaction process with DemoApp through our comprehensive FAQ section.');
        $this->set(compact('title', 'desc'));
    }

    /**
     * @return void
     */
    public function changesKyc()
    {
        $title = __('Changes & KYC | DemoApp');
        $desc = __('Find answers to commonly asked questions about making changes, updating information, and complying with KYC regulations at DemoApp.');
        $this->set(compact('title', 'desc'));
    }

    /**]
     * @return void
     */
    public function cancellations()
    {
        $title = __('Cancellations & Refunds | DemoApp');
        $desc = __('Get answers to frequently asked questions about cancellations, refunds, and our policies at DemoApp for a seamless experience.');
        $this->set(compact('title', 'desc'));
    }

    /**
     * @return void
     */
    public function accounts()
    {
        $title = __('Accounts & Security | DemoApp');
        $desc = __('Explore our FAQ section to find answers about managing your account, security measures, and keeping your funds safe at DemoApp.');
        $this->set(compact('title', 'desc'));
    }

    /**
     * @return void
     */
    public function tc()
    {
        $title = __('Terms & Conditions | DemoApp');
        $desc = __('Gain insights into frequently asked questions about DemoApp\'s terms and conditions and make informed decisions for your money transfers.');
        $this->set(compact('title', 'desc'));
    }

    /**
     * @return void
     */
    public function troubleshooting()
    {
        $title = __('Troubleshooting & Technical Issues | DemoApp');
        $desc = __('Find solutions to commonly encountered technical issues and get troubleshooting assistance through our comprehensive FAQ section.');
        $this->set(compact('title', 'desc'));
    }

    /**
     * @return void
     */
    public function usingTheApp()
    {
        $title = __('Using the DemoApp App | DemoApp');
        $desc = __('Explore our FAQ section to find answers to frequently asked questions about using the DemoApp app and make the most of its features for convenient money transfers.');
        $this->set(compact('title', 'desc'));
    }
}
