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
                    <h3 class="font-weight-bold mb-5"><?php echo __('CANCELLATIONS & REFUNDS')?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4">
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>1. Can I cancel my transfer?</b>');?></h5>
                        <p><?php echo __('Yes, you can cancel your transfer if the transaction status is at 25%. However, if the transaction status is at 50%, it means that we have already purchased the currency. In such cases, if you still wish to cancel the transaction, please contact us via email at ')?><a href="mailto:"><?php echo EmailObfuscator::obfuscate('support@DemoApp.com'); ?></a><?php echo (' or call us at +44 20 3137 8850. Please note that cancellation at this stage may incur charges to cover the loss of the booking. After cancellation, you will receive a confirmation email, and the cancellation will be updated in your transaction history.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>2. How do I know if my transfer is cancelled?</b>');?></h5>
                        <p><?php echo __('Once you have cancelled your transfer, we will send you a confirmation email regarding the cancellation. You can also check the cancellation status by visiting our website or using the mobile app. We recommend checking your emails and messages for updates on the cancellation status. If you need further assistance, please contact our ABC Customer Service Team.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>3. How long does a refund take?</b>');?></h5>
                        <p><?php echo __('Typically, it takes up to 7 working days for a refund to be credited back to your account after cancellation. However, the duration may vary depending on the payment method used:');?></p>
                        <ul style="list-style-type: none">
                            <li><?php echo __('- Credit Card');?></li>
                            <li><?php echo __('- Debit Card');?></li>
                            <li><?php echo __('- Bank Transfer');?></li>
                        </ul>
                        <p><?php echo __('Sometimes refunds may take longer due to different policies of multiple banks in different countries. We kindly request your patience and assure you that we will keep you informed via email or messages regarding the status of your refund. If you need further assistance, please contact our ABC Customer Service Team.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>4. What if my money is not refunded to my account after seven working days?</b>');?></h5>
                        <p><?php echo __('If your money is not refunded to your account after seven working days, please do not worry. Check the status of your refund on our website or app. Occasionally, refunds may take longer due to varying policies of different banks in different countries. We request your patience and assure you that the refund will be processed as soon as possible. If you require further assistance, please contact our ABC Customer Service Team.');?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
