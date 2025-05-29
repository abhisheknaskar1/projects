<?php
use App\View\AppView;
use App\WebService\Customer;
use Cake\Collection\CollectionInterface;
use Cake\I18n\Time;

/**
 * @var AppView $this
 * @var Customer $customer
 * @var CollectionInterface $orders
 */
echo $this->Html->css([
    "style",
    "/vendors/iconfonts/flag-icon/css/flag-icon.min",
    "/vendors/semantic-ui/components/header.min",
    "/vendors/semantic-ui/components/icon.min",
    "/vendors/semantic-ui/components/grid.min",
    "/vendors/semantic-ui/components/divider.min",
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
    .card-title {
        font-size: 1rem;
        font-weight: bold;
        color: #1a237e;
        letter-spacing: 0.04rem;
    }
    .segment p {
        font-size: 0.85rem;
    }
    .segment .header span {
        font-size: 0.80rem;
        color: #999999;
    }
    .ui.segment label {
        font-size: 0.90rem;
        color: #1a237e;
    }
    .order-actions a {
        font-size: 0.85rem;
        letter-spacing: 0.05rem;
    }
    .order-actions a:hover {
        text-decoration: none;
    }
    th{
        font-size: 0.85rem;
        font-weight: 400;
        padding: 8px 15px;
        border-top: 1px solid #f1f5f6;
    }
    td{
        font-size: 0.80rem;
        padding: 8px 15px;
        border-top: 1px solid #f1f5f6;
        vertical-align: middle;
    }
    @media only screen and (max-width: 767px){
        .sidebar .nav-item .nav-link
        {
            padding: 1rem 0.5rem;
        }
    }
    .white-space-no {
        white-space: nowrap;
    }
</style>
<div class="col-xl-12 col-md-12 mb-4">
    <div class="">
        <div class="card-body p-0">
            <div class="row no-gutters align-items-center">
                <div class="col table-responsive">
                    <?php if ($orders->isEmpty()) { ?>
                        <div class="border-0 text-center py-5">
                            <h1 class="mb-3">
                                <i style="font-size: 5rem;" class="mdi mdi-rocket text-muted"></i>
                            </h1>
                            <h5 class="text-muted  mb-3"><?php echo __("No recent transfers found."); ?></h5>
                            <p class="text-muted  mb-4"><?php echo __("Start a new transfer to see your activity here."); ?></p>
                            <div class="inline">
                                <a href="<?php echo $this->Url->build([
                                    "controller" => "Orders",
                                    "action" => "send",
                                ]); ?>" class="btn btn-primary mb-4" style="color: #fff !important">
                                    <i class="mdi mdi-rocket"></i> <?php echo __("Send Money") ?>
                                </a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row no-gutters">
                            <div class="p-3 py-2 mb-0 border-0 rounded-top">
                                <h6 class="text-orange font-weight-normal mb-0"><?php echo __('Recent Transfers')?></h6>
                            </div>
                        </div>
                        <div class="border-0">
                            <table class="table mb-0 white-space-no">
                                <thead>
                                <tr>
                                    <th class="text-orange"><?php echo __("Date"); ?></th>
                                    <th class="text-orange"><?php echo __("Transfer Number"); ?></th>
                                    <th class="text-orange"><?php echo __("Sent Amount"); ?></th>
                                    <th class="text-orange"><?php echo __("Recipient"); ?></th>
                                    <th class="text-orange"><?php echo __("Payout Amount"); ?></th>
                                    <th class="text-orange"><?php echo __("Payout Method"); ?></th>
                                    <th class="text-orange"><?php echo __("Status"); ?></th>
                                    <th class="text-orange"><?php echo __("View"); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ( $orders as $order ) { ?>
                                    <?php $created = new Time($order["created"]); ?>
                                    <?php $paymentCurrency = $order["payment_currency"]; ?>
                                    <?php $payoutCountry = $order["payout_country"]; ?>
                                    <?php $payoutCurrency = $order["payout_currency"]; ?>
                                    <?php $sendAmount = ($paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ").$this->Number->format($order["send_amount"], [
                                            "places" => 2
                                        ]); ?>
                                    <?php $payoutAmount = ($payoutCurrency["icon"] ?: $payoutCurrency["iso_code_alpha"]." ").$this->Number->format($order["payout_amount"], [
                                            "places" => 2
                                        ]); ?>
                                    <tr>
                                        <td class="text-white" style="font-weight: 500;">
                                            <span class="d-block"><?php echo $created->isToday() ? $created->format("h:i A") : $created->format("M d, Y"); ?></span>
                                        </td>
                                        <td class="text-white" style="font-weight: 500;"><?php echo $order["order_number"]; ?></td>
                                        <td class="text-white" style="font-weight: 500;"><?php echo $sendAmount; ?></td>
                                        <td class="text-white"><?php echo $order["recipient"]["full_name"]; ?></td>
                                        <td class="text-white" style="font-weight: 500;"><?php echo $payoutAmount; ?></td>
                                        <td class="text-white"><?php echo $order["payout_method"]["title"]; ?></td>
                                        <td class="text-<?php echo $order["state"]["color"]; ?>"><?php echo $order["state"]["title"]; ?></td>
                                        <td class="text-white"><a href="<?php echo $this->Url->build([
                                            "controller" => "Orders",
                                            "action" => "view",
                                            $order["id"]
                                        ]); ?>"><?php echo __("Details"); ?><i class="mdi mdi-arrow-right ml-2"></i></a></td>
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <td colspan="8"><a href="<?php echo $this->Url->build([
                                            "controller" => "Orders",
                                            "action" => "index",
                                        ]); ?>" class="f-14"><?php echo __("View all transfers"); ?><span class="ml-2"><i class="fa fa-chevron-right f-14"></i></span></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>



