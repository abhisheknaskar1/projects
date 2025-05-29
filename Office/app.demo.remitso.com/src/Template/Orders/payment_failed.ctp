<?php

/**
 * @var \App\View\AppView $this
 * @var array $order
 */

$paymentCurrency = $order["payment_currency"];
$sendAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["send_amount"], [
    "places" => 2
]);
$payoutCurrency = $order["payout_currency"];
$feeAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["fees"], [
    "places" => 2
]);
$totalAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["total_amount"], [
    "places" => 2
]);
$payoutAmount = ($payoutCurrency["icon"] ?: $payoutCurrency["iso_code_alpha"]." ").$this->Number->format($order["payout_amount"], [
    "places" => 2
]);

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<style>
    #header {
        transition: all 0.5s;
        z-index: 997;
        padding: 16px 0;
        top: 0px; }
    .success-heading {
        color: #43d296!important;
    }
    .f-40 {
        font-size: 40px;
    }
    .sticky-footer
    {
        position: fixed;
        width: 100%;
        left: 33.33%;
        right: 0;
        bottom: 0;
    }
    .card-timeline {
        background-color: #fff;
        z-index: 0
    }
    .btn-outline-primary {
        color: #007bff;
        border-color: #003974;
    }
    .btn-outline-primary:hover
    {
        background: #003974;
        border-color: #003974;
    }
    .sequence > li {
        font-size: 18px;
        margin-bottom: 10px;
    }
    .sequence > li::before
    {
        top: 8px;
    }
    .sequence > li::after
    {
        top: 20px;
    }
    @media only screen and (max-width:767px){
        .sticky-footer
        {
            position: relative;
            left:0;
        }
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

</style>
<div class="container-fluid">
    <div class="row vh-100 align-items-center">
        <div class="col-lg-12 profile-body">
            <div class="ui border-0">
                <div class="text-center">
                    <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_avxgvbbd.json" background="transparent" speed="1" style="width: 200px; height: 200px; margin: auto" loop autoplay></lottie-player>
                </div>
                <h3 class="text-center  text-danger mb-4"><?php echo __("Payment Failed!") ?></h3>
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <p class="text-center  text-dark"><?php echo __("We've received your transfer {order_number} but the payment for your order could not be completed because your bank returned {failure_reason}.", [
                                "order_number" => '<strong class="text-primary">#'.$order["order_number"].'</strong>',
                                "failure_reason" => '<strong class="text-danger">'.$order["payment"]["failure_reason"].'</strong>',
                            ]); ?></p>
                    </div>
                </div>
                <div class="text-center mb-3 mt-4">
                    <a href="<?php echo $this->Url->build([
                        "action" => "pay",
                        "_base" => $locale,
                        $order["id"]
                    ]); ?>" class="btn  btn-sm btn-success mr-3"><?php echo __("Retry Payment"); ?></a>
                    <a href="<?php echo $this->Url->build([
                        "action" => "view",
                        "_base" => $locale,
                        $order["id"]
                    ]); ?>" class="btn  btn-sm btn-primary"><?php echo __("View Order"); ?></a>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

