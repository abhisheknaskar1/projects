<?php
use App\View\AppView;
use App\WebService\Country;
use App\WebService\Customer;
use App\WebService\Quote;
use Cake\I18n\I18n;

/**
 * @var AppView $this
 * @var Quote $quote
 * @var Country $countries
 */
echo $this->Html->css([
    'paymentfont.min',
]);
$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
$sendAmount = $quote->getSendAmount()*100;
$sources = collection((array)$quote->getSources());
$paymentCountry = $quote->getPaymentCountry();
$paymentCurrency = $quote->getPaymentCurrency();
$payoutCountry = $quote->getPayoutCountry();
$payoutCurrency = $quote->getPayoutCurrency();
$defaultSource = implode("_", array_filter([
    $paymentCountry["id"] ?? null,
    $paymentCurrency["id"] ?? null
]));
$paymentCurrencyIcon = ($paymentCurrency["icon"] ?? null) ? $paymentCurrency["icon"] : ( $paymentCurrency["iso_code_alpha"] ?? null )." ";
$cost = $quote->getCost();
$payoutAmount = $quote->getPayoutAmount()*100;
$sellRate = $quote->getSellRate();
$destinations = collection($quote->getDestinations());
$defaultDestination = implode("_", array_filter([
    $payoutCountry["id"] ?? null,
    $payoutCurrency["id"] ?? null
]));
echo $this->Html->script([
    "/vendors/js/jquery.mask.min"
]);
/** @var Customer $customer */
$customer = $this->getRequest()->getSession()->read("Auth.User.account");
?>
<style>
    #quoteForm .form-group.has-warning .form-control{
        border-color: #ffc21c;
        border-bottom-left-radius: 0;
    }
    #quoteForm .form-group.has-warning .input-group-append .input-group-text {
        border-color: #ffc21c;
        border-bottom-right-radius: 0;
    }
    #quoteForm .form-group.has-warning .feedback {
        background-color: #ffc21c;
        color: #fff;
    }
    #quoteForm p{
        color: #121A41;
        font-weight: 600;
    }
    /*#quoteForm .ui.dropdown .menu.left {*/
    /*    right: 0px !important;*/
    /*}*/
    #quoteForm .flag-icon.flag-icon-squared {
        width: 1.4em;
        line-height: 1.4em;
    }
    #quoteForm .search--input {
        padding: 10px 18px;
    }
    #quoteForm .card-body {
        padding: 2.25rem 2rem;
    }

    .send-money-list ul li {
        line-height: 3;
    }
    .send-money-list ul li a {
        font-weight: 600;
        font-size: 1em;
        display: flex;
        align-items: center;
    }
    .send-money-list ul li a:hover
    {
        text-decoration: none;
    }
    .send-money-list ul li a i.bx{
        font-size: 1.5rem;
    }
    .send-money-list .flag-icon.flag-icon-squared {
        width: 1.5em;
        line-height: 1.5em;
    }
    .country-nav-pills .nav-link.active, .country-nav-pills .show>.nav-link {
        color: #007bff;
        background-color: #fff;
        border-bottom: 3px solid #007bff;
        border-radius: 0;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
    .more-payout-country, .more-send-country {
        display: none;
    }

    .nav-pills > li a
    {
        position: relative;
    }
    .nav-pills > li a.active:after {
        position: absolute;
        content: "";
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid #000000;
        left: 50%;
        top: 100%;
        margin-left: -10px;
    }
    .sending-heading
    {
        font-weight: 600;
        font-size: 40px;
    }
    .pf.pf-credit-card.mr-1 {
        font-size: 1.50em;
        color: #9e9e9e;
        margin-top: 5px;
    }
</style>
<section id="hero" class="d-flex align-items-center" style="margin-top: -1px">
    <div class="container">
        <div class="row align-items-center">
            <div class="hero-form-wrapper col-md-7 col-lg-6 col-xl-4">
                <h1 class="mob-visible"><?php echo __('Spread joy this season with the gift everyone loves – the gift of funds!'); ?></h1>
                <p class="py-4 mob-visible"><?php echo __('Send money to family, friends, and cover bills affordably—anywhere, anytime.'); ?></p>
                <div class="header-banner">
                    <?php echo $this->Form->create(null, [
                        'url' => [
                            "controller" => "Orders",
                            "action" => "send",
                            '_base' => $locale,
                        ],
                        'templates' => [
                            'inputContainer' => '{{content}}'
                        ],
                        "id" => "quoteForm"
                    ]); ?>
                    <?php echo $this->Form->hidden("payment_country_id", [
                        "id" => true
                    ]); ?>
                    <?php echo $this->Form->hidden("payment_currency_id", [
                        "id" => true
                    ]); ?>
                    <?php echo $this->Form->hidden("payout_country_id", [
                        "value" => $payoutCountry["id"] ?? null,
                        "id" => true
                    ]); ?>
                    <?php echo $this->Form->hidden("payout_currency_id", [
                        "value" => $payoutCurrency["id"] ?? null,
                        "id" => true
                    ]); ?>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="alert alert-warning p-2 d-none"></div>
                            <div class="form-group">
                                <div class="input-group">
                                    <?php echo $this->Form->control("send_amount", [
                                        "class" => "form-control border-right-0",
                                        "label" => false,
                                        "type" => "text",
                                        "placeholder" => __("You send"),
                                        "default" => $sendAmount
                                    ]); ?>
                                    <?php if ($sources->count() === 1) { ?>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <span class="flag-icon flag-icon-<?php echo strtolower($paymentCountry["iso_code_alpha2"]); ?> flag-icon-squared rounded-circle mr-2"></span>
                                                <span class="mr-4"><?php
                                                    echo $paymentCurrency["iso_code_alpha"];
                                                    ?></span>
                                            </span>
                                        </div>
                                    <?php } else { ?>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <div id="sourceDropdown" class="ui single dropdown">
                                                    <span class="text"></span>
                                                    <i class="mdi mdi-menu-down"></i>
                                                    <div class="menu left">
                                                        <?php if ( $sources->count() >= 10 ) { ?>
                                                            <div class="ui icon search input">
                                                                <input type="text" class="form-control search--input" placeholder="Search...">
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
                            <div class="fees cross-section form-group">
                                <span class="text-theme float-right font-weight-bold"><?php echo __("Transaction fees"); ?></span>
                                <span class="ml-2"><?php echo $paymentCurrencyIcon.$this->Number->format($cost, [
                                            "places" => 2
                                        ]); ?></span>
                            </div>
                            <div class="convert cross-section form-group">
                                <span class="text-theme float-right font-weight-bold"><?php echo __("Converted amount"); ?></span>
                                <span class="ml-2"><?php echo $paymentCurrencyIcon.$this->Number->format($quote->getSendAmount(), [
                                            "places" => 2
                                        ]); ?></span>
                            </div>
                            <div class="rate cross-section form-group">
                                <span class="text-theme float-right font-weight-bold"><?php echo __("Exchange rate"); ?></span>
                                <span class="ml-2"><?php echo rtrim(rtrim($this->Number->format($sellRate, [
                                        "places" => 8
                                    ]), "0"), '.'); ?></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <?php echo $this->Form->control("payout_amount", [
                                        "class" => "form-control border-right-0",
                                        "label" => false,
                                        "type" => "text",
                                        "placeholder" => __("Recipient gets"),
                                        "default" => $payoutAmount
                                    ]); ?>
                                    <?php if ( $destinations->count() === 1 ) { ?>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <span class="flag-icon flag-icon-<?php echo strtolower($payoutCountry["iso_code_alpha2"]); ?> flag-icon-squared rounded-circle mr-2"></span>
                                                <span class="mr-4"><?php
                                                    echo $payoutCurrency["iso_code_alpha"];
                                                    ?></span>
                                            </span>
                                        </div>
                                    <?php } else { ?>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <div id="destinationDropdown" class="ui single dropdown">
                                                    <span class="text"></span>
                                                    <i class="mdi mdi-menu-down"></i>
                                                    <div class="menu left">
                                                        <?php if ( $destinations->count() >= 10 ) { ?>
                                                            <div class="ui icon search input">
                                                                <input type="text" class="form-control search--input" placeholder="Search...">
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
                            <div class="form-group">
                                <?php if ($customer !== null) {
                                    if($customer->getProperty('blocked') == true) { ?>
                                        <a href="<?php echo $this->Url->build([ "controller" => "Customers", "action" => "blocked", '_base' => $locale, ]); ?>"><button type="button" class="btn btn-block btn-success py-3"><?php echo ("Submit Transfer")?></button></a>
                                     <?php } else { ?>
                                        <button type="button" id="submitButton" class="btn btn-block btn-primary py-3"><?php echo ("Get Started")?></button>
                              <?php }
                                } else {?>
                                    <button type="button" id="submitButton" class="btn btn-block btn-primary py-3"><?php echo ("Get Started")?></button>
                                <?php } ?>
                            </div>
                            <p class="text-center text-theme"><?php echo __("By clicking continue, you agree to our {tos_link}.", [
                                    "tos_link" => 'Terms and Conditions'
                                ]); ?></p>
                            <div class="d-flex w-100 justify-content-center my-4 align-items-center">
                                <span class="mx-1"><i class="pf pf-credit-card mr-1"></i></span>
                                <span class="mx-2"><img class="img-fluid" style="width: 60px;" src="<?php echo $this->Url->build('/'); ?>assets/img/form-partner3.png" alt=""></span>
                                <span class="mx-2"><img class="img-fluid" style="width: 60px;" src="<?php echo $this->Url->build('/'); ?>assets/img/form-partner4.png" alt=""></span>
                            </div>
                            <p class="text-center text-theme"><?php echo __("We are Authorised and Regulated by the Financial Conduct Authority (FCA)."); ?></p>
                        </div>
                    </div>
                    <?php $this->Form->unlockField("payment_country_id"); ?>
                    <?php $this->Form->unlockField("payment_currency_id"); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <div class="col-md-5 col-lg-6 pr-md-5 col-xl-6 offset-xl-1">
                <h1><?php echo __('Spread joy this season with the gift everyone loves – the gift of funds!'); ?></h1>
                <p class="py-4"><?php echo __('Send money to family, friends, and cover bills affordably—anywhere, anytime.'); ?></p>
                <div class="d-flex align-items-center">
                    <a href="javascript:" class="mr-2"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/apple-app.png" alt=""></a>
                    <a href="javascript:"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/google-play-app.png" alt=""></a>
                </div>
            </div>
        </div>
</section>



<?php $icuFormatter = str_replace("9", "0", $this->Number->format(999999999999999999, [
    "places" => 2
])); ?>
<script type="text/javascript">

    $(function(){
        $('.more-payout-button').click(function(event) {
            event.preventDefault();
            $('.more-payout-country').slideToggle();
            if ($(this).hasClass('expanded')) {
                $('.more-payout-country').removeClass("d-flex");
                $(this).removeClass('expanded');
                $(this).text('<?php echo htmlentities(__('View More Options'), ENT_QUOTES); ?>');
            } else {
                $(this).addClass('expanded');
                $(this).text('<?php echo htmlentities(__('View Fewer Options'), ENT_QUOTES); ?>');
                $('.more-payout-country').addClass("d-flex");
            }
        });
        $('.more-send-button').click(function(event) {
            event.preventDefault();
            $('.more-send-country').slideToggle();
            if ($(this).hasClass('expanded')) {
                $('.more-send-country').removeClass("d-flex");
                $(this).removeClass('expanded');
                $(this).text('<?php echo htmlentities(__('View More Options'), ENT_QUOTES); ?>');
            } else {
                $(this).addClass('expanded');
                $(this).text('<?php echo htmlentities(__('View Fewer Options'), ENT_QUOTES); ?>');
                $('.more-send-country').addClass("d-flex");
            }
        });
    });

    function getQuote(direction)
    {
        let $url = '<?php echo $this->Url->build([
            "action" => "getQuote",
            "controller" => "Orders",
            '_base' => $locale,
        ]); ?>';
        $url += '?payment_country_id='+$("#payment-country-id").val();
        $url += '&payment_currency_id='+$("#payment-currency-id").val();
        $url += '&payout_country_id='+$("#payout-country-id").val();
        $url += '&payout_currency_id='+$("#payout-currency-id").val();
        if ( direction === "sending" ) {
            $url += '&send_amount='+$("#send-amount").val();
            $url += '&direction=sending';
        } else {
            $url += '&payout_amount='+$("#payout-amount").val();
            $url += '&direction=receiving';
        }
        $("#submitButton").addClass("disabled").attr("disabled", "disabled").text("<?php echo __("Processing..."); ?>");
        let $alert = $("#quoteForm").find(".alert").eq(0);
        $alert.addClass("d-none");
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
                            let $errorContainer = $('<p />').addClass("mt-0 mb-0 p-3 feedback text-white").text($(this).attr("message"));
                            $parameter.parents('.form-group').append($errorContainer);
                        }
                    });
                }
                $("#send-amount").val(response.send_amount);
                $("#payout-amount").val(response.payout_amount);
                $("#quoteForm").find(".fees.cross-section").eq(0).find("span:last").html(response.total_cost_nice);
                $("#quoteForm").find(".convert.cross-section").eq(0).find("span:last").html(response.send_amount_nice);
                $("#quoteForm").find(".rate.cross-section").eq(0).find("span:last").html(response.sell_rate);
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
                $("#submitButton").removeClass("disabled").removeAttr("disabled").text("<?php echo __("Get Started"); ?>");
            }
        });
    }
    $(function(){
        $("#submitButton").on("click", function(e){
            e.preventDefault();
            e.stopPropagation();
            $("#submitButton").addClass("disabled").attr("disabled", "disabled").text("<?php echo __("Processing..."); ?>");
            window.location.href = $("#quoteForm").attr("action");
        });
        $('#send-amount').mask("<?php echo $icuFormatter; ?>", {reverse: true});
        $("#send-amount").on("change", function(e){
            getQuote("sending");
        });
        $('#payout-amount').mask("<?php echo $icuFormatter; ?>", {reverse: true});
        $("#payout-amount").on("change", function(e){
            getQuote("receiving");
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
                getQuote("sending");
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
    });
</script>
