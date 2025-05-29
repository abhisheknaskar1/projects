<?php

declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section id="project" class="project section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="center text-center">
                <button class="btn btn-default filter-button" data-filter="all">All</button>
                <button class="btn btn-default filter-button" data-filter="consulting">Consulting</button>
                <button class="btn btn-default filter-button" data-filter="it">IT</button>
                <button class="btn btn-default filter-button" data-filter="remittance">Remittance</button>
                <button class="btn btn-default filter-button" data-filter="data-and-consulting">Data and Analytics</button>
                <button class="btn btn-default filter-button" data-filter="saas">Research</button>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="gallery_product col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 portfolio-item mt-4 filter consulting">
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

            <div class="gallery_product col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 portfolio-item mt-4 filter it">
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
            <div class="gallery_product col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 portfolio-item mt-4 filter remittance">
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
            <div class="gallery_product col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 portfolio-item mt-4 filter ">
                <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'csFive',
                                                        ]); ?>">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img">
                            <img src="/img/customer-stories/from-chaos.webp" class="img-fluid">
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">From Chaos to Customer-Centricity: A RevOps Transformation Story</h4>
                            <div class="cust-st-data-text mt-2">
                                <p><span class="cust-bg-1"> salesacceleration</span> <span class="cust-bg-2"> businessintelligence</span></p>
                            </div>
                            <div class="cust-st-data-text">
                                <div class="mb-2">
                                    <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Pages',
                                                                        'action' => 'csFive',
                                                                    ]); ?>">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="gallery_product col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 portfolio-item mt-4 filter ">
                <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'csOne',
                                                        ]); ?>">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img">
                            <img src="/img/customer-stories/how-a-leading-media.webp" class="img-fluid">
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">How a top Zoho advanced implementation partner amplified its market visibility and sales with value selling & marketing automation.</h4>
                            <div class="cust-st-data-text mt-2">
                                <p><span class="cust-bg-1"> automation</span> <span class="cust-bg-2"> marketresearch </span> <span class="cust-bg-2"> gotomarket</span></p>
                            </div>
                            <div class="cust-st-data-text">
                                <div class="mb-2">
                                    <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Pages',
                                                                        'action' => 'csOne',
                                                                    ]); ?>">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="gallery_product col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 portfolio-item mt-4 filter data-and-consulting">
                <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'caseStudiesTwo',
                                                        ]); ?>">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img">
                            <img src="img/customer-stories/case-studies-two.webp" class="img-fluid">
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">Retail Marketing Data Pipelines and Data Warehouse</h4>
                            <div class="cust-st-data-text mt-2">
                                <p><span class="cust-bg-1"> dataanalytics</span> </p>
                            </div>
                            <div class="cust-st-data-text">
                                <div class="mb-2">
                                    <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Pages',
                                                                        'action' => 'caseStudiesTwo',
                                                                    ]); ?>">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="gallery_product col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 portfolio-item mt-4 filter data-and-consulting">
                <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'caseStudies',
                                                        ]); ?>">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img">
                            <img src="/img/customer-stories/case-studies.webp" class="img-fluid">
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">Updating Compliance: Data Engineering for AML and Sanction Screening</h4>
                            <div class="cust-st-data-text mt-2">
                                <p><span class="cust-bg-1"> dataanalytics</span> </p>
                            </div>
                            <div class="cust-st-data-text">
                                <div class="mb-2">
                                    <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Pages',
                                                                        'action' => 'caseStudies',
                                                                    ]); ?>">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="gallery_product col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 portfolio-item mt-4 filter data-and-consulting">
                <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'csSix',
                                                        ]); ?>">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img">
                            <img src="/img/customer-stories/strategic-competency.webp" class="img-fluid">
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">Strategic Competency Mapping Lifts Productivity by 24% and Cuts Turnover by 30%</h4>
                            <div class="cust-st-data-text mt-2">
                                <p><span class="cust-bg-1"> HR Research</span> <span class="cust-bg-2"> Competency Mapping</span> </p>

                            </div>
                            <div class="cust-st-data-text">
                                <div class="mb-2">
                                    <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Pages',
                                                                        'action' => 'csSix',
                                                                    ]); ?>">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="gallery_product col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 portfolio-item mt-4 filter data-and-consulting">
                <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'csSeven',
                                                        ]); ?>">
                    <div class="cust-gallery-product">
                        <div class="cust-gallery-product-img">
                            <img src="/img/customer-stories/strategic-competency.webp" class="img-fluid">
                        </div>
                        <div class="cust-gallery-product-text text-compile">
                            <h4 class="text-dark ">2x Faster Deployments with Real-Time ETL Pipeline and Predictive Healthcare Models</h4>
                            <div class="cust-st-data-text mt-2">
                                <p><span class="cust-bg-1"> dataanalytics</span> </p>

                            </div>
                            <div class="cust-st-data-text">
                                <div class="mb-2">
                                    <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Pages',
                                                                        'action' => 'csSeven',
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