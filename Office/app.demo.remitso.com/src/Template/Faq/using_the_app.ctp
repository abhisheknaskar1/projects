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
                    <h3 class="font-weight-bold mb-5"><?php echo __('USING THE APP.')?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4">
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>1. Where can I find the app?</b>');?></h5>
                        <p><?php echo __('The app is available on the Google Play Store if you are using an Android device. You can find it at this link: ')?><a href="javascript:"><?php echo __('[Google Play Store DemoApp]');?></a></p>
                        <p><?php echo __('For iOS users, the application is available on the App Store. You can find it at this link: ')?><a href="javascript:"><?php echo __('[App Store DemoApp]');?></a></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>2. How is the app different from the website?</b>');?></h5>
                        <p><?php echo __('The DemoApp app offers the convenience of sending money abroad with excellent exchange rates and low fees directly from your mobile device. It provides a user-friendly interface optimized for mobile devices, allowing you to send money anytime and anywhere. The app also offers additional features such as tracking your transfers and various options for sending money, including bank deposit, cash pickup, and instant mobile wallet delivery.');?></p>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <h5><?php echo __('<b>3. How to send money using the mobile app?</b>');?></h5>
                        <p><?php echo __('Sending money through the DemoApp mobile app is a simple process. Here are the steps:');?></p>
                        <ol type="a">
                            <li><?php echo __('Register online: Create your profile in the app and enter the desired amount you want to send.');?></li>
                            <li><?php echo __(' Add recipient: Enter the recipient\'s details, including their name, contact information, and receiving method.');?></li>
                            <li><?php echo __('Pay & Relax: Double-check the recipient details and confirm the transaction. DemoApp will take care of the rest, ensuring a secure and convenient transfer process.');?></li>
                        </ol>
                        <p><?php echo __('Enjoy the convenience of sending money with just a few taps on your mobile device.');?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
