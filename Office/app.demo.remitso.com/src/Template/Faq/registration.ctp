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
                    <h3 class="font-weight-bold mb-5"><?php echo __('REGISTRATION & TRANSACTION PROCESS')?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4">
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>1. Do I need to register to send money abroad?</b>');?></h5>
                        <p><?php echo __('Yes, you will need to register with us to send money abroad. It will only take a minute to register with us. Once you have registered, you can check the countries and payment methods list and verify with DemoApp before transfer. Thank you for choosing us and sending money worldwide with great exchange rates and low fees.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>2. What is the benefit of registering with DemoApp?</b>');?></h5>
                        <p><?php echo __('Registering with DemoApp gives you access to:');?></p>
                        <ul style="list-style-type: none">
                            <li><?php echo __('- A tried, tested, and trusted money transfer platform.');?></li>
                            <li><?php echo __('- An authorized, regulated, and trusted money transfer service.');?></li>
                            <li><?php echo __('- A 24/7 customer service channel equipped to resolve all your issues.');?></li>
                            <li><?php echo __('- The best exchange rates and low commission charges.');?></li>
                        </ul>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>3. How do I get registered and start sending money?</b>');?></h5>
                        <p><?php echo __('Registration is a simple process. You need to log on to the DemoApp website ')?><a href="<?php echo $this->Url->build(['controller' => 'Pages', 'action' => 'contact', '_base' => $locale,])?>" class="theme-link"><?php echo __('[https://DemoApp.com/contact-us.html]')?></a><?php echo __(' and click on the registration link on the home page or follow the services register and fill up the registration form providing all the required details.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>4. Can I get directly registered on DemoApp by sending mail?</b>');?></h5>
                        <p><?php echo __('No, you need to fill in the registration form available on the DemoApp website.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>5. Do I need to pay before registering?</b>');?></h5>
                        <p><?php echo __('No, it is FREE of cost, and it will take only a few minutes to register with us. After registration, you can check the current rates on our website and send money accordingly to your loved ones. Also, you can register yourself by visiting our website or app on any electronic device.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>6. Can I register twice with the same contact number or email address?</b>');?></h5>
                        <p><?php echo __('We do not encourage registering twice with the same contact number and email address. We recommend one account per customer at a time to avoid confusion during the verification process. Please register once with a valid contact number and email address.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>7. Can I register again from a different country other than my sending country?</b>');?></h5>
                        <p><?php echo __('No, you can only register once in DemoApp with your verified email address from your sending country, where you are currently residing. Registering from another country with the same email address will not be accepted. You can log in with your registered email address from anywhere.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>8. Do I need to register again if I travel to a different country?</b>');?></h5>
                        <p><?php echo __('No, you can only register once in DemoApp with your verified email address from your sending country, where you are currently residing. Creating two accounts with the same email address and contact number is not possible. You can log into the same account even if you are not in your native country. If you are permanently moving to a different country, you can change your sending country by going to "my account" and making the necessary changes.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h6><?php echo __('<b>[Processing your transaction]</b>');?></h6>
                        <h5><?php echo __('<b>9. How long does it generally take to complete the processing?</b>');?></h5>
                        <p><?php echo __('The time it takes for your funds to reach us depends on the mode of payment. We aim to process transactions as soon as possible. Once the transaction is confirmed, you will receive a confirmation email or message regarding the progress of your transfer. For further information, contact our ABC Customer Service Team.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>10. How will I know that my money has been received?</b>');?></h5>
                        <p><?php echo __('Once your funds have been received and cleared, we will send the required currency to the recipient\'s bank account within the expected time. You will also receive a confirmation that your funds have been debited from your bank account. If you do not receive a confirmation email, it could be due to a technical glitch or a genuine problem.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>11. Why is my transfer still showing \'processing\' when it should have been successful?</b>');?></h5>
                        <p><?php echo __('The time it takes for funds to reach and be cleared by the designated bank can vary due to different currencies and time zones. Most currency transfers can take 2 to 3 days to be completed and arrive in the recipient\'s bank account. We request your patience and trust while we resolve any issues.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>12. How will I know that my money is safe if it\'s taking a while to complete the transaction?</b>');?></h5>
                        <p><?php echo __('Your money is always safe with DemoApp. All funds are held in our UK client\'s bank accounts, and these accounts are segregated and developed to protect client funds from unexpected fraud or bankruptcy. We will update you regarding the progress of the transfer via email or message, so please check your email regularly.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>13. Why am I not able to do any transaction in DemoApp?</b>');?></h5>
                        <p><?php echo __('If you encounter any issues with transactions, please try the following steps:');?></p>
                        <ul style="list-style-type: none">
                            <li><?php echo __('- If you\'re on WiFi, turn on mobile data or use a different internet connection.');?></li>
                            <li><?php echo __('- Send a smaller amount of money.');?></li>
                            <li><?php echo __('- Use a different method for sending money, such as clicking on "Start Sending" instead of using the recent contacts icon on the home screen.');?></li>
                            <li><?php echo __('- Check if you\'ve reached your transaction limit.');?></li>
                        </ul>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>14. How do I report fraud?</b>');?></h5>
                        <p><?php echo __('If you come across any fraudulent activity that you have not initiated, please contact us at ')?><a href="<?php echo $this->Url->build(['controller' => 'Pages', 'action' => 'contact', '_base' => $locale,])?>" class="theme-link"><?php echo __('[https://DemoApp.com/contact-us.html]')?></a><?php echo __(' and inform us about the incident.');?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
