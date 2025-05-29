<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<?php
$gtm = [
    ['engagingWithPrecisionAndImpact.jpeg', __('July, 2023'), __('Vivek Sharma'), __('Perfecting Your B2B Go-To-Market Strategy: Engaging with Precision and Impact'), __('If you\'re fully conversant with the significance of Go-To-Market (GTM) strategies in a B2B scenario and are gearing up to fine-tune or deploy your strategy, you\'ve successfully navigated to the "Fully Aware and Ready to Engage " stage. This stage demands precision, commitment, and strategic depth. In this blog, we will guide you on executing your GTM strategy with maximum impact in the B2B landscape.'), 'engagingWithPrecisionAndImpact'],
    ['b2bcase-study-banner3.jpg', __('Sep, 2023'), __('Vivek Sharma'), __('The Symbiotic Relationship Between Content Marketing, Market Intelligence, and Go-To-Market Strategies in Modern B2B Engagements'), __('In the competitive environment of B2B engagements, a comprehensive approach is essential for businesses to prosper. The interlinking of content marketing, market intelligence, and go-to-market (GTM) strategies is critical. In this article, we will explore the significance behind these pillars and how they work together.'), 'symbioticRelationship'],
    ['b2bcase-study-banner3.jpg', __('Nov, 2023'), __('Vivek Sharma'), __('Blueprint for a Successful Go-To-Market Launch'), __('In the intricate world of business, a successful product or service launch is akin to orchestrating a grand symphony. Each element must harmonise seamlessly, from the initial concept to full-scale execution.This is where the blueprint for a successful Go-To-Market (GTM) launch is set in motion, transitioning from the conceptual stage to full execution. In this blog, we will outline the key components of a successful GTM launch and how to navigate this critical phase.'), 'blueprintForASuccessfulGoToMarketLaunch'],
];
$total_data_gtm = count($gtm);

$cm = [
    ['elevatingExternalCommunication.jpeg', __('July, 2023'), __('Vivek Sharma'), __('Elevating B2B Content Marketing: Navigating Engagement Phase'), __('Welcome back to Accropolix! If you\'ve journeyed through the multi-faceted world of Content Marketing in the B2B environment and now stand prepared to optimize or deploy your strategies, you\'ve rightfully reached the "Fully Aware and Ready to Engage" milestone. At this juncture, it\'s not just about understanding the nuances; it\'s about making them work for you. In this discussion, we\'re delving deep into mastering the art and science of B2B content marketing at this pivotal stage.'), 'elevatingExternalCommunication'],
    ['b2bcase-study-banner11.jpg', __('Nov, 2023'), __('Vivek Sharma'), __('Crafting a Comprehensive Content Marketing Plan for your Organisation'), __('In today\'s interconnected world, effective content marketing is crucial for organizational success. To help you navigate this important aspect of your business strategy, I have created a concise step-by-step guide.'), 'craftingAnEffectiveExternalCommunicationPlan'],
    ['content marketing 30 .png', __('Jan, 2024'), __('Vivek Sharma'), __('Boosting Influence & Reach'), __('In the ever-evolving landscape of digital marketing, guest blogging stands out as a powerful strategy for businesses and individuals looking to enhance their online presence. This blog explores the ins and outs of guest blogging, shedding light on its benefits and offering practical insights to help you utilise this dynamic tool for building authority and expanding your reach.'), 'boostingInfluence'],
];
$total_data_cm = count($cm);

$ddlg = [
    ['b2bcase-study-banner10.jpg', __('Oct, 2023'), __('Vivek Sharma'), __('Implementing a Successful Data-Driven Lead Generation Strategy: Step-by-Step Guide'), __('In today\'s competitive business environment, a data-driven approach to lead generation is no longer optional—it\'s essential. But how do you transition from traditional methods to a strategy that harnesses the power of data?'), 'implementingASuccessfulDataDrivenLeadGenerationStrategy'],
];
$total_data_ddlg = count($ddlg);

$bi = [
    ['diveDeepAndDriveEngagement.jpeg', __('July, 2023'), __('Vivek Sharma'), __('Harnessing Market Business Intelligence in B2B: Dive Deep and Drive Engagement'), __('Greetings once again from Accropolix! If you\'ve been ardently following the trajectory of Market Business Intelligence (MBI) for B2B and are now poised to implement or enhance your strategies, you\'re at the pivotal "Fully Aware and Ready to Engage" stage. This phase isn\'t about the what or the why anymore—it\'s about the how. Today, we will delve into the sophisticated nuances of optimizing MBI for your B2B endeavors.'), 'diveDeepAndDriveEngagement'],
];
$total_data_bi = count($bi);

$tseo = [
    ['Tactical SEO 3 .png', __('Dec, 2023'), __('Vivek Sharma'), __('When to Update Your SEO Plan: Key Signals and Strategies for Success'), __('In the fast-paced world of digital marketing, staying on top of your SEO game is crucial. SEO is not a set-and-forget strategy; it\'s dynamic, evolving with search engine algorithms and industry trends.'), 'whenToUpdateYourSeoPlan'],
];
$total_data_tseo = count($tseo);

