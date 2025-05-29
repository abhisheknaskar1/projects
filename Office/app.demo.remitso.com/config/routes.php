<?php

use Cake\Core\Configure;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);
function __getMyRouteBuilder(RouteBuilder $routes)
{
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'secure' => true,
        'httpOnly' => true,
    ]));
    $routes->applyMiddleware('csrf');
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'index']);
    $routes->connect('/login.html', ['controller' => 'Customers', 'action' => 'login']);
    $routes->connect('/register.html', ['controller' => 'Customers', 'action' => 'register']);
    $routes->connect('/forgot-password.html', ['controller' => 'Customers', 'action' => 'forgotPassword']);
    $routes->connect('/two-factor-authentication.html', ['controller' => 'Customers', 'action' => 'twoFactorAuthentication']);
    $routes->connect('/verify-email/:token', [
        'controller' => 'Customers',
        'action' => 'verifyEmail'
    ])->setPass([
        "token"
    ]);
    $routes->connect('/reset-password/:token', [
        'controller' => 'Customers',
        'action' => 'resetPassword'
    ])->setPass([
        "token"
    ]);
    $routes->connect('/reset-pin/:token', [
        'controller' => 'Customers',
        'action' => 'resetPin'
    ])->setPass([
        "token"
    ]);
    $routes->connect('/authorize-email-change/:token', [
        'controller' => 'Customers',
        'action' => 'authorizeEmailChange'
    ])->setPass([
        "token"
    ]);
    $routes->connect('/recipients/wizard/recipient-type', [
        'controller' => 'Recipients',
        'action' => 'wizardRecipientType'
    ]);
    $routes->connect('/recipients/wizard/delivery-method/:recipient_type', [
        'controller' => 'Recipients',
        'action' => 'wizardDeliveryMethod'
    ]);

    $routes->connect('/send-money-from-{slug}-to-{country}.html', ['controller' => 'Pages', 'action' => 'sendMoneyFromTo'])
        ->setPass(['slug', 'country']);
    $routes->connect('/send-money-from-{slug}.html', ['controller' => 'Pages', 'action' => 'sendMoneyFrom'])
    ->setPass(['slug']);
    $routes->connect('/send-money-to-{slug}.html', ['controller' => 'Pages', 'action' => 'sendMoneyTo'])
    ->setPass(['slug']);

    $routes->connect('/destination-countries.html', ['controller' => 'Pages', 'action' => 'destinationCountries']);
    $routes->connect('/payment-delivery-methods.html', ['controller' => 'Pages', 'action' => 'paymentDeliveryMethods']);
    $routes->connect('/how-it-works.html', ['controller' => 'Pages', 'action' => 'howItWorks']);
    $routes->connect('/about-us.html', ['controller' => 'Pages', 'action' => 'about']);
    $routes->connect('/our-partners.html', ['controller' => 'Pages', 'action' => 'partners']);
    $routes->connect('/payout-network.html', ['controller' => 'Pages', 'action' => 'destinations']);
    $routes->connect('/payment-methods.html', ['controller' => 'Pages', 'action' => 'paymentMethods']);
    $routes->connect('/payout-methods.html', ['controller' => 'Pages', 'action' => 'payoutMethods']);
    $routes->connect('/contact-us.html', ['controller' => 'Pages', 'action' => 'contact']);
    $routes->connect('/user-agreement.html', ['controller' => 'Pages', 'action' => 'agreement']);
    $routes->connect('/payment-card-tnc.html', ['controller' => 'Pages', 'action' => 'paymentCardTermsAndConditions']);
    $routes->connect('/privacy-policy.html', ['controller' => 'Pages', 'action' => 'privacyPolicy']);
    $routes->connect('/compliance-policy.html', ['controller' => 'Pages', 'action' => 'compliancePolicy']);
    $routes->connect('/how-to-protect-yourself-from-fraud.html', ['controller' => 'Pages', 'action' => 'fraud']);
    $routes->connect('/cookie-policy.html', ['controller' => 'Pages', 'action' => 'cookiePolicy']);
    $routes->connect('/complaints-and-feedback.html', ['controller' => 'Pages', 'action' => 'complaintsAndFeedback']);
    $routes->connect('/frequently-asked-questions.html', ['controller' => 'Pages', 'action' => 'faq']);
    $routes->connect('/verification/upload/:id', [
        'controller' => 'Customers',
        "action" => "uploadRawFile"
    ])->setPass(["id"]);
    $routes->connect('/send-money.html', ['controller' => 'Orders', 'action' => 'send']);
    $routes->connect('/frequently-asked-questions.html', ['controller' => 'Pages', 'action' => 'faq']);
    $routes->connect('/faq/get-started.html', ['controller' => 'Faq', 'action' => 'getStarted']);
    $routes->connect('/faq/send-&-receive-money.html', ['controller' => 'Faq', 'action' => 'sendReceiveMoney']);
    $routes->connect('/faq/registration-&transaction-process.html', ['controller' => 'Faq', 'action' => 'registration']);
    $routes->connect('/faq/changes-&-KYC.html', ['controller' => 'Faq', 'action' => 'changesKyc']);
    $routes->connect('/faq/cancellations-&-refunds.html', ['controller' => 'Faq', 'action' => 'cancellations']);
    $routes->connect('/faq/accounts-&-security.html', ['controller' => 'Faq', 'action' => 'accounts']);
    $routes->connect('/faq/terms-&-conditions.html', ['controller' => 'Faq', 'action' => 'tc']);
    $routes->connect('/faq/troubleshooting-&-technical-issues.html', ['controller' => 'Faq', 'action' => 'troubleshooting']);
    $routes->connect('/faq/using-the-ATLMoney-app.html', ['controller' => 'Faq', 'action' => 'usingTheApp']);

    $routes->fallbacks(DashedRoute::class);
}
Router::scope('/', function (RouteBuilder $routes) {
    __getMyRouteBuilder($routes);
});

foreach (array_keys(Configure::read("languages", [])) as $locale) {
    Router::scope('/' . mb_strtolower(str_replace('_', '-', $locale)), ['language' => $locale], function (RouteBuilder $routes) {
        __getMyRouteBuilder($routes);
    });
}
