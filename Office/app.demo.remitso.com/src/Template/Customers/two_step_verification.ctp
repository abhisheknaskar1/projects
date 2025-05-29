<?php
use App\Form\CreatePinForm;
use App\View\AppView;
use App\WebService\Customer;
use Cake\I18n\I18n;

/**
 * @var AppView $this
 * @var CreatePinForm $form
 * @var Customer $customer
 * @var string $titleForLayout
 */
$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
$backUrl = $this->getRequest()->getQuery("referer") ? urldecode($this->getRequest()->getQuery("referer")) : [
    "action" => "settings"
];
?>
<style media="screen">
    body {
        background: #f5f5f9;
        font-family: 'Inter', sans-serif; !important;
    }
    .pb-6, .py-6 {
        padding-bottom: 4.5rem!important;
    }
    .pt-6, .py-6 {
        padding-top: 4.5rem!important;
    }
    .auth-footer
    {
        padding-top: 2rem;
        padding-bottom: 2rem;
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
<div class="container-fluid py-6">
    <div class="row align-items-center justify-content-center flex-column">
        <div class="col-lg-4 col-xl-4 auth-block my-5">
            <div class="w-100 ui form bg-white rounded-lg shadow-sm py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <h4 class="font-weight-bold mb-4 text-theme border-bottom pb-3 text-theme"><?php echo __("2-Step Verification"); ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10  offset-lg-1">
                            <?php echo $this->Form->create($form, [
                                "autocomplete" => "off",
                                "errorClass" => "",
                                "templates" => [
                                    "inputContainer" => '{{content}}',
                                ],
                                "id" => "twofa-form"
                            ]); ?>
                            <?php echo $this->Flash->render(); ?>
                            <?php if ( $form->getErrors() ) { ?>
                                <div class="ui message mt-0  tiny negative">
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
                            <div class="alert alert-warning mb-4">
                                <div class="icon "><i class="mdi mdi-lightbulb-on mr-2"></i><?php echo __("Pin and password are like toothbrushes -- don't let anyone else use it and change it frequently."); ?></div>
                            </div>
                            <div class="">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <?php if ( $customer->getProperty("two_factor_enabled") === true ) { ?>
                                                <div class="field  <?php echo ($form->getErrors()["current_pin"] ?? null) ? "error" : ""; ?>">
                                                    <label class="required"><?php echo __("Current PIN"); ?></label>
                                                    <div class="row justify-content-center">
                                                        <div class="col-3 ui big input">
                                                            <?php echo $this->Form->control("current_pin.0", [
                                                                "type" => "password",
                                                                "label" => false,
                                                                "error" => false,
                                                                "class" => "text-center pin-digit",
                                                                "autocomplete" => "off",
                                                                "maxlength" => 1,
                                                                "inputmode" => "numeric",
                                                                "pattern" => "[0-9]*",
                                                                "title" => __("Only digit is allowed"),
                                                                "required" => true,
                                                                "onpaste" => "return false;"
                                                            ]); ?>
                                                        </div>
                                                        <div class="col-3 ui big input">
                                                            <?php echo $this->Form->control("current_pin.1", [
                                                                "type" => "password",
                                                                "label" => false,
                                                                "error" => false,
                                                                "class" => "text-center pin-digit",
                                                                "autocomplete" => "off",
                                                                "maxlength" => 1,
                                                                "inputmode" => "numeric",
                                                                "pattern" => "[0-9]*",
                                                                "title" => __("Only digit is allowed"),
                                                                "required" => true,
                                                                "onpaste" => "return false;"
                                                            ]); ?>
                                                        </div>
                                                        <div class="col-3 ui big input">
                                                            <?php echo $this->Form->control("current_pin.2", [
                                                                "type" => "password",
                                                                "label" => false,
                                                                "error" => false,
                                                                "class" => "text-center pin-digit",
                                                                "autocomplete" => "off",
                                                                "maxlength" => 1,
                                                                "inputmode" => "numeric",
                                                                "pattern" => "[0-9]*",
                                                                "title" => __("Only digit is allowed"),
                                                                "required" => true,
                                                                "onpaste" => "return false;"
                                                            ]); ?>
                                                        </div>
                                                        <div class="col-3 ui big input">
                                                            <?php echo $this->Form->control("current_pin.3", [
                                                                "type" => "password",
                                                                "label" => false,
                                                                "error" => false,
                                                                "class" => "text-center pin-digit",
                                                                "autocomplete" => "off",
                                                                "maxlength" => 1,
                                                                "inputmode" => "numeric",
                                                                "pattern" => "[0-9]*",
                                                                "title" => __("Only digit is allowed"),
                                                                "required" => true,
                                                                "onpaste" => "return false;"
                                                            ]); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="field  <?php echo ($form->getErrors()["pin"] ?? null) ? "error" : ""; ?>">
                                                <label class="required"><?php echo __("New PIN"); ?></label>
                                                <div class="row justify-content-center">
                                                    <div class="col-3 ui big input">
                                                        <?php echo $this->Form->control("pin.0", [
                                                            "type" => "password",
                                                            "label" => false,
                                                            "error" => false,
                                                            "class" => "text-center pin-digit",
                                                            "autocomplete" => "off",
                                                            "maxlength" => 1,
                                                            "inputmode" => "numeric",
                                                            "pattern" => "[0-9]*",
                                                            "title" => __("Only digit is allowed"),
                                                            "required" => true,
                                                            "onpaste" => "return false;"
                                                        ]); ?>
                                                    </div>
                                                    <div class="col-3 ui big input">
                                                        <?php echo $this->Form->control("pin.1", [
                                                            "type" => "password",
                                                            "label" => false,
                                                            "error" => false,
                                                            "class" => "text-center pin-digit",
                                                            "autocomplete" => "off",
                                                            "maxlength" => 1,
                                                            "inputmode" => "numeric",
                                                            "pattern" => "[0-9]*",
                                                            "title" => __("Only digit is allowed"),
                                                            "required" => true,
                                                            "onpaste" => "return false;"
                                                        ]); ?>
                                                    </div>
                                                    <div class="col-3 ui big input">
                                                        <?php echo $this->Form->control("pin.2", [
                                                            "type" => "password",
                                                            "label" => false,
                                                            "error" => false,
                                                            "class" => "text-center pin-digit",
                                                            "autocomplete" => "off",
                                                            "maxlength" => 1,
                                                            "inputmode" => "numeric",
                                                            "pattern" => "[0-9]*",
                                                            "title" => __("Only digit is allowed"),
                                                            "required" => true,
                                                            "onpaste" => "return false;"
                                                        ]); ?>
                                                    </div>
                                                    <div class="col-3 ui big input">
                                                        <?php echo $this->Form->control("pin.3", [
                                                            "type" => "password",
                                                            "label" => false,
                                                            "error" => false,
                                                            "class" => "text-center pin-digit",
                                                            "autocomplete" => "off",
                                                            "maxlength" => 1,
                                                            "inputmode" => "numeric",
                                                            "pattern" => "[0-9]*",
                                                            "title" => __("Only digit is allowed"),
                                                            "required" => true,
                                                            "onpaste" => "return false;"
                                                        ]); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field <?php  echo ($form->getErrors()["confirm_pin"] ?? null) ? "has-danger" : ""; ?>">
                                                <label class="required"><?php echo __("Enter Again"); ?></label>
                                                <div class="row justify-content-center">
                                                    <div class="col-3 ui big input">
                                                        <?php echo $this->Form->control("confirm_pin.0", [
                                                            "type" => "password",
                                                            "label" => false,
                                                            "error" => false,
                                                            "class" => "text-center pin-digit",
                                                            "autocomplete" => "off",
                                                            "maxlength" => 1,
                                                            "inputmode" => "numeric",
                                                            "pattern" => "[0-9]*",
                                                            "title" => __("Only digit is allowed"),
                                                            "required" => true,
                                                            "onpaste" => "return false;"
                                                        ]); ?>
                                                    </div>
                                                    <div class="col-3 ui big input">
                                                        <?php echo $this->Form->control("confirm_pin.1", [
                                                            "type" => "password",
                                                            "label" => false,
                                                            "error" => false,
                                                            "class" => "text-center pin-digit",
                                                            "autocomplete" => "off",
                                                            "maxlength" => 1,
                                                            "inputmode" => "numeric",
                                                            "pattern" => "[0-9]*",
                                                            "title" => __("Only digit is allowed"),
                                                            "required" => true,
                                                            "onpaste" => "return false;"
                                                        ]); ?>
                                                    </div>
                                                    <div class="col-3 ui big input">
                                                        <?php echo $this->Form->control("confirm_pin.2", [
                                                            "type" => "password",
                                                            "label" => false,
                                                            "error" => false,
                                                            "class" => "text-center pin-digit",
                                                            "autocomplete" => "off",
                                                            "maxlength" => 1,
                                                            "inputmode" => "numeric",
                                                            "pattern" => "[0-9]*",
                                                            "title" => __("Only digit is allowed"),
                                                            "required" => true,
                                                            "onpaste" => "return false;"
                                                        ]); ?>
                                                    </div>
                                                    <div class="col-3 ui big input">
                                                        <?php echo $this->Form->control("confirm_pin.3", [
                                                            "type" => "password",
                                                            "label" => false,
                                                            "error" => false,
                                                            "class" => "text-center pin-digit",
                                                            "autocomplete" => "off",
                                                            "maxlength" => 1,
                                                            "inputmode" => "numeric",
                                                            "pattern" => "[0-9]*",
                                                            "title" => __("Only digit is allowed"),
                                                            "required" => true,
                                                            "onpaste" => "return false;"
                                                        ]); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check form-check-flat mt-0">
                                                    <label class="form-check-label ">
                                                        <input type="checkbox" class="form-check-input" id="reveal-pin"> <?php echo __("Reveal PIN"); ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php if ( $customer->getProperty("two_factor_enabled") === false ) { ?>
                                                <button class="mt-4 btn btn-login btn-lg btn-block shadow-none text-white" type="submit"><?php echo __("Enable 2-Step Verification") ?></button>
                                            <?php } else { ?>
                                                <div class="ui buttons">
                                                    <button data-keyboard="true" data-target="#turnOffModal" data-toggle="modal" type="button" class="ui button"><?php echo __("Turn Off"); ?></button>
                                                    <div class="or" data-text="<?php echo __("or"); ?>"></div>
                                                    <button type="submit" class="ui positive button"><?php echo __("Update"); ?></button>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element("confirmation_modal", [
    "id" => "turnOffModal",
    "url" => [
        "action" => "turnOff2fa",
    ],
    "content" => __("Are you sure, you want to disable two step verification?")
]); ?>
<?php echo $this->Html->script([
    "/vendors/js/vendor.bundle.base",
]); ?>
<script type="text/javascript">
    $(function(){
        $("#reveal-pin").on("click", function(){
            $form = $(this).parents("form").eq(0);
            $pinEntryFields = $form.find(".pin-digit");
            if ( this.checked ) {
                $pinEntryFields.each(function(item){
                    $(this).attr("type", "text");
                });
            } else {
                $pinEntryFields.each(function(item){
                    $(this).attr("type", "password");
                });
            }
        });
        $(".pin-digit").on("focus", function(){
            this.setSelectionRange(0, this.value.length);
        });
        $(".pin-digit").on("keydown", function(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            $form = $(this).parents("form").eq(0);
            $pinEntryFields = $form.find(".pin-digit");
            $currentFieldIndex = $($pinEntryFields).index(this);
            if ((charCode >= 48 && charCode <= 57) || (charCode >= 96 && charCode <= 105)) {
                if ($currentFieldIndex == 11) {
                    setTimeout(function(){
                        $form.find("button[type='submit']").focus();
                    }, 50);
                } else {
                    $nextElem = $pinEntryFields.slice($currentFieldIndex+1, $currentFieldIndex+2);
                    setTimeout(function(){
                        $nextElem.focus()
                    }, 50);
                }
                return true;
            } else if (charCode == 8) {
                if ($(this).val()) {
                    return true;
                } else {
                    if ($currentFieldIndex != 0) {
                        $prevElem = $pinEntryFields.slice($currentFieldIndex-1, $currentFieldIndex);
                        setTimeout(function(){
                            $prevElem.focus()
                        }, 50);
                    }
                }
            } else if ( charCode == 116 ) {
                return true;
            }else {
                return false;
            }
        });
        $("#twofa-form").submit(function(){
            $(this).parents(".ui.form").addClass("loading");
        });
    });
</script>

