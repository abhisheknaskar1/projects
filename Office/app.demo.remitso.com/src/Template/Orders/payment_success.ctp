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
                    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_s2lryxtd.json" background="transparent" speed="1" style="width: 200px; height: 200px; margin: auto" loop autoplay></lottie-player>
                </div>
                <h3 class="text-center  text-success"><?php echo __("Success!") ?></h3>
                <h6 class="text-center  text-dark mb-3"><?php echo __("We've received your transfer {order_number}", [
                        "order_number" => '<strong class="text-primary">#'.$order["order_number"].'</strong>'
                    ]); ?></h6>
                <div class="ui form loader loading pt-4 pb-5"></div>
                <p class="text-center mt-3"><?php echo __("Please wait, We are processing your payment..."); ?></p>
            </div>
        </div>
    </div>
</div>
<script>
    function checkStatus()
    {
        $.ajax({
            url : '<?php echo $this->Url->build([
                "action" => "getPaymentStatus",
                "_base" => $locale,
                $order["id"]
            ]); ?>',
            success : function(status) {
                if ( status !== '<?php echo $order["payment"]["status"] ?>' ) {
                    if ( status === "success" ) {
                        window.location.href = '<?php echo $this->Url->build([
                            "action" => "view",
                            "_base" => $locale,
                            $order["id"]
                        ]); ?>';
                    } else if ( status === "failed" ) {
                        window.location.href = '<?php echo $this->Url->build([
                            "action" => "paymentFailed",
                            "_base" => $locale,
                            $order["id"]
                        ]); ?>';
                    }
                }
                setTimeout(checkStatus, 1500);
            }
        });
    }

    $(function(){
        checkStatus();
    });
</script>
