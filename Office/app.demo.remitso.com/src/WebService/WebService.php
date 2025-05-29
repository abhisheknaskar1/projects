<?php
namespace App\WebService;
use Cake\Http\Client;
use Cake\Http\Exception\UnauthorizedException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class WebService
 * @package App\WebService
 * @property string|null $_endPoint
 * @property string|null $_clientId
 * @property string|null $_clientSecret
 * @property array $_headers
 * @property Client $_client
 * @property ResponseInterface $_response
 * @property bool $_noShutdown
 */
class WebService
{

    protected string $_endPoint;
    protected string $_clientId;
    protected string $_clientSecret;
    protected array $_headers = [];
    protected Client $_client;
    protected ResponseInterface $_response;

    protected bool $_noShutdown = false;

    public function addHeaders($headers = [])
    {
        $this->_headers = array_merge($this->_headers, $headers);
    }

    public function __construct()
    {
        $this->_client  =   new Client();
        $this->_endPoint  =   env("WEB_SERVICE_URL", null);
        $this->_clientId  =   env("CLIENT_ID", null);
        $this->_clientSecret = env("CLIENT_SECRET", null);
        $this->_headers = [
            "X-Client-ID" => $this->_clientId,
            "X-Client-Secret" => $this->_clientSecret
        ];
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->_response;
    }


    /**
     * @return bool|array
     */
    public function getErrors()
    {
        $errors = false;
        if ( $this->_response->getStatusCode() === 400 ) {
            $errors =  $this->_response->getJson()["errors"] ?? false;
        }
        return $errors;
    }

    protected  function _shutdown()
    {
        if ( $this->_response->getStatusCode() === 401 && $this->_noShutdown === false ) {
            $json = $this->_response->getJson();
            throw new UnauthorizedException(json_encode($json));
        }
    }

    /**
     * @param string $path
     * @param array $query
     * @param array $headers
     */
    public function get($path, array $query = [], array $headers = [])
    {
        $headers += $this->_headers;
        $this->_response = $this->_client->get($this->_endPoint.$path, $query, [
            "headers" => $headers,
            "timeout" => 300
        ]);
        $this->_shutdown();
    }

    /**
     * @param string $path
     * @param array $data
     * @param array $headers
     */
    public function post($path, array $data = [], array $headers = [])
    {
        $headers += $this->_headers;
        $this->_response = $this->_client->post($this->_endPoint.$path, $data, [
            "headers" => $headers,
            "timeout" => 300
        ]);
        $this->_shutdown();
    }

}
