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
                <h1 class="font-weight-bold mb-4">
                    Find Prospects Looking For You
                </h1>
                <p>Nurture prospects into lasting relationships to bridge the gap between your business and the
                    customers who need you most.</p>
                <h4 class="mb-3">
                    SDR / Inside Sales
                </h4>
                <div class="d-flex gap-5 mt-4">
                    <a href="<?php echo $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'contact',
                    ]) ?>" class="btn theme-btn">Let’s Talk</a>
                </div>
            </div>
            <div class="col-lg-6 right-hero" data-aos="zoom-in" data-aos-duration="200">
                <?php echo $this->Html->image('/img/sdr-hero.png', ['class' => 'img-fluid animated', 'alt' => '']) ?>
            </div>
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2 class="font-weight-bold mb-5" data-aos="fade-up" data-aos-duration="300">
                    Embark on a strategic sales journey, ensuring every lead is a step towards a successful sale to,
                </h2>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-lg-4">
                <div class="card accelerator-card mb-2 accelerator-card7 w-100 aos-init aos-animate" data-aos="zoom-in"
                     data-aos-duration="700">
                    <div class="d-flex w-100 justify-content-center align-items-center">
                        <h6 class="mb-0 font-weight-bold">Improve Sales Pipeline
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card accelerator-card mb-2 accelerator-card3 w-100 aos-init aos-animate" data-aos="zoom-in"
                     data-aos-duration="700">
                    <div class="d-flex w-100 justify-content-center align-items-center">
                        <h6 class="mb-0 font-weight-bold">
                            Offload Uninterested Leads 
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card accelerator-card mb-2 accelerator-card2 w-100 aos-init aos-animate" data-aos="zoom-in"
                     data-aos-duration="700">
                    <div class="d-flex w-100 justify-content-center align-items-center">
                        <h6 class="mb-0 font-weight-bold">Qualify & Nurture Leads
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h5>Allowing your sales team (BDR) focus more on closing sales.
                </h5>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="font-weight-bold mb-5" data-aos="fade-up" data-aos-duration="300">
                    How We Can Bridge the Marketing and Sales GAP
                </h2>
                <div>
                    <p class="mb-4">
                        <strong>Lead Qualification:</strong>
                        Ensuring that only the warmest leads are passed down the sales funnel
                    </p>
                    <p class="mb-4">
                        <strong>Appointment Setting:</strong>
                        Cultivating promising relationships by scheduling meaningful interactions.
                    </p>
                </div>
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
                                What ROI can I expect from your SDR services?
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                Our SDR services are designed to boost your sales appointments, shorten sales cycles,
                                and ultimately enhance your revenue growth. The precise ROI can be discussed further
                                based on your specific business model and goals.
                            </div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-duration="800">
                        <div class="card-head" id="headingTwo">
                            <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                How do you ensure the quality of leads?
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                Through rigorous lead qualification processes and personalized engagement, we ensure
                                that only warm, high-potential leads are passed on to your sales team.
                            </div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-head" id="headingThree">
                            <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                                How is the performance of the SDR services measured?
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                Performance metrics include the number of qualified leads delivered, appointments set,
                                lead engagement rates, and feedback from your sales team, among others.
                            </div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-head" id="headingFour">
                            <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFour"
                                aria-expanded="false" aria-controls="collapseFour">
                                How does your SDR team align with our existing sales and marketing teams?
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                Our SDR team collaborates with your sales and marketing teams to understand your brand,
                                target audience, and sales goals.
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
                    <h4 class="font-weight-bold">Have more questions? <a href="/contact" class="btn theme-btn">Let's
                            Talk</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->element('contact_1') ?>
