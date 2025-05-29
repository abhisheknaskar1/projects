<?php

use App\Form\ChangeEmailForm;
use App\WebService\Customer;
/**
 * @var \App\View\AppView $this
 * @var Customer $customer
 * @var ChangeEmailForm $form
 * @var String $titleForLayout
 */

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
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
    <div class="row align-items-center justify-content-center flex-column my-5">
        <div class="col-lg-6 col-xl-4 auth-block">
            <div class="w-100 ui form bg-white rounded-lg shadow-sm py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <h2 class="font-weight-bold mb-3 mt-4 text-theme"><?php echo __("Email Address"); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <?php echo $this->Form->create($customer, [
                                "autocomplete" => "off",
                                "errorClass" => "",
                                "class" => "form-signin",
                                "templates" => [
                                    "inputContainer" => '<div class="form-label-group">{{content}}<span class="input-icon">{{iconHtml}}</span></div>',
                                    'inputContainerError' => '<label>{{labelText}}</label><div class="form-label-group field error">{{content}}<span class="input-icon">{{iconHtml}}</span></div>',
                                ],
                                "id" => "email-form"
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
                            <p class="text-justify text-theme"><?php echo __("Your email is used for login and for us to reach you in case we detect unusual activity in your account or you accidentally get locked out."); ?></p>
                            <?php echo $this->Form->control("email", [
                                "type" => "email",
                                "required" => true,
                                "label" => false,
                                "placeHolder" => __("Email Address"),
                                "class" => "form-control",
                                "templateVars" => [
                                    "iconHtml" => '<i class="mdi mdi-account icon"></i>',
                                    'labelText' => __("Email"),
                                ],
                            ]); ?>
                            <p class="alert alert-info"><?php echo __("You'll receive all important notifications related to your account on this email address."); ?></p>
                            <button class="btn btn-lg btn-register btn-block text-white" type="submit"><?php echo __("Save Changes") ?></button>
                            <?php echo $this->Form->end(); ?>
                            <p class="text-center f-14"><?php echo __("To go to settings page {settings_link}", [
                                    "settings_link" => $this->Html->link(__("Click Here"), [
                                        "controller" => "Customers",
                                        "action" => "settings",
                                        "_base" => $locale,
                                    ])
                                ]); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $("#email-form").submit(function(e){
            $(this).parents(".ui.form").addClass("loading");
        });
    });
</script>
