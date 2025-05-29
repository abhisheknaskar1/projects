<?php

use App\View\AppView;
use Cake\I18n\Time;

/**
 * @var array $recipient
 * @var \Cake\Collection\CollectionInterface $orders
 */
echo $this->Html->css([
    "/vendors/semantic-ui/components/header.min",
    "/vendors/semantic-ui/components/icon.min",
]);
use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<style>
    .recipient-property {
        margin-bottom: 1.2rem;
    }
    .recipient-property label {
        font-size: 0.88rem;
        font-weight: bold;
        letter-spacing: 0.05rem;
        margin-bottom: 0px;
        line-height: 1;
    }
    .recipient-property p {
        font-size: 0.85rem !important;
        letter-spacing: 0.05rem;
        margin-bottom: 15px;
    }
    .order-actions a {
        font-size: 0.87rem;
        letter-spacing: 0.05rem;
    }
    .order-actions a:hover {
        text-decoration: none;
    }
    .order-actions a {
        font-size: 0.85rem;
        letter-spacing: 0.05rem;
    }
    .order-actions a:hover {
        text-decoration: none;
    }
</style>
<div class="col-xl-12 mb-4">
    <div class="p-3 py-2 mb-0 border-0 rounded-top">
        <h6 class="text-orange font-weight-normal mb-0"><?php echo $recipient["full_name"]; ?></h6>
    </div>
    <div class="h-100">
        <div class="px-3 mb-4">
            <div class="row no-gutters mb-4">
                <div class="profile-details-card-header dash-recipient-view-header pb-3 float-left">
                    <div class="mb-4">
                        <p class="mb-0 text-white"><?php echo __("{payout_method} in {country}", [
                            "payout_method" => $recipient["delivery_method"]["title"],
                            "country" => $recipient["country"]["known_name"]
                        ]); ?></p>
                    </div>
                    <div>
                        <a href="<?php echo $this->Url->build([
                            "action" => "send",
                            $recipient['id'],
                        ]); ?>" class="btn btn-primary text-white">
                            <span><i class="mdi mdi-send-circle-outline"></i></span> <span class="d-md-inline d-lg-inline d-xl-inline"><?php echo __("Send Money") ?></span>
                        </a>
                        <a href="<?php echo $this->Url->build([
                            "action" => "edit",
                            $recipient['id'],
                        ]) ?>" class="btn btn-primary text-white">
                            <span><i class="mdi mdi-pencil"></i></span> <span class="d-md-inline d-lg-inline d-xl-inline"><?php echo __("Edit") ?></span>
                        </a>
                        <a href="#deleteModal" data-toggle="modal" class="btn btn-primary text-white">
                            <span><i class="mdi mdi-trash-can-outline"></i></span> <span class="d-md-inline d-lg-inline d-xl-inline"><?php echo __("Delete") ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no-gutters align-items-center">
                <div class="col-6">
                    <div class="card card-body border-0 bg-indigo">
                        <ul class="list-unstyled">
                            <li class=" d-flex justify-content-between border-0 py-3"><span class="text-orange"><?php echo __("Recipient Type"); ?></span><span class="text-white"><?php echo $recipient["recipient_type_text"]; ?></span></li>
                            <?php foreach ( $recipient["labels"] as $field => $label ) { ?>
                                <li class=" d-flex justify-content-between border-0 py-3"><span class="text-orange"><?php echo $label; ?></span><span class="text-white"><?php echo $recipient["nice_values"][$field] ?? $recipient[$field] ?? null; ?></span></li>
                            <?php } ?>
                            <li class=" d-flex justify-content-between border-0 py-3"><span class="text-orange"><?php echo __("Relation"); ?></span><span class="text-white"><?php echo $recipient["relationship"]["title"]; ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element("confirmation_modal", [
    "id" => "deleteModal",
    "url" => [
        "action" => "delete",
        $recipient["id"]
    ],
    "content" => __("Are you sure, you want to delete this recipient?")
]); ?>
