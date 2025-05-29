<?php
/**
 * @var \App\View\AppView $this
 * @var string $titleForLayout
 * @var ForgotPasswordForm $forgotPassword
 */

use App\Form\ForgotPasswordForm;
?>
<style>
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
    .form-signin .input-icon {
        top: 11px;
        font-size: 20px;
        right: 12px;
        color: #6a0dad;
    }
    p
    {
        font-size: 1rem;
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
</style>
<div class="container-fluid py-6">
    <div class="row align-items-center justify-content-center flex-column">
        <div class="col-md-6 col-lg-5 col-xl-4 auth-block my-5">
            <div class="w-100 ui form bg-white rounded-lg shadow-sm py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 text-center mb-4">
                            <h5 class="section-heading font-weight-bold mb-2 text-theme"><?php echo __('Forgot Your Password?'); ?></h5>
                            <p class="text-theme"><?php echo __("Enter your registered email address, and we'll send a reset link to help you create a new password."); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <?php echo $this->Form->create($forgotPassword, [
                                "autocomplete" => "off",
                                "errorClass" => "",
                                "templates" => [
                                    "inputContainer" => '<div class="form-label-group">{{content}}<span class="input-icon">{{iconHtml}}</span></div>',
                                    'inputContainerError' => '<label>{{labelText}}</label><div class="form-label-group field error">{{content}}<span class="input-icon">{{iconHtml}}</span></div>',
                                ],
                                "id" => "forgot-password-form",
                                "class" => "form-signin",
                            ]); ?>
                            <?php echo $this->Flash->render(); ?>
                            <?php if ($forgotPassword->getErrors()) { ?>
                                <div class="ui message tiny negative">
                                    <div class="header"><?php echo __("Oops! Something went wrong."); ?></div>
                                    <ul class="list">
                                        <?php foreach ($forgotPassword->getErrors() as $k => $errors) { ?>
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
                                "id" => "inputEmail",
                                "placeHolder" => __("Email Address"),
                                "class" => "form-control",
                                "templateVars" => [
                                    "iconHtml" => '<i class="mdi mdi-account icon"></i>',
                                    'labelText' => __("Email Address"),
                                ],
                            ]); ?>
                            <button class="btn btn-primary text-white btn-block" type="submit"><?php echo __("Submit"); ?></button>
                            <?php echo $this->Form->end(); ?>
                            <p class="mt-4 text-center f-14"><?php echo __("Remembered your password? {login_link}", [
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

