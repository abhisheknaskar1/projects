<?php
namespace App\WebService;

use Cake\I18n\Date;
use Cake\Utility\Hash;

/**
 * Class Customer
 * @package App\WebService
 */
class Customer extends WebService
{
    private $_customer = [];

    private $_cards = [];

    private $_flashMessage = null;

    private $_flashType = null;

    public function getFlashMessage()
    {
        return $this->_flashMessage;
    }

    public function getFlashType()
    {
        return $this->_flashType;
    }

    public function getProperty(string $key = null, string $default = null)
    {
        return Hash::extract($this->_customer, $key)[0] ?? $default;
    }

    public function getData()
    {
        return $this->_customer;
    }

    public function getCards()
    {
        $cards = $this->_cards;
        foreach ( $cards as &$card ) {
            $card["expiry"] = new Date($card["card_expiry"]);
            $card["last_used"] = new Date($card["last_used"]);
        }
        return $cards;
    }

    public function register($data)
    {
        $this->post('/register', $data);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function login($data)
    {
        $this->_noShutdown = true;
        $this->post('/login', $data);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->_response->getJson();
        }
    }

    public function resendEmailVerification()
    {
        $this->_noShutdown = true;
        $this->post('/resend-email-verification', []);
        if ( $this->_response->isOk() ) {
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function verifyEmail($token)
    {
        $this->post('/verify-email', [
            "token" => $token
        ]);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function forgotPassword($data)
    {
        $this->post('/forgot-password', $data);
        if ( $this->_response->isOk() ) {
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function forgotPin()
    {
        $this->post('/forgot-pin');
        if ( $this->_response->isOk() ) {
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function resetPassword($data)
    {
        $this->post('/reset-password', $data);
        if ( $this->_response->isOk() ) {
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function resetPin($data)
    {
        $this->post('/reset-pin', $data);
        if ( $this->_response->isOk() ) {
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function fetchProfile()
    {
        $this->get('/me');
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function changePassword($data)
    {
        $this->post('/change-password', $data);
        if ( $this->_response->isOk() ) {
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function preferences($data)
    {
        $this->post('/update-preferences', $data);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function updateEmail($data)
    {
        $this->post('/update-email', $data);
        if ( $this->_response->isOk() ) {
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function authorizeEmailUpdate($data)
    {
        $this->post('/authorize-email-update', $data);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function enableTwoFactorAuth($data)
    {
        $this->post('/enable-two-factor-auth', $data);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function changePin($data)
    {
        $this->post('/change-pin', $data);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function disableTwoFactorAuth()
    {
        $this->post('/disable-two-factor-auth');
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function twoFactorAuth($data)
    {
        $this->_noShutdown = true;
        $this->post('/two-factor-auth', $data);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->_response->getJson();
        }
    }

    public function setCountry($id)
    {
        $this->post('/customers/set-country/'.$id);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function update(string $section, array $data)
    {
        $this->post('/customers/update/'.$section, $data);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json["profile"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function uploadDocument(string $category, string $documentType, array $data)
    {
        $this->post('/customers/upload-document/'.$category."/".$documentType . (isset($data['customer_card_usage_id']) && $data['customer_card_usage_id'] ? '?customer_card_usage_id=' . $data['customer_card_usage_id'] : ''), $data);
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_customer = $json['result']["profile"] ?? [];
            $this->_flashMessage = $json['result']['flash']['message'] ?? null;
            $this->_flashType = $json['result']['flash']['type'] ?? null;
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function getSavedCards()
    {
        $this->get('/customers/saved-cards');
        if ( $this->_response->isOk() ) {
            $json = $this->_response->getJson();
            $this->_cards = $json["cards"] ?? [];
            return true;
        } else {
            return $this->getErrors();
        }
    }

    public function deleteSavedCard($id = null)
    {
        $this->post('/customers/delete-saved-card/'.$id);
        if ( $this->_response->isOk() ) {
            return true;
        } else {
            return $this->getErrors();
        }
    }

}
