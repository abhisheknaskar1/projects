<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
$this->disableAutoLayout();
?>
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

/**
 * @var string $titleForLayout
 * @var string $title
 * @var string $desc
 * @var string $keywords
 * @var string $ogImage
 * @var string $ogUrl
 */
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titleForLayout ?? __('') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo $this->Url->image('favicon.png')?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"">
    <meta name="title" content="<?php echo $title ?? __(''); ?>">
    <meta name="description" content="<?php echo $desc ?? __(''); ?>">
    <meta name="keywords" content="<?php echo $keywords ?? __(''); ?>">
    <meta property="og:url" content="<?php echo $this->Url->build('https://www.accropolix.ai/'.$ogUrl) ?? __('')?>" />
    <meta property="og:title" content="<?php echo $title ?? __('');?>" />
    <meta property="og:description" content="<?php echo $desc ?? __(''); ?>" />
    <meta property="title" content="<?php echo $title ?? __(''); ?>" />
    <meta property="description" content="<?php echo $desc ?? __(''); ?>" />
    <meta property="keywords" content="<?php echo $keywords ?? __(''); ?>" />
    <meta property="og:image" content="<?php echo $this->Url->image('https://www.accropolix.ai'.$ogImage) ?? $this->Url->image('https://www.accropolix.ai/img/banner2.jpg')?>" />
    <meta property="og:title" content="<?php echo $title ?? __('');?>" />
    <meta property="og:description" content="<?php echo $desc ?? __(''); ?>" />
    <meta name="robots" content="index,follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 day">
    <link rel="canonical" href="<?php echo $this->Url->build('https://www.accropolix.ai/'.$ogUrl) ?? __('')?>" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.0/css/all.min.css">
    <link rel="stylesheet" href="assets/aos/aos.css">
    <link rel="stylesheet" href="assets/slick/slick.css">
    <link rel="stylesheet" href="assets/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="casestudy-pagebody">
