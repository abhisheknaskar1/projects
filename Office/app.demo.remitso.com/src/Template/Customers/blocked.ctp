<?php

use App\Utility\EmailObfuscator;
use App\View\AppView;
use App\WebService\Customer;
use Cake\Collection\CollectionInterface;
use Cake\Core\Configure;

/**
 * @var AppView $this
 * @var Customer $customer
 * @var CollectionInterface $orders
 */
?>
<style>
    body
    {
        background-color: #212529c7;
    }
    #header {
        transition: all 0.5s;
        z-index: 997;
        padding: 16px 0;
        top: 0px; }
    .f-40 {
        font-size: 40px;
    }
    .fca-notice
    {
        line-height: 1.2;
        font-size: 1rem;
        position: relative;
        bottom: auto;
        right: 0;
        left: 0;
        text-align: center;
        margin-top: 15px;
        color: #93969a;
    }
    .fw-600 {
        font-weight: 600!important;
    }
    .pb-6, .py-6 {
        padding-bottom: 4.5rem!important;
    }
    .pt-6, .py-6 {
        padding-top: 4.5rem!important;
    }
</style>
<div class="container-fluid py-6">
    <div class="row align-items-center justify-content-center flex-column my-3">
        <div class="col-lg-4 col-xl-4 bg-light auth-block my-5">
            <div class="w-100 ui form rounded-lg shadow-sm py-4">
                <div class="container">
                    <div class="text-center">
                        <lottie-player autoplay="true" src="https://assets7.lottiefiles.com/packages/lf20_cfcpu6nf.json" loop="" speed="1" style="height: 150px; width: 150px; background: transparent; margin: auto;" background="transparent"></lottie-player>
                    </div>
                    <h2 class="text-center font-weight-bold text-theme mb-4"><?php echo __("Account Under Review"); ?></h2>
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 text-center">
                            <h6 style="line-height: 1.5;" class="text-center text-theme mb-4 fw-600"><?php echo __("Your account is currently under review. Transactions are temporarily on hold during this process."); ?></h6>
                            <h6 style="line-height: 1.5;" class="text-center text-theme mb-4 fw-600"><?php echo __("For any questions, please reach out to our support team at {support_email} or call us at {support_phone}.", [
                                    "support_email" => EmailObfuscator::obfuscate(Configure::read("App.Settings.csEmail")),
                                    "support_phone" => '<a href="tel:'.Configure::read("App.Settings.csNumber").'">'.Configure::read("App.Settings.csNumber").'</a>'
                                ]); ?></h6>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
