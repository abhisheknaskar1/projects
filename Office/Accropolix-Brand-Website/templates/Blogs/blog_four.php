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
                        <?php echo $this->Html->image('/img/blog/blog2.png', ['class' => 'img-fluid', 'alt' => '']) ?>
                    </div>
                    <div class="blog-details-contentbox">
                        <p class="mb-0" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                            <small class="text-muted mr-3"><span class="bx bx-calendar-alt mr-1"></span>27 Nov,
                                2023</small>
                            <small class="text-muted mr-3"><span class="bx bx-user mr-1"></span>Vivek Sharma</small>
                        </p>
                        <h2 class="font-weight-bold" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">
                            Your most unhappy customers are your greatest source of learning.</h2>
                        <p class="" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">Lorem ipsum dolor
                            sit, amet consectetur adipisicing elit. Provident sint alias maiores. Eos doloribus
                            eligendi, quaerat consequatur tenetur recusandae cumque at nesciunt obcaecati aliquid
                            aspernatur perferendis totam, pariatur reprehenderit accusantium?</p>
                        <p class="" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">Lorem ipsum dolor
                            sit, amet consectetur adipisicing elit. Provident sint alias maiores. Eos doloribus
                            eligendi, quaerat consequatur tenetur recusandae cumque at nesciunt obcaecati aliquid
                            aspernatur perferendis totam, pariatur reprehenderit accusantium?</p>
                        <p class="" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">Lorem ipsum dolor
                            sit, amet consectetur adipisicing elit. Provident sint alias maiores. Eos doloribus
                            eligendi, quaerat consequatur tenetur recusandae cumque at nesciunt obcaecati aliquid
                            aspernatur perferendis totam, pariatur reprehenderit accusantium?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->element('contact') ?>
