<?php
/**
 * @var \App\View\AppView $this
 */
$this->layout = 'app';
?>
<script>
    let paymentResult = false;
    let paymentDescription = "<?php echo htmlentities(__("Payment for this transaction cannot be retried."), ENT_QUOTES) ?>"
    <?php if ($this->getRequest()->getQuery("device") === "ios") { ?>
    webkit.messageHandlers.callbackHandler.postMessage({"ifCompleted": paymentResult, "message": paymentDescription});
    <?php } else { ?>
    app.paymentFinished(paymentResult, paymentDescription);
    <?php } ?>
</script>
