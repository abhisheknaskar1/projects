<?php
use App\Form\RecipientForm;
use App\View\AppView;
/**
 * @var AppView $this
 * @var RecipientForm $form
 * @var array $fields
 * @var array $relationships
 * @var array $payoutChannel
 */
use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;

$cancelUrl = $this->Url->build([
    "action" => "wizardDeliveryMethod",
    $payoutChannel['country']['slug'],
]);
if ($this->getRequest()->getQuery("quote")) {
    $cancelUrl = $this->Url->build([
        "controller" => "Orders",
        "action" => "recipient",
        "_base" => $locale,
        $this->getRequest()->getQuery("quote")
    ]);
}
$recipientTypeOptions = [
    'INDIVIDUAL' => __("A Person"),
    'ENTITY' => __("A Business or Entity"),
];
if (($payoutChannel["business_recipient_allowed"] ?? false) === false) {
    unset($recipientTypeOptions['ENTITY']);
}
echo $this->Html->css([
    '/vendors/semantic-ui/components/label.min'
]);
?>
<style>
    .ui.checkbox label{
        font-size: 0.85rem;
        text-align: justify;
    }
    .ui.dropdown .menu .item, .ui.dropdown .menu .message{
        font-size: 0.85rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .ui.dropdown .text{
        font-size: 0.85rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .field p.error {
        font-size: 0.80rem;
        letter-spacing: 0.05rem;
        padding: 5px;
        color: #9f3a38;
    }
    .icon.text-icon {
        opacity: 1 !important;
        color: #616161 !important;
        line-height: 1;
    }
    .icon.icon-isd {
        opacity: 1 !important;
        color: #616161 !important;
        line-height: 1;
    }
    .icon.text-icon:before {
        content: attr(data-text);
        font-size: 0.85rem !important;
        font-style: normal;
    }
    .icon.icon-isd:before {
        content: attr(data-text);
        font-size: 0.85rem !important;
        font-style: normal;
        line-height: 1.1;
    }
    .ui.form .field>label {
        font-weight: 500;
    }
    .ui.labeled.input>.label:not(.corner) {
        padding-top: 0.978571em;
        padding-bottom: 0.678571em;
    }
    .ui.labeled.input>.label {
        font-size: 0.9rem !important;
        font-weight: 400;
        color: #616161 !important;
    }
    .error {
        color: #5a5c69;
        font-size: 0.88rem;
        position: relative;
        line-height: 1;
        width: 100%;
    }
    .user-profile-section .profile-details-card .profile-details-card-header
    {
        margin-bottom: 0px;
        background: #f1f5f6;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        border-bottom: none;
    }
</style>
<div class="col-xl-6 col-lg-9 mb-4">
    <div class="p-3 py-2 mb-0 border-0 rounded-top">
        <h6 class="text-orange font-weight-normal mb-0">Add Recipient</h6>
    </div>
    <div class="h-100 py-2">
        <div class="row h-100">
            <div class="col-md-12">
                <?php echo $this->Form->create($form, [
                    "autocomplete" => "off",
                    "class" => "px-3",
                    "errorClass" => "",
                    "templates" => [
                        "inputContainer" => '<div class="field mb-3"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconPosition}} {{iconClass}}">{{preIconHtml}}{{content}}{{iconHtml}}</div></div>',
                        'inputContainerError' => '<div class="field error mb-3"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconPosition}} {{iconClass}}">{{preIconHtml}}{{content}}{{iconHtml}}</div>{{error}}</div>',
                        'error' => '<p class="error ">{{content}}</p>'
                    ],
                    "id" => "profile-form"
                ]); ?>
                <?php echo $this->Flash->render(); ?>
                <div class="ui form loader">
                    <?php if (count($recipientTypeOptions) > 1)  { ?>
                        <div class="inline fields">
                            <?php echo $this->Form->control("recipient_type", [
                                "options" => $recipientTypeOptions,
                                "type" => "radio",
                                "label" => false,
                                "templates" => [
                                    'inputContainer' => '{{content}}',
                                    'nestingLabel' => '{{hidden}}<div class="field"><div class="ui radio checkbox">{{input}}<label class="font-weight-bolder text-muted">{{text}}</label></div></div>',
                                ],
                                "default" => "INDIVIDUAL"
                            ]); ?>
                        </div>
                    <?php } else {
                        echo $this->Form->hidden('recipient_type', [
                            'id' => true,
                            'value' => current(array_keys($recipientTypeOptions))
                        ]);
                    } ?>
                    <?php if (($payoutChannel["business_recipient_allowed"] ?? false) === true) { ?>
                        <div id="business-name" class="<?php echo $this->getRequest()->getData("recipient_type") !== "ENTITY" ? "d-none" : ""; ?>">
                            <?php echo $this->Form->control("entity_name", [
                                "type" => "text",
                                "label" => false,
                                "id" => true,
                                "templateVars" => [
                                    'labelText' => __("Business Name"),
                                    "labelClass" => "required",
                                ],
                            ]); ?>
                        </div>
                    <?php } ?>
                    <div id="individual-name" class="<?php echo $this->getRequest()->getData("recipient_type") === "ENTITY" ? "d-none" : ""; ?>">
                        <div class="row">
                            <?php $colSize = ($payoutChannel["ask_middle_name"]?? false) ? 4 : 6;  ?>
                            <div class="col-<?php echo $colSize; ?>">
                                <?php echo $this->Form->control("first_name", [
                                    "type" => "text",
                                    "label" => false,
                                    "id" => true,
                                    "required" => true,
                                    "templateVars" => [
                                        'labelText' => __("First Name"),
                                        "labelClass" => "required",
                                    ],
                                ]); ?>
                            </div>
                            <?php if ($payoutChannel["ask_middle_name"]?? false) { ?>
                                <div class="col-<?php echo $colSize; ?>">
                                    <?php echo $this->Form->control("middle_name", [
                                        "type" => "text",
                                        "label" => false,
                                        "required" => true,
                                        "id" => true,
                                        "templateVars" => [
                                            'labelText' => __("Middle Name"),
                                        ],
                                    ]); ?>
                                </div>
                            <?php } ?>
                            <div class="col-<?php echo $colSize; ?>">
                                <?php echo $this->Form->control("last_name", [
                                    "type" => "text",
                                    "label" => false,
                                    "required" => true,
                                    "id" => true,
                                    "templateVars" => [
                                        'labelText' => __("Last Name"),
                                        "labelClass" => "required",
                                    ],
                                ]); ?>
                            </div>
                        </div>
                    </div>
                    <?php foreach ( $fields as $field ) { ?>
                        <?php if ( $field["type"] === "select" ) { ?>
                            <div class="row">
                                <?php echo $this->element("semantic_ui_dropdown", [
                                    "property" => $field,
                                    "hint" => $field["hint"] ?? null,
                                    "errors" => ( $form->getErrors()[$field["property"]] ?? [] )
                                ]); ?>
                            </div>
                        <?php } else if ( $field["type"] === "contact" ) { ?>
                            <?php
                            $iconClass = "icon";
                            $iconPosition = "left labeled";
                            $preIconHtml = '<div class="ui basic label">+'.$payoutChannel["country"]["isd_code"].'</div>';
                            $property = $field["property"].".number";
                            echo $this->Form->hidden($field["property"].".country", [
                                "value" => $payoutChannel["country"]["id"]
                            ]);
                            echo $this->element("input_contact_number", [
                                "property" => $field,
                                "errors" => ($form->getErrors()[$field["property"]] ?? []),
                                "isdCode" => $payoutChannel["country"]["isd_code"]
                            ]);
                            ?>
                        <?php } else { ?>
                            <?php
                            $iconClass = "";
                            $iconPosition = "";
                            $preIconHtml = "";
                            if ( $field["prefix_addon"] ) {
                                $iconClass = "icon";
                                $iconPosition = "left";
                                $preIconHtml = '<div class="ui basic label">'.$field["prefix_addon"].'</div>';
                            }
                            ?>
                            <?php echo $this->Form->control($field["property"], [
                                "type" => "text",
                                "label" => false,
                                "id" => true,
                                "data-mask" => $field["mask"],
                                "templateVars" => [
                                    'labelText' => $field["label"],
                                    "labelClass" => $field["required"] ? "required" : "",
                                    "iconClass" => $iconClass,
                                    "iconPosition" => $iconPosition,
                                    "preIconHtml" => $preIconHtml
                                ],
                            ]); ?>
                        <?php } ?>
                    <?php } ?>
                    <div class="row">
                        <?php echo $this->element("semantic_ui_dropdown", [
                            "property" => [
                                "property" => "relationship_id",
                                "options" => $relationships,
                                "required" => true,
                                "label" => __("Relationship"),
                                "hint" => null
                            ],
                            "errors" => ( $form->getErrors()["relationship_id"] ?? [] )
                        ]); ?>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 text-right justify-content-between d-flex">
                            <a href="<?php echo $cancelUrl; ?>" class="btn btn-outline-dark shadow-none"><?php echo __("Cancel"); ?></a>
                            <button type="submit" class="btn btn-primary shadow-none px-4"><?php echo __("Save"); ?></button>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script([
    "/vendors/js/jquery.mask.min"
]); ?>
<script type="text/javascript">
    $(function(){
        $("#profile-form").on("submit", function(){
            $(this).find(".ui.form.loader").eq(0).addClass("loading");
        });
        $('[data-toggle="popover"]').popover();
        $('.ui.dropdown.selection').dropdown({
            clearable: true,
            selectOnKeydown: false,
            forceSelection: false,
            fullTextSearch: "exact",
            match: 'both',
            message: {
                noResults: '<?php echo htmlentities(__("No Results Found."), ENT_QUOTES); ?>'
            }
        });
        $('input[name="recipient_type"]').click(function(){
            if ( $(this).val() === "ENTITY" ) {
                $("#business-name").removeClass("d-none");
                $("#individual-name").addClass("d-none");
            } else {
                $("#business-name").addClass("d-none");
                $("#individual-name").removeClass("d-none");
            }
        });
    });
</script>
