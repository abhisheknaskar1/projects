<?php

declare(strict_types=1);

/**
 * @var App\View\AppView $this
 */
?>
<section class="hero-slider inner-hero upd-service-hero py-0">
    <div class="container">
        <div class="text-left text-compile text-white">
            <h2 class="mb-4">Sales Acceleration Consulting</h2>
            <h4>Deliver optimal customer value at every interactions </h4>
        </div>
    </div>
</section>
<!-- <section id="" class="service-sales-about about mt-5 ">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                <a href="https://www.youtube.com/watch?v=sNKAcscbNQI" class="glightbox play-btn mb-4"></a>
            </div>
        </div>
    </div>
</section> -->
<section class="">
    <div class="container">
    <div class="section__midline-heading">
            <h3 class="">What we do</h3>
        </div>
        <div class="row d-flex align-items-center justify-content-center mt-3 text-compile">
            <div class="col-lg-10 ">
                <a href="https://accropolix.ai/customer-stories-two" class="" style="text-decoration: none; color: #000;">
                    <div class="cust-st-data">
                        <div class="blog-multiple-column d-flex w-100 flex-column">
                            <div class="blog-multiple-contentbox">
                                <div class="yt-players text-center ">
                                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/sNKAcscbNQI?si=1eZtIv_DU1gGbHGZ&autoplay=0&mute=1&rel=0&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
</section>
<section>
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">How We can help</h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="service-automation-ic">
                    <div class="service-automation-ic-content">
                        <img src="img/service/sales/ic-1.webp" width="80px" class="mb-4">
                        <div class="service-automation-ic-text text-compile">
                            <h4 class="mb-3">Customer Lifecycle Management </h4>
                            <p class="mb-4">Insights and strategies to improve customer lifetime value and brand satisfaction</p>
                        </div>

                    </div>
                    <div class="cust-st-data-text">
                        <div class="mb-2">
                            <a href="" class="btn show-btn"> More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-automation-ic">
                    <div class="service-automation-ic-content">
                        <img src="img/service/sales/ic-2.webp" width="80px" class="mb-4">
                        <div class="service-automation-ic-text text-compile">
                            <h4 class="mb-3">Sales Channel Optimization</h4>
                            <p class="mb-4">Develop effective selling strategies across channels with focus around customer preference.</p>
                        </div>

                    </div>
                    <div class="cust-st-data-text">
                        <div class="mb-2">
                            <a href="" class="btn show-btn"> More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-lg-4">
                <div class="service-automation-ic">
                    <div class="service-automation-ic-content">
                        <img src="img/service/sales/ic-3.webp" width="80px" class="mb-4">
                        <div class="service-automation-ic-text text-compile">
                            <h4 class="mb-3">Qualitative research</h4>
                            <p class="mb-4">Identify customer decision making process and purchase cycles to optimise value proposition and sales closures.</p>
                        </div>

                    </div>
                    <div class="cust-st-data-text">
                        <div class="mb-2">
                            <a href="" class="btn show-btn"> More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="service-automation-ic">
                    <div class="service-automation-ic-content">
                        <img src="img/service/sales/ic-4.webp" width="80px" class="mb-4">
                        <div class="service-automation-ic-text text-compile">
                            <h4 class="mb-3">Customer Insights</h4>
                            <p class="mb-4">Deep customer understanding to drive right market growth, translates insights into effective well executed actions.
                            </p>
                        </div>

                    </div>
                    <div class="cust-st-data-text">
                        <div class="mb-2">
                            <a href="" class="btn show-btn"> More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center mt-4">
            <div class="col-lg-8 text-center">
                <a class="btn ind-btn" href="<?php echo $this->Url->build([
                                                    'controller' => 'Pages',
                                                    'action' => 'contact',
                                                ]); ?>">Get In Touch</a>
            </div>
        </div>
    </div>
</section>

