<?php

declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section class="hero-slider inner-hero  py-0 hero-data-img-1 ">
    <div class="owl-carousel owl-theme hero-carousel">
        <div class="item-hero " data-dot="<button class='pagi-btn'>Data   </button>" data-aos="fade-up" data-aos-duration="300">
            <div class="text-white data-index text-compile">
                <h5 class="mb-2">Research. Engineer. Transform.
                </h5>
                <h2 class="hero-sales-text acce-data">Build or Understand Your Data's Potential
                </h2>
                <h4 class="mt-5">Find out how well your organization uses data and insights</h4>

                <div class="d-flex gap-5 mt-4">
                    <a href="https://survey.zohopublic.in/zs/oADCZv" class="btn ind-btn">Assess Your Data Maturity
                    </a>
                </div>
            </div>
        </div>
        <div class="item-hero " data-dot="<button class='pagi-btn'>Engineering  </button>" data-aos="fade-up" data-aos-duration="300">
            <div class="text-white data-index text-compile">
                <h5 class="mb-2">Research. Engineer. Transform.</h5>
                <h2 class="hero-sales-text acce-data">Beyond Features: The DNA of Great Products
                </h2>
                <h4 class="mt-5">Learn how to build products that customers can't resist.
                </h4>

                <div class="d-flex gap-5 mt-4">
                    <a href="<?php echo $this->Url->build([
                                    'controller' => 'Blogs',
                                    'action' => 'beyondFeatures',
                                ]); ?>" class="btn ind-btn">Gain the Edge
                    </a>
                </div>
            </div>
        </div>
        <div class="item-hero " data-dot="<button class='pagi-btn'>GTM
                                                                </button>" data-aos="fade-up" data-aos-duration="300">
            <div class="text-white data-index text-compile">
                <h5 class="mb-2">Research. Engineer. Transform.</h5>
                <h2 class="hero-sales-text acce-data">The Search-Driven Consumer
                </h2>
                <h4 class="mt-5">How Online Research Shapes Buying Decisions
                </h4>
                <div class="d-flex gap-5 mt-4">
                    <a href="<?php echo $this->Url->build([
                                    'controller' => 'Blogs',
                                    'action' => 'searchDriven',
                                ]); ?>" class="btn ind-btn">Stay Ahead of the Curve
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="expertise-data-img-sec  expertise-data-img-sec-web">
    <div class="container">
        <div class="section__midline-heading text-compile">
            <h3>Our Expertise</h3>
        </div>
        <p class="text-center consulting-data">Transforming businesses through data-driven insights and innovative strategies</p>

        <div class="row transforming-business justify-content-center align-items-center expertise-cards">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <a class="" href="<?php echo $this->Url->build([
                                        'controller' => 'Pages',
                                        'action' => 'dataAnalytics',
                                    ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Data And Analytics</h4>
                            <div class="card-data-copy">
                                <p class="copy">Make your data talk, uncover insights & predict the future</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'dataAnalytics',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card 2 -->
            <!-- <div class="col-lg-4 col-md-6 col-sm-6">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'soumya',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Marketing Automation </h4>
                            <div class="card-data-copy">
                                <p class="copy">People-Centred Automation to harness full potential value</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'soumya',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div> -->
            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'revops',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Revenue Operations (RevOps)</h4>
                            <div class="card-data-copy">
                                <p class="copy">Not just process alignment, customer-Centric revenue focused transformation</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'revops',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card 4 -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'productEngineering',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Product Engineering </h4>
                            <div class="card-data-copy">
                                <p class="copy">Beyond code and design, business focused engineering</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'productEngineering',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 ">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'financialCompliance',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Financial Compliance Management</h4>
                            <div class="card-data-copy">
                                <p class="copy">Reduce risk, optimize operational cost and build compliance culture </p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'financialCompliance',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card 5 (Initially Hidden on Mobile) -->
            <div class="col-lg-4 col-md-6 col-sm-6 ">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'gtm',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Digital Go To Market </h4>
                            <div class="card-data-copy">
                                <p class="copy">Understand, Reach and Persuade Customers</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'gtm',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div>
            <!-- <div class="col-lg-4 col-md-6 col-sm-6 hidden-card">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'salesAcceleration',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Sales Acceleration Consulting</h4>
                            <div class="card-data-copy">
                                <p class="copy">Win customer trust, digitally</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'salesAcceleration',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div> -->
            <div class="col-lg-4 col-md-6 col-sm-6 hidden-card">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'hrResearch',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">HR Research</h4>
                            <div class="card-data-copy">
                                <p class="copy">Upskill, reskill, transform your workforce into a visionary team</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'hrResearch',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Additional cards 6-8, also hidden on mobile -->
            <!-- <div class="col-lg-4 col-md-6 col-sm-6 hidden-card">
                <a href="https://xpedico.in/">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Real Estate Feasibility Research </h4>
                            <div class="card-data-copy">
                                <p class="copy">Assess the viability and potential to zero down risks</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="https://xpedico.in/">Learn More</a>
                        </div>
                    </div>
                </a>
            </div> -->
        </div>
