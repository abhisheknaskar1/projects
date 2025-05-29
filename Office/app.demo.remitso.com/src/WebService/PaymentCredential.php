<?php
declare(strict_types=1);

namespace App\WebService;

/**
 * Class PaymentCredential
 * @package App\WebService
 */
class PaymentCredential extends WebService
{
    private ?string $_paymentToken = null;

    /**
     * @return string|null
     */
    public function getPaymentToken(): ?string
    {
        return $this->_paymentToken;
    }

    public function getToken(string $orderId)
    {
        $this->get('/orders/payment-credentials/' . $orderId);
        if ($this->_response->isOk()) {
            $json = $this->_response->getJson();
            $this->_paymentToken = $json["sessionToken"] ?? null;
            return true;
        } else {
            return $this->getErrors();
        }
    }
}