<section class="about-area section-padding blog-latest-data">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Latest Insights</h3>
        </div>
        <div class="row d-flex align-items-center justify-content-between  text-compile">
            <div class="col-md-4 col-lg-4 mb-2">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'blogRevops',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/the-revops-story.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    The RevOps Story: Importance of Revenue Operations for Business Growth</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> revOps</span> <span class="cust-bg-2"> salesacceleration</span> <span class="cust-bg-2"> automation</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'blogRevops',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 mb-2">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'remittanceServices',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/data-driven-seo.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Data-Driven SEO and Business Intelligence</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> revOps</span> <span class="cust-bg-2"> salesacceleration</span> <span class="cust-bg-2"> businessintelligence</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'remittanceServices',
                                                                        ]); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 mb-2">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'marketingFunnel',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/how-successfull.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    How Successful Brands Optimize their Sales & Marketing Funnel.</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1">gotomarket</span> <span class="cust-bg-2">revOps</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'marketingFunnel',
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
        <div class="section__midline-heading">
            <h3 class="">Latest Insights</h3>
        </div>

        <div class="row d-flex align-items-center  text-compile">
            <div class="owl-carousel owl-theme carousel3">
                <div class="col-md-4 mb-4">
                    <div class="blog-multiple-column d-flex w-100 flex-column">
                        <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                    'controller' => 'Blogs',
                                                                    'action' => 'blogRevops',
                                                                ]); ?>">
                            <div class="cust-gallery-product">
                                <div class="cust-gallery-product-img">
                                    <img src="/img/blog/the-revops-story.webp" class="img-fluid">
                                </div>
                                <div class="cust-gallery-product-text text-compile">
                                    <h4 class="font-weight-bold text-dark">
                                        The RevOps Story: Importance of Revenue Operations for Business Growth</h4>
                                    <div class="cust-st-data-text mt-2">
                                        <p><span class="cust-bg-1"> revOps</span> <span class="cust-bg-2"> salesacceleration</span> <span class="cust-bg-2"> automation</span></p>
                                    </div>
                                    <div class="cust-st-data-text">
                                        <div class="mb-2">
                                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                                'controller' => 'Blogs',
                                                                                'action' => 'blogRevops',
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
                                                                    'action' => 'remittanceServices',
                                                                ]); ?>">
                            <div class="cust-gallery-product">
                                <div class="cust-gallery-product-img">
                                    <img src="/img/blog/data-driven-seo.webp" class="img-fluid">
                                </div>
                                <div class="cust-gallery-product-text text-compile">
                                    <h4 class="font-weight-bold text-dark">
                                        Data-Driven SEO and Data Analytics</h4>
                                    <div class="cust-st-data-text mt-2">
                                        <p><span class="cust-bg-1"> revOps</span> <span class="cust-bg-2"> salesacceleration</span> <span class="cust-bg-2"> dataanalytics</span></p>
                                    </div>
                                    <div class="cust-st-data-text">
                                        <div class="mb-2">
                                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                                'controller' => 'Blogs',
                                                                                'action' => 'remittanceServices',
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
                                                                    'action' => 'marketingFunnel',
                                                                ]); ?>">
                            <div class="cust-gallery-product">
                                <div class="cust-gallery-product-img">
                                    <img src="/img/blog/how-successfull.webp" class="img-fluid">
                                </div>
                                <div class="cust-gallery-product-text text-compile">
                                    <h4 class="font-weight-bold text-dark">
                                        How Successful Brands Optimize their Sales & Marketing Funnel.</h4>
                                    <div class="cust-st-data-text mt-2">
                                        <p><span class="cust-bg-1">gotomarket</span> <span class="cust-bg-2">revOps</span></p>
                                    </div>
                                    <div class="cust-st-data-text">
                                        <div class="mb-2">
                                            <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                                'controller' => 'Blogs',
                                                                                'action' => 'marketingFunnel',
                                                                            ]); ?>">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row latest-insights-data-com latest-insights-data-com d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-8 text-center">
                <a href="https://www.accropolix.ai/knowledge-base" class="btn ind-btn">See All Insights</a>
            </div>
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
                <a style="text-decoration: none;" href="">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img cust-play-btn">
                            <img src="img/customer-stories/how-a-leading-business.webp" class="img-fluid">
                            <a href="https://www.youtube.com/embed/oxPoouk6YNM?si=_vDSDa22875dzBpM&amp;autoplay=1&amp;mute=1&amp;rel=0&amp;loop=1" class="glightbox play-btn mb-4"></a>
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">How a Leading Business Consulting Firm Unlocked Growth and
                                Won Customer Trust</h4>
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
                <a style="text-decoration: none;" href="">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img cust-play-btn">
                            <img src="img/customer-stories/fixing-fisconnect.webp" class="img-fluid">
                            <a href="https://www.youtube.com/embed/KXN8ZF-QMC4?si=8QRDBKfazgwfHWVE&amp;autoplay=1&amp;mute=1&amp;rel=0&amp;loop=1" class="glightbox play-btn mb-4"></a>
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">Fixing disconnect between expertise and communication for a
                                leading IT service provider.</h4>
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
                <a style="text-decoration: none;" href="">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img cust-play-btn">
                            <img src="img/customer-stories/how-a-white-labeled-remittance.webp"
                                class="img-fluid">
                            <a href="https://www.youtube.com/embed/smowC5ecxnk?si=XdeL9zGlrrPIfQzQ&amp;autoplay=1&amp;mute=1&amp;rel=0&amp;loop=1" class="glightbox play-btn mb-4"></a>
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">How a White-Labeled Remittance SaaS Provider Enhanced
                                Customer Acquisition and Lifetime Value</h4>
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
    </div>
</section>

<section class="humanize">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-8 text-center text-compile text-white">
                <h3>Improve decision-making with agile business intelligence</h3>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-8 text-center">
                <a class="btn ind-btn" href="<?php echo $this->Url->build([
                                                    'controller' => 'Pages',
                                                    'action' => 'contact',
                                                ]); ?>">Let’s get to work</a>
            </div>
        </div>
    </div>
</section>