<?php

use App\Form\QuoteConfirmationForm;
use App\View\AppView;
use App\WebService\Customer;
use App\WebService\Quote;


/**
 * @var AppView $this
 * @var Quote $quote
 * @var array $purposes
 * @var QuoteConfirmationForm $form
 * @var array $cardSchemes
 * @var array $cards
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
$discount = $quote->getDiscountAmount();
$payoutAmount = $quote->getPayoutAmount()*100;
$sellRate = $quote->getSellRate();
$payoutMethod = $quote->getPayoutMethod();
$paymentMethod = $quote->getPaymentMethod();
$recipient = $quote->getRecipient();
$paymentAccount = $quote->getPaymentAccount();
$totalNice = $paymentCurrencyIcon.$this->Number->format($quote->getSendAmount() + $cost - $discount, [
    "places" => 2
]);
/** @var Customer $customer */
$customer = $this->getRequest()->getSession()->read("Auth.User.account");
$cardCollection = collection($cards);
$activeCards = $cardCollection->reject(function($card) {
    return $card["expiry"]->isPast();
});
$agency = $quote->getAgency();

$titleForLayout = __("Confirm and Pay");
$this->assign('titleForLayout', $titleForLayout);

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;

echo $this->Html->css([
    "dashboard",
    "/vendors/semantic-ui/components/menu.min",
    "/vendors/semantic-ui/components/header.min",
]);
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
        font-size: 0.90rem;
    }
    .form-text {
        font-weight: bold;
        font-size: 1rem;
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
        color: #A1A1A1 !important;
        font-size: 0.8rem !important;
        margin-top: 5px;
    }
    #flashErrors .message {
        margin-bottom: 1.5rem;
    }
    p.error {
        margin-bottom: 0;
    }
    .transaction table th, .transaction table td
    {
        border-top: none;
        font-size: 1.2rem;
        padding: 8px;
    }
    .transaction table th
    {
        color: #4b5353;
        font-weight: 400;
    }
    .transaction table .total-nice
    {
        font-size: 1.8rem;
    }
    .transaction table tr:last-child th{
        font-weight: 600;
        vertical-align: middle;
    }
    #profile-form .ui.form .field > label
    {
        margin-left: 0;
        font-family: 'Inter', sans-serif;
    }
    #header .logo {
        font-size: 32px;
        margin: 0;
        padding: 0;
        line-height: 1;
        font-weight: 700;
        letter-spacing: 0.5px;
        font-family: 'Inter', sans-serif; }
    #header .logo a {
        color: #2c4964; }
    #header .logo img {
        width: 200px;
    }
    .authorised {
        border-top: 0.5px solid #A0B7C9;
    }
