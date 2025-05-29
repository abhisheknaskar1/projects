<?php

use App\View\AppView;
use App\WebService\Customer;
use Cake\Core\Configure;
use Cake\I18n\I18n;
use Cake\I18n\Time;
/**
 * @var AppView $this
 * @var array $order
 */

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;

echo $this->Html->css([
    "/vendors/css/sequence",
    "/vendors/semantic-ui/components/header.min",
    "/vendors/semantic-ui/components/icon.min",
    "/vendors/semantic-ui/components/grid.min",
    "/vendors/semantic-ui/components/divider.min",
]);
$created = new Time($order["created"]);
$paymentCurrency = $order["payment_currency"];
$payoutCurrency = $order["payout_currency"];
$payoutCountry = $order["payout_country"];

$sendAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["send_amount"], [
    "places" => 2
]);
$feeAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["fees"], [
    "places" => 2
]);
$subTotalAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["send_amount"] + $order["fees"], [
    "places" => 2
]);
$discountAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["discount"], [
    "places" => 2
]);
$totalAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["total_amount"], [
    "places" => 2
]);
$payoutAmount = ($payoutCurrency["icon"] ?: $payoutCurrency["iso_code_alpha"]." ").$this->Number->format($order["payout_amount"], [
    "places" => 2
]);
$missingDocuments = collection((array)$order["documents"])->match([
    "document" => null
]);
$instrumentCollection = collection($order["payment"]['instrument']);

/** @var Customer $customer */
$customer = $this->getRequest()->getSession()->read("Auth.User.account");
?>
<style>
    .bg-opacity {
        background-color: #212529c7;
    }
    .dashboard-header p{
        font-size: 0.85rem;
        font-family: Roboto, monospace;
        margin-top: 2px;
    }
    .ui.segment label {
        font-size: 0.90rem;
        color: #14406E;
        font-weight: bold;
    }
    .app-content .content {
        padding: 30px 0;
    }
    .segment p {
        font-size: 0.85rem !important;
    }
    .segment .header span {
        font-size: 0.80rem;
        color: #999999;
    }

    .r-flag
    {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-size: cover;
    }
    .divider:after, .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #34204f;
    }