<?php echo $this->element('header')?>
    <main>
        <section class="hero-slider inner-hero b2bcasestudy-hero py-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="page-title-content">
                            <h2 class="mb-4">Shopify's StoreKit Campaign</h2>
                            <p class="text-white mb-4">Shopify launched the StoreKit campaign in 2023 to help small
                                businesses create and run their own online stores. The campaign was designed to address
                                the needs of small businesses, which often lack the resources and expertise to build and
                                maintain an online store.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2 class="font-weight-bold mb-5">The Goals</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6 mb-4 d-flex">
                                <div class="card bg-danger text-white w-100">
                                    <div class="card-body">
                                        <h4 class="font-weight-bold">Increase Awareness</h4>
                                        <p>
                                            The campaign aimed to create awareness among small businesses of the
                                            benefits of using Shopify to create and run an online store.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4 d-flex">
                                <div class="card bg-danger text-white w-100">
                                    <div class="card-body">
                                        <h4 class="font-weight-bold">Educate Small Businesses</h4>
                                        <p>
                                            The campaign sought to educate small businesses about the benefits of using
                                            Shopify and StoreKit so that they could grow their online presence.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-4 d-flex">
                                <div class="card bg-danger text-white w-100">
                                    <div class="card-body">
                                        <h4 class="font-weight-bold">Generate Leads and Sales</h4>
                                        <p>
                                            The ultimate goal of the campaign was to generate high-quality leads and
                                            sales for Shopify.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2 class="font-weight-bold mb-5">Various Tactics Used</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6 d-flex mb-4">
                                <div class="card w-100">
                                    <?php echo $this->Html->image('/img/landing-page.png', ['class' => 'card-img-top', 'alt'=> 'Card image cap'])?>
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Landing Page</h5>
                                        <p class="card-text">A landing page was created which highlighted the benefits
                                            of StoreKit and featured success stories from real customers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex mb-4">
                                <div class="card w-100">
                                    <?php echo $this->Html->image('/img/webiner.png', ['class' => 'card-img-top', 'alt'=> 'Card image cap'])?>
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Webinars</h5>
                                        <p class="card-text">A series of webinars was held during the campaign to teach
                                            small business owners how to use StoreKit and other Shopify tools to grow
                                            their online presence.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex mb-4">
                                <div class="card w-100">
                                    <?php echo $this->Html->image('/img/social-media.png', ['class' => 'card-img-top', 'alt'=> 'Card image cap'])?>
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Social Media Campaign</h5>
                                        <p class="card-text">A social media campaign was launched, using the hashtag
                                            #StoreKit, that encouraged users to share their own stories and tips.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex mb-4">
                                <div class="card w-100">
                                    <?php echo $this->Html->image('/img/video-series.jpg', ['class' => 'card-img-top', 'alt'=> 'Card image cap'])?>
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Video Series</h5>
                                        <p class="card-text">A video series was published that followed the journey of
                                            four small businesses as they built and launched their online stores with
                                            StoreKit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2 class="font-weight-bold mb-5">Successful Results Achieved</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <section class="ps-timeline-sec py-0">
                            <div class="container">
                                <ol class="ps-timeline">
                                    <li>
                                        <div class="img-handler-top">
                                            <h4 class="font-weight-bold">1.5 Million Views</h4>
                                            <p>The landing page created for the campaign received more than 1.5 million views from potential customers.</p>
                                        </div>
                                        <span class="ps-sp-top">1</span>
                                    </li>
                                    <li>
                                        <div class="img-handler-bot">
                                            <h4 class="font-weight-bold">50,000 Sign-Ups</h4>
                                            <p>The webinars held during the campaign attracted over 50,000 sign-ups from small business owners.</p>
                                        </div>
                                        <span class="ps-sp-bot">2</span>
                                    </li>
                                    <li>
                                        <div class="img-handler-top">
                                            <h4 class="font-weight-bold">10,000 Social Media Posts</h4>
                                            <p>The campaign generated over 10,000 social media posts using the hashtag #StoreKit.</p>
                                        </div>
                                        <span class="ps-sp-top">3</span>
                                    </li>
                                    <li>
                                        <div class="img-handler-bot">
                                            <h4 class="font-weight-bold">2 Million Views</h4>
                                            <p>The video series created for the campaign was viewed over 2 million times.</p>
                                        </div>
                                        <span class="ps-sp-bot">4</span>
                                    </li>
                                </ol>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2 class="font-weight-bold mb-5">Multiple Takeaways</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6 mb-4 d-flex">
                                <div class="d-flex align-items-start">
                                    <span class="mr-3 bg-danger p-3">
                                        <h4 class="mb-0 text-white">1</h4>
                                    </span>
                                    <div>
                                        <h4 class="font-weight-bold">
                                            Understand Your Target Audience
                                        </h4>
                                        <p>
                                            The first step is to understand your target audience to create a successful B2B marketing campaign.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4 d-flex">
                                <div class="d-flex align-items-start">
                                    <span class="mr-3 bg-danger p-3">
                                        <h4 class="mb-0 text-white">2</h4>
                                    </span>
                                    <div>
                                        <h4 class="font-weight-bold">
                                            Use a Variety of Channels
                                        </h4>
                                        <p>
                                            Use a variety of channels, such as social media, email marketing, and paid advertising, to reach as many people as possible.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4 d-flex">
                                <div class="d-flex align-items-start">
                                    <span class="mr-3 bg-danger p-3">
                                        <h4 class="mb-0 text-white">3</h4>
                                    </span>
                                    <div>
                                        <h4 class="font-weight-bold">
                                            Create Engaging Content
                                        </h4>
                                        <p>
                                            Create content that is both engaging and informative to earn the trust of your target audience.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4 d-flex">
                                <div class="d-flex align-items-start">
                                    <span class="mr-3 bg-danger p-3">
                                        <h4 class="mb-0 text-white">4</h4>
                                    </span>
                                    <div>
                                        <h4 class="font-weight-bold">
                                            Track Your Results
                                        </h4>
                                        <p>
                                            Track the results of your B2B marketing campaign to see what's working and what's not. This will help you optimize your campaign and improve your results over time.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-dark">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 mb-5">
                        <h2 class="font-weight-bold text-white" data-aos="fade-up" data-aos-easing="ease"
                            data-aos-delay="800">Lessons Learned</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <div class="row">
                            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                                <div class="card rounded-lg">
                                    <div class="card-body">
                                        <h3 class="font-weight-bold">#1</h3>
                                        <h4>Personas</h4>
                                        <div class="bg-danger my-3 rounded-lg" style="width: 50px; height: 5px;"></div>
                                        <p>Create personas: Shopify created personas to map customer journeys for StoreKit's successful launch.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="font-weight-bold">#2</h3>
                                        <h4>Benefits over Features</h4>
                                        <div class="bg-danger my-3 rounded-lg" style="width: 50px; height: 5px;"></div>
                                        <p>Focus on the benefits of your product, not just the features. Shopify's StoreKit campaign emphasized how Shopify could help small businesses save time and money.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="font-weight-bold">#3</h3>
                                        <h4>Make Learning Fun</h4>
                                        <div class="bg-danger my-3 rounded-lg" style="width: 50px; height: 5px;"></div>
                                        <p>Make learning fun and engaging: Shopify used webinars, a video series, and social media campaigns to teach small business owners about StoreKit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'contact',
                        ])?>">
                            <button type="button" class="btn btn-outline-danger" style="margin-top: 40px">Contact Us</button></a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2 class="font-weight-bold mb-4">Disclaimer</h2>
                        <div class="card bg-danger">
                            <div class="card-body text-white">
                                <p>
                                    This article is purely for informational and educational purposes. Accropolix has solely based its findings and analysis on publicly available information. We were not involved, directly or indirectly, in the Shopify Store Kit Campaign, nor do we claim any association with the same. The intent of this case study is to share insights, best practices, and trends with our team and clients. Any views or opinions presented in this case study are solely those of Accropolix and do not represent those of Shopify or any other entities related to the campaign.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php echo $this->element('footer')?>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="assets/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"></script>
    <script src="assets/aos/aos.js"></script>
    <script src="assets/counter/active.js"></script>
    <script src="js/main.js"></script>
</body>