$ds = [
    ['Deep sales 1 png.png', __('Dec, 2023'), __('Vivek Sharma'), __('Maximizing B2B Product Sales Through Your Website'), __('In today’s digital-driven business world, your website is more than just a digital footprint; it’s a pivotal tool for B2B sales success. A well-structured website can be a powerful engine driving sales and growth.'), 'maximizingBTwoBProductSales'],
    ['deep sales 2 .png', __('Dec, 2023'), __('Vivek Sharma'), __('Enhancing Product Sales through a Strategic Social Media Content Plan'), __('In the digital era, social media is a powerful tool for businesses to amplify their product sales. With billions of users across various platforms, social media offers a vast audience for your products.'), 'enhancingProductSales'],
];
$total_data_ds = count($ds);
?>
<section class="hero-slider inner-hero blog-hero py-0">
    <div class="container">
        <div class="page-title-content">
            <h2><?php echo __('Blog') ?></h2>
            <ul>
                <li><a href="<?php echo $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'index',
                    ]) ?>"><?php echo __('Home') ?></a></li>
                <li><a href="<?php echo $this->Url->build([
                        'controller' => 'Blogs',
                        'action' => 'index',
                    ]) ?>"><?php echo __('Blog') ?></a></li>
                <li><?php echo __('Fully Aware And Ready To Engage') ?></li>
            </ul>
        </div>
    </div>
</section>
<section class="about-area pb-0">
    <div class="container">
        <h2 class="mb-4"><span class="color-text" data-aos="fade-up" data-aos-easing="ease"
                               data-aos-delay="800"><?php echo __('GTM') ?></span></h2>
        <div class="row d-flex align-items-center">
            <?php
            for ($i = $total_data_gtm - 1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/' . $gtm[$i][0] . '" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>' . $gtm[$i][1] . '</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>' . $gtm[$i][2] . '</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">' . $gtm[$i][3] . '</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">' . $gtm[$i][4] . '</p>
                         <a href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $gtm[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>' . __('Learn More') . '</span>  </a>
                    </div>
                </div>
            </div>
            ';
            }
            ?>
        </div>
    </div>
</section>
<section class="about-area pb-0">
    <div class="container">
        <h2 class="mb-4"><span class="color-text" data-aos="fade-up" data-aos-easing="ease"
                               data-aos-delay="800"><?php echo __('Content Marketing') ?></span></h2>
        <div class="row d-flex align-items-center">
            <?php
            for ($i = $total_data_cm - 1; $i >= 0; $i--) {
                echo '
                    <div class="col-md-4">
                        <div class="blog-multiple-column d-flex w-100 flex-column">
                            <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                                <img src="/img/blog/' . $cm[$i][0] . '" class="img-fluid" alt="">
                            </div>
                            <div class="blog-multiple-contentbox">
                                <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                                    <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>' . $cm[$i][1] . '</small>
                                    <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>' . $cm[$i][2] . '</small>
                                </p>
                                <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">' . $cm[$i][3] . '</h3>
                                <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">' . $cm[$i][4] . '</p>
                                 <a href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $cm[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>' . __('Learn More') . '</span>  </a>
                            </div>
                        </div>
                    </div>
                    ';
            }
            ?>
        </div>
    </div>
</section>
<section class="about-area pb-0">
    <div class="container">
        <h2 class="mb-4"><span class="color-text" data-aos="fade-up" data-aos-easing="ease"
                               data-aos-delay="800"><?php echo __('Data Driven Lead Generation') ?></span></h2>
        <div class="row d-flex align-items-center">
            <?php
            for ($i = $total_data_ddlg - 1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/' . $ddlg[$i][0] . '" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>' . $ddlg[$i][1] . '</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>' . $ddlg[$i][2] . '</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">' . $ddlg[$i][3] . '</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">' . $ddlg[$i][4] . '</p>
                         <a href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $ddlg[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>' . __('Learn More') . '</span>  </a>
                    </div>
                </div>
            </div>
            ';
            }
            ?>
        </div>
    </div>
</section>
<section class="about-area section-padding">
    <div class="container">
        <h2 class="mb-4"><span class="color-text" data-aos="fade-up" data-aos-easing="ease"
                               data-aos-delay="800"><?php echo __('BI ( Business Intelligence )') ?></span></h2>
        <div class="row d-flex align-items-center">
            <?php
            for ($i = $total_data_bi - 1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/' . $bi[$i][0] . '" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>' . $bi[$i][1] . '</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>' . $bi[$i][2] . '</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">' . $bi[$i][3] . '</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">' . $bi[$i][4] . '</p>
                         <a href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $bi[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>' . __('Learn More') . '</span>  </a>
                    </div>
                </div>
            </div>
            ';
            }
            ?>
        </div>
    </div>
</section>
<section class="about-area section-padding">
    <div class="container">
        <h2 class="mb-4"><span class="color-text" data-aos="fade-up" data-aos-easing="ease"
                               data-aos-delay="800"><?php echo __('Tactical SEO') ?></span></h2>
        <div class="row d-flex align-items-center">
            <?php
            for ($i = $total_data_tseo - 1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/' . $tseo[$i][0] . '" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>' . $tseo[$i][1] . '</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>' . $tseo[$i][2] . '</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">' . $tseo[$i][3] . '</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">' . $tseo[$i][4] . '</p>
                         <a href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $tseo[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>' . __('Learn More') . '</span>  </a>
                    </div>
                </div>
            </div>
            ';
            }
            ?>
        </div>
    </div>
</section>
<section class="about-area pb-0">
    <div class="container">
        <h2 class="mb-4"><span class="color-text" data-aos="fade-up" data-aos-easing="ease"
                               data-aos-delay="800"><?php echo __('Deep Sales') ?></span></h2>
        <div class="row d-flex align-items-center">
            <?php
            for ($i = $total_data_ds - 1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/' . $ds[$i][0] . '" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>' . $ds[$i][1] . '</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>' . $ds[$i][2] . '</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">' . $ds[$i][3] . '</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">' . $ds[$i][4] . '</p>
                         <a href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $ds[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>' . __('Learn More') . '</span>  </a>
                    </div>
                </div>
            </div>
            ';
            }
            ?>
        </div>
    </div>
</section>
