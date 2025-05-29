<?php /** @noinspection PhpInconsistentReturnPointsInspection */

namespace App\Controller;

use App\WebService\Country;
use App\WebService\Quote;
use Cake\Event\Event;

class PagesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        $allowed = [
            "index",
        ];
        $this->Auth->allow($allowed);
        parent::beforeFilter($event);
    }

    public function index()
    {
        $quote = new Quote();
        $options = [];
        if ( $this->Cookie->check("lastQuote") ) {
            $options = $this->Cookie->read("lastQuote") ?: [];
        }
        $quote->getQuote($options);
        $country = new Country();
        $countries = [];
        if ( $country->all() ) {
            $countries = $country->getCountries();
        } else {
            $this->Flash->error(__("Something went wrong. Please try again."));
        }
        $title = __("Send Money Abroad | International Money Transfer | DemoApp");
        $desc = __("DemoApp is a platform for international money transfers , which enables you to send money online overseas at best rates with zero fees, wherever you are.");
        $this->set(compact('title', 'desc'));
        $this->set(compact('countries', 'quote', 'title', 'desc'));
    }
}
