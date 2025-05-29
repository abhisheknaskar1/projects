<?php
use App\View\AppView;

/**
 * @var array $property
 * @var array|null $errors
 * @var AppView $this
 */
$disabled = $disabled ?? false;
?>
<div class="field mb-3 <?php echo ( $errors ?? null ) ? "error" : "";  ?> col-lg-6">
    <label class="<?php echo ( $property["required"] ? "required" : "" ) ?>"><span class="float-right"><?php
        echo $this->Hint->build($property["hint"]);
    ?></span><?php
        echo $property["label"];
    ?></label>
    <div class="ui search selection dropdown <?php echo $disabled ? "disabled" : ""; ?>">
        <?php echo $this->Form->hidden($property["property"], [
            "default" => $property["value"]
        ]); ?>
        <?php $this->Form->unlockField($property["property"]); ?>
        <i class="dropdown icon"></i>
        <div class="default text w-100 text-truncate"><?php echo __("Please Select"); ?></div>
        <div class="menu">
            <?php foreach ( $property["options"] as $option ) { ?>
                <div class="item text-truncate w-100" data-value="<?php echo $option["id"]; ?>">
                    <i class="flag-icon flag-icon-<?php echo strtolower($option["code"]); ?> flag-icon-squared rounded-circle mr-2"></i>
                    <?php echo $option["title"]; ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if ( $this->Form->isFieldError($property["property"]) ) {
        echo $this->Form->error($property["property"], [
            current($errors)
        ]);
    } ?>
</div>
