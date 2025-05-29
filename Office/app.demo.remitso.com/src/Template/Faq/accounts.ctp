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
                    <h3 class="font-weight-bold mb-5"><?php echo __('ACCOUNTS & SECURITY')?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4">
                    <div class="col-lg-12 mb-4">
                        <h6><?php echo __('<b>[Securing your transactions]</b>');?></h6>
                        <h5><?php echo __('<b>1. Is money transfer safe?</b>');?></h5>
                        <p><?php echo __('Yes, money transfer with ATLMoney is safe. We prioritize the security of your funds and have implemented various measures to ensure the safety of your transactions. All funds are held in UK client bank accounts that are segregated in accordance with FCA regulations. This segregation is designed to protect client funds in the event of fraud or bankruptcy, providing an added layer of security for your money.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>2. How secure is the ATLMoney website?</b>');?></h5>
                        <p><?php echo __('The ATLMoney website is highly secure. We employ industry-leading technology to safeguard your information. Our system utilizes the highest level of security comparable to online banking systems. When you transmit your confidential information from your computer to our website, it is automatically encrypted using the Secure Sockets Layer protocol (SSL) with a 256-bit encryption key, which is the highest commercially available level of encryption. Once your information reaches our website, it is stored on heavily guarded and secured servers. Our servers are protected by an electronic firewall and are not directly connected to the internet, ensuring that your private information is accessible only to authorized computers.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>3. How is my money protected?</b>');?></h5>
                        <p><?php echo __('ATLMoney is a licensed Electronic Money Institution, which allows us to offer certain financial services such as money remittance. Please remember that we are not a bank or credit institution. We are not protected by the Financial Services Compensation Scheme - a deposit protection scheme for banks in the UK.');?></p>
                        <p><?php echo __('If ATLMoney becomes insolvent and can no longer operate, it is also essential to know that your funds may not be returned to you in full. This is because any appointed administrator or liquidator\'s fees are paid out of available assets and cash first. The remaining safeguarded funds will be returned to you once our customers have made their payments.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h6><?php echo __('<b>[Managing My Account]</b>');?></h6>
                        <h5><?php echo __('<b>4. Can I edit the details in my account?</b>');?></h5>
                        <p><?php echo __('Yes, you can edit the details in your account by visiting the "My Account" section. Simply log in to your account on our website or app, and you will have the option to make changes to your account information. Please ensure that you enter accurate and valid details to facilitate the verification process. After making the changes, you will receive a confirmation email with the updated information. If you need any assistance, our ATL Customer Service Team is always available to help.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>5. Is your account not showing the correct details?</b>');?></h5>
                        <p><?php echo __('If your account is not displaying the correct details, there\'s no need to worry. You can update your information by going to the "My Account" section on our website or app. Make the necessary changes, ensuring that you enter the correct details as per your government-issued ID. Once you have completed the changes, a confirmation email will be sent to you to acknowledge the updates. If you require further assistance, please don\'t hesitate to contact our ATL Customer Service Team.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>6. Can I make changes to my account via smartphones, laptops, or computers?</b>');?></h5>
                        <p><?php echo __('Yes, you can make changes to your account using smartphones, laptops, or computers. You can access our website or use our mobile app on both iOS and Android devices to log in and make the necessary updates. Enter your login credentials from your respective device and proceed with the changes. In case you forget your password, follow the steps provided earlier to create a new password. It\'s important to keep your password unique and not share it with anyone. If you need further guidance, our ATL Customer Service Team is ready to assist you.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>7. Can I log in to my account from a different country?</b>');?></h5>
                        <p><?php echo __('Yes, you can log in to your account from a different country. You can access your account and enter your login details regardless of your location. If you are traveling temporarily, there\'s no need to change your "sending country." However, if you have permanently moved to a different country, please update your country accordingly. Rest assured, updating your "sending country" will not impact your account details. If you have any questions or need assistance, please reach out to our ATL Customer Service Team.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>8. Can I opt for a joint account?</b>');?></h5>
                        <p><?php echo __('No, we do not offer joint accounts at ATLMoney. We require each individual to register as an individual user. This is done to ensure the security and privacy of each user\'s personal information.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>9. Can I view all my previous transfers in my account?</b>');?></h5>
                        <p><?php echo __('Yes, you can view all your previous transfers in your account. The "transaction history" section of your account will display records of all your past and current transactions, including the amount transferred and received. Each transaction will have a status such as "successful," "pending," "processing," or "cancelled." If your current transaction is not immediately visible in the transaction history, please allow some time for it to be updated. If you encounter any issues, our backend team will work to resolve them promptly.');?></p>
                        <p><?php echo __('If you have any further questions or need additional assistance, please feel free to contact our ATL Customer Service Team.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h6><?php echo __('<b>[Staying Safe with ATLMoney]</b>');?></h6>
                        <h5><?php echo __('<b>10. Why is it important to recognize the correct service provider when sending money?</b>');?></h5>
                        <p><?php echo __('Recognizing the correct service provider is crucial when sending money to avoid being scammed online. It is essential to use a regulated and authorized service provider approved by the relevant authorities. This helps ensure the security and legitimacy of your transactions, reducing the risk of falling victim to scams. ATLMoney is authorized and regulated by the Financial Conduct Authority (FCA) as a payment institution and supervised by HM Revenue and Customs (HMRC) under Money Laundering Regulations.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>11. How can I choose the quickest money transfer service provider?</b>');?></h5>
                        <p><?php echo __('To ensure your money reaches its intended destination quickly and safely, it is important to choose a service provider that offers fast transfer times. ATLMoney strives to provide quick transfers, with many transactions being processed within minutes. Additionally, it is recommended to check if the platform\'s customer care is available in case you need assistance. ATLMoney\'s customer service teams are available 24/7 to address any queries or concerns.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>12. How can I safeguard my devices and accounts while sending money online?</b>');?></h5>
                        <p><?php echo __('To maintain maximum security and avoid card fraud when sending money online, follow these precautions:');?></p>
                        <ol type="a">
                            <li><?php echo __('Protect your Wi-Fi with a strong password to prevent unauthorized access.'); ?></li>
                            <li><?php echo __('Keep your apps up-to-date with the latest security features to ensure they are protected against vulnerabilities.'); ?></li>
                            <li><?php echo __('Install and regularly update anti-virus software on your devices to enhance protection against malware and other threats.'); ?></li>
                        </ol>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>13. How can I spot fraudulent activities when sending money?</b>');?></h5>
                        <p><?php echo __('Fraudsters employ various tactics to deceive individuals into transferring money to them. To spot fraudulent activities, be cautious of the following:');?></p>
                        <ol type="a">
                            <li><?php echo __('Scammers may generate panic or create a sense of urgency to pressure you into making immediate transfers. Be wary of such tactics and take your time to verify the legitimacy of the situation.');?></li>
                            <li><?php echo __('Fraudsters might attempt to establish a false sense of familiarity to gain your trust. Be cautious when receiving messages or requests from unknown individuals claiming familiarity.');?></li>
                            <li><?php echo __(' It is important not to ignore messages from banks or money service businesses. Always double-check the authenticity of such messages before taking any action.');?></li>
                        </ol>
                        <p><?php echo __('Remain vigilant and exercise caution to protect yourself from scams and fraudulent activities.');?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
