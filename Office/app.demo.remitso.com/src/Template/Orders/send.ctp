<?php

use App\Form\QuoteForm;
use App\View\AppView;
use App\WebService\Customer;
use App\WebService\Quote;
use Cake\I18n\I18n;


/**
 * @var AppView $this
 * @var Quote $quote
 * @var QuoteForm $form
 */
$sendAmount = $quote->getSendAmount()*100;
$paymentCountry = $quote->getPaymentCountry();
$paymentCurrency = $quote->getPaymentCurrency();
$payoutCountry = $quote->getPayoutCountry();
$payoutCurrency = $quote->getPayoutCurrency();
$defaultSource = $paymentCountry["id"]."_".$paymentCurrency["id"];
$paymentCurrencyIcon = $paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ";
$payoutCurrencyIcon = $payoutCurrency["icon"] ?: $payoutCurrency["iso_code_alpha"]." ";
$cost = $quote->getCost();
$payoutAmount = $quote->getPayoutAmount()*100;
$sellRate = $quote->getSellRate();
$payoutMethods = $quote->getPayoutMethods();
$paymentMethods = $quote->getPaymentMethods();
$quotePaymentMethod = $quote->getPaymentMethod();
$quotePayoutMethod = $quote->getPayoutMethod();
$defaultDestination = $payoutCountry["id"]."_".$payoutCurrency["id"];
$sources = collection($quote->getSources());
$destinations = collection($quote->getDestinations());
$recipient = $quote->getRecipient();
echo $this->Html->script([
    "/vendors/js/jquery.mask.min"
]);
echo $this->Html->css([
    "dashboard",
]);
/** @var Customer $customer */
$customer = $this->getRequest()->getSession()->read("Auth.User.account");

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<style>
    body
    {
        background-color: #212529c7;
    }
    .table th, .table td {
        font-size: 0.86rem;
    }
    .table td {
        font-weight: 600;
        letter-spacing: 0.05rem;
    }
    #quoteForm label{
        font-size: 0.85rem;
    }
    .form-text {
        font-weight: bold;
        font-size: 0.85rem;
        margin-top: 0px;
        letter-spacing: 0.060rem;
    }
    .ui.segment {
        padding: 0.80rem;
    }
    #payment-method-list .ui.segment, #payout-method-list .ui.segment, #payout-partner-list .ui.segment , #payout-location .ui.segment {
        cursor: pointer;
    }
    #payment-method-list .ui.segment.disabled, #payout-method-list .ui.segment.disabled {
        cursor: not-allowed;
    }
    .payment-icons {
        margin-top: 10px;
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #9e9e9e;
    }

    .foot-notes p{
        color: #9e9e9e !important;
        font-size: 0.85rem !important;
    }

    .ui.field.error label{
        color: #dc3545 !important;
    }

    .ui.field.error label:before{
        margin-right: 0.25rem;
        display: inline-block;
        font: normal normal normal 24px/1 "Material Design Icons";
        font-size: inherit;
        text-rendering: auto;
        line-height: inherit;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        content: "\F026"
    }

    .ui.field.error .segments{
        border-color: #dc3545;
    }

    #flashErrors .message {
        margin-bottom: 1.5rem;
    }
    #quoteForm .form-group.has-warning .form-control{
        border-color: #ffc21c;
        border-bottom-left-radius: 0;
    }
    #quoteForm .form-group.has-warning .input-group-append .input-group-text {
        border-color: #ffc21c;
        border-bottom-right-radius: 0;
    }
    #quoteForm .form-group.has-warning .feedback {
        background-color: #fff2ce;
        color: #8b722a;
        border-radius: 7px;
    }
    #quoteForm .send-amount, #quoteForm .get-amount
    {
        font-size: 1.05rem;
    }
    #quoteForm .send-amount:focus, #quoteForm .get-amount:focus
    {
        box-shadow: none;
    }
    .table th, .table td {
        border-top: none;
        font-size: 1.2rem;
    }
    .table th
    {
        color: #4b5353;
        font-weight: 400;
    }
    .table tr:last-child th
    {
        font-weight: 700;
        vertical-align: middle;
    }
    .table td{
        color: #171717;
    }
    table .total-nice
    {
        font-size: 1.8rem;
    }
    .exchange-rate-nice, .base-cost-nice
    {
        font-size: 1rem;
    }
    #quoteForm .flag-icon.flag-icon-squared
    {
        width: 16px;
        height: 16px;
    }
    #quoteForm .input-group-text
    {
        font-size: 0.90rem;
    }
    #quoteForm .dropdown
    {
        line-height: 1.5;
    }
    .inner-header
    {
        background: #14406E;
    }
    #header .logo {
        /*font-size: 32px;*/
        margin: 0;
        padding: 0;
        line-height: 1;
        font-weight: 700;
        letter-spacing: 0.5px;
        font-family: 'Inter', sans-serif; }
    #header .logo a {
        color: #2c4964; }
    .authorised.mob-hide {
        border-top: 0.5px solid #A0B7C9;
    }
    .ui.segments {
        box-shadow: none;
        -webkit-box-shadow: none;
    }
