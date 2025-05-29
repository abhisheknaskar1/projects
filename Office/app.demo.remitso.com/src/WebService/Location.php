<?php
declare(strict_types=1);

namespace App\WebService;

/**
 * Class Location
 * @package App\WebService
 */
class Location extends WebService
{
    private array $_locations = [];

    private array $_pagination = [];

    /**
     * @return array
     */
    public function getLocations(): array
    {
        return $this->_locations;
    }

    public function getPagination(): array
    {
        return $this->_pagination;
    }

    /**
     * @param string $paymentCountry
     * @param string $paymentCurrency
     * @param string $payoutCountry
     * @param string $payoutCurrency
     * @param string $payoutMethod
     * @param string $payoutPartner
     * @param string|null $query
     * @param array $paginationOptions
     * @return array|bool
     */
    public function fetch(
        string $paymentCountry,
        string $paymentCurrency,
        string $payoutCountry,
        string $payoutCurrency,
        string $payoutMethod,
        string $payoutPartner,
        ?string $query = null,
        array $paginationOptions = []
    ) {
        $this->get('/locations', array_merge([
            'source_country_id' => $paymentCountry,
            'source_currency_id' => $paymentCurrency,
            'payout_country_id' => $payoutCountry,
            'payout_currency_id' => $payoutCurrency,
            'payout_method_id' => $payoutMethod,
            'payout_partner_id' => $payoutPartner,
            'q' => $query,
        ], $paginationOptions));
        if ( $this->_response->isOk() ) {
            $response = $this->_response->getJson();
            $this->_locations = $response['locations'];
            $this->_pagination = $response["paginator"];
            return true;
        } else {
            return $this->getErrors();
        }
    }
}
