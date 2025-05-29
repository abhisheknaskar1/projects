<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section class="home-contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <a href="<?php echo $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'contact',
                ])?>" class="btn btn-lg btn-primary d-inline-flex align-items-center"><h3 class="mb-0"><?php echo __('Get Started')?></h3></a>
            </div>
        </div>
    </div>
</section>
