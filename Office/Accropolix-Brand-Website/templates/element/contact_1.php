<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section class="bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="font-weight-bold" data-aos="fade-up" data-aos-duration="300">
                    Your Vision, Our Expertise
                </h2>
                <div class="mt-4"  data-aos="fade-up" data-aos-duration="700">
                    <a href="<?php echo $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'contact',
                    ])?>" class="btn theme-btn">Let's get Started</a>
                </div>
            </div>
        </div>
    </div>
</section>
