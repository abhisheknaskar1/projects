<?php
/**
 * @var \App\View\AppView $this
 * @var array $documentSettings
 */

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<?php $documentTypes = collection($documentSettings["documents"]); ?>
<style media="screen">
    .troubleshoot-list li {
        margin-bottom: 10px;
        text-align: justify;
    }
</style>
<?php echo $this->Flash->render(); ?>
<div class="col-xl-10 col-md-12 mb-4">
    <div class="p-3 py-2 mb-0 border-0 rounded-top d-flex align-items-center justify-content-between w-100">
        <h6 class="text-orange font-weight-normal mb-0 flex-column"><?php echo __('Account Verification')?> &raquo; <?php echo __("Upload {document_title}", [
            'document_title' => $documentSettings["title"],
        ]); ?></h6>
    </div>
    <div class="h-100">
        <div class="card-body px-4">
            <div class="row no-gutters justify-content-between align-items-center">
                <div class="d-block">
                    <p class="text-theme f-14 text-muted mb-3"><?php echo __('To comply with financial regulations, we are required to verify your identity.')?></p>
                </div>
            </div>
            <div class="row h-100">
                <?php foreach ( $documentTypes as $documentType ) { ?>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card py-4 w-100 text-center mb-3">
                            <div>
                                <h1 class="text-orange"><i class="mdi document-icon document-icon-<?php echo strtolower($documentType["code"]); ?>"></i></h1>
                            </div>
                            <div class="d-block w-100">
                                <h5 class="text-orange mb-3"><span><?php echo $documentType["title"]; ?></span></h5>
                            </div>
                            <div>
                                <a href="<?php echo $this->Url->build([
                                    "action" => "fileUpload",
                                    $documentType["id"],
                                    "category" => $documentSettings["id"],
                                    "customer_card_usage_id" => $this->getRequest()->getQuery('customer_card_usage_id'),
                                ]) ?>" class="btn btn-primary text-white shadow-none btn-sm"><?php echo __("Upload"); ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="f-14 text-muted"><?php echo __('Your photo ID and actions recorded during the verification process may be considered biometric data. For details on how we store and use this information, please refer to our Privacy Policy. Select your ID type to continue.')?></p>
                </div>
            </div>
        </div>
    </div>
</div>
