<?php

use App\Form\TwoFactorAuthForm;
use App\View\AppView;
use App\WebService\Customer;
/**
 * @var AppView $this
 * @var Customer $customer
 * @var TwoFactorAuthForm $form
 */
use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<style media="screen">
    .keypad {
        margin: 10px auto;
        padding: 0;
        width: 100%;
    }
    .keypad .key-row {
        width: 100%
    }
    .keypad .key-row .key-cell {
        padding: 2px;
        width: 25%;
    }
    .keypad .key-row .key-cell button.key {
        font-size: medium;
        font-weight: bold;
        width: 100%;
        min-height: 64px;
        line-height: 1.1;
        padding: 0.80rem 0.50rem;
    }
    button.input-error{
        color: #f37676 !important;
        border-color: #f37676;
    }
    span.numpad-alpha{
        font-size: 11px;
        letter-spacing: 1.35px;
        font-weight: normal;
    }
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
                            <?php if ( $this->request->getQuery("_np") ) { ?>
                                <h4 class="font-weight-bold mb-4 text-theme border-bottom pb-3"><?php echo __("Enter your new PIN"); ?></h4>
                            <?php } else { ?>
                                <h4 class="font-weight-bold mb-4 text-theme border-bottom pb-3"><?php echo __("Enter your PIN"); ?></h4>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-lg-10 offset-lg-1 twofa-form">
                                <div class="auto-form-wrapper">
                                    <?php echo $this->Form->create(NULL, [
                                        "autocomplete" => "off",
                                        "errorClass" => "",
                                        "templates" => [
                                            "inputContainer" => '<div class="field"><label>{{labelText}}</label><div class="ui input {{iconClass}} {{iconPosition}}">{{content}}{{iconHtml}}</div></div>',
                                            'inputContainerError' => '<div class="field error"><label>{{labelText}}</label><div class="ui input {{iconClass}} {{iconPosition}}">{{content}}{{iconHtml}}</div></div>',
                                        ],
                                        "id" => "two-fa-form"
                                    ]); ?>
                                    <?php $numberArray = (range(0, 9)); ?>
                                    <?php $alphaMappings = [
                                        '+',
                                        '',
                                        'ABC',
                                        'DEF',
                                        'GHI',
                                        'JKL',
                                        'MNO',
                                        'PQRS',
                                        'TUV',
                                        'WXYZ'
                                    ]; ?>
                                    <?php shuffle($numberArray); ?>
                                    <?php echo $this->Form->hidden("pin", [ "id" => true, "value" => "" ]); ?>
                                    <?php $this->Form->unlockField("pin"); ?>
                                    <?php $errorClass = $form->getErrors() ? "input-error" : ""; ?>
                                    <?php echo $this->Flash->render(); ?>
                                    <table class="keypad">
                                        <tr class="key-row" id="entry-row">
                                            <td class="key-cell">
                                                <button disabled type="button" class="<?php echo $errorClass; ?> border btn key text-muted">X</button>
                                            </td>
                                            <td class="key-cell">
                                                <button disabled type="button" class="<?php echo $errorClass; ?> border btn key text-muted">X</button>
                                            </td>
                                            <td class="key-cell">
                                                <button disabled type="button" class="<?php echo $errorClass; ?> border btn key text-muted">X</button>
                                            </td>
                                            <td class="key-cell">
                                                <button disabled type="button" class="<?php echo $errorClass; ?> border btn key text-muted">X</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                        </tr>
                                        <tr class="key-row">
                                            <?php for ($i=0; $i < 3; $i++) { ?>
                                                <td class="key-cell">
                                                    <button data-toggle="numpad" data-value="<?php echo $numberArray[$i]; ?>" class="btn btn-light key border" type="button"><?php echo $numberArray[$i]; ?><br /><span class="numpad-alpha"><?php echo $alphaMappings[$numberArray[$i]]; ?></span></button>
                                                </td>
                                            <?php } ?>
                                            <td class="key-cell">
                                                <button disabled data-toggle="numpad" data-value="delete" class="btn btn-danger key border-danger" type="button"><?php echo __("Del"); ?></button>
                                            </td>
                                        </tr>
                                        <tr class="key-row">
                                            <?php for ($i=3; $i < 7; $i++) { ?>
                                                <td class="key-cell">
                                                    <button data-toggle="numpad" data-value="<?php echo $numberArray[$i]; ?>" class="btn btn-light key border" type="button"><?php echo $numberArray[$i]; ?><br /><span class="numpad-alpha"><?php echo $alphaMappings[$numberArray[$i]]; ?></span></button>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                        <tr class="key-row">
                                            <?php for ($i=7; $i < 10; $i++) { ?>
                                                <td class="key-cell">
                                                    <button data-toggle="numpad" data-value="<?php echo $numberArray[$i]; ?>" class="btn btn-light key border" type="button"><?php echo $numberArray[$i]; ?><br /><span class="numpad-alpha"><?php echo $alphaMappings[$numberArray[$i]]; ?></span></button>
                                                </td>
                                            <?php } ?>
                                            <td class="key-cell">
                                                <button disabled class="btn btn-success key border-success" type="submit"><?php echo __("Go"); ?></button>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php echo $this->Form->end(); ?>
                                    <div class="text-center text-theme small mt-4"><?php echo __("Forgot PIN? {click_here_forgot_pin_link} to reset your pin", [
                                        "click_here_forgot_pin_link" => $this->Form->postLink(__("Click here"), [
                                            "controller" => "Customers",
                                            "action" => "forgotPin",
                                            "_base" => $locale,
                                        ])
                                    ]); ?></div>
                                </div>
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
    function toggleNumpadBtn(){
        var openSlots = $("#entry-row").find(".btn.text-muted").length;
        if( openSlots  == 0 ){
            $("form").find('button[type="submit"]').removeAttr("disabled");
        }else{
            $("form").find('button[type="submit"]').attr("disabled", "disabled");
            if( openSlots === 4 ){
                $("form").find('[data-toggle="numpad"]')
                    .filter('[data-value="delete"]')
                    .attr("disabled", "disabled");
            }else{
                $("form").find('[data-toggle="numpad"]')
                    .filter('[data-value="delete"]')
                    .removeAttr("disabled");
            }
        }
    }
    $(function(){
        $(".twofa-form").on("submit", "#two-fa-form", function(e){
            $(this).parents(".ui.form").addClass("loading");
        });
        $('[data-toggle="numpad"]').on("click", function(){
            if($(this).attr("data-value") == "delete"){
                var pinDigits = $("#pin").val().split("");
                pinDigits.pop();
                $("#pin").val(pinDigits.join(""));
                $("#entry-row").find(".btn").filter(':not(".text-muted")').last().removeClass("btn-outline-success").addClass("text-muted").addClass("border");
                toggleNumpadBtn();
            }else{
                $currentPlaceholder = $("#entry-row").find(".btn.text-muted").eq(0);
                if($currentPlaceholder.length){
                    $currentPlaceholder.removeClass("text-muted");
                    $currentPlaceholder.removeClass("input-error");
                    $currentPlaceholder.removeClass("border");
                    $currentPlaceholder.addClass("btn-outline-success");
                    $("#pin").val($("#pin").val()+$(this).attr("data-value").toString());
                    toggleNumpadBtn();
                }
            }
        });
    });
</script>

