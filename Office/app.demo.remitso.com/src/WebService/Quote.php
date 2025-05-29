<?php
namespace App\WebService;

use Cake\Http\Exception\BadRequestException;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Class Quote
 * @package App\WebService
 */
class Quote extends WebService
{
    private string $_id = "";

    private array $_sources = [];

    private array $_destinations = [];

    private array $_payment_country = [];

    private array $_payment_currency = [];

    private array $_payout_country = [];

    private array $_payout_currency = [];

    private float $_send_amount = 0;

    private array $_payment_methods = [];

    private array $_payout_methods = [];

    private array $_payment_method = [];

    private array $_payout_method = [];

    private float $_base_cost = 0;

    private float $_cost = 0;

    private float $_sell_rate = 0;

    private float $_payout_amount = 0;

    private array $_messages = [];

    private array $_resolvedIssues = [];

    private array $_recipient = [];

    private array $_payment_account = [];

    private array $_transaction = [];

    private array $_partners = [];

    private array $_partner = [];

    private array $_agency = [];

    private array $_location = [];

    private array $_account_lookup = [];

    private bool $_require_payout_location = false;

    private bool $_partner_require_payout_location = false;

    private ?string $_discount_coupon_id = null;

    private ?string $_discount_coupon_code = null;

    private ?float $_discount_amount = null;

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->_id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id) : void
    {
        $this->_id = $id;
    }

    /**
     * @return array
     */
    public function getSources() : array
    {
        return $this->_sources;
    }

    /**
     * @return array
     */
    public function getDestinations() : array
    {
        return $this->_destinations;
    }

    /**
     * @return array
     */
    public function getPaymentCountry() : array
    {
        return $this->_payment_country;
    }

    /**
     * @return array
     */
    public function getPaymentCurrency() : array
    {
        return $this->_payment_currency;
    }

    /**
     * @return array
     */
    public function getPayoutCountry() : array
    {
        return $this->_payout_country;
    }

    /**
     * @return array
     */
    public function getPayoutCurrency() : array
    {
        return $this->_payout_currency;
    }

    /**
     * @return float
     */
    public function getSendAmount() : float
    {
        return $this->_send_amount;
    }

    /**
     * @return array
     */
    public function getPaymentMethods() : array
    {
        return $this->_payment_methods;
    }

    /**
     * @return array
     */
    public function getPayoutMethods() : array
    {
        return $this->_payout_methods;
    }

    /**
     * @return array
     */
    public function getPaymentMethod() : array
    {
        return $this->_payment_method;
    }

    /**
     * @return array
     */
    public function getPayoutMethod() : array
    {
        return $this->_payout_method;
    }

    /**
     * @return float
     */
    public function getBaseCost() : float
    {
        return $this->_base_cost;
    }

    /**
     * @return float
     */
    public function getCost() : float
    {
        return $this->_cost;
    }

    /**
     * @return float
     */
    public function getSellRate() : float
    {
        return $this->_sell_rate;
    }

    /**
     * @return float
     */
    public function getPayoutAmount() : float
    {
        return $this->_payout_amount;
    }

    /**
     * @return mixed
     */
    public function getMessages() : array
    {
        return $this->_messages;
    }

    public function getResolvedIssues() : array
    {
        return $this->_resolvedIssues;
    }

    /**
     * @return array
     */
    public function getRecipient() : array
    {
        return $this->_recipient;
    }

    /**
     * @return array
     */
    public function getPaymentAccount() : array
    {
        return $this->_payment_account;
    }

    /**
     * @return array
     */
    public function getTransaction() : array
    {
        return $this->_transaction;
    }

    /**
     * @return array
     */
    public function getPartners(): array
    {
        return $this->_partners;
    }

    /**
     * @return array
     */
    public function getPartner(): array
    {
        return $this->_partner;
    }

    /**
     * @return array
     */
    public function getAgency(): array
    {
        return $this->_agency;
    }

    public function getLocation(): array
    {
        return $this->_location;
    }

    /**
     * @return array
     */
    public function getAccountLookup() : array
    {
        return $this->_account_lookup;
    }

    /**
     * @return bool
     */
    public function requirePayoutLocation(): bool
    {
        return $this->_require_payout_location;
    }

    /**
     * @return bool
     */
    public function partnerRequirePayoutLocation(): bool
    {
        return $this->_partner_require_payout_location;
    }

    /**
     * @return string|null
     */
    public function getDiscountCouponId(): ?string
    {
        return $this->_discount_coupon_id;
    }

    /**
     * @return float|null
     */
    public function getDiscountAmount(): ?float
    {
        return $this->_discount_amount;
    }

    /**
     * @return string|null
     */
    public function getDiscountCouponCode(): ?string
    {
        return $this->_discount_coupon_code;
    }

    /**
     * @param array $quote
     */
    protected function _readQuote(array $quote) : void
    {
        $this->_id = $quote["id"] ?? "";
        $this->_sources = $quote["sources"] ?? [];
        $this->_destinations = $quote["destinations"] ?? [];
        $this->_payment_country = $quote["payment_country"] ?? [];
        $this->_payment_currency = $quote["payment_currency"] ?? [];
        $this->_payout_country = $quote["payout_country"] ?? [];
        $this->_payout_currency = $quote["payout_currency"] ?? [];
        $this->_send_amount = $quote["send_amount"] ?? 0;
        $this->_payment_methods = $quote["payment_methods"] ?? [];
        $this->_payout_methods =  $quote["payout_methods"] ?? [];
        $this->_payment_method = $quote["payment_method"] ?? [];
        $this->_payout_method = $quote["payout_method"] ?? [];
        $this->_base_cost = $quote["base_cost"] ?? 0;
        $this->_cost = $quote["cost"] ?? 0;
        $this->_sell_rate = $quote["sell_rate"] ?? 0;
        $this->_payout_amount = $quote["payout_amount"] ?? 0;
        $this->_messages = $quote["messages"] ?? [];
        $this->_resolvedIssues = $quote["resolved_issues"] ?? [];
        $this->_recipient = $quote["recipient"] ?? [];
        $this->_payment_account = $quote["payment_account"] ?? [];
        $this->_partners = $quote['payout_partners'] ?? [];
        $this->_partner = $quote['payout_partner'] ?? [];
        $this->_agency = $quote["payout_agency"] ?? [];
        $this->_location = $quote["payout_location"] ?? [];
        $this->_account_lookup = $quote['account_lookup'] ?? [];
        $this->_require_payout_location = $quote['payout_method']['require_payout_location'] ?? false;
        $this->_partner_require_payout_location = $quote['require_payout_location'] ?? false;
        $this->_discount_coupon_id = $quote['discount_coupon_id'] ?? null;
        $this->_discount_amount = (float)($quote['discount_amount'] ?? null);
        $this->_discount_coupon_code = $quote['discount_coupon_code'] ?? null;
    }

    public function getQuote($options = [], $accountLookup = false)
    {
        if ($accountLookup) {
            $options['lookupRecipient'] = 'true';
        }
        $this->get('/quotes'.($this->_id ? '/'.$this->_id : ""), $options);
        if ( $this->_response->isOk() ) {
            $quote = $this->_response->getJson();
            $this->_readQuote($quote["quote"]);
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function getQuoteForRecipient($id)
    {
        $this->post('/send/recipient/'.$id, []);
        if ( $this->_response->isOk() ) {
            $quote = $this->_response->getJson();
            $this->_readQuote($quote["quote"]);
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function saveQuote($data)
    {
        $this->post('/quotes'.($this->_id ? '/'.$this->_id : ""), $data);
        if ( $this->_response->isOk() ) {
            $quote = $this->_response->getJson();
            $this->_readQuote($quote["quote"]);
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function fetch($id)
    {
        $this->get('/quotes/'.$id);
        if ( $this->_response->isOk() ) {
            $quote = $this->_response->getJson();
            $this->_readQuote($quote["quote"]);
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function updateRecipient($recipientId = null)
    {
        $this->post('/quotes/set-recipient/'.$this->_id, [
            "recipient_id" => $recipientId
        ]);
        if ( $this->_response->isOk() ) {
            $quote = $this->_response->getJson();
            $this->_readQuote($quote["quote"]);
            return true;
        } else {
            return $this->getErrors();
        }
    }

    /**
     * @param $data
     * @return array|bool
     * @throws BadRequestException
     */
    public function confirm($data)
    {
        try {
            $this->post('/quotes/confirm/'.$this->_id, $data);
        } catch (UnauthorizedException $exception) {
            $error = json_decode($exception->getMessage(), true);
            if (isset($error["type"])) {
                if ($error["type"] === "authentication_error" || $error["type"] === "two_factor_authentication_error") {
                    throw new UnauthorizedException($exception->getMessage());
                }
            }
        }
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_transaction =   $json["order"];
            return true;
        } else {
            if ($this->_response->getStatusCode() === 400) {
                $error = $this->_response->getJson();
                if ($error["type"] === "bad_recipient") {
                    throw new BadRequestException($error["message"]);
                }
            }
            return $this->getErrors();
        }
    }

    public function repeat($id, $data = [])
    {
        $this->post('/quotes/repeat-order/'.$id, $data);
        if ( $this->_response->isOk() ) {
            $quote = $this->_response->getJson();
            $this->_readQuote($quote["quote"]);
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function applyDiscount(string $discountCode)
    {
        $this->post('/quotes/apply-discount/'.$this->_id, [
            "discount_coupon_code" => $discountCode
        ]);
        if ( $this->_response->isOk() ) {
            $quote = $this->_response->getJson();
            $this->_readQuote($quote["quote"]);

            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function removeDiscount()
    {
        $this->post('/quotes/remove-discount/'.$this->_id);
        if ( $this->_response->isOk() ) {
            $quote = $this->_response->getJson();
            $this->_readQuote($quote["quote"]);

            return true;
        } else {
            return $this->getErrors();
        }
    }
}
