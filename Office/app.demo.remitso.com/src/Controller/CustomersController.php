<?php /** @noinspection PhpInconsistentReturnPointsInspection */

namespace App\Controller;

use App\Form\ChangeEmailForm;
use App\Form\ChangePasswordForm;
use App\Form\ChangePinForm;
use App\Form\CreatePinForm;
use App\Form\CustomerForm;
use App\Form\DocumentForm;
use App\Form\ForgotPasswordForm;
use App\Form\LoginForm;
use App\Form\PreferencesForm;
use App\Form\ResetPasswordForm;
use App\Form\ResetPinForm;
use App\Form\SignUpForm;
use App\Form\TwoFactorAuthForm;
use App\Utility\InlineImage;
use App\WebService\Country;
use App\WebService\Currency;
use App\WebService\Customer;
use App\WebService\Order;
use App\WebService\WebService;
use Cake\Collection\Collection;
use Cake\Event\Event;
use Cake\Form\Form;
use Cake\Utility\Text;
use Cake\Validation\Validator;
use Intervention\Image\Constraint;
use Intervention\Image\ImageManager;
use ReCaptcha\ReCaptcha;
use Spatie\PdfToImage\Pdf;

/**
 * Class CustomersController
 * @package App\Controller
 */
class CustomersController extends AppController
{

    protected function __fetchCustomer($token)
    {
        $customer = new Customer();
        $customer->addHeaders([
            "X-User-Token" => $token
        ]);
        if ( $customer->fetchProfile() ) {
            return $customer;
        } else {
            return false;
        }
    }

    public function beforeFilter(Event $event)
    {
        $allowed = [
            "login",
            "register",
            "forgotPassword",
            "resetPassword",
            "resetPin",
            "verifyEmail"
        ];
        $this->Auth->allow($allowed);
        $this->Cookie->configKey('Device', 'path', '/');
        $this->Cookie->configKey('Device', [
            'expires' => '+1 years',
            'httpOnly' => true
        ]);
        if ( $this->Cookie->check("Device.fingerprint") === false ) {
            $this->Cookie->write("Device.fingerprint", Text::uuid());
        }
        return parent::beforeFilter($event);
    }

    public function register()
    {
        $recaptcha = new ReCaptcha(getenv("RECAPTCHA_SECRET_KEY"));
        $deviceFingerPrint = $this->Cookie->read("Device.fingerprint");
        $customer = new SignUpForm();
        if ( $this->getRequest()->is("post") ) {
            $gRecaptchaToken = $this->getRequest()->getData("recaptcha_token");
            $resp = $recaptcha->verify($gRecaptchaToken);
            if ($resp->isSuccess() && $resp->getScore() >= 0.70) {
                $request = $this->getRequest();
                $request    =   $request->withAddedHeader("X-Client-Fingerprint", $deviceFingerPrint);
                $customer->setRequest($request);
                if ($customer->execute($this->getRequest()->getData())) {
                    $this->Cookie->write("Recent.Email", $this->getRequest()->getData("email"));
                    $this->Auth->setUser([
                        "token" => $customer->getToken(),
                        "account" => $customer->getCustomer()
                    ]);
                    return $this->redirect([
                        "controller" => "Customers",
                        "action" => "registrationSuccessful"
                    ]);
                } else {
                    if ( $customer->getErrors() ) {
                        $this->response = $this->response->withStatus(400);
                    }
                }
            } else {
                $customer->setErrors([
                    "recaptcha" => [
                        "_required" => __("Something went wrong. Please try again.")
                    ]
                ]);
            }
        }
        $this->viewBuilder()->setLayout("auth");
        $title = __("Register | ABC Money");
        $desc = __("Opening an account on ABC Money is free. Sign up now to start sending money around the world.");
        $this->set(compact('customer', 'title', 'desc'));
    }

