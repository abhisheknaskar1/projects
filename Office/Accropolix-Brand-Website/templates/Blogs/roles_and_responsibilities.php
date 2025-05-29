<?php
declare(strict_types=1);

/**
 * @var App\View\AppView $this
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
                                ]) ?>" class="text-dark">Home</a></li>
                            <li><a href="<?php echo $this->Url->build([
                                    'controller' => 'Blogs',
                                    'action' => 'index',
                                ]) ?>" class="text-dark">Blog</a></li>
                            <li>Exploring Potential Solutions</li>
                        </ul>
                    </div>
                    <h1 class="font-weight-bold mb-4">
                        Roles and Responsibilities of B2B Inside Sales Teams
                    </h1>
                    <p class="mb-4">
                        In the dynamic world of B2B sales, inside sales teams have become pivotal players, driving
                        revenue and fostering business growth. They operate within a distinct sphere, creating
                        meaningful connections and driving sales without traditional face-to-face interaction.
                    </p>
                </div>
                <div class="col-lg-6 right-hero" data-aos="zoom-in" data-aos-duration="200">
                    <?php echo $this->Html->image('/img/inside sales trnspnt 2 .png', ['class' => 'img-fluid animated', 'alt' => '']) ?>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div>
                        <h3 class="mb-4 font-weight-bold">Understanding B2B Inside Sales</h3>
                        <p>
                            Inside sales in B2B involves conducting sales remotely, primarily through digital means,
                            distinguishing it from the traditional field sales model. This strategy leverages phone
                            calls, emails, video conferences, and other digital channels.
                        </p>
                    </div>
                    <div>
                        <h3 class="mb-4 font-weight-bold">
                            Key Roles in B2B Inside Sales Teams
                        </h3>
                        <p>
                            Inside sales teams comprise various roles, each with unique responsibilities contributing to
                            the team's overall success. Sales development representatives (SDRs), account executives,
                            and sales managers collaborate to cover different aspects of the sales cycle.
                        </p>
                    </div>
                    <div>
                        <h3 class="mb-4 font-weight-bold">
                            Responsibilities of B2B Inside Sales Teams
                        </h3>
                        <p>
                            The responsibilities of these teams encompass a wide array of tasks, including lead
                            generation, prospecting, relationship-building, and closing deals. They nurture leads, offer
                            solutions, and align products or services with client needs.
                        </p>
                    </div>
                    <div>
                        <h3 class="mb-4 font-weight-bold">
                            Leveraging Technology and Tools
                        </h3>
                        <p>
                            Inside sales rely heavily on technology, using customer relationship management (CRM) tools,
                            sales automation, and communication software to streamline processes, manage data, and
                            maintain client interactions.
                        </p>
                    </div>
                    <div>
                        <h3 class="mb-4 font-weight-bold">
                            Measuring Success and KPIs
                        </h3>
                        <p>
                            Success in inside sales is gauged through specific KPIs like conversion rates, sales cycle
                            length, customer acquisition cost, and customer retention rates. These metrics help evaluate
                            the team's performance and guide improvement strategies.
                        </p>
                    </div>
                    <div>
                        <h4 class="mb-4 font-weight-bold">
                            Conclusion
                        </h4>
                        <p>
                            B2B inside sales teams play a crucial role in the sales process, navigating a digital
                            landscape to foster connections and drive growth. They adapt to evolving technologies and
                            wield diverse skills to ensure the success of B2B ventures.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php echo $this->element('contact_1') ?>
