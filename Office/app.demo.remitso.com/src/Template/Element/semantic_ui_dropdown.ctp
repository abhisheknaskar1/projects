<?php
use App\View\AppView;

/**
 * @var array $property.
 * @var array|null $errors
 * @var AppView $this
 */
?>
<div class="field mb-3 <?php echo ( $errors ?? null ) ? "error" : "";  ?> col-lg-12">
    <label class="<?php echo ( $property["required"] ? "required" : "" ) ?>"><span class="float-right"><?php
        echo $this->Hint->build($property["hint"]);
    ?></span><?php
        echo $property["label"];
    ?></label>
    <div class="ui <?php echo $property["class"] ?? ""; echo count($property["options"]) < 7 ? "" : "search"; ?> selection dropdown">
        <?php echo $this->Form->hidden($property["property"], [
            "default" => ($is_boolean ?? false) ? (int)$property["value"] : ($property["value"] ?? null)
        ]); ?>
        <?php $this->Form->unlockField($property["property"]); ?>
        <i class="dropdown icon"></i>
        <div class="default text w-100 text-truncate"><?php echo __("Please Select"); ?></div>
        <div class="menu">
            <?php foreach ( $property["options"] as $option ) { ?>
                <div class="item text-truncate w-100" data-value="<?php echo $option["id"]; ?>"><?php echo $option["title"]; ?></div>
            <?php } ?>
        </div>
    </div>
    <?php if ( $this->Form->isFieldError($property["property"]) ) {
        echo $this->Form->error($property["property"], [
            current($errors)
        ]);
    } ?>
</div>