</section>
<section class="expertise-data-img-sec expertise-data-img-sec-mobile">
    <div class="container">
        <div class="section__midline-heading text-compile">
            <h3>Our Expertise</h3>
        </div>
        <p class="text-center consulting-data">Transforming businesses through data-driven insights and innovative
            strategies</p>

        <div class="row transforming-business justify-content-center align-items-center expertise-cards">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'dataAnalytics',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Data And Analytics</h4>
                            <div class="card-data-copy-search">
                                <p class="copy">Make your data talk, uncover insights & predict the future</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'dataAnalytics',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'revops',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Revenue Operations (RevOps)</h4>
                            <div class="card-data-copy-search">
                                <p class="copy">Not just process alignment, customer-Centric revenue focused transformation
                                </p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'revops',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'productEngineering',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Product Engineering </h4>
                            <div class="card-data-copy-search">
                                <p class="copy">Beyond code and design, business focused engineering</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'productEngineering',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 ">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'financialCompliance',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Financial Compliance Management</h4>
                            <div class="card-data-copy-search">
                                <p class="copy">Reduce risk, optimize operational cost and build compliance culture </p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'financialCompliance',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Card 5 (Initially Hidden on Mobile) -->
            <div class="col-lg-4 col-md-6 col-sm-6 hidden-card">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'gtm',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">Digital Go To Market </h4>
                            <div class="card-data-copy-search">
                                <p class="copy">Understand, Reach and Persuade Customers</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'gtm',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 hidden-card">
                <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'hrResearch',
                            ]); ?>">
                    <div class="card-data-patter-ind card-data-bg-pattern text-compile">
                        <div class="content content-data-pattern">
                            <h4 class="title">HR Research</h4>
                            <div class="card-data-copy-search">
                                <p class="copy">Upskill, reskill, transform your workforce into a visionary team</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'hrResearch',
                                                            ]); ?>">Learn More</a>
                        </div>
                    </div>
                </a>
            </div>

            <div class="row d-flex align-items-center justify-content-center mt-5 show-data-more">
                <div class="col-lg-8 text-center">
                    <a href="javascript:void(0);" id="gallery-btn" class="btn ind-btn" onclick="toggleCards()">Show More</a>
                </div>
            </div>
        </div>
