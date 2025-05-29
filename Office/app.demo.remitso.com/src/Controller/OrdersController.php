<?php /** @noinspection PhpInconsistentReturnPointsInspection */

namespace App\Controller;
use App\Database\Datasource\ApiQuery;
use App\Form\QuoteConfirmationForm;
use App\Form\QuoteForm;
use App\Form\RetryPaymentForm;
use App\PaymentApis\SafeCharge;
use App\WebService\Country;
use App\WebService\Customer;
use App\WebService\Location;
use App\WebService\Order;
use App\WebService\PaymentCredential;
use App\WebService\PaymentCredentialRedirect;
use App\WebService\Purpose;
use App\WebService\Quote;
use App\WebService\Recipients;
use Cake\Event\Event;
use Cake\Http\Exception\BadRequestException;
use Cake\Http\Exception\InternalErrorException;
use Cake\I18n\Number;
use Cake\Routing\Router;

class OrdersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $allowed = [
            "send",
            "getQuote",
            "selectLocation",
            'view',
            'index',
        ];
        if ( $this->getRequest()->getQuery("token") && $this->getRequest()->getParam("action") === "pay" && $this->getRequest()->getQuery("media") === "app" ) {
            $customerWs = new Customer();
            $customerWs->addHeaders([
                'X-User-Token' => $this->getRequest()->getQuery("token")
            ]);
            $me = $customerWs->fetchProfile();
            if ($me === true) {
                $this->Auth->setUser([
                    'token' => $this->getRequest()->getQuery("token"),
                    'account' => $customerWs
                ]);
            }
        }
        $this->Auth->allow($allowed);
        if ( $this->getRequest()->getParam("action") === "recipient" ) {
            $this->Auth->setConfig("authError", __("Please login to continue"));
        }
        return parent::beforeFilter($event);
    }

    public function getQuote()
    {
        $this->getRequest()->allowMethod(["ajax", "get"]);
        $this->response = $this->response->withType("json");
        $quote = new Quote();
        if ( $this->Auth->user("token") ) {
            $quote->addHeaders([
                "X-User-Token" => $this->Auth->user("token")
            ]);
        }
        $query = $this->getRequest()->getQueryParams();
        $query["send_amount"] = Number::parseFloat($query["send_amount"] ?? 0);
        $query["payout_amount"] = Number::parseFloat($query["payout_amount"] ?? 0);
        $quote->getQuote($query);
        $paymentCurrency = $quote->getPaymentCurrency();
        $payoutCurrency = $quote->getPayoutCurrency();
        $icon = $paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ";
        $payoutIcon = $payoutCurrency["icon"] ?: $payoutCurrency["iso_code_alpha"]." ";
        $sendAmountNice = $icon.Number::format($quote->getSendAmount(), [ "places" => 2 ]);
        $payoutAmount = Number::format($quote->getPayoutAmount(), [ "places" => 2 ]);
        $payoutAmountNice = $payoutIcon.$payoutAmount;
        $sellRate = rtrim(rtrim(Number::format($quote->getSellRate(), ["places" => 8]), '0'), '.');
        $costNice = $icon.Number::format($quote->getCost(), [ "places" => 2 ]);
        $baseCostNice = $icon.Number::format($quote->getBaseCost(), [ "places" => 2 ]);
        $exchangeRateNice = $paymentCurrency["iso_code_alpha"]." = ".$sellRate." ".$payoutCurrency["iso_code_alpha"];
        $totalToPay = $quote->getCost()+$quote->getSendAmount();
        $totalToPayNice = $icon.Number::format($totalToPay, [ "places" => 2 ]);
        $paymentMethods = $quote->getPaymentMethods();
        foreach ( $paymentMethods as &$paymentMethod ) {
            if ( $paymentMethod["instrument_cost"] ) {
                $paymentMethod["instrument_cost_nice"] = $icon.Number::format($paymentMethod["instrument_cost"], [
                   "places" => 2
                ]);
            }
        }
        $payoutMethods = $quote->getPayoutMethods();
        $body = json_encode([
            "payment_currency" => $paymentCurrency,
            "payout_currency" => $payoutCurrency,
            "send_amount_nice" => $sendAmountNice,
            "send_amount" => Number::format($quote->getSendAmount(), [ "places" => 2 ]),
            "sell_rate" => $sellRate,
            "payout_amount" => $payoutAmount,
            "payout_amount_nice" => $payoutAmountNice,
            "base_cost_nice" => $baseCostNice,
            "total_cost_nice" =>   $costNice,
            "messages" => $quote->getMessages(),
            "exchange_rate_nice" => $exchangeRateNice,
            "total_to_pay_nice" => $totalToPayNice,
            "payout_methods" => $payoutMethods,
            "payment_methods" => $paymentMethods,
            "payment_method" => $quote->getPaymentMethod(),
            "payout_method" => $quote->getPayoutMethod(),
            'resolved_issues' => $quote->getResolvedIssues(),
            'partners' => $quote->getPartners(),
            'partner' => $quote->getPartner(),
            'agency' => $quote->getAgency(),
            'location' => $quote->getLocation(),
            'require_payout_location' => $quote->requirePayoutLocation(),
        ]);
        $this->response = $this->response->withStringBody($body);
        $this->Cookie->write("lastQuote", [
            "payment_country_id" => $quote->getPaymentCountry()["id"],
            "payment_currency_id" => $quote->getPaymentCurrency()["id"],
            "payout_country_id" => $quote->getPayoutCountry()["id"],
            "payout_currency_id" => $quote->getPayoutCurrency()["id"],
            "send_amount" => $quote->getSendAmount(),
        ]);
        return $this->response;
    }

    public function selectLocation()
    {
        $locationsWs = new Location();
        $result = $locationsWs->fetch(
            $this->getRequest()->getQuery('payment_country_id'),
            $this->getRequest()->getQuery('payment_currency_id'),
            $this->getRequest()->getQuery('payout_country_id'),
            $this->getRequest()->getQuery('payout_currency_id'),
            $this->getRequest()->getQuery('payout_method_id'),
            $this->getRequest()->getQuery('payout_partner_id'),
            $this->getRequest()->getQuery('q'),
            [
                'limit' => $this->getRequest()->getQuery('limit'),
                'page' => $this->getRequest()->getQuery('page'),
            ]
        );
        if ($result === true) {
            $locations = $locationsWs->getLocations();
        } else {
            $this->Flash->error(__('Something went wrong. Please try again.'));

            return $this->redirect($this->referer());
        }

        $location = $locationsWs->getLocations();
        $pagination = $locationsWs->getPagination();
        $paginator = $this->_appPaginator();
        $paginator->setPagingParams([
           "Locations" => $pagination,
        ]);
        $paginator->setResultSet($location);
        $this->Paginator->setPaginator($paginator);
        $this->Paginator->paginate(new ApiQuery(), [
            "limit" => $this->getRequest()->getQuery("limit", 12),
            "maxLimit" => 100,
        ]);

        $titleForLayout = __("Select Payout Location");
        $metaDescriptionForLayout = '';
        $metaOgTitleForLayout = '';
        $metaOgDescriptionForLayout = '';
        $this->set(compact('titleForLayout', 'metaDescriptionForLayout', 'metaOgTitleForLayout', 'metaOgDescriptionForLayout', 'locations'));
    }

    public function send($id = null)
    {
        $id = $id ?: "";
        $quote = new Quote();
        if ( $this->Auth->user("token") ) {
            $quote->addHeaders([
                "X-User-Token" => $this->Auth->user("token")
            ]);
        }
        $options = [];
        if ( $this->Cookie->check("lastQuote") ) {
            $options = $this->Cookie->read("lastQuote") ?: [];
        }
        $options = array_merge($options, $this->getRequest()->getData() ?: $this->getRequest()->getQuery());
        $form = new QuoteForm();
        $form->setQuote($quote);
        $quote->setId($id);
        if ( $this->getRequest()->is("post") ) {
            $data = $this->getRequest()->getData();
            if ( isset($data["send_amount"]) ) {
                $data["send_amount"] = Number::parseFloat($data["send_amount"]);
            }
            if ( isset($data["payout_amount"]) ) {
                $data["payout_amount"] = Number::parseFloat($data["payout_amount"]);
            }
            $form->execute($data);
            if ( $form->getErrors() ) {
                $this->Flash->error(__("Something was not correct. Please check your inputs"));
            } else {
                if ($quote->getRecipient()) {
                    return $this->redirect([
                        "action" => "confirm",
                        $quote->getId()
                    ]);
                }
                return $this->redirect([
                    "action" => "recipient",
                    $quote->getId()
                ]);
            }
        }
        $quote->getQuote($options);

        $title = __("Online International Money Transfer - ATLMoney");
        $desc = __("Send money abroad with the best exchange rates. Instant service. Low transfer cost. Secure and reliable platform.");
        $this->set(compact('quote', 'form', 'title', 'desc'));
    }

    public function recipient($id = null)
    {
        $quote = new Quote();
        $quote->setId($id);
        if ( $quote->getQuote() !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $recipient = new Recipients();
        $recipient->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $result = $recipient->findAll([
            "country_id" => $quote->getPayoutCountry()["id"],
            "currency_id" => $quote->getPayoutCurrency()["id"],
            "delivery_method_id" => $quote->getPayoutMethod()["id"],
            "q" => $this->getRequest()->getQuery("q")
        ]);
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong while trying to load recipient. Please try again later."));
        }

        $wsCountry = new Country();
        $result = $wsCountry->payoutChannel(null, [
            "country_id" => $quote->getPayoutCountry()["id"],
            "currency_id" => $quote->getPayoutCurrency()["id"],
            "delivery_method_id" => $quote->getPayoutMethod()["id"],
        ]);
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $payoutChannel = $wsCountry->getPayoutChannel();

        $recipients = $recipient->getRecipients();
        $this->set(compact('quote','recipients', 'payoutChannel'));
    }

    public function index()
    {
        $order = new Order();
        $order->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $result = $order->findAll($this->getRequest()->getQueryParams());
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong while trying to load recent transactions. Please try again later."));
        }
        $orders = $order->getOrders();
        $pagination = $order->getPagination();
        $paginator = $this->_appPaginator();
        $paginator->setPagingParams([
            "Orders" => $pagination
        ]);
        $paginator->setResultSet($orders);
        $this->Paginator->setPaginator($paginator);
        $this->Paginator->paginate(new ApiQuery(), [
            "limit" => $this->getRequest()->getQuery("limit", 5),
            "maxLimit" => 100,
        ]);
        $titleForLayout = __("Transaction History");
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'orders'));
    }

    public function selectRecipient($quoteId = null, $recipientId = null)
    {
        $quote = new Quote();
        $quote->setId($quoteId);
        $quote->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $result = $quote->updateRecipient($recipientId);
        if ( $result ) {
            return $this->redirect([
                "action" => "confirm",
                $quoteId
            ]);
        } else {
            $this->Flash->error(__("Something went wrong. Please try again"));
            return $this->redirect($this->referer());
        }
    }

    public function confirm($id = null)
    {
        $purpose = new Purpose();
        $purpose->all();
        $purposes = $purpose->getPurposes();
        $form = new QuoteConfirmationForm();
        $quote = new Quote();
        $quote->setId($id);
        $form->setQuote($quote);
        $quote->addHeaders([
            "X-User-Token" => $this->Auth->user("token"),
            'X-Confirm-Pin' => $this->getRequest()->getData("pin")
        ]);
        if ( $quote->getQuote([]) !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $paymentMethod = $quote->getPaymentMethod();
        $cardSchemes = [];
        $cards = [];
        if ( $this->getRequest()->is("post") ) {
            $data = $this->getRequest()->getData();
            if ($data["purpose_id"] === "OTHER") {
                unset($data["purpose_id"]);
            } else {
                unset($data["purpose_text"]);
            }
            $data['_redirect']['success_return_url'] = Router::url([
                'controller' => 'Orders',
                'action' => 'thankYou',
                ':orderId'
            ], true);
            $data['_redirect']['failure_return_url'] = Router::url([
                'controller' => 'Orders',
                'action' => 'pay',
                ':orderId',
                '_pg-response' => 'failed',
            ], true);
            $data['_redirect']['cancel_return_url'] = Router::url([
                'controller' => 'Orders',
                'action' => 'pay',
                ':orderId',
                '_pg-response' => 'cancel'
            ], true);
            $data['_redirect']['view_page_url'] = Router::url([
                'controller' => 'Orders',
                'action' => 'view',
                ':orderId'
            ], true);
            try {
                $form->execute($data);
                if ( $form->getErrors() ) {
                    $this->Flash->error(__("Something was not correct. Please check your inputs"));
                } else {
                    $response = $quote->getResponse();
                    if ( $response->getStatusCode() === 503 ) {
                        $json = $response->getJson();
                        $this->Flash->error($json["message"]);
                    } else if ( $response->getStatusCode() === 401 ) {
                        $json = $response->getJson();
                        if ($json["type"] === "incorrect_pin") {
                            $this->Flash->error($json["message"]);
                        }
                        $this->set(compact('form'));
                        $this->render('two_factor_authentication');
                    } else {
                        $order = $quote->getTransaction();
                        if ( in_array($paymentMethod["code"], [ "DCP", "CCP" ]) ) {
                            $this->Flash->success(__("Please complete your payment now"));
                            return $this->redirect([
                                "action" => "pay",
                                $order["id"]
                            ]);
                        } elseif ( in_array($paymentMethod["code"], [ "FSP" ]) ) {
                            return $this->redirect([
                                "action" => "redirectForPayment",
                                $order["id"]
                            ]);
                        }
                        return $this->redirect([
                            "action" => "thankYou",
                            $order["id"]
                        ]);
                    }
                }
            } catch (BadRequestException $e) {
                $this->Flash->error($e->getMessage());
            }
        }
        $this->set(compact('quote', 'purposes', 'form', 'cardSchemes', 'cards'));
    }

    public function pay($id = null)
    {
        $cards = [];
        $wsOrder = new Order();
        $wsOrder->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $wsOrder->fetch($id) !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $order = $wsOrder->getOrder();
        if ((bool)($order["is_payment_reattempt_possible"] ?? false) === false && $order["payment"]["status"] !== "pending") {
            if ($this->getRequest()->getQuery("media") === "app") {
                $this->render("app_payment_reattempt_not_possible");
            } else {
                $this->Flash->error(__("Payment for this transaction cannot be retried."));
                return $this->redirect([
                    'action' => 'view',
                    $order["id"]
                ]);
            }
        } else {
            if ( in_array($order["payment_method"]["code"], [ "DCP", "CCP" ]) ) {
                $customerWs = new Customer();
                $customerWs->addHeaders([
                    "X-User-Token" => $this->Auth->user("token")
                ]);
                if ($customerWs->getSavedCards() === true) {
                    $cards = $customerWs->getCards();
                }
            }
            if ( $order["payment"]["status"] !== "pending" ) {
                $form = new RetryPaymentForm();
                $form->setOrder($wsOrder);
                $form->setOrderId($order["id"]);
                $form->execute([]);
                return $this->redirect($this->getRequest()->getRequestTarget());
            }
            $safeCharge = new SafeCharge();
            $merchantId = $safeCharge->getMerchantId();
            $siteId = $safeCharge->getSiteId();
            $pcWebService = new PaymentCredential();
            $pcWebService->addHeaders([
                "X-User-Token" => $this->Auth->user("token")
            ]);
            $token = null;
            if ($pcWebService->getToken($order['id']) === true) {
                $token = $pcWebService->getPaymentToken();
            } else {
                $this->Flash->error(__("Payment token could not be created."));
                return $this->redirect([
                    'action' => 'view',
                    $order["id"]
                ]);
            }
            $titleForLayout = __("{payment_method} Payment", [
                'payment_method' => $order["payment_method"]["title"]
            ]);
            $this->viewBuilder()->setLayout("dashboard");
            $this->set(compact('titleForLayout', 'order', 'token', 'merchantId', 'siteId', 'cards'));
        }
        $titleForLayout = __("{payment_method} Payment", [
            'payment_method' => $order["payment_method"]["title"]
        ]);
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'order'));
    }

    public function redirectForPayment($id = null)
    {
        $cards = [];
        $wsOrder = new Order();
        $wsOrder->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $wsOrder->fetch($id) !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $order = $wsOrder->getOrder();
        if ((bool)($order["is_payment_reattempt_possible"] ?? false) === false && $order["payment"]["status"] !== "pending") {
            $this->Flash->error(__("Payment for this transaction cannot be retried."));
            return $this->redirect([
                'action' => 'view',
                $order["id"]
            ]);
        } else {
            if ( $order["payment"]["status"] !== "pending" ) {
                $form = new RetryPaymentForm();
                $form->setOrder($wsOrder);
                $form->setOrderId($order["id"]);
                $form->execute([]);
                return $this->redirect($this->getRequest()->getRequestTarget());
            }
            $pcWebService = new PaymentCredentialRedirect();
            $pcWebService->addHeaders([
                "X-User-Token" => $this->Auth->user("token")
            ]);
            if ($pcWebService->getCredentials($order['id']) === true) {
                $url = $pcWebService->getRedirectUrl();
            } else {
                $this->Flash->error(__("Payment token could not be created."));
                return $this->redirect([
                    'action' => 'view',
                    $order["id"]
                ]);
            }
            $titleForLayout = __("{payment_method} Payment", [
                'payment_method' => $order["payment_method"]["title"]
            ]);
            $this->viewBuilder()->setLayout("dashboard");
            $this->set(compact('titleForLayout', 'order', 'url'));
        }
        $titleForLayout = __("{payment_method} Payment", [
            'payment_method' => $order["payment_method"]["title"]
        ]);
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'order'));
    }

    public function thankYou($id = null)
    {
        $wsOrder = new Order();
        $wsOrder->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $wsOrder->fetch($id) !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $order = $wsOrder->getOrder();
        $titleForLayout = __("Order Received");
        $this->viewBuilder()->setLayout('app');
        $this->set(compact('titleForLayout', 'order'));
    }

    public function verifyPayment($id = null)
    {
        $safeCharge = new SafeCharge();
        $result = $safeCharge->query($this->getRequest()->getQuery("token"));
        if ( ($result["transactionStatus"] ?? "") === "APPROVED" ) {
            sleep(3);
            return $this->redirect([
                'action' => 'thankYou',
                $id
            ]);
        } else {
            $this->Flash->error(__("Your payment has been declined because the bank returned {reason}. Please try again.", [
                'reason' => '<strong>'.(($result["gwErrorReason"] ?? $result["errorDescription"] ?? __("Unknown Error")) ?: __("Unknown Error")).'</strong>'
            ]), [
                'escape' => false
            ]);
            return $this->redirect([
                'action' => 'pay',
                $id
            ]);
        }
    }

