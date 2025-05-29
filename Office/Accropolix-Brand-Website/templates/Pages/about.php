<?php

declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-lg-8 left-hero" data-aos="fade-up" data-aos-duration="300">
                <h1 class="font-weight-bold mb-4">
                    Accropolix: Your Trusted Growth Partner
                </h1>
                <div class="row">
                    <div class="col-lg-10">
                        <p class="mb-4">
                            Optimize your sales and marketing with Accropolix. We help businesses grow,
                            reach new heights achive business goals faster
                        </p>
                        <h4 class="font-weight-bold">We mainly focus on</h4>
                        <p>
                            Converting your MQLs to SQLs<br>
                            Optimize brand communication
                        </p>
                        <div class="d-flex gap-5 mt-4">
                            <a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'contact',
                                        ]) ?>" class="btn theme-btn">Let’s Talk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="font-weight-bold" data-aos="fade-up" data-aos-duration="300">
                    We can help your customers
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4 mb-5">
                <div class="about-help" data-aos="fade-right" data-aos-duration="500">
                    <div class="shape-card">
                        <?php echo $this->Html->image('/img/help-white-shape.svg', ['class' => 'help-img1', 'alt' => '']) ?>
                        <?php echo $this->Html->image('/img/help1.png', ['class' => 'help-img2', 'alt' => '']) ?>
                    </div>
                    <div class="help-title help-title1">
                        <h3>Find You</h3>
                    </div>
                    <div class="help-number help-number1" data-aos="fade-left" data-aos-duration="800">
                        <h3>01</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4 mb-5">
                <div class="about-help" data-aos="fade-right" data-aos-duration="500">
                    <div class="shape-card">
                        <?php echo $this->Html->image('/img/help-white-shape.svg', ['class' => 'help-img1', 'alt' => '']) ?>
                        <?php echo $this->Html->image('/img/help2.png', ['class' => 'help-img2', 'alt' => '']) ?>
                    </div>
                    <div class="help-title help-title2">
                        <h3>Know You</h3>
                    </div>
                    <div class="help-number help-number2" data-aos="fade-left" data-aos-duration="800">
                        <h3>02</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4 mb-5">
                <div class="about-help" data-aos="fade-right" data-aos-duration="500">
                    <div class="shape-card">
                        <?php echo $this->Html->image('/img/help-white-shape.svg', ['class' => 'help-img1', 'alt' => '']) ?>
                        <?php echo $this->Html->image('/img/help3.png', ['class' => 'help-img2', 'alt' => '']) ?>
                    </div>
                    <div class="help-title help-title3">
                        <h3>Trust You</h3>
                    </div>
                    <div class="help-number help-number3" data-aos="fade-left" data-aos-duration="800">
                        <h3>03</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4 mb-5">
                <div class="about-help" data-aos="fade-right" data-aos-duration="500">
                    <div class="shape-card">
                        <?php echo $this->Html->image('/img/help-white-shape.svg', ['class' => 'help-img1', 'alt' => '']) ?>
                        <?php echo $this->Html->image('/img/help4.png', ['class' => 'help-img2', 'alt' => '']) ?>
                    </div>
                    <div class="help-title help-title4">
                        <h3>Choose You</h3>
                    </div>
                    <div class="help-number help-number4" data-aos="fade-left" data-aos-duration="800">
                        <h3>04</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="font-weight-bold" data-aos="fade-up" data-aos-duration="300">
                    Come join us on a journey where business goals
                    become success stories.
                </h2>
                <div class="mt-4" data-aos="fade-up" data-aos-duration="700">
                    <a href="<?php echo $this->Url->build([
                                    'controller' => 'Pages',
                                    'action' => 'contact',
                                ]) ?>" class="btn theme-btn">Let s Collaborate</a>
                </div>
            </div>
        </div>
    </div>
</section>
