<?php

use App\Form\ResetPasswordForm;
use App\View\AppView;
use Cake\Core\Configure;
/**
 * @var AppView $this
 * @var ResetPasswordForm $form
 * @var string $titleForLayout
 */
?>
<style>
        #password-strength li{
            list-style-type: none;
            margin-bottom: 5px;
        }
        #password-strength li.done{
            color: #00793d;
        }
        #password-strength li:before{
            list-style-type: none;
            content: '\F5E1';
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
        .form-signin .input-icon {
            top: 13px;
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
            background: #556ee9;
        }
        .form input::placeholder
        {
            font-family: 'Inter', sans-serif;
        }
    </style>
<div class="container-fluid py-6">
    <div class="row align-items-center justify-content-center flex-column">
        <div class="col-lg-4 col-xl-4 auth-block my-5">
            <div class="w-100 ui form bg-white rounded-lg shadow-sm py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <h4 class="font-weight-bold mb-4 text-theme border-bottom pb-3"><?php echo __("Reset Password!"); ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <?php echo $this->Form->create($form, [
                                "autocomplete" => "off",
                                "errorClass" => "",
                                "class" => "form-signin",
                                "templates" => [
                                    "inputContainer" => '<div class="form-label-group">{{content}}<span class="input-icon">{{iconHtml}}</span></div>',
                                    'inputContainerError' => '<label>{{labelText}}</label><div class="form-label-group field error">{{content}}<span class="input-icon">{{iconHtml}}</span></div>',
                                ],
                                "id" => "reset-password-form"
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
                            <?php echo $this->Form->control("password", [
                                "type" => "password",
                                "required" => true,
                                "label" => false,
                                "placeHolder" => __("New Password"),
                                "class" => "form-control password",
                                "templateVars" => [
                                    "iconHtml" => '<i class="bx bx-show icon-show" id="eye6"></i>',
                                    'labelText' => __("New Password"),
                                ],
                                "onpaste" => "return false;"
                            ]); ?>
                            <div class="form-group">
                                <ul id="password-strength" class="pl-0  text-sm">
                                    <li class="pass-length"><?php echo __("{password_policy} characters or more", [
                                            'password_policy' => Configure::read("App.PasswordPolicy.minLength", 6),
                                        ]) ?></li>
                                    <?php if (Configure::read("App.PasswordPolicy.includeUppercase", false)) { ?>
                                        <li class="pass-uppercase"><?php echo __("One UPPERCASE (CAPITAL) letter.") ?></li>
                                    <?php } ?>
                                    <?php if (Configure::read("App.PasswordPolicy.includeLowercase", false)) { ?>
                                        <li class="pass-lowercase"><?php echo __("One lowercase (small) letters.") ?></li>
                                    <?php } ?>
                                    <?php if (Configure::read("App.PasswordPolicy.includeNumber", false)) { ?>
                                        <li class="pass-number-exists"><?php echo __("Number included") ?></li>
                                    <?php } ?>
                                    <?php if (Configure::read("App.PasswordPolicy.includeWildcard", false)) { ?>
                                        <li class="pass-symbol-exists"><?php echo __("One symbol (eg. ! @ # $ & * etc)") ?></li>
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
                                    "iconHtml" => '<i class="bx bx-show icon-show" id="eye7"></i>',
                                    'labelText' => __("Confirm Password")
                                ],
                                "onpaste" => "return false;"
                            ]); ?>
                            <button class="btn btn-lg btn-login text-white btn-block" type="submit"><?php echo __("Reset Password") ?></button>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script([
    "/assets/vendor/jquery/jquery.min.js",
    "/vendors/js/vendor.bundle.base",
    "/assets/js/main.js",
]); ?>
<script type="text/javascript">
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
        $('[data-toggle="password"]').click(function(e){
            e.preventDefault();
            $input = $(this).siblings().eq(0);
            if ( $input.attr("type").toUpperCase() == "TEXT" ) {
                $(this).find("i").eq(0)
                    .removeClass("mdi-eye-outline")
                    .addClass("mdi-eye-off-outline");
                $input.attr("type", "password");
            } else {
                $(this).find("i").eq(0)
                    .removeClass("mdi-eye-off-outline")
                    .addClass("mdi-eye-outline");
                $input.attr("type", "text");
            }
        });
        $("#reset-password-form").on("submit", function(e){
            $(this).parents(".ui.form").addClass("loading");
        });
        $("#password").on("keyup", function(){
            checkPasswordStrength($(this).val());
        });
        <?php if ( $this->request->is(["put", "patch", "post"]) ){ ?>
        checkPasswordStrength($("#password").val());
        <?php } ?>
    });
    $(function(){

        $('#eye6').click(function(){

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
        $('#eye7').click(function(){

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
</script>
