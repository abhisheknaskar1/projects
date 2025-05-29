<?php
use App\Form\DocumentForm;
use App\View\AppView;

/**
 * @var AppView $this
 * @var string $maxFileSize
 * @var array $documentType
 * @var array $countries
 * @var DocumentForm $form
 * @var $categories
 * @var array $documentSettings
 */

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;

$errors = $form->getErrors();
?>
<?php $fileMessage = __("Only image or pdf files, \nless than {file_size}", [
    'file_size' => $maxFileSize,
]); ?>
<?php echo $this->Html->css([
    "/vendors/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker",
    "/vendors/iconfonts/material-design-icons/material-icons"
]); ?>
<?php $infoArray = array_filter([
    $documentType["has_document_number"],
    $documentType["has_validity"],
    $documentType["has_issuer"],
    $documentType["has_place_of_issue"],
]);
//dd($categories);
//dd($documentSettings['code']);
?>
<style>
    .ui.selection.dropdown .menu .item, .ui.selection.dropdown .menu .message{
        font-size: 0.85rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .ui.selection.dropdown .text{
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
    .document-container.error {
        border-color: #e0b4b4;
    }
    .document-container.error i{
        color: #9f3a38;
    }
    .document-container.error p.text-dark{
        color: #9f3a38 !important;
    }
</style>
<div class="col-xl-12 col-md-12 mb-4">
    <div class="card shadow-sm border-0 h-100 py-2">
        <div class="card-body px-4">
            <div class="row no-gutters align-items-center">
                <div class="col">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-transfer" role="tabpanel" aria-labelledby="pills-transfer-tab">
                            <div class="row h-100">
                                <div class="col-xl-6 mb-4">
                                    <h3 class="section-heading mb-0 text-theme mb-1 font-weight-bold"><?php echo __("Upload {document_title}", [
                                         'document_title' => $documentType["title"],
                                        ]); ?></h3>
                                    <p class="text-theme f-16"><?php echo __('We may also need the back of the document. If there is information on both sides, please make sure you upload both for us.')?></p>
                                    <div id="postErrors"><?php echo $this->Flash->render(); ?></div>
                                    <div id="ajaxMessages" class="ui message tiny negative d-none">
                                        <div class="header"><?php echo __("Document upload failed") ?></div>
                                        <ul class="list">
                                        </ul>
                                    </div>
                                    <?php echo $this->Form->create($form, [
                                        "templates" => [
                                            "inputContainer" => '<div class="field mb-3"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconClass}} {{iconPosition}}">{{preIconHtml}}{{content}}{{iconHtml}}</div></div>',
                                            'inputContainerError' => '<div class="field mb-3 error"><label class="{{labelClass}}"><span class="float-right">{{hint}}</span>{{labelText}}</label><div class="ui input {{iconClass}} {{iconPosition}}">{{preIconHtml}}{{content}}{{iconHtml}}</div></div>',
                                            'error' => '<p class="error ">{{content}}</p>'
                                        ],
                                        "id" => "upload-form",
                                        "autocomplete" => "off"
                                    ]); ?>
                                    <?php echo $this->Form->hidden("frontface", [
                                        "id" => true
                                    ]);
                                    echo $this->Form->hidden("backface", [
                                        "id" => true
                                    ]);
                                    $this->Form->unlockField("frontface");
                                    $this->Form->unlockField("backface");
                                    if ($this->getRequest()->getQuery('customer_card_usage_id')) {
                                        echo $this->Form->hidden('customer_card_usage_id', [
                                            'default' => $this->getRequest()->getQuery('customer_card_usage_id'),
                                        ]);
                                    }
                                    ?>
                                    <div class="ui form">
                                        <div class="row mt-4">
                                            <div class="col-sm-6 d-flex align-items-stretch">
                                                <div class="shadow-sm border-0 bg-white rounded-0 mb-4 document-container w-100 position-relative <?php echo ($errors["frontface"] ?? null) ? "error" : ""; ?>">
                                                    <div style="bottom: 0px;" class="position-absolute w-100 d-none change-image-btn">
                                                        <a class="ui button fluid rounded-0" href="javascript:;"><i class="mdi mdi-camera mr-2"></i><?php echo __("Change"); ?></a>
                                                    </div>
                                                    <img class="img-fluid card-img d-none" />
                                                    <div class="card-body pt-4 pb-4 text-center ui loader">
                                                        <div class="d-none document-placeholder">
                                                            <div class="ui placeholder">
                                                                <div class="image header">
                                                                    <div class="line"></div>
                                                                    <div class="line"></div>
                                                                </div>
                                                                <div class="paragraph">
                                                                    <div class="full line"></div>
                                                                    <div class="full line"></div>
                                                                    <div class="medium line"></div>
                                                                </div>
                                                                <div class="paragraph">
                                                                    <div class="full line"></div>
                                                                    <div class="full line"></div>
                                                                    <div class="medium line"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="file-container">
                                                            <h1><img src="<?php echo $this->Url->build('/')?>assets/img/doc.svg"></h1>
                                                            <p style="font-weight: 500" class=" text-dark mb-1"><?php echo __("Document Front") ?></p>
                                                            <label for="documentFrontFile"
                                                                   class="btn btn-outline-primary btn-sm position-relative"><?php echo __("Browse"); ?><input
                                                                    type="file" style="width:1px; height:1px;"
                                                                    class="invisible position-absolute" id="documentFrontFile"/></label>
                                                            <p class=" text-dark my-1 f-12"><?php echo nl2br($fileMessage); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="progress rounded-0 d-none w-100" style="height: 5px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 d-flex align-items-stretch">
                                                <div class="shadow-sm border-0 bg-white rounded-0 mb-4 document-container w-100 position-relative  <?php echo ($errors["backface"] ?? null) ? "error" : ""; ?>">
                                                    <div style="bottom: 0px;" class="position-absolute w-100 d-none change-image-btn">
                                                        <a class="ui button fluid rounded-0" href="javascript:;"><i class="mdi mdi-camera mr-2"></i><?php echo __("Change"); ?></a>
                                                    </div>
                                                    <img class="img-fluid card-img d-none" />
                                                    <div class="card-body pt-4 pb-4 text-center ui loader">
                                                        <div class="d-none document-placeholder">
                                                            <div class="ui placeholder">
                                                                <div class="image header">
                                                                    <div class="line"></div>
                                                                    <div class="line"></div>
                                                                </div>
                                                                <div class="paragraph">
                                                                    <div class="full line"></div>
                                                                    <div class="full line"></div>
                                                                    <div class="medium line"></div>
                                                                </div>
                                                                <div class="paragraph">
                                                                    <div class="full line"></div>
                                                                    <div class="full line"></div>
                                                                    <div class="medium line"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="file-container">
                                                            <h1><img src="<?php echo $this->Url->build('/')?>assets/img/doc.svg"></h1>
                                                            <p style="font-weight: 500" class=" text-dark mb-1"><?php echo __("Document Back") ?></p>
                                                            <label for="documentBackFile"
                                                                   class="btn btn-outline-primary btn-sm position-relative"><?php echo __("Browse"); ?><input
                                                                    type="file" style="width:1px; height:1px;"
                                                                    class="invisible position-absolute" id="documentBackFile"/></label>
                                                            <p class=" text-dark my-1 f-12"><?php echo nl2br($fileMessage); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="progress rounded-0 d-none w-100" style="height: 5px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ( empty($infoArray) === false ) { ?>
                                            <div class="mb-4">
                                                <div class="">
                                                    <?php if ( $documentType["has_place_of_issue"] === true ) { ?>
                                                        <?php $options = []; foreach ( $countries as $country ) {
                                                            array_push($options, [
                                                                "id" => $country["id"],
                                                                "title" => $country["known_name"],
                                                                "code" => $country["iso_code_alpha2"]
                                                            ]);
                                                        } ?>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <?php echo $this->element("element_file_upload_country_dropdown", [
                                                                    "property" => [
                                                                        "property" => "issuing_country_id",
                                                                        "label" => __("Country of Issue"),
                                                                        "required" => false,
                                                                        "hint" => null,
                                                                        "value" => null,
                                                                        "options" => $options
                                                                    ],
                                                                    "errors" => ($form->getErrors()["issuing_country_id"] ?? null)
                                                                ]); ?>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <?php echo $this->Form->control("place_of_issue", [
                                                                    "type" => "text",
                                                                    "label" => false,
                                                                    "id" => true,
                                                                    "templateVars" => [
                                                                        'labelText' => __("Place of Issue"),
                                                                    ]
                                                                ]); ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if ( $documentType["has_document_number"] === true ) {
                                                        if ($documentSettings['code'] === 'POI') {
                                                            $documentNumberInput = $this->Form->control("document_number", [
                                                                "type" => "text",
                                                                "required" => true,
                                                                "label" => false,
                                                                "id" => true,
                                                                "templateVars" => [
                                                                    'labelText' => __("{document_title} No.", [
                                                                        'document_title' => $documentType["title"],
                                                                    ]),
                                                                    "labelClass" => "required",
                                                                ]
                                                            ]);
                                                        } else { ?>
                                                        <?php $documentNumberInput =  $this->Form->control("document_number", [
                                                            "type" => "text",
                                                            "required" => false,
                                                            "label" => false,
                                                            "id" => true,
                                                            "templateVars" => [
                                                                'labelText' => __("{document_title} No.", [
                                                                    'document_title' => $documentType["title"],
                                                                ]),
                                                            ]
                                                        ]); ?>
                                                    <?php }
                                                    }?>
                                                    <?php if ( $documentType["has_issuer"] === true ) { ?>
                                                        <?php $documentIssuerInput = $this->Form->control("issuer", [
                                                            "type" => "text",
                                                            "required" => false,
                                                            "label" => false,
                                                            "id" => true,
                                                            "templateVars" => [
                                                                'labelText' => __("Issuer"),
                                                            ]
                                                        ]); ?>
                                                    <?php } ?>
                                                    <?php if ( $documentType["has_validity"] === true  || $documentSettings['code'] === 'POI') { ?>
                                                        <?php $validFromInput =  $this->Form->control("valid_from", [
                                                            "type" => "text",
                                                            "required" => false,
                                                            "label" => false,
                                                            "id" => true,
                                                            "templateVars" => [
                                                                'iconClass' => 'icon',
                                                                'iconHtml' => '<i class="mdi mdi-calendar-month icon"></i>',
                                                                'labelText' => __("Date of Issue"),
                                                            ]
                                                        ]);
                                                        if ($documentSettings['code'] === 'POI') {
                                                            $validThroughInput = $this->Form->control("valid_through", [
                                                                "type" => "text",
                                                                "required" => true,
                                                                "label" => false,
                                                                "id" => true,
                                                                "templateVars" => [
                                                                    'iconClass' => 'icon',
                                                                    'iconHtml' => '<i class="mdi mdi-calendar-month icon"></i>',
                                                                    'labelText' => __("Expiry Date"),
                                                                    "labelClass" => "required",
                                                                ]
                                                            ]);
                                                        } else {?>
                                                        <?php $validThroughInput = $this->Form->control("valid_through", [
                                                            "type" => "text",
                                                            "required" => false,
                                                            "label" => false,
                                                            "id" => true,
                                                            "templateVars" => [
                                                                'iconClass' => 'icon',
                                                                'iconHtml' => '<i class="mdi mdi-calendar-month icon"></i>',
                                                                'labelText' => __("Expiry Date"),
                                                            ]
                                                        ]); ?>
                                                    <?php }
                                                    }?>
                                                    <div class="row">
                                                        <?php $inputArray = array_values(array_filter([
                                                            ( $documentNumberInput ?? NULL ),
                                                            ( $documentIssuerInput ?? NULL ),
                                                            ( $validFromInput ?? NULL ),
                                                            ( $validThroughInput ?? NULL )
                                                        ])); ?>
                                                        <?php $noOfInputs = count($inputArray); $colSize = 12 / ($noOfInputs == 0 ? 1 : $noOfInputs); ?>
                                                        <?php for ( $i = 0; $i < $noOfInputs; $i++ ) { ?>
                                                            <div class="col-sm-<?php echo $noOfInputs === 1 ? 12 : 6; ?>"><?php echo $inputArray[$i]; ?></div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="row justify-content-between">
                                            <div class="px-3"><a href="<?php echo $this->Url->build([
                                                    "action" => "uploadDocument",
                                                    "_base" => $locale,
                                                    $this->getRequest()->getQuery("category"),
                                                ]); ?>" type="submit" class="btn shadow-none btn-outline-dark"><?php echo __("Back"); ?></a></div>
                                            <div class="px-3"><button type="submit" class="btn btn-success shadow-none"><?php echo __("Verify"); ?></button></div>
                                        </div>
                                    </div>
                                    <?php echo $this->Form->end(); ?>
                                </div>
                                <div class="col-xl-5 offset-xl-1 mb-4">
                                    <?php
                                    switch ($documentSettings['code'])
                                    {
                                        case 'POI': ?>
                                        <h4 class="text-theme font-weight-bold"><?php echo __('Guidelines')?></h4>
                                        <p class="text-theme f-16"><?php echo __('This is for us to identify you as the sender.')?></p>
                                        <div class="my-4">
                                            <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Please ensure you are in a well lit environment')?></p>
                                            <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Upload a clear photograph of the ID.')?></p>
                                            <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('For Drivers License and National ID Card upload, please provide the front and back of the ID.')?></p>
                                            <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('For Passport upload, please provide the full data page and front cover page')?></p>
                                            <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('All corners of the document should be visible, avoid cropping the picture')?></p>
                                        </div>
                                        <div class="my-4">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div>
                                                        <img src="<?php echo $this->Url->build('/')?>assets/img/guide_one.png" class="img-fluid">
                                                    </div>
                                                    <span><span><small><?php echo __('bright and clear, easy to
                                                    read')?></small></span></span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div>
                                                        <img src="<?php echo $this->Url->build('/')?>assets/img/guide_two.png" class="img-fluid">
                                                    </div>
                                                    <span><span><small><?php echo __('all corners of the document
                                                    should be visible')?></small></span></span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div>
                                                        <img src="<?php echo $this->Url->build('/')?>assets/img/guide_three.png" class="img-fluid">
                                                    </div>
                                                    <span><span><small><?php echo __('document should occupy
                                                    the majority of the picture')?></small></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                        case 'POA': ?>
                                        <h4 class="text-theme font-weight-bold"><?php echo __('Guidelines')?></h4>
                                        <p class="text-theme f-16"><?php echo __('This is required to verify sender’s address')?></p>
                                        <div class="my-4">
                                            <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Please ensure you are in a well lit environment')?></p>
                                            <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Upload a clear photograph of the utility bill ensuring it shows your accurate name & full address.')?></p>
                                            <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('All corners of the document should be visible')?></p>
                                            <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Must be a recent document not exceeding 3 months prior to the point of registration')?></p>
                                            <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('In case of Driver’s License, Upload a clear photograph of the Front & Back sides of your Driver’s License')?></p>
                                        </div>
                                        <p class="text-theme f-16"><?php echo __('<b>NOTE - If a particular document is used for Proof of Identity, the same document cannot be used as Proof of address document.</b>')?></p>
                                        <div class="my-4">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div>
                                                        <img src="<?php echo $this->Url->build('/')?>assets/img/guide_one.png" class="img-fluid">
                                                    </div>
                                                    <span><span><small><?php echo __('bright and clear, easy to
                                                            read')?></small></span></span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div>
                                                        <img src="<?php echo $this->Url->build('/')?>assets/img/guide_two.png" class="img-fluid">
                                                    </div>
                                                    <span><span><small><?php echo __('all corners of the document
                                                            should be visible')?></small></span></span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div>
                                                        <img src="<?php echo $this->Url->build('/')?>assets/img/guide_three.png" class="img-fluid">
                                                    </div>
                                                    <span><span><small><?php echo __('document should occupy
                                                            the majority of the picture')?></small></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                        case 'SOF':
                                            switch ($documentType['code'])
                                            {
                                                case 'BANK_STATEMENT': ?>
                                                <h4 class="text-theme font-weight-bold"><?php echo __('Guidelines')?></h4>
                                                <p class="text-theme f-16"><?php echo __('This is to verify the sender\'s Proof of Funds.')?></p>
                                                <div class="my-4">
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Please ensure you’re in a lit environment')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Kindly upload your Bank Account Statement/Slip')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('All corners of the document should be visible')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Must be a recent statement not exceeding 3 months prior to the point of registration')?></p>
                                                </div>
                                                <div class="my-4">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <img src="<?php echo $this->Url->build('/')?>assets/img/guide_one.png" class="img-fluid">
                                                            </div>
                                                            <span><span><small><?php echo __('bright and clear, easy to
                                                                    read')?></small></span></span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <img src="<?php echo $this->Url->build('/')?>assets/img/guide_two.png" class="img-fluid">
                                                            </div>
                                                            <span><span><small><?php echo __('all corners of the document
                                                                    should be visible')?></small></span></span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <img src="<?php echo $this->Url->build('/')?>assets/img/guide_three.png" class="img-fluid">
                                                            </div>
                                                            <span><span><small><?php echo __('document should occupy
                                                                    the majority of the picture')?></small></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-theme f-16"><?php echo __('<b>Authorization Letter Guidelines:</b>')?></p>
                                                <div class="my-4">
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-angle-right f-12 mr-2"></span> <?php echo __('Please ensure you’re in a lit environment')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-angle-right f-12 mr-2"></span> <?php echo __('Kindly upload your government issued Authorization Letter to verify your proof of funds')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-angle-right f-12 mr-2"></span> <?php echo __('All corners of the document should be visible')?></p>
                                                </div>
                                                <?php
                                                break;
                                                case 'INCOME_TAX_RETURN': ?>
                                                <h4 class="text-theme font-weight-bold"><?php echo __('Guidelines')?></h4>
                                                <p class="text-theme f-16"><?php echo __('This is to verify the sender\'s Proof of Funds.')?></p>
                                                <div class="my-4">
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Please ensure you’re in a lit environment')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Kindly upload your income tax return statement to verify your proof of funds')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('All corners of the document should be visible')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Must not exceed three months prior to the point of registration')?></p>
                                                </div>
                                                <div class="my-4">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <img src="<?php echo $this->Url->build('/')?>assets/img/guide_one.png" class="img-fluid">
                                                            </div>
                                                            <span><span><small><?php echo __('bright and clear, easy to
                                                    read')?></small></span></span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <img src="<?php echo $this->Url->build('/')?>assets/img/guide_two.png" class="img-fluid">
                                                            </div>
                                                            <span><span><small><?php echo __('all corners of the document
                                                    should be visible')?></small></span></span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <img src="<?php echo $this->Url->build('/')?>assets/img/guide_three.png" class="img-fluid">
                                                            </div>
                                                            <span><span><small><?php echo __('document should occupy
                                                    the majority of the picture')?></small></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-theme f-16"><?php echo __('<b>Authorization Letter Guidelines:</b>')?></p>
                                                <div class="my-4">
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-angle-right f-12 mr-2"></span> <?php echo __('Please ensure you’re in a lit environment')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-angle-right f-12 mr-2"></span> <?php echo __('Kindly upload your government issued Authorization Letter to verify your proof of funds')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-angle-right f-12 mr-2"></span> <?php echo __('All corners of the document should be visible')?></p>
                                                </div>
                                                <?php
                                                break;
                                                case 'INC_DOCUMENT': ?>
                                                <h4 class="text-theme font-weight-bold"><?php echo __('Guidelines')?></h4>
                                                <p class="text-theme f-16"><?php echo __('This is to verify the sender\'s Proof of Funds.')?></p>
                                                <div class="my-4">
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Please ensure you’re in a lit environment')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Kindly upload your government issued incorporation document/business registration license')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('All corners of the document should be visible')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-check-circle f-12 mr-2 text-success"></span> <?php echo __('Must not be an expired license')?></p>
                                                </div>
                                                <div class="my-4">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <img src="<?php echo $this->Url->build('/')?>assets/img/guide_one.png" class="img-fluid">
                                                            </div>
                                                            <span><span><small><?php echo __('bright and clear, easy to
                                                    read')?></small></span></span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <img src="<?php echo $this->Url->build('/')?>assets/img/guide_two.png" class="img-fluid">
                                                            </div>
                                                            <span><span><small><?php echo __('all corners of the document
                                                    should be visible')?></small></span></span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div>
                                                                <img src="<?php echo $this->Url->build('/')?>assets/img/guide_three.png" class="img-fluid">
                                                            </div>
                                                            <span><span><small><?php echo __('document should occupy
                                                    the majority of the picture')?></small></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-theme f-16"><?php echo __('<b>Authorization Letter Guidelines:</b>')?></p>
                                                <div class="my-4">
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-angle-right f-12 mr-2"></span> <?php echo __('Please ensure you’re in a lit environment')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-angle-right f-12 mr-2"></span> <?php echo __('Kindly upload your government issued Authorization Letter to verify your proof of funds')?></p>
                                                    <p class="text-theme f-16 mb-1"><span class="fa fa-angle-right f-12 mr-2"></span> <?php echo __('All corners of the document should be visible')?></p>
                                                </div>
                                                <?php
                                                break;
                                            }
                                        break;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script([
    "/vendors/moment/min/moment.min",
    "/vendors/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker",
]); ?>
<script type="text/javascript">
    function uploadFile(documentFace, file, successCallback, progressCallback, errorCallback, completionCallback) {
        let uploadUri = '<?php echo $this->Url->build([
            "action" => "uploadRawFile",
            "_base" => $locale,
        ]); ?>?face='+encodeURIComponent(documentFace);
        let formData = new FormData();
        formData.append("file", file);
        $.ajax({
            accepts: {
                text: "application/json"
            },
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: formData,
            url: uploadUri,
            headers: {
                'X-CSRF-Token': '<?php echo $this->getRequest()->getParam("_csrfToken"); ?>',
            },
            success: function (response) {
                successCallback(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                errorCallback(jqXHR);
            },
            complete: function (jqXHR, textStatus) {
            },
            xhr: function () {
                let xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        let percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        progressCallback(percentComplete);
                    }
                }, false);
                return xhr;
            },
        });
    }

    function resetDocumentContainer( $container ) {
        $container.find('input[type="file]').val("");
        $container.find(".card-body").removeClass("d-none");
        $container.find(".change-image-btn").eq(0).addClass("d-none");
        $container.find("img").eq(0).addClass("d-none");
        $container.find(".file-container").removeClass("d-none");
        $container.find(".ui.loader").removeClass("loading");
        $container.find('input[type="file"]').eq(0).val("");
        $container.find(".document-placeholder").addClass("d-none");
        $container.find(".progress").addClass("d-none");
        $container.find(".progress").eq(0).find(".progress-bar").eq(0)
            .attr("aria-valuenow", 0)
            .css("width", "0%")
            .addClass("progress-bar-animated")
            .addClass("progress-bar-striped")
            .removeClass("bg-success");
    }

    $(function () {
        $("#upload-form").submit(function(){
            $(this).find(".ui.form").addClass("loading");
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
        $("#valid-from").bootstrapMaterialDatePicker({
            format: 'DD MMMM YYYY',
            time: false,
            maxDate: (new Date())
        });
        $('#valid-through').bootstrapMaterialDatePicker({
            format: 'DD MMMM YYYY',
            time: false,
            minDate: (new Date())
        });
        $(".change-image-btn>a").on("click", function(e){
            let $documentContainer = $(this).parents(".document-container").eq(0);
            resetDocumentContainer($documentContainer);
        });
        $("#documentFrontFile, #documentBackFile").on("change", function (e) {
            let submitButton = $(this).parents("form").eq(0).find('button[type="submit"]').eq(0);
            submitButton.attr("disabled", "disabled").addClass("disabled");
            let documentFace = $(e.target).attr("id") === "documentFrontFile" ? "front" : "back";
            let file = this.files.length > 0 ? this.files[0] : null;
            if (file) {
                if (file.size > 8388608) {
                    $("#ajaxMessages").removeClass("d-none");
                    let errorContainer = $("#ajaxMessages").find("ul.list").eq(0);
                    errorContainer.html("");
                    errorContainer.append($("<li />").text("<?php echo __('Selected file is too big. Upload a file less than 8MB'); ?>"));
                    return false;
                }
                $("#postErrors").html("");
                let $documentContainer = $(this).parents(".document-container").eq(0);
                $documentContainer.removeClass("error");
                let $container = $(this).parents(".file-container").eq(0);
                let $placeholder = $container.siblings().filter(".document-placeholder").eq(0);
                let $progress = $documentContainer.find(".progress").eq(0);
                $progress.removeClass("d-none");
                let $progressBar = $progress.find(".progress-bar").eq(0);
                $documentContainer.find(".ui.loader").addClass("loading");
                uploadFile(documentFace, file, function ( response ) {
                        submitButton.removeAttr("disabled").removeClass("disabled");
                        $documentContainer.find("img").eq(0).removeClass("d-none");
                        if ( documentFace === "front" ) {
                            $("#frontface").val(response.pages[0].id);
                            $documentContainer.find("img").get(0).src = response.pages[0].data_uri;
                        } else {
                            $("#backface").val(response.pages[0].id);
                            $documentContainer.find("img").get(0).src = response.pages[0].data_uri;
                        }
                        $placeholder.addClass("d-none");
                        $documentContainer.find(".card-body").eq(0).addClass("d-none");
                        $documentContainer.find(".change-image-btn").eq(0).removeClass("d-none");
                        if ( documentFace === "front" && response.pages.length > 1 ) {
                            if ( $("#documentBackFile").val() === '' ) {
                                let $backContainer = $("#documentBackFile").parents(".document-container").eq(0);
                                $("#backface").val(response.pages[response.pages.length-1].id);
                                $backContainer.find("img").eq(0).removeClass("d-none");
                                $backContainer.find("img").get(0).src = response.pages[response.pages.length-1].data_uri;
                                $backContainer.siblings().filter(".document-placeholder").eq(0).addClass("d-none");
                                $backContainer.find(".card-body").eq(0).addClass("d-none");
                                $backContainer.find(".change-image-btn").eq(0).removeClass("d-none");
                            }
                        }
                    }, function ( progress ) {
                        $progressBar
                            .attr("aria-valuenow", progress)
                            .css("width", progress+"%");
                        if ( progress === 100 ) {
                            $documentContainer.find(".ui.loader").removeClass("loading");
                            $placeholder.removeClass("d-none");
                            $container.addClass("d-none");
                            $progress.addClass("d-none");
                        }
                    },
                    function ( jqXHR ) {
                        resetDocumentContainer($documentContainer);
                        if ( jqXHR.status === 413 ) {
                            $("#ajaxMessages").removeClass("d-none");
                            let errorContainer = $("#ajaxMessages").find("ul.list").eq(0);
                            errorContainer.html("");
                            errorContainer.append($("<li />").text("<?php echo __('Uploaded file was too big.'); ?>"));
                        } else if ( jqXHR.status === 400 ) {
                            const fileErrors = jQuery.parseJSON(jqXHR.responseText);
                            if ( typeof fileErrors.file !== "undefined" ) {
                                $("#ajaxMessages").removeClass("d-none");
                                let errorContainer = $("#ajaxMessages").find("ul.list").eq(0);
                                errorContainer.html("");
                                $.each(fileErrors.file, function(k,v) {
                                    errorContainer.append($("<li />").text(v));
                                });
                            }
                        } else if ( jqXHR.status === 404 ) {
                            alert("Connection to socket (ftp.sarafirani.com) failed.");
                        }
                        $progress.addClass("d-none");
                    },
                    function () {
                    });
            } else {

            }
        });
    })
</script>
