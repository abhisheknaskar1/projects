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
                                                                'action' => 'topTenTools',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/what-are-the-top.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    What Are the Top 8 ETL Tools Transforming Data Integration in 2024?</h4>
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
                                                                'action' => 'nonCompliance',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/cost-of-compliance.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    The Cost of Non-Compliance: HMRC Fines Estate Agents £1.6 Million for AML Failures</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> Risk Assessment</span> <span class="cust-bg-2"> AML Compliance</span> </p>
                                </div>
                                <div class="cust-st-data-text">

                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'nonCompliance',
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
                                                                'action' => 'searchDriven',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/search-driven.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    The Search-Driven <br> Consumer</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> gotomarket</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'searchDriven',
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
                                                                'action' => 'beyondFeatures',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="img/blog/insights.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Beyond Features: The DNA of Great Products</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> product engineering </span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'beyondFeatures',
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
                                                                'action' => 'benefitTrap',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/feature-benfit.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    The Feature/ <br> Benefit Trap</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> revOps</span> <span class="cust-bg-2"> automation</span> <span class="cust-bg-2"> gotomarket</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'benefitTrap',
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


        </div>
        <div class="row align-items-center justify-content-center mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="pagination-slide page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="pagination-slide page-link " href="<?php echo $this->Url->build([
                                                                                            'controller' => 'Blogs',
                                                                                            'action' => 'index',
                                                                                        ]); ?>"> 1 </a></li>
                    <li class="page-item"><a class=" pagination-slide page-link" href="<?php echo $this->Url->build([
                                                                                            'controller' => 'Blogs',
                                                                                            'action' => 'indexTwo',
                                                                                        ]); ?>"> 2 </a></li>
                    <li class="page-item active"><a class=" pagination-slide page-link" href="#">3</a></li>
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