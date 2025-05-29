<?php
namespace App\Controller;
use App\WebService\Customer;
use Cake\Collection\Collection;
use Cake\Controller\Component\AuthComponent;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Datasource\Paginator;
use Cake\Event\Event;
use Cake\I18n\I18n;
use DeviceDetector\DeviceDetector;

/**
 * Class AppController
 * @package App\Controller
 * @property AuthComponent $Auth
 */
class AppController extends Controller
{

    /**
     * @throws \Exception
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie', [
            'httpOnly' => true,
            'secure' => true,
        ]);
        $this->loadComponent('Paginator');
        $this->loadComponent('Auth', [
            'authorize' => [ "Controller" ]
        ]);
        $this->Auth->setConfig("loginAction", [
            "controller" => "Customers",
            "action" => "login"
        ]);
        $this->Auth->setConfig("loginRedirect", [
            "controller" => "Customers",
            "action" => "dashboard"
        ]);
        $this->Auth->setConfig("authError", __("Your session has been expired, please login again"));
        if ($this->getRequest()->getSession()->check('userForcedLocale') && Configure::check('languages.' . $this->getRequest()->getSession()->read('userForcedLocale'))) {
            I18n::setLocale($this->getRequest()->getSession()->read('userForcedLocale'));
        }
    }

    public function beforeFilter(Event $event)
    {
        $deviceDetector = new DeviceDetector($this->getRequest()->getHeaderLine('User-Agent'));
        $deviceDetector->parse();
        $this->set('deviceDetector', $deviceDetector);
        parent::beforeFilter($event);
    }

    protected function _appPaginator()
    {
        return new class extends Paginator {
            protected $_pagingParams;
            protected $_resultSet = [];
            public function setPagingParams($pagingParams)
            {
                $this->_pagingParams = $pagingParams;
            }
            public function setResultSet($resultSet)
            {
                $this->_resultSet = $resultSet;
            }
            public function paginate($object, array $params = [], array $settings = [])
            {
                return  new Collection($this->_resultSet);
            }
        };
    }

    /**
     * @param array $user
     * @return bool|\Cake\Http\Response|null
     */
    public function isAuthorized($user)
    {
        if ( $user ) {
            /** @var Customer $account */
            $account = $user["account"];
            if ( $account->getProperty("blocked", false) &&  !( $this->getRequest()->getParam("controller") === "Customers" && in_array($this->getRequest()->getParam("action"), [
                "blocked",
                "logout",
                'dashboard',
                'savedCards',
                'documents',
                        'login',
                ]))
            ) {
                return $this->redirect([
                    "controller" => "Customers",
                    "action" => "blocked"
                ]);
            }
            if ( $account->getProperty("is_profile_completed", false) === false ) {
                if ( !(
                    $this->getRequest()->getParam("controller") === "Customers" &&
                    in_array($this->getRequest()->getParam("action"), [
                        "countrySelector",
                        "logout",
                        "country",
                        "login",
                        "twoFactorAuthentication",
                        "profile",
                        "verifyEmail",
                        "unverifiedEmail",
                        "resendEmailVerification",
                        "emailVerificationResent",
                        "blocked",
                        "twoStepVerification",
                        "registrationSuccessful"
                    ]) === true
                ) ) {
                    return $this->redirect([
                        "action" => ( $account->getProperty("country_id", null) ? "profile" : "countrySelector" ),
                        "controller" => "Customers"
                    ]);
                }
            }
            if ( $account->getProperty("is_verified_email", false) === false ) {
                if ( !(
                    $this->getRequest()->getParam("controller") === "Customers" &&
                    in_array($this->getRequest()->getParam("action"), [
                        "twoFactorAuthentication",
                        "unverifiedEmail",
                        "resendEmailVerification",
                        "emailVerificationResent",
                        "verifyEmail",
                        "logout",
                        "blocked",
                        "twoStepVerification",
                        "registrationSuccessful",
                        "countrySelector",
                        "profile",
                        "country",
                    ]) === true
                ) ) {
                    return $this->redirect([
                        "action" => "unverifiedEmail",
                        "controller" => "Customers"
                    ]);
                }
            }
        }
        return true;
    }

}
