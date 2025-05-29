<?php
use App\View\AppView;
/**
 * @var AppView $this
 * @var array $payoutChannels
 */

use Cake\I18n\I18n;

$languages = [];
$locale =  I18n::getLocale() != I18n::getDefaultLocale() ? mb_strtolower(str_replace('_', '-', I18n::getLocale())) : null;
?>
<style>
    .card.delivery-method .icon{
        color: #ff6327;
    }
    .card.delivery-method h6{
        color: #ff6327;
    }
    .card.delivery-method:hover p, .card.delivery-method:hover h6{
        color: #ffffff;
    }
    .card.delivery-method:hover .icon{
        color: #ffffff;
    }
    .card.delivery-method {
        border: 0;
    }
    .card.delivery-method:hover {
        text-decoration: none !important;
        background-color:#ff6327 !important;
        border-color:  #ff6327 !important;
        box-shadow: 0 1rem 3rem rgb(0 0 0 / 18%) !important;
        border: none;
    }

    .card.delivery-method:hover p, .card.delivery-method:hover h6{
        color: #fff !important;
    }

    @media only screen and (max-width: 767px){
        .sidebar .nav-item .nav-link
        {
            padding: 1rem 0.5rem;
        }
    }
</style>
<div class="col-12">
    <div class="p-3 py-2 mb-0 border-0 rounded-top d-flex justify-content-between">
        <h6 class="text-orange font-weight-normal mb-0"><?php echo __('Select Delivery Method')?></h6>
        <a href="<?php echo $this->Url->build([
            "action" => "index",
        ]); ?>" class="btn btn-sm btn-primary shadow-none float-right text-white"><?php echo __("Back"); ?></a>
    </div>
    <div class="px-3">
        <div class="row">
            <div class="col-xl-10 col-md-12 mb-4">
                <?php echo $this->Flash->render(); ?>
                <div class="row">
                    <?php foreach ( $payoutChannels as $payoutChannel ) { ?>
                        <?php $icon = ($payoutChannel["currency"]["icon"] ?: $payoutChannel["currency"]["iso_code_alpha"]." "); ?>
                        <div class="col-md-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                            <a href="<?php echo $this->Url->build([
                                'action' => 'add',
                                "_base" => $locale,
                                $payoutChannel["id"],
                                "referer" => urlencode($this->getRequest()->getRequestTarget())
                            ]); ?>" class="card w-100 delivery-method bg-indigo">
                                <div class="card-body recipient-card p-lg-5 px-4 text-center">
                                    <i style="font-size: 3rem;" class="<?php echo $payoutChannel["delivery_method"]["icon"]; ?> icon"></i>
                                    <h6 class="mb-3"><?php echo $payoutChannel["delivery_method"]["title"]; ?></h6>
                                    <p class="text-muted"><?php echo $payoutChannel["delivery_method"]["description"]; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
