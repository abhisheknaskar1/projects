<?php
use App\View\AppView;
use App\WebService\Country;
use App\WebService\Customer;
use App\WebService\Quote;
use Cake\I18n\I18n;

/**
 * @var AppView $this
 * @var Country $countries
 */
echo $this->Html->css([
    'paymentfont.min',
]);
echo $this->Html->script([
    "/vendors/js/jquery.mask.min"
]);
/** @var Customer $customer */
$customer = $this->getRequest()->getSession()->read("Auth.User.account");
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-6 pr-md-5 col-xl-6">
                <!--                <h1>--><?php //echo __('Money Transfer
                //                    Your Way '); ?><!--</h1>-->
                <h1><?php echo __('Celebrate the season of giving with the perfect present – money! '); ?></h1>
                <?php if ($customer !== null) {
                    if ($customer->getProperty('blocked') == true) { ?>
                        <a class="btn btn-primary btn-lg" href="<?php echo $this->Url->build([
                            "controller" => "Customers",
                            "action" => "blocked",
                            "_base" => $locale,
                        ]); ?>"><?php echo __("Send Money"); ?></a>
                        <?php }
                    } else { ?>
                    <a class="btn btn-primary btn-lg" href="<?php echo $this->Url->build([
                        "controller" => "Orders",
                        "action" => "send",
                        "_base" => $locale,
                    ]); ?>"><?php echo __("Send Money"); ?></a>
                <?php } ?>
                <p class="py-4"><?php echo __('Pay family, friends and bills for less—at home and abroad.'); ?></p>
                <div class="d-flex align-items-center">
                    <a href="javascript:" class="mr-2"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/apple-app.png" alt=""></a>
                    <a href="javascript:"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/google-play-app.png" alt=""></a>
                </div>
                <div class="hero-trust py-5">
                    <h4><span class="trustspan"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/trustpilot-icon.png"></span><?php echo __('Trustpilot'); ?></h4>
                    <div class="row">
                        <div class="trust-link col-lg-5">
                            <h5><?php echo __('Over 100,000+ customers'); ?></h5>
                            <a href="https://uk.trustpilot.com/review/DemoApp.com?utm_medium=trustbox&utm_source=Carousel"><?php echo __('Read on Trustpilot'); ?> &nbsp; <span><i class='bx bx-chevron-right'></i></span></a>
                        </div>
                        <div class="trust-link col-lg-5">
                            <h5><?php echo __('Worried about Fraud?'); ?></h5>
                            <a href="<?php echo $this->Url->build([ "controller" => "Pages", "action" => "fraud", '_base' => $locale, ]); ?>"><?php echo __('Read here how to stay safe'); ?> &nbsp; <span><i class='bx bx-chevron-right'></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-form-wrapper col-md-7 col-lg-6 col-xl-4 offset-xl-1">
                <h1 class="mob-visible"><?php echo __('Money Transfer
                    Your Way '); ?></h1>
                <p class="py-4 mob-visible"><?php echo __('Pay family, friends and bills for less—at home and abroad.'); ?></p>
                <div class="header-banner">

                </div>
            </div>
        </div>
</section>

<main id="main">
    <section class="about-section pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10 offset-md-1">
                    <div class="insight-box">
                        <h2 class="mb-4 font-weight-bold"><?php echo __('Inside DemoApp'); ?></h2>
                        <div class="heading-devide mb-4"></div>
                        <p class="mb-4"><?php echo __('Our mission is to make money transfer transparent and secure for everyone; we provide financial inclusion to millions of people with great exchange rates and low fees.'); ?><strong><?php echo __(' Begin your global money transfer journey now.')?></strong></p>
                    </div><!--//insight-box-->

                </div>

            </div>
        </div>
    </section>
    <section class="step-section">
        <div class="container" itemscope itemtype="http://schema.org/Question">
            <div class="row mb-4">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h2 itemprop="name" class="font-weight-bold pb-2"><?php echo __('How to Send Money Online Using DemoApp'); ?></h2>
                    <div class="heading-devide mb-4 d-block mx-auto"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 d-flex align-items-stretch  justify-content-center">
                    <div class="step-box mb-4">
                        <span class="step-no"><?php echo __('1'); ?></span>
                        <h4 class="font-weight-bold"><?php echo __('Register Online'); ?></h4>
                        <p itemscope itemtype="http://schema.org/Answer" itemprop="suggestedAnswer acceptedAnswer"><?php echo __('Create your profile and enter the amount.'); ?></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 d-flex align-items-stretch justify-content-center">
                    <div class="step-box mb-4">
                        <span class="step-no"><?php echo __('2'); ?></span>
                        <h4 class="font-weight-bold"><?php echo __('Add Recipient'); ?></h4>
                        <p itemscope itemtype="http://schema.org/Answer" itemprop="suggestedAnswer acceptedAnswer"><?php echo __("Enter the details of the recipent's."); ?></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 d-flex align-items-stretch justify-content-center">
                    <div class="step-box mb-4">
                        <span class="step-no"><?php echo __('3'); ?></span>
                        <h4 class="font-weight-bold"><?php echo __('Pay & Relax'); ?></h4>
                        <p itemscope itemtype="http://schema.org/Answer" itemprop="suggestedAnswer acceptedAnswer"><?php echo __('Double-check the details, and then be ready to pay and relax.'); ?></p>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-4 offset-md-4 text-center">
                    <a href="<?php echo $this->Url->build([
                        "controller" => "Pages",
                        "action" => "howItWorks",
                        '_base' => $locale,
                    ]); ?>" class="btn btn-outline-dark btn-lg px-5"><?php echo __('Learn More'); ?></a>

                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4">
                    <h2 class="font-weight-bold mb-5"><?php echo __('A fast and secure way to send
                        money on the go'); ?></h2>
                    <p class="mb-5"><?php echo __('Download our app for free to send money online in minutes
                        to over 60 other countries. Track your payments and view
                        your transfer history from anywhere.'); ?></p>
                    <div class="d-flex align-items-center">
                        <a href="javascript:" class="mr-2"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/apple-app.png" alt=""></a>
                        <a href="javascript:"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/google-play-app.png" alt=""></a>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <video class="transaction-video" loop muted playsinline autoplay>
                        <?php if ($locale === 'fr-fr') { ?>
                            <source src="/img/DemoApp-website-Transaction-animation-French.mp4" type="video/mp4" />
<!--                        elseif ($locale === 'pt-br') { ?>-->
<!--                            <source src="/img/for approval.mp4" type="video/mp4" />-->
                   <?php  } else { ?>
                            <source src="/img/DemoApp-website-Transaction-animation.mp4" type="video/mp4" />
                     <?php } ?>
                    </video>
                </div>
            </div>
        </div>
    </section>
    <section class="feature-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h2 class="font-weight-bold pb-2"><?php echo __('Features of DemoApp')?></h2>
                    <div class="heading-devide mb-4 d-block mx-auto"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-lg-4 px-0 d-flex">
                            <div class="feature-box mb-4">
                                <span class="feature-no"><?php echo __('1')?></span>
                                <h4 class="font-weight-bold"><?php echo __('Fast & Safe'); ?></h4>
                                <p><?php echo __('Instant and secure transfer to your loved ones anywhere across the globe')?></p>
                            </div>
                        </div>
                        <div class="col-lg-4 px-0 d-flex">
                            <div class="feature-box mb-4">
                                <span class="feature-no"><?php echo __('2')?></span>
                                <h4 class="font-weight-bold"><?php echo __('Global Network'); ?></h4>
                                <p><?php echo __('Send money to more than 60 countries using our excellent rates; save more with our low transactional fees.')?></p>
                            </div>
                        </div>
                        <div class="col-lg-4 px-0 d-flex">
                            <div class="feature-box feature-box-last mb-4">
                                <span class="feature-no"><?php echo __('3')?></span>
                                <h4 class="font-weight-bold"><?php echo __('Reliable'); ?></h4>
                                <p><?php echo __('We are an Authorised and Regulated payment institution handling thousands of transactions')?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <a href="<?php echo $this->Url->build([ "controller" => "Orders", "action" => "send", '_base' => $locale, ]); ?>" class="btn btn-outline-dark shadow-none btn-lg px-5"><?php echo __("Start Sending"); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="video-section py-0">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="font-weight-bold"><?php echo __('DemoApp is bringing the world closer'); ?></h2>
                    <p><?php echo __('Send money around the globe in 3 easy steps; play the video to know more. '); ?></p>
                    <a href="https://www.youtube.com/watch?v=MkjgqZ3-z1k&ab_channel=DemoApp" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"></a>
                </div>
            </div>

        </div>
    </section>
    <section class="why-choose-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold pb-2"><?php echo __('Why Choose DemoApp?'); ?></h2>
                    <div class="heading-devide mb-4"></div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="row">
                        <div class="col-md-6 choose-block">
                            <h4 class="font-weight-bold mb-4"><?php echo __('Instant delivery'); ?></h4>
                            <p><?php echo __('Instant mobile wallet delivery in more than 15 countries'); ?></p>
                        </div>
                        <div class="col-md-6 choose-block">
                            <h4 class="font-weight-bold mb-4"><?php echo __('Cash Pickup '); ?></h4>
                            <p><?php echo __('Send Money to over 50,000
                                pick-up location'); ?></p>
                        </div>
                        <div class="col-md-6 choose-block">
                            <h4 class="font-weight-bold mb-4"><?php echo __('Bank Deposit'); ?></h4>
                            <p><?php echo __('Transfer money abroad instantly
                                to bank account in over 60 countries
                                in '); ?><strong><?php echo __('Africa, Asia, Europe, North America'); ?></strong>
                            </p>
                        </div>
                        <div class="col-md-6 choose-block">
                            <h4 class="font-weight-bold mb-4"><?php echo __('Customer assistance '); ?></h4>
                            <p><?php echo __('24/7 available to assist you with your global money transfer needs'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="money-safe-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold mb-4"><?php echo __('Your money’s in safe hands with us'); ?></h2>
                    <p class="mb-4"><?php echo __('Our fully hosted and robust technology assures you a safe and secure money transfer experience.'); ?></p>
                    <div class="heading-devide mb-4"></div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="money-col money-col1">
                        <img class="img-fluid" src="<?php echo $this->Url->build('/'); ?>assets/img/mastercard.png" alt="">
                    </div>
                    <div class="money-col money-col2">
                        <img class="img-fluid" src="<?php echo $this->Url->build('/'); ?>assets/img/visa.png" alt="">
                    </div>
                    <div class="money-col money-col3">
                        <img class="img-fluid" src="<?php echo $this->Url->build('/'); ?>assets/img/trustly-logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="faq" class="faq section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h2 class="font-weight-bold mb-4"><?php echo __('We are always here
                        to help you'); ?></h2>
                    <div class="heading-devide mb-4"></div>
                    <p><?php echo __('')?></p>
                    <ul class="pl-0 list-unstyled">
                        <li><h5 class="font-weight-bold"><i class="bx bx-check-circle icon-show text-success mr-2"></i><?php echo __('24*7 customer support'); ?></h5><p><small><?php echo __('We are happy to serve you with your queries')?></small></p></li>
                        <li><h5 class="font-weight-bold"><i class="bx bx-check-circle icon-show text-success mr-2"></i><?php echo __('Instant processing'); ?></h5><p><small><?php echo __('Send money abroad with us within seconds ')?></small></p></li>
                    </ul>
                </div>
                <div class="col-lg-7">
                    <div class="faq-list">
                        <ul>
                            <li data-aos="fade-up">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1"><?php echo __('Registration')?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                                    <p>
                                       <?php echo __('Yes, you will need to register with us to send money abroad. It will only take a minute to register with us. ')?>
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed"><?php echo __('Processing')?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                                    <p>
                                        <?php echo __("There might be a technical glitch or a genuine connection problem that either slows your transaction or might not update your 'processing'.")?>
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed"><?php echo __('Cancellation and Refunds')?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                                    <p>
                                        <?php echo __('Yes, you can cancel your transaction if your transaction status is 25%. But if your transaction status is 50%, it means we have already purchased the currency.')?>
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="300">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed"><?php echo __('Changes')?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                                    <p>
                                        <?php echo __('Yes, you can change your name after you have registered with us. Changes made after the registration should be correct and valid so that it does not become difficult for you as well as for us during the time of verification. ')?>
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed"><?php echo __('Start sending money with DemoApp')?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                                    <p>
                                        <?php echo __('Register your account by entering all the correct details with DemoApp. Then go to "Start Sending" and enter each detail as requested.  ')?>
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
                <div class="row mt-5">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <a href="<?php echo $this->Url->build([ "controller" => "Pages", "action" => "faq", '_base' => $locale, ]); ?>" class="btn btn-outline-dark btn-lg px-5"><?php echo __("Visit Our FAQ's"); ?></a>
                    </div>
                </div>
        </div>
    </section>
</main>


<script type="text/javascript">

    $(function(){
        $('.more-payout-button').click(function(event) {
            event.preventDefault();
            $('.more-payout-country').slideToggle();
            if ($(this).hasClass('expanded')) {
                $('.more-payout-country').removeClass("d-flex");
                $(this).removeClass('expanded');
                $(this).text('<?php echo htmlentities(__('Show all'), ENT_QUOTES); ?>');
            } else {
                $(this).addClass('expanded');
                $(this).text('<?php echo htmlentities(__('Show less'), ENT_QUOTES); ?>');
                $('.more-payout-country').addClass("d-flex");
            }
        });
        $('.more-send-button').click(function(event) {
            event.preventDefault();
            $('.more-send-country').slideToggle();
            if ($(this).hasClass('expanded')) {
                $('.more-send-country').removeClass("d-flex");
                $(this).removeClass('expanded');
                $(this).text('<?php echo htmlentities(__('Show all'), ENT_QUOTES); ?>');
            } else {
                $(this).addClass('expanded');
                $(this).text('<?php echo htmlentities(__('Show less'), ENT_QUOTES); ?>');
                $('.more-send-country').addClass("d-flex");
            }
        });
    });
</script>
