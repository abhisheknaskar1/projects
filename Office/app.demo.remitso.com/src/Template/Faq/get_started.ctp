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
                    <h3 class="font-weight-bold mb-5"><?php echo __('GET STARTED')?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4">
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>1. What does DemoApp do?</b>');?></h5>
                        <p><?php echo __('DemoApp is a high-quality platform for transferring money globally. It enables you to send money to any part of the world through its website. Unlike traditional money transfer services that depend on offline methods, DemoApp utilizes advanced online technologies. This means that your entire transaction is conducted online, providing convenience. Moreover, we strive to keep our commission charges low and offer our customers great exchange rates.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>2. How does DemoApp ensure your money is sent securely?</b>');?></h5>
                        <p><?php echo __('DemoApp prioritizes the security of your money and employs various measures to ensure safe transactions. Here\'s how we ensure the security of your funds:');?></p>
                        <ul style="list-style-type: square">
                            <li><?php echo __('Regulation and Authorization: DemoApp is a registered and authorized money transfer platform under the Financial Conduct Authority (Registration Number - 123456). We operate in compliance with the regulatory standards set by the authorities.');?></li>
                            <li><?php echo __('Supervision: We are supervised by HM Revenue and Customs (HMRC), ensuring that we adhere to anti-money laundering (AML) and counter-terrorism financing (CTF) regulations.');?></li>
                            <li><?php echo __('Data Protection: DemoApp operates under the UK Information Commissioner\'s Office (ICO), ensuring the protection of your personal and financial information.');?></li>
                            <li><?php echo __('Secure Technology: We utilize cutting-edge online technologies to safeguard your transactions. Our platform employs encryption and other security measures to protect your data from unauthorized access.');?></li>
                            <li><?php echo __('Track Record: DemoApp processes thousands of transactions every month, building a track record of trust and reliability in the industry.');?></li>
                        </ul>
                        <p><?php echo __('You can trust DemoApp to handle your money securely and transfer it with peace of mind.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>3. Can I send money using a debit or credit card?</b>');?></h5>
                        <p><?php echo __('Yes, you can use both debit and credit cards to make payments through DemoApp. When using a GBP Debit Card, there is a small charge of 0.50%. However, when using a Credit Card or an international card (excluding UK and EU), the processing cost may exceed 3%, depending on the issuing bank and country. Please note that these charges are subject to variation over time.');?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
