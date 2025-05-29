<?php

use App\Form\RetryPaymentForm;
use App\View\AppView;

/**
 * @var AppView $this
 * @var array $order
 * @var array $cardSchemes
 * @var array $cards
 * @var RetryPaymentForm $form
 */
echo $this->Html->css([
    "dashboard",
    "/vendors/semantic-ui/components/menu.min",
    "/vendors/semantic-ui/components/header.min",
]);
$paymentCurrency = $order["payment_currency"];
$payoutCurrency = $order["payout_currency"];
$sendAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["send_amount"], [
    "places" => 2
]);
$feeAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["fees"], [
    "places" => 2
]);
$totalAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["total_amount"], [
    "places" => 2
]);
$payoutAmount = ($payoutCurrency["icon"] ?: $payoutCurrency["iso_code_alpha"]." ").$this->Number->format($order["payout_amount"], [
    "places" => 2
]);
$paymentMethod = $order["payment_method"];
$payoutMethod = $order["payout_method"];
$totalNice = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["send_amount"]+$order["fees"], [
    "places" => 2
]);
$cardCollection = collection($cards);
$activeCards = $cardCollection->reject(function($card) {
    return $card["expiry"]->isPast();
});
?>
<style>
    .table th, .table td {
        font-size: 0.86rem;
        border-top: 0px;
    }
    .table td {
        font-weight: 500;
        letter-spacing: 0.05rem;
    }
    #quoteForm label{
        font-size: 0.90rem;
    }
    .form-text {
        font-weight: bold;
        font-size: 0.88rem;
    }
    .ui.segment {
        padding: 0.80rem;
    }
    .ui.dropdown .menu .item, .ui.dropdown .menu .message{
        font-size: 0.85rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .ui.dropdown .text{
        font-size: 0.85rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .field p.error {
        font-size: 0.80rem;
        letter-spacing: 0.05rem;
        padding: 5px;
        color: #9f3a38;
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
    #flashErrors .message {
        margin-bottom: 1.5rem;
    }
    p.error {
        margin-bottom: 0;
    }
</style>
<div class="app-content">
    <section class="content pt-4 pb-4">
        <div class="container">
            <div id="flashErrors"><?php echo $this->Flash->render(); ?></div>
            <div class="row">
                <div class="col-sm-7 col-md-7 d-flex justify-content-center">
                    <div class="card border w-100 mb-4">
                        <div class="card-body">
                            <table class="table mb-0">
                                <tbody>
                                <tr>
                                    <th style="width:50%" class="text-right text-theme "><?php echo __("Order Number") ?></th>
                                    <td style="width:50%" class="text-left covert"><?php echo $order["order_number"]; ?></td>
                                </tr>
                                <tr>
                                    <th style="width:50%" class="text-right text-theme "><?php echo __("Send Amount") ?></th>
                                    <td style="width:50%" class="text-left covert"><?php echo $sendAmount; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right text-theme "><?php echo __("Payment method") ?></th>
                                    <td class="text-left payment-method"><?php echo $paymentMethod["title"]; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right text-theme "><?php echo __("Exchange rate") ?></th>
                                    <td class="text-left exchange-rate"><?php echo rtrim(rtrim($this->Number->format($order["sell_rate"], [
                                        "places" => 8
                                    ]), "0"), '.'); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right text-theme "><?php echo __("Recipient gets") ?></th>
                                    <td class="text-left payout-amount-nice"><?php echo $payoutAmount; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right text-theme "><?php echo __("Recipient") ?></th>
                                    <td class="text-left payout-amount-nice"><?php echo $order["recipient"]["full_name"]; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right text-theme "><?php echo __("Delivery method") ?></th>
                                    <td class="text-left payout-method"><?php echo $payoutMethod["title"]; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right text-theme "><?php echo __("Fees") ?></th>
                                    <td class="text-left total-cost-nice"><?php echo $feeAmount; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right text-theme "><?php echo __("Total to pay") ?></th>
                                    <td class="text-left text-theme total-nice"><?php echo $totalNice; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-sm-5 col-md-5 d-flex justify-content-center">
                    <div class="w-100">
                        <?php echo $this->Form->create($form, [
                            "autocomplete" => "off",
                            "templates" => [
                                "inputContainer" => '<div class="field mb-3"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconPosition}} {{iconClass}} w-100">{{preIconHtml}}{{content}}{{iconHtml}}</div></div>',
                                'inputContainerError' => '<div class="field error mb-3"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconPosition}} {{iconClass}} w-100">{{preIconHtml}}{{content}}{{iconHtml}}</div>{{error}}</div>',
                                'error' => '<p class="error ">{{content}}</p>'
                            ],
                            "id" => "profile-form"
                        ]); ?>
                        <div class="ui form loader">
                            <?php if ( in_array($paymentMethod["code"], ["CCP", "DCP"]) ) { ?>
                                <?php echo $this->element("card_input", [
                                    "totalNice" => $totalNice,
                                    "cardSchemes" => $cardSchemes,
                                    "form" => $form,
                                    "cards" => $activeCards,
                                    "label" => false,
                                    "paymentMethod" => $paymentMethod
                                ]); ?>
                            <?php } else if ( $paymentMethod["code"] === "EFT" ) { ?>
                                <?php echo $this->element("eft_payment", [
                                    "account" => $paymentAccount,
                                    "totalNice" => $totalNice,
                                    "reference" => $customer->getProperty("cin")
                                ]); ?>
                            <?php } ?>
                            <?php if ( in_array($paymentMethod["code"], ["CCP", "DCP"]) ) { ?>
                                <div class="foot-notes">
                                    <p class="text-justify mb-0"><?php echo __("Your security is important to us. We do not store your credit card information. Online payments are passed via a secure socket layer to a payment processor where your information is tokenized (whereby a random number is generated to represent your payment). The payment processor is PCI compliant which ensures that your information is being handled in accordance with industry security standards."); ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <?php echo $this->Form->end(); ?>
                        <div class="card w-100 mt-4 mb-4">
                            <div class="card-footer">
                                <div class="foot-notes">
                                    <div class="payment-icons text-center mb-3">
                                        <i class="pf pf-verified-by-visa mr-2"></i>
                                        <i class="pf pf-mastercard-securecode mr-2"></i>
                                        <i class="pf pf-sepa mr-2"></i>
                                        <i class="pf pf-bank-transfer"></i>
                                    </div>
                                    <p class="text-center"><?php echo __("We are Authorised and Regulated by the Financial Conduct Authority (FCA)."); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo $this->Html->script([
    "/vendors/js/jquery.mask.min",
    "/vendors/js/bundle",
]); ?>
<script>
    $(function(){
        $("#profile-form").submit(function(){
            $(this).find(".ui.form.loader").eq(0).addClass("loading");
        });
    })
</script>
