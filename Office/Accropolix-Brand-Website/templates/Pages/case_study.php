<?php
declare(strict_types=1);

/**
 * @var App\View\AppView $this
 */
?>
<?php
$tseo = [
    ['success-tactical-seo1.png', __('Dec, 2023'), __('Vivek Sharma'), __('A Personal Reflection: Our Digital Odyssey with Accropolix'), __('From the Desk of a Cyber Security firm’s Founder and Chief Revenue Officer
As the founder and CRO, I\'ve navigated through the turbulent waters of the cybersecurity industry, where standing out in the digital realm is as challenging as combating the latest cyber threats.'), 'aPersonalReflection'],
  ];
$total_data_tseo = count($tseo);

$gtm = [
    ['GTM(1).png',  __('Dec, 2023'), __('Vivek Sharma'), __('A Founder\'s Personal Account Our Digital Transformation with Accropolix'), __('As someone who has poured heart and soul into building a chartered secretary practice here in Singapore, I\'ve experienced the rollercoaster of entrepreneurship in a bustling, competitive city. The journey we\'ve embarked on with Accropolix is a story of transformation and triumph - a narrative I\'m eager to share.'), 'aFounderPersonalAccount'],
    ];
$total_data_gtm = count($gtm);

$ds = [
    ['success-Deep sales1.png', __('Dec, 2023'), __('Vivek Sharma'), __('A Game-Changing Partnership: How Deep Sales Approach Revitalized Our Sales Strategy - A Personal Account by a SaaS CMO'), __('As the Chief Marketing Officer, I\'ve had the pleasure of overseeing many transformative initiatives, but our collaboration with Accropolix stands out as a particularly remarkable journey.'), 'aGameChangingPartnership'],
];
$total_data_ds = count($ds);

$cm = [
    ['Content Marketing.png', __('Jan, 2024'), __('Vivek Sharma'), __('Leveraging Content Marketing to Drive Client Growth'), __('From the Viewpoint of a Chief Innovation Officer

As the Chief Innovation Officer steering our technology-driven company, I am thrilled to unveil the transformative impact of our collaboration with Accropolix, a partnership that revolutionised our approach to content marketing.

'), 'leveragingContentMarketing'],
];
$total_data_cm = count($ds);

$is = [
    ['inside sales .png', __('Jan, 2024'), __('Vivek Sharma'), __('Inside Sales Revolution- A Strategic Partnership With Accropolix'), __('From the Viewpoint of a Tech CEO

In navigating the ever-changing tech industry, our company teamed up with Accropolix to transform our inside sales strategy. As the CEO, I\'m excited to share our success story and the impact of this partnership.'), 'insideSalesRevolution'],
];
$total_data_is = count($is);

$sdr = [
    ['sdr.png', __('Jan, 2024'), __('Vivek Sharma'), __('Triumph in Sales Development - The Accropolix Strategy'), __('From the Viewpoint of a Sales Development Manager

In the ever-evolving world of sales development, our team aimed to improve our strategies and streamline our processes. Collaborating with Accropolix proved to be a game-changer, transforming how we work and bringing impressive success.'), 'triumphInSalesDevelopment'],
];
$total_data_sdr = count($sdr);
?>
<section class="hero-slider inner-hero blog-hero py-0">
    <div class="container">
        <div class="page-title-content">
            <h2><?php echo __('Case Studies')?></h2>
            <ul>
                <li><a href="<?php echo $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'index',
                    ])?>"><?php echo __('Home')?></a></li>
                <li><a href="<?php echo $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'caseStudy',
                    ])?>"><?php echo __('Case Studies')?></a></li>
            </ul>
        </div>
    </div>
