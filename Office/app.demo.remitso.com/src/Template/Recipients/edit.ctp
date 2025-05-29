<?php
use App\Form\RecipientForm;
use App\View\AppView;
/**
 * @var AppView $this
 * @var RecipientForm $form
 * @var array $fields
 * @var array $relationships
 * @var array $payoutChannel
 * @var array $recipient
 */
use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;

echo $this->Html->css([
    '/vendors/semantic-ui/components/label.min'
])
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
    #profile-form .ui.dropdown.search > .dropdown.icon, #profile-form .ui.dropdown.selection > .dropdown.icon {
        padding: 1.2em 0.6em;
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
        <h6 class="text-orange font-weight-normal mb-0">Edit Recipient - <?php echo $recipient["full_name"]; ?></h6>
    </div>
    <div class="h-100">
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
                    <?php if ( $recipient["recipient_type"] === "ENTITY" ) { ?>
                        <div>
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
                    <?php } else { ?>
                        <div>
                            <div class="row">
                                <?php $colSize = ($payoutChannel["ask_middle_name"]?? false) ? 4 : 6;  ?>
                                <div class="col-<?php echo $colSize; ?>">
                                    <?php echo $this->Form->control("first_name", [
                                        "type" => "text",
                                        "label" => false,
                                        "id" => true,
                                        "templateVars" => [
                                            'labelText' => __("First Name"),
                                            "labelClass" => "required",
                                            "classText" => "",
                                        ],
                                    ]); ?>
                                </div>
                                <?php if ($payoutChannel["ask_middle_name"]?? false) { ?>
                                    <div class="col-<?php echo $colSize; ?>">
                                        <?php echo $this->Form->control("middle_name", [
                                            "type" => "text",
                                            "label" => false,
                                            "id" => true,
                                            "templateVars" => [
                                                'labelText' => __("Middle Name"),
                                                "classText" => "",
                                            ],
                                        ]); ?>
                                    </div>
                                <?php } ?>
                                <div class="col-<?php echo $colSize; ?>">
                                    <?php echo $this->Form->control("last_name", [
                                        "type" => "text",
                                        "label" => false,
                                        "id" => true,
                                        "templateVars" => [
                                            'labelText' => __("Last Name"),
                                            "labelClass" => "required",
                                            "classText" => "",
                                        ],
                                    ]); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php foreach ( $fields as $field ) { ?>
                        <?php if ( $field["type"] === "select" ) { ?>
                            <?php echo $this->element("semantic_ui_drop_down_edit", [
                                "property" => $field,
                                "errors" => ( $form->getErrors()[$field["property"]] ?? [] )
                            ]); ?>
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
                                    "preIconHtml" => $preIconHtml,
                                    "classText" => "",
                                ],
                            ]); ?>
                        <?php } ?>
                    <?php } ?>
                    <?php echo $this->element("semantic_ui_drop_down_edit", [
                        "property" => [
                            "property" => "relationship_id",
                            "options" => $relationships,
                            "required" => true,
                            "label" => __("Relationship"),
                            "hint" => null
                        ],
                        "errors" => ( $form->getErrors()["relationship_id"] ?? [] )
                    ]); ?>
                    <div class="row mt-3">
                        <div class="col-12 text-right justify-content-between d-flex">
                            <button type="submit" class="btn btn-sm btn-block btn-primary p-3"><?php echo __("Save Changes"); ?></button>
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
    });
</script>
