<?php
use App\Utility\EmailObfuscator;
use Cake\Core\Configure;
use Cake\I18n\I18n;

/**
 * @var \App\View\AppView $this
 * @var string $titleForLayout
 * @var string $recentEmail
 */
$this->layout = false;

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
</head>

<body>
    <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo"><a href="<?php echo $this->Url->build([
                "controller" => "Pages",
                "action" => "index",
                "_base" => $locale,
            ]); ?>"><img src="<?php echo $this->Url->build('/'); ?>assets/img/Atllogo.svg" alt=""></a></h1>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-md-8 col-sm-8 offset-md-2 offset-sm-2 login-form">
                    <h6 style="line-height: 1.5;" class="text-center font-weight-bold text-theme"><?php echo __("Please check your email to verify your account and complete your registration") ?></h6>
                    <h6 style="line-height: 1.5;" class="text-center font-weight-bold text-theme mb-5"><?php echo __("Click the button below if you not received verification email.") ?></h6>
                    <?php echo $this->Flash->render(); ?>
                    <div class="mb-5 text-center">
                        <?php echo $this->Form->postLink(__("Resend Email Verification"), [
                            'action' => 'resendEmailVerification',
                            '_base' => $locale,
                        ], [
                            'class' => 'btn btn-primary text-white shadow-none',
                            'id' => 'resendEmailVerificationBtn'
                        ]) ?>
                    </div>
                    <h6 style="line-height: 1.5;" class="text-center font-weight-bold text-theme"><?php echo __("Please email our support at {support_email} or call {support_phone} for any questions or query.", [
                            "support_email" => EmailObfuscator::obfuscate(Configure::read("App.Settings.csEmail")),
                            "support_phone" => '<a href="tel:'.Configure::read("App.Settings.csNumber").'">'.Configure::read("App.Settings.csNumber").'</a>'
                        ]); ?></h6>
                </div>
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
<?php echo $this->Html->script([
    "/vendors/js/vendor.bundle.base",
]); ?>
<script>
    $(function(){
        $("#resendEmailVerificationBtn").click(function(){
            $(this).addClass("disabled").attr("disabled", "disabled");
            $(this).text("<?php echo htmlentities(__("Resending..."), ENT_QUOTES); ?>")
        });
    })
</script>
</body>
</html>