</section>
<section class="">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Customer Stories </h3>
        </div>
        <div class="row d-flex align-items-center mt-3 text-compile">
            <div class="col-lg-4 mb-4">
                <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'csTwo',
                                                        ]); ?>">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img">
                            <img src="/img/customer-stories/how-a-leading-business.webp" class="img-fluid">
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">How a Leading Business Consulting Firm Unlocked Growth and Won Customer Trust</h4>
                            <div class="cust-st-data-text mt-2">
                                <p><span class="cust-bg-1"> salesacceleration</span> <span class="cust-bg-2"> automation</span> </p>
                            </div>
                            <div class="cust-st-data-text">
                                <div class="mb-2">
                                    <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Pages',
                                                                        'action' => 'csTwo',
                                                                    ]); ?>">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 mb-4">
                <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'csThree',
                                                        ]); ?>">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img">
                            <img src="/img/customer-stories/fixing-fisconnect.webp" class="img-fluid">
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">Fixing disconnect between expertise and communication for a leading IT service provider.</h4>
                            <div class="cust-st-data-text mt-2">
                                <p><span class="cust-bg-1"> salesacceleration</span> <span class="cust-bg-2"> businessintelligence</span></p>
                            </div>
                            <div class="cust-st-data-text">
                                <div class="mb-2">
                                    <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Pages',
                                                                        'action' => 'csThree',
                                                                    ]); ?>">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 mb-4">
                <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'csFour',
                                                        ]); ?>">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img">
                            <img src="/img/customer-stories/how-a-white-labeled-remittance.webp" class="img-fluid">
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">How a White-Labeled Remittance SaaS Provider Enhanced Customer Acquisition and Lifetime Value</h4>
                            <div class="cust-st-data-text mt-2">
                                <p><span class="cust-bg-1"> salesacceleration</span> <span class="cust-bg-2"> businessintelligence</span> <span class="cust-bg-2"> hrresearch</span></p>
                            </div>
                            <div class="cust-st-data-text">
                                <div class="mb-2">
                                    <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Pages',
                                                                        'action' => 'csFour',
                                                                    ]); ?>">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-8 text-center">
                <a class="btn ind-btn" href="<?php echo $this->Url->build([
                                                    'controller' => 'Pages',
                                                    'action' => 'customerStories',
                                                ]); ?>"><?php echo __('Explore More Stories'); ?></a>
            </div>
        </div>
    </div>
</section>
<!-- <section class="about-area section-padding blog-latest-data">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Latest Insights</h3>
        </div>
        <div class="row d-flex align-items-center justify-content-between mt-5 text-compile">
            <div class="col-md-4 col-lg-5 mb-2">
                <div class="cust-st-data">
                    <div class="blog-multiple-column d-flex w-100 flex-column">
                        <div class="blog-multiple-imagebox-ind">
                            <img src="img/the-revops-story.webp" class="img-fluid" alt="">
                        </div>
                        <div class="blog-multiple-contentbox">
                            <div class="cust-st-data-text">
                                <h3 class="font-weight-bold">
                                    The RevOps Story: Importance of Revenue Operations for Business Growth</h3>
                                <p class="blog-multiple-text">RevOps or Revenue Operation is the best practice framework of organizing the
                                    integrated teams of selling, marketing, and servicing for a unified revenue-generation aim.</p>
                                <a href="https://accropolix.ai/b2b-blog-revops" class="blog-read-more"><span>Learn
                                        More</span> </a>
                            </div>
                            <div class="cust-st-data-text">
                                <p><span class="cust-bg-1"> revOps</span> <span class="cust-bg-2"> salesacceleration</span> <span class="cust-bg-2"> automation</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-5 mb-2">
                <div class="cust-st-data">
                    <div class="blog-multiple-column d-flex w-100 flex-column">
                        <div class="blog-multiple-imagebox-ind">
                            <img src="img/revolutionizing-nline.webp" class="img-fluid" alt="">
                        </div>
                        <div class="blog-multiple-contentbox">
                            <div class="cust-st-data-text">
                                <h3 class="font-weight-bold">
                                    Data-Driven SEO and Business Intelligence</h3>
                                <p class="blog-multiple-text">How a leading remittance provider increased transaction volumes and online visibility</p>
                                <a href="https://accropolix.ai/seo-success-for-remittance" class="blog-read-more"><span>Learn More</span> </a>

                            </div>
                            <div class="cust-st-data-text">
                                <p><span class="cust-bg-1"> revOps</span> <span class="cust-bg-2"> salesacceleration</span> <span class="cust-bg-2"> businessintelligence</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-8 text-center">
                <a href="https://www.accropolix.ai/knowledge-base" class="btn ind-btn">See All Insights</a>
            </div>
        </div>

    </div>
</section> -->
<section class="about-area section-padding blog-latest-data">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Latest Insights</h3>
        </div>
        <div class="row d-flex align-items-center justify-content-between mt-5 text-compile">

            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'intuitionVsData',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/intuition.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Intuition vs Data Driven Decision Making</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> dataanalytics</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'intuitionVsData',
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
                                                                'action' => 'buildingAData',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/building-a-data.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Building a Data Fabric: From Silos to Insights</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> dataanalytics</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'buildingAData',
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
                                                                'action' => 'topTenTools',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/what-are-the-top.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    What Are the Top 10 ETL Tools Transforming Data Integration in 2024?</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> dataanalytics</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'topTenTools',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-8 text-center">
                <a href="https://www.accropolix.ai/knowledge-base" class="btn ind-btn">See All Insights</a>
            </div>
        </div>
    </div>
