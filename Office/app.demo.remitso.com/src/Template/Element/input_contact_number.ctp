<?php
use App\View\AppView;

/**
 * @var array $property
 * @var string $isdCode
 * @var array|null $errors
 * @var AppView $this
 */
?>
<div class="field mb-3 <?php echo ( $errors ?? null ) ? "error" : "";  ?>">
    <label class="<?php echo ( $property["required"] ? "required" : "" ) ?>"><span class="float-right"><?php
            echo $this->Hint->build($property["hint"]);
            ?></span><?php
        echo $property["label"];
        ?></label>
    <div class="ui left labeled input">
        <div class="ui basic label">+<?php echo $isdCode ?></div>
        <?php echo $this->Form->control($property["property"].".number", [
            "type" => "text",
            "label" => false,
            "id" => true,
            "data-mask" => $property["mask"],
            "templates" => [
                'inputContainer' => '{{content}}',
                'inputContainerError' => '{{content}}',
                'error' => '{{content}}'
            ],
            "default" => ( $property["value"]["number"] ?? null )
        ]); ?>
    </div>
    <?php if ( $this->Form->isFieldError($property["property"]) ) {
        echo $this->Form->error($property["property"], [
            current($errors)
        ]);
    } ?>
</div>
