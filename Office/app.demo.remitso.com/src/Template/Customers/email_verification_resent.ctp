<?php
use App\Utility\EmailObfuscator;
use Cake\Core\Configure;
/**
 * @var \App\View\AppView $this
 * @var string $titleForLayout
 * @var \App\WebService\Customer $customer
 */
$this->layout = false;

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $titleForLayout; ?></title>
    <?php echo $this->Html->css([
        "style",
        "/vendors/css/vendor.bundle.base",
        "/vendors/iconfonts/mdi/font/css/materialdesignicons.min",
        "/vendors/iconfonts/flag-icon/css/flag-icon.min",
        "/vendors/gdpr/gdpr-cookie",
        "/assets/vendor/bootstrap/css/bootstrap.min",
        "/assets/vendor/icofont/icofont.min",
        "/assets/vendor/boxicons/css/boxicons.min",
        "/assets/vendor/venobox/venobox",
    ]); ?>
    <style>
        .ui.form .field>label {
            font-weight: 500 !important;
        }
        #header {
            background: #213262; !important;
            transition: all 0.5s;
            z-index: 997;
            padding: 16px 0;
            top: 0px; }
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
        .fw-600 {
            font-weight: 600!important;
        }
        @media only screen and (max-width:767px){
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
    <!-- Global site tag (gtag.js) - Google Ads: 312307825 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-312307825"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-312307825');
    </script>
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '206716314838332');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=206716314838332&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->
    <script src="https://cdn.pagesense.io/js/atl/41eb4a5cef9c4b3cba96e577b98152a7.js"></script>
</head>
<body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo"><a href="<?php echo $this->Url->build("/"); ?>"><img src="<?php echo $this->Url->build('/'); ?>assets/img/Atllogo.svg" alt=""></a></h1>
    </div>
</header>
<div class="container-fluid">
    <div class="row vh-100 align-items-center">
        <div class="col-lg-4 success-slider bg-primary d-none d-lg-flex align-items-center">
            <div class="wrapper-lg w-100">
                <div class="col-xl-10">
                    <div class="profile-details-card dash-download-card">
                        <h3 class="mb-5 text-white font-weight-bold"><?php echo __('Download the
                                    DemoApp App')?></h3>
                        <div class="mb-5">
                            <ul class="pl-0 list-unstyled">
                                <li class="mb-2">
                                    <a href="#" class="text-white"><span class="bx bxs-circle f-10 mr-2"></span><?php echo __('Make transfers on the spot')?></a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="text-white"><span class="bx bxs-circle f-10 mr-2"></span><?php echo __('Find your receivers easily')?></a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="text-white"><span class="bx bxs-circle f-10 mr-2"></span><?php echo __('Enjoy more delivery options')?></a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="text-white"><span class="bx bxs-circle f-10 mr-2"></span><?php echo __('Get instant transfer status
                                                notifications')?></a>
                                </li>
                            </ul>
                            <ul class="pl-0 list-unstyled d-flex align-items-center">
                                <li class="mb-3 mr-1">
                                    <a href="javascript:"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/apple-app.png"></a>
                                </li>
                                <li class="mb-3 mr-1">
                                    <a href="javascript:"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/google-play-app.png"></a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <div class="dash-trust">
                            <h2 class="mb-3 text-white"><span class="trustspan"><img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/trustpilot-icon.png"></span><?php echo __('Trustpilot')?></h2>
                            <div>
                                <img class="img-fluid" src="<?php echo $this->Url->build('/')?>assets/img/stars-5.png">
                            </div>
                        </div>
                        <div>
                            <p class="mt-1">
                                <a href="#" class="text-white d-block"> <small><?php echo __('TrustScore 4.4')?></small> </a>
                                <a href="#" class="text-white"> <small><?php echo __('1,270 reviews')?></small> </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-md-8 col-sm-8 offset-md-2 offset-sm-2">
                    <div class="text-center">
                        <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_ybapdjjv.json" background="transparent" speed="1" style="width: 200px; height: 200px; margin: auto; display: block;" loop autoplay></lottie-player>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-8 offset-md-2 offset-sm-2 login-form">
                    <h6 style="line-height: 1.5;" class="text-center font-weight-bold text-success mb-4"><?php echo __("Instructions to reset your password has been successfully sent to {email}. Please check your SPAM or JUNK folder if you do not see it in INBOX.", [
                            'email' => $customer->getProperty("email"),
                        ]); ?></h6>
                    <h6 style="line-height: 1.5;" class="text-center text-theme font-weight-bold"><?php echo __("Please email our support at {support_email} or call {support_phone} for any questions or query.", [
                            "support_email" => EmailObfuscator::obfuscate(Configure::read("App.Settings.csEmail")),
                            "support_phone" => '<a href="tel:'.Configure::read("App.Settings.csNumber").'">'.Configure::read("App.Settings.csNumber").'</a>'
                        ]); ?></h6>
                </div>
            </div>
            <div class="text-center mt-2">
                <p class="f-16 text-theme font-weight-bold"><?php echo __('Click ')?><a class="" href="<?php echo $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'index',
                        '_base' => $locale,
                    ]); ?>"><?php echo __('here ')?></a><?php echo __('to return to Home.')?></p>
            </div>
        </div>
        <footer class="sticky-footer bg-transparent d-print-none">
            <div class="container my-auto">
                <div class="copyright my-auto">
                    <span class="text-theme"><?php echo __("By using this website, you accept our Terms of Use and Privacy Policy. Copyright 2022 DemoApp."); ?></span>
                </div>
            </div>
        </footer>
    </div>
</div>
 </div>
</body>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<?php echo $this->Html->script([
    "/vendors/js/vendor.bundle.base",
]); ?>
</body>
</html>
