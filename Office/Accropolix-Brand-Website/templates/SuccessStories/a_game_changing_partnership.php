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
                        <li><?php echo __('Deep Sales'); ?></li>
                    </ul>
                </div>
                <h1 class="font-weight-bold mb-4">
                    <?php echo __('A Game-Changing Partnership: How Deep Sales Approach Revitalized Our Sales Strategy
                    <small>- A Personal Account by a SaaS CMO</small>'); ?>
                </h1>
                <p class="mb-4">
                    <?php echo __('As the Chief Marketing Officer, I\'ve had the pleasure of overseeing many
                    transformative initiatives,
                    but our collaboration with Accropolix stands out as a particularly remarkable journey.'); ?>
                </p>
                <p>
                    <?php echo __('Our ambition was to not just compete but lead in the cloud-based CRM
                     market for SMBs. Yet, despite
                    having cutting-edge solutions, we were grappling with underwhelming market penetration and stagnant
                    sales figures.'); ?>
                </p>
            </div>
            <div class="col-lg-6 right-hero" data-aos="zoom-in" data-aos-duration="200">
                <?php echo $this->Html->image(
                    '/img/success-Deep Sales1-transpnt.png',
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
                        <?php echo __('The Challenge: A Crowded Market and Unmet Potential'); ?>
                    </h3>
                    <p>
                        <?php echo __('When I joined, I immediately noticed our struggle to carve out a
                        significant share in a market
                        dominated by giants. Our sales were plateauing at around $5 million annually, a modest figure
                        given our potential.'); ?>
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold"><?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy
                        The challenge was two fold:'); ?>
                    </h3>
                    <ol type="1" class="pl-4" style="list-style: inherit;">
                        <li><?php echo __('Reaching our ideal customers and,'); ?></li>
                        <li><?php echo __('Effectively conveying the unique benefits of our solutions.'); ?></li>
                    </ol>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy
                        The Accropolix Solution: A Tailored, Data-Driven Approach'); ?>
                    </h3>
                    <p>
                        <?php echo __('Accropolix introduced a \'Deep Sales Strategy\' that was revolutionary.
                        This strategy included:'); ?>
                    </p>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('<strong>Targeted Analytics:</strong>
                            Pinpointing potential high-value clients through sophisticated market analysis.'); ?>
                        </li>
                        <li>
                            <?php echo __('<strong>Customized Engagement:</strong>
                            Crafting sales pitches specifically designed for diverse market segments.'); ?>
                        </li>
                        <li>
                            <?php echo __('<strong>Sales Empowerment:</strong>
                            Begin with an audit to identify areas that need improvement.'); ?>

                        </li>
                        <li>
                            <?php echo __('<strong>Integrated Marketing Push:</strong>
                            Amplifying our presence through coordinated digital campaigns.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('The Rollout: Overcoming Hurdles and Embracing Change'); ?>
                    </h3>
                    <p>
                        <?php echo __('Implementing this strategy wasn\'t without its challenges. We had to
                        recalibrate our team\'s
                        mindset and refine our approach based on ongoing data feedback. But as the results started
                        showing, the entire team rallied behind the new direction.'); ?>
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('The Impact: Quantifiable Success'); ?>
                    </h3>
                    <ul class="pl-4 list-disc">
                        <li>
                            <?php echo __('- The numbers speak for themselves. In just six months, our lead
                            generation spiked by 60%,
                            and our sales figures surged to $8 million, marking a significant 60% increase.'); ?>
                        </li>
                        <li>
                            <?php echo __('- Our customer engagement metrics saw an impressive 50% improvement,
                            and brand recognition
                            metrics in our target markets doubled.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy
                        In Their Words: Accropolix’s Impact'); ?>
                    </h3>
                    <p>
                        <?php echo __('“Our partnership with Accropolix has been nothing short of
                         transformative,” says our CEO. “Their
                        strategic acumen and deep understanding of our market have been crucial in scaling our business
                        to new heights.”'); ?>
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Showcasing Our Growth: The Power of Data'); ?>
                    </h3>
                    <p>
                        <?php echo __('We\'ve included detailed infographics in our report, showcasing our sales
                         growth, lead conversion
                        rates, and market positioning compared to key competitors before and after the Accropolix
                        intervention.'); ?>
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Lessons Learned: The Future is Data-Driven and Personalized'); ?>
                    </h3>
                    <p>
                        <?php echo __('This experience has been enlightening, underscoring the necessity of
                        a data-driven approach and
                        the power of personalization in the SaaS industry.'); ?>
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('A New Narrative: Telling Our Story'); ?>
                    </h3>
                    <p>
                        <?php echo __('This success story isn\'t just about numbers; it\'s about transformation,
                         teamwork, and the
                        triumph of innovation. It\'s a narrative that speaks how Accropolix put their heart into what
                        they do and deliver what they committed.'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->element('contact_1'); ?>
