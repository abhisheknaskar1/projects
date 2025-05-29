<?php
namespace App\WebService;
use Cake\Cache\Cache;

/**
 * Class Settings
 * @package App\WebService
 * @property string|null $companyName
 * @property string|null $tradingName
 * @property string|null $tagLine
 * @property string|null $license
 * @property string|null $csNumber
 * @property string|null $csEmail
 * @property string|null $hqAddress
 * @property string|null $hqCity
 * @property string|null $hqRegion
 * @property string|null $hqPostcode
 * @property string|null $hqCountry
 * @property array $locales
 * @property array $timezones
 */
class Settings extends WebService
{
    private $companyName;
    private $tradingName;
    private $tagLine;
    private $license;
    private $csNumber;
    private $csEmail;
    private $hqAddress;
    private $hqCity;
    private $hqRegion;
    private $hqPostcode;
    private $hqCountry;
    private $locales = [];
    private $timezones = [];

    public function __construct()
    {
        parent::__construct();
        $settings = Cache::read("App.Settings");
        if ( $settings === false ) {
            $this->get('/settings');
            if ( $this->_response->isOk() ) {
                $result = $this->_response->getJson();
                $settings = [
                    'companyName' => $result["settings"]["company_name"] ?? null,
                    'tradingName' => $result["settings"]["trading_name"] ?? null,
                    'tagLine' => $result["settings"]["tag_line"] ?? null,
                    'license' => $result["settings"]["license"] ?? null,
                    'csNumber' => $result["settings"]["cs_number"] ?? null,
                    'csEmail' => $result["settings"]["cs_email"] ?? null,
                    'hqAddress' => $result["settings"]["hq_address"] ?? null,
                    'hqCity' => $result["settings"]["hq_city"] ?? null,
                    'hqRegion' => $result["settings"]["hq_region"] ?? null,
                    'hqPostcode' => $result["settings"]["hq_postcode"] ?? null,
                    'hqCountry' => $result["settings"]["hq_country"] ?? null,
                    'locales' => $result["settings"]["locales"] ?? [],
                    'timezones' => $result["settings"]["timezones"] ?? [],
                ];
                Cache::write("App.Settings", $settings);
            }
        }
        $this->companyName = $settings["companyName"];
        $this->tradingName = $settings["tradingName"];
        $this->tagLine = $settings["tagLine"];
        $this->license = $settings["license"];
        $this->csNumber = $settings["csNumber"];
        $this->csEmail = $settings["csEmail"];
        $this->hqAddress = $settings["hqAddress"];
        $this->hqCity = $settings["hqCity"];
        $this->hqRegion = $settings["hqRegion"];
        $this->hqPostcode = $settings["hqPostcode"];
        $this->hqCountry = $settings["hqCountry"];
        $this->locales = $settings["locales"];
        $this->timezones = $settings["timezones"];
    }

    public function getArray()
    {
        return [
            "companyName" =>   $this->companyName,
            "tradingName" =>   $this->tradingName,
            "tagLine" =>   $this->tagLine,
            "license" =>   $this->license,
            "csNumber" =>   $this->csNumber,
            "csEmail" =>   $this->csEmail,
            "hqAddress" =>   $this->hqAddress,
            "hqCity" =>   $this->hqCity,
            "hqRegion" =>   $this->hqRegion,
            "hqPostcode" =>   $this->hqPostcode,
            "hqCountry" =>   $this->hqCountry,
            "locales" => $this->locales,
            "timezones" => $this->timezones
        ];
    }


}