</style>
<main id="main" class="">
    <section class="transaction-details-section">
        <div class="container">
            <div id="flashErrors f-14"><?php echo $this->Flash->render(); ?></div>
            <div class="row no-gutters flex-row align-items-stretch">
                <div class="offset-xl-2 card border-right-0 border-orange border-dashed p-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 flex-column">
                    <div class="w-100 d-flex justify-content-center">
                        <div class="w-100">
                            <div class="">
                                <?php echo $this->Form->create($form, [
                                    'url' => [
                                        "controller" => "Orders",
                                        "action" => "send",
                                        "_base" => $locale,
                                        $quote->getId()
                                    ],
                                    'templates' => [
                                        'inputContainer' => '{{content}}'
                                    ],
                                    "id" => "quoteForm",
                                    "valueSources" => ["query", "context", "data"],
                                ]);
                                ?>
                                <?php echo $this->Form->hidden("customer_id", [
                                    "id" => true,
                                    "default" => ($customer ? $customer->getProperty("id") : null)
                                ]); ?>
                                <?php echo $this->Form->hidden("customer_type", [
                                    "id" => true,
                                    "default" => "INDIVIDUAL"
                                ]); ?>
                                <?php echo $this->Form->hidden("payment_country_id", [
                                    "id" => true,
                                    "default" => $paymentCountry["id"]
                                ]); ?>
                                <?php echo $this->Form->hidden("payment_currency_id", [
                                    "id" => true,
                                    "default" => $paymentCurrency["id"]
                                ]); ?>
                                <?php echo $this->Form->hidden("payout_country_id", [
                                    "value" => $payoutCountry["id"],
                                    "id" => true
                                ]); ?>
                                <?php echo $this->Form->hidden("payout_currency_id", [
                                    "value" => $payoutCurrency["id"],
                                    "id" => true
                                ]); ?>
                                <?php echo $this->Form->hidden("payout_agency_id", [
                                    "value" => $quote->getAgency()["id"] ?? null,
                                    "id" => true
                                ]); ?>
                                <?php echo $this->Form->hidden("payout_location_id", [
                                    "value" => $quote->getLocation()["id"] ?? null,
                                    "id" => true
                                ]); ?>
                                <div class="alert alert-warning p-2 d-none"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-theme form-group-control font-weight-bold"><?php echo __("Amount to Transfer"); ?></label>
                                            <div class="input-group">
                                                <?php echo $this->Form->control("send_amount", [
                                                    "class" => "form-control border-right-0 send-amount",
                                                    "label" => false,
                                                    "type" => "text",
                                                    "placeholder" => __("You send"),
                                                    "value" => $sendAmount
                                                ]); ?>
                                                <?php if ($sources->count() === 1) { ?>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text border-0">
                                                            <span class="flag-icon flag-icon-<?php echo strtolower($paymentCountry["iso_code_alpha2"]); ?> flag-icon-squared rounded-circle mr-2"></span>
                                                            <span class="mr-4"><?php
                                                                echo $paymentCurrency["iso_code_alpha"];
                                                                ?></span>
                                                        </span>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text border-0">
                                                            <div id="sourceDropdown" class="ui single dropdown">
                                                                <span class="text"></span>
                                                                <i class="mdi mdi-menu-down"></i>
                                                                <div class="menu left">
                                                                    <?php if ( $sources->count() >= 10 ) { ?>
                                                                        <div class="ui icon search input">
                                                                            <input type="text" class="form-control" placeholder="Search...">
                                                                        </div>
                                                                    <?php } ?>
                                                                    <div class="scrolling menu">
                                                                        <?php foreach ( $sources as $source ) { ?>
                                                                            <div class="item"
                                                                                 data-value="<?php echo $source["country"]["id"]."_".$source["currency"]["id"] ?>"
                                                                                 data-country-iso="<?php echo $source["country"]["iso_code_alpha2"]; ?>"
                                                                                 data-currency-iso="<?php echo $source["currency"]["iso_code_alpha"]; ?>"
                                                                                 data-country-title="<?php echo $source["country"]["known_name"]; ?>"
                                                                                 data-country-id="<?php echo $source["country"]["id"]; ?>"
                                                                                 data-currency-id="<?php echo $source["currency"]["id"]; ?>"><i
                                                                                    class="flag-icon flag-icon-<?php echo strtolower($source["country"]["iso_code_alpha2"]); ?> flag-icon-squared rounded-circle mr-2"></i><?php
                                                                                echo '<strong class="mr-1">'.$source["currency"]["iso_code_alpha"].'</strong>'.$source["country"]["known_name"];
                                                                                ?></div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card mb-3 border-0">
                                                    <div class="p-0 d-flex justify-content-between align-items-center">
                                                        <label class="mb-0 form-group-control text-purple font-weight-bold"><?php echo __("Exchange Rate"); ?></label>
                                                        <div class="mb-0  text-orange form-text exchange-rate-nice"><?php echo $paymentCurrency["iso_code_alpha"]; ?> = <?php echo rtrim(rtrim($this->Number->format($sellRate, [
                                                                "places" => 8
                                                            ]), "0"), '.'); ?> <?php echo $payoutCurrency["iso_code_alpha"]; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="card mb-3 border-0">
                                                    <div class="p-0 d-flex justify-content-between align-items-center">
                                                        <label class="mb-0 form-group-control text-purple font-weight-bold"><?php echo __("Fees you pay"); ?></label>
                                                        <div class="mb-0 text-orange form-text base-cost-nice"><?php echo $paymentCurrencyIcon.$this->Number->format($quote->getBaseCost(), [
                                                                    "places" => 2
                                                                ]); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-theme form-group-control font-weight-bold"><?php echo __("Payout Amount"); ?></label>
                                            <div class="input-group">
                                                <?php echo $this->Form->control("payout_amount", [
                                                    "class" => "form-control border-right-0 get-amount",
                                                    "label" => false,
                                                    "type" => "text",
                                                    "placeholder" => __("Recipient gets"),
                                                    "value" => $payoutAmount
                                                ]); ?>
                                                <?php if ($destinations->count() === 1) { ?>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text border-0">
                                                            <span class="flag-icon flag-icon-<?php echo strtolower($payoutCountry["iso_code_alpha2"]); ?> flag-icon-squared rounded-circle mr-2"></span>
                                                            <span class="mr-4"><?php
                                                                echo $payoutCurrency["iso_code_alpha"];
                                                                ?></span>
                                                        </span>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text border-0">
                                                            <div id="destinationDropdown" class="ui single dropdown">
                                                                <span class="text"></span>
                                                                <i class="mdi mdi-menu-down"></i>
                                                                <div class="menu left">
                                                                    <?php if ($destinations->count() >= 10) { ?>
                                                                        <div class="ui icon search input">
                                                                            <input type="text" class="form-control" placeholder="Search...">
                                                                        </div>
                                                                    <?php } ?>
                                                                    <div class="scrolling menu">
                                                                        <?php foreach ( $destinations as $destination ) { ?>
                                                                            <div class="item"
                                                                                 data-value="<?php echo $destination["country"]["id"]."_".$destination["currency"]["id"] ?>"
                                                                                 data-country-iso="<?php echo $destination["country"]["iso_code_alpha2"]; ?>"
                                                                                 data-currency-iso="<?php echo $destination["currency"]["iso_code_alpha"]; ?>"
                                                                                 data-country-title="<?php echo $destination["country"]["known_name"]; ?>"
                                                                                 data-country-id="<?php echo $destination["country"]["id"]; ?>"
                                                                                 data-currency-id="<?php echo $destination["currency"]["id"]; ?>"><i
                                                                                    class="flag-icon flag-icon-<?php echo strtolower($destination["country"]["iso_code_alpha2"]); ?> flag-icon-squared rounded-circle mr-2"></i><?php
                                                                                echo '<strong class="mr-1">'.$destination["currency"]["iso_code_alpha"].'</strong>'.$destination["country"]["known_name"];
                                                                                ?></div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="transaction-details-card-header">
                                        <label class="text-theme form-group-control font-weight-bold"><?php echo __("Preferred Delivery Method for Your Funds"); ?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 ui field <?php echo ($form->getErrors()["payout_method_id"] ?? null) ? "error" : ""; ?> mb-4">
                                        <div class="ui segments" id="payout-method-list">
                                            <?php foreach ( $payoutMethods as $payoutMethod ) { ?>
                                                <?php if ( $payoutMethod["disabled"] === false ) { ?>
                                                    <div class="ui segment">
                                                        <div class="float-left mr-2">
                                                            <input <?php echo $quotePayoutMethod && $quotePayoutMethod["id"] === $payoutMethod["id"] ? "checked" : ""; ?> value="<?php echo $payoutMethod["id"]; ?>" name="payout_method_id" type="radio" />
                                                        </div>
                                                        <div class="form-text "><?php echo $payoutMethod["label"]; ?></div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="ui segment disabled">
                                                        <div class="float-left mr-2">
                                                            <input disabled type="radio" />
                                                        </div>
                                                        <div class="form-text  text-muted"><?php echo $payoutMethod["label"]; ?></div>
                                                        <p class="text-muted mb-0"><?php echo $payoutMethod["reason"]; ?></p>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ui field <?php echo ($quote->requirePayoutLocation() ? "" : "d-none"); ?> <?php echo ($form->getErrors()["payout_partner_id"] ?? null) ? "error" : ""; ?> mb-4">
                                        <label class="text-theme form-group-control font-weight-bold"><?php echo __("Select Payout Partner"); ?></label>
                                        <div class="ui segments" id="payout-partner-list">
                                            <?php foreach ( $quote->getPartners() as $payoutPartner ) { ?>
                                                <div class="ui segment">
                                                    <div class="float-left mr-2" style="margin-top: 5px;">
                                                        <input <?php echo $quote->getPartner() && $quote->getPartner()["id"] === $payoutPartner["id"] ? "checked" : ""; ?> value="<?php echo $payoutPartner["id"]; ?>" name="payout_partner_id" type="radio" />
                                                    </div>
                                                    <div class="form-text"><span class="float-right ml-2"><?php echo $paymentCurrency["iso_code_alpha"] . ' = ' . $payoutPartner["rate"] . ' ' . $payoutCurrency["iso_code_alpha"]; ?></span><?php echo $payoutPartner["title"]; ?></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ui field <?php echo ($quote->requirePayoutLocation() ? "" : "d-none"); ?> <?php echo ($form->getErrors()["payout_agency_id"] ?? null) || ($form->getErrors()["payout_location_id"] ?? null) ? "error" : ""; ?> mb-4">
                                        <label class="text-theme form-group-control font-weight-bold"><?php echo __("Payout Location"); ?></label>
                                        <div class="ui segments" id="payout-location">
                                            <?php if ($quote->getLocation()) { ?>
                                                <div class="ui segment">
                                                    <div class="form-text"><?php echo $quote->getAgency()["title"]; ?></div>
                                                    <p class="mb-0"><?php echo $quote->getLocation()['address']; ?></p>
                                                </div>
                                            <?php } else { ?>
                                                <div class="ui segment">
                                                    <div class="form-text text-muted"><?php echo __('Location not selected'); ?></div>
                                                    <p class="mb-0"><?php echo __('Click here to select a payout location'); ?></p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="transaction-details-card-header">
                                        <label class="text-theme form-group-control font-weight-bold"><?php echo __("Select Your Payment Method"); ?></label>
                                    </div>
                                </div>
                                <div class="ui field <?php echo ($form->getErrors()["payment_method_id"] ?? null) ? "error" : ""; ?> ">
                                    <div class="ui segments" id="payment-method-list">
                                        <?php foreach ( $paymentMethods as $paymentMethod ) { ?>
                                            <?php $extraAmount = $paymentMethod["cost"] - $quote->getBaseCost(); ?>
                                            <?php if ( $paymentMethod["disabled"] === false ) { ?>
                                                <div class="ui segment">
                                                    <div class="float-left mr-2">
                                                        <input <?php echo $quotePaymentMethod && $quotePaymentMethod["id"] === $paymentMethod["id"] ? "checked" : ""; ?> value="<?php echo $paymentMethod["id"]; ?>" name="payment_method_id" type="radio" />
                                                    </div>
                                                    <div class="form-text "><span class="float-right"><?php echo $extraAmount == 0 ? '<span class="text-success">'.__("Free").'</span>' : '+'.$paymentCurrencyIcon.$this->Number->format($extraAmount, [
                                                                    "places" => 2
                                                                ]); ?></span><?php echo $paymentMethod["title"]; ?></div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="ui segment disabled">
                                                    <div class="float-left mr-2">
                                                        <input disabled type="radio" />
                                                    </div>
                                                    <div class="form-text  text-muted"><?php echo $paymentMethod["title"]; ?></div>
                                                    <p class="text-muted mb-0"><?php echo $paymentMethod["reason"]; ?></p>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php $this->Form->unlockField("payout_method_id"); ?>
                                <?php $this->Form->unlockField("payment_method_id"); ?>
                                <?php $this->Form->unlockField("payout_partner_id"); ?>
                                <?php $this->Form->unlockField("payout_agency_id"); ?>
                                <?php $this->Form->unlockField("payout_location_id"); ?>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                    </div>
                </div><!--//col-xl-6-->
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 flex-column">
                    <div class="h-100 bg-indigo ui loader form mb-3">
                        <div class="py-5">
                            <?php echo $this->element('quote_summary', [
                                'quote' => $quote,
                            ]); ?>
                            <div class="px-4 text-right">
                                <button id="submitButton" type="button" style="letter-spacing: 0.065rem" class="btn btn-block btn-primary f-14 pl-5 pr-5"><?php echo __("Next"); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--//row-->
        </div><!--//container-->
    </section>

</main>
<?php $icuFormatter = str_replace("9", "0", $this->Number->format(999999999999999999, [
    "places" => 2
])); ?>
<script type="text/javascript">
    let direction = "sending";
    let noRequest = true;
    function getPlaceholderXs()
    {
        return '<div class="ui placeholder">\n' +
            '<div class="medium line"></div>\n' +
            '</div>';
    }
    function getPlaceholderSm()
    {
        return '<div class="ui placeholder">\n' +
            '<div class="long line"></div>\n' +
            '<div class="medium line"></div>\n' +
            '</div>';
    }
    function getQuote()
    {
        if ( noRequest === true ) {
            return true;
        }

        let placeholderSm = getPlaceholderSm();
        let placeholderXs = getPlaceholderXs();
        placeholderSm = '<div class="mt-n2 mb-1">'+placeholderSm+'</div>';
        placeholderXs = '<div class="mt-n2 mb-2">'+placeholderXs+'</div>';

        $(".loader.ui").addClass("loading");
        $(".exchange-rate-nice").html(placeholderXs);
        $(".base-cost-nice").html(placeholderXs);

        $(".ui.field.error").removeClass("error");

        let $url = '<?php echo $this->Url->build([
            "action" => "getQuote",
            "controller" => "Orders"
        ]); ?>';
        $url += '?payment_country_id='+$("#payment-country-id").val();
        $url += '&payment_currency_id='+$("#payment-currency-id").val();
        if ( $('input[name="payment_method_id"]:checked').length > 0 ) {
            $url += '&payment_method_id='+$('input[name="payment_method_id"]:checked').val();
        }
        $url += '&payout_country_id='+$("#payout-country-id").val();
        $url += '&payout_currency_id='+$("#payout-currency-id").val();
        if ( $('input[name="payout_method_id"]:checked').length > 0 ) {
            $url += '&payout_method_id='+$('input[name="payout_method_id"]:checked').val();
        }
        if ( direction === "sending" ) {
            $url += '&send_amount='+$("#send-amount").val();
            $url += '&direction=sending';
        } else {
            $url += '&payout_amount='+$("#payout-amount").val();
            $url += '&direction=receiving';
        }
        $url += '&payout_partner_id='+$('input[name="payout_partner_id"]:checked').val();
        $("#submitButton").addClass("disabled").attr("disabled", "disabled");
        $("#payout-method-list").html("");
        $("#payment-method-list").html("");
        $("#payout-partner-list").html("");
        $("#payout-location").html("");

        $("#flashErrors").html("");

        for (let i =0; i < 2; i++) {
            $("#payout-method-list")
                .append($('<div class="ui segment disabled" />').html(placeholderSm));
            $("#payment-method-list")
                .append($('<div class="ui segment disabled" />').html(placeholderSm));
            $("#payout-partner-list")
                .append($('<div class="ui segment disabled" />').html(placeholderSm));
        }

        $("#payout-location")
            .append($('<div class="ui segment disabled" />').html(placeholderSm));

        let $alert = $("#quoteForm").find(".alert").eq(0);
        $alert.addClass("d-none");

        $("#quoteForm").find('p.feedback').remove();
        $("#quoteForm").find('.form-group.has-warning').removeClass("has-warning");

        $.ajax($url, {
            accepts: {
                json: 'application/json'
            },
            method: 'GET',
            cache: false,
            success: function (response) {
                // if ( response.messages.length > 0 ) {
                //     $alert
                //         .removeClass("d-none")
                //         .html('<div class="small mb-0 text-justify">'+response.messages[0]+'</div>');
                //
                // }
                if ( response.resolved_issues.length > 0 ) {
                    $.each(response.resolved_issues, function(item){
                        let $parameter = $("#quoteForm").find('[name="'+$(this).attr("param")+'"]').eq(0);
                        if (typeof $parameter != 'undefined') {
                            $parameter.parents('.form-group').eq(0).addClass("has-warning");
                            let $errorContainer = $('<p />').addClass("mt-0 mb-3 p-3 feedback").text($(this).attr("message"));
                            $parameter.parents('.form-group').append($errorContainer);
                        }
                    });
                }
                $("#send-amount").val(response.send_amount);
                $("#payout-amount").val(response.payout_amount);
                $(".convert").html(response.send_amount_nice);
                $(".payout-amount-nice").html(response.payout_amount_nice);
                $(".base-cost-nice").html(response.base_cost_nice);
                $(".total-cost-nice").html(response.total_cost_nice);
                $(".total-nice").html(response.total_to_pay_nice);
                $(".exchange-rate-nice").html(response.exchange_rate_nice);
                $(".exchange-rate").html(response.exchange_rate_nice);
                $("#payout-method-list").html("");
                $("#payout-partner-list").html("");
                $("#payment-method-list").html("");
                $("#payout-location").html("");
                $(response.payout_methods).each(function(item){
                    let $segment = $('<div class="ui segment" />');
                    if (this.disabled === true) {
                        let $radio = $('<input type="radio" disabled />');
                        let $radioContainer = $('<div class="float-left mr-2" />');
                        let $primaryText = $('<div class="form-text text-muted" />');
                        let $secondaryText = $('<p class="text-muted mb-0" />');
                        $segment.append($radioContainer.append($radio))
                            .append($primaryText.html(this.label))
                            .append($secondaryText.html(this.reason));
                        $segment.addClass("disabled");
                    } else {
                        let $radio = $('<input type="radio" name="payout_method_id" value="'+this.id+'" />');
                        if ( response.payout_method ) {
                            if ( response.payout_method.id === this.id ) {
                                $radio.prop("checked", true);
                            }
                        }
                        let $radioContainer = $('<div class="float-left mr-2" />');
                        let $primaryText = $('<div class="form-text " />');
                        $segment.append($radioContainer.append($radio))
                            .append($primaryText.html(this.label));
                    }

                    $("#payout-method-list").append($segment);
                });
                $(response.payment_methods).each(function(item){
                    let $segment = $('<div class="ui segment" />');
                    if (this.disabled === true) {
                        let $radio = $('<input type="radio" disabled />');
                        let $radioContainer = $('<div class="float-left mr-2" />');
                        let $primaryText = $('<div class="form-text  text-muted" />');
                        let $secondaryText = $('<p class="text-muted mb-0" />');
                        $segment.append($radioContainer.append($radio))
                            .append($primaryText.html(this.title))
                            .append($secondaryText.html(this.reason));
                        $segment.addClass("disabled");
                    } else {
                        let $radio = $('<input type="radio" name="payment_method_id" value="'+this.id+'" />');
                        if ( response.payment_method ) {
                            if ( response.payment_method.id === this.id ) {
                                $radio.prop("checked", true);
                            }
                        }
                        let $radioContainer = $('<div class="float-left mr-2" />');
                        let $primaryText = $('<div class="form-text " />');
                        let $secondaryText = $('<span class="float-right" />');
                        if (this.instrument_cost === 0) {
                            $secondaryText.addClass("text-success").html("<?php echo htmlentities(__("Free")); ?>")
                        } else {
                            $secondaryText.html("+"+this.instrument_cost_nice);
                        }
                        $segment.append($radioContainer.append($radio))
                            .append($primaryText.html(this.title).prepend($secondaryText));
                    }
                    $("#payment-method-list").append($segment);
                });
                if ( response.payout_method ) {
                    $(".payout-method").text(response.payout_method.title);

                    if (response.require_payout_location) {
                        $("#payout-partner-list").parents(".ui.field").eq(0).removeClass("d-none");
                        $("#payout-location").parents(".ui.field").eq(0).removeClass("d-none");
                        if (response.partners) {
                            $(response.partners).each(function(item) {
                                let $segment = $('<div class="ui segment" />');
                                let $radio = $('<input type="radio" name="payout_partner_id" value="' + this.id + '" />');
                                if (response.partner) {
                                    if (response.partner.id === this.id) {
                                        $radio.prop("checked", true);
                                    }
                                }
                                let $radioContainer = $('<div class="float-left mr-2" style="margin-top: 5px;" />');
                                let $primaryText = $('<div class="form-text" />');
                                let $secondaryText = $('<span class="float-right" />');
                                $secondaryText.html(response.payment_currency.iso_code_alpha + ' = ' + this.rate + ' ' + response.payout_currency.iso_code_alpha);
                                $segment.append($radioContainer.append($radio)).append($primaryText.html(this.title).prepend($secondaryText));
                                $("#payout-partner-list").append($segment);
                            });
                        }
                        if (response.location.length > 0) {
                            let $segment = $('<div class="ui segment" />');
                            let $primaryText = $('<div class="form-text" />');
                            let $secondaryText = $('<p class="mb-0" />');
                            $("#payout-location").append($segment);
                        } else {
                            let $segment = $('<div class="ui segment" />');
                            let $primaryText = $('<div class="form-text text-muted" />');
                            let $secondaryText = $('<p class="mb-0" />');
                            $primaryText.html('<?php echo htmlentities(__('Location not selected')); ?>');
                            $secondaryText.html('<?php echo htmlentities(__('Click here to select a payout location')); ?>');
                            $segment.append($primaryText).append($secondaryText);
                            $("#payout-location").append($segment);
                        }
                    } else {
                        $("#payout-partner-list").parents(".ui.field").eq(0).addClass("d-none");
                        $("#payout-location").parents(".ui.field").eq(0).addClass("d-none");
                    }
                } else {
                    $(".payout-method").text("--");
                }
                if ( response.payment_method ) {
                    $(".payment-method").text(response.payment_method.title);
                } else {
                    $(".payment-method").text("--");
                }
            },
            error: function(xhr, status, error) {
                if ( xhr.status === 400 ) {
                } else if ( xhr.status === 401 ) {
                    window.location.href = '<?php echo $this->getRequest()->getRequestTarget(); ?>';
                } else if ( xhr.status === 403 ) {
                } else if ( xhr.status === 404 ) {
                } else {

                }
            },
            complete: function(xhr, status) {
                $("#submitButton").removeClass("disabled").removeAttr("disabled").text("<?php echo __("Next"); ?>");
                $(".loader.ui.loading").removeClass("loading");
            }
        });
    }
    $(function(){
        $("#payout-method-list").on("click", ".ui.segment", function(evt){
            if ( $(this).hasClass("disabled") ) {
                return false;
            }
            $("#payout-method-list").find(".ui.segment").removeClass("secondary");
            $("#payout-method-list").find('input[type="radio"]').each(function(){
                this.checked = false;
            });
            $(this).addClass("secondary");
            $(this).find('input[type="radio"]').get(0).checked = true;
            getQuote();
        });
        $("#payout-partner-list").on("click", ".ui.segment", function(evt){
            if ( $(this).hasClass("disabled") ) {
                return false;
            }
            $("#payout-partner-list").find(".ui.segment").removeClass("secondary");
            $("#payout-partner-list").find('input[type="radio"]').each(function(){
                this.checked = false;
            });
            $(this).addClass("secondary");
            $(this).find('input[type="radio"]').get(0).checked = true;
            getQuote();
        });
        $('#payout-location').click(function(){
            let $url = '<?php echo $this->Url->build([
                'action' => 'selectLocation',
            ]); ?>';
            $url += '?payment_country_id='+$("#payment-country-id").val();
            $url += '&payment_currency_id='+$("#payment-currency-id").val();
            if ( $('input[name="payment_method_id"]:checked').length > 0 ) {
                $url += '&payment_method_id='+$('input[name="payment_method_id"]:checked').val();
            }
            $url += '&payout_country_id='+$("#payout-country-id").val();
            $url += '&payout_currency_id='+$("#payout-currency-id").val();
            if ( $('input[name="payout_method_id"]:checked').length > 0 ) {
                $url += '&payout_method_id='+$('input[name="payout_method_id"]:checked').val();
            }
            if ( direction === "sending" ) {
                $url += '&send_amount='+$("#send-amount").val();
                $url += '&direction=sending';
            } else {
                $url += '&payout_amount='+$("#payout-amount").val();
                $url += '&direction=receiving';
            }
            $url += '&payout_partner_id='+$('input[name="payout_partner_id"]:checked').val();
            $url += '&payout_agency_id='+$('input[name="payout_agency_id"]').val();
            $url += '&payout_location_id='+$('input[name="payout_location_id"]').val();
            $("#submitButton").addClass("disabled").attr("disabled", "disabled");
            window.location.href = $url;
        });
        $("#payment-method-list").on("click", ".ui.segment", function(evt){
            if ( $(this).hasClass("disabled") ) {
                return false;
            }
            $("#payment-method-list").find(".ui.segment").removeClass("secondary");
            $("#payment-method-list").find('input[type="radio"]').each(function(){
                this.checked = false;
            });
            $(this).addClass("secondary");
            $(this).find('input[type="radio"]').get(0).checked = true;
            getQuote();
        });
        $("#submitButton").on("click", function(){
            $("#submitButton").addClass("disabled").attr("disabled", "disabled").text("<?php echo __("Please Wait..."); ?>");
            $("#quoteForm").submit();
        });
        $('#send-amount').mask("<?php echo $icuFormatter; ?>", {reverse: true});
        $("#send-amount").on("change", function(e){
            direction = "sending";
            getQuote();
        });
        $('#payout-amount').mask("<?php echo $icuFormatter; ?>", {reverse: true});
        $("#payout-amount").on("change", function(e){
            direction = "receiving";
            getQuote();
        });
        $('#sourceDropdown').dropdown({
            fullTextSearch: "exact",
            onShow: function(){
                $elem = $(this);
                $inputGroup = $elem.parents(".input-group").eq(0);
                $elem.children(".menu").css("max-width", $inputGroup.width()+'px');
                $elem.children(".menu").css("min-width", $inputGroup.width()+'px');
                $elem.children(".menu").css("width", $inputGroup.width()+'px');
            },
            onChange: function(value, text, choice){
                $icon = $('<i />')
                    .addClass("flag-icon rounded-circle mr-2 flag-icon-squared")
                    .addClass("flag-icon-"+$(choice).attr("data-country-iso").toLowerCase());
                $(choice).parents(".menu").eq(0).parents(".menu").eq(0).prev().prev(".text")
                    .html($icon)
                    .append($(choice).attr("data-currency-iso"));
                $("#payment-country-id").val($(choice).attr("data-country-id"));
                $("#payment-currency-id").val($(choice).attr("data-currency-id"));
                getQuote();
            },
            selectOnKeydown: false,
            match: 'text',
            message: {
                noResults: '<?php echo htmlentities(__("No Results Found."), ENT_QUOTES); ?>'
            }
        });
        $('#sourceDropdown').dropdown("set selected", "<?php echo $defaultSource; ?>");
        $('#destinationDropdown').dropdown({
            fullTextSearch: "exact",
            onShow: function(){
                $elem = $(this);
                $inputGroup = $elem.parents(".input-group").eq(0);
                $elem.children(".menu").css("max-width", $inputGroup.width()+'px');
                $elem.children(".menu").css("min-width", $inputGroup.width()+'px');
                $elem.children(".menu").css("width", $inputGroup.width()+'px');
            },
            onChange: function(value, text, choice){
                $icon = $('<i />')
                    .addClass("flag-icon rounded-circle mr-2 flag-icon-squared")
                    .addClass("flag-icon-"+$(choice).attr("data-country-iso").toLowerCase());
                $(choice).parents(".menu").eq(0).parents(".menu").eq(0).prev().prev(".text")
                    .html($icon)
                    .append($(choice).attr("data-currency-iso"));
                $("#payout-country-id").val($(choice).attr("data-country-id"));
                $("#payout-currency-id").val($(choice).attr("data-currency-id"));
                getQuote("sending");
            },
            selectOnKeydown: false,
            match: 'text',
            message: {
                noResults: '<?php echo htmlentities(__("No Results Found."), ENT_QUOTES); ?>'
            }
        });
        $('#destinationDropdown').dropdown("set selected", "<?php echo $defaultDestination; ?>");
        $('#payout-partner-id').dropdown({
            fullTextSearch: "exact",
            onChange: function(value, text, choice){
                getQuote();
            },
            selectOnKeydown: false,
            match: 'text',
            message: {
                noResults: '<?php echo htmlentities(__("No Results Found."), ENT_QUOTES); ?>'
            }
        });
        $('#payout-partner-id').dropdown("set selected", "<?php echo $quote->getPartner()['id']; ?>");
        noRequest = false;
    });
</script>
