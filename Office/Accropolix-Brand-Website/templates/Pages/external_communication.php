<?php
/**
 * @var \App\View\AppView $this
 */
?>
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-lg-6 left-hero" data-aos="fade-up" data-aos-duration="300">
                <h1 class="font-weight-bold mb-4">
                    Communicate The Way People Understand
                </h1>
                <p>Create and distribute valuable, relevant, and consistent content, tailored to speak directly to the
                    hearts and minds of your audience</p>
                <h4 class="mb-3">
                    Accro Content Marketing
                </h4>
                <div class="d-flex gap-5 mt-4">
                    <a href="<?php echo $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'contact',
                    ]) ?>" class="btn theme-btn">Let’s Talk</a>
                </div>
            </div>
            <div class="col-lg-6 right-hero" data-aos="zoom-in" data-aos-duration="200">
                <?php echo $this->Html->image('/img/content-marketing-hero.png', ['class' => 'img-fluid animated', 'alt' => '']) ?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 text-center">
                <h2 class="font-weight-bold mb-5" data-aos="fade-up" data-aos-duration="300">
                    Why Content Marketing?
                </h2>
                <h5>Studies show that a consistent brand message can increase its revenue by up to 23%</h5>
                <h5>84% of customers say experience an organizations create matters is just as crucial as its products
                    or services</h5>
                <h5>90% of consumers expect companies to clearly explain, What they do & How they do</h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2 class="font-weight-bold mb-5" data-aos="fade-up" data-aos-duration="300">
                    What We Do
                </h2>
                <h5>We Position brand messaging for prospective clients & target audience</h5>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="font-weight-bold" data-aos="fade-up" data-aos-duration="300">
                    FAQs
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="accordionExample">
                    <div class="card" data-aos="fade-up" data-aos-duration="500">
                        <div class="card-head" id="headingOne">
                            <h2 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                What is Content Marketing?
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p>It is the strategic approach to managing all communication between a company and its
                                    external stakeholders. </p>
                                <p>It encompasses everything from brand messaging to customer interactions, ensuring
                                    consistency and clarity in how the company is perceived externally.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-duration="800">
                        <div class="card-head" id="headingTwo">
                            <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                How does content marketing benefit my business?
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                Effective, value driven contents can significantly boost your brand's visibility and
                                reputation, lead to increased revenue, and ensure customer satisfaction.
                            </div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-head" id="headingThree">
                            <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                                What makes content marketing services unique?
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                A good ECM approach focuses on crafting a compelling brand message and employer value
                                proposition.
                            </div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-duration="1500">
                        <div class="card-head" id="headingFour">
                            <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFour"
                                aria-expanded="false" aria-controls="collapseFour">
                                How do you measure the success of your content marketing strategies?
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                We use a range of metrics, including engagement rates, impressions, click through rate,
                                to assess the impact of our communication strategies on your brand's reputation and
                                bottom line.
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
                <h2 class="font-weight-bold mb-5" data-aos="fade-up" data-aos-duration="300">
                    Set Sail Towards Amplified Sales Success
                </h2>
                <div>
                    <p>
                        Embark on a transformative sales expedition with Accropolix. Ensure a seamless, efficient, and
                        result-oriented sales process.
                    </p>
                </div>
                <div class="mt-5">
                    <h4 class="font-weight-bold">Have more questions? <a href="<?php echo $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'contact',
                        ]) ?>" class="btn theme-btn">Let's Talk</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->element('contact_1') ?>
