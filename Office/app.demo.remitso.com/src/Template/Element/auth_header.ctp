<?php
use App\View\AppView;
use Cake\Core\Configure;
use Cake\I18n\I18n;

/**
 * @var AppView $this
 */
$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
$locales = Configure::read('languages');
?>
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
<header id="header">
    <div class="container d-flex align-items-center">

        <h1 class="logo"><a href="<?php echo $this->Url->build("/"); ?>"><img src="<?php echo $this->Url->build('/'); ?>assets/img/DemoApp_logo.svg" alt=""></a></h1>
        <nav class="nav-menu d-none d-lg-flex justify-content-between w-100">
            <ul>
                <?php if ($this->getRequest()->getSession()->check("Auth.User.token")) { ?>
                    <li class="">
                        <a class="nav-link" href="<?php echo $this->Url->build([
                            "action" => "dashboard",
                            "controller" => "Customers",
                            "_base" => $locale,
                        ]); ?>"><?php echo __("Dashboard"); ?></a>
                    </li>
                <?php } ?>
            </ul>
            <ul>
                <li class="">
                    <a class="scrollto mob-log" href="<?php echo $this->Url->build([
                        "action" => "send",
                        "controller" => "Orders",
                    ]); ?>"><?php echo __("Send Money"); ?></a>
                </li>
                <?php if ($this->getRequest()->getSession()->check("Auth.User.token") === false) { ?>
                    <li class="">
                        <a class="scrollto mob-log" href="<?php echo $this->Url->build([
                            "action" => "login",
                            "controller" => "Customers",
                        ]); ?>"><?php echo __("Login"); ?></a>
                    </li>
                    <li class="">
                        <a class="" href="<?php echo $this->Url->build([
                            "action" => "register",
                            "controller" => "Customers",
                        ]); ?>"><?php echo __("Register"); ?></a>
                    </li>
                <?php } else { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->Url->build([
                            "action" => "logout",
                            "controller" => "Customers",
                        ]); ?>"><?php echo __("Logout"); ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>
