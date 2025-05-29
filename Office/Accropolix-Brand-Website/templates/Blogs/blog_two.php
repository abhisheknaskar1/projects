<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section class="about-area section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="blog-details-column d-flex w-100 flex-column">
                    <div class="blog-details-imagebox" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">
                        <?php echo $this->Html->image('/img/blog/accel_blog.png', ['class' => 'img-fluid', 'alt' => '']) ?>
                    </div>
                    <div class="blog-details-contentbox">
                        <p class="mb-0" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>June,
                                2023</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>Vivek Sharma</small>
                        </p>
                        <h2 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease"
                            data-aos-delay="1000"><?php echo __('Accelerating Careers, Amplifying Skills: Accropolix has a culture that fosters growth') ?></h2>
                        <p class="" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1200"><?php echo __('Accropolix is more than a business-to-business content marketing, go-to-market strategies, and Data analytics company. We are an energetic community of lifelong learners, innovative thinkers, and skill builders - all driven by a shared passion for shaping the future of strategic communications.') ?></p>
                        <p class="" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1200"><?php echo __("The potential for growth lies within each of our team members. To ensure that potential is realised, we've created an environment designed to accommodate your aspirations and elevate them, making them bigger, bolder, and within your grasp.") ?></p>
                        <p class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1000"><?php echo __('All-encompassing growth') ?></p>
                        <p class="" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1200"><?php echo __("Career growth at Accropolix isn't just about climbing the corporate ladder. It's about exploring, learning, and mastering diverse realms. We inspire individuals to venture beyond their comfort zones, thus encouraging lateral, vertical, and even diagonal career movements. What's in it for me? you ask. Here's a snapshot:") ?></p>
                        <p class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1000"><?php echo __('Holistic Skill Development') ?></p>
                        <p class="" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1200"><?php echo __("We encourage constant learning and growth where you can refine and acquire new skills. Whether it's sales, digital marketing, data analysis, or strategic planning, Accropolix offers you a rich reservoir of resources to tap into.") ?></p>
                        <p class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1000"><?php echo __('Mentorship and Guidance') ?></p>
                        <p class="" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1200"><?php echo __("Benefit from the insights and expertise of Accropolix's professional leaders, who bring knowledge of their respective domains. Our leadership is committed to your success, providing mentorship and guidance at every step of your journey.") ?></p>
                        <p class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1000"><?php echo __('Diverse and Inclusive Work Culture') ?></p>
                        <p class="" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1200"><?php echo __("We endorse diversity and inclusivity, recognising that different perspectives breed innovative ideas. Here, you'll find colleagues from different backgrounds, cultures, and disciplines working together to create remarkable results.") ?></p>
                        <p class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1000"><?php echo __('Unlimited Growth Opportunities') ?></p>
                        <p class="" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1200"><?php echo __("With our expansive service portfolio, there's always room for you to grow and evolve. Whether you are in the initial stages of your career or an experienced professional, you'll find many opportunities that cater to your interests and expertise.") ?></p>
                        <p class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1000"><?php echo __('Recognition and Rewards') ?></p>
                        <p class="" data-aos="fade-up" data-aos-easing="ease"
                           data-aos-delay="1200"><?php echo __("We value and celebrate the contributions of our team members. Our robust recognition program ensures that your hard work and dedication never go unnoticed. Join us at Accropolix. Come for a job, stay for a career, and leave each day better than when you arrived. We don't just offer a workplace; we offer a launchpad where your career can soar while making significant contributions to the business world. ") ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->element('contact') ?>
