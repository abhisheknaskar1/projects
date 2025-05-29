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
                                                                'action' => 'whyAgileProductEngg',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/why-agile-product.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Why Agile Product Engineering is Key to Efficient Software Development </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Product Engineering</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'whyAgileProductEngg',
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
                                                                'action' => 'fiveKeyChallenges',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/5-key-challenges.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    5 Key Challenges in Global KYC Compliance and Solutions for 2024 </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> KYC & CDD</span> <span class="cust-bg-2"> AML consulting services</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'fiveKeyChallenges',
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
                                                                'action' => 'revopsMetrics',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/10-revOps-metrics.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    10 RevOps Metrics Every Team Should Track for Revenue Growth </h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Sales Cycle Optimization</span> <span class="cust-bg-2"> Pipeline Velocity</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'revopsMetrics',
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
                                                                'action' => 'revenueOperations',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/revenue-operations.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    What is Revenue Operations (RevOps) and Why is it Essential?</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Pipeline Velocity</span> <span class="cust-bg-2"> Sales Acceleration</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'revenueOperations',
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
                                                                'action' => 'guideProductEngg',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/Guide-to-Product-Engineering.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    The Ultimate Guide to Product Engineering: From Strategy to Launch Success</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Strategy Execution & Optimization</span> <span class="cust-bg-2"> Sales Acceleration</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'guideProductEngg',
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
                                                                'action' => 'winningProduct',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/product-roadmap.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Develop a Winning Product Roadmap: Best Practices for Engineering Teams</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Strategy Execution & Optimization</span> <span class="cust-bg-2"> Sales Acceleration</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'winningProduct',
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
                                                                'action' => 'authenticWays',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/7-auth.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    7 Authentic Ways to Build Relationships with Prospects</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> Sales Cycle Optimization</span> <span class="cust-bg-2"> Customer Acquisition Cost</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'authenticWays',
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
                                                                'action' => 'hrConsulting',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/strategic-hr-consulting.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Strategic HR Consulting: How Competency Mapping Addresses the 44% Skill Shift in Today’s Workforce</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-2"> HR Research</span> <span class="cust-bg-2"> Competency Mapping</span> </p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'hrConsulting',
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
                                                                'action' => 'topFiveGuidelines',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/top-5-essentialguideline.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Top 5 Essential Guidelines for AML and Transaction Monitoring: Best Practices with Examples</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> dataanalytics</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'topFiveGuidelines',
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
                    <li class="page-item"><a class="pagination-slide page-link  " href="<?php echo $this->Url->build([
                                                                                            'controller' => 'Blogs',
                                                                                            'action' => 'index',
                                                                                        ]); ?>"> 1 </a></li>
                    <li class="page-item active"><a class=" pagination-slide page-link" href="#">2</a></li>
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