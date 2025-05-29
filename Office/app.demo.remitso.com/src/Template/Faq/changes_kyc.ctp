<?php
/**
 * @var \App\View\AppView $this
 */

use App\Utility\EmailObfuscator;
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
                    <h3 class="font-weight-bold mb-5"><?php echo __('CHANGES & KYC')?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4">
                    <div class="col-lg-12 mb-4">
                        <h6><?php echo __('<b>[CHANGING YOUR IDENTITY]</b>');?></h6>
                        <h5><?php echo __('<b>1. Can I change my name after registration?</b>');?></h5>
                        <p><?php echo __('Yes, you can change your name after registering with us. However, it\'s important to ensure that the changes made are accurate and valid. This is to prevent any difficulties during the verification process. Please make sure that your name matches the one on your government-issued ID. If you need further assistance, please contact our ABC Customer Service Team. We are here to help you.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>2. Can I change my residential address and contact number on my account?</b>');?></h5>
                        <p><?php echo __('Absolutely! You have the flexibility to change your residential address and contact number on your account. To make these changes, ensure that the information provided is correct and valid. This will help avoid any complications during the verification process. It\'s important that your details match the information on your government-issued ID. If you have any questions or need assistance, please reach out to our ABC Customer Service Team. We are available to assist you.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>3. How do I change the password for my account?</b>');?></h5>
                        <p><?php echo __('If you have forgotten your password, there\'s no need to worry. Follow these simple steps to reset it:');?></p>
                        <ul style="list-style-type: none">
                            <li><?php echo __('-> Log in to the ABC website.');?></li>
                            <li><?php echo __('-> Click on "Forgot password."');?></li>
                            <li><?php echo __('-> Enter your email address.');?></li>
                            <li><?php echo __('-> You will receive a new link in your email.');?></li>
                            <li><?php echo __('-> Click on the link and create a new password.');?></li>
                        </ul>
                        <p><?php echo __('By following these steps, you can create a new password for your account. If you forget your password again in the future, please repeat the above steps to reset it. We recommend keeping your password unique and not sharing it with anyone. If you require further assistance, please don\'t hesitate to contact our ABC Customer Service Team.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>4. How do I change the recipient\'s name?</b>');?></h5>
                        <p><?php echo __('If you made an error in the recipient\'s name after confirming the transfer, there\'s no need to cancel it. You can make the necessary changes yourself by visiting our website or using our app. It\'s important to ensure that any changes made are accurate and valid to avoid any complications during the verification process. If you have any questions or need further information, please reach out to our ABC Customer Service Team. We are here to assist you.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>5. How long will it take for the changes to be reflected on my profile?</b>');?></h5>
                        <p><?php echo __('Any changes made to your profile will be reflected immediately. If you encounter any issues during the process, please send an email to our customer service team at ')?><a href="mailto:"><?php echo EmailObfuscator::obfuscate('support@DemoApp.com'); ?></a><?php echo (' or fill out the form at ')?><a href="<?php echo $this->Url->build(['controller' => 'Pages', 'action' => 'contact', '_base' => $locale,])?>" class="theme-link"><?php echo __('[https://DemoApp.com/contact-us.html]')?></a></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h6><?php echo __('<b>[KYC- Verifying your Identity]</b>');?></h6>
                        <h5><?php echo __('<b>6. Why am I being asked to verify my identity?</b>');?></h5>
                        <p><?php echo __('At DemoApp, ensuring the safety and security of our customers\' transactions is of utmost importance to us. The verification of your identity is a necessary step to prevent fraud and protect the interests of our users. It adds an extra layer of security by ensuring that only you have access to your payment information. As a regulated financial services company, we are obligated to identify our users and comply with anti-money laundering (AML) laws. Verifying your identity helps us maintain a secure environment for all our customers. For more information on the data we collect and how we protect it, please refer to our Privacy Policy.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>7. What type of documents are required for registration?</b>');?></h5>
                        <p><?php echo __('For registration, we accept documents such as:');?></p>
                        <ul style="list-style-type: none">
                            <li><?php echo __('- Bank debit and credit card statements');?></li>
                            <li><?php echo __('- Utility bills (electricity, water, gas)');?></li>
                            <li><?php echo __('- Driving license with address');?></li>
                        </ul>
                        <p><?php echo __('Please note that the documents should not be older than three months. These documents should be valid and contain your name and residential address as provided during registration. If you have any further questions, please contact our ABC Customer Service Team.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>8. Which platform should I use to register myself for verification?</b>');?></h5>
                        <p><?php echo __('Most ID verifications must be completed through the DemoApp website or the mobile app. Occasionally, we may accept emailed copies of your identity documents for verification purposes.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>9. How do I take a picture that meets DemoApp\'s requirements?</b>');?></h5>
                        <p><?php echo __('Verifying your ID with DemoApp is simple. Here are the guidelines for taking a picture that meets our requirements:');?></p>
                        <ul style="list-style-type: none">
                            <li><?php echo __('-> The ID should be fully visible within your selfie.');?></li>
                            <li><?php echo __('-> Include a photo of yourself (selfie) holding your ID or passport.');?></li>
                            <li><?php echo __('-> Face the camera directly, and the picture should capture your shoulders to the top of your head, similar to an ID photo.');?></li>
                            <li><?php echo __('-> If possible, use a plain wall as the background.');?></li>
                            <li><?php echo __('-> Ensure that the light source is in front of you, not behind you, to avoid backlighting and ensure your face is clearly visible.');?></li>
                            <li><?php echo __('-> Avoid wearing sunglasses, hats, or any face coverings.');?></li>
                        </ul>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>10. How do I verify my credit/debit card?</b>');?></h5>
                        <p><?php echo __('To verify your credit/debit card, follow these steps:');?></p>
                        <ol type="1">
                            <li><?php echo __('Take a high-resolution photo of yourself (selfie) holding your card.');?></li>
                            <li><?php echo __('Take a photo of the front of the credit/debit card used for your purchase, with your hand holding it, ensuring the cardholder name and the last 4 digits of the card are visible.');?></li>
                            <li><?php echo __('Take a photo of the back of the credit/debit card used for your transaction, again held in your hand. Please ensure that you hide the 3-digit CCV code at the back of the card.');?></li>
                        </ol>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>11. What type of documents are required to send money abroad from a country?</b>');?></h5>
                        <p><?php echo __('The required verification documents may vary depending on the amount and the country you are sending money from. Each country has different regulations that DemoApp must comply with. We kindly request your cooperation in providing any additional documents that may be required for verification. Please email those documents to us for further processing.');?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
