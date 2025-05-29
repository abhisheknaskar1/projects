<?php

use App\View\AppView;
use App\WebService\Customer;
use Cake\Collection\Collection;
use Cake\Core\Configure;
use Cake\I18n\Time;

/**
 * @var AppView $this
 * @var Customer $customer
 * @var Collection $devices
 */
use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;

$locales = Configure::read("languages", []);
$lastPwdModifiedText = '<i class="badge text-muted">'. __("Never") .'</i>';
$passwordModified = $customer->getProperty("password_modified");
if ( is_null($passwordModified) === false ) {
    $passwordModified = new Time($passwordModified);
    $lastPwdModified = $passwordModified->setTimezone($customer->getProperty("timezone", "UTC"));
    if ( $lastPwdModified->wasWithinLast("1 hours") ) {
        $lastPwdModifiedText  = $lastPwdModified->timeAgoInWords();
    } else if ( $lastPwdModified->isToday() ) {
        $lastPwdModifiedText  = $lastPwdModified->format("h:i A");
    } else {
        $lastPwdModifiedText  = $lastPwdModified->format("M d");
    }
}
?>
<style>
    .dashboard-nav li .nav-link.active {
        color: #1e232e !important;
        background-color: #fff !important;
    }
    .dashboard-nav li .nav-link
    {
        color: #566167 !important;
    }
    .ui.form .field>label
    {
        color: #4e6883 !important;
        font-weight: 500 !important;
        font-size: 1.2rem !important;
    }
    .list-group-item
    {
        background: transparent;
        border: none;
        border-bottom: 1px solid #C8D1DA;
        padding: 1rem 1.25rem;
    }
    .list-group-item:last-child
    {
        border-bottom: none;
    }
    .list-group-item:nth-child(even)
    {
        background: #f5f5f5;
        border-top: 1px solid #C8D1DA;
    }
    .icon-verification
    {
        width: 45px;
    }
    .setting-tab-content
    {
        border-radius: 0 0 0.375rem 0.375rem;
    }
