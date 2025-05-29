<?php
use App\Form\QuoteConfirmationForm;
use Cake\Collection\CollectionInterface;

/**
 * @var string $totalNice
 * @var array $cardSchemes
 * @var App\View\AppView $this
 * @var QuoteConfirmationForm $form
 * @var CollectionInterface $cards
 * @var array $paymentMethod
 */
$selectedCard = $this->getRequest()->getData("saved_card_id", null);
if ( $cards->isEmpty() ) {
    $selectedCard = "new";
}
$label = $label ?? true;
?>
<?php if ( $cards->isEmpty() === false ) { ?>
<div class="mb-4 ui field <?php echo ($form->getErrors()["saved_card_id"] ?? null) ? "error" : ""; ?> mb-4">
    <?php if ($label) { ?><label class="mt-4"><?php echo __("Payment Method"); ?></label><?php } ?>
    <div class="ui segments mt-0" id="saved-card-list">
        <?php foreach ( $cards as $card ) { ?>
            <?php $inputState = $selectedCard === $card["id"] ? "" : "disabled"; ?>
            <div class="ui segment pl-4 pr-4 <?php echo $selectedCard === $card["id"] ? "bg-light" : ""; ?>">
                <div>
                    <div class="float-left mr-3" style="margin-top: 0;">
                        <input <?php echo $this->getRequest()->getData("saved_card_id") === $card["id"] ? "checked" : ""; ?> value="<?php echo $card["id"]; ?>" name="saved_card_id" type="radio" />
                    </div>
                    <div class="float-left mr-2" style="margin-top: -3px;">
                        <?php echo $this->Html->image("card-brands/".strtolower($card["card_scheme"]).".svg", [
                            "width" => "42px",
                            "class" => "mr-3",
                            "style" => "margin-left: -5px;"
                        ]); ?>
                    </div>
                    <div class="float-right ml-3 small font-weight-bolder" style="margin-top: 0;"><?php echo $card["expiry"]->format("m/y"); ?></div>
                    <div class="form-text text-roboto"><?php echo $card["card_number"]; ?></div>
                </div>
                <div class="mt-3 <?php echo $selectedCard === $card["id"] ? "" : "d-none"; ?>">
                    <p style="font-size: 12px;" class="text-justify text-primary"><?php echo __("This charge will appear as {statement_descriptor} on your card statement", [
                        "statement_descriptor" => '<strong>IRFX +442035884105</strong>'
                    ]) ?></p>
                    <button type="submit" disabled class="btn mb-2 btn-success btn-block text-roboto"><?php echo __("Continue to Pay {amount}", [
                          'amount' => $totalNice,
                        ]); ?></button>
                </div>
            </div>
        <?php } ?>
        <?php } ?>
        <?php if ( $cards->isEmpty() === false ) { ?>
        <div class="ui segment pl-4 pr-4 <?php echo $selectedCard === "new" ? "bg-light" : ""; ?>">
            <div>
                <div class="float-left mr-3" style="margin-top: 0;">
                    <input <?php echo $this->getRequest()->getData("saved_card_id") === "new" ? "checked" : ""; ?> value="new" name="saved_card_id" type="radio" />
                </div>
                <div class="float-left ml-2" style="margin-top: -3px; margin-right: 35px; font-size: 18px;">
                    <i class="mdi mdi-credit-card"></i>
                </div>
                <div class="form-text text-roboto"><?php echo __("Pay using New {card_type}", [
                    "card_type" => $paymentMethod["title"]
                ]); ?></div>
            </div>
            <?php } ?>
            <div class="<?php echo $cards->isEmpty() || $this->getRequest()->getData("saved_card_id") === "new" ? "" : "d-none"; ?> mt-3">
                <?php $inputState = $selectedCard === "new" ? "" : "disabled"; ?>
                <?php if ( $cards->isEmpty() === true ) { ?>
                    <div class="field">
                        <label for=""><?php echo __("Your {card_type} details", [
                            "card_type" => $paymentMethod["title"]
                        ]); ?></label>
                    </div>
                <?php } ?>
                <div class="row no-gutters">
                    <div class="col-7 pr-3">
                        <div class="field mb-3  <?php echo $selectedCard === "new" && ($form->getErrors()["card_number"] ?? null) ? "error" : ""; ?>">
                            <div class="ui input w-100">
                                <input <?php echo $inputState; ?> type="text" id="card-number" name="card_number" placeholder="<?php echo htmlentities(__("{card_type} Number", [
                                    "card_type" => $paymentMethod["title"]
                                ]), ENT_QUOTES); ?>" data-mask="0000 0000 0000 0000" autocomplete="off" maxlength="19" />
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="field mb-3 <?php echo $selectedCard === "new" && ($form->getErrors()["card_scheme"] ?? null) ? "error" : ""; ?>">
                            <select name="card_scheme" id="card-scheme" class="form-control fluid">
                                <option value=""><?php echo __("Card Type"); ?></option>
                                <?php foreach ( $cardSchemes as $scheme ) { ?>
                                    <option value="<?php echo $scheme["id"]; ?>"><?php echo $scheme["title"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-7 pr-3">
                        <div class="field mb-3 <?php echo $selectedCard === "new" && ($form->getErrors()["name_on_card"] ?? null) ? "error" : ""; ?>">
                            <div class="ui input  right icon w-100">
                                <input <?php echo $inputState; ?> type="text" name="name_on_card" placeholder="<?php echo htmlentities(__("Name on Card"), ENT_QUOTES); ?>" /><i class="icon mdi mdi-account"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="field mb-3 <?php echo $selectedCard === "new" && ($form->getErrors()["expiry"] ?? null) ? "error" : ""; ?>">
                            <div class="ui input  right icon w-100">
                                <input <?php echo $inputState; ?> type="text" name="expiry" placeholder="<?php echo htmlentities(__("Expiry"), ENT_QUOTES). "(MM/YY)"; ?>" data-mask="00 / 00" autocomplete="off" maxlength="7"><i class="icon mdi mdi-calendar-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-4">
                        <div class="field mb-3 <?php echo $selectedCard === "new" && ($form->getErrors()["cvc"] ?? null) ? "error" : ""; ?>">
                            <div class="ui input right icon w-100">
                                <input <?php echo $inputState; ?> type="password" name="cvc" data-mask="000" placeholder="<?php echo htmlentities(__("CVC"), ENT_QUOTES); ?>" autocomplete="off" maxlength="3">
                                <i class="icon mdi mdi-shield-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 pl-3">
                        <div class="field mb-3"><p class="mb-0 text-justify" style="font-size: 9px;"><?php echo __("The Card Verification Code, or CVC*, is three digits of number printed on the signature strip on the reverse of your card."); ?></p></div>
                    </div>
                </div>
                <div class="field mb-2">
                    <div class="ui checkbox">
                        <?php echo $this->Form->control("save_instrument", [
                            "type" => "checkbox",
                            "id" => true,
                            "label" => false,
                            "value" => "on",
                            "default" => "on",
                            "templates" => [
                                "inputContainer" => '{{content}}'
                            ]
                        ]) ?><label for="save-instrument"><?php echo __("Save card for faster checkout"); ?></label>
                    </div>
                </div>
                <p style="font-size: 12px;" class="text-justify text-primary"><?php echo __("This charge will appear as {statement_descriptor} on your card statement", [
                    "statement_descriptor" => '<strong>IRFX +442035884105</strong>'
                ]) ?></p>
                <button type="submit" <?php echo $inputState; ?> class="btn mb-2 btn-success btn-block text-roboto"><?php echo __("Continue to Pay {amount}", [
                     'amount' => $totalNice,
                    ]); ?></button>
            </div>
        <?php if ( $cards->isEmpty() === false ) { ?>
        </div>
    </div>
</div>
<?php } ?>
<script>
    $(function(){
        $("#card-scheme").dropdown();
        $("#saved-card-list").on("click", '.ui.segment', function(){
            $(this).find('input[name="saved_card_id"]').get(0).checked = true;
            $(this).addClass("bg-light");
            $(this).children("div:last").removeClass("d-none");
            $(this).find('input[type="text"]').removeAttr("disabled");
            $(this).find('input[type="password"]').removeAttr("disabled");
            $(this).find('button[type="submit"]').removeAttr("disabled");
            $.each($(this).siblings(), function(){
                $(this).find('input[name="saved_card_id"]').get(0).checked = false;
                $(this).removeClass("bg-light");
                $(this).children("div:last").addClass("d-none");
                $(this).find('input[type="text"]').attr("disabled", "disabled");
                $(this).find('input[type="password"]').attr("disabled", "disabled");
                $(this).find('button[type="submit"]').attr("disabled", "disabled");
            });
        });
    });
</script>
