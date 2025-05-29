<?php /** @noinspection PhpInconsistentReturnPointsInspection */

namespace App\Controller;

use App\Database\Datasource\ApiQuery;
use App\Form\RecipientForm;
use App\WebService\Country;
use App\WebService\Order;
use App\WebService\Quote;
use App\WebService\Recipients;
use App\WebService\Relationship;
use Cake\Collection\Collection;
use Cake\Event\Event;

/**
 * Class RecipientsController
 * @package App\Controller
 */
class RecipientsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $allowed = [
            'index',
            'add',
            'recipientCountry',
            'view',
            'wizardDeliveryMethod',
            'edit',
            'delete',

        ];
        $this->Auth->allow($allowed);
        parent::beforeFilter($event);
    }

    public function index()
    {
        $recipient = new Recipients();
        $recipient->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $result = $recipient->findAll($this->getRequest()->getQueryParams());
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong while trying to load recipient. Please try again later."));
        }
        $recipients = $recipient->getRecipients();
        $pagination = $recipient->getPagination();
        $paginator = $this->_appPaginator();
        $paginator->setPagingParams([
            "Recipients" => $pagination
        ]);
        $paginator->setResultSet($recipients);
        $this->Paginator->setPaginator($paginator);
        $this->Paginator->paginate(new ApiQuery(), [
            "limit" => $this->getRequest()->getQuery("limit", 12),
            "maxLimit" => 100,
        ]);
        $titleForLayout = __("Recipients");
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'recipients'));
    }

    public function recipientCountry()
    {
        $titleForLayout = __("Recipients Destination");
        $country = new Country();
        $countries = [];
        if ( $country->destinations() ) {
            $countries = $country->getCountries();
        } else {
            $this->Flash->error(__("Something went wrong. Please try again."));
        }
        $metaOgTitleForLayout  = __("");
        $metaOgDescriptionForLayout  = __("");
        $this->set(compact('titleForLayout', 'countries', 'metaOgTitleForLayout', 'metaOgDescriptionForLayout'));
    }

    public function wizardDeliveryMethod($slug = null)
    {
        $country = new Country();
        $country->all();
        $countries = $country->getCountries();
        $destination = (new Collection($countries))->firstMatch([
            "slug" => $slug
        ]);
        $result = $country->payoutChannels($destination["id"]);
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $payoutChannels = $country->getPayoutChannels();
        $titleForLayout = __("Select Delivery Method");
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'payoutChannels'));
    }

    public function add($id = null)
    {
        $relationship = new Relationship();
        $result = $relationship->all();
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $relationships = $relationship->getRelationships();
        $country = new Country();
        $result = $country->payoutChannel($id);
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $payoutChannel = $country->getPayoutChannel();
        $fields = $payoutChannel["fields"];
        $form = new RecipientForm();
        $form->setIdentity($this->Auth->user("token"));
        foreach ( $fields as $property ) {
            $form->addProperty($property);
        }
        if ( $this->getRequest()->is(["post"]) ) {
            $form->setPayoutChannel($payoutChannel["id"]);
            $data = new \ArrayObject($this->getRequest()->getData());
            $form->marshal($data);
            $form->execute($data->getArrayCopy());
            if ( empty($form->getErrors()) ) {
                if ( $this->getRequest()->getQuery("quote") ) {
                    return $this->redirect([
                        "controller" => "Orders",
                        "action" => "selectRecipient",
                        $this->getRequest()->getQuery("quote"),
                        ($form->getRecipient()->getRecipient()["id"] ?? null)
                    ]);
                }
                $this->Flash->success("Recipient has been successfully saved.");
                return $this->redirect([
                    "action" => "index"
                ]);
            }
        }
        $titleForLayout = __("Recipient Details");
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'form', 'fields', 'relationships', 'payoutChannel'));
    }

    public function edit($id = null)
    {
        $wsRecipient = new Recipients();
        $wsRecipient->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $result = $wsRecipient->fetch($id);
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $recipient = $wsRecipient->getRecipient();
        $relationship = new Relationship();
        $result = $relationship->all();
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $relationships = $relationship->getRelationships();
        $country = new Country();
        $result = $country->payoutChannel($recipient["payout_channel"]["id"]);
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $payoutChannel = $country->getPayoutChannel();
        $fields = $payoutChannel["fields"];
        $form = new RecipientForm();
        $form->setIdentity($this->Auth->user("token"));
        $form->setData($recipient);
        foreach ( $fields as $property ) {
            $form->addProperty($property);
        }
        if ( $this->getRequest()->is(["post"]) ) {
            $form->setRecipientId($recipient["id"]);
            $data = new \ArrayObject($this->getRequest()->getData());
            $form->marshal($data);
            $form->execute($data->getArrayCopy());
            if ( empty($form->getErrors()) ) {
                $this->Flash->success("Recipient has been successfully updated.");
                return $this->redirect([
                    "action" => "index"
                ]);
            }
        }
        $titleForLayout = __("Edit Recipient");
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'form', 'fields', 'relationships', 'payoutChannel', 'recipient'));
    }

    public function view($id = null)
    {
        $wsRecipient = new Recipients();
        $wsRecipient->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $result = $wsRecipient->fetch($id);
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $wsOrder = new Order();
        $wsOrder->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $wsOrder->findAll([
            'recipient' => $id
        ]);
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong in fetching the transaction. Please try again later"));
        }
        $orders = $wsOrder->getOrders();
        $recipient = $wsRecipient->getRecipient();
        $titleForLayout = $recipient["full_name"];
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'recipient', 'orders'));
    }

    public function delete($id = null)
    {
        $this->getRequest()->allowMethod(["post"]);
        $wsRecipient = new Recipients();
        $wsRecipient->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $wsRecipient->delete($id) === true ) {
            $this->Flash->success(__("Recipient has been successfully deleted."));
            return $this->redirect([
                "action" => "index"
            ]);
        } else {
            $this->Flash->error(__("Something went wrong. Please try again later."));
            $this->redirect($this->referer());
        }
    }

    public function send($id = null)
    {
        $quote = new Quote();
        $quote->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ($quote->getQuoteForRecipient($id)) {
            $this->Cookie->write("lastQuote", [
                "payment_country_id" => $quote->getPaymentCountry()["id"],
                "payment_currency_id" => $quote->getPaymentCurrency()["id"],
                "payout_country_id" => $quote->getPayoutCountry()["id"],
                "payout_currency_id" => $quote->getPayoutCurrency()["id"],
                "send_amount" => $quote->getSendAmount(),
            ]);
            return $this->redirect([
                'controller' => 'Orders',
                'action' => "send",
                $quote->getId()
            ]);
        }
        return $this->redirect([
            'controller' => 'Orders',
            'action' => "send"
        ]);
    }

}
