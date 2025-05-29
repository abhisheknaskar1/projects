<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Form\QuoteConfirmationForm $form
 */
$this->layout = false;
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
    <title><?php echo $titleForLayout ?? null; ?></title>

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
    </style>
</head>
<body class="order-auth-body">
<?php echo $this->Html->css([
    "style",
    "/assets/css/vendor.bundle.base.css",
    "/assets/vendor/bootstrap/css/bootstrap.min",
    "/vendors/iconfonts/mdi/font/css/materialdesignicons.min",
    "/assets/vendor/boxicons/css/boxicons.min",
    "/assets/vendor/venobox/venobox",
]); ?>
<main>
    <div class="container-fluid py-6">
        <div class="row align-items-center justify-content-center flex-column min-vh-100">
            <div class="col-lg-4 col-xl-4 auth-block my-5">
                <div class="w-100 ui form bg-white rounded-lg shadow-sm py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <h6 class="mb-4 text-theme text-center border-bottom pb-3"><?php echo __("Enter your PIN to confirm your transfer "); ?></h6>
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
                                    ]);
                                    echo $this->Form->hidden("purpose_id");
                                    echo $this->Form->hidden("purpose_text");
                                    ?>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php echo $this->Html->script([
    "/assets/vendor/jquery/jquery.min.js",
    "/vendors/js/vendor.bundle.base",
    "/assets/js/main.js",
]); ?>
<script type="text/javascript">
    let $entryRow = $("#entry-row");
    let $twoFactorAuthForm = $("#two-fa-form");
    let $pinInput = $("#pin");
    function toggleNumpadBtn(){
        let openSlots = $entryRow.find(".btn.text-muted").length;
        if( openSlots === 0 ){
            $twoFactorAuthForm.find('button[type="submit"]').removeAttr("disabled");
        }else{
            $twoFactorAuthForm.find('button[type="submit"]').attr("disabled", "disabled");
            if( openSlots === 4 ){
                $twoFactorAuthForm.find('[data-toggle="numpad"]').filter('[data-value="delete"]').attr("disabled", "disabled");
            }else{
                $twoFactorAuthForm.find('[data-toggle="numpad"]').filter('[data-value="delete"]').removeAttr("disabled");
            }
        }
    }
    $(function(){
        $(".twofa-form").on("submit", "#two-fa-form", function(){
            $(this).parents(".ui.form").addClass("loading");
        });
        $('[data-toggle="numpad"]').on("click", function(){
            if($(this).attr("data-value") === "delete"){
                let pinDigits = $pinInput.val().split("");
                pinDigits.pop();
                $pinInput.val(pinDigits.join(""));
                $entryRow.find(".btn").filter(':not(".text-muted")').last().removeClass("btn-outline-success").addClass("text-muted").addClass("border");
                toggleNumpadBtn();
            }else{
                let $currentPlaceholder = $entryRow.find(".btn.text-muted").eq(0);
                if($currentPlaceholder.length){
                    $currentPlaceholder.removeClass("text-muted");
                    $currentPlaceholder.removeClass("input-error");
                    $currentPlaceholder.removeClass("border");
                    $currentPlaceholder.addClass("btn-outline-success");
                    $pinInput.val($pinInput.val()+$(this).attr("data-value").toString());
                    toggleNumpadBtn();
                }
            }
        });
    });
</script>
</body>
</html>
