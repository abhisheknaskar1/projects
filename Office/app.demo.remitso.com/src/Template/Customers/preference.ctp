<?php
use App\Form\PreferencesForm;
use App\WebService\Customer;
use Cake\Core\Configure;
/**
 * @var \App\View\AppView $this
 * @var PreferencesForm $form
 * @var Customer $customer
 */
use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
$locales = Configure::read("languages");
?>
<style>
    .svButton {
        background: #14406E;
        transition: all 0.5s;
        z-index: 997;
        padding: 5px 5px;
        top: 0px;
    }
    .svButton:hover {
        color: #fff !important;
        background: #1cc88a;
    }
    .headingLine {
        width: 80px;
        height: 3px;
        background: #E51F28;
    }
    .user-profile-section .profile-details-card form .dropdown .text {
        top: 0px;
    }
    .ui.form .field>label
    {
        color: #4e6883 !important;
        font-weight: 500 !important;
        font-size: 1.2rem !important;
    }
</style>
<div class="col-xl-10 col-md-12 mb-4">
    <div class="profile-details-card h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters mb-4">
                <div class="profile-details-card-header pb-3">
                    <h4 class="font-weight-bold text-theme mb-0"><?php echo __("General Preferences"); ?></h4>
                </div>
            </div>
            <div class="row no-gutters align-items-center">
                <div class="col">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-transfer" role="tabpanel" aria-labelledby="pills-transfer-tab">
                            <div class="row h-100 align-items-center justify-content-center">
                                <div class="col-md-6">
                                    <div class="dash-card p-4">
                                        <div class="row">
                                            <div class="col-md-12 ui form">
                                                <?php echo $this->Form->create($form, [
                                                    "autocomplete" => "off",
                                                    "errorClass" => "",
                                                    "templates" => [
                                                        "inputContainer" => '<div class="field"><label>{{labelText}}</label><div class="ui input {{iconClass}} {{iconPosition}}">{{content}}{{iconHtml}}</div></div>',
                                                        'inputContainerError' => '<div class="field error"><label>{{labelText}}</label><div class="ui input {{iconClass}} {{iconPosition}}">{{content}}{{iconHtml}}</div></div>',
                                                    ],
                                                    "id" => "preferences-form"
                                                ]); ?>
                                                <div class="">
                                                    <div class="ui border-0 bg-light">
                                                        <?php echo $this->Flash->render(); ?>
                                                        <?php if ( $form->getErrors() ) { ?>
                                                            <div class="ui message tiny negative">
                                                                <div class="header"><?php echo __("Oops! something wasn't correct") ?></div>
                                                                <ul class="list">
                                                                    <?php foreach ($form->getErrors() as $k => $errors) { ?>
                                                                        <?php foreach ($errors as $key => $error) { ?>
                                                                            <li><?php echo $error; ?></li>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="field">
                                                            <label class="text-theme"><?php echo __("Language"); ?></label>
                                                            <p class="text-justify text-theme  small"><?php echo __("Your preferred language for our website. Your language variant may affect the spelling or vocabulary used by some of them."); ?></p>
                                                            <div class="ui search selection dropdown" id="localeDropdown">
                                                                <?php echo $this->Form->hidden("locale", [
                                                                    "default" => $customer->getProperty("locale")
                                                                ]); ?>
                                                                <i class="dropdown icon"></i>
                                                                <div class=" text"></div>
                                                                <div class="menu w-100">
                                                                    <?php foreach ( $locales as $locale => $values ) { ?>
                                                                        <div class="item <?php echo $customer->getProperty("locale") === $locale ? " active selected" : ""; ?>" data-value="<?php echo $locale; ?>"><small>
<!--                                                                                <i class="flag-icon flag-icon---><?php //echo strtolower(substr($locale, -2, 2)); ?><!-- flag-icon-squared icon rounded-circle mr-2"></i>-->

                                                                                <?php echo $values["label"]; ?></small></div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <label class="text-theme"><?php echo __("Timezone"); ?></label>
                                                            <p class="text-justify text-theme small"><?php echo __("Setting your account's time zone enables date and time to be displayed in your preferred timezone."); ?></p>
                                                            <div class="ui search selection dropdown" id="timezoneDropdown">
                                                                <?php echo $this->Form->hidden("timezone", [
                                                                    "default" => $customer->getProperty("timezone")
                                                                ]); ?>
                                                                <i class="dropdown icon"></i>
                                                                <div class=" text"></div>
                                                                <div class="menu w-100">
                                                                    <?php foreach ( Configure::read("App.Settings.timezones", []) as $tz ) { ?>
                                                                        <div class="item <?php echo $customer->getProperty("timezone") === $tz["id"] ? " active selected" : ""; ?>" data-value="<?php echo $tz["id"]; ?>"><small><?php echo "GMT".$tz["offset"]." ".$tz["nice"]; ?></small></div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn svButton text-white btn-block mt-4" type="submit"><?php echo __("Save Changes") ?></button>
                                                    </div>
                                                </div>
                                                <?php $this->Form->unlockField("locale"); ?>
                                                <?php $this->Form->unlockField("timezone"); ?>
                                                <?php echo $this->Form->end(); ?>
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
<?php echo $this->Html->script([
    "/vendors/semantic-ui/components/dropdown.min"
]); ?>
<script type="text/javascript">
    $(function(){
        $.fn.dropdown.settings.message.noResults  = '<small class=""><?php echo __("Nothing found.") ?></span>';
        $("#timezoneDropdown").dropdown({
            fullTextSearch: "exact"
        });
        $("#localeDropdown").dropdown({
            fullTextSearch: "exact"
        });
        $("#preferences-form").submit(function(){
            $(this).parents(".ui.form").addClass("loading");
        });
    });
</script>
