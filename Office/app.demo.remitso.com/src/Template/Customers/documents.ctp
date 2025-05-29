<?php
use App\View\AppView;
use App\WebService\Customer;
use Cake\I18n\Time;

/**
 * @var AppView $this
 * @var Customer $customer
 */
$data = $customer->getData();
$documents = collection((array)$data["documents"])->match([
    "category.is_business_category" => false,
])->filter(function (array $document) {
    return (bool)($document['category']['is_public_visible'] ?? true);
});

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<div class="col-xl-12 col-md-12 mb-4">
    <div class="p-3 py-2 mb-0 border-0 rounded-top d-flex align-items-center justify-content-between w-100">
        <h6 class="text-orange font-weight-normal mb-0 flex-column"><?php echo __('Account Verification')?></h6>
    </div>
    <div class="h-100">
        <div class="card-body px-md-4">
            <div class="row h-100 flex-row">
                <?php // pr($documents->toArray()) ?>
                <?php foreach ($documents as $document) { ?>
                    <div class="col-md-6 col-lg-4 flex-column align-items-stretch">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="text-orange"><?php echo $document['category']['title'] ?></h6>
                                <?php if ($document['status'] === "pending") { ?>
                                    <p><?php echo __('Document not uploaded'); ?></p>
                                    <a href="<?php echo $this->Url->build([
                                        "action" => "uploadDocument",
                                        $document['category']["id"]
                                    ]); ?>">Upload <?php echo $document['category']['title'] ?></a>
                                <?php } else { ?>
                                    <p><?php echo $document['document_type']['title'] ?></p>
                                    <?php if ($document['status'] === "rejected") { ?>
                                        <h6 class="text-danger"><?php echo __('Document Rejected') ?></h6>
                                        <p class="text-danger"><?php echo $document['reason'] ?></p>
                                        <a href="<?php echo $this->Url->build([
                                            "action" => "uploadDocument",
                                            $document['category']["id"]
                                        ]); ?>">Upload <?php echo $document['category']['title'] ?></a>
                                    <?php } ?>
                                    <?php if ($document['status'] === "processing") { ?>
                                        <h6 class="text-purple"><?php echo __('Verifying...') ?></h6>
                                        <p class="text-purple"><?php echo __('Your uploaded document is being verified by our operators.') ?></p>
                                    <?php } ?>
                                    <?php if ($document['status'] === "approved") { ?>
                                        <h6 class="text-success"><?php echo __('Accepted') ?></h6>
                                        <p class="text-success"><?php echo __('Your uploaded document has been accepted.') ?></p>
                                    <?php } ?>
                                    <?php if ($document['status'] === "expired") { ?>
                                        <h6 class="text-danger"><?php echo __('Expired') ?></h6>
                                        <p class="text-danger"><?php echo __('Your uploaded document has been expired.') ?></p>
                                        <a href="<?php echo $this->Url->build([
                                            "action" => "uploadDocument",
                                            $document['category']["id"]
                                        ]); ?>">Upload <?php echo $document['category']['title'] ?></a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