</style>
<div class="col-xl-12 col-md-12 mb-4">
    <?php echo $this->Flash->render(); ?>
    <div class="row no-gutters align-items-center">
        <div class="col">
                                        <ul class="nav nav-pills dashboard-nav" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-preference-tab" data-toggle="pill" href="#pills-preference" role="tab" aria-controls="pills-preference" aria-selected="true"><?php echo __('General Preferences')?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-sign-in-tab" data-toggle="pill" href="#pills-sign-in" role="tab" aria-controls="pills-sign-in" aria-selected="false"><?php echo __('Signing In')?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-verification-tab" data-toggle="pill" href="#pills-verification" role="tab" aria-controls="pills-verification" aria-selected="false"><?php echo __('Two-Step Verification')?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-devices-tab" data-toggle="pill" href="#pills-devices" role="tab" aria-controls="pills-devices" aria-selected="false"><?php echo __('Recent Devices')?></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content card border-0 shadow-sm p-3 setting-tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-preference" role="tabpanel" aria-labelledby="pills-preference-tab">
                                                <div class="col-sm-6 d-flex align-items-stretch">
                                                    <div class=" bordered w-100  mb-4">
                                                        <div class="py-4">
                                                            <div class="list-group w-100">
                                                                <a href="<?php echo $this->Url->build([ "action" => "preference", "_base" => $locale,]); ?>" class="small list-group-item align-items list-group-item-action">
                                                                    <div class="row">
                                                                        <div class="col-2 col-sm-5 text-truncate">
                                                                           <span class="ml-2 d-none d-sm-inline-block text-theme font-weight-bold f-16"><?php echo __("Language"); ?></span>
                                                                        </div>
                                                                        <div class="col-8 col-sm-6 text-truncate f-16"><?php echo $locales[$customer->getProperty("locale")]["label"] ?? $locales[I18n::getDefaultLocale()]["label"] ?? I18n::getDefaultLocale(); ?></div>
                                                                        <div class="col-2 col-sm-1 text-right"><i class="mdi mdi-chevron-right f-16"></i></div>
                                                                    </div>
                                                                </a>
                                                                <a href="<?php echo $this->Url->build([ "action" => "preference", "_base" => $locale, ]); ?>" class="small list-group-item align-items list-group-item-action">
                                                                    <div class="row">
                                                                        <div class="col-2 col-sm-5 text-truncate">
                                                                           <span class="ml-2 d-none d-sm-inline-block text-theme font-weight-bold f-16"><?php echo __("Timezone"); ?></span>
                                                                        </div>
                                                                        <div class="col-8 col-sm-6 text-truncate f-16"><?php echo $customer->getProperty("timezone_nice"); ?></div>
                                                                        <div class="col-2 col-sm-1 text-right"><i class="mdi mdi-chevron-right f-16"></i></div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--//tab-pane-->
                                            <div class="tab-pane fade" id="pills-sign-in" role="tabpanel" aria-labelledby="pills-sign-in-tab">
                                                <div class="col-sm-6 d-flex align-items-stretch">
                                                    <div class=" bordered w-100  mb-4">
                                                        <div class="py-4">
                                                            <div class="list-group w-100 mb-3">
                                                                <a href="<?php echo $this->Url->build([ "action" => "email", "_base" => $locale, ]); ?>" class="small list-group-item list-group-item-action">
                                                                    <div class="row">
                                                                        <div class="col-2 col-sm-5 text-truncate">
                                                                           <span class="ml-2 d-none d-sm-inline-block text-theme font-weight-bold f-16"><?php echo __("Email"); ?></span>
                                                                        </div>
                                                                        <div class="col-8 col-sm-6 text-truncate f-16"><?php echo $customer->getProperty("email"); ?> <?php if ( $customer->getProperty("is_verified_email", false) === true ) {
                                                                                echo '<i class="mdi mdi-check-circle f-20 text-success ml-1"></i>';
                                                                            } ?></div>
                                                                        <div class="col-2 col-sm-1 text-right"><i class="mdi mdi-chevron-right f-16"></i></div>
                                                                    </div>
                                                                </a>
                                                                <a href="<?php echo $this->Url->build([ "action" => "changePassword", "_base" => $locale, ]); ?>" class="small list-group-item align-items list-group-item-action">
                                                                    <div class="row">
                                                                        <div class="col-2 col-sm-5 text-truncate">
                                                                            <span class="ml-2 d-none d-sm-inline-block text-theme font-weight-bold f-16"><?php echo __("Password"); ?></span>
                                                                        </div>
                                                                        <div class="col-8 col-sm-6 text-truncate f-16"><?php echo __("Last Changed {last_changed}", [
                                                                                'last_changed' => $lastPwdModifiedText,
                                                                            ]); ?></div>
                                                                        <div class="col-2 col-sm-1 text-right"><i class="mdi mdi-chevron-right f-16"></i></div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <?php
                                                            $lastLoginCreated = $customer->getProperty("last_login.created");
                                                            if ( is_null($lastLoginCreated) === false ) { ?>
                                                                <?php $lastLoginCreated = (new Time($lastLoginCreated))->setTimezone($customer->getProperty("timezone", "UTC")); ?>
                                                                <?php if ( $lastLoginCreated->wasWithinLast('1 hours') ) {
                                                                    $time =  $lastLoginCreated->timeAgoInWords();
                                                                } else if ( $lastLoginCreated->isToday() ) {
                                                                    $time =  $lastLoginCreated->format("h:i A");
                                                                } else {
                                                                    $time =  $lastLoginCreated->format("M d, Y");
                                                                } ?>
                                                                <p class="text-theme small mb-0"><?php echo __("Last login: {time} from {ip}", [
                                                                        'time' => $time,
                                                                        'ip' => $customer->getProperty("last_login.ip_address")
                                                                    ]); ?></p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--//tab-pane-->
                                            <div class="tab-pane fade" id="pills-verification" role="tabpanel" aria-labelledby="pills-verification-tab">
                                                <div class="col-md-6 d-flex align-items-stretch">
                                                    <div class=" bordered w-100  mb-4">
                                                        <div class="py-4">
                                                            <h5 class="text-theme font-weight-bold mb-1"><?php echo __("2-Step Verification"); ?></h5>
                                                            <p class="text-theme small mb-5"><?php echo __("Each time you sign in to your Account, you'll need your password and a 4 digit PIN code. Even if someone else gets your password, it won't be enough to sign in to your account."); ?></p>
                                                            <div class="my-3 d-lg-flex">
                                                                <div class="mr-3"><img src="<?php echo $this->Url->build('/assets/img/security.svg')?>" class="img-fluid icon-verification"></div>
                                                                <div>
                                                                    <h5 class="text-theme font-weight-bold"><?php echo __('Add an Extra layer of security.')?></h5>
                                                                    <p class="small"><?php echo __("Enter your password and unique verification code that's sent to your phone.")?></p>
                                                                </div>
                                                            </div>
                                                            <div class="my-3 d-lg-flex">
                                                                <div class="mr-3"><img src="<?php echo $this->Url->build('/assets/img/bad-guy.svg')?>" class="img-fluid icon-verification"></div>
                                                                <div>
                                                                    <h5 class="text-theme font-weight-bold"><?php echo __('Add an Extra layer of security.')?></h5>
                                                                    <p class="small"><?php echo __("Enter your password and unique verification code that's sent to your phone.")?></p>
                                                                </div>
                                                            </div>
                                                            <?php if ( $customer->getProperty("two_factor_enabled") === false ) { ?>
                                                                <a href="<?php echo $this->Url->build([ "action" => "twoStepVerification", "_base" => $locale, ]); ?>" class="btn btn-success shadow-none"><?php echo __("Enable"); ?></a>
                                                            <?php } else { ?>
                                                                <a href="<?php echo $this->Url->build([ "action" => "twoStepVerification", "_base" => $locale, ]); ?>" class="btn btn-danger shadow-none"><?php echo __("Disable or Update PIN"); ?></a>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--//tab-pane-->
                                            <div class="tab-pane fade" id="pills-devices" role="tabpanel" aria-labelledby="pills-devices-tab">
                                                <div class="col-md-6 d-flex align-items-stretch">
                                                    <div class=" bordered w-100  mb-4">
                                                        <div class="py-4">
                                                            <h5 class="text-theme font-weight-bold mb-1"><?php echo __("Active Sessions"); ?></h5>
                                                            <p class="text-theme small"><?php echo __("These sessions have been active on your account in the last 28 days, or are currently signed in."); ?></p>
                                                        </div>
                                                        <table class="table">
                                                            <?php foreach ( $devices as $device ) { ?>
                                                            <?php if ($device["is_active"]) {?>
                                                            <thead>
                                                            <tr>
                                                                <th scope="col" class="text-theme"><?php echo __('Signed In')?></th>
                                                                <th scope="col" class="text-theme"><?php echo __('Device')?></th>
                                                                <th scope="col" class="text-theme"><?php echo __('Brand')?></th>
                                                                <th scope="col" class="text-theme"><?php echo __('Model')?></th>
                                                                <th scope="col" class="text-theme"><?php echo __('Last Used')?></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="<?php if ( $device["is_active"] ) { echo "text-success"; } else { echo "text-muted";} ?> small">
                                                                        <?php
                                                                        $lastUsed = (new Time($device["last_used"]))->setTimezone($this->getRequest()->getSession()->read("Auth.User.preference.timezone"));
                                                                        if ( $lastUsed->wasWithinLast("5 hours") ) {
                                                                            echo $lastUsed->timeAgoInWords();
                                                                        } ?>
                                                                    </td>
                                                                    <td class="text-muted small"><?php echo $device["platform"]; ?></td>
                                                                    <td class="text-muted small"><?php echo $device["brand"]; ?></td>
                                                                    <td class="text-muted small"><?php echo $device["model"]; ?></td>
                                                                    <td class="text-muted small">
                                                                        <?php
                                                                        $lastUsed = (new Time($device["last_used"]))->setTimezone($this->getRequest()->getSession()->read("Auth.User.preference.timezone"));
                                                                        if ( $lastUsed->isToday() ) {
                                                                            echo $lastUsed->format("h:i A");
                                                                        } else {
                                                                            echo $lastUsed->format("M d, Y");
                                                                        }

                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                              <?php } ?>
                                                            <?php } ?>
                                                        </table>
                                                        <div>
                                                            <a href="<?php echo $this->Url->build([ "action" => "recentDevices", "_base" => $locale, ]); ?>" class="btn btn-success shadow-none"><?php echo __("See All"); ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--//tab-pane-->
                                        </div>
                                    </div>
    </div>
</div>