</section>
<section class="about-area pb-0">
    <div class="container">
        <h2 class="mb-5"><span class="color-text" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800"><?php echo __('Tactial SEO')?></span> </h2>
        <div class="row d-flex align-items-center mt-5">
            <?php
            for ($i = $total_data_tseo-1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/'.$tseo[$i][0].'" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>'.$tseo[$i][1].'</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>'.$tseo[$i][2].'</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">'.$tseo[$i][3].'</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">'.$tseo[$i][4].'</p>
                         <a href="' . $this->Url->build(['controller' => 'SuccessStories', 'action' => $tseo[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>'.__('Learn More').'</span>  </a>
                    </div>
                </div>
            </div>
            '; }
            ?>
        </div>
    </div>
</section>
<section class="about-area pb-0">
    <div class="container">
        <h2 class="mb-4"><span class="color-text" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800"><?php echo __('GTM')?></span> </h2>
        <div class="row d-flex align-items-center">
            <?php
            for ($i = $total_data_gtm-1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/'.$gtm[$i][0].'" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>'.$gtm[$i][1].'</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>'.$gtm[$i][2].'</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">'.$gtm[$i][3].'</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">'.$gtm[$i][4].'</p>
                         <a href="' . $this->Url->build(['controller' => 'SuccessStories', 'action' => $gtm[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>'.__('Learn More').'</span>  </a>
                    </div>
                </div>
            </div>
            '; }
            ?>
        </div>
    </div>
</section>
<section class="about-area pb-0">
    <div class="container">
        <h2 class="mb-4"><span class="color-text" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800"><?php echo __('Deep Sales')?></span> </h2>
        <div class="row d-flex align-items-center">
            <?php
            for ($i = $total_data_ds-1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/'.$ds[$i][0].'" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>'.$ds[$i][1].'</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>'.$ds[$i][2].'</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">'.$ds[$i][3].'</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">'.$ds[$i][4].'</p>
                         <a href="' . $this->Url->build(['controller' => 'SuccessStories', 'action' => $ds[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>'.__('Learn More').'</span>  </a>
                    </div>
                </div>
            </div>
            '; }
            ?>
        </div>
    </div>
</section>
<section class="about-area pb-0">
    <div class="container">
        <h2 class="mb-4"><span class="color-text" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800"><?php echo __('Content Marketing')?></span> </h2>
        <div class="row d-flex align-items-center">
            <?php
            for ($i = $total_data_cm-1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/'.$cm[$i][0].'" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>'.$cm[$i][1].'</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>'.$cm[$i][2].'</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">'.$cm[$i][3].'</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">'.$cm[$i][4].'</p>
                         <a href="' . $this->Url->build(['controller' => 'SuccessStories', 'action' => $cm[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>'.__('Learn More').'</span>  </a>
                    </div>
                </div>
            </div>
            '; }
            ?>
        </div>
    </div>
</section>
<section class="about-area pb-0">
    <div class="container">
        <h2 class="mb-4"><span class="color-text" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800"><?php echo __('Inside Sales')?></span> </h2>
        <div class="row d-flex align-items-center">
            <?php
            for ($i = $total_data_is-1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/'.$is[$i][0].'" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>'.$is[$i][1].'</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>'.$is[$i][2].'</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">'.$is[$i][3].'</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">'.$is[$i][4].'</p>
                         <a href="' . $this->Url->build(['controller' => 'SuccessStories', 'action' => $is[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>'.__('Learn More').'</span>  </a>
                    </div>
                </div>
            </div>
            '; }
            ?>
        </div>
    </div>
</section>
<section class="about-area pb-0">
    <div class="container">
        <h2 class="mb-4"><span class="color-text" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800"><?php echo __('SDR')?></span> </h2>
        <div class="row d-flex align-items-center">
            <?php
            for ($i = $total_data_sdr-1; $i >= 0; $i--) {
                echo '
            <div class="col-md-4">
                <div class="blog-multiple-column d-flex w-100 flex-column">
                    <div class="blog-multiple-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <img src="/img/blog/'.$sdr[$i][0].'" class="img-fluid" alt="">
                    </div>
                    <div class="blog-multiple-contentbox">
                        <p class="mb-0"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>'.$sdr[$i][1].'</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>'.$sdr[$i][2].'</small>
                        </p>
                        <h3 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">'.$sdr[$i][3].'</h3>
                        <p class="blog-multiple-text"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">'.$sdr[$i][4].'</p>
                         <a href="' . $this->Url->build(['controller' => 'SuccessStories', 'action' => $sdr[$i][5]]) . '" class="blog-read-more"  data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><span>'.__('Learn More').'</span>  </a>
                    </div>
                </div>
            </div>
            '; }
            ?>
        </div>
    </div>
</section>
