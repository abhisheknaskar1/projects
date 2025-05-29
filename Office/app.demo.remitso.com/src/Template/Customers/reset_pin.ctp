<?php
use App\Form\ResetPasswordForm;
use App\View\AppView;
/**
 * @var AppView $this
 * @var ResetPasswordForm $form
 * @var string $titleForLayout
 */
?>
<style>
    body
    {
        background: #f5f5f9;
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
    p
    {
        font-size: 1rem;
    }
    .form-label-group > input
    {
        height: 50px;
    }
    .form-signin .input-icon {
        top: 11px;
        font-size: 20px;
        right: 12px;
        color: #697a8d;
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
    .btn-login
    {
        background: #556ee9;
    }
    .form input::placeholder
    {
        font-family: 'Inter', sans-serif;
    }
</style>
<div class="container-fluid py-6">
    <div class="row align-items-center justify-content-center flex-column py-3">
        <div class="col-lg-4 col-xl-4 auth-block my-5">
            <div class="w-100 ui form bg-white rounded-lg shadow-sm py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <h4 class="font-weight-bold mb-4 text-theme border-bottom pb-3"><?php echo __("Reset PIN!"); ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <?php echo $this->Form->create($form, [
                                "autocomplete" => "off",
                                "errorClass" => "",
                                "templates" => [
                                    "inputContainer" => '{{content}}',
                                ],
                                "id" => "reset-pin-form"
                            ]); ?>
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
                                    <label class="form-check-label small ">
                                        <input type="checkbox" class="form-check-input" id="reveal-pin"> <?php echo __("Reveal PIN"); ?>
                                    </label>
                                </div>
                            </div>
                            <button class="mt-4 btn btn-lg btn-login text-white shadow-none btn-block" type="submit"><?php echo __("Reset PIN") ?></button>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                if ($currentFieldIndex === 11) {
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
            } else if (charCode === 8) {
                if ($(this).val()) {
                    return true;
                } else {
                    if ($currentFieldIndex !== 0) {
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
        $("#reset-pin-form").submit(function(){
            $(this).parents(".ui.form").addClass("loading");
        });
    });
</script>
