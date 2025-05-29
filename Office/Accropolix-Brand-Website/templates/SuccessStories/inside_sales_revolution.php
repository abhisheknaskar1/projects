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
                    <ul class="mb-4">
                        <li><a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'index',
                            ]); ?>" class="text-dark"><?php echo __('Home'); ?></a></li>
                        <li><a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'caseStudy',
                            ]); ?>" class="text-dark"><?php echo __('Case Studies'); ?></a></li>
                        <li><?php echo __('Inside Sales'); ?></li>
                    </ul>
                </div>
                <h1 class="font-weight-bold mb-4">
                    <?php echo __('Inside Sales Revolution- A Strategic Partnership With Accropolix'); ?>
                </h1>
                <p class="mb-4">
                    <?php echo __('From the Viewpoint of a Tech CEO'); ?>
                </p>
                <p>
                    <?php echo __('In navigating the ever-changing tech industry, our company teamed
                     up with Accropolix to transform our inside sales strategy. As the CEO, I\'m excited to
                     share our success story and the impact of this partnership.'); ?>
                </p>
            </div>
            <div class="col-lg-6 right-hero" data-aos="zoom-in" data-aos-duration="200">
                <?php echo $this->Html->image(
                    '/img/inside sales trnspnt .png',
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
                        <?php echo __('Surface Challenges:'); ?>
                    </h3>
                    <ul class="list-disc pl-4">
                        <li>
                            <?php echo __('Stagnant Lead Generation: Limited to a slow 5%, negatively
                            impacting potential leads.'); ?>
                        </li>
                        <li>
                            <?php echo __('Engaging a niche audience proved challenging, with a meagre
                            120 social media followers and
                            infrequent interactions.Sub-optimal Inside Sales Figures: Modest growth at 2%, indicating
                            slower progress.'); ?>
                        </li>
                        <li>
                            <?php echo __('Customer Engagement Deficiency: Limited improvement at 6% over a year,
                             hindering meaningful audience connection.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Deeper Challenges:'); ?>
                    </h3>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('Limited Online Visibility: A modest 30 monthly visitors,
                            struggling to reach a broader online audience.'); ?>
                        </li>
                        <li>
                            <?php echo __('Conversion Rate Challenges: Stagnant at 2%, creating
                            difficulties in converting leads to customers.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Findings:'); ?>
                    </h3>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('Outdated lead generation methods impacted potential leads,
                            prompting a shift towards contemporary and effective approaches.'); ?>
                        </li>
                        <li>
                            <?php echo __('Mismatched content strategies hindered meaningful audience connection'); ?>
                        </li>
                        <li>
                            <?php echo __('Insufficient digital marketing presence constrained online visibility,
                             requiring robust efforts to attract more monthly visitors.'); ?>
                        </li>
                        <li>
                            <?php echo __('Ineffective conversion tactics contributed to a stagnant
                            conversion rate, prompting the need for more impactful strategies.'); ?>
                        </li>
                        <li>
                            <?php echo __('Communication gaps within the sales pipeline slowed down
                            progression, prompting targeted adjustments for acceleration.'); ?>
                        </li>
                        <li>
                            <?php echo __('Lack of personalization in communication hindered engagement,
                             guiding efforts towards tailored strategies for improvement.'); ?>
                        </li>
                        <li>
                            <?php echo __('Ineffective follow-up strategies during the conversion
                            process contributed to a stagnant conversion rate'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Solution:'); ?>
                    </h3>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('Data-Driven Precision: They carefully analysed data to find
                             valuable leads, making our approach better.'); ?>
                        </li>
                        <li>
                            <?php echo __('Strategic Engagement: They created personalised sales messages
                             to help us connect better
                            with customers.'); ?>
                        </li>
                        <li>
                            <?php echo __('Sales Team Empowerment: They revamped our sales training,
                            focusing on tactics to convert more customers.'); ?>
                        </li>
                        <li>
                            <?php echo __('Integrated Marketing Amplification: They coordinated online
                             campaigns to strategically boost our brand presence.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Results:'); ?>
                    </h3>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('Increased Leads: Within six months, they boosted our lead
                            generation by a solid 22%, marking
                            a big improvement.'); ?>
                        </li>
                        <li>
                            <?php echo __('Higher Sales: Surpassing expectations, our inside sales figures
                             shot up by an impressive 27%.'); ?>
                        </li>
                        <li>
                            <?php echo __('Better Engagement: They deepened connections with our audience,
                            with a remarkable 24% improvement in engagement metrics.'); ?>
                        </li>
                        <li>
                            <?php echo __('More Online Visibility: Monthly unique visitors crossed 100,
                            a significant jump in our online presence.'); ?>
                        </li>
                        <li>
                            <?php echo __('Improved Conversions: Our conversion rate hit a strong 7%, showing
                             a significant boost in turning leads into customers.'); ?>
                        </li>
                        <li>
                            <?php echo __('Faster Sales Pipeline: Our business gained momentum
                             with a noticeable acceleration in the sales pipeline.'); ?>
                        </li>
                    </ul>
                    <p>
                        <?php echo __('I am thrilled to share that our
                        collaboration with Accropolix has been a game-changer,
                        propelling our business to new heights. Looking ahead, our partnership with Accropolix is poised
                        to unlock new horizons, redefining our success in the dynamic tech industry.'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->element('contact_1'); ?>
