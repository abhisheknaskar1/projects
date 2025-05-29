<?php
/**
 * @var array $account
 * @var array $customer
 * @var string $totalNice
 * @var string $reference
 */
?>
<p class="text-left"><?php echo __("Please complete a bank transfer of {payment_amount} to our {bank_name} account as detailed below:", [
    'payment_amount' => '<span style="font-weight: 500;" class="text-orange">'.$totalNice.'</span>',
    'bank_name' => '<span style="font-weight: 500;">'.$account["bank_name"].'</span>'
]); ?></p>
<table class="table table-borderless">
    <?php foreach ((array)$account["properties"] as $property) { ?>
        <tr>
            <th style="width:40%;" class="text-left text-orange p-0 pt-2 pb-2 pr-2"><?php echo $property["label"]; ?></th>
            <td class="text-right p-0 pt-2 pb-2"><?php echo $property["value"]; ?></td>
        </tr>
    <?php } ?>
    <tr>
        <th class="text-left text-orange p-0 pt-2 pb-2 pr-2"><?php echo __("Payment Reference") ?></th>
        <td class="text-right text-roboto p-0 pt-2 pb-2"><?php echo $reference; ?></td>
    </tr>
    <tr>
        <th class="text-left text-orange p-0 pt-2 pb-2 pr-2"><?php echo __("Amount") ?></th>
        <td class="text-right text-orange p-0 pt-2 pb-2"><?php echo $totalNice; ?></td>
    </tr>
</table>
<div class="row">
    <div class="col-12">
        <button type="submit" style="letter-spacing: 0.065rem;" class="btn mb-3 btn-block btn-primary py-3"><?php echo __("Confirm Transfer"); ?></button>
    </div>
</div>
