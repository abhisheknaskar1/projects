<?php
/**
 * @var \App\View\AppView $this
 * @var \App\WebService\Quote $quote
 */
$sendAmount = $quote->getSendAmount()*100;
$paymentCountry = $quote->getPaymentCountry();
$paymentCurrency = $quote->getPaymentCurrency();
$payoutCountry = $quote->getPayoutCountry();
$payoutCurrency = $quote->getPayoutCurrency();
$defaultSource = $paymentCountry["id"]."_".$paymentCurrency["id"];
$paymentCurrencyIcon = $paymentCurrency["icon"] ?: $paymentCurrency["iso_code_alpha"]." ";
$payoutCurrencyIcon = $payoutCurrency["icon"] ?: $payoutCurrency["iso_code_alpha"]." ";
$cost = $quote->getCost();
$payoutAmount = $quote->getPayoutAmount()*100;
$sellRate = $quote->getSellRate();
$payoutMethods = $quote->getPayoutMethods();
$paymentMethods = $quote->getPaymentMethods();
$quotePaymentMethod = $quote->getPaymentMethod();
$quotePayoutMethod = $quote->getPayoutMethod();
?>
<div class="">
    <form>
        <div class="card bg-indigo border-0 p-4" id="order-details">
            <h6 class="mb-4 text-white"><?php echo __('Transfer Summary')?></h6>
            <div>
                <div class="f-14" style="letter-spacing: 0.06rem;"><span class="convert float-right ml-2 font-weight-bold text-white"><?php echo $paymentCurrencyIcon.$this->Number->format($quote->getSendAmount(), [
                                "places" => 2
                            ]); ?></span><span class="text-orange"><?php echo __("Amount You're Sending") ?></span></div>
            </div>
            <hr class="my-3 border-dashed border-orange" />
            <div>
                <div class="f-14" style="letter-spacing: 0.06rem;"><span class="exchange-rate float-right ml-2 font-weight-bold text-white"><?php echo $paymentCurrency["iso_code_alpha"]; ?> = <?php echo rtrim(rtrim($this->Number->format($sellRate, [
                            "places" => 8
                        ]), "0"), '.'); ?> <?php echo $payoutCurrency["iso_code_alpha"]; ?></span><span class="text-orange"><?php echo __("Our Exchange Rate") ?></span></div>
            </div>
            <hr class="my-3 border-dashed border-orange" />
            <div>
                <div class="f-14" style="letter-spacing: 0.06rem;"><span class="payout-amount-nice float-right ml-2 font-weight-bold text-white"><?php echo $payoutCurrencyIcon.$this->Number->format($quote->getPayoutAmount(), [
                                "places" => 2
                            ]); ?></span><span class="text-orange"><?php echo __("Amount the Recipient Receives") ?></span></div>
            </div>
            <hr class="my-3 border-dashed border-orange" />
            <div>
                <div class="f-14" style="letter-spacing: 0.06rem;"><span class="payout-method float-right ml-2 font-weight-bold text-white"><?php echo $quotePayoutMethod["title"] ?? "--"; ?></span><span class="text-orange"><?php echo __("Delivery Method") ?></span></div>
            </div>
            <hr class="my-3 border-dashed border-orange" />
            <div>
                <div class="f-14" style="letter-spacing: 0.06rem;"><span class="total-cost-nice float-right ml-2 font-weight-bold text-white"><?php echo $paymentCurrencyIcon.$this->Number->format($cost, [
                                "places" => 2
                            ]); ?></span><span class="text-orange"><?php echo __("Fees") ?></span></div>
            </div>
            <hr class="my-3 border-dashed border-orange" />
            <div>
                <div class="f-14" style="letter-spacing: 0.06rem;"><span class="payment-method float-right ml-2 font-weight-bold text-white"><?php echo $quotePaymentMethod["title"] ?? "--"; ?></span><span class="text-orange"><?php echo __("Selected Payment Option") ?></span></div>
            </div>
            <hr class="my-3 border-dashed border-orange" />
            <div>
                <div class="f-14" style="letter-spacing: 0.06rem;"><span class="total-nice text-orange float-right ml-2 font-weight-bold"><?php echo $paymentCurrencyIcon.$this->Number->format($quote->getSendAmount()+$cost, [
                                "places" => 2
                            ]); ?></span><span class="text-orange"><?php echo __("Total to pay") ?></span></div>
            </div>
        </div>
    </form>
</div>
