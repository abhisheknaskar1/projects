<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-lg-6 left-hero" data-aos="fade-up" data-aos-duration="300">
                <div class="page-title-content text-left">
                    <ul class="mb-4 list-disc">
                        <li><a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'index',
                            ]); ?>" class="text-dark"><?php echo __('Home'); ?></a></li>
                        <li><a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'caseStudy',
                            ]); ?>" class="text-dark"><?php echo __('Case Studies'); ?></a></li>
                        <li><?php echo __('Go To Market'); ?></li>
                    </ul>
                </div>
                <h1 class="font-weight-bold mb-4">
                    <?php echo __('A Founder\'s Personal Account: Our Digital Transformation with Accropolix'); ?>
                </h1>
                <p class="mb-4">
                    <?php echo __('As someone who has poured heart and soul into
                    building a chartered secretary practice here in
                    Singapore, I\'ve experienced the rollercoaster of entrepreneurship in a bustling, competitive city.
                    The journey we\'ve embarked on with
                    Accropolix is a story of transformation and triumph - a narrative
                    I\'m eager to share.'); ?>
                </p>
            </div>
            <div class="col-lg-6 right-hero" data-aos="zoom-in" data-aos-duration="200">
                <?php echo $this->Html->image(
                    '/img/GTMtranspnt 1.png',
                    ['class' => 'img-fluid animated', 'alt' => '']
                ); ?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Facing the Goliaths: Our Early Struggles'); ?>
                    </h3>
                    <p>
                        <?php echo __('Starting my own practice was driven by a passion for
                        excellence in corporate compliance and
                        advisory services. Yet, despite our team\'s deep expertise and commitment, we found ourselves
                        grappling with the giants of the industry. Our services were top-notch, but our voice was
                        getting lost in the crowd. We were at a crossroads, with our client acquisition stagnating at
                        about 5% annually.'); ?>
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy
                        A Fresh Perspective with Accropolix'); ?>
                    </h3>
                    <p>
                        <?php echo __('Enter Accropolix, and with them, a breath of fresh air into our strategy:'); ?>
                    </p>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('<strong>Redefining Our Digital Footprint:</strong>
                            We revamped our online presence, a move that skyrocketed our engagement by 70%. Our website
                            wasn\'t just a site; it became a digital handshake to our potential clients.'); ?>
                        </li>
                        <li>
                            <?php echo __('<strong>Establishing Thought Leadership:</strong>
                            We started sharing our insights and expertise through articles and guides. This wasn\'t just
                            content; it was our voice in the industry, leading to a 40% jump in lead generation.'); ?>
                        </li>
                        <li>
                            <?php echo __('<strong>Expanding Our Horizons:</strong>
                            Actively engaging in industry events, we weren’t just attendees but became a part of a
                            larger conversation. This led to a 30% boost in strategic partnerships, connecting us with
                            peers and clients alike.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Embracing Change: A Cultural ShiftEmbracing Change: A Cultural Shift'); ?>
                    </h3>
                    <p>
                        <?php echo __('This wasn\'t merely a strategy shift; it was a paradigm
                        change for us at EliteCorp. We weren’t
                        just implementing new tactics; we were evolving, learning to make decisions rooted in data, and
                        stepping out with a proactive stance in the market.'); ?>
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold"><?php echo __('Beyond Expectations: Our Growth Story'); ?>
                    </h3>
                    <p>
                        <?php echo __('The numbers tell a compelling tale. In just one year,
                        we saw an 80% surge in client inquiries
                        and a 60% increase in our client base. More than that, our brand began to resonate more
                        powerfully in the market, evidenced by a 50% rise in referrals.'); ?>
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold"><?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy
                        Lessons and Horizons'); ?>
                    </h3>
                    <p>
                        <?php echo __('This journey with Accropolix taught us the power of
                        adaptability and the need for a dynamic
                        approach in today’s fast-paced market. As I look ahead, I see a path of continued collaboration
                        with Accropolix, exploring new frontiers together.'); ?>
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold"><?php echo __('More Than Numbers:
                    Our Story of Innovation and Resilience'); ?>
                    </h3>
                    <p>
                        <?php echo __('This success story isn\'t just about growth
                         metrics; it\'s a testament to our resilience, our
                        willingness to innovate, and our partnership with Accropolix. It\'s about how we transformed our
                        practice, not just in terms of digital presence but in our very approach to doing business in
                        Singapore’s vibrant landscape.'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->element('contact_1'); ?>
