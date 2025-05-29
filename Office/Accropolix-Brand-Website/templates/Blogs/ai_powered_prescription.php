<?php

declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section>
    <div class="container">
        <div class="row justify-content-center blog-sub-heading">
            <div class="col-lg-9">
                <div>
                    <img src="img/blog/how-ai-img-1.webp" class="img-fluid animated" alt="" width="100%">
                    <h1 class="font-weight-bold mt-4 mb-5 blog-text-col-1">From Idea to MVP in Weeks: Developing an AI-Powered Prescription Safety App
                    </h1>

                    <div class="blog-text-col-3" itemprop="articleBody">
                        <p>See how we built an app that digitizes prescriptions, identifies risks, and integrates with the NHCS – all in just weeks. Discover the future of healthcare technology.
                        </p>

                        <h2 class="font-weight-bold mt-4 mb-3 blog-text-col-1">The Backdrop
                        </h2>
                        <p>A healthcare company based out of the UK wants to develop a cutting-edge solution to improve prescription reading accuracy and medication safety.
                        </p>
                        <p>However, to bring vision into life, the client wants to develop a Proof of Concept (POC) to engage potential investors and validate the idea. This would be followed by Minimum Viable Product (MVP) development that can attract early investment, which can fuel further product development and updates.
                        </p>

                        <h2 class="font-weight-bold mt-4 mb-3 blog-text-col-1">The POC Stage: Rapid Validation Through AI
                        </h2>
                        <p>After the initial meeting, the Accropolix engineering team designed a phased approach document highlighting the stage of
                        </p>
                        <ul class="blog-intro blog-intro-1 blog-text-col-3 blog-upd">
                            <li>POC development.
                            </li>
                            <li>MVP development
                            </li>
                        </ul>
                        <p>Leveraging the power of AI, APIs, and third-party integrations, the team automated the prescription reading process. In the next 27 hours, the engineering team designed a POC that successfully generates desired insights in 2 minutes once a prescription gets uploaded.</p>
                        <p>This rapid turnaround enabled the client to successfully validate their idea with investors and proceed to the MVP development stage.
                        </p>

                        <h2 class="font-weight-bold mt-4 mb-3 blog-text-col-1">The MVP Stage: Human-Centered Design Powered by AI
                        </h2>
                        <img src="img/blog/how-ai-img-2.webp" class="img-fluid animated mb-4" alt="" width="100%">

                        <p>Following the successful POC stage, MVP development commenced with a focus on real-world usability. Here's how we built the MVP:
                        </p>
                        <ul class="blog-intro blog-intro-1 blog-text-col-3 blog-upd">
                            <li><strong>Human-Centric Approach: </strong> We prioritized early prototyping and user feedback to ensure the solution addressed the practical needs of healthcare professionals.
                            </li>
                            <li><strong>Generative AI: </strong> A powerful AI model was trained to analyze and interpret prescription information, accurately identifying medications, dosages, and potential risks.
                            </li>
                            <li><strong>AWS Computing and OCR: </strong> Leveraging Amazon Web Services (AWS) for robust computing power and Optical Character Recognition (OCR) technology, the solution rapidly and accurately digitizes prescriptions from any format.
                            </li>
                            <li><strong>Safety Categorization: </strong> The app intelligently categorizes prescriptions into three categories: "Safe," "Needs Verification," and "Risky," enabling immediate identification of potential issues and ensuring compliance with safety guidelines.
                            </li>
                            <!-- <li><strong>NHCS Integration: </strong> Seamless data synchronization with the UK National Health Care System (NHCS) provides a comprehensive record of patient drug history and interactions, facilitating informed decision-making and improved patient care.
                            </li> -->
                        </ul>
                        <p>This success enabled the client to present a compelling case to investors, securing £50,000 in early funding to fuel further development and expansion of the application.
                        </p>

                        <h2 class="font-weight-bold mt-4 mb-3 blog-text-col-1">The Vision Showcase to the World
                        </h2>

                        <img src="img/blog/how-ai-img-3.webp" class="img-fluid animated mb-4" alt="" width="100%">

                        <p>Following the MVP stage, the engineering team further refined the AI model, leveraging advanced tools and techniques to enhance accuracy and performance.
                        </p>
                        <p>Supported by detailed demo videos and how-to guides created by the design team, Version 1 of the app was fully prepared for exhibition in just 11 days.
                        </p>

                        <h2 class="font-weight-bold mt-4 mb-3 blog-text-col-1">Exhibition Success and the Road to V2
                        </h2>
                        <p>Version 1 of the app was well-received at the exhibition, generating valuable user feedback from healthcare professionals. This feedback has been passed on to the expert development team, who are now working diligently on Version 2 (V2). V2 is currently in progress and is expected to be completed in the next 30 days, ready for beta release and early marketing efforts.
                        </p>
                        <p><strong> Lessons Learned</strong>
                        </p>
                        <ul class="blog-intro blog-intro-1 blog-text-col-3 blog-upd">
                            <li><strong>Early Prototyping is Key: </strong> Iterative development with user feedback is essential for creating effective healthcare AI solutions.
                            </li>
                            <li><strong>Technology Synergy: </strong> Combining generative AI with OCR and cloud computing unlocks powerful capabilities for prescription analysis.
                            </li>
                            <li><strong>AWS Computing and OCR: </strong> Leveraging Amazon Web Services (AWS) for robust computing power and Optical Character Recognition (OCR) technology, the solution rapidly and accurately digitizes prescriptions from any format.
                            </li>
                            <li><strong>Human-Centric Design: </strong> Prioritizing user needs and workflows ensures the solution is practical and impactful.
                            </li>
                        </ul>
                        <p><strong> Next Steps</strong>
                        </p>
                        <ul class="blog-intro blog-intro-1 blog-text-col-3 blog-upd">
                            <li><strong>Full Product Development: </strong> Develop and launch the full version of the product (V1) for market release.
                            </li>
                            <li><strong>Feature Expansion: </strong> Enhance the app with new features based on user feedback and market demands.
                            </li>
                            <li><strong>Further Applications: </strong> Explore additional applications of generative AI in healthcare to improve patient outcomes and streamline operations.
                            </li>
                        </ul>



                    </div>
                </div>


            </div>

            <div class="col-lg-3">
                <div>
                    <h5 class="mb-4 font-weight-bold  blog-text-col-2">
                        Just For You
                    </h5>
                </div>
                <div class="blog-just">
                    <a href="<?php echo $this->Url->build([
                                    'controller' => 'Blogs',
                                    'action' => 'hrMetrics',
                                ]); ?>">
                        <div class="for-img">
                            <img src="img/blog/5-data.webp" class=" animated" alt="">
                        </div>
                        <p class="font-weight-bold mt-4 blog-text-col-2">
                            5 Data-Driven HR Metrics Every HR Professional Should Track
                        </p>

                        <a class="btn more-btn" href="<?php echo $this->Url->build([
                                                            'controller' => 'Blogs',
                                                            'action' => 'hrMetrics',
                                                        ]); ?>">Learn More</a>
                        <hr class="solid">
                    </a>
                </div>
                <div class="blog-just">
                    <a href="<?php echo $this->Url->build([
                                    'controller' => 'Blogs',
                                    'action' => 'aiImpacting',
                                ]); ?>">
                        <div class="for-img">
                            <img src="img/blog/ai.webp" class=" animated" alt="">
                        </div>
                        <p class="font-weight-bold mt-4 blog-text-col-2">
                            How AI is Impacting The Future of Digital Marketing in 2024
                        </p>

                        <a class="btn more-btn" href="<?php echo $this->Url->build([
                                                            'controller' => 'Blogs',
                                                            'action' => 'aiImpacting',
                                                        ]); ?>">Learn More</a>
                        <hr class="solid">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>