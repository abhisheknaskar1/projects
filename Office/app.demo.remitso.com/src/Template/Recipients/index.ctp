<?php

use App\View\AppView;
use Cake\Collection\CollectionInterface;

/**
 * @var AppView $this
 * @var CollectionInterface $recipients
 */
echo $this->Html->css([
    "/vendors/semantic-ui/components/menu.min",
    "/vendors/semantic-ui/components/header.min",
]);
use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<style>
    .text-no-result {
        color: #ced4da;
    }
    .text-no-result h1 {
        font-size: 3.5rem;
    }
    .recipient-link:hover {
        text-decoration: none;
    }
    .recipient-name {
        font-size: 1.2rem;
        font-weight: 500;
        letter-spacing: 0.02rem;
        color: #14406e;
    }
    .recipient-text {
        font-size: 0.85rem;
        letter-spacing: 0.02rem;
    }
    .recipient-text-small {
        font-size: 0.70rem;
        letter-spacing: 0.02rem;
    }
    .recipient-avatar {
        padding-top: 0;
        background-color: transparent;
        color: #ff6327;
        border: solid 2px #ff6327;
        font-size: 1.4rem;
        transition: 0.3s;
    }
    .recipient-card {
        background: #fff;
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        border-radius: 4px;
        transition: 0.3s;
    }
    .recipient-card:hover, .recipient-card.active
    {
        background: #281049;
        color: #fffffc;
    }
    .recipient-card:hover .recipient-avatar, .recipient-card.active .recipient-avatar
    {
        background: #ff6327;
        border: 2px solid #ff6327;
        color: #fffffc;
    }
    .recipient-card:hover .recipient-name, .recipient-card.active .recipient-name
    {
        color: #fff;
    }
    .recipient-card:hover .text-muted, .recipient-card.active .text-muted
    {
        color: #fff !important;
    }
    .recipient-container:hover p.text-muted,.recipient-container.active p.text-muted {
        color: #223b55 !important;
    }
    .recipient-send-money {
        font-size: 0.85rem;
        letter-spacing: 0.02rem;
    }
    .recipient-border-bottom {
        border: none !important;
        border-bottom: 1px solid #ccdbe8 !important;
    }
    input.query {
        /*font-size: 0.90rem !important;*/
        /*font-weight: 600 !important;*/
        letter-spacing: 0.05rem !important;
    }
    .headingLine {
        width: 80px;
        height: 3px;
        background: #E51F28; }
    .ui.segment {
        border-radius: 0.38571429rem;
    }
    .pagination {
        background: transparent !important;
    }
    .ui.pagination.menu .active.item {
        background-color: rgb(85 105 147 / 20%) !important;
    }
    @media only screen and (max-width: 767px){
        .sidebar .nav-item .nav-link
        {
            padding: 1rem 0.5rem;
        }
    }
</style>
<div class="col-xl-12 col-md-12 mb-4">
    <div class="p-3 py-2 mb-0 border-0 rounded-top d-flex justify-content-between">
        <h6 class="text-orange font-weight-normal mb-0"><?php echo __('Your Recipients')?></h6>
        <a href="<?php echo $this->Url->build([
            "action" => "recipientCountry",
            "_base" => $locale,
        ]); ?>" class="btn btn-sm btn-primary shadow-none float-right text-white"><i class="mdi mdi-plus"></i> <?php echo __("Add Recipient"); ?></a>
    </div>
    <div class="h-100">
        <div class="px-0">
            <div>
                <?php echo $this->Form->create(null, [
                    "type" => "GET"
                ]); ?>
                <div class="input-group">
                    <?php echo $this->Form->control("q", [
                        "placeholder" => __("Search in your recipients"),
                        "templates" => [
                            "inputContainer" => "{{content}}"
                        ],
                        "label" => false,
                        "autocomplete" => "off",
                        "class" => "rounded-0  transaction-search query form-control py-3",
                        "default" => $this->getRequest()->getQuery("q"),
                        "type" => "text"
                    ]); ?>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-orange rounded-0 px-5"><?php echo __("Search"); ?></button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
            <?php echo $this->Flash->render(); ?>
            <div class="row no-gutters align-items-center">
                <div class="col">
                    <?php if ($recipients->isEmpty()) { ?>
                        <div class="border-0 text-center py-5">
                            <h1 class="mb-3">
                                <i style="font-size: 5rem;" class="mdi mdi-account-multiple text-muted"></i>
                            </h1>
                            <h5 class="text-muted  mb-3"><?php echo __("No recipients found."); ?></h5>
                            <p class="text-muted  mb-4"><?php echo __("Create a new recipient to start sending money to your loved ones."); ?></p>
                            <div class="inline">
                                <a href="<?php echo $this->Url->build([
                                    "action" => "recipientCountry",
                                    "_base" => $locale,
                                ]); ?>" class="btn btn-primary shadow-none mb-4 text-white"><i class="mdi mdi-plus"></i> <?php echo __("Add Recipient"); ?></a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="p-4">
                            <div class="row">
                                <?php foreach ( $recipients as $recipient ) { ?>
                                    <div class="col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
                                        <div class="ui raised segment recipient-card mb-4 w-100 p-4 py-4">
                                            <a href="<?php echo $this->Url->build([
                                                "action" => "view",
                                                $recipient["id"]
                                            ]); ?>" class="recipient-link d-block">
                                                <div class="media">
                                                    <h6 class="mr-3 text-center">
                                                        <span class="d-inline-flex square-md rounded-circle recipient-avatar justify-content-center align-items-center"><?php echo substr($recipient["full_name"], 0, 1); ?></span>
                                                    </h6>
                                                    <div class="media-body">
                                                        <p class="recipient-name text-muted mb-1"><?php echo $recipient["full_name"]; ?></p>
                                                        <p class="recipient-text text-truncate text-muted mb-1"><?php echo $recipient["delivery_method"]["title"]; ?></p>
                                                        <p class="recipient-text-small text-truncate text-muted mb-1"><?php echo $recipient["identifier_nice"]; ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="text-center mt-4">
                                <div class="ui pagination small menu">
                                    <?= $this->Paginator->prev() ?>
                                    <?= $this->Paginator->numbers([
                                        "modulus" => 4
                                    ]); ?>
                                    <?= $this->Paginator->next() ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


