<?php
namespace App\WebService;

use Cake\Cache\Cache;

/**
 * Class Country
 * @package App\WebService
 */
class Country extends WebService
{

    protected $_countries = [];

    protected $_country = [];

    protected $_payoutChannels = [];

    protected $_payoutChannel = [];

    public function getCountries()
    {
        return $this->_countries;
    }

    public function getCountry()
    {
        return $this->_country;
    }

    public function getPayoutChannels()
    {
        return $this->_payoutChannels;
    }

    public function getPayoutChannel()
    {
        return $this->_payoutChannel;
    }

    public function all()
    {
        $countries = Cache::read("App.Countries");
        if ( $countries === false ) {
            $this->get('/countries');
            if ( $this->_response->isOk() ) {
                $json = $this->_response->getJson();
                $this->_countries = $json["countries"] ?? [];
                Cache::write("App.Countries", $this->_countries);
                return true;
            } else {
                return $this->getErrors();
            }
        } else {
            $this->_countries = $countries;
            return true;
        }

    }

    public function sources()
    {
        $this->get('/countries/sources');
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_countries = $json["countries"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function destinations()
    {
        $this->get('/countries/destinations');
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_countries = $json["countries"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function detail($code = null)
    {
        $this->get('/countries/'.$code);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_country = $json["country"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function payoutChannels($id = null)
    {
        $this->get('/countries/payout-channels/'.$id);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_payoutChannels = $json["payout_channels"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function payoutChannel($id = null, $query = [])
    {
        $this->get('/countries/payout-channel/'.$id, $query);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_payoutChannel = $json["payout_channel"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

}
