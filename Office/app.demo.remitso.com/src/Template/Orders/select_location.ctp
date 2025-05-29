<?php
/**
 * @var array $locations
 * @var \App\View\AppView $this
 */

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;

echo $this->Html->css([
    "/vendors/semantic-ui/components/menu.min",
    "/vendors/semantic-ui/components/header.min",
    "/vendors/semantic-ui/components/grid.min",
    "/vendors/semantic-ui/components/divider.min",
]);
?>
<style>
    .form-text {
        font-weight: bold;
        font-size: 1rem;
    }
    p {
        font-size: 0.85rem;
        letter-spacing: 1px;
        color: #9e9e9e;
    }
    .location-card p{
        display: flex;
        align-items: center;
    }
    .location-card p span{
        line-height: 1.7;
    }
    .location-card a.opening-hr{
        display: flex;
        align-items: center;
    }
    .location-card a.opening-hr span{
        display: flex;
        line-height: 1.5;
    }
    .select-btn .btn{
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        -webkit-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }
    .select-btn .btn:hover
    {
        background: #289e42 !important;
    }
    .transaction-details-section .profile-details-card-header {
        width: 100%;
        margin-bottom: 15px;
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #C8D1DA;
        padding-bottom: 10px;
        align-items: center;
    }
    .pagination {
        background: transparent !important;
    }
    .ui.pagination.menu .active.item {
        background-color: rgb(85 105 147 / 20%) !important;
    }
    .schedule-listing
    {
        background: #f1f3f4;
        padding: 7px;
        border-radius: 4px;
        text-align: center;
        color: #333;
        margin-bottom: 7px;
        display: flex;
        width: 100%;
        justify-content: space-between;
    }
    .font-weight-600
    {
        font-weight: 600;
    }
