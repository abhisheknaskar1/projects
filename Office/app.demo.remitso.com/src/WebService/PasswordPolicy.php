<?php
namespace App\WebService;
use Cake\Cache\Cache;

/**
 * Class PasswordPolicy
 * @package App\WebService
 * @property int|null $minLength
 * @property bool $includeUppercase
 * @property bool $includeLowercase
 * @property bool $includeNumber
 * @property bool $includeWildcard
 */
class PasswordPolicy extends WebService
{
    private $minLength = 6;
    private $includeUppercase = false;
    private $includeLowercase = false;
    private $includeNumber = false;
    private $includeWildcard = false;

    public function __construct()
    {
        parent::__construct();
        $policy = Cache::read("App.PasswordPolicy");
        if ( $policy === false ) {
            $this->get('/password-policy');
            if ( $this->_response->isOk() ) {
                $result = $this->_response->getJson();
                $policy = [
                    'minLength' => $result["policy"]["min_length"] ?? 6,
                    'includeUppercase' => $result["policy"]["uppercase"] ?? false,
                    'includeLowercase' => $result["policy"]["lowercase"] ?? null,
                    'includeNumber' => $result["policy"]["digit"] ?? null,
                    'includeWildcard' => $result["policy"]["wildcard"] ?? null,
                ];
                Cache::write("App.PasswordPolicy", $policy);
            }
        }
        $this->minLength = $policy["minLength"];
        $this->includeUppercase = $policy["includeUppercase"];
        $this->includeLowercase = $policy["includeLowercase"];
        $this->includeNumber = $policy["includeNumber"];
        $this->includeWildcard = $policy["includeWildcard"];
    }

    public function getArray()
    {
        return [
            "minLength" =>   $this->minLength,
            "includeUppercase" =>   $this->includeUppercase,
            "includeLowercase" =>   $this->includeLowercase,
            "includeNumber" =>   $this->includeNumber,
            "includeWildcard" =>   $this->includeWildcard,
        ];
    }

}
