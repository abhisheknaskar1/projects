<?php
use App\View\AppView;
use App\WebService\Customer;
use Cake\Utility\Inflector;

/**
 * @var array $property
 * @var array $currencies
 * @var array|null $errors
 * @var AppView $this
 * @var Customer $customer
 */
?>
<div class="field mb-3 <?php echo ( $errors ?? null ) ? "error" : "";  ?>">
    <label class="<?php echo ( $property["required"] ? "required" : "" ) ?>"><span class="float-right"><?php
        echo $this->Hint->build($property["hint"]);
    ?></span><?php
        echo $property["label"];
    ?></label>
    <div class="ui left action input">
        <div id="<?php echo Inflector::dasherize('customer_property_'.$property["property"]); ?>" class="ui dropdown compact currency-dropdown">
            <?php echo $this->Form->hidden($property["property"].".currency", [
                "default" => $property["value"]["currency"]
            ]); ?>
            <?php $this->Form->unlockField($property["property"].".currency"); ?>
            <i class="dropdown float-right icon"></i>
            <div class="default text text-truncate"><?php echo __("Currency"); ?></div>
            <div class="menu">
                <div class="ui icon search p-3 bg-light border-top">
                    <input class="w-100" type="text" placeholder="<?php echo __("Search..."); ?>">
                </div>
                <div class="divider mt-0 mb-0"></div>
                <div class="menu scrolling">
                    <?php foreach ( $currencies as $option ) { ?>
                        <div class="item text-truncate w-100" data-currency-icon="<?php echo $option["icon"]; ?>" data-currency-iso="<?php echo $option["iso_code_alpha"]; ?>" data-value="<?php echo $option["id"]; ?>">
                            <?php echo $option["iso_code_alpha"]." - ".$option["known_name"]; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php echo $this->Form->control($property["property"].".amount", [
            "type" => "text",
            "label" => false,
            "id" => true,
            "class" => "money",
            "templates" => [
                'inputContainer' => '{{content}}',
                'inputContainerError' => '{{content}}',
                'error' => '{{content}}'
            ],
            "default" => ($property["value"]["amount"]*100 ? $property["value"]["amount"]*100 : "")
        ]); ?>
    </div>
    <?php if ( $this->Form->isFieldError($property["property"]) ) {
        echo $this->Form->error($property["property"], [
            current($errors)
        ]);
    } ?>
</div>
