<?php
use App\View\AppView;
use App\WebService\Customer;
use Cake\Utility\Inflector;

/**
 * @var array $property
 * @var array $isdCodes
 * @var array|null $errors
 * @var AppView $this
 * @var Customer $customer
 * @var string|null $default_isd
 */
?>
<div class="field mb-3 <?php echo ( $errors ?? null ) ? "error" : "";  ?> col-lg-12">
    <label class="<?php echo ( $property["required"] ? "required" : "" ) ?>"><span class="float-right"><?php
            echo $this->Hint->build($property["hint"]);
    ?></span><?php
        echo $property["label"];
    ?></label>
    <div class="ui left action input">
        <div id="<?php echo Inflector::dasherize('customer_property_'.$property["property"]); ?>" class="ui dropdown compact isd-code-dropdown">
            <?php echo $this->Form->hidden($property["property"].".country", [
                "default" => ( $property["value"]["country"] ?? $default_isd ?? null )
            ]); ?>
            <?php $this->Form->unlockField($property["property"].".country"); ?>
            <i class="dropdown float-right icon"></i>
            <div class="default text text-truncate"><?php echo __("ISD"); ?></div>
            <div class="menu">
                <div class="ui icon search p-3 bg-light border-top">
                    <input class="w-100" type="text" placeholder="<?php echo __("Search..."); ?>">
                </div>
                <div class="divider mt-0 mb-0"></div>
                <div class="menu scrolling">
                    <?php foreach ( $isdCodes as $option ) { ?>
                        <div class="item text-truncate w-100" data-country-iso="<?php echo $option["country_code"]; ?>" data-isd-code="<?php echo $option["isd_code"]; ?>" data-value="<?php echo $option["id"]; ?>">
                            <i class="flag-icon flag-icon-<?php echo strtolower($option["country_code"]); ?> flag-icon-squared rounded-circle mr-1"></i>
                            <?php echo $option["title"]; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php echo $this->Form->control($property["property"].".number", [
            "type" => "text",
            "label" => false,
            "id" => 'numberField',
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
<script>
    let numberField = document.querySelector('#numberField');

    numberField.addEventListener('input', restrictNumber);
    function restrictNumber (e) {
        this.value = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
    }
</script>
