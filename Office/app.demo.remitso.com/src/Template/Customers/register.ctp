<?php

use App\Form\SignUpForm;
use App\View\AppView;
use Cake\Core\Configure;
/**
 * @var AppView $this
 * @var SignUpForm $customer
 * @var string $titleForLayout
 */

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<style>
    #password-strength li{
        list-style-type: none;
        margin-bottom: 5px;
        font-size: 0.8rem;
    }
    #password-strength li.done{
        color: #00793d;
    }
    #password-strength li:before{
        list-style-type: none;
        content: "\F5E1";
        margin-right: 1rem;
        display: inline-block;
        font: normal normal normal 24px/1 "Material Design Icons";
        font-size: inherit;
        text-rendering: auto;
        line-height: inherit;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: inherit;
    }
    #password-strength li.done::before{
        content: '\F5E0';
    }
    .grecaptcha-badge {
        opacity: 0;
    }
    body
    {
        background: #212529c7;
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
        color: #6a0dad;
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
    .btn-register
    {
        background: #6a0dad;
    }
    .form input::placeholder
    {
        font-family: 'Inter', sans-serif;
    }
</style>
<div class="container-fluid py-6">
    <div class="row align-items-center justify-content-center flex-column">
        <div class="col-md-6 col-lg-5 col-xl-4 auth-block">
            <div class="w-100 ui form bg-white rounded-lg shadow-sm py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h5 class="font-weight-bold mb-2 mt-4 text-theme"><?php echo __("Create Your Account!"); ?></h5>
                            <p class="text-theme"><?php echo __("Sign up now to start sending money."); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <?php echo $this->Form->create($customer, [
                                "autocomplete" => "off",
                                "errorClass" => "",
                                "class" => "form-signin",
                                "templates" => [
                                    "inputContainer" => '<div class="form-label-group">{{content}}<span class="input-icon">{{iconHtml}}</span></div>',
                                    'inputContainerError' => '<label>{{labelText}}</label><div class="form-label-group field error">{{content}}<span class="input-icon">{{iconHtml}}</span></div>',
                                ],
                                "id" => "sign-up-form"
                            ]); ?>
                            <?php echo $this->Form->hidden("preference.locale", ["id" => true]); ?>
                            <?php echo $this->Form->hidden("preference.timezone", ["id" => true]); ?>
                            <?php $this->Form->unlockField("preference.locale"); ?>
                            <?php $this->Form->unlockField("preference.timezone"); ?>
                            <?php if ($customer->getErrors()) { ?>
                                <div class="ui message tiny negative">
                                    <div class="header"><?php echo __("Oops! Something went wrong."); ?></div>
                                    <ul class="list">
                                        <?php foreach ($customer->getErrors() as $k => $errors) { ?>
                                            <?php foreach ($errors as $key => $error) { ?>
                                                <li><?php echo $error; ?></li>
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <?php echo $this->Form->control("email", [
                                "type" => "email",
                                "required" => true,
                                "label" => false,
                                "class" => "form-control",
                                "placeHolder" => __("Email Address"),
                                "templateVars" => [
                                    "iconClass" => "icon",
                                    "iconPosition" => "right",
                                    "iconHtml" => '<i class="mdi mdi-account icon"></i>',
                                    'labelText' => __("Email Address")
                                ]
                            ]); ?>
                            <?php echo $this->Form->control("password", [
                                "type" => "password",
                                "required" => true,
                                "label" => false,
                                "id" => 'inputPassword',
                                "placeHolder" => __("Password"),
                                "class" => "form-control password",
                                "templateVars" => [
                                    "iconHtml" => '<i class="bx bx-show icon-show" id="eye2"></i>',
                                    'labelText' => __("Password"),
                                    "forLabel" => "inputPassword",
                                ],
                                "onpaste" => "return false;"
                            ]); ?>
                            <div class="form-group">
                                <ul id="password-strength" class="pl-0 text-sm">
                                    <li class="pass-length"><?php echo __("{password_policy} characters or more", [
                                            'password_policy' => Configure::read("App.PasswordPolicy.minLength", 6),
                                        ]) ?></li>
                                    <?php if (Configure::read("App.PasswordPolicy.includeUppercase", false)) { ?>
                                        <li class="pass-uppercase"><?php echo __("One uppercase letter required."); ?></li>
                                    <?php } ?>
                                    <?php if (Configure::read("App.PasswordPolicy.includeLowercase", false)) { ?>
                                        <li class="pass-lowercase"><?php echo __("One lowercase letter required."); ?></li>
                                    <?php } ?>
                                    <?php if (Configure::read("App.PasswordPolicy.includeNumber", false)) { ?>
                                        <li class="pass-number-exists"><?php echo __("Include at least one number."); ?></li>
                                    <?php } ?>
                                    <?php if (Configure::read("App.PasswordPolicy.includeWildcard", false)) { ?>
                                        <li class="pass-symbol-exists"><?php echo __("Include one special symbol (e.g., ! @ # $ & *)."); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php echo $this->Form->control("confirm_password", [
                                "type" => "password",
                                "required" => true,
                                "label" => false,
                                "class" => "form-control confirm-password",
                                "placeHolder" => __("Confirm Password"),
                                "templateVars" => [
                                    "iconClass" => "action",
                                    "iconHtml" => '<i class="bx bx-show icon-show" id="eye3"></i>',
                                    'labelText' => __("Confirm Password")
                                ],
                                "onpaste" => "return false;"
                            ]); ?>
                            <button class="btn btn-primary btn-block" type="submit"><?php echo __("Create Account"); ?></button>
                            <?php echo $this->Form->hidden("recaptcha_token", ["id" => true]); ?>
                            <?php $this->Form->unlockField("recaptcha_token"); ?>
                            <?php echo $this->Form->end(); ?>
                            <p class="text-center f-14"><?php echo __("By signing up, you agree to our {tos_link}.", [
                                "tos_link" => $this->Html->link(__("Terms & Conditions"), 'javascript:')
                            ]); ?></p>
                            <p class="mt-4 text-center f-14"><?php echo __("Already have an account? {login_link}", [
                                'login_link' => $this->Html->link(__("Sign in here"), [
                                    "action" => "login",
                                ])
                            ]); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script([
    "/vendors/js/vendor.bundle.base",
    "https://www.google.com/recaptcha/api.js?render=".getenv("RECAPTCHA_SITE_KEY")
]); ?>
<script type="text/javascript">
    grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo getenv("RECAPTCHA_SITE_KEY"); ?>', {action: '<?php echo $this->getRequest()->getParam("action"); ?>'}).then(function(token) {
            $("#recaptcha-token").val(token);
        });
    });
    const $passwordStrength = $("#password-strength");
    function checkPasswordStrength(password){
        if(password.length >= <?php echo Configure::read("App.PasswordPolicy.minLength", 6); ?>){
            $passwordStrength.find(".pass-length").removeClass("text-danger").addClass("done");
        }else{
            $passwordStrength.find(".pass-length").removeClass("done").addClass("text-danger");
        }
        <?php if (Configure::read("App.PasswordPolicy.includeUppercase", false)) { ?>
        const upperCaseRegEx = /(.*[A-Z])/;
        if(upperCaseRegEx.test(password)){
            $passwordStrength.find(".pass-uppercase").removeClass("text-danger").addClass("done");
        }else{
            $passwordStrength.find(".pass-uppercase").removeClass("done").addClass("text-danger");
        }
        <?php } ?>
        <?php if (Configure::read("App.PasswordPolicy.includeLowercase", false)) { ?>
        const lowerCaseRegEx = /(.*[a-z])/;
        if(lowerCaseRegEx.test(password)){
            $passwordStrength.find(".pass-lowercase").removeClass("text-danger").addClass("done");
        }else{
            $passwordStrength.find(".pass-lowercase").removeClass("done").addClass("text-danger");
        }
        <?php } ?>
        <?php if (Configure::read("App.PasswordPolicy.includeNumber", false)) { ?>
        const numberRegEx = /(.*\d)/;
        if(numberRegEx.test(password)){
            $passwordStrength.find(".pass-number-exists").removeClass("text-danger").addClass("done");
        }else{
            $passwordStrength.find(".pass-number-exists").removeClass("done").addClass("text-danger");
        }
        <?php } ?>
        <?php if (Configure::read("App.PasswordPolicy.includeWildcard", false)) { ?>
        const symbolRegEx = /(.*\W)/;
        if(symbolRegEx.test(password)){
            $passwordStrength.find(".pass-symbol-exists").removeClass("text-danger").addClass("done");
        }else{
            $passwordStrength.find(".pass-symbol-exists").removeClass("done").addClass("text-danger");
        }
        <?php } ?>
    }
    $(function(){
        $("#preference-locale").val(Intl.DateTimeFormat().resolvedOptions().locale);
        $("#preference-timezone").val(Intl.DateTimeFormat().resolvedOptions().timeZone);
        $(function(){
            $("#sign-up-form").submit(function(e){
                $(this).parents(".ui.form").addClass("loading");
            });
        });
        $("#inputPassword").on("keyup", function(){
            checkPasswordStrength($(this).val());
        });
        <?php if ( $this->request->is(["put", "patch", "post"]) ){ ?>
        checkPasswordStrength($("#inputPassword").val());
        <?php } ?>
    });
    $(function(){

        $('#eye2').click(function(){

            if($(this).hasClass('bx-show')){

                $(this).removeClass('bx-show');

                $(this).addClass('bx-hide');

                $('.password').attr('type','text');

            }else{

                $(this).removeClass('bx-hide');

                $(this).addClass('bx-show');

                $('.password').attr('type','password');
            }
        });
        $('#eye3').click(function(){

            if($(this).hasClass('bx-show')){

                $(this).removeClass('bx-show');

                $(this).addClass('bx-hide');

                $('.confirm-password').attr('type','text');

            }else{

                $(this).removeClass('bx-hide');

                $(this).addClass('bx-show');

                $('.confirm-password').attr('type','password');
            }
        });
    });
    window.onload = () => {
        const inputPassword = document.getElementById('inputPassword');
        inputPassword.onpaste = e => e.preventDefault();
    }
</script>
