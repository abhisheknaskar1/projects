<?php
declare(strict_types=1);

namespace App\WebService;

/**
 * Class PaymentCredentialRedirect
 * @package App\WebService
 */
class PaymentCredentialRedirect extends WebService
{
    private ?string $_redirectUrl = null;

    /**
     * @return string|null
     */
    public function getRedirectUrl(): ?string
    {
        return $this->_redirectUrl;
    }

    public function getCredentials(string $orderId)
    {
        $this->get('/orders/payment-credentials/' . $orderId);
        if ($this->_response->isOk()) {
            $json = $this->_response->getJson();
            $this->_redirectUrl = $json["redirectUrl"] ?? null;
            return true;
        } else {
            return $this->getErrors();
        }
    }
}
