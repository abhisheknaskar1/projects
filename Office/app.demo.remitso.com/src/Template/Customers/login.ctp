<?php
/**
 * @var \App\View\AppView $this
 * @var string $titleForLayout
 * @var string $recentEmail
 */
?>
<style>
    body
    {
        background-color: #212529c7;
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
    <div class="row align-items-center justify-content-center flex-column">
        <div class="col-md-6 col-lg-5 col-xl-4 auth-block">
            <div class="w-100 ui form bg-white rounded-lg shadow-sm py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h5 class="font-weight-bold mb-2 mt-4 text-theme"><?php echo __("Welcome Back!"); ?><span class="float-right"></span></h5>
                            <p class="text-theme"><?php echo __("Please enter your email and password to log in."); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <?php echo $this->Form->create(NULL, [
                                "autocomplete" => "off",
                                "errorClass" => "",
                                "templates" => [
                                    "inputContainer" => '<div class="form-label-group">{{content}}<span class="input-icon">{{iconHtml}}</span></div>',
                                ],
                                "id" => "sign-in-form",
                                "class" => "form-signin",
                            ]); ?>
                                <?php echo $this->Flash->render(); ?>
                                <?php echo $this->Form->control("email", [
                                    "type" => "email",
                                    "required" => true,
                                    "label" => false,
                                    "placeHolder" => __("Email Address"),
                                    "default" => $recentEmail,
                                    "class" => "form-control",
                                    "templateVars" => [
                                        "iconHtml" => '<i class="mdi mdi-account icon"></i>',
                                        'labelText' => __("Email Address"),
                                        "forLabel" => "inputEmail",
                                    ]
                                ]); ?>
                                <?php echo $this->Form->control("password", [
                                    "type" => "password",
                                    "required" => true,
                                    "label" => false,
                                    "placeHolder" => __("Password"),
                                    "id" => "inputPassword",
                                    "class" => "form-control",
                                    "templateVars" => [
                                        "iconHtml" => '<i class="bx bx-show icon-show" id="eye"></i>',
                                        'labelText' => __("Password"),
                                        "forLabel" => "inputPassword",
                                    ]
                                ]); ?>
                            <div class="mb-3">
                                <a class="f-14" href="<?php echo $this->Url->build([
                                    "action" => "forgotPassword",
                                ]); ?>"><?php echo __("Forgot Password?"); ?></a>
                            </div>
                            <button class="btn btn-primary btn-block text-white" type="submit"><?php echo __("Log In"); ?></button>
                            <?php echo $this->Form->end(); ?>
                            <p class="text-center f-14"><?php echo __("By signing in, you agree to our {tos_link}.", [
                                "tos_link" => $this->Html->link(__("Terms & Conditions"), 'javascript:')
                            ]); ?></p>
                            <p class="text-center mb-3 f-14"><?php echo nl2br(
                                __("New here? {register_link}", [
                                    'register_link' => $this->Html->link(__("Create an account"), [
                                        "action" => "register",
                                    ])
                                ])
                            ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = () => {
        const inputPassword = document.getElementById('inputPassword');
        inputPassword.onpaste = e => e.preventDefault();
    }
</script>