    public function login()
    {
        $recentEmail = $this->Cookie->read("Recent.Email");
        $deviceFingerPrint = $this->Cookie->read("Device.fingerprint");
        $login = new LoginForm();
        if ( $this->getRequest()->is("post") ) {
            $request = $this->getRequest();
            $request    =   $request->withAddedHeader("X-Client-Fingerprint", $deviceFingerPrint);
            $login->setRequest($request);
            $data = $this->getRequest()->getData();
            $result = $login->execute($data);
            if ( $result === true) {
                $this->Cookie->write("Recent.Email", $data["email"]);
                $this->Auth->setUser([
                    "token" => $login->getToken(),
                    "account" => $login->getCustomer()
                ]);
                /** @var Customer $account */
                $account = $this->Auth->user("account");
                if ( $account->getProperty("two_factor_enabled") ) {
                    return $this->redirect([
                        "controller" => "Customers",
                        "action" => "twoFactorAuthentication"
                    ]);
                }
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                if ( $login->getFailureMessage() ) {
                    $this->Flash->error($login->getFailureMessage());
                } else {
                    $this->Flash->error(__("Incorrect email address or password"));
                }
            }
        }
        $this->viewBuilder()->setLayout("auth");
        $title = __("Login to your account - ABC Money");
        $desc = __("Enter your registered email address and password to continue. Validate your PIN code and start your transactions. Simple !");
        $this->set(compact('recentEmail', 'title', 'desc'));
    }

    public function twoFactorAuthentication()
    {
        $customer = $this->Auth->user("account");
        $form = new TwoFactorAuthForm();
        $form->setIdentity($this->Auth->user("token"));
        $me = $this->__fetchCustomer($this->Auth->user("token"));
        $me = $me ? $me->getData() : false;
        if ($me & $me["suspended"]) {
            $this->Flash->error(__("Account has been suspended. Please contact us for assistance"));
            return $this->redirect($this->Auth->logout());
        }
        if ( $this->getRequest()->is("post") ) {
            if ( $form->execute($this->getRequest()->getData()) ) {
                $this->Auth->setUser([
                    "token" => $this->Auth->user("token"),
                    "account" => $form->getCustomer()
                ]);
                return $this->redirect([
                    "controller" => "Customers",
                    "action" => "dashboard"
                ]);
            } else {
                if ( $form->getFailureMessage() ) {
                    $this->Flash->error($form->getFailureMessage());
                } else {
                    $this->Flash->error(__("Incorrect PIN"));
                }
                $me = $this->__fetchCustomer($this->Auth->user("token"));
                $me = $me ? $me->getData() : false;
                if ($me & $me["suspended"]) {
                    return $this->redirect($this->Auth->logout());
                }
            }
        }
        $titleForLayout = __('Two Factor Authentication');
        $this->viewBuilder()->setLayout('auth');
        $this->set(compact("form", "customer", 'titleForLayout'));
    }

