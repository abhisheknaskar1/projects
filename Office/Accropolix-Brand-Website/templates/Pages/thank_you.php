<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section class="hero-section bg-light hero-thankyou">
    <div class="container">
        <div class="row align-items-center position-relative justify-content-center">
            <div class="hero-text-complex">
                <h1 class="font-weight-bold">Thank You !</h1>
                <h4 class=" text-center mt-5">We are excited to add value, and will reach out soon
                </h4>
            </div>
            <div class="tick-img">
                <?php echo $this->Html->image('/img/tickicon.png') ?>
            </div>
        </div>
        <button type="submit" class="btn value-btn text-center mt-5 text-center">“Value Selling Sales Playbook” :)</button>
        <div class="link-data text-center mt-4">
            <h4 class="">Meanwhile follow us on linkedin to know us and people better.
            </h4>
            <ul>
                <li><a href="https://www.linkedin.com/company/accropolixai/"><i class="bx bxl-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</section>