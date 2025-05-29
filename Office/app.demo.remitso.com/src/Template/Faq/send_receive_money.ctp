<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;

if ($this->getRequest()->getQuery("media") === "app") {
    $this->layout = 'app';
}
?>
<main id="main">
    <section id="faq" class="faq section-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 ml-lg-4">
                    <h3 class="font-weight-bold mb-5"><?php echo __('SEND & RECEIVE MONEY.')?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4">
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>1. How do foreign exchange rates affect global money transfers?</b>');?></h5>
                        <p><?php echo __('No worries, exchange rates can be complex for everyone, but it is simple to understand. An exchange rate is when one currency will be exchanged for another currency. These exchange rates are not constant and can fluctuate from time to time. Therefore we have a separate section on exchange rates on our homepage to check all the current rates visible on our website or app.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>2. What services does DemoApp offer?</b>');?></h5>
                        <p><?php echo __('DemoApp provides a range of services including:');?></p>
                        <ol type="a">
                            <li><?php echo __('Instant Mobile Wallet Delivery: Send money to over 15 countries with funds delivered directly to mobile wallets.');?></li>
                            <li><?php echo __('Direct Cash Pickup: Choose from over 50,000 locations worldwide where recipients can pick up cash.');?></li>
                            <li><?php echo __('Secure Bank Deposits: Send money securely to bank accounts in over 60 countries across 4 continents.');?></li>
                        </ol>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>3. To which countries can I send money?</b>');?></h5>
                        <p><?php echo __('You can send money to more than 60 countries worldwide through DemoApp. The available services (such as bank transfer or cash pickup) depend on both your registered country and the recipient\'s country');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>4. How do I transfer money online?</b>');?></h5>
                        <p><?php echo __('Transferring money online with DemoApp is a simple process. Follow these easy steps:');?></p>
                        <ol>
                            <li><?php echo __('Register on the website with your relevant details.');?></li>
                            <li><?php echo __('Click on "Start Sending" and follow the on-screen instructions to send money easily.');?></li>
                        </ol>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>5. What is the best time to send money abroad?</b>');?></h5>
                        <p><?php echo __('Exchange rates fluctuate, so we provide an exchange rate column on our homepage where you can check the current rates. This way, you can choose the most suitable time to send money. While we cannot guarantee the absolute best time, we strive to offer great exchange rates and low fees.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>6. What is the minimum and maximum amount that can be sent?</b>');?></h5>
                        <p><?php echo __('For the first transactions, we require verification (KYC) regardless of the amount. Once you\'ve confirmed your DemoApp account, you can send up to £10,000 per transaction online via Bank Transfer and a maximum of £5,000 via card. However, you can make multiple card payments in a day.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>7. What details are required to send money abroad?</b>');?></h5>
                        <p><?php echo __('The specific details required may vary depending on the recipient\'s country and compliance checks. Generally, you need to provide the recipient\'s bank details and the bank\'s IBAN code. After making a bank transfer, you will receive a confirmation email or message. Please note that it may take some time for the money to reach the recipient\'s bank account due to compliance checks. You can check the status of your bank transfer by visiting our website or app.');?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