</style>
<main id="main" class="">
    <section class="transaction-details-section bg-light py-5">
        <div class="container">
            <div class="row no-gutters mb-lg-4 mb-md-4">
                <div class="profile-details-card-header pb-3">
                    <h4 class="text-theme font-weight-bold mb-0"><?php echo __('Choose Your Location')?></h4>
                    <a href="<?php echo $this->Url->build([
                        'action' => 'send',
                        "_base" => $locale,
                        '?' => array_filter([
                            'payment_country_id' => $this->getRequest()->getQuery('payment_country_id'),
                            'payment_currency_id' => $this->getRequest()->getQuery('payment_currency_id'),
                            'payout_country_id' => $this->getRequest()->getQuery('payout_country_id'),
                            'payout_currency_id' => $this->getRequest()->getQuery('payout_currency_id'),
                            'send_amount' => $this->getRequest()->getQuery('send_amount'),
                            'payout_amount' => $this->getRequest()->getQuery('payout_amount'),
                            'direction' => $this->getRequest()->getQuery('direction'),
                            'payout_method_id' => $this->getRequest()->getQuery('payout_method_id'),
                            'payout_partner_id' => $this->getRequest()->getQuery('payout_partner_id'),
                            'payout_agency_id' => $this->getRequest()->getQuery('payout_agency_id'),
                            'payout_location_id' => $this->getRequest()->getQuery('payout_location_id'),
                            'payment_method_id' => $this->getRequest()->getQuery('payment_method_id'),
                        ])
                    ]); ?>" class="btn btn-outline-light text-dark border floar-right" style=""><?php echo __("Back") ?></a>
                </div>
            </div>
            <div class="mb-4 col-sm-12 px-0">
                <?php echo $this->Form->create("q", [
                    "type" => "GET",
                    "id" => "search-form",
                ]); ?>
                <div class="input-group">
                    <?php echo $this->Form->control("q", [
                        "placeholder" => __("Search Locations"),
                        "templates" => [
                            "inputContainer" => "{{content}}"
                        ],
                        "label" => false,
                        "autocomplete" => "off",
                        "class" => "rounded-0 locations-search form-control",
                        "default" => $this->getRequest()->getQuery("q"),
                        "type" => "text"
                    ]); ?>
                    <?php if ( $this->getRequest()->getQuery("q") ) { ?>
                        <div class="input-group-append">
                            <a href="<?php echo $this->Url->build([
                                'action' => 'selectLocation',
                                "_base" => $locale,
                                '?' => array_filter([
                                    'payment_country_id' => $this->getRequest()->getQuery('payment_country_id'),
                                    'payment_currency_id' => $this->getRequest()->getQuery('payment_currency_id'),
                                    'payout_country_id' => $this->getRequest()->getQuery('payout_country_id'),
                                    'payout_currency_id' => $this->getRequest()->getQuery('payout_currency_id'),
                                    'send_amount' => $this->getRequest()->getQuery('send_amount'),
                                    'payout_amount' => $this->getRequest()->getQuery('payout_amount'),
                                    'direction' => $this->getRequest()->getQuery('direction'),
                                    'payout_method_id' => $this->getRequest()->getQuery('payout_method_id'),
                                    'payout_partner_id' => $this->getRequest()->getQuery('payout_partner_id'),
                                    'payout_agency_id' => $this->getRequest()->getQuery('payout_agency_id'),
                                    'payout_location_id' => $this->getRequest()->getQuery('payout_location_id'),
                                    'payment_method_id' => $this->getRequest()->getQuery('payment_method_id'),
                                ])
                            ]); ?>" class="btn btn-outline-light text-dark border" style=""><?php echo __("Clear") ?></a>
                        </div>
                    <?php } ?>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-light text-dark border"><?php echo __("Search"); ?></button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
            <div class="row gutters">
                <div class="col-xl-12">
                    <div class="row">
                        <?php foreach ($locations as $location) { ?>
                            <div class="col-sm-6 col-md-4 col-xl-4 mb-3 d-flex">
                                <div class="card border-0 shadow-sm location-card w-100">
                                    <div class="card-body">
                                        <div class="form-text mb-3 text-theme"><?php echo $location['agency']['name']; ?></div>
                                        <p class="mb-1"><span class='bx bx-map mr-1'></span><?php echo $location['full_address']; ?></p>
                                        <p class="mb-1"><span class='bx bx-mobile-alt mr-1'></span><?php echo implode(', ', $location['phone_numbers']); ?></p>
                                        <a class="small text-decoration-none opening-hr" style="letter-spacing: 0.5px;" data-toggle="modal" data-target="#business-hour-modal-<?php echo $location['id'] ?>" href="#business-hour-modal-<?php echo $location['id'] ?>"><span class='bx bx-time-five mr-1'></span><?php echo __('Opening/Closing Hours'); ?></a>
                                    </div>
                                    <div class="select-btn">
                                        <a class="text-decoration-none btn btn-success btn-block shadow-none" href="<?php echo $this->Url->build([
                                            'action' => 'send',
                                            "_base" => $locale,
                                            '?' => array_filter([
                                                'payment_country_id' => $this->getRequest()->getQuery('payment_country_id'),
                                                'payment_currency_id' => $this->getRequest()->getQuery('payment_currency_id'),
                                                'payout_country_id' => $this->getRequest()->getQuery('payout_country_id'),
                                                'payout_currency_id' => $this->getRequest()->getQuery('payout_currency_id'),
                                                'payout_agency_id' => $location['agency']['id'],
                                                'payout_location_id' => $location['id'],
                                                'send_amount' => \Cake\I18n\Number::parseFloat($this->getRequest()->getQuery('send_amount')),
                                                'payout_amount' => \Cake\I18n\Number::parseFloat($this->getRequest()->getQuery('payout_amount')),
                                                'direction' => $this->getRequest()->getQuery('direction'),
                                                'payout_method_id' => $this->getRequest()->getQuery('payout_method_id'),
                                                'payout_partner_id' => $this->getRequest()->getQuery('payout_partner_id'),
                                                'payment_method_id' => $this->getRequest()->getQuery('payment_method_id'),
                                            ])
                                        ]); ?>"><?php echo __('Select Location'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="business-hour-modal-<?php echo $location['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo __("Opening - Closing Hours")?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="schedule-listing"><span class="font-weight-600"><?php echo __('Mon')?></span><span><?php echo $location['business_hours']['mon_start'].' - '. $location['business_hours']['mon_end']?></span></p>
                                            <p class="schedule-listing"><span class="font-weight-600"><?php echo __('Tue')?></span><span><?php echo $location['business_hours']['tue_start'].' - '. $location['business_hours']['tue_end']?></span></p>
                                            <p class="schedule-listing"><span class="font-weight-600"><?php echo __('Wed')?></span><span><?php echo $location['business_hours']['wed_start'].' - '. $location['business_hours']['wed_end']?></span></p>
                                            <p class="schedule-listing"><span class="font-weight-600"><?php echo __('Thu')?></span><span><?php echo $location['business_hours']['thu_start'].' - '. $location['business_hours']['thu_end']?></span></p>
                                            <p class="schedule-listing"><span class="font-weight-600"><?php echo __('Fri')?></span><span><?php echo $location['business_hours']['fri_start'].' - '. $location['business_hours']['fri_end']?></span></p>
                                            <p class="schedule-listing"><span class="font-weight-600"><?php echo __('Sat')?></span><span><?php echo $location['business_hours']['sat_start'].' - '. $location['business_hours']['sat_end']?></span></p>
                                        </div>
                                    </div>
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
                </div><!--//col-xl-3-->
            </div><!--//row-->
        </div><!--//container-->
    </section>
</main>
<script>
    appendQueryToUrl = function (q, value) {
        const queryString = window.location.search.replace("?", "");
        const existingParameters = queryString === "" ? [] : queryString.split("&");
        const parameterList = {};
        for (let  i = 0; i < existingParameters.length; i++) {
           let  parameter = existingParameters[i].split("=");
           parameterList[parameter[0]] = parameter[1];
       }
       parameterList[q] = value;

       let newQueryString = "?";
       for (let item in parameterList) {
           if (parameterList.hasOwnProperty(item)) {
               newQueryString += item + "=" + parameterList[item] + "&";
           }
       }
       newQueryString = newQueryString.replace(/&$/, "");
       return location.origin + location.pathname + newQueryString;
    }
    $('#search-form').submit(function() {
        $.ajax({
            type: 'POST',
            url: window.location.href = appendQueryToUrl(document.getElementById('q').getAttribute('name'), document.getElementById('q').value),
        })
        return false;
    });
</script>
