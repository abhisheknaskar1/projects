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
                        <li><?php echo __('Content Marketing'); ?></li>
                    </ul>
                </div>
                <h1 class="font-weight-bold mb-4">
                    <?php echo __('Leveraging Content Marketing to Drive Client Growth'); ?>
                </h1>
                <p class="mb-4">
                    <?php echo __('From the Viewpoint of a Chief Innovation Officer'); ?>
                </p>
                <p>
                    <?php echo __('As the Chief Innovation Officer steering our technology-driven company,
                     I am thrilled to unveil the
                    transformative impact of our collaboration with Accropolix, a partnership that revolutionised our
                    approach to content marketing.'); ?>
                </p>
            </div>
            <div class="col-lg-6 right-hero" data-aos="zoom-in" data-aos-duration="200">
                <?php echo $this->Html->image(
                    '/img/content marketing trspnt.png',
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
                            <?php echo __('Our company faced limited online visibility and brand awareness,
                            drawing only 10-20 unique monthly visitors.'); ?>
                        </li>
                        <li>
                            <?php echo __('Engaging a niche audience proved challenging, with a meagre 120 social
                             media followers and infrequent interactions.'); ?>
                        </li>
                        <li>
                            <?php echo __('Lead generation struggled, achieving a paltry 2% conversion rate to
                            Marketing Qualified Leads (MQLs).'); ?>
                        </li>
                        <li>
                            <?php echo __('Ineffective marketing strategies resulted in a stagnant sales
                             pipeline, with no significant growth observed over the past six months.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Deeper Challenges:'); ?>
                    </h3>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('We faced a lack of targeted content, with fewer than 5 blog posts
                            addressing our audience\'s specific pain points.'); ?>
                        </li>
                        <li>
                            <?php echo __('The absence of an engaging content strategy across various buyer\'s
                            journey stages led to inconsistent messaging.'); ?>
                        </li>
                        <li>
                            <?php echo __('Inadequate SEO optimization reflected in our company ranking beyond
                            the first page for key
                            industry keywords, resulting in less than 5% organic search traffic.'); ?>
                        </li>
                        <li>
                            <?php echo __('Difficulty arose in measuring the impact of our existing marketing
                            efforts due to the
                            absence of concrete metrics, making it challenging to quantify ongoing campaign success or
                            failure.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Findings:'); ?>
                    </h3>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('Accropolix\'s comprehensive market research uncovered a significant
                            gap in content addressing the specific pain points of our client audience.'); ?>
                        </li>
                        <li>
                            <?php echo __('Their in-depth analysis highlighted the imperative for a well-crafted
                             content strategy aligned with the buyer\'s journey stages.'); ?>
                        </li>
                        <li>
                            <?php echo __('Through an SEO audit, Accropolix identified optimization
                            opportunities to improve organic reach and search rankings.'); ?>
                        </li>
                        <li>
                            <?php echo __('Their analytics review indicated low engagement and high bounce
                             rates on existing content, providing valuable insights for improvement.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Solution:'); ?>
                    </h3>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('Accropolix took charge by crafting a multi-faceted content marketing
                             strategy, with a keen
                            focus on educating, engaging, and converting our target audience.'); ?>
                        </li>
                        <li>
                            <?php echo __('They developed a comprehensive content calendar addressing audience
                            pain points at different funnel stages, ensuring a strategic and cohesive approach.'); ?>
                        </li>
                        <li>
                            <?php echo __('By introducing gated content and lead magnets, Accropolix implemented
                            strategies to attract quality leads and enhance audience engagement.'); ?>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="mb-3 font-weight-bold">
                        <?php echo __('Accropolix’s Masterstroke: SEO and Content Synergy Results:'); ?>
                    </h3>
                    <p>
                        <?php echo __('The implemented content marketing strategy led to significant improvements
                        across various key performance indicators:'); ?>
                    </p>
                    <ul style="list-style: disc;" class="pl-4 list-disc">
                        <li>
                            <?php echo __('Organic Reach Improvement: 16% increase in website traffic within
                             the first three months.'); ?>
                        </li>
                        <li>
                            <?php echo __('Lead Generation Boost: 18% increase in monthly leads through
                            gated content.'); ?>
                        </li>
                        <li>
                            <?php echo __('SEO Optimization Impact: Achieved a 15% improvement in search
                            rankings for targeted keywords.'); ?>
                        </li>
                        <li>
                            <?php echo __('Engagement Enhancement: Reduced bounce rates by 12%, indicating
                            improved content relevance and quality.'); ?>
                        </li>
                        <li>
                            <?php echo __('Content Performance Analysis: Content analysis revealed a 19%
                            increase in social media shares and engagement.'); ?>
                        </li>
                        <li>
                            <?php echo __('Conversion Rate Optimization: Implemented A/B testing resulted
                            in a 14% improvement in conversion rates for key landing pages.'); ?>
                        </li>
                    </ul>
                    <p>
                        <?php echo __('Our collaboration with Accropolix has truly made a positive impact,
                         elevating our business to
                        new heights. Moving forward, our partnership with Accropolix is ready to open up fresh
                        opportunities, shaping our success in the ever-changing tech industry.'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->element('contact_1'); ?>