</section>
<section class="about-area section-padding blog-latest">
    <div class="container">
        <h2 class="mb-5 text-center"><span class="color-text">Latest Insights</span> </h2>

        <div class="row d-flex align-items-center mt-5 text-compile">
            <div class="owl-carousel owl-theme carousel3">
                <div class="col-md-4 mb-4">
                    <div class="blog-multiple-column d-flex w-100 flex-column">
                        <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                    'controller' => 'Blogs',
                                                                    'action' => 'intuitionVsData',
                                                                ]); ?>">
                            <div class="cust-gallery-product">
                                <div class="cust-gallery-product-img">
                                    <img src="img/blog/intuition.webp" class="img-fluid">
                                </div>
                                <div class="cust-gallery-product-text text-compile">
                                    <h4 class="font-weight-bold text-dark">
                                        Intuition vs Data Driven Decision Making</h4>
                                    <div class="cust-st-data-text mt-2">
                                        <p><span class="cust-bg-1"> dataanalytics </span></p>
                                    </div>
                                    <div class="cust-st-data-text">
                                        <div class="mb-2">
                                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                                'controller' => 'Blogs',
                                                                                'action' => 'intuitionVsData',
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
                                                                    'action' => 'buildingAData',
                                                                ]); ?>">
                            <div class="cust-gallery-product">
                                <div class="cust-gallery-product-img">
                                    <img src="img/blog/building-a-data.webp" class="img-fluid">
                                </div>
                                <div class="cust-gallery-product-text text-compile">
                                    <h4 class="font-weight-bold text-dark">
                                        Building a Data Fabric: From Silos to Insights</h4>
                                    <div class="cust-st-data-text mt-2">
                                        <p><span class="cust-bg-1"> dataanalytics</span></p>
                                    </div>
                                    <div class="cust-st-data-text">
                                        <div class="mb-2">
                                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                                'controller' => 'Blogs',
                                                                                'action' => 'buildingAData',
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
                                                                    'action' => 'topTenTools',
                                                                ]); ?>">
                            <div class="cust-gallery-product">
                                <div class="cust-gallery-product-img">
                                    <img src="img/blog/what-are-the-top.webp" class="img-fluid">
                                </div>
                                <div class="cust-gallery-product-text text-compile">
                                    <h4 class="font-weight-bold text-dark">
                                        What Are the Top 10 ETL Tools Transforming Data Integration in 2024?</h4>
                                    <div class="cust-st-data-text mt-2">
                                        <p><span class="cust-bg-1"> dataanalytics</span></p>
                                    </div>
                                    <div class="cust-st-data-text">
                                        <div class="mb-2">
                                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                                'controller' => 'Blogs',
                                                                                'action' => 'topTenTools',
                                                                            ]); ?>">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row latest-insights-data-com d-flex align-items-center justify-content-center mt-5">
                <div class="col-lg-8 text-center">
                    <a href="https://www.accropolix.ai/knowledge-base" class="btn ind-btn">See All Insights</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section__midline-heading">
                    <h3 class="">FAQs</h3>
                </div>
                <!-- <h2 class="font-weight-bold" data-aos="fade-up" data-aos-duration="300">
                                    FAQs
                                </h2> -->
            </div>
        </div>

        <div class="accordion" id="accordionExample">
            <div class="card card-accro-faq">
                <div class="card-head" id="headingOne">
                    <h2 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        How does global management consulting drive international business success?
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        Global management consulting helps businesses expand into international markets by providing tailored strategies focused on operational efficiency, market expansion, and digital transformation. These strategies ensure businesses succeed on a global scale.
                    </div>
                </div>
            </div>
            <div class="card card-accro-faq">
                <div class="card-head" id="headingTwo">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        What key services do business consulting firms provide?
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        Business consulting firms, including Accropolix, offer services like data analytics, RevOps, product engineering, financial compliance, and digital go-to-market strategies to optimise business growth and efficiency.
                    </div>
                </div>
            </div>
            <div class="card card-accro-faq">
                <div class="card-head" id="headingThree">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Why should businesses partner with a management consulting firm?
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        Partnering with a management consulting firm provides expert insights into operational improvements, strategic planning, and performance optimization. Accropolix helps businesses remain competitive and adaptable in fast-changing markets.
                    </div>
                </div>
            </div>
            <div class="card card-accro-faq">
                <div class="card-head" id="headingFour">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        What benefits do business consulting services offer?
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        Accropolix’s <strong>business consulting services</strong> help refine strategies, enhance operational efficiency, and boost profitability through services like financial planning, competitive analysis, and process improvements.
                    </div>
                </div>
            </div>
            <div class="card card-accro-faq">
                <div class="card-head" id="headingFive">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        What makes top management consulting firms stand out?
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        Top management consulting firms, such as Accropolix, stand out through deep industry expertise, innovative strategies, and a proven track record in helping businesses achieve sustainable growth and operational excellence.
                    </div>
                </div>
            </div>
            <div class="card card-accro-faq">
                <div class="card-head" id="headingSix">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Why is a business consulting firm important for digital transformation?
                    </h2>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        A business consulting firm, like Accropolix, plays a key role in digital transformation by helping businesses optimise their processes, improve customer experiences, and maintain a competitive edge in the digital landscape.
                    </div>
                </div>
            </div>
            <div class="card card-accro-faq">
                <div class="card-head" id="headingSeven">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        Why is global management consulting essential for business growth?
                    </h2>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        Global management consulting firms, such as Accropolix, help identify new market opportunities and streamline operations, allowing businesses to scale efficiently while minimising risks and staying competitive.
                    </div>
                </div>
            </div>
            <div class="card card-accro-faq">
                <div class="card-head" id="headingEight">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        How can business consulting accelerate company growth?
                    </h2>
                </div>
                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        Business consulting accelerates company growth by identifying new opportunities, streamlining operations, and implementing data-driven strategies. Accropolix’s approach helps businesses scale while maintaining profitability.
                    </div>
                </div>
            </div>
            <div class="card card-accro-faq">
                <div class="card-head" id="headingNine">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                        How do management consulting firms facilitate organizational change?
                    </h2>
                </div>
                <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        Management consulting firms guide businesses through change management by assessing current practices, recommending new strategies, and ensuring smooth transitions that improve overall performance.
                    </div>
                </div>
            </div>
            <div class="card card-accro-faq">
                <div class="card-head" id="headingTen">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                        How do business consulting services improve a company’s market position?
                    </h2>
                </div>
                <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        Business consulting services, including those offered by Accropolix, enhance market position by identifying growth opportunities, improving customer engagement, and optimising strategies to outpace competitors.
                    </div>
                </div>
            </div>
            <div class="card card-accro-faq">
                <div class="card-head" id="headingEleven">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                        How do management consulting firms drive innovation?
                    </h2>
                </div>
                <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        Management consulting firms, like Accropolix, drive innovation by integrating the latest technologies, streamlining processes, and fostering a culture of continuous improvement, keeping businesses at the forefront of their industries.
                    </div>
                </div>
            </div>
            <div class="card card-accro-faq">
                <div class="card-head" id="headingTwellve">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwellve" aria-expanded="false" aria-controls="collapseTwellve">
                        How do business consulting firms ensure long-term success?
                    </h2>
                </div>
                <div id="collapseTwellve" class="collapse" aria-labelledby="headingTwellve" data-parent="#accordionExample">
                    <div class="card-body card-body-acc">
                        Business consulting firms, such as Accropolix, ensure long-term success through continuous performance monitoring and strategic adjustments, keeping businesses agile and responsive to evolving market conditions.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="magic-career section-padding">
    <div class="container-fluid">
        <div class="row crafting-revops d-flex align-items-center justify-content-center mt-5 text-compile">
            <div class="col-lg-5 text-center">
                <div class="craft-success-revops">
                    <h3 class="mb-4">Research. Engineer. Transform</h3>
                </div>
                <a href=" https://calendar.app.google/bpke3qxem1b9EuZk9" class="btn ind-btn">Let's Get to Work </a>
            </div>
            <div class="col-lg-1">
                <div class="vertical-car">
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <div class="craft-success-revops">
                    <h3 class="mb-4">Create Magic & Impact</h3>
                </div>
                <a class="btn ind-btn" href="<?php echo $this->Url->build([
                                                    'controller' => 'Pages',
                                                    'action' => 'career',
                                                ]); ?>"><?php echo __('Explore Careers'); ?></a>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section__midline-heading">
                    <h3 class=""> Our Certifications</h3>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-lg-5 col-md-6 col-6 mb-3">
                        <img src="img/certificate1.png" data-aos="flip-left" data-aos-duration="700" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-5 col-md-6 col-6 mb-3">
                        <img src="img/certificate2.png" data-aos="flip-right" data-aos-duration="1000" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ----------------------PDF 01--------------------------------------->
