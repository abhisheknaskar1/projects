<?php

/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

return static function (RouteBuilder $routes) {

    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'index']);
        $builder->connect('/features', ['controller' => 'Pages', 'action' => 'features']);
        $builder->connect('/Pricing', ['controller' => 'Pages', 'action' => 'pricing']);
        $builder->connect('/request-demo', ['controller' => 'Pages', 'action' => 'landing']);
        $builder->connect('/frequently-asked-questions', ['controller' => 'Pages', 'action' => 'faq']);
        $builder->connect('/privacy-policy', ['controller' => 'Pages', 'action' => 'privacyPolicy']);
        $builder->connect('/terms', ['controller' => 'Pages', 'action' => 'terms']);
        $builder->connect('/thank-you', ['controller' => 'Pages', 'action' => 'thankYou']);
        $builder->connect('/whitepaper-for-ml', ['controller' => 'Pages', 'action' => 'whitepaper']);
        $builder->connect('/contact', ['controller' => 'Pages', 'action' => 'contact']);
        $builder->connect('/start-up-support', ['controller' => 'Pages', 'action' => 'startupSupport']);
        $builder->connect('/team', ['controller' => 'Pages', 'action' => 'team']);
        $builder->connect('/partner', ['controller' => 'Pages', 'action' => 'partner']);
        $builder->connect('/money-transfer-software-development', ['controller' => 'Pages', 'action' => 'ourExpertise']);
        $builder->connect('/event', ['controller' => 'Pages', 'action' => 'event']);
        $builder->connect('/index-demo', ['controller' => 'Pages', 'action' => 'indexDemo']);
        $builder->connect('/remitso-try-now-for-free', ['controller' => 'Pages', 'action' => 'error']);
        $builder->connect('/innovation-in-global-money-transfer', ['controller' => 'Pages', 'action' => 'innovation']);
        // $builder->connect('/support', ['controller' => 'Pages', 'action' => 'support']);
        $builder->connect('/remittance-consulting', ['controller' => 'Pages', 'action' => 'consulting']);
        $builder->connect('/html-sitemap', ['controller' => 'Pages', 'action' => 'htmlSitemap']);
        $builder->connect('/aml-consulting', ['controller' => 'Pages', 'action' => 'aml']);
        $builder->connect('/remitso-case-studies', ['controller' => 'Pages', 'action' => 'caseStudies']);
        $builder->connect('/regulatory-questions', ['controller' => 'Pages', 'action' => 'regulatoryQuestions']);

        $builder->connect('/bank', ['controller' => 'Pages', 'action' => 'bank']);
        $builder->connect('/credit-union', ['controller' => 'Pages', 'action' => 'creditUnion']);
        $builder->connect('/exchange-house', ['controller' => 'Pages', 'action' => 'exchangeHouse']);
        $builder->connect('/fintech', ['controller' => 'Pages', 'action' => 'fintech']);
        $builder->connect('/neo-bank', ['controller' => 'Pages', 'action' => 'neoBank']);
        $builder->connect('/money-transfer', ['controller' => 'Pages', 'action' => 'moneyTransfer']);
        $builder->connect('/expert', ['controller' => 'Pages', 'action' => 'expert']);
        $builder->connect('/technicalfaqs', ['controller' => 'Pages', 'action' => 'technicalfaqs']);
        $builder->connect('/thankyou', ['controller' => 'Pages', 'action' => 'thankyouwhite']);

        //    <-----------------------------------Blogs-------------------------------------->
        $builder->connect('/blogs/what-is-electronic-remittance-advice-in-cross-border-payments', ['controller' => 'Blogs', 'action' => 'blog63']);
        $builder->connect('/blogs/how-to-build-a-p2p-money-transfer-app-in-2025', ['controller' => 'Blogs', 'action' => 'blog62']);
        $builder->connect('/blogs/futuristic-mobile-app-security', ['controller' => 'Blogs', 'action' => 'blog61']);
        $builder->connect('/blogs/money-transmitter-license', ['controller' => 'Blogs', 'action' => 'blog60']);
        $builder->connect('/blogs/how-to-choose-a-reliable-money-transfer-service-provider-in-2025', ['controller' => 'Blogs', 'action' => 'blog59']);
        $builder->connect('/blogs/fatf-compliance-checklist-for-money-transfer-companies', ['controller' => 'Blogs', 'action' => 'blog58']);
        $builder->connect('/blogs/6-steps-to-building-an-effective-aml-compliance-program', ['controller' => 'Blogs', 'action' => 'blog57']);
        $builder->connect('/blogs/start-neobank-in-2025', ['controller' => 'Blogs', 'action' => 'blog56']);
        $builder->connect('/blogs/how-to-start-a-money-remittance-business-in-canada', ['controller' => 'Blogs', 'action' => 'blog55']);
        $builder->connect('/blogs/ultimate-guide-to-starting-a-profitable-money-transfer-business-in-ghana', ['controller' => 'Blogs', 'action' => 'blog54']);
        $builder->connect('/blogs/how-to-start-a-successful-money-transfer-business-in-saudi-arabia', ['controller' => 'Blogs', 'action' => 'blog53']);
        $builder->connect('/blogs/starting-a-successful-remittance-and-money-transfer-business-in-kuwait', ['controller' => 'Blogs', 'action' => 'blog52']);
        $builder->connect('/blogs/how-money-transfer-companies-stay-compliant-with-global-regulations', ['controller' => 'Blogs', 'action' => 'blog51']);
        $builder->connect('/blogs/start-a-money-transfer-business-in-the-usa-2025-a-complete-guide', ['controller' => 'Blogs', 'action' => 'blog50']);
        $builder->connect('/blogs/how-to-set-up-a-money-transfer-business-in-switzerland', ['controller' => 'Blogs', 'action' => 'blog49']);
        $builder->connect('/blogs/money-transfer-license-in-nigeria-a-comprehensive-guide-to-imto-regulations', ['controller' => 'Blogs', 'action' => 'blog48']);
        $builder->connect('/blogs/launch-a-profitable-money-transfer-and-remittance-business-in-brazil', ['controller' => 'Blogs', 'action' => 'blog47']);
        $builder->connect('/blogs/how-to-start-a-money-transfer-business-in-australia', ['controller' => 'Blogs', 'action' => 'blog46']);
        $builder->connect('/blogs/a-simple-guide-to-starting-a-money-transfer-business-in-nigeria-2025', ['controller' => 'Blogs', 'action' => 'blog45']);
        $builder->connect('/blogs/what-is-a-remittance-payment', ['controller' => 'Blogs', 'action' => 'blog44']);
        $builder->connect('/blogs/how-to-send-money-from-china-legally-in-2025', ['controller' => 'Blogs', 'action' => 'blog43']);
        $builder->connect('/blogs/why-software-platforms-are-the-future-of-business-success-in-2025', ['controller' => 'Blogs', 'action' => 'blog42']);
        $builder->connect('/blogs/a-complete-guide-for-how-to-send-an-international-money-order', ['controller' => 'Blogs', 'action' => 'blog41']);
        $builder->connect('/blogs/remittance-advice-definition-benefits-and-best-practices', ['controller' => 'Blogs', 'action' => 'blog40']);
        $builder->connect('/blogs/how-using-white-label-software-can-benefit-your-business-in-2025', ['controller' => 'Blogs', 'action' => 'blog39']);
        $builder->connect('/blogs/step-by-step-guide-to-getting-a-money-transfer-license-in-the-uae', ['controller' => 'Blogs', 'action' => 'blog38']);
        $builder->connect('/blogs/how-to-start-a-money-transfer-business-in-2025-a-complete-guide', ['controller' => 'Blogs', 'action' => 'blog37']);
        $builder->connect('/blogs/how-to-create-a-money-transfer-app-step-by-Step-guide-2025', ['controller' => 'Blogs', 'action' => 'blog36']);
        $builder->connect('/blogs/the-p2p-payment-breakthrough-the-future-of-payment-processing-with-money-remittance-software', ['controller' => 'Blogs', 'action' => 'blog35']);
        $builder->connect('/blogs/five-top-practices-to-run-a-compliant-money-transfer-business', ['controller' => 'Blogs', 'action' => 'blog34']);
        $builder->connect('/blogs/how-remittance-works-a-comprehensive-guide-to-global-money-transfers', ['controller' => 'Blogs', 'action' => 'blog33']);
        $builder->connect('/blogs/the-best-remittance-software-solutions-how-to-choose-the-right-platform-for-your-money-transfer-business', ['controller' => 'Blogs', 'action' => 'blog32']);
        $builder->connect('/blogs/transparent-fx-for-payouts-cut-costs-and-build-trust-in-global-payments', ['controller' => 'Blogs', 'action' => 'blog31']);
        $builder->connect('/blogs/how-to-apply-for-a-money-transfer-license-in-canada', ['controller' => 'Blogs', 'action' => 'blog30']);
        $builder->connect('/blogs/7-benefits-of-the-best-international-money-transfer-software', ['controller' => 'Blogs', 'action' => 'blog29']);
        $builder->connect('/blogs/top-5-challenges-in-the-remittance-industry-and-how-to-overcome-them', ['controller' => 'Blogs', 'action' => 'blog28']);
        $builder->connect('/blogs/b2b-international-payments-essential-benefits-biggest-challenges-and-smart-solutions-for-2024', ['controller' => 'Blogs', 'action' => 'blog27']);
        $builder->connect('/blogs/top-5-emerging-technologies-in-cross-border-money-transfers', ['controller' => 'Blogs', 'action' => 'blog26']);
        $builder->connect('/blogs/the-growing-impact-of-open-banking-apis-enefits-security-and-challenges', ['controller' => 'Blogs', 'action' => 'blog25']);
        $builder->connect('/blogs/why-compliance-is-crucial-for-white-Label-money-transfer-solutions', ['controller' => 'Blogs', 'action' => 'blog24']);
        $builder->connect('/blogs/5-proven-strategies-to-avoid-hidden-fees-when-sending-money-abroad', ['controller' => 'Blogs', 'action' => 'blog23']);
        $builder->connect('/blogs/how-to-start-a-money-transfer-business-a-guide-for-the-uk-us-and-canada', ['controller' => 'Blogs', 'action' => 'blog22']);
        $builder->connect('/blogs/5-essential-rules-for-aml-and-transaction-monitoring-teams', ['controller' => 'Blogs', 'action' => 'blog21']);
        $builder->connect('/blogs/the-indispensable-role-of-sanctions-screening', ['controller' => 'Blogs', 'action' => 'blog20']);
        $builder->connect('/blogs/the-programming-language-myth', ['controller' => 'Blogs', 'action' => 'blog19']);
        $builder->connect('/blogs/journey-of-a-money-transfer-operator', ['controller' => 'Blogs', 'action' => 'blog18']);
        $builder->connect('/blogs/monolithic-vs-microservice-architecture', ['controller' => 'Blogs', 'action' => 'blog17']);
        $builder->connect('/blogs/empowering-money-transfer-operators', ['controller' => 'Blogs', 'action' => 'blog16']);
        $builder->connect('/blogs/who-is-a-remitter', ['controller' => 'Blogs', 'action' => 'blog15']);
        $builder->connect('/blogs/how-to-build-a-profitable-&-ethical-money-transfer-business', ['controller' => 'Blogs', 'action' => 'blog14']);
        $builder->connect('/blogs/what-is-a-transaction-processing-system', ['controller' => 'Blogs', 'action' => 'blog13']);
        $builder->connect("/blogs/from-idea-to-launch-the-mta's-guide-to-digital-transformation", ['controller' => 'Blogs', 'action' => 'blog12']);
        $builder->connect('/blogs/the-future-of-remittances', ['controller' => 'Blogs', 'action' => 'blog11']);
        $builder->connect('/blogs/how-remittance-as-a-service-is-revolutionizing-the-money-transfer-industry', ['controller' => 'Blogs', 'action' => 'blog10']);

        $builder->connect('/blogs', ['controller' => 'Blogs', 'action' => 'index']);
        $builder->connect('/blogs/streamlining-international-money-transfers', ['controller' => 'Blogs', 'action' => 'blog6']);
        $builder->connect('/blogs/safeguarding-your-customers-international-money-transfer-transactions', ['controller' => 'Blogs', 'action' => 'blog7']);
        $builder->connect('/blogs/how-digital-remittance-solutions-are-bridging-global-payment-gaps', ['controller' => 'Blogs', 'action' => 'blog8']);
        $builder->connect('/blogs/how-remitSo-revolutionized-remittance-operations', ['controller' => 'Blogs', 'action' => 'blog9']);


        $builder->connect('/country-united-kingdom', ['controller' => 'Providers', 'action' => 'unitedKingdom']);
        $builder->connect('/country-united-states', ['controller' => 'Providers', 'action' => 'unitedStates']);
        $builder->connect('/country-uae', ['controller' => 'Providers', 'action' => 'uae']);
        $builder->connect('/country-australia', ['controller' => 'Providers', 'action' => 'australia']);
        $builder->connect('/country-new-zealand', ['controller' => 'Providers', 'action' => 'newZealand']);
        $builder->connect('/country-germany', ['controller' => 'Providers', 'action' => 'germany']);
        $builder->connect('/country-france', ['controller' => 'Providers', 'action' => 'france']);

        $builder->fallbacks();
    });
};
