<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section class="hero-slider inner-hero podcast-hero py-0">
    <div class="container">
        <div class="page-title-content">
            <h2>Podcast</h2>
            <ul>
                <li><a href="<?php echo $this->Url->build([
                                    'controller' => 'Pages',
                                    'action' => 'index',
                                ]); ?>">Home</a></li>
                <li>Podcast</li>
            </ul>
        </div>
    </div>
</section>
<section class="about-area section-padding">
    <div class="container">
        <div class="row podcast-data d-flex  mt-5">
            <div class="col-lg-4 ">
                <div class="podcast-title d-flex ">
                    <div class="imagebox-title mt-4">
                        <?php echo $this->Html->image(
                            '/img/podcast-3-image.png',
                            ['class' => 'img-fluid', 'alt' => '']
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="podcast-data-title">
                    <p class="">
                        <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>Mar,
                            2024</small>
                        <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>Vivek Sharma</small>
                    </p>
                    <h3 class="font-weight-bold">
                        Episode 3: Why Cold Email is a Dying Strategy</h3>
                    <p class="blog-multiple-text">Don't degrade your brand value with cold emails!</p>
                </div>

                <div class="pcast-player">
                    <div class="audio_file">
                        <iframe allowtransparency="true" style="border: 1px solid #dedede; border-radius: 10px;" src="https://podcasters.spotify.com/pod/show/vivek5480/embed/episodes/Episode-3-Why-Cold-Email-is-a-Dying-Strategy-e2hnllu/a-ab4962p" height="163px" width="100%" frameborder="0" scrolling="no"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row podcast-data d-flex  mt-5">
            <div class="col-lg-4 ">
                <div class="podcast-title d-flex ">
                    <div class="imagebox-title mt-4">
                        <?php echo $this->Html->image(
                            '/img/podcast-2-image.png',
                            ['class' => 'img-fluid', 'alt' => '']
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="podcast-data-title">
                    <p class="">
                        <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>Mar,
                            2024</small>
                        <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>Vivek Sharma</small>
                    </p>
                    <h3 class="font-weight-bold">
                        Episode 2: The Final Hurdle Before Sales Closure</h3>
                    <p class="blog-multiple-text">Break the Managerial status quo</p>
                </div>

                <div class="pcast-player">
                    <div class="audio_file">
                        <iframe allowtransparency="true" style="border: 1px solid #dedede; border-radius: 10px;" src="https://podcasters.spotify.com/pod/show/vivek5480/embed/episodes/Episode-2-The-Final-Hurdle-Before-Sales-Closure-e2hnlfv/a-ab495iq" height="163px" width="100%" frameborder="0" scrolling="no"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row podcast-data d-flex  mt-5">
            <div class="col-lg-4 ">
                <div class="podcast-title d-flex ">
                    <div class="imagebox-title mt-4">
                        <?php echo $this->Html->image(
                            '/img/podcast-1-image.png',
                            ['class' => 'img-fluid', 'alt' => '']
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="podcast-data-title">
                    <p class="">
                        <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>Mar, 2024</small>
                        <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>Vivek Sharma</small>
                    </p>
                    <h3 class="font-weight-bold">Episode 1: The solution to your new customer acquisition
                        challenges</h3>
                    <p class="blog-multiple-text">Overcome new customer acquisition challenges. Make them love what
                        you're selling. A must-listen for anyone looking to boost their customer base and sales
                        success.
                    </p>
                </div>
                <div class="pcast-player">
                    <div class="audio_file">
                        <iframe src="https://podcasters.spotify.com/pod/show/vivek5480/embed/episodes/Episode-1-The-solution-to-your-new-customer-acquisition-challenges-e2hakgh/a-ab3a2tp" height="163px" width="100%" frameborder="0" scrolling="no">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>