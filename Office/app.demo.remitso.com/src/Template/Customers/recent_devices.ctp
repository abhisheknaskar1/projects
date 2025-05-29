<?php

use App\View\AppView;
use Cake\Collection\Collection;
use Cake\I18n\Time;

/**
 * @var AppView $this
 * @var Collection $devices
 */
use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<style>
    .headingLine {
        width: 80px;
        height: 3px;
        background: #E51F28; }
</style>
<div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-0 h-100">
        <div class="card-body px-0">
            <div class="row no-gutters">
                <div class="d-block px-4">
                    <h4 class="section-heading mb-0 font-weight-bold text-theme mb-2"><?php echo __("Recent Devices"); ?></h4>
                    <p class="text-theme f-16"><?php echo __("Don't recognize a device? {change_password}", [
                        'change_password' =>  $this->Html->link(__("Secure your account"), [
                            "action" => "changePassword",
                            "_base" => $locale,
                        ])
                    ]); ?></p>
                </div>
            </div>
            <div class="row no-gutters align-items-center">
                <div class="col">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-transfer" role="tabpanel" aria-labelledby="pills-transfer-tab">
                            <div class="row h-100 align-items-center justify-content-center">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="row no-gutters">
                                            <div class="col-md-12">
                                                <div class="rounded-0 ui ">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col" class="text-theme text-center"><?php echo __('Signed In')?></th>
                                                                <th scope="col" class="text-theme text-center"><?php echo __('Device')?></th>
                                                                <th scope="col" class="text-theme text-center"><?php echo __('Brand')?></th>
                                                                <th scope="col" class="text-theme text-center"><?php echo __('Model')?></th>
                                                                <th scope="col" class="text-theme text-center"><?php echo __('Client')?></th>
                                                                <th scope="col" class="text-theme text-center"><?php echo __('Last Used')?></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ( $devices as $device ) { ?>
                                                            <tr>
                                                                <td class="<?php if ( $device["is_active"] ) { echo "text-success  text-center"; } else { echo "text-muted";} ?> small">
                                                                    <?php
                                                                      $lastUsed = (new Time($device["last_used"]))->setTimezone($this->getRequest()->getSession()->read("Auth.User.preference.timezone"));
                                                                       if ( $lastUsed->wasWithinLast("5 hours") ) {
                                                                            echo $lastUsed->timeAgoInWords();
                                                                        } ?>
                                                                </td>
                                                                <td class="text-muted small text-center"><?php echo $device["platform"]; ?></td>
                                                                <td class="text-muted small text-center"><?php echo $device["brand"]; ?></td>
                                                                <td class="text-muted small text-center"><?php echo $device["model"]; ?></td>
                                                                <td class="text-muted small text-center"><?php echo $device["client"]; ?></td>
                                                                <td class="text-muted small text-center">
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
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

