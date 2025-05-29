<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<?php
$blog = [
    ['leverage_blog.jpg', __('June, 2023'), __('Vivek Sharma'), __('Leveraging Data Analytics in Marketing: A Game Changer Across TOFU, MOFU, and BOFU'), __('The digital revolution has radically changed the marketing landscape, bringing data analytics to the forefront. As companies compete for attention in an increasingly crowded market, leveraging data to understand and guide marketing efforts has never been more critical. This aspect becomes especially relevant when considering the different stages of the customer journey, known as TOFU, MOFU, and BOFU, in marketing parlance.'), 'blogOne'],
    ['accel_blog.png', __('June, 2023'), __('Vivek Sharma'), __('Accelerating Careers, Amplifying Skills: Accropolix has a culture that fosters growth'), __('Accropolix is more than a business-to-business content marketing, go-to-market strategies, and business intelligence company. We are an energetic community of lifelong learners, innovative thinkers, and skill builders - all driven by a shared passion for shaping the future of strategic communications.'), 'blogTwo'],
    ['navi_blog.png', __('June, 2023'), __('Vivek Sharma'), __('Navigating the B2B Marketing Landscape: Building an Adaptive Strategy'), __('In the dynamic world of B2B marketing, adaptability has become a vital attribute for survival and success. With market trends constantly shifting and technology rapidly advancing, traditional linear marketing plans no longer suffice. It\'s time to embrace an adaptive strategy that allows businesses to respond quickly, explore uncertainty, and effectively manage stakeholders. This article will break down the essential building blocks for crafting such a strategy.'), 'blogThree'],
    ['b2bcase-study-banner5.jpg', __('Sep, 2023'), __('Vivek Sharma'), __('Leveraging WhatsApp Channels for B2B Brands'), __('WhatsApp, one of the world\'s most popular messaging apps, has recently introduced a new feature called WhatsApp Channels. This feature allows users to create one-way broadcast channels and share updates with their followers. It\'s a game-changer for businesses, especially B2B brands, looking to engage with their audience in a more personalized and efficient manner.'), 'leveragingWhatsAppChannels'],
];
$total_data = count($blog);
?>
<section class="hero-slider inner-hero blog-hero py-0">
    <div class="container">
        <div class="page-title-content">
            <h2><?php echo __('Blog')?></h2>
            <ul>
                <li><a href="<?php echo $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'index',
                    ])?>"><?php echo __('Home')?></a></li>
                <li><a href="<?php echo $this->Url->build([
                        'controller' => 'Blogs',
                        'action' => 'index',
                    ])?>"><?php echo __('Blog')?></a></li>
                <li><?php echo __('Additional Insights And White Paper')?></li>
            </ul>
        </div>
    </div>
</section>
<section class="about-area section-padding">
    <div class="container">
        <h2 class="mb-5"><span class="color-text" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800"><?php echo __('Trending News')?></span> </h2>
        <?php echo '
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="blog-single-column d-flex w-100 flex-column flex-lg-row">
                    <div class="blog-single-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/'. $blog[$total_data-1][0].'" class="img-fluid" alt="">
                    </div>
                    <div class="blog-single-contentbox">
                        <p class="mb-0" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>'.$blog[$total_data-1][1].'</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>'.$blog[$total_data-1][2].'</small>
                        </p>
                        <h2 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">'.$blog[$total_data-1][3].'</h2>
                        <p class="blog-single-text" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">'.$blog[$total_data-1][4].'</p>
                        <a href="'. $this->Url->build(['controller' => 'Blogs', 'action' => $blog[$total_data-1][5]]) . '" class="blog-read-more" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>'.__('Learn More').'</span>  </a>
                    </div>
                </div>
            </div>
        </div>
        '
        ?>
        <div class="row d-flex align-items-center mt-5">
            <?php
            for ($i = $total_data-1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/'.$blog[$i][0].'" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>'.$blog[$i][1].'</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>'.$blog[$i][2].'</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">'.$blog[$i][3].'</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">'.$blog[$i][4].'</p>
                         <a href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $blog[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>'.__('Learn More').'</span>  </a>
                    </div>
                </div>
            </div>
            '; }
            ?>
        </div>
    </div>
</section>