</style>
<div class="col-xl-12 col-md-12 mb-4">
    <div class="p-3 py-2 mb-0 border-0 rounded-top d-flex align-items-center justify-content-between w-100">
        <h6 class="text-orange font-weight-normal mb-0 flex-column"><?php echo __('Transfer')?> #<?php echo $order["order_number"]; ?> <?php echo __('To')?> <?php echo $order["recipient"]["full_name"]; ?></h6>
        <div class="d-print-none">
            <?php if ($customer->getProperty('blocked') == true) { ?>
                <a href="<?php echo $this->Url->build([
                    "controller" => "Customers",
                    "action" => "blocked",
                ]); ?>" class="btn btn-outline-dark btn-sm">
                    <span class="d-inline"><i class="mdi mdi-refresh icon"></i></span><span class="d-none d-sm-inline d-md-inline d-lg-inline d-xl-inline"><?php echo __("Repeat") ?></span>
                </a>
            <?php } else { ?>
                <a data-toggle="modal" href="#repeat-transfer" class="btn btn-outline-dark btn-sm">
                    <span class="d-inline"><i class="mdi mdi-refresh icon"></i></span><span class="d-none d-sm-inline d-md-inline d-lg-inline d-xl-inline"><?php echo __("Repeat") ?></span>
                </a>
            <?php } ?>
            <a href="javascript:window.print()" class="btn btn-outline-dark btn-sm">
                <span class="d-inline"><i class="print alternate icon"></i></span><span class="d-none d-sm-inline d-md-inline d-lg-inline d-xl-inline"><?php echo __("Print") ?></span>
            </a>
        </div>
    </div>
    <div class="h-100 py-0 bg-white">
        <div class="card-body bg-opacity">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="my-0 p-0">
                        <?php if ( $missingDocuments->isEmpty() === false && in_array($order["state"]["code"], [
                                "REQ_ADDITIONAL_DOCUMENTS",
                                "REQ_DOCUMENTS"
                            ]) ) { ?>
                            <div class="alert alert-warning">
                                <p class="text-left mb-1"><?php echo __("Following documents are required to process this transaction"); ?></p>
                                <ol class="ml-0 pl-3 mb-0">
                                    <?php foreach ( $missingDocuments as $document ) { ?>
                                        <li class="mb-0">
                                            <?php echo $document["title"]; ?> -
                                            <a href="<?php echo $this->Url->build([
                                                "controller" => "Customers",
                                                "action" => "uploadDocument",
                                                $document["id"],
                                                "customer_card_usage_id" => $document['code'] === "PPI" ? ($order["payment"]["customer_card_usage_id"] ?? null) : null,
                                            ]) ?>">
                                                <span class="d-none d-md-inline d-lg-inline d-xl-inline"><?php echo __("Upload") ?></span>
                                            </a>
                                        </li>
                                    <?php }
                                    ?>
                                </ol>
                            </div>
                        <?php } ?>
                        <div class="w-100"><?php echo $this->Flash->render(); ?></div>
                        <div class="row d-flex">
                            <div class="mb-4 col-lg-7 flex-column align-items-stretch">
                                <div class="rounded-sm p-4 mb-4 bg-indigo">
                                    <h6 class="section-heading mb-3 text-orange"><?php echo __("Payment Details"); ?></h6>
                                    <ul class="pl-0 list-unstyled">
                                        <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Send Amount") ?></span><span class="text-white"><?php echo $sendAmount; ?></span></li>
                                        <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Fees") ?></span><span class="text-white"><?php echo $feeAmount; ?></span></li>
                                        <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Sub Total") ?></span><span class="text-white"><?php echo $subTotalAmount; ?></span></li>
                                        <?php if ($order['discount_coupon_code']) { ?>
                                            <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Discount") ?> <strong class="text-success">(<?php echo $order['discount_coupon_code']; ?>)</strong></span><span class="text-success"><?php echo $discountAmount; ?></span></li>
                                        <?php } ?>
                                        <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Total") ?></span><span class="text-white"><?php echo $totalAmount; ?></span></li>
                                        <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Destination") ?></span><span class="text-white"><?php echo $payoutCurrency["iso_code_alpha"].' - '.$payoutCountry["known_name"]; ?></span></li>
                                        <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Exchange Rate") ?></span><span class="text-white"><?php echo $paymentCurrency["iso_code_alpha"]." = ".$order["sell_rate"]." ".$payoutCurrency["iso_code_alpha"]; ?></span></li>
                                        <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Payout Amount") ?></span><span class="text-white"><?php echo $payoutAmount; ?></span></li>
                                        <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Payment Method") ?></span>
                                            <?php
                                            $cardBrand = null;
                                            $cardNumber = null;
                                            if ($order['payment_method']['code'] === 'CCP' || $order['payment_method']['code'] === 'DCP') {
                                                foreach ($instrumentCollection as $instrument) {
                                                    if($instrument['data_key'] === 'card_brand') {
                                                        $cardBrand = $instrument['data_value'];
                                                    }
                                                    if ($instrument['data_key'] === 'card_number') {
                                                        $cardNumber = $instrument['data_value'];
                                                    }
                                                }
                                                ?>
                                                <span class="text-white"><img src="<?php echo $this->Url->build('/'); ?>assets/img/<?php echo strtolower($cardBrand);?>.png" alt="<?php echo $cardBrand; ?>" class="img-fluid" style="width: 50px;"><?php echo ' ' . $cardNumber; ?></span>
                                            <?php    } else { ?>
                                            <span class="text-white"><?php echo $order["payment_method"]["title"]; ?></span></li>
                                    <?php     } ?>
                                        <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Payout Method") ?></span><span class="text-white"><?php echo $order["payout_method"]["title"]; ?></span></li>
                                        <?php if ($order["payout_method"]["code"] === "OTC") { ?>
                                            <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Pickup Password") ?></span><span class="<?php echo $order["payout"]["cash_collection_pin"] ? "font-weight-bold" : "text-white"; ?>"><?php echo $order["payout"]["cash_collection_pin"] ?? __("Not Generated"); ?></span></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="bg-indigo rounded-sm p-4">
                                    <h6 class="section-heading text-orange mb-3"><?php echo __("Recipient Details"); ?></h6>
                                    <ul class="pl-0 list-unstyled">
                                        <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Recipient") ?></span><span class="text-white"><?php echo $order["recipient"]["full_name"]; ?></span></li>
                                        <?php foreach ( $order["recipient"]["labels"] as $field => $label ) { ?>
                                            <li class="text-orange d-flex justify-content-between py-2"><span><?php echo $label ?></span><span class="text-white"><?php echo $order["recipient"]["nice_values"][$field] ?? $order["recipient"][$field] ?? null; ?></span></li>
                                        <?php } ?>
                                        <?php if ($order["payout_method"]["code"] === "OTC" && $order["payout"]["agency"]) { ?>
                                            <li class="text-orange d-flex justify-content-between py-2"><span><?php echo __("Cash Pickup Bank") ?></span><span class="text-white"><?php echo $order["payout"]["agency"]["title"]; ?></span></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-4 col-lg-5 flex-column align-items-stretch">
                                <div class="bg-indigo rounded-sm h-100">
                                    <ul class="sequence py-3 sequence-<?php echo $order["state"]["color"]; ?>">
                                        <?php foreach ( $order["states"] as $state ) { ?>
                                            <li class="<?php echo $state["id"] === $order["state"]["id"] ? "active" : ( $state["is_future"] ?? false ? "text-muted" : "" ); ?> mt-0"><?php if ( $state["is_future"] ?? false ) {
                                                    echo $state["title"];
                                                } else { ?>
                                                    <div class="text-<?php echo $state["color"]; ?>" style="font-weight: 500;"><?php echo $state["title"]; ?></div>
                                                <?php } ?>
                                                <p class="small text-left mb-0 <?php echo ($state["is_future"] ?? false) ? '' : 'text-white'; ?>"><?php echo $state["description"]; ?></p>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="repeat-transfer">
    <div class="modal-dialog">
        <div class="modal-content px-3">
            <div class="modal-header px-0">
                <div class="mb-0 w-100 float-left f-14 text-orange"><?php echo __("Repeat order to {recipient_name}", [
                    "recipient_name" => '<strong>'.$order["recipient"]["full_name"].'</strong>'
                ]); ?></div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body px-0 py-2">
                <div class="py-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <div class="pr-3"><span class="flag-icon r-flag flag-icon-<?php echo strtolower($order['payment_country']['iso_code_alpha2']); ?> ml-2"></span></div>
                        <div>
                            <h6 class="mb-0 text-white"><?php echo __("To Send"); ?> <?php echo $paymentCurrency["iso_code_alpha"]; ?></h6>
                            <p class="mb-0 text-orange"><?php echo $sendAmount; ?></p>
                        </div>
                    </div>
                    <div>
                        <a href="<?php echo $this->Url->build([
                            "controller" => "Orders",
                            "action" => "repeat",
                            $order["id"],
                            "direction" => "sending"
                        ]); ?>" class="btn btn-primary text-white"><?php echo __("Go"); ?></a>
                    </div>
                </div>
                <div class="divider d-flex align-items-center my-0">
                    <p class="text-center mx-3 mb-0 text-muted f-14"><?php echo __('OR')?></p>
                </div>
                <div class="py-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <div class="pr-3"><span class="flag-icon r-flag flag-icon-<?php echo strtolower($order['payout_country']['iso_code_alpha2']); ?> ml-2"></span></div>
                        <div>
                            <h6 class="mb-0 text-white"><?php echo __("To Receive"); ?> <?php echo $payoutCurrency["iso_code_alpha"]; ?></h6>
                            <p class="mb-0 text-orange"><?php echo $payoutAmount; ?></p>
                        </div>
                    </div>
                    <div>
                        <a href="<?php echo $this->Url->build([
                            "controller" => "Orders",
                            "action" => "repeat",
                            $order["id"],
                            "direction" => "receiving"
                        ]); ?>" class="btn btn-primary text-white"><?php echo __("Go"); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ( $order["payout_method"]["code"] === "OTC" &&  $order["payout"]["cash_collection_pin"]) { ?>
    <script>
        let pickupPassword = "<?php echo $order["payout"]["cash_collection_pin"]; ?>";
        let pickupPasswordMasked = "<?php echo $order["payout"]["cash_collection_pin_masked"]; ?>";
        $("#togglePasswordButton").click(function(){
            let displayValue = $(this).hasClass('revealed') ?  pickupPasswordMasked : pickupPassword;
            $('.pickup-password').text(displayValue);
            if ($(this).hasClass('revealed')) {
                $(this).removeClass("revealed");
                $(this).text("<?php echo htmlentities(__("Reveal Password")); ?>");
            } else {
                $(this).addClass("revealed");
                $(this).text("<?php echo htmlentities(__("Hide Password")); ?>");
            }
        });
    </script>
<?php } ?>


