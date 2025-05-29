<?php
/**
 * @var \App\View\AppView $this
 * @var array $order
 */

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;

echo $this->Html->css([
   "/vendors/css/sequence"
]);
?>
<?php $paymentCurrency = $order["payment_currency"]; ?>
<?php $payoutCurrency = $order["payout_currency"]; ?>
<?php $sendAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["send_amount"], [
        "places" => 2
    ]); ?>
<?php $feeAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["fees"], [
        "places" => 2
    ]); ?>
<?php $totalAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["total_amount"], [
        "places" => 2
    ]); ?>
<?php $payoutAmount = ($payoutCurrency["icon"] ?: $payoutCurrency["iso_code_alpha"]." ").$this->Number->format($order["payout_amount"], [
        "places" => 2
    ]); ?>
<style>
    body {
        padding-top: 0px !important;
    }
    #header {
        background: #213262; !important;
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
    @media only screen and (max-width:991px){
        .sticky-footer
        {
            position: relative;
            left:0;
        }
    }
    @media only screen and (min-width:768px) and (max-width: 991px){
        .sticky-footer
        {
            left:0;
        }
    }

</style>
<div class="container-fluid">
    <div class="row vh-100 align-items-center">
        <div class="col-lg-4 success-slider bg-primary d-none d-lg-flex align-items-center">
            <div class="wrapper-lg w-100">
                <div class="col-xl-10">
                    <div class="profile-details-card dash-download-card">
                        <h3 class="mb-5 text-white font-weight-bold"><?php echo __('Download the Demo App')?></h3>
                        <div class="mb-5">
                            <ul class="pl-0 list-unstyled">
                                <li class="mb-2">
                                    <a href="#" class="text-white"><span class="bx bxs-circle f-10 mr-2"></span><?php echo __('Transfer funds instantly')?></a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="text-white"><span class="bx bxs-circle f-10 mr-2"></span><?php echo __('Easily locate your recipients')?></a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="text-white"><span class="bx bxs-circle f-10 mr-2"></span><?php echo __('Access multiple delivery options')?></a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="text-white"><span class="bx bxs-circle f-10 mr-2"></span><?php echo __('Receive instant transfer status updates')?></a>
                                </li>
                            </ul>
                            <ul class="pl-0 list-unstyled d-flex align-items-center">
                                <li class="mb-3 mr-1">
                                    <a href="#"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/apple-app.png"></a>
                                </li>
                                <li class="mb-3 mr-1">
                                    <a href="#"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/google-play-app.png"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 profile-body">
            <div class="ui border-0">
                <h2 class="text-center font-weight-bold success-heading f-40"><?php echo __("Success!") ?></h2>
                <h5 class="text-center font-weight-bold text-theme"><?php echo __("We've received your transfer {order_number}", [
                        "order_number" => '<span style="font-weight: 500;">#'.$order["order_number"].'</span>'
                    ]); ?></h5>
                <div class="row">
                    <div class="col-10 offset-1 col-sm-4 offset-sm-4 text-center">
                        <ul class="sequence sequence-<?php echo $order["state"]["color"]; ?> d-inline-block text-left mb-3">
                            <?php foreach ( $order["states"] as $state ) { ?>
                                <li class="<?php echo $state["id"] === $order["state"]["id"] ? "active" : ( $state["is_future"] ?? false ? "text-muted" : "" ); ?>"><?php if ( $state["is_future"] ?? false ) {
                                        echo $state["title"];
                                    } else { ?>
                                        <div class="text-<?php echo $state["color"]; ?>"><?php echo $state["title"]; ?></div>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="text-center mb-5">
                    <a href="<?php echo $this->Url->build([
                        "action" => "view",
                        "_base" => $locale,
                        $order["id"]
                    ]); ?>" class="btn btn-primary text-white px-4 py-2 shadow-none"><?php echo __("View Transfer"); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