    public function dashboard()
    {
        $order = new Order();
        $order->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $result = $order->recent();
        if ( $result !== true ) {
            $this->Flash->error(__("Something went wrong while trying to load recent transactions. Please try again later."));
        }
        $orders = $order->getOrders();
        /** @var Customer $customer */
        $customer = $this->Auth->user("account");
        $titleForLayout = __("Dashboard");
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'customer', 'orders'));
    }

    public function registrationSuccessful()
    {
        $titleForLayout = __("Thank you!");
        $this->set(compact('titleForLayout'));
    }

    public function logout()
    {
        $this->Flash->success(__("You've successfully logged out."));
        return $this->redirect($this->Auth->logout());
    }

    public function resendEmailVerification()
    {
        $this->getRequest()->allowMethod(["post"]);
        $customer = new Customer();
        $customer->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $customer->resendEmailVerification() === true ) {
            return $this->redirect([
                'action' => 'emailVerificationResent'
            ]);
        } else {
            $this->Flash->error(__("Email verification email could not be sent. Please try again later"));
            return $this->redirect($this->referer());
        }

    }

    public function emailVerificationResent()
    {
        $this->getRequest()->allowMethod(["get"]);
        $customer = new Customer();
        $customer->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $customer->fetchProfile() ) {
            if ($customer->getProperty("is_verified_email", false) === true) {
                $user = $this->Auth->user();
                $user["account"] = $customer;
                $this->Auth->setUser($user);
                $this->Flash->success(__("Your email is already verified"));
                return $this->redirect([
                    "action" => "dashboard"
                ]);
            }
        }
        $this->set('customer', $customer);
        $this->set('titleForLayout', __("Email Verification Sent"));
    }

    public function verifyEmail($token = null)
    {
        $this->getRequest()->allowMethod(["get"]);
        $customer = new Customer();
        if ( $customer->verifyEmail($token) === true ) {
            $user = $this->Auth->user();
            $user["account"] = $customer;
            $this->Auth->setUser($user);
            $this->Flash->success(__("Your email has been successfully verified"));
        } else {
            $error = __("Your email could not be verified. Please try again later");
            if ( $customer->getErrors() ) {
                $errorArray = current($customer->getErrors());
                if ( ($errorArray["code"] ?? "") === "already_verified_email" ) {
                    $error = __("Your email has been already verified");
                }
            }
            $this->Flash->error($error);
        }
        if (isset($user) && $user) {
            return $this->redirect([
                "action" => "dashboard"
            ]);
        }
        return $this->redirect([
            "action" => "login"
        ]);
    }

    public function unverifiedEmail()
    {
        $this->getRequest()->allowMethod(["get"]);
        $customer = new Customer();
        $customer->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $customer->fetchProfile() ) {
            if ($customer->getProperty("is_verified_email", false) === true) {
                $user = $this->Auth->user();
                $user["account"] = $customer;
                $this->Auth->setUser($user);
                $this->Flash->success(__("Your email is already verified"));
                return $this->redirect([
                    "action" => "dashboard"
                ]);
            }
        }
        $this->set('customer', $customer);
        $this->set('titleForLayout', __("Unverified Email"));

    }

    public function forgotPassword()
    {
        $titleForLayout = __("Forgot Password");
        $forgotPassword = new ForgotPasswordForm();
        if ( $this->getRequest()->is("post") ) {
            if ( $forgotPassword->execute($this->getRequest()->getData()) ) {
                $this->Flash->success(__("Instructions to reset your password has been successfully sent to {recipient}. Please check your SPAM or JUNK folder if you do not see it in INBOX.", [
                    'recipient' => $forgotPassword->getRecipient(),
                ]));
                return $this->redirect($this->getRequest()->getRequestTarget());
            } else {
                if ( $forgotPassword->getErrors() ) {
                    $this->response = $this->response->withStatus(400);
                } else {
                    $this->Flash->error(__("Something went wrong. Please try again later"));
                }
            }
        }
        $this->viewBuilder()->setLayout('auth');
        $this->set(compact('titleForLayout', 'forgotPassword'));
    }

    public function forgotPin()
    {
        $this->getRequest()->allowMethod(["post"]);
        $customer = new Customer();
        $customer->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $result = $customer->forgotPin();
        if ( $result === true ) {
            $this->Flash->success(__("An email with instructions on how to reset your pin has been sent to your registered email address. Please check your SPAM or JUNK folder if you do not see it in INBOX."));
        } else {
            $this->Flash->error(__("Something went wrong"));
        }
        return $this->redirect($this->referer());
    }

    public function resetPassword($token)
    {
        $titleForLayout = __("Reset Password");
        $form = new ResetPasswordForm();
        if ( $this->getRequest()->is("post") ) {
            $data = $this->getRequest()->getData();
            $data += [
                "token" => $token
            ];
            if ($form->execute($data)) {
                $this->Flash->success(__("Your password has been successfully updated. Please login with your new password."));
                return $this->redirect([
                    "controller" => "Customers",
                    "action" => "login"
                ]);
            } else {
                if ( $form->getErrors() ) {
                    $this->response = $this->response->withStatus(400);
                } else {
                    $this->Flash->error(__("Something went wrong. Please try again later"));
                }
            }
        }
        $this->viewBuilder()->setLayout('auth');
        $this->set(compact('titleForLayout', 'form'));
    }

    public function resetPin($token)
    {
        $titleForLayout = __("Reset PIN");
        $form = new ResetPinForm();
        if ( $this->getRequest()->is("post") ) {
            $data = $this->getRequest()->getData();
            $data += [
                "token" => $token
            ];
            $data["pin"] = implode("", $data["pin"]);
            $data["confirm_pin"] = implode("", $data["confirm_pin"]);
            if ($form->execute($data)) {
                $this->Flash->success(__("Your pin has been successfully updated."));
                if ( $this->Auth->user("account") ) {
                    return $this->redirect([
                        "controller" => "Customers",
                        "action" => "twoFactorAuthentication"
                    ]);
                } else {
                    return $this->redirect([
                        "controller" => "Customers",
                        "action" => "login"
                    ]);
                }
            } else {
                if ( $form->getErrors() ) {
                    $this->response = $this->response->withStatus(400);
                } else {
                    $this->Flash->error(__("Something went wrong"));
                }
            }
        }
        $this->viewBuilder()->setLayout('auth');
        $this->set(compact('titleForLayout', 'form'));
    }

    public function settings()
    {
        $customer = $this->Auth->user("account");
        $customerData = $customer->getData();
        $devices = new Collection($customerData["devices"] ?? []);
        $titleForLayout = __("Account Settings");
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'customer'));
        $this->set(compact('devices', 'devices'));
    }

    public function changePassword()
    {
        $form = new ChangePasswordForm();
        $form->setIdentity($this->Auth->user("token"));
        if ( $this->getRequest()->is("post") ) {
            $data = $this->getRequest()->getData();
            if ( $form->execute($data) ) {
                $this->Flash->success(__("Your password has been successfully updated. Please login with your new password."));
                $this->Auth->logout();
                return $this->redirect([
                    "controller" => "Customers",
                    "action" => "login"
                ]);
            } else {
                if ( $form->getErrors() ) {
                    $this->response = $this->response->withStatus(400);
                } else {
                    $this->Flash->error(__("Something went wrong. Please try again later"));
                }
            }
        }
        $this->viewBuilder()->setLayout('auth');
        $titleForLayout = __("Change Password");
        $this->set(compact('titleForLayout', 'form'));
    }

    public function preference()
    {
        $customer = $this->Auth->user("account");
        $form = new PreferencesForm();
        $form->setIdentity($this->Auth->user("token"));
        if ( $this->getRequest()->is("post") ) {
            $data = $this->getRequest()->getData();
            if ( $form->execute($data) ) {
                $user = $this->Auth->user();
                $user["account"] = $form->getCustomer();
                $this->Auth->setUser($user);
                $this->Flash->success(__("Your preferences has been successfully updated."));
                return $this->redirect([
                    "controller" => "Customers",
                    "action" => "settings"
                ]);
            } else {
                if ( $form->getErrors() ) {
                    $this->response = $this->response->withStatus(400);
                } else {
                    $this->Flash->error(__("Something went wrong. Please try again later"));
                }
            }
        }
        $titleForLayout = __("General Preferences");
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'form', 'customer'));
    }

    public function email()
    {
        $customer = $this->Auth->user("account");
        $form = new ChangeEmailForm();
        $form->setIdentity($this->Auth->user("token"));
        if ( $this->getRequest()->is("post") ) {
            if ( $form->execute($this->getRequest()->getData()) ) {
                $this->Flash->success(__("A confirmation email has been sent to {email}.", [
                    'email' => $customer->getProperty("email"),
                ]));
                return $this->redirect([
                    "controller" => "Customers",
                    "action" => "settings"
                ]);
            } else {
                if ( $form->getErrors() ) {
                    $this->response = $this->response->withStatus(400);
                } else {
                    $this->Flash->error(__("Something went wrong. Please try again later"));
                }
            }
        }
        $titleForLayout = __("E-mail Address");
        $this->viewBuilder()->setLayout('auth');
        $this->set(compact('titleForLayout', 'form', 'customer'));
    }

    public function authorizeEmailChange($token = null)
    {
        $this->getRequest()->allowMethod(["get"]);
        $customer = new Customer();
        $customer->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $data = [
            "token" => $token,
        ];
        if ( $customer->authorizeEmailUpdate($data) === true ) {
            $user = $this->Auth->user();
            $user["account"] = $customer;
            $this->Auth->setUser($user);
            $this->Flash->success(__("Your email has been successfully updated"));
        } else {
            $error = __("Your email could not be updated. Please try again later");
            if ( $customer->getErrors() ) {
                $errorArray = current($customer->getErrors());
                if ( $errorArray["message"] ?? null ) {
                    $error = $errorArray["message"];
                }
            }
            $this->Flash->error($error);
        }
        return $this->redirect([
            "action" => "dashboard"
        ]);
    }

    public function twoStepVerification()
    {
        $customer = $this->Auth->user("account");
        if ( $customer->getProperty("two_factor_enabled") === true ) {
            $form = new ChangePinForm();
        } else {
            $form = new CreatePinForm();
        }
        $form->setIdentity($this->Auth->user("token"));
        if ( $this->getRequest()->is("post") ) {
            $data = [
                "pin" => implode("", $this->getRequest()->getData("pin")),
                "confirm_pin" => implode("", $this->getRequest()->getData("confirm_pin")),
            ];
            if ( $customer->getProperty("two_factor_enabled") === true ) {
                $data += [
                    "current_pin" => implode("", $this->getRequest()->getData("current_pin")),
                ];
            }
            if ( $form->execute($data) ) {
                $user = $this->Auth->user();
                $user["account"] = $form->getCustomer();
                $this->Auth->setUser($user);
                return $this->redirect([
                    "action" => "twoFactorAuthentication",
                    "_np" => "true"
                ]);
            } else {
                if ( $form->getErrors() ) {
                    $this->response = $this->response->withStatus(400);
                } else {
                    $this->Flash->error(__("Something went wrong. Please try again later"));
                }
            }
        }
        $titleForLayout =  __("2-Step Verification");
        $this->viewBuilder()->setLayout('auth');
        $this->set(compact('titleForLayout', 'form', 'customer'));
    }

    public function turnOff2fa()
    {
        $this->getRequest()->allowMethod(["post"]);
        $customer = new Customer();
        $customer->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $customer->disableTwoFactorAuth() ) {
            $user = $this->Auth->user();
            $user["account"] = $customer;
            $this->Auth->setUser($user);
            $this->Flash->success(__("2 step verification has been disabled."));
            return $this->redirect([
                "action" => "settings"
            ]);
        } else {
            $this->Flash->error(__("Something went wrong. Please try again."));
        }
        return $this->redirect($this->referer());
    }

    public function countrySelector()
    {
        $country = new Country();
        $countries = [];
        if ( $country->sources() ) {
            $countries = $country->getCountries();
        } else {
            $this->Flash->error(__("Something went wrong. Please try again."));
        }
        $this->set(compact('countries'));
    }

    public function country( $slug = null )
    {
        $wsCountry = new Country();
        $wsCountry->all();
        $countries = $wsCountry->getCountries();
        $country = (new Collection($countries))->firstMatch([
            "slug" => $slug
        ]);
        if ( is_null($country) ) {
            $this->Flash->error(__("Something went wrong. Please try again."));
            return $this->redirect($this->referer());
        }
        $detail = $wsCountry->detail($country["id"]);
        if ( $detail === true ) {
            $country = $wsCountry->getCountry();
        } else {
            $this->Flash->error(__("Something went wrong. Please try again."));
            return $this->redirect($this->referer());
        }
        $customer = new Customer();
        $customer->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $result = $customer->setCountry($country["id"]);
        if ( $result === true ) {
            $user = $this->Auth->user();
            $user["account"] = $customer;
            $this->Auth->setUser($user);
            return $this->redirect([
                "action" => "profile"
            ]);
        } else {
            $this->Flash->error(__("Something went wrong. Please try again."));
            return $this->redirect($this->referer());
        }
    }

    public function profile($section = null)
    {
        $stepped = true;
        if ( $this->getRequest()->getQuery("_stepped") ) {
            if ( $this->getRequest()->getQuery("_stepped") === sha1($section) ) {
                $stepped = false;
            }
        }
        /** @var Customer $customer */
        $customer = $this->Auth->user("account");
        $wsCurrency = new Currency();
        $wsCurrency->all();
        $currencies = $wsCurrency->getCurrencies();
        $wsCountry = new Country();
        $wsCountry->all();
        $countries = $wsCountry->getCountries();
        $form = new CustomerForm();
        $form->setIdentity($this->Auth->user("token"));
        $countryCollection = new Collection($countries);
        $country = $countryCollection->firstMatch([
            "id" => $customer->getProperty("country_id")
        ]);
        $countryOptions = [];
        $isdCodes = [];
        $nationalityOptions = [];
        foreach ( $countryCollection as $item ) {
            $countryOptions[]   =   [
                "id" => $item["id"],
                "title" => $item["known_name"],
                "code" => $item["iso_code_alpha2"]
            ];
            $nationalityOptions[]   =   [
                "id" => $item["id"],
                "title" => trim(implode(", ", array_filter([$item["demonym"], $item["known_name"]]))),
                "code" => $item["iso_code_alpha2"]
            ];
            $isdCodes[]   =   [
                "id" => $item["id"],
                "title" => "+".$item["isd_code"]." ".$item["known_name"],
                "country_code" => $item["iso_code_alpha2"],
                "isd_code" => "+".$item["isd_code"]
            ];
        }
        $sectionCollection = new Collection($customer->getData()["sections"] ?? []);
        $individualSectionCollection = $sectionCollection->match([
            "is_business" => false
        ]);
        $currentSection = null;
        if ( $section ) {
            $currentSection = $individualSectionCollection->match([
                "id" => $section
            ])->first();
        }
        if ( is_null($currentSection) ) {
            $currentSection = $individualSectionCollection->first();
        }

        $currentSectionIndex = $individualSectionCollection->stopWhen(function ($item) use ($currentSection){
            return $item["id"] === $currentSection["id"];
        })->count();

        $previousStep = null;
        if ( $currentSectionIndex > 0 ) {
            $previousStep = $individualSectionCollection->toArray()[$currentSectionIndex-1];
        }

        $nextStep = $individualSectionCollection->toArray()[$currentSectionIndex+1] ?? null;

        $individualSections = $individualSectionCollection->map(function($item, $index) use($currentSectionIndex){
            $item["class"] = "disabled";
            if ( $index < $currentSectionIndex ) {
                $item["class"] = "completed";
            } else if ( $index === $currentSectionIndex ) {
                $item["class"] = "active";
            }
            return $item;
        });

        if ( empty($currentSection["properties"]) ) {
            $this->Flash->error(__("Sorry we are not ready with {country_name}.", [
                'country_name' => $country["known_name"],
            ]));
            return $this->redirect([
                "action" => "countrySelector"
            ]);
        }

        foreach ( $currentSection["properties"] as $rowProperties ) {
            foreach ( $rowProperties as $property ) {
                if (in_array($property["property"], $currentSection["guarded"]) === false) {
                    $form->addProperty($property);
                }
            }
        }
        if ( $this->getRequest()->is(["put", "patch", "post"]) ) {
            $form->setSection($currentSection["id"]);
            $data = new \ArrayObject($this->getRequest()->getData());
            $form->marshal($data);
            $form->execute($data->getArrayCopy());
            if ( empty($form->getErrors()) ) {
                $user = $this->Auth->user();
                $user["account"] = $form->getCustomer();
                $this->Auth->setUser($user);
                if ( $stepped === true ) {
                    if ( $nextStep ) {
                        return $this->redirect([
                            "action" => "profile",
                            $nextStep["id"]
                        ]);
                    } else {
                        return $this->redirect([
                            "action" => "dashboard",
                        ]);
                    }
                } else {
                    $this->Flash->success(__("Your {section_title} has been successfully updated.", [
                        'section_title' => $currentSection["title"]
                    ]));
                    return $this->redirect([
                        "action" => "dashboard",
                    ]);
                }
            }
        }
        $titleForLayout = $currentSection["title"];
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'individualSections', 'currentSection', 'form', 'countryOptions', 'nationalityOptions', 'customer', 'isdCodes', 'currencies', 'previousStep', 'stepped'));
    }

    public function recentDevices()
    {
        /** @var Customer $customer */
        $customer = $this->Auth->user("account");
        $customerData = $customer->getData();
        $devices = new Collection($customerData["devices"] ?? []);
        $titleForLayout = __("Devices");
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'devices'));
    }

    public function documents()
    {
        $wsCustomer = new Customer();
        $wsCustomer->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $result = $wsCustomer->fetchProfile();
        $customer = $this->Auth->user("account");
        if ( $result === true ) {
            $customer = $wsCustomer;
        }
        $titleForLayout =  __("Documents");
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'customer'));
    }

    public function uploadDocument($id = NULL)
    {
        /** @var Customer $customer */
        $customer = $this->Auth->user("account");
        $wsCountry = new Country();
        $wsCountry->detail($customer->getProperty("country.id"));
        $country = $wsCountry->getCountry();
        $categories = (new Collection((array)($country["document_categories"] ?? [])));
        $documentSettings = $categories->firstMatch([
            "id" => $id
        ]);
        $titleForLayout =  __("Upload - {document_title}", [
            'document_title' => $documentSettings["title"],
        ]);
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'customer', 'documentSettings'));
    }

    /**
     * @param null $id
     * @return \Cake\Http\Response|null
     * @throws \Exception
     */
    public function fileUpload( $id = NULL )
    {
        /** @var Customer $customer */
        $customer = $this->Auth->user("account");
        $customer->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $wsCountry = new Country();
        $wsCountry->all();
        $countries = $wsCountry->getCountries();
        $wsCountry->detail($customer->getProperty("country.id"));
        $country = $wsCountry->getCountry();
        $categories = (new Collection((array)($country["document_categories"] ?? [])));
        $documentSettings = $categories->firstMatch([
            "id" => $this->getRequest()->getQuery("category")
        ]);
        $documentType = (new Collection((array)$documentSettings["documents"]))->firstMatch([
            "id" => $id
        ]);
        $maxFileSize = '8MB';
        $form = new DocumentForm();
        if ( $this->getRequest()->is("post") ) {
            $form->setCustomer($customer);
            $form->setDocumentCategory($documentSettings["id"]);
            $form->setDocumentType($documentType["id"]);
            $data = new \ArrayObject($this->getRequest()->getData());
            $form->marshal($data);
            if ( $form->execute($data->getArrayCopy()) ) {
                $user = $this->Auth->user();
                $user["account"] = $customer;
                $this->Auth->setUser($user);
                if ($form->getFlashMessage()) {
                    if ($form->getFlashType() === 'success') {
                        $this->Flash->success($form->getFlashMessage());
                    } elseif ($form->getFlashType() === 'error') {
                        $this->Flash->error($form->getFlashMessage());
                    }
                } else {
                    $this->Flash->success(__("{document_type} has been successfully uploaded.", [
                        "document_type" =>  $documentType["title"]
                    ]));
                }
            } else {
                $this->Flash->error(__("Something went wrong. Please check your inputs"));
            }
        }
        $titleForLayout =  __("Upload - {document_type}", ["document_type" =>  $documentType["title"]]);
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact('titleForLayout', 'documentType', 'maxFileSize', 'countries', 'form', 'documentSettings', 'categories'));
    }

    public function uploadRawFile()
    {
        $this->getRequest()->allowMethod(["post"]);
        $form = new class extends Form{
            public $pages = [];
            public function validationDefault(Validator $validator)
            {
                $validator
                    ->isArray("file")
                    ->requirePresence("file")
                    ->notEmptyFile("file")
                    ->add("file", "mimeType", [
                        "rule" => [ "mimeType", [
                            "application/pdf",
                            "image/png",
                            "image/jpg",
                            "image/jpeg",
                        ] ]
                    ])
                    ->add("file", "fileSize", [
                        "rule" => [
                            "fileSize", "<=", '8MB'
                        ],
                        'message' => __("File should be less than 8 MB")
                    ]);
                return $validator;
            }
            protected function _execute(array $data)
            {
                $manager = new ImageManager(array('driver' => 'imagick'));
                if ( $data["file"]["type"] === "application/pdf" ) {
                    $pdfPath = TMP.uniqid().".pdf";
                    move_uploaded_file($data["file"]["tmp_name"], $pdfPath);
                    $pdf = new Pdf($pdfPath);
                    $pages = $pdf->getNumberOfPages();
                    $id = Text::uuid().".png";
                    $pdf->setPage(1)
                        ->setCompressionQuality(100)
                        ->setOutputFormat("png")
                        ->saveImage(TMP.$id);
                    $img = $manager->make(TMP.$id);
                    $img->resize(320, 320, function ( Constraint $constraint ) {
                        $constraint->upsize();
                    });
                    $img->save(TMP."thumb_".$id, 95);
                    array_push($this->pages, [
                        "id" => $id,
                        "data_uri" =>   InlineImage::getDataURI(TMP."thumb_".$id)
                    ]);
                    unlink(TMP."thumb_".$id);
                    if ( $pages > 1 ) {
                        $id = Text::uuid().".png";
                        $pdf->setPage($pages)
                            ->setCompressionQuality(100)
                            ->setOutputFormat("png")
                            ->saveImage(TMP.$id);
                        $img = $manager->make(TMP.$id);
                        $img->resize(320, 320, function ( Constraint $constraint ) {
                            $constraint->upsize();
                        });
                        $img->save(TMP."thumb_".$id, 95);
                        array_push($this->pages, [
                            "id" => $id,
                            "data_uri" =>   InlineImage::getDataURI(TMP."thumb_".$id)
                        ]);
                        unlink(TMP."thumb_".$id);
                    }
                    unlink($pdfPath);
                } else {
                    $fileExploded = explode(".", $data["file"]["name"]);
                    $extension = end($fileExploded);
                    $id = Text::uuid().".".$extension;
                    move_uploaded_file($data["file"]["tmp_name"], TMP.$id);
                    $img = $manager->make(TMP.$id);
                    $img->resize(320, 320, function ( Constraint $constraint ) {
                        $constraint->upsize();
                    });
                    $img->save(TMP."thumb_".$id, 95);
                    array_push($this->pages, [
                        "id" => $id,
                        "data_uri" =>   InlineImage::getDataURI(TMP."thumb_".$id)
                    ]);
                }
                return true;
            }
        };
        $this->response = $this->response->withType("json");
        if ( $form->execute($this->getRequest()->getData()) ) {
            $body = json_encode([
                "pages" => $form->pages
            ]);
        } else {
            $this->response = $this->response->withStatus(400);
            $body = json_encode($form->getErrors());
        }
        $this->response = $this->response->withStringBody($body);
        return $this->response;
    }

    public function blocked()
    {
        $this->viewBuilder()->setLayout('info');
        $titleForLayout =  __("Account Under Review");
        $this->set(compact("titleForLayout"));
    }

    public function savedCards()
    {
        $wsCustomer = new Customer();
        $wsCustomer->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        $cards = [];
        if ( $wsCustomer->getSavedCards() === true ) {
            $cards = $wsCustomer->getCards();
        }
        $titleForLayout =  __("Saved Cards");
        $this->viewBuilder()->setLayout("dashboard");
        $this->set(compact("titleForLayout", "cards"));
    }

    public function deleteCard($id = null)
    {
        $wsCustomer = new Customer();
        $wsCustomer->addHeaders([
            "X-User-Token" => $this->Auth->user("token")
        ]);
        if ( $wsCustomer->deleteSavedCard($id) === true ) {
            $this->Flash->success(__("Card has been successfully deleted."));
        } else {
            $this->Flash->error(__("Card could not be deleted. Please try again."));
        }
        return $this->redirect($this->referer());
    }

}
