<?php
use App\View\AppView;
/**
 * @var AppView $this
 */
$languages = [];
?>
<?php echo $this->Html->css([
    "style",
    "/vendors/css/vendor.bundle.base",
    "/vendors/iconfonts/mdi/font/css/materialdesignicons.min",
    "/vendors/gdpr/gdpr-cookie",
    "/assets/vendor/bootstrap/css/bootstrap.min",
]); ?>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo"><a href="<?php echo $this->Url->build("/"); ?>"><img src="<?php echo $this->Url->build('/'); ?>assets/img/Atllogo.svg" alt=""></a></h1>
        <nav class="nav-menu d-none d-lg-flex justify-content-end w-100">
            <ul>
                <li class="">
                    <a class="" href="<?php echo $this->Url->build([ "action" => "logout", "controller" => "Customers" ]); ?>"><?php echo __("Logout"); ?></a>
                </li>
            </ul>
        </nav>
    </div>
</header>

