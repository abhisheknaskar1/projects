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
                    <h3 class="font-weight-bold mb-5"><?php echo __('TROUBLESHOOTING & TECHNICAL ISSUES')?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4">
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>1. Facing issues with the website. What do I do?</b>');?></h5>
                        <ol type="1">
                            <li><?php echo __('Update the latest version of your browser. DemoApp works best on Google Chrome but should work on all major browsers.'); ?></li>
                            <li><?php echo __('Ensure you have cookies enabled on your browser.'); ?></li>
                            <li><?php echo __('There may be a temporary problem with our website. Take screenshots that might help us diagnose the problem and send them.'); ?></li>
                        </ol>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>2. How to enable cookies on my desktop?</b>');?></h5>
                         <ul style="list-style-type: none">
                             <li><?php echo __('-> On your computer, open your browser.');?></li>
                             <li><?php echo __('-> Click on Settings.');?></li>
                             <li><?php echo __('-> Under "Privacy and security," click Site settings.');?></li>
                             <li><?php echo __('-> Click Cookies.');?></li>
                             <li><?php echo __('-> From here, you can:');?></li>
                             <ul style="list-style-type: none">
                                 <li><?php echo __('- Turn on cookies: Next to "<b>Blocked</b>," turn on the switch.'); ?></li>
                                 <li><?php echo __('- Turn off cookies: Turn off Allow sites to save and read cookie data.'); ?></li>
                             </ul>
                         </ul>
                        <p><?php echo __('*Find out more about enabling cookies here.*');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>3. My payment is not going through. What should I do?</b>');?></h5>
                        <p><?php echo __('Your payment may not be processed for several reasons. To address this issue, please follow these steps:');?></p>
                        <ol type="A">
                            <li><?php echo __('Check that your payment details have been entered correctly, such as:');?></li>
                            <ul style="list-style-type: none">
                                <li><?php echo __('The correct card number, expiry dates, and security codes.');?></li>
                                <li><?php echo __('For online banking, please ensure your login details have been entered correctly. Contact the provider if you have forgotten these details.');?></li>
                            </ul>
                            <li><?php echo __('If all details are correct, please check why the payment has been declined with your payment provider. Sometimes, you may need to approve the payment with your provider before returning to us to complete the transfer.');?></li>
                        </ol>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>The recipient hasn\'t received their money. What should I do?</b>');?></h5>
                        <p><?php echo __('Please check these top reasons why your recipient may not have received their money.');?></p>
                        <ol type="a">
                            <li><?php echo __('<u>Time taken to transfer the money:</u> You will have received an email from DemoApp support stating, "money is on its way." The emails will also provide the ETA for transaction completion.');?></li>
                            <li><?php echo __('<u>Details of the recipient:</u> Incorrect or inadequate details are the most significant reasons for unsuccessful transactions. Please make sure all the details are correct.');?></li>
                            <li><?php echo __('<u>Cash pick-ups:</u> When collecting cash, please make sure that the recipient:');?></li>
                            <ul style="list-style-type: none">
                                <li><?php echo __('- Reaches the correct pay-out location. This will be the local partner you chose when you created the transfer and displayed it in the confirmation email.');?></li>
                                <li><?php echo __('- Provides the valid Pick-up Reference Number. We send this directly to the recipient.');?></li>
                            </ul>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
