<?php
use App\Form\CustomerForm;
use App\View\AppView;
use App\WebService\Customer;
use Cake\I18n\Date;

/**
 * @var AppView $this
 * @var Customer $customer
 * @var array $individualSections
 * @var array $currentSection
 * @var array $countryOptions
 * @var array $nationalityOptions
 * @var array $isdCodes
 * @var CustomerForm $form
 * @var array $currencies
 * @var array|null $previousStep
 * @var boolean $stepped
 */
use Cake\I18n\I18n;

$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;

$booleanOptions = [
    [
        'id' => 0,
        "title" => __("No"),
    ], [
        'id' => 1,
        "title" => __("Yes"),
    ]
];

$languages = [];

if ( $previousStep ) {
    $previousStepUrl = $this->Url->build([
        "action" => "profile",
        "_base" => $locale,
        $previousStep["id"]
    ]);
} else {
    $previousStepUrl = $this->Url->build([
        "action" => "countrySelector",
        "_base" => $locale,
    ]);
}
$nationalityOptions = array_values((new Cake\Collection\Collection((array)$nationalityOptions))->sortBy("title", SORT_ASC, SORT_STRING)->toArray());
?>
<?php echo $this->Html->css([
    "/vendors/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker",
    "/vendors/iconfonts/material-design-icons/material-icons"
]); ?>
<style>
    .section-heading {
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.05rem;
        color: #376cea;
    }
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
        font-size: 1rem;
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
    .isd-code-dropdown {
        border: 1px solid rgba(34,36,38,.15);
        padding: 1.1em 1em;
        line-height: 1;
    }
    .isd-code-dropdown .icon{
        line-height: 1.3 !important;
        position: static !important;
    }
    .currency-dropdown {
        border: 1px solid rgba(34,36,38,.15);
        padding: .75em 1em;
        line-height: 1;
    }
    .currency-dropdown .icon{
        line-height: 1 !important;
        position: static !important;
    }
    .profile-details-card .error {
        font-size: inherit;
        width: 100%;
    }
    #header {
        background: #14406E; !important;
        transition: all 0.5s;
        z-index: 997;
        padding: 16px 0;
        top: 0px; }
    #header .logo {
        font-size: 32px;
        margin: 0;
        padding: 0;
        line-height: 1;
        font-weight: 700;
        letter-spacing: 0.5px;
        font-family: 'Inter', sans-serif; }
    #header .logo a {
        color: #2c4964; }
    #header .logo img {
        width: 200px;
    }
    .text-completed
    {
        color: #21ba45;
    }
    @media only screen and (max-width:560px){
        .isd-code-dropdown {
            padding: 1.1em 0.5em;
        }
    }
    @media only screen and (max-width: 767px){
        .ui.dropdown .text{
            font-size: 0.8rem;
        }
        .ui.dropdown>.dropdown.icon {
            margin: 0 0 0 0.5em;
        }
    }
    .user-profile-section .profile-details-card .profile-details-card-header {
        margin-bottom: 0px;
        background: #f1f5f6;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        border-bottom: none;
    }
