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
                        <li><?php echo __('SDR'); ?></li>
                    </ul>
                </div>
                <h1 class="font-weight-bold mb-4">
                    <?php echo __('Triumph in Sales Development - The Accropolix Strategy'); ?>
                </h1>
                <p class="mb-4">
                    <?php echo __('From the Viewpoint of a Sales Development Manager'); ?>
                </p>
                <p>
                    <?php echo __('In the ever-evolving world of sales development, our team aimed to
                    improve our strategies and
                    streamline our processes. Collaborating with Accropolix proved to be a game-changer, transforming
                    how we work and bringing impressive success.'); ?>
                </p>
            </div>
            <div class="col-lg-6 right-hero" data-aos="zoom-in" data-aos-duration="200">
                <?php echo $this->Html->image(
                    '/img/SDR trnspnt .png',
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
                            <?php echo __('Slow Lead Growth: Our ability to attract new leads was stuck at
                            just 7%, making it tough to
                            expand our customer base.'); ?>
                        </li>
                        <li>
                            <?php echo __('Sluggish Sales Pipeline: The process from lead to sale was moving
                            at a slow pace, growing by
                            only 3% over the past year and slowing down our overall business progress.'); ?>
                        </li>
                        <li>
                            <?php echo __('Engagement Struggles: Getting our audience interested and involved
                            was tough, with only a 12% engagement rate, indicating a need for more effective
                            communication.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Deeper Challenges:'); ?>
                    </h3>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('Conversion Rate Dilemma: Turning leads into actual customers was a
                            challenge, as our conversion rate lingered at 3%, signalling room for improvement.'); ?>
                        </li>
                        <li>
                            <?php echo __('Prospecting Difficulties: Finding the right leads to pursue was
                            proving challenging, making it hard to connect with potential customers genuinely.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Findings:'); ?>
                    </h3>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('Accropolix collaboration unveiled outdated lead generation methods,
                            prompting a shift towards more contemporary and effective approaches.'); ?>
                        </li>
                        <li>
                            <?php echo __('In-depth analysis pinpointed communication gaps within the sales
                            pipeline, leading to targeted adjustments for a seamless acceleration.'); ?>
                        </li>
                        <li>
                            <?php echo __('Evaluation highlighted content misalignment with audience preferences,
                             guiding efforts towards tailored and engaging communication strategies.'); ?>
                        </li>
                        <li>
                            <?php echo __('Examination uncovered a lack of personalised follow-up in the
                            conversion process, prompting adjustments for more impactful customer interactions.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Solution:'); ?>
                    </h3>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('Accropolix increased our online presence, strategically using digital
                             campaigns to enhance brand visibility and attract more leads.'); ?>
                        </li>
                        <li>
                            <?php echo __('Based on real-time feedback, Accropolix helped us adapt our
                            strategies, ensuring we stay on the right track and continuously improve.'); ?>
                        </li>
                        <li>
                            <?php echo __('By streamlining our internal processes, Accropolix improved overall
                            efficiency, allowing our
                            team to focus more on what matters – building strong client relationships.'); ?>
                        </li>
                        <li>
                            <?php echo __('With Accropolix, we developed clear, goal-oriented plans that guided
                            our actions, ensuring that every step we took aligned with our broader objectives.'); ?>
                        </li>
                        <li>
                            <?php echo __('Through open communication and collaborative efforts, Accropolix
                            became an integral part of
                            our team, contributing significantly to our collective success in sales development.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Results:'); ?>
                    </h3>
                    <p class="mb-4">
                        <?php echo __('The implemented content marketing strategy led to significant improvements
                        across various key performance indicators:'); ?>
                    </p>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('Lead Generation Surge: We witnessed an impressive 22% increase in
                            leads within the first six months, signalling a significant breakthrough.'); ?>
                        </li>
                        <li>
                            <?php echo __('Accelerated Sales Pipeline: Our sales pipeline experienced a notable
                            acceleration, reducing the time from lead to conversion.'); ?>
                        </li>
                        <li>
                            <?php echo __('Enhanced Outreach Effectiveness: The conversion rate from outreach
                            efforts soared to 8%.'); ?>
                        </li>
                        <li>
                            <?php echo __('Improved Team Performance: Sales Development Representatives reported
                             higher confidence and increased success in engaging with potential clients.'); ?>
                        </li>
                    </ul>
                    <p>
                        <?php echo __('As the Sales Development Manager, I\'m optimistic about the future. Our
                        collaboration with Accropolix has set new standards for our team, and we\'re confident that our
                        continued partnership will unlock even greater achievements in the dynamic realm of sales
                        development.'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->element('contact_1'); ?>