//    public function retryPayment($id = null)
//    {
//        $wsOrder = new Order();
//        $wsOrder->addHeaders([
//            "X-User-Token" => $this->Auth->user("token")
//        ]);
//        if ( $wsOrder->fetch($id) !== true ) {
//            $this->Flash->error(__("Something went wrong. Please try again later"));
//            return $this->redirect($this->referer());
//        }
//        $order = $wsOrder->getOrder();
//        $form = new RetryPaymentForm();
//        $form->setOrder($wsOrder);
//        $form->setOrderId($order["id"]);
//        $cardSchemes = [];
//        $instrumentKeys = [];
//        $cards = [];
//        if ( in_array($order["payment_method"]["code"], [ "DCP", "CCP" ]) ) {
//            $wsCustomer = new Customer();
//            $wsCustomer->addHeaders([
//                "X-User-Token" => $this->Auth->user("token")
//            ]);
//            $wsCustomer->getSavedCards();
//            $cards = $wsCustomer->getCards();
//            $wsCardSchemes = new CardScheme();
//            $cardSchemes    =   $wsCardSchemes->getSchemes();
//            $cardSchemesCollection = new Collection($cardSchemes);
//            $form->validationCard($cardSchemesCollection);
//            array_push($instrumentKeys, "card_number");
//            array_push($instrumentKeys, "card_scheme");
//            array_push($instrumentKeys, "expiry_month");
//            array_push($instrumentKeys, "expiry_year");
//            array_push($instrumentKeys, "cvc");
//            array_push($instrumentKeys, "name_on_card");
//            array_push($instrumentKeys, "zipcode");
//            array_push($instrumentKeys, "save_instrument");
//            array_push($instrumentKeys, "saved_card_id");
//        }
//        if ( $this->getRequest()->is("post") ) {
//            $data = $this->getRequest()->getData();
//            if ( in_array($order["payment_method"]["code"], [ "DCP", "CCP" ]) ) {
//                if ( $data["expiry"] ?? null ) {
//                    $expiry = ExpiryDate::getExpiry($data["expiry"]);
//                    if ( $expiry instanceof Time ) {
//                        $data["expiry_month"] = $expiry->format("m");
//                        $data["expiry_year"] = $expiry->format("Y");
//                    }
//                }
//                if ( $data["card_number"] ?? null ) {
//                    $data["card_number"] = implode("", explode(" ", $data["card_number"]));
//                }
//            }
//            $data["_instrument_keys"] = $instrumentKeys;
//            $form->execute($data);
//            if ( $form->getErrors() ) {
//                $this->Flash->error(__("Something was not correct. Please check your inputs"));
//            } else {
//                $order = $wsOrder->getOrder();
//                if ( $order["payment"]["redirect_url"] ?? null ) {
//                    return $this->redirect($order["payment"]["redirect_url"]);
//                } else if ( ($order["payment"]["status"] ?? null) === "failed" ) {
//                    return $this->redirect([
//                        "action" => "paymentFailed",
//                        $order["id"]
//                    ]);
//                }
//                return $this->redirect([
//                    "action" => "thankYou",
//                    $order["id"]
//                ]);
//            }
//        }
//        $titleForLayout = __("Retry Payment");
//        $this->viewBuilder()->setLayout("dashboard");
//        $this->set(compact('titleForLayout', 'order', 'cards', 'cardSchemes', 'form'));
//    }

    public function paymentFailed($id = null)
    {
        $wsOrder = new Order();
        $wsOrder->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $wsOrder->fetch($id) !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $order = $wsOrder->getOrder();
        $titleForLayout = __("Payment Failed");
        $this->viewBuilder()->setLayout("info");
        $this->set(compact('titleForLayout', 'order'));
    }

    public function paymentSuccess($id = null)
    {
        $wsOrder = new Order();
        $wsOrder->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $wsOrder->fetch($id) !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $order = $wsOrder->getOrder();
        $titleForLayout = __("Payment Success");
        $this->viewBuilder()->setLayout("info");
        $this->set(compact('titleForLayout', 'order'));
    }

    public function view($id = null)
    {
        $wsOrder = new Order();
        $wsOrder->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $wsOrder->fetch($id) !== true ) {
            $this->Flash->error(__("Something went wrong. Please try again later"));
            return $this->redirect($this->referer());
        }
        $order = $wsOrder->getOrder();
        $titleForLayout = __("Order #{order_number}", [
            'order_number' => $order["order_number"],
        ]);
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'order'));
    }

    public function repeat($id, $direction = "sending") {
        $wsQuote = new Quote();
        $wsQuote->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $result = $wsQuote->repeat($id, [
            "direction" => $direction
        ]);
        if ( $result === true ) {
            return $this->redirect([
                "action" => "confirm",
                $wsQuote->getId()
            ]);
        }
        return $this->redirect([
            "action" => "send"
        ]);
    }

    public function getPaymentStatus($id = null)
    {
        $this->response = $this->response->withType("plain/text");
        $wsOrder = new Order();
        $wsOrder->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $wsOrder->fetch($id) !== true ) {
            throw new InternalErrorException(__("Something went wrong. Please try again later"));
        }
        $order = $wsOrder->getOrder();
        $this->response = $this->response->withStringBody($order["payment"]["status"]);
        return $this->response;
    }

    public function applyDiscount($id = null)
    {
        $this->getRequest()->allowMethod(['post']);
        $wsQuote = new Quote();
        $wsQuote->setId($id);
        $wsQuote->addHeaders([
            "X-User-Token" => $this->Auth->user("token"),
        ]);
        $applied = $wsQuote->applyDiscount($this->getRequest()->getData('discount_coupon_code'));
        if ($applied === true) {
            $this->Flash->success(__("Yay! you have saved {0}", [
                Number::format($wsQuote->getDiscountAmount(), [
                    'places' => 2,
                    'before' => $wsQuote->getPaymentCurrency()['icon']
                ])
            ]));
        } else {
            if ($wsQuote->getResponse()->getStatusCode() === 400) {
                $this->Flash->error($applied[0]['message'] ?? __('Something went wrong. Please try again.'));
            } else {
                $this->Flash->error(__('Something went wrong. Please try again.'));
            }
        }

        return $this->redirect($this->referer());
    }

    public function removeDiscount($id = null)
    {
        $this->getRequest()->allowMethod(['post']);
        $wsQuote = new Quote();
        $wsQuote->setId($id);
        $wsQuote->addHeaders([
            "X-User-Token" => $this->Auth->user("token"),
        ]);
        $removed = $wsQuote->removeDiscount();
        if ($removed === true) {
            $this->Flash->success(__("Discount coupon has been successfully removed."));
        } else {
            if ($wsQuote->getResponse()->getStatusCode() === 400) {
                $this->Flash->error($applied[0]['message'] ?? __('Something went wrong. Please try again.'));
            } else {
                $this->Flash->error(__('Something went wrong. Please try again.'));
            }
        }

        return $this->redirect($this->referer());
    }

}
