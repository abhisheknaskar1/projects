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
                <h1 class="font-weight-bold mb-4">Identify & Target Your Prospects Better</h1>
                <p class=" font-weight-bold mb-4 ">Accro ABM</p>
                <p class="font-weight-bold mb-4">
                    Accurately identifying and effectively targeting your prospects isn't just a tactic – it's the key
                    to building value selling modern day customers like today.
                </p>
                <div class="d-flex gap-5 mt-4"><a href="<?php echo $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'contact',
                    ]) ?>" class="btn theme-btn">Let’s Talk</a></div>
            </div>
            <div class="col-lg-6 right-hero" data-aos="zoom-in" data-aos-duration="200">
                <?php echo $this->Html->image('/img/deep-sales-hero.png', ['class' => 'img-fluid animated', 'alt' => '']) ?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="font-weight-bold mb-5 " data-aos="fade-up" data-aos-duration="300">ABM problem we solve for
                    you!</h2>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-12 mb-3">
                        <?php echo $this->Html->image('/img/abm-problem.png', ['class' => 'img-process', 'alt' => '', 'width' => "400px", 'data-aos' => "fade-up", 'data-aos-duration' => "300"]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="font-weight-bold" data-aos="fade-up" data-aos-duration="300">
                    What makes ABM strategy stand out?
                </h2>
                <div class="progress-data mt-5" data-aos="fade-up" data-aos-duration="300">
                    <div class="col-lg-4 text-center">
                        <div>
                            <input style="display: none;" type="range" value="75" min="0" max="100" step="1"/>
                            <div class="pie mx-auto"
                                 data-pie='{ "speed": 20, "percent": 75, "colorSlice": "#039a01", "colorCircle": "#d2e9d4", "round": true }'
                            ></div>
                        </div>
                        <h4 class="font-weight-bold mt-4" data-aos="fade-up" data-aos-duration="300">Higher ROI</h4>
                        <p><strong> Than any other marketing strategy </strong></p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div>
                            <input style="display: none;" type="range" value="60" min="0" max="100" step="1"/>
                            <div
                                class="pie mx-auto"
                                data-pie='{ "speed": 20, "percent": 60, "colorSlice": "#6e80af", "colorCircle": "#d2e4e6", "round": true }'
                            ></div>
                        </div>
                        <h4 class="font-weight-bold mt-4" data-aos="fade-up" data-aos-duration="300">Quality Leads</h4>
                        <p><strong>Results in increase in average deal size by 20% </strong></p>
                    </div>
                    <div class="col-lg-4  text-center">
                        <div>
                            <input style="display: none;" type="range" value="10" min="0" max="100" step="1"/>
                            <div
                                class="pie mx-auto"
                                data-pie='{ "speed": 20, "percent": 10, "colorSlice": "#008a98", "colorCircle": "#d3e3e9", "round": true }'
                            ></div>
                        </div>
                        <h4 class="font-weight-bold mt-4" data-aos="fade-up" data-aos-duration="300">
                            Revenue Increase
                        </h4>
                        <p><strong>just one year with right ABM framework </strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center mb-4">
                <h2 class="font-weight-bold" data-aos="fade-up" data-aos-duration="300">
                    Our Process-Human + AI Collaboration
                </h2>
                <div class="row justify-content-center mt-4">
                    <div class="col-lg-12 mb-3">
                        <?php echo $this->Html->image('/img/process.png', ['class' => 'img-process', 'alt' => '', 'width' => "400px", 'data-aos' => "fade-up", 'data-aos-duration' => "300"]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="300">
            <div class="col-lg-12 text-center">
                <h2 class="font-weight-bold mb-4" data-aos="fade-up" data-aos-duration="300">Our Asks</h2>
                <p class=" account mb-5">To make ABM work for you!</p>
                <div class="row justify-content-center mt-4">
                    <div class="col-lg-12 mb-3">
                        <?php echo $this->Html->image('/img/smes.png', ['class' => 'img-process', 'alt' => '', 'data-aos' => "fade-up", 'data-aos-duration' => "300"]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="font-weight-bold" data-aos="fade-up" data-aos-duration="300">FAQs</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="accordionExample">
                    <div class="card" data-aos="fade-up" data-aos-duration="500">
                        <div class="card-head" id="headingOne">
                            <h2 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                How is the ABM approach different from the lead generation?
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                ABM, or Account-Based Marketing, is a series of sprints or spearfishing that aims to
                                achieve specific (quality lead) goals in record time. While lead generation is like a
                                marathon which casts a wide net to capture as many (quantity) leads as possible.
                            </div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-duration="800">
                        <div class="card-head" id="headingTwo">
                            <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                What strategies do you use to personalize marketing efforts for each account?
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Once an account seems fit, we engage in a 'first outreach' process to personalize
                                    communication. If there's no response, we conduct lead nurturing and root cause
                                    analysis to refine our approach.
                                </p>
                                <p> For responsive accounts, we involve Subject Matter Experts (SMEs) in pre-sales to
                                    create tailor-made solutions that speak directly to the account's pain points and
                                    opportunities.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-head" id="headingThree">
                            <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                                How does your ABM approach integrate with our existing sales and marketing efforts?
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p> It begins with aligning our target account identification with your ideal customer
                                    profile, then we do the heavy prospect research heavy lifting to help your SMEs and
                                    sales team deliver value from the first meeting itself.
                                </p>
                                <p> Additionally as a sales research team we constantly research and bring best
                                    practices ensuring a cohesive and synergistic effort.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-head" id="headingFour">
                            <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFour"
                                aria-expanded="false" aria-controls="collapseFour">
                                What metrics do you use to measure the success of ABM campaigns?
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p> Specific metrics include response rates, conversion rates, account penetration, deal
                                    size, and revenue influenced by ABM efforts. Our success metric is the closure of an
                                    account, indicating a full-cycle achievement from identification to conversion.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-head" id="headingFive">
                            <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFive"
                                aria-expanded="false" aria-controls="collapseFive">
                                How do you ensure scalability and manage resource constraints in ABM campaigns?
                            </h2>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p> Our ABM framework is built for scalability, leveraging technology and a strategic
                                    mix of human expertise. We focus on building solid pre-sales and nurturing
                                    collaterals that work efficiently across multiple accounts.
                                </p>
                                <p> Our human-plus-AI collaboration ensures that we can scale our personalised approach
                                    without straining resources.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-head" id="headingSix">
                            <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseSix"
                                aria-expanded="false" aria-controls="collapseSix">
                                What is the typical timeline for seeing results from an ABM campaign?
                            </h2>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p> The timeline for seeing results can vary based on several factors including the
                                    complexity of the sales cycle, the level of engagement required, and the maturity of
                                    the market. Typically, clients can begin to see movement in the pipeline within the
                                    first 3 months, with more significant results, such as closed accounts, manifesting
                                    within a year of consistent, strategic ABM efforts.
                                    ts.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5" data-aos="fade-up" data-aos-duration="1200">
                    <h4 class="font-weight-bold">Have more questions? <a href="<?php echo $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'contact',
                        ]) ?>" class="btn theme-btn">Let's Talk</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
