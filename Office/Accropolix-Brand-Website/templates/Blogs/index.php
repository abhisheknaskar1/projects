<?php

declare(strict_types=1);
/**
 * @var \App\View\AppView $this
 */
?>
<section class="hero-slider inner-hero blog-hero py-0">
    <div class="container">
        <div class="page-title-content text-left">
            <h2><?php echo __('Insights') ?></h2>
            <ul>
                <li><a href="<?php echo $this->Url->build('/') ?>"><?php echo __('Home') ?></a></li>
                <li><?php echo __('Blog') ?></li>
            </ul>
        </div>
</section>
<section>
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Resources</h3>
        </div>
        <div class="row d-flex align-items-center mt-3">
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/resource/harnessing-digital.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="text-dark ">Harnessing Digital Go-To-Market Strategies for UK Remittance Success</h4>
                                <div class="cust-st-data-text mb-3">
                                    <object data="assets/pdf/Go-to-market-strategies-whitepaper.pdf"
                                        type="aplication/pdf" width="30%" height="850px">

                                        <a href="assets/pdf/Go-to-market-strategies-whitepaper.pdf"
                                            download="Go-to-market-strategies-whitepaper.pdf"
                                            class="doc-pdf btn show-btn text-dark"><i class='bx bxs-file-pdf'></i> Download</a>
                                    </object>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/resource/guide-to-purning.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="text-dark ">Guide to turning prospects into loyal customers</h4>
                                <div class="cust-st-data-text mb-3">
                                    <object data="assets/pdf/Guide-to-turning-prospects.pdf"
                                        type="aplication/pdf" width="30%" height="850px">

                                        <a href="assets/pdf/Guide-to-turning-prospects.pdf"
                                            download="Guide-to-turning-prospects.pdf"
                                            class="doc-pdf btn show-btn text-dark"><i class='bx bxs-file-pdf'></i> Download</a>
                                    </object>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Case Study</h3>
        </div>
        <div class="row d-flex align-items-center mt-3">
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/case/how-a-50.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="text-dark ">How a $50M SaaS Achieved 35% Retention Growth and Delivered 15% Faster</h4>
                                <div class="cust-st-data-text mb-3">
                                    <object data="pdf/case study-1.pdf"
                                        type="aplication/pdf" width="30%" height="850px">

                                        <a href="pdf/case study-1.pdf"
                                            download="How a $50M SaaS Achieved 35% Retention
                                                    Growth and Delivered 15% Faster.pdf"
                                            class="doc-pdf btn show-btn text-dark"><i class='bx bxs-file-pdf'></i> Download</a>
                                    </object>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- <section class="about-area section-padding">
    <div class="container">
        <h2 class="mb-5"><span class="color-text">Blog</span></h2>
        <div class="row d-flex align-items-center mt-5">
            <?php
            for ($i = $total_data - 1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" >
                            <img src="/img/' . $blog[$i][0] . '" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0" >
                            <small class="text-muted mr-3">' . $blog[$i][1] . '</small>
                            <small class="text-muted mr-3">' . $blog[$i][2] . '</small>
                        </p>
                        <h3 class="font-weight-bold">' . $blog[$i][4] . '</h3>
                        <p class="blog-multiple-text">' . $blog[$i][5] . '</p>
                         <a href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $blog[$i][6]]) . '" class="blog-read-more"><span>' . __('Learn More') . '</span>  </a>
                    </div>
                </div>
            </div>';
            } ?>
        </div>
        <div class="row align-items-center justify-content-center mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="pagination-slide page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="pagination-slide page-link  " href="#">1</a></li>
                    <li class="page-item"><a class=" pagination-slide page-link" href="<?php echo $this->Url->build([
                                                                                            'controller' => 'Blogs',
                                                                                            'action' => 'index2',
                                                                                        ]); ?>"><?php echo __('2'); ?></a></li>
                    <li class="page-item"><a class=" pagination-slide page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="pagination-slide page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section> -->


<section class="about-area section-padding">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Blog</h3>
        </div>

        <div class="row d-flex align-items-center ">

            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'whyDataEngg',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/why-data-engg.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Why Is Data Engineering So Critical for Artificial Intelligence </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Data engineering</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'whyDataEngg',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'topFifteenOpen',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/top-15.jpeg" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Top 15 Open Source Data Engineering Tools to Dominate 2024-25 </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Data engineering</span> <span class="cust-bg-2"> Descriptive analytics</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'topFifteenOpen',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'predictiveAnalytics',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/7-ways.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    7 Ways Predictive Analytics is Changing the Recruitment Process </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Predictive Analytics</span> <span class="cust-bg-2"> HR Research Consulting</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'predictiveAnalytics',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'aiPoweredPrescription',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/how-ai-img-1.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    How a AI powered Prescription Safety App Secures £50,000 Seed Funding into MVP Stage </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Artificial intelligence </span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'aiPoweredPrescription',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'hrMetrics',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/5-data.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    5 Data-Driven HR Metrics Every HR Professional Should Track </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> HR Metrics</span> <span class="cust-bg-2"> HR Research Consulting</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'hrMetrics',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'aiImpacting',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/ai.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    How AI is Impacting The Future of Digital Marketing in 2024 </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Sales Acceleration Consulting</span> <span class="cust-bg-2"> Marketing automation</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'aiImpacting',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'fiveProvenGtm',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/a2.png" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    5 Proven Go-To-Market Tactics Every Business Needs in 2024 </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Path to market</span> <span class="cust-bg-2"> Marketing automation</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'fiveProvenGtm',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'sevenBestPractices',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/a3.png" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    7 Best Practices for Creating a Successful Marketing Automation Strategy in 2024 </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Marketing Automation</span> <span class="cust-bg-2"> Gap Analysis</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'sevenBestPractices',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'comprehensiveGuide',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/comprehensive-guide.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Comprehensive Guide to PEP and Sanctioned Entity Screening for Financial Crime Prevention in 2024 </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> PEP & Sanctioned Entity Screening</span> <span class="cust-bg-2"> AML consulting services</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'comprehensiveGuide',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


        </div>
        <div class="row align-items-center justify-content-center mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="pagination-slide page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="pagination-slide page-link  " href="#">1</a></li>
                    <li class="page-item"><a class=" pagination-slide page-link " href="<?php echo $this->Url->build([
                                                                                            'controller' => 'Blogs',
                                                                                            'action' => 'indexTwo',
                                                                                        ]); ?>"> 2 </a></li>
                    <li class="page-item"><a class=" pagination-slide page-link " href="<?php echo $this->Url->build([
                                                                                            'controller' => 'Blogs',
                                                                                            'action' => 'indexThree',
                                                                                        ]); ?>"> 3 </a></li>
                    <li class="page-item"><a class=" pagination-slide page-link" href="<?php echo $this->Url->build([
                                                                                            'controller' => 'Blogs',
                                                                                            'action' => 'indexFour',
                                                                                        ]); ?>"> 4 </a></li>
                    <li class="page-item">
                        <a class="pagination-slide page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>

<!------------------------------------ PODCAST Section  ------------------------------------>
<!-- =--=-=-=-=-=-=---=-=---=-=---=---=-=-=--=-==---==--=-==-=---==-=-=-=---=-=-=-=--=-=- -->
<!-- <section class="about-area section-padding">
    <div class="container">
        <div class="row  d-flex  mt-5">
            <h2 class="mb-2"><span class="color-text" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">Podcast</span></h2>
        </div>
        <div class="row podcast-data d-flex  mt-4">
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
                            '/img/B2B Marketing- Overcoming Change Resistance hero image.png',
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
</section> -->