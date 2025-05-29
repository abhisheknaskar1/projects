<?php
use Cake\I18n\Time;

/**
 * @var \App\View\AppView $this
 * @var array $order
 * @var string $token
 * @var string $merchantId
 * @var string $siteId
 * @var array $cards
 */

echo $this->Html->css([
    "/vendors/semantic-ui/components/header.min",
]);
echo $this->Html->script([
    'https://cdn.safecharge.com/safecharge_resources/v1/websdk/safecharge.js'
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
$subTotal = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["send_amount"] + $order["fees"], [
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
if ($this->getRequest()->getQuery("media") === "app") {
    $this->layout = 'app';
}
/** @var \App\WebService\Customer $account */
$account = $this->getRequest()->getSession()->read('Auth.User.account');
?>
<style>
    .app-content .content {
        padding: 30px 0;
    }
    .ui.segment label {
        font-size: 0.90rem;
        color: #1a237e;
    }
    .segment p {
        font-size: 0.85rem !important;
    }
    .segment .header span {
        font-size: 0.80rem;
        color: #999999;
    }
    .foot-notes p{
        font-size: 1rem !important;
    }
    .payment-icons {
        margin-top: 10px;
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #9e9e9e;
    }
    .SfcField {
        padding-top: 10px !important;
    }
    #ccHolderName {
        font-family: sans-serif;
        font-size: 0.80em;
        line-height: 1.2em;
        font-weight: bold;
        letter-spacing: 0.65px;
        color: #000;
        padding-top: 7px !important;
        height: 38px;
    }
    .payment-details-card-header
    {
        width: 100%;
        margin-bottom: 15px;
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #C8D1DA;
        padding-bottom: 10px;
        align-items: center;
    }
    .payment-details-card-header > h3
    {
        font-weight: 600;
        font-size: 2rem;
    }
</style>
<?php if ($this->getRequest()->getQuery("media") !== "app") { ?>
    <div class="w-100">
        <?php echo $this->Flash->render(); ?>
    </div>
<?php } ?>
<div class="row">
    <div class="<?php echo $this->getRequest()->getQuery("media") === "app" ? "d-none" : "col-sm-7 col-md-7 d-flex justify-content-center"; ?>">
        <div class="w-100">
            <div class="">
                <div class="shadow-sm bg-white rounded-sm p-4 mb-4">
                    <h4 class="mb-4"><?php echo __("Payment Details"); ?></h4>
                    <ul class="list-unstyled pb-4 mb-4 border-bottom">
                        <li class="text-muted d-flex justify-content-between  py-2"><span><?php echo __("Send Amount") ?></span><span class="text-theme font-weight-bold"><?php echo $sendAmount; ?></span></li>
                        <li class="text-muted d-flex justify-content-between  py-2"><span><?php echo __("Fees") ?></span><span class="text-theme font-weight-bold"><?php echo $feeAmount; ?></span></li>
                        <li class="text-muted d-flex justify-content-between  py-2"><span><?php echo __("Sub Total") ?></span><span class="text-theme font-weight-bold"><?php echo $subTotal; ?></span></li>
                        <li class="text-muted d-flex justify-content-between  py-2"><span><?php echo __("Discount") ?></span><span class="text-success font-weight-bold"><?php echo $discountAmount; ?></span></li>
                        <li class="text-muted d-flex justify-content-between  py-2"><span><?php echo __("Total") ?></span><span class="text-theme font-weight-bold"><?php echo $totalAmount; ?></span></li>
                        <li class="text-muted d-flex justify-content-between  py-2"><span><?php echo __("Destination") ?></span><span class="text-theme font-weight-bold"><?php echo $payoutCurrency["iso_code_alpha"].' - '.$payoutCountry["known_name"]; ?></span></li>
                        <li class="text-muted d-flex justify-content-between  py-2"><span><?php echo __("Exchange Rate") ?></span><span class="text-theme font-weight-bold"><?php echo $paymentCurrency["iso_code_alpha"]." = ".$order["sell_rate"]." ".$payoutCurrency["iso_code_alpha"]; ?></span></li>
                        <li class="text-muted d-flex justify-content-between  py-2"><span><?php echo __("Payout Amount") ?></span><span class="text-theme font-weight-bold text-primary"><?php echo $payoutAmount; ?></span></li>
                        <li class="text-muted d-flex justify-content-between  py-2"><span><?php echo __("Payment Method") ?></span><span class="text-theme font-weight-bold"><?php echo $order["payment_method"]["title"]; ?></span></li>
                        <li class="text-muted d-flex justify-content-between  py-2"><span><?php echo __("Payout Method") ?></span><span class="text-theme font-weight-bold"><?php echo $order["payout_method"]["title"]; ?></span></li>
                        <li class="text-muted d-flex justify-content-between  py-2"><span><?php echo __("Purpose") ?></span><span class="text-theme font-weight-bold"><?php echo $order["purpose"]["title"]; ?></span></li>
                    </ul>
                    <h4 class="mb-4"><?php echo __("Recipient Details"); ?></h4>
                    <ul class="list-unstyled">
                        <li class="text-muted d-flex justify-content-between py-2"><span><?php echo __("Recipient") ?></span><span class="text-theme font-weight-bold"><?php echo $order["recipient"]["full_name"]; ?></span></li>
                        <?php foreach ( $order["recipient"]["labels"] as $field => $label ) { ?>
                            <li class=" text-muted d-flex justify-content-between py-2"><span><?php echo $label ?></span><span class="text-theme font-weight-bold"><?php echo $order["recipient"]["nice_values"][$field] ?? $order["recipient"][$field] ?? null; ?></span></li>
                        <?php } ?>
                        <?php if ($order["payout_method"]["code"] === "OTC" && $order["payout"]["agency"]) { ?>
                            <li class="text-muted d-flex justify-content-between py-2"><span><?php echo __("Pickup Location") ?></span><span class="text-theme font-weight-bold"><?php echo $order["payout"]["agency"]["title"]; ?></span></li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="<?php echo $this->getRequest()->getQuery("media") === "app" ? "col-12" : "col-sm-5 col-md-5 d-flex justify-content-center"; ?>">
        <div class="w-100">
            <div class="ui form loader">
                <div class="ui segments mb-3 border-0" id="payment-method-list">
                    <?php foreach ($cards as $card) { ?>
                        <div class="ui segment payment-method p-4">
                            <div class="float-left mr-2" style="margin-top: 5px;">
                                <input name="saved_card" class="saved-card" type="radio" />
                            </div>
                            <div class="form-text" style="letter-spacing: 1px; font-size: 14px;">
                                <?php echo $this->Html->image("card-brands/".strtolower($card["card_scheme"]).".svg", [
                                    "width" => "36px",
                                    "class" => "mr-2",
                                ]); ?>
                                <span class="float-right text-muted" style="font-size: 13px;"><?php echo $card['expiry']->format('m/y'); ?></span><span style="font-weight: 600;"><?php echo implode('&nbsp;&nbsp;&nbsp;&nbsp;', array_filter([
                                    $card["card_number"],
                                ])); ?></span>
                            </div>
                            <form role="form" class="mt-4 payment-form saved-card-form d-none">
                                <input type="hidden" name="payment_account_id" value="<?php echo $card['payment_account_id']; ?>">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input name="cvv" type="password" class="form-control" maxlength="3" placeholder="<?php echo __('CVV'); ?>" />
                                        </div>
                                    </div>
                                    <div class="col-6"><button type="submit" class="btn mb-2 btn-success shadow-none btn-block "><?php echo __("Pay {amount}", [
                                                        'amount' => $totalAmount
                                            ]); ?></button></div>
                                </div>
                                <p style="font-size: 15px !important; letter-spacing: 1px;" class="text-justify text-theme"><?php echo __("This charge will appear as {statement_descriptor} on your card statement", [
                                    "statement_descriptor" => '<strong>' . __('ATLMONEY +442035884105') . '</strong>'
                                ]) ?></p>
                            </form>
                        </div>
                    <?php } ?>
                    <div class="ui segment payment-method">
                        <div class="float-left mr-2" style="margin-top: 5px;">
                            <input <?php echo empty($cards) ? "checked" : ""; ?> name="saved_card" class="saved-card" type="radio" />
                        </div>
                        <div class="form-text" style="letter-spacing: 1px; font-size: 14px;">
                            <span style="font-weight: 600;"><?php echo __('New {order}', [
                               'order' =>  $order['payment_method']['title'],
                            ]); ?></span>
                            <span class="ml-2">
                                <?php echo $this->Html->image("card-brands/visa.svg", [
                                    "width" => "36px",
                                ]); ?>
                                <?php echo $this->Html->image("card-brands/mastercard.svg", [
                                    "width" => "36px",
                                ]); ?>
                            </span>
                        </div>
                        <form role="form" id="newCardPaymentForm" class="mt-4 payment-form <?php echo empty($cards) === false ? "d-none" : ""; ?>">
                            <div class="form-group">
                                <div class="form-control" id="cardNumber"></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <div class="form-control" id="expiryDate"></div>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <div class="form-control" id="cvCode"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo __('Name on card'); ?>" name="ccHolderName" required id="ccHolderName" />
                                    </div>
                                </div>
                            </div>
                            <p style="font-size: 14px !important; letter-spacing: 1px;" class="text-justify"><?php echo __("This charge will appear as {statement_descriptor} on your card statement", [
                                "statement_descriptor" => '<strong>' . __('ATLMONEY +442035884105') . '</strong>'
                            ]) ?></p>
                            <button type="submit" class="btn mb-2 btn-success shadow-none btn-block "><?php echo __("Pay {amount}", [
                                        'amount' => $totalAmount
                                ]); ?></button>
                        </form>
                        <div class="foot-notes">
                            <p class="text-muted text-justify mt-3" style="letter-spacing: 1px; font-size: 0.8rem !important;"><?php echo __("Your security is important to us. We do not store your credit card information. Online payments are passed via a secure socket layer to a payment processor where your information is tokenized (whereby a random number is generated to represent your payment). The payment processor is PCI compliant which ensures that your information is being handled in accordance with industry security standards."); ?></p>
                            <div class="d-flex w-100 justify-content-center my-4 align-items-center">
                                <span class="mx-2"><img class="img-fluid" style="width: 60px;" src="<?php echo $this->Url->build('/'); ?>assets/img/form-partner1.png" alt=""></span>
                                <span class="mx-2"><img class="img-fluid"  src="<?php echo $this->Url->build('/'); ?>assets/img/form-partner2.png" alt=""></span>
                                <span class="mx-2"><img class="img-fluid" style="width: 60px;" src="<?php echo $this->Url->build('/'); ?>assets/img/form-partner3.png" alt=""></span>
                                <span class="mx-2"><img class="img-fluid" style="width: 60px;" src="<?php echo $this->Url->build('/'); ?>assets/img/form-partner4.png" alt=""></span>
                            </div>
                            <p class="text-center text-muted" style="letter-spacing: 1px; font-size: 14px !important;"><?php echo __("We are Authorised and Regulated by the Financial Conduct Authority (FCA)."); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let $paymentMethodList = $('#payment-method-list');
    function createPayment(paymentOption, cardHolderName) {
        sfc.createPayment({
            "sessionToken"   : '<?php echo $token; ?>',
            "merchantId"     : '<?php echo $merchantId; ?>',
            "merchantSiteId" : '<?php echo $siteId; ?>',
            "userTokenId"    : '<?php echo $account->getProperty('cin'); ?>',
            "clientUniqueId" : '<?php echo $order['payment']['id']; ?>',
            "currency"       : '<?php echo $order['payment_currency']['iso_code_alpha']; ?>',
            "amount"         : '<?php echo $order['total_amount']; ?>',
            "cardHolderName" : cardHolderName,
            "paymentOption" : paymentOption
        }, function (res) {
            <?php if ($this->getRequest()->getQuery("media") === "app") { ?>
            let paymentResult = false;
            let paymentDescription = null
            if ( res.result === "ERROR" || res.result === "DECLINED" ) {
                paymentResult = false;
                paymentDescription = res.errorDescription
            } else {
                paymentResult = true;
                paymentDescription = "Your payment has been received."
            }
            <?php if ($this->getRequest()->getQuery("device") === "ios") { ?>
            webkit.messageHandlers.callbackHandler.postMessage({"ifCompleted": paymentResult, "message": paymentDescription});
            <?php } else { ?>
            app.paymentFinished(paymentResult, paymentDescription);
            <?php } ?>
            <?php } else { ?>
            window.location.href = '<?php echo $this->Url->build([
                'action' => 'verifyPayment',
                $order["id"],
                'token' => $token
            ]); ?>'
            <?php } ?>
        });
    }
    $(function(){
        $('.payment-method').click(function(){
           if ($paymentMethodList.find('input[type="radio"]:checked').length > 0) {
               $paymentMethodList.find('input[type="radio"]:checked').eq(0).parents('.segment').find('.payment-form').addClass('d-none');
               $paymentMethodList.find('input[type="radio"]:checked').get(0).checked = false;
           }
           $(this).find('input[type="radio"]').get(0).checked = true;
           $paymentMethodList.find('input[type="radio"]:checked').eq(0).parents('.segment').find('.payment-form').removeClass('d-none');
        });
    });
    let sfc = SafeCharge({
        sessionToken : '<?php echo $token; ?>',
        env: 'test',
        merchantId: '<?php echo $merchantId; ?>',
        merchantSiteId : '<?php echo $siteId; ?>',
        maskCvv: true
    });
    let ScFields = sfc.fields({
        fonts: [
            { cssUrl: 'https://fonts.googleapis.com/css?family=Source+Code+Pro' }, // include your custom fonts
        ]
    });
    let style = {
        base: { // default idle state
            lineHeight: '1em',
            fontWeight: 'bold',
            letterSpacing: '0.65px'
        },
    };
    let cardNumber = ScFields.create('ccNumber', {
        style: style
    });
    cardNumber.attach('#cardNumber');
    let cardExpiry = ScFields.create('ccExpiration', {
        style: style
    });
    cardExpiry.attach('#expiryDate');
    let cardCvc  = ScFields.create('ccCvc', {
        style: style
    });
    cardCvc .attach('#cvCode');
    $(function(){
        $('.saved-card-form').submit(function(e) {
            $(".ui.form.loader").eq(0).addClass("loading");
            $(this).find('button[type="submit"]').attr("disabled", "disabled").addClass("disabled");
            $(this).find('button[type="submit"]').text('<?php echo htmlentities(__('Please Wait...'), ENT_QUOTES); ?>');
            e.preventDefault();
            e.stopPropagation();
            let paymentAccountId = $(this).find('input[name="payment_account_id"]').val();
            let cvv = $(this).find('input[name="cvv"]').val();
            let $paymentOption = {
                'userPaymentOptionId': paymentAccountId,
                'card' : {
                    'CVV': cvv
                }
            };
            createPayment($paymentOption, '');
        });
        $("#newCardPaymentForm").submit(function(e) {
            $(".ui.form.loader").eq(0).addClass("loading");
            $(this).find('button[type="submit"]').attr("disabled", "disabled").addClass("disabled");
            $(this).find('button[type="submit"]').text('<?php echo htmlentities(__('Please Wait...'), ENT_QUOTES); ?>');
            e.preventDefault();
            e.stopPropagation();
            let $paymentOption = cardNumber;
            createPayment($paymentOption, $("#ccHolderName").val());
        })
    })
</script>
