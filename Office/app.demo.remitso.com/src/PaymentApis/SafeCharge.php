<?php


namespace App\PaymentApis;

use Cake\Http\Client;
use Cake\Log\Log;

/**
 * Class SafeCharge
 * @package App\PaymentApis
 */
class SafeCharge
{
    private string $baseUrl;
    private string $merchantId;
    private string $siteId;
    private const TIMEOUT = 30;

    public function __construct()
    {
        $this->baseUrl = (string)env('SAFE_CHARGE_BASE_URL');
        $this->merchantId = (string)env('SAFE_CHARGE_MERCHANT_ID');
        $this->siteId = (string)env('SAFE_CHARGE_SITE_ID');
    }

    /**
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    /**
     * @return string
     */
    public function getSiteId(): string
    {
        return $this->siteId;
    }

    public function query($id)
    {
        $endPoint = $this->baseUrl.'/ppp/api/v1/getPaymentStatus.do';
        $client = new Client([
            "timeout" => self::TIMEOUT,
            "ssl_verify_peer" => false,
            'ssl_verify_host' => false,
        ]);
        $payload = json_encode([
            "sessionToken" => $id
        ]);
        $response = $client->post($endPoint, $payload, [
            "headers" => [
                "Content-Type" => "application/json"
            ]
        ]);
        $result = $response->getJson();
        if (($result["transactionStatus"] ?? "") !== "APPROVED") {
            Log::debug(json_encode([
                'Request' => json_decode($payload),
                'ResponseCode' => $response->getStatusCode(),
                'Response' => $result,
            ]), 'sc_payments');
        }

        return $result;
    }

}
