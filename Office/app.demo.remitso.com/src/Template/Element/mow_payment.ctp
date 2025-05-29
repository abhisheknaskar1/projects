<?php
/**
 * @var array $account
 * @var array $customer
 * @var string $totalNice
 * @var string $reference
 */
?>
<p class="text-left"><?php echo __("You'll need to make a mobile wallet transfer of {payment_amount} to our following {bank_name}'s wallet:", [
    'payment_amount' => '<span style="font-weight: 500;" class="text-theme">'.$totalNice.'</span>',
    "bank_name" =>  '<span style="font-weight: 500;">'.$account["bank_name"].'</span>'
]); ?></p>
<table class="table">
    <?php foreach ((array)$account["properties"] as $property) { ?>
        <tr>
            <th style="width:40%;" class="text-left text-theme p-0 pt-2 pb-2 pr-2"><?php echo $property["label"]; ?></th>
            <td class="text-right p-0 pt-2 pb-2"><?php echo $property["value"]; ?></td>
        </tr>
    <?php } ?>
    <tr>
        <th class="text-left text-theme p-0 pt-2 pb-2 pr-2"><?php echo __("Payment Reference") ?></th>
        <td class="text-right text-roboto p-0 pt-2 pb-2"><?php echo $reference; ?></td>
    </tr>
    <tr>
        <th class="text-left text-theme p-0 pt-2 pb-2 pr-2"><?php echo __("Amount") ?></th>
        <td class="text-right text-primary p-0 pt-2 pb-2"><?php echo $totalNice; ?></td>
    </tr>
</table>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn mb-3 btn-success mt-3 float-right"><?php echo __("Confirm Transfer"); ?></button>
    </div>
</div>