</style>
<div class="col-xl-10 col-md-12 offset-xl-1 mb-4">
    <div class="profile-details-card h-100 py-2">
        <div class="card-body">
                    <?php if ( $stepped ) { ?>
                        <div class="ui fluid top small steps">
                            <div class="step completed">
                                <div class="content ">
                                    <div class="title mb-1 text-completed"><?php echo __("Your Country"); ?></div>
                                </div>
                            </div>
                            <?php foreach ( $individualSections as $section ) { ?>
                                <?php $defaultPlaceholder = __("Your {section_title}", [
                                    'section_title' => mb_strtolower($section["title"]),
                                ]); ?>
                                <div class="step <?php echo $section["class"]; ?>">
                                    <div class="content ">
                                        <div class="title mb-1 text-<?php echo $section["class"]; ?>"><?php echo $section["title"]; ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                            <?php echo $this->Form->create($form, [
                                "autocomplete" => "off",
                                "novalidate",
                                "templates" => [
                                    "inputContainer" => '<div class="field mb-3 {{colClass}}"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconClass}} {{iconPosition}}">{{preIconHtml}}{{content}}{{iconHtml}}</div></div>',
                                    'inputContainerError' => '<div class="field error mb-3 {{colClass}}"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconClass}} {{iconPosition}}">{{preIconHtml}}{{content}}{{iconHtml}}</div>{{error}}</div>',
                                    'error' => '<p class="error mb-0">{{content}}</p>'
                                ],
                                "id" => "profile-form",
                            ]); ?>
                            <?php if ( $currentSection["guarded"] ) { ?>
                                <div class="alert alert-success">
                                    <p class="mb-0"><i class="mdi mdi-shield-account mr-2"></i><?php echo __("Verified Account. You may not be able to modify the verified information."); ?></p>
                                </div>
                            <?php } ?>
                            <div class="row no-gutters">
                                <div class="col-sm-12 d-flex align-items-center">
                                    <div class="card rounded-0 border-0 ui form w-100 profile-details-card bg-transparent">
                                        <div class="ui form loader">
                                            <div class="row no-gutters">
                                                <div class="profile-details-card-header p-3 shadow-sm">
                                                    <?php if ($stepped === false) {?>
                                                        <h4 class=" text-theme font-weight-bold mb-0"><?php echo __("Update {section_title}", [
                                                                'section_title' => $currentSection["title"]
                                                            ]); ?></h4>
                                                    <?php } else { ?>
                                                        <h4 class="mb-0 text-theme font-weight-bold"><?php echo __("{section_title}", [
                                                                'section_title' => $currentSection["title"]
                                                            ]); ?></h4>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="row mx-0 bg-white shadow-sm p-4">
                                                <?php foreach ( (array)$currentSection["properties"] as $row ) { ?>
                                                    <?php foreach ( $row as $property ) { ?>
                                                        <?php if ( in_array($property["type"], ["text", "date"]) ) { ?>
                                                            <?php
                                                            $iconClass = "";
                                                            $iconPosition = "";
                                                            $iconHtml = "";
                                                            if ( $property["type"] === "date" ) {
                                                                $iconClass = "icon";
                                                                $iconPosition = "right";
                                                                $iconHtml = '<i class="icon mdi mdi-calendar"></i>';
                                                            }
                                                            ?>
                                                            <?php echo $this->Form->control($property["property"], [
                                                                "disabled" => in_array($property["property"], $currentSection["guarded"]),
                                                                "type" => "text",
                                                                "label" => false,
                                                                "id" => true,
                                                                "data-toggle" => ( $property["type"] === "date" ? "date" : "" ),
                                                                "data-mask" => $property["mask"],
                                                                "templateVars" => [
                                                                    'colClass' => 'col-lg-6',
                                                                    'labelText' => $property["label"],
                                                                    "labelClass" => ( $property["required"] ? "required form-group-control" : "" ),
                                                                    "iconClass" => $iconClass,
                                                                    "iconPosition" => $iconPosition,
                                                                    "iconHtml" => $iconHtml,
                                                                    "hint" => $this->Hint->build($property["hint"])
                                                                ],
                                                                "default" => ( $property["type"] === "date" ? ( $property["value"] ? (new Date($property["value"]))->format("l d F Y") : "" ) : $property["value"] ),
                                                            ]); ?>
                                                        <?php } ?>
                                                        <?php if ( in_array($property["type"], ["email"]) ) { ?>
                                                            <?php echo $this->Form->control($property["property"], [
                                                                "type" => "email",
                                                                "label" => false,
                                                                "id" => true,
                                                                "data-mask" => $property["mask"],
                                                                "templateVars" => [
                                                                    'labelText' => $property["label"],
                                                                    "labelClass" => ( $property["required"] ? "required form-group-control" : "" ),
                                                                    "hint" => $this->Hint->build($property["hint"])
                                                                ],
                                                                "default" => $property["value"]
                                                            ]); ?>
                                                        <?php } ?>
                                                        <?php if ( in_array($property["type"], ["checkbox"]) ) { ?>
                                                            <?php echo $this->Form->control($property["property"], [
                                                                "type" => "checkbox",
                                                                "label" => true,
                                                                "id" => true,
                                                                "value" => true,
                                                                "templates" => [
                                                                    'inputContainer' => '<div class="ui checkbox">{{content}}</div>',
                                                                    'nestingLabel' => '{{hidden}}{{input}}<label>'.$property["label"].'</label>',
                                                                    'formGroup' => '{{input}}{{label}}',
                                                                ],
                                                                "default" => $property["value"]
                                                            ]); ?>
                                                        <?php } ?>
                                                        <?php if ( in_array($property["type"], ["select"]) ) { ?>
                                                            <?php echo $this->element("semantic_ui_dropdown", [
                                                                "property" => $property,
                                                                "errors" => ( $form->getErrors()[$property["property"]] ?? [] )
                                                            ]); ?>
                                                        <?php } ?>
                                                        <?php if ( in_array($property["type"], ["country", "nationality"]) ) { ?>
                                                            <?php if ( $property["type"] === "country" ) {
                                                                $property["options"] = $countryOptions;
                                                            } else {
                                                                $property["options"] = $nationalityOptions;
                                                            } ?>
                                                            <?php echo $this->element("semantic_ui_dropdown_country", [
                                                                "property" => $property,
                                                                "errors" => ( $form->getErrors()[$property["property"]] ?? [] ),
                                                                "disabled" => in_array($property["property"], $currentSection["guarded"]),
                                                            ]); ?>
                                                        <?php } ?>
                                                        <?php if ( in_array($property["type"], ["boolean"]) ) { ?>
                                                            <?php $property["options"] = $booleanOptions; ?>
                                                            <?php echo $this->element("semantic_ui_dropdown", [
                                                                "property" => $property,
                                                                "errors" => ( $form->getErrors()[$property["property"]] ?? [] ),
                                                                "is_boolean" => true
                                                            ]); ?>
                                                        <?php } ?>
                                                        <?php if ( in_array($property["type"], ["enum"]) ) { ?>
                                                            <?php
                                                            $options = [];
                                                            foreach ( $property["options"] as $id => $title ) {
                                                                $options[] = [
                                                                    "id" => $id,
                                                                    "title" => $title
                                                                ];
                                                            }
                                                            $property["options"] = $options;
                                                            ?>
                                                            <?php echo $this->element("semantic_ui_dropdown", [
                                                                "property" => $property,
                                                                "errors" => ( $form->getErrors()[$property["property"]] ?? [] )
                                                            ]); ?>
                                                        <?php } ?>
                                                        <?php if ( in_array($property["type"], ["contact"]) ) { ?>
                                                            <?php echo $this->element("input_contact", [
                                                                "property" => $property,
                                                                "errors" => ( $form->getErrors()[$property["property"]] ?? [] ),
                                                                "isd_codes" => $isdCodes,
                                                                "default_isd" => $customer->getProperty("country_id")
                                                            ]); ?>
                                                        <?php } ?>
                                                        <?php if ( in_array($property["type"], ["money"]) ) { ?>
                                                            <?php echo $this->element("input_money", [
                                                                "property" => $property,
                                                                "errors" => ( $form->getErrors()[$property["property"]] ?? [] ),
                                                                "currencies" => $currencies
                                                            ]); ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                <div class="mt-2 col-lg-12 justify-content-between d-flex">
                                                    <?php if ( $stepped ) { ?>
                                                        <button onclick="window.location.href = '<?php echo $previousStepUrl; ?>'" class="btn btn-outline-secondary btn-md px-4" type="button"><?php echo __("Back"); ?></button>
                                                        <button class="btn btn-outline-primary btn-md shadow-none px-4" type="submit"><?php echo __("Next"); ?></button>
                                                    <?php } else { ?>
                                                        <button class="btn btn-outline-primary btn-md shadow-none px-4" type="submit"><?php echo __("Save Changes"); ?></button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<?php echo $this->Html->script([
    "/vendors/moment/min/moment.min",
    "/vendors/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker",
    "/vendors/js/jquery.mask.min"
]); ?>
<?php $icuFormatter = str_replace("9", "0", $this->Number->format(999999999999999999, [
    "places" => 2
])); ?>
<script>
    $(function(){
        $('[data-toggle="popover"]').popover({
        });
        $("#profile-form").on("submit", function(){
            $(this).find(".ui.form.loader").eq(0).addClass("loading");
        });
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
        $('.ui.dropdown.currency-dropdown').dropdown({
            clearable: true,
            selectOnKeydown: false,
            forceSelection: false,
            fullTextSearch: "exact",
            match: 'both',
            message: {
                noResults: '<?php echo htmlentities(__("No Results Found."), ENT_QUOTES); ?>'
            },
            onShow: function(){
                $elem = $(this);
                $inputGroup = $elem.parents(".field").eq(0);
                $elem.children(".menu").css("max-width", $inputGroup.width()+'px');
                $elem.children(".menu").css("min-width", $inputGroup.width()+'px');
                $elem.children(".menu").css("width", $inputGroup.width()+'px');
            },
            onChange: function(value, text, choice){
                if ( value ) {
                    $(choice).parents(".menu").eq(0).parents(".menu").eq(0).prev(".text")
                        .html($(choice).attr("data-currency-iso"));
                }
            },
        });
        $.each($('.ui.dropdown.currency-dropdown'), function(item){
            let $currency = $(this).dropdown('get value');
            $(this).dropdown("clear");
            $(this).dropdown("set selected", $currency);
        });
        $('.ui.dropdown.isd-code-dropdown').dropdown({
            clearable: true,
            selectOnKeydown: false,
            forceSelection: false,
            fullTextSearch: "exact",
            match: 'both',
            message: {
                noResults: '<?php echo htmlentities(__("No Results Found."), ENT_QUOTES); ?>'
            },
            onShow: function(){
                $elem = $(this);
                $inputGroup = $elem.parents(".field").eq(0);
                $elem.children(".menu").css("max-width", $inputGroup.width()+'px');
                $elem.children(".menu").css("min-width", $inputGroup.width()+'px');
                $elem.children(".menu").css("width", $inputGroup.width()+'px');
            },
            onChange: function(value, text, choice){
                if ( value ) {
                    $icon = $('<i />')
                        .addClass("flag-icon rounded-circle mr-2 flag-icon-squared")
                        .addClass("flag-icon-"+$(choice).attr("data-country-iso").toLowerCase());
                    $(choice).parents(".menu").eq(0).parents(".menu").eq(0).prev(".text")
                        .html($icon)
                        .append($(choice).attr("data-isd-code"));
                }
            },
        });
        $.each($('.ui.dropdown.isd-code-dropdown'), function(item){
            let $isd = $(this).dropdown('get value');
            $(this).dropdown("clear");
            $(this).dropdown("set selected", $isd);
        });
        $('input[data-toggle="date"]').each(function(){
            let inputName = $(this).attr("name");
            $(this).bootstrapMaterialDatePicker({
                format: 'dddd DD MMMM YYYY',
                time: false,
                maxDate: new Date( inputName === 'date_of_birth' ? '<?php echo (new Date())->modify("-16 years")->format("Y-m-d") ?>' : '<?php echo (new Date())->format("Y-m-d"); ?>' )
            });
        });
        $('.money').mask("<?php echo $icuFormatter; ?>", {reverse: true});
    });
</script>
