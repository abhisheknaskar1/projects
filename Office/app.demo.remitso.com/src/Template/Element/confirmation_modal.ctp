<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="modal" id="<?php echo $id; ?>">
  <div class="modal-dialog confirmation-modal modal-sm">
    <?php echo $this->Form->create(NULL, [
      "url" => $url,
      "data-submit" => "disable"
    ]); ?>
    <div class="modal-content">
      <div class="modal-body">
        <h5 class="text-danger ">
          <?php if ( isset($title) ) { ?>
            <?php echo $title; ?>
          <?php } else { ?>
            <i class="mdi mdi-alert"></i> <?php echo __("Warning"); ?>
          <?php } ?>
        </h5>
        <div class="confirmation-text mb-3 mt-4 f-14 text-white"><?php echo $content; ?></div>
        <?php if ( isset($warning) ) { ?>
          <p class="text-justify text-danger">
            <i class="mdi mdi-alert mr-2"></i><?php echo $warning; ?>
          </p>
        <?php } ?>
      </div>
      <div class="modal-footer p-0">
        <div class="btn-group border-0 d-flex w-100">
          <button class="btn btn-light border-right text-dark w-100 btn-sm  p-2" data-dismiss="modal"><?php echo __("Cancel"); ?></button>
          <button class="btn btn-light border-left text-dark w-100 btn-sm  p-2"><?php echo __("Yes"); ?></button>
        </div>
      </div>
    </div>
    <?php echo $this->Form->end(); ?>
  </div>
</div>
