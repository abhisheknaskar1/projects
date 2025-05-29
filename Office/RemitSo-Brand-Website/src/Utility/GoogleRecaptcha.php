<?php
namespace App\Utility;

use Cake\Http\Client;

/**
 * Class ReCaptcha
 * @package App\Utility
 */
class GoogleRecaptcha {

    public const BASE_URI = 'https://www.google.com/recaptcha/api/siteverify';

    protected ?Client $_client;

    private ?string $_secret;

    protected ?string $_response;

    /**
     * @param \Cake\Http\Client|null $_client Client
     * @param string|null $secretCode Secret Key
     * @param string|null $response Recaptcha Response Token
     */
    public function __construct(?Client $_client = null, ?string $secretCode = null, ?string $response = null)
    {
        $this->_client = $_client;
        $this->_secret = $secretCode;
        $this->_response = $response;
    }

    public function verify()
    {
        $http = new Client();
        $response = $http->post(self::BASE_URI, [
            'secret' => $this->_secret,
            'response' => $this->_response,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