</style>
<main id="main" class="">
    <section class="transaction-details-section">
        <div class="container">
            <?php echo $this->Flash->render(); ?>
            <div class="row no-gutters flex-row align-items-stretch">
                <div class="offset-xl-1 col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 flex-column">
                    <div class="h-100 bg-indigo transaction-details-card border-0">
                        <div class="">
                            <section class="content py-0 mb-4 transaction">
                                <div class="container">
                                    <div class="row">
                                        <div class="w-100 mb-4 card border-0 bg-indigo p-4 mb-3" id="order-details">
                                            <h6 class="mb-4 text-white"><?php echo __('Transfer Summary')?></h6>
                                            <div>
                                                <div class="mb-3"><span class="convert float-right ml-2 font-weight-bold text-white"><?php echo $paymentCurrencyIcon.$this->Number->format($quote->getSendAmount(), [
                                                    "places" => 2
                                                ]); ?></span><span class="text-orange"><?php echo __("Amount You're Sending") ?></span></div>
                                            </div>
                                            <div>
                                                <div class="mb-3"><span class="convert float-right ml-2 font-weight-bold text-white"><?php echo rtrim(rtrim($this->Number->format($sellRate, [
                                                    "places" => 8
                                                ]), "0"), '.'); ?></span><span class="text-orange"><?php echo __("Exchange rate") ?></span></div>
                                            </div>
                                            <div>
                                                <div class=""><span class="convert float-right ml-2 font-weight-bold text-white"><?php echo $payoutCurrencyIcon.$this->Number->format($quote->getPayoutAmount(), [
                                                    "places" => 2
                                                ]); ?></span><span class="text-orange"><?php echo __("Amount the Recipient Receives") ?></span></div>
                                            </div>
                                            <hr class="my-4 border-dashed border-orange" />
                                            <div>
                                                <div class="mb-3"><span class="convert float-right ml-2 font-weight-bold text-white"><?php echo $recipient["full_name"]; ?></span><span class="text-orange"><?php echo __("Recipient") ?></span></div>
                                            </div>
                                            <div>
                                                <div class="mb-3"><span class="convert float-right ml-2 font-weight-bold text-white"><?php echo $payoutMethod["title"]; ?></span><span class="text-orange"><?php echo __("Delivery method") ?></span></div>
                                            </div>
                                            <?php if ( $payoutMethod["code"] === "OTC" ) { ?>
                                                <div>
                                                    <div class="mb-3"><span class="convert float-right ml-2 font-weight-bold text-white"><?php echo $agency["title"]; ?></span><span class="text-orange"><?php echo __("Cash Pickup Agency") ?></span></div>
                                                </div>
                                            <?php } ?>
                                            <?php foreach ( $recipient["labels"] as $field => $label ) { ?>
                                                <div>
                                                    <div class="mb-3"><span class="convert float-right ml-2 font-weight-bold text-white"><?php echo $recipient["nice_values"][$field] ?? $recipient[$field] ?? "--"; ?></span><span class="text-orange"><?php echo $label; ?></span></div>
                                                </div>
                                            <?php } ?>
                                            <hr class="mb-4 mt-2 border-dashed border-orange" />
                                            <div>
                                                <div class="mb-3"><span class="convert float-right ml-2 font-weight-bold text-white"><?php echo $paymentCurrencyIcon.$this->Number->format($quote->getSendAmount(), [
                                                    "places" => 2
                                                ]); ?></span><span class="text-orange"><?php echo __("Sent Amount") ?></span></div>
                                            </div>
                                            <div>
                                                <div class="mb-3"><span class="convert float-right ml-2 font-weight-bold text-white"><?php echo $paymentCurrencyIcon.$this->Number->format($cost, [
                                                    "places" => 2
                                                ]); ?></span><span class="text-orange"><?php echo __("Fees") ?></span></div>
                                            </div>
                                            <div>
                                                <div class="mb-3"><span class="convert float-right ml-2 font-weight-bold text-white"><?php echo $paymentMethod["title"]; ?></span><span class="text-orange"><?php echo __("Payment method") ?></span></div>
                                            </div>
                                            <?php if (empty($quote->getDiscountCouponCode())) { ?>
                                                <div>
                                                    <div class="mb-3"><span class="text-success float-right ml-2"><a href="#applyDiscountModal" data-toggle="modal"><?php echo __('Apply Discount Code') ?></a></span><span class="text-orange"><?php echo __("Discount") ?></span></div>
                                                </div>
                                            <?php } else { ?>
                                                <div>
                                                    <div class="mb-3"><span class="text-success float-right ml-2 font-weight-bold text-white"><?php echo $paymentCurrencyIcon . $this->Number->format($quote->getDiscountAmount(), [
                                                            "places" => 2
                                                        ]); ?></span><span class="text-orange"><?php echo __("Discount") ?></span> <br />
                                                        <strong class="text-success mr-3"><?php echo $quote->getDiscountCouponCode(); ?></strong><a href="#removeDiscountConfirmationModal" data-toggle="modal" class="text-danger"><?php echo __('Remove'); ?></a></div>
                                                </div>
                                            <?php } ?>
                                            <div>
                                                <div class="mb-3"><span class="convert text-orange float-right ml-2 font-weight-bold"><?php echo $totalNice; ?></span><span class="text-orange"><?php echo __("Total to pay") ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div><!--//card-body-->
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 flex-column">
                    <div class="w-100 ui form loader p-4 card border-0 h-100 shadow-sm mt-0">
                        <div class="">
                            <?php echo $this->Form->create($form, [
                                "autocomplete" => "off",
                                "templates" => [
                                    "inputContainer" => '<div class="field mb-3"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconPosition}} {{iconClass}} w-100">{{preIconHtml}}{{content}}{{iconHtml}}</div></div>',
                                    'inputContainerError' => '<div class="field error mb-3"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconPosition}} {{iconClass}} w-100">{{preIconHtml}}{{content}}{{iconHtml}}</div>{{error}}</div>',
                                    'error' => '<p class="error">{{content}}</p>'
                                ],
                                "id" => "profile-form"
                            ]); ?>
                            <div class="">
                                <?php echo $this->Form->control("purpose_id", [
                                    "label" => false,
                                    "required" => false,
                                    "class" => "form-control",
                                    "type" => "select",
                                    "id" => true,
                                    "options" => array_merge(collection($purposes)->combine("id", "title")->toArray(), [
                                        'OTHER' => __("Other")
                                    ]),
                                    "templateVars" => [
                                        "labelText" => __("Transfer Purpose"),
                                        "labelClass" => "required",
                                    ],
                                    "empty" => __("Please Select")
                                ]); ?>
                                <?php
                                $purposeTextClass = $this->getRequest()->getData("purpose_id") === "OTHER" ? "" : "d-none";
                                echo $this->Form->control("purpose_text", [
                                    "label" => false,
                                    "required" => false,
                                    "class" => "form-control",
                                    "id" => true,
                                    "templateVars" => [
                                        "labelText" => __("Other Purpose"),
                                        "labelClass" => "required",
                                    ],
                                    "templates" => [
                                        "inputContainer" => '<div class="field '.$purposeTextClass.' mb-3"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconPosition}} {{iconClass}} w-100">{{preIconHtml}}{{content}}{{iconHtml}}</div></div>',
                                        'inputContainerError' => '<div class="field '.$purposeTextClass.' error mb-3"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconPosition}} {{iconClass}} w-100">{{preIconHtml}}{{content}}{{iconHtml}}</div>{{error}}</div>',
                                        'error' => '<p class="error text-roboto">{{content}}</p>'
                                    ],
                                    "placeholder" => __("Please type purpose of transfer")
                                ]); ?>
                                <?php if ( in_array($paymentMethod["code"], ["CCP", "DCP"]) ) { ?>
                                    <?php /* echo $this->element("card_input", [
                                                    "totalNice" => $totalNice,
                                                    "cardSchemes" => $cardSchemes,
                                                    "form" => $form,
                                                    "cards" => $activeCards,
                                                    "paymentMethod" => $paymentMethod
                                                ]); */ ?>
                                    <button type="submit" class="btn mb-2 btn-primary btn-block text-roboto"><?php echo __("Continue to Pay {amount}", [
                                            'amount' => $totalNice,
                                        ]); ?></button>
                                <?php } else if ( $paymentMethod["code"] === "EFT" ) { ?>
                                    <?php echo $this->element("eft_payment", [
                                        "account" => $paymentAccount,
                                        "totalNice" => $totalNice,
                                        "reference" => $customer->getProperty("cin")
                                    ]); ?>
                                <?php } else if ( $paymentMethod["code"] === "MOW" ) { ?>
                                    <?php echo $this->element("mow_payment", [
                                        "account" => $paymentAccount,
                                        "totalNice" => $totalNice,
                                        "reference" => $customer->getProperty("cin")
                                    ]); ?>
                                <?php } else if ( $paymentMethod["code"] === "FSP" || $paymentMethod["code"] === "POL" ) { ?>
                                    <p class="text-left"><?php echo __("You will be redirect to bank website to complete the payment."); ?></p>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn mb-3 btn-primary mt-3 float-right"><?php echo __("Confirm Transfer"); ?></button>
                                        </div>
                                    </div>

                                <?php } ?>
                                <?php if ( in_array($paymentMethod["code"], ["CCP", "DCP"]) ) { ?>
                                    <div class="foot-notes">
                                        <p class="text-justify mb-0"><?php echo __("Your security is our priority. We never store your credit card details. All online payments are securely transmitted via SSL to a trusted payment processor, where your information is tokenized—converted into a secure, randomized identifier. Our payment processor complies with PCI standards, ensuring your information is managed according to the highest industry security protocols."); ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--//container-->
    </section>
    <?php if (empty($quote->getDiscountCouponCode())) { ?>
        <div class="modal" id="applyDiscountModal">
            <div class="modal-dialog confirmation-modal modal-sm">
                <?php echo $this->Form->create(NULL, [
                    "url" => [
                        'controller' => 'Orders',
                        'action' => 'applyDiscount',
                        $quote->getId(),
                    ],
                    "data-submit" => "disable"
                ]); ?>
                <div class="modal-content">
                    <div class="modal-body">
                        <h6 class="text-primary"><?php echo __("Apply Discount Code"); ?></h6>
                        <p class="small"><?php echo __('Please Enter the Discount Code to Lower Your Transfer Fees.'); ?></p>
                        <div class="form-group"><?php echo $this->Form->control('discount_coupon_code', [
                            'required' => true,
                            'type' => 'text',
                            'class' => 'form-control',
                            'label' => false,
                            'error' => false,
                            'templates' => [
                                'inputContainer' => '{{content}}',
                            ],
                        ]); ?></div>
                        <p class="small">**<?php echo __('Terms and Conditions Apply'); ?></p>
                    </div>
                    <div class="modal-footer p-0">
                        <div class="btn-group border-0 d-flex w-100">
                            <button class="btn btn-outline-light border-right text-dark w-100 btn-sm  p-2" data-dismiss="modal"><?php echo __("Cancel"); ?></button>
                            <button class="btn btn-outline-light border-left text-dark w-100 btn-sm  p-2"><?php echo __("Apply"); ?></button>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    <?php } else { ?>
        <?php echo $this->element("confirmation_modal", [
            "id" => "removeDiscountConfirmationModal",
            "url" => [
                "action" => "removeDiscount",
                $quote->getId(),
            ],
            "content" => __("Are you sure, you want to remove this discount code?")
        ]); ?>
    <?php } ?>
</main>
<?php echo $this->Html->script([
    "/vendors/js/jquery.mask.min",
    "/vendors/js/bundle",
]); ?>
<script>
    let $purposeTextInput = $("#purpose-text");
    $(function(){
        $("#profile-form").submit(function(){
            $(this).find(".ui.form.loader").eq(0).addClass("loading");
        });
        $('#purpose-id').dropdown({
            clearable: false,
            selectOnKeydown: false,
            forceSelection: false,
            fullTextSearch: "exact",
            match: 'both',
            message: {
                noResults: '<?php echo htmlentities(__("No Results Found."), ENT_QUOTES); ?>'
            },
            onChange: function(value){
                if (value === "OTHER") {
                    $purposeTextInput.parents(".field").eq(0).removeClass("d-none");
                } else {
                    $purposeTextInput.parents(".field").eq(0).addClass("d-none");
                }
            }
        });
    })
</script>
