<?php
/**
 * @var \App\View\AppView $this
 */
?>
<section class="pt-5 pb-5 document-footer">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <h1><i class="doc-category-icon mdi mdi-shield-account-outline"></i></h1>
                <p class=""><?php echo __("We take the security of your money seriously — that's why we ask you for more information from time to time."); ?></p>
                <a target="_blank" href="<?php echo $this->Url->build([
                    "controller" => "Pages",
                    "action" => "kbDocumentsAndVerification"
                ]); ?>" class="bold-link" style="color: #14406E"><strong><?php echo __("Learn more about verification"); ?></strong></a>
            </div>
        </div>
    </div>
</section>
