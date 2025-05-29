<?php
use App\View\AppView;

/**
 * @var AppView $this
 * @var array $cards
 */
echo $this->Html->css([
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
    .headingLine {
        width: 80px;
        height: 3px;
        background: #E51F28;
    }
</style>
<div class="col-xl-12 col-md-12 mb-4">
    <div class="card shadow-sm profile-details-card h-100 p-4">
        <div class="card-body p-0">
            <?php if ($cards) { ?>
            <div class="row no-gutters mb-lg-3 mb-md-3">
                <div class="profile-details-card-header">
                    <h4 class="text-theme font-weight-bold mb-0"><?php echo __('Saved Cards')?></h4>
                </div>
            </div>
            <?php } ?>
            <?php echo $this->Flash->render(); ?>
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        <?php if (empty($cards)) { ?>
                            <div class="card card-body border-0 text-center">
                                <h1><img style="width: 170px" src="<?php echo $this->Url->image('/assets/img/not_found.gif')?>"></h1>
                                <h5 class="text-muted  mb-4"><?php echo __("You don't have any saved cards."); ?></h5>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <?php foreach ( $cards as $card ) { ?>
                                    <div class="col-sm-4 d-flex align-content-stretch">
                                        <div class="card border w-100 mb-4">
                                            <div class="card-body ui raised segment border-0">
                                                <div class="media">
                                                    <?php echo $this->Html->image("card-brands/".strtolower($card["card_scheme"]).".svg", [
                                                        "width" => "60px",
                                                        "class" => "mr-3",
                                                        "style" => "margin-left: -5px;"
                                                    ]); ?>
                                                    <div class="media-body">
                                                        <strong class="font-weight-bolder"><?php echo $card["card_number"]; ?></strong>
                                                        <?php if ($card["expiry"]->isPast()) { ?>
                                                            <p style="font-size: 13px;" class="text-danger mb-1"><?php echo __("Expired on {expiry}", [
                                                                "expiry" => $card["expiry"]->format("m/y")
                                                            ]); ?></p>
                                                        <?php } else { ?>
                                                            <p style="font-size: 13px;" class="mb-1"><?php echo __("Expires on {expiry}", [
                                                                "expiry" => $card["expiry"]->format("m/y")
                                                            ]); ?></p>
                                                        <?php } ?>
                                                        <?php echo $this->Html->link(__("Delete Card"), "#deleteCardModal-".$card["id"], [
                                                            "data-toggle" => "modal",
                                                            "class" => "small"
                                                        ]); ?>
                                                        <p style="font-size: 13px;" class="mb-0 text-muted mt-2"><em><?php echo __("Last used on {last_use}", [
                                                            "last_use" => $card["last_used"]->format("M d, Y")
                                                        ]); ?></em></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<?php foreach ( $cards as $card ) {
    echo $this->element("confirmation_modal", [
        "id" => "deleteCardModal-".$card["id"],
        "url" => [
            "action" => "deleteCard",
            $card["id"],
        ],
        "content" => __("Are you sure, you want to delete this card?")
    ]);
} ?>