<?php echo $this->Html->link('', '/assets/pdf/how-a-leading-alcohol-delivery-brand-in-the-uk-improved-sales-by-59-percent-with-data-driven-seo.pdf', ['target' => '_blank']); ?>
<!-- ----------------------PDF 02--------------------------------------->
<?php echo $this->Html->link('', '/assets/pdf/170-percent-increase-in-course-enrollments-in-6-months-through-data-driven-seo-strategy.pdf', ['target' => '_blank']); ?>


<div class="modal fade" id="exampleModal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Roadmap</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-data-body">
                <div class="zf-templateWidth">
                    <form
                        action='https://forms.zohopublic.in/accropolixmediasolutionspteltd/form/ProductRoadmap/formperma/K77lVKBrF2fqmsw0a0gqkxtfgtMXja1BVtDxhoup0i4/htmlRecords/submit'
                        name='form' method='POST' onSubmit='javascript:document.charset="UTF-8"; return zf_ValidateAndSubmit();'
                        accept-charset='UTF-8' enctype='multipart/form-data' id='form'><input type="hidden" name="zf_referrer_name"
                            value=""><!-- To Track referrals , place the referrer name within the " " in the above hidden input field -->
                        <input type="hidden" name="zf_redirect_url"
                            value=""><!-- To redirect to a specific page after record submission , place the respective url within the " " in the above hidden input field -->
                        <input type="hidden" name="zc_gad"
                            value=""><!-- If GCLID is enabled in Zoho CRM Integration, click details of AdWords Ads will be pushed to Zoho CRM -->
                        <div class="zf-templateWrapper"><!---------template Header Starts Here---------->
                            <!-- <ul class="zf-tempHeadBdr">
                                <li class="zf-tempHeadContBdr">
                                    <h2 class="zf-frmTitle"><em>Product Roadmap</em></h2>
                                    <p class="zf-frmDesc"></p>
                                    <div class="zf-clearBoth"></div>
                                </li>
                            </ul> -->
                            <!---------template Header Ends Here---------->
                            <!---------template Container Starts Here---------->
                            <div class="zf-subContWrap zf-topAlign">
                                <ul>
                                    <!---------Name Starts Here---------->
                                    <li class="zf-tempFrmWrapper zf-name zf-namelarge">
                                        <div class="zf-tempContDiv zf-twoType">
                                            <div class="zf-nameWrapper">
                                                <span> <input type="text" maxlength="255" name="Name_First" fieldType=7
                                                        placeholder="First Name" />
                                                </span>
                                                </span> </span>
                                                <span> <input type="text" maxlength="255" name="Name_Last" fieldType=7
                                                        placeholder="Last Name" />
                                                </span> </span>
                                                <div class="zf-clearBoth"></div>
                                            </div>
                                            <p id="Name_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
                                        </div>
                                        <div class="zf-clearBoth"></div>
                                    </li><!---------Name Ends Here---------->
                                    <!---------Email Starts Here---------->
                                    <li class="zf-tempFrmWrapper zf-large">
                                        <div class="zf-tempContDiv">
                                            <span> <input fieldType=9 type="text" maxlength="255" name="Email" checktype="c5"
                                                    value="" placeholder=" Help us with your work email" /></span>
                                            <p id="Email_error" class="zf-errorMessage" style="display:none;">Invalid value</p>
                                        </div>
                                        <div class="zf-clearBoth"></div>
                                    </li><!---------Email Ends Here---------->
                                </ul>
                            </div><!---------template Container Starts Here---------->
                            <ul>
                                <li class="zf-fmFooter"><button class="zf-submitColor">Submit</button></li>
                            </ul>
                        </div><!-- 'zf-templateWrapper' ends -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>