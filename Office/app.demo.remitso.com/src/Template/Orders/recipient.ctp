<?php
use App\View\AppView;
use App\WebService\Quote;
use Cake\Collection\CollectionInterface;
use Cake\I18n\I18n;


/**
 * @var AppView $this
 * @var Quote $quote
 * @var CollectionInterface $recipients
 * @var array $payoutChannel
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
$payoutMethod = $quote->getPayoutMethod();
$paymentMethod = $quote->getPaymentMethod();
$quoteRecipient = $quote->getRecipient();

$titleForLayout = "Recipient Details";
$metaDescriptionForLayout = "Send Or Transfer Money to Africa and Europe. International Remit Money To Bank Transfers, Cash Pick, Mobile Wallet top-up. DemoApp charges low fees.";
$metaOgTitleForLayout = "Transfer Or Send Remit Money With Low Fees | DemoApp";
$metaOgDescriptionForLayout = "Send Or Transfer Money to Africa and Europe. International Remit Money To Bank Transfers, Cash Pick, Mobile Wallet top-up. DemoApp charges low fees.";
$this->assign('titleForLayout', $titleForLayout);
$this->assign('metaDescriptionForLayout', $metaDescriptionForLayout);
$this->assign('metaOgTitleForLayout', $metaOgTitleForLayout);
$this->assign('metaOgDescriptionForLayout', $metaOgDescriptionForLayout);

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;

echo $this->Html->css([
    "dashboard",
    "/vendors/semantic-ui/components/menu.min",
    "/vendors/semantic-ui/components/header.min",
]);
?>
<style>
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
    .text-no-result {
        color: #ced4da;
    }
    .text-no-result h1 {
        font-size: 3.5rem;
    }
    .recipient-link:hover {
        text-decoration: none;
    }
    .recipient-name {
        font-size: 1.2rem;
        font-weight: 500;
        letter-spacing: 0.02rem;
        color: #14406e;
    }
    .recipient-text {
        font-size: 0.85rem;
        letter-spacing: 0.02rem;
    }
    .recipient-text-small {
        font-size: 0.70rem;
        letter-spacing: 0.02rem;
    }
    .recipient-avatar {
        padding-top: 0;
        background-color: transparent;
        color: #6a0dad;
        border: solid 2px #6a0dad;
        font-size: 1.4rem;
        transition: 0.3s;
    }
    .recipient-card {
        background: #fff;
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        border-radius: 4px;
        transition: 0.3s;
    }
    .recipient-card:hover, .recipient-card.active
    {
        background: #281049;
        color: #fffffc;
    }
    .recipient-card:hover .recipient-avatar, .recipient-card.active .recipient-avatar
    {
        background: #ff6327;
        border: 2px solid #ff6327;
        color: #fffffc;
    }
    .recipient-card:hover .recipient-name, .recipient-card.active .recipient-name
    {
        color: #fff;
    }
    .recipient-card:hover .text-muted, .recipient-card.active .text-muted
    {
        color: #fff !important;
    }

    #quoteForm .input-group-text
    {
        font-size: 1.1rem;
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
    #header .logo a {
        color: #2c4964; }
    #header .logo img {
        width: 200px;
    }
</style>
<main id="main" class="">
    <section class="transaction-details-section bg-light">
        <div class="container">
            <div class="row">
                <div class="transaction-details-card-header mb-3">
                    <h4 class=""><?php echo __('Select your recipient or create one')?></h4>
                </div>
            </div>
            <?php echo $this->Flash->render(); ?>
            <div class="row gutters">
                <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-6 col-sm-4 d-flex justify-content-center">
                            <div class="ui segment recipient-card fluid mb-4 w-100 text-center p-4 pt-5 pb-5" style="border-style: dashed">
                                <a href="<?php echo $this->Url->build([
                                    "controller" => "Recipients",
                                    "action" => "add",
                                    "_base" => $locale,
                                    $payoutChannel["id"],
                                    "quote" => $quote->getId()
                                ]); ?>" class="recipient-link d-block">
                                    <h6 class="mb-3"><span class="d-inline-flex square-md rounded-circle recipient-avatar justify-content-center align-items-center"><i class="mdi mdi-plus"></i></span></h6>
                                    <p class="recipient-name text-truncate mb-1"><?php echo __("New Recipient"); ?></p>
                                    <p class="recipient-text text-truncate text-muted mb-1"><?php echo __("Create new recipient"); ?></p>
                                </a>
                            </div>
                        </div>
                        <?php foreach ( $recipients as $recipient ) { ?>
                            <div class="col-6 col-sm-4 d-flex justify-content-center">
                                <div class="ui raised segment recipient-card <?php echo ($quoteRecipient["id"] ?? "") === $recipient["id"] ? "active" : "";  ?> fluid mb-4 w-100 text-center p-4 pt-5 pb-5">
                                    <a href="<?php echo $this->Url->build([
                                        "action" => "selectRecipient",
                                        "_base" => $locale,
                                        $quote->getId(),
                                        $recipient["id"]
                                    ]); ?>" class="recipient-link d-block">
                                        <h6 class="mb-3">
                                            <span class="d-inline-flex square-md rounded-circle recipient-avatar justify-content-center align-items-center"><?php echo substr($recipient["full_name"], 0, 1); ?></span></h6>
                                        <p class="recipient-name text-truncate mb-1"><?php echo $recipient["full_name"]; ?></p>
                                        <p class="recipient-text text-truncate text-muted mb-1"><?php echo $recipient["delivery_method"]["title"]; ?></p>
                                        <p class="recipient-text-small text-truncate text-muted mb-1"><?php echo $recipient["identifier_nice"]; ?></p>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div><!--//col-xl-3-->
                <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="h-100 bg-indigo ui loader form mb-3">
                        <div class="py-5">
                            <?php echo $this->element('quote_summary', [
                                'quote' => $quote,
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div><!--//row-->
        </div><!--//container-->
    </section>
</main>


