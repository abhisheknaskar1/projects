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
                                                                'action' => 'accelerateSalesClosure',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/accelerate-sales-closure.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Accelerate Sales <br> Closure</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> automation</span> <span class="cust-bg-2"> marketresearch </span> <span class="cust-bg-2"> gotomarket</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'accelerateSalesClosure',
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
            <div class="col-md-4 mb-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <a style="text-decoration: none;" href="<?php echo $this->Url->build([
                                                                'controller' => 'Blogs',
                                                                'action' => 'outreach',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/cold-email.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Is Cold Email Dead? Building Stronger B2B Outreach Strategies in the Age of Privacy</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> salesacceleration</span> <span class="cust-bg-2"> gotomarket</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'outreach',
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
                                                                'action' => 'marketing',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/navigating-the.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Navigating the Final Hurdle in B2B Marketing: Overcoming Resistance to Change</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> salesacceleration</span> <span class="cust-bg-2"> gotomarket</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'marketing',
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
                                                                'action' => 'salesSuccess',
                                                            ]); ?>">
                        <div class="cust-gallery-product">
                            <div class="cust-gallery-product-img">
                                <img src="/img/blog/close-b2b-sales.webp" class="img-fluid">
                            </div>
                            <div class="cust-gallery-product-text text-compile">
                                <h4 class="font-weight-bold text-dark">
                                    Close B2B deals: The Way Modern Buyer Prefers</h4>
                                <div class="cust-st-data-text mt-2">
                                    <p><span class="cust-bg-1"> salesacceleration</span> <span class="cust-bg-2"> gotomarket</span></p>
                                </div>
                                <div class="cust-st-data-text">
                                    <div class="mb-2">
                                        <a class="btn show-btn" href="<?php echo $this->Url->build([
                                                                            'controller' => 'Blogs',
                                                                            'action' => 'salesSuccess',
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
                    <li class="page-item"><a class=" pagination-slide page-link" href="<?php echo $this->Url->build([
                                                                                            'controller' => 'Blogs',
                                                                                            'action' => 'indexThree',
                                                                                        ]); ?>"> 3 </a></li>
                    <li class="page-item active"><a class=" pagination-slide page-link" href="#">4</a></li>
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