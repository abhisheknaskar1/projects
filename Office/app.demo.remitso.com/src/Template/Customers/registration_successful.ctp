<?php
/**
 * @var \App\View\AppView $this
 */
$endPoint = $this->Url->build([ "action" => "countrySelector" ], true);
$this->layout = 'app';

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<style>
    #header {
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
    @media only screen and (max-width:991px){
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
    .fca-notice
    {
        line-height: 1.2;
        font-size: 1rem;
        position: relative;
        bottom: auto;
        right: 0;
        left: 0;
        text-align: center;
        margin-top: 15px;
        color: #93969a;
    }
</style>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo"><a href="<?php echo $this->Url->build([
                'controller' => 'Pages',
                'action' => 'index',
                '_base' => $locale,
            ]); ?>"><img src="<?php echo $this->Url->build('/'); ?>assets/img/Atllogo.svg" alt=""></a></h1>
        <nav class="nav-menu d-none d-lg-flex justify-content-end w-100">
            <ul>
                <li class="">
                    <a class="" href="<?php echo $this->Url->build([
                        "controller" => "Customers",
                        "action" => "logout",
                        "_base" => $locale,
                        ]); ?>"><?php echo __("Logout"); ?></a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div class="container-fluid">
    <div class="row vh-100 align-items-center">
        <div class="col-lg-12">
            <div class="ui border-0 py-5 py-sm-2 py-md-2 py-lg-2">
                <h2 class="text-center font-weight-bold text-theme f-40 mb-4"><?php echo __("Two-Factor Authentication") ?></h2>
                <div class="row">
                    <div class="col-10 offset-1 col-sm-6 offset-sm-3 text-center">
                        <h6 style="line-height: 1.5;" class="text-center text-theme mb-4"><?php echo __("Two-Factor authentication (sometimes called 2FA) is an additional layer of security for your account. Passwords can be compromised - especially if you use the same password for multiple sites. Adding Two-Factor authentication means that even if your password gets stolen, you account will remain secure."); ?></h6>
                        <a href="<?php echo $endPoint; ?>" class="btn btn-light shadow-none mr-3"><?php echo __("Skip for now"); ?></a>
                        <a href="<?php echo $this->Url->build([
                            "action" => "twoStepVerification",
                            "_base" => $locale,
                            "referer" => urlencode($this->getRequest()->getRequestTarget())
                        ], true); ?>" class="btn btn-primary text-white shadow-none"><?php echo __("Enable 2FA"); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="bg-white auth-footer">
    <div class="container">
        <div class="row justify-content-center border-top">
            <div class="col-lg-6 text-center">
                <div class="mt-4">
                    <p class="fca-notice"><small><?php echo __('DemoApp is the trading name of ABC Financials Ltd. Registered company No. 123456789. We are Authorised and Regulated by the Financial Conduct Authority (FCA) as a payment institution with reference number 123456.')?></small></p>
                </div>
            </div>
        </div>
    </div>
</section>
