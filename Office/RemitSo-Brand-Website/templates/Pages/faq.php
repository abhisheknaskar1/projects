<?php

/**
 * @var App\View\AppView $this
 */

?>
<main id="main" class="main">
    <!-- Hero section -->
    <section class="hero-remit-index bg-black">
        <div class="container">
            <div class="row hero-remit-index-font text-center justify-content-center inter-text">
                <div class="col-lg-8">
                    <h1 class="text-white">Top FAQ Answered</h1>
                    <h4 class="text-white mt-4">If you don't find what you are looking for request demo </h4>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-8">
                            <form
                                action='https://forms.zohopublic.in/remitso263/form/RequestDemo/formperma/wWbh0-mvXIlRL1zC6wpl7X6T7FlgyjOkMjO23nbLCzQ/htmlRecords/submit'
                                name='form' method='POST'
                                onSubmit='javascript:document.charset="UTF-8"; return zf_ValidateAndSubmit();'
                                accept-charset='UTF-8' enctype='multipart/form-data' id='form'><input type="hidden"
                                    name="zf_referrer_name" value="">
                                <input type="hidden" name="zf_redirect_url" value="">
                                <input type="hidden" name="zc_gad" value="">

                                <div class="d-flex">
                                    <input type="email" class="form-control remit-index-form" id="email" name="Email"
                                        checktype="c5" value="" placeholder="Please share your email" required>

                                    <button type="submit" class="btn btn-primary remit-index-btn">
                                        Request Demo
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="project" class="custom-bg section-padding custom-bg">
        <div class="container">
            <div class="row faq-for-deskt faq-text-bg mt-4">
                <div class="col-lg-4 ">
                    <div class="faq-text-for text-white">
                        <h4>Categories</h4>
                    </div>
                </div>

                <div class="col-lg-8 ">
                    <div class="faq-text-for text-white">
                        <h4>Frequently asked questions</h4>
                    </div>
                </div>
            </div>

            <div class="row faq-for-deskt">
                <div class="col-lg-4 bg-faq-black mt-4 ">
                 <div class="faq-file">
                    <!-- <button class="btn btn-default filter-button active" data-filter="all">All</button> -->
                    <button class="btn btn-default flex align-items-center filter-button filter-faq-desk active" data-filter="started"> <img src="/img/faq-ic/ic-1.png" alt="" class="img-fluid"> Getting Started</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="platform-cap"><img src="/img/faq-ic/ic-2.png" alt="" class="img-fluid"> Platform Capabilities</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="security"><img src="/img/faq-ic/ic-3.png" alt="" class="img-fluid"> Security and Compliance</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="kyc"> <img src="/img/faq-ic/ic-4.png" alt="" class="img-fluid"> KYC/AML Compliance</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="support"><img src="/img/faq-ic/ic-5.png" alt="" class="img-fluid"> Support and Service Level Agreements</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="billing"> <img src="/img/faq-ic/ic-6.png" alt="" class="img-fluid"> Costs and Billing</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="supported-payment"> <img src="/img/faq-ic/ic-7.png" alt="" class="img-fluid"> Supported Payment Types</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="innovation"> <img src="/img/faq-ic/ic-8.png" alt="" class="img-fluid"> Innovation</button>

                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="integrations"><img src="/img/faq-ic/ic-9.png" alt="" class="img-fluid"> Integrations</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="customization"> <img src="/img/faq-ic/ic-10.png" alt="" class="img-fluid"> Customization</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="partners"><img src="/img/faq-ic/ic-11.png" alt="" class="img-fluid"> Partners</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="system-validation"><img src="/img/faq-ic/ic-12.png" alt="" class="img-fluid"> System Validation</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="reports"><img src="/img/faq-ic/ic-13.png" alt="" class="img-fluid"> Business Intelligence Reports</button>

                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="licensing"><img src="/img/faq-ic/ic-14.png" alt="" class="img-fluid"> Licensing & Regulations</button>
                    <!-- <button class="btn btn-default filter-button" data-filter="market">Market Insights</button> -->
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="operations"><img src="/img/faq-ic/ic-15.png" alt="" class="img-fluid"> Business Operations</button>
                 </div>
                 

                </div>
                <div class="col-lg-8 bg-faq-black portfolio-item mt-4 filter platform-cap ">
                    <div class="remit-faq-data-text text-white">
                        <!-- <h2><img src="img/remit-faq/ic-1.png" width="25px"> Platform Capabilities</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What is your current maximum transaction throughput per Second?</h4>
                            <p>Since we are using AWS Lambda, our maximum transaction throughput per second depends on several factors:</p>
                            <p>Lambda Concurrency Limits: AWS Lambda scales automatically based on incoming requests. The default concurrency limit per region is 1,000 concurrent executions, but this can be increased upon request.</p>
                            <p>Execution Duration: If each transaction takes 100ms, we can handle 10 transactions per second per concurrent execution. With 1,000 concurrent executions, that means 10,000 transactions per second at default limits.
                            </p>
                            <p>Database and External API Limits: Throughput is also constrained by database performance and third-party APIs (e.g., payment gateways).</p>
                            <p>To optimize throughput, we:</p>
                            <p>Use asynchronous processing with AWS SQS and SNS.</p>
                            <p>Implement batch processing where applicable.
                            </p>
                            <p>Monitor and scale database read/write capacities dynamically.
                            </p>
                            <p>If required, we can request AWS to increase our concurrency limits to achieve even higher throughput.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Will the RemitSo platform experience lag or crashes if the transaction limit is exceeded? </h4>
                            <p>To ensure a smooth experience, any requests exceeding the processing capacity are queued intelligently, preventing system crashes or lag.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Does RemitSo support multiple currencies? </h4>
                            <p>Yes, RemitSo is designed to handle global transactions and supports a wide range of currencies.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>As a RemitSo master admin, can I create customized access controls for my partners and agents?</h4>
                            <p>Absolutely! RemitSo's white-label platform provides granular access control features. You can define roles with specific permissions, manage data access, and ensure your users only see what's essential for their needs.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Does the system come with a Load Balancer? If yes, how does the load balancer work? </h4>
                            <p>The system uses AWS Elastic Load Balancer (ELB) to efficiently distribute traffic across multiple servers. This ensures high availability, scalability, and optimal performance, even under increased load. </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What load balancing features are available?</h4>
                            <p>The load balancer supports distribution based on predetermined percentages to different third-party payout networks, distribution based on delivery method type (cash pickup, bank deposit, mobile money, etc.), and distribution based on telco type. </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What types of promotions are available? Are you open to incorporating additional promotion types based on customer requirements? </h4>
                            <p>The system comes with flexible promotion options, including the ability to add coupon codes. We are also happy to work with you to incorporate additional promotion types to meet your specific needs.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What types of loyalty programs are available? Are you willing to add or amend loyalty programs to align with a company's needs? </h4>
                            <p>Currently, the system doesn't come with a dedicated loyalty program module. However, we have a similar module that allows you to categorize customers and offer different rates, charges, and discounts as needed.</p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>
                

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter security">
                    <div class="remit-faq-data-text text-white">
                        <!-- <h2><img src="img/remit-faq/ic-4.png" width="25px"> Security and Compliance</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How does RemitSo address data security and compliance, especially regarding GDPR?</h4>
                            <p>
                                RemitSo prioritizes data security and compliance with regulations like GDPR. The
                                platform can be deployed on servers within your local jurisdiction, giving you control
                                over your customer data and ensuring adherence to regional data protection laws.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What security measures are in place to protect sensitive financial data within RemitSo?
                            </h4>
                            <p class="mb-3"><strong>RemitSo employs multiple layers of security:</strong></p>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>Data encryption (both in transit and at rest)</li>
                                <li>Role-based access controls</li>
                                <li>Regular security audits and vulnerability assessments</li>
                                <li>Multi-factor authentication</li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How does RemitSo ensure disaster recovery? </h4>
                            <p>By default, RemitSo backs up data up to 00:00 (midnight) of the previous day. More
                                frequent backups or extended retention periods can be arranged at additional cost.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How does RemitSo protect against cyber attacks? </h4>
                            <p>RemitSo utilizes AWS WAF (Web Application Firewall) with pre-configured security rules to
                                protect against common cyber attacks. We also recommend integrating tools like
                                Cloudflare for enhanced security.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Does RemitSo include built-in sanctions screening? </h4>
                            <p>Yes, RemitSo provides sanctions screening at no cost to its customers. This functionality
                                is powered by sanctionlookup.io and is fully integrated into the platform.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Can back office users set compliance limits and alerts within the system?</h4>
                            <p>Yes, the system allows for the configuration of compliance limits and alerts, such as
                                transaction limits, to ensure regulatory compliance. Alerts are generated when
                                predefined thresholds are exceeded.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Are cases automatically assigned for alerts and triggers? </h4>
                            <p>Currently, flagged alerts are reviewed manually, but automated case assignment is planned
                                for future development. </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Do you have any solutions embedded (not third-party) already available? </h4>
                            <p>Yes, we have built-in compliance features. You can set various compliance rules and
                                document requirements based on transaction amounts and other criteria. We can fully
                                customize these rules to your preferences. The system triggers email alerts to
                                compliance members as needed. </p>
                        </div>
                        <hr class="faq-line-dash">

                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter kyc">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-2.png" width="25px"> KYC/AML Compliance</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How does RemitSo help Money Transfer Operators with KYC and AML compliance?</h4>
                            <p>RemitSo comes pre-integrated with a leading AML/KYC solution to help you meet your
                                compliance
                                obligations.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Can Money Transfer Operators integrate their own KYC/AML policies?</h4>
                            <p>Yes, RemitSo can be integrated with other AML/KYC solutions upon request.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Are ID verification, screening, and transaction monitoring costs included in your
                                quotes? If yes, which company do you have integrated at the moment? </h4>
                            <p>The system comes with built-in integration for Sumsub. All you need is a license with
                                Sumsub. The system also comes with a manual verification module at no cost.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4> Can we integrate any additional or other applications? </h4>
                            <p>Yes, we can do on-demand customization at our standard development rate of as per our
                                standard rates..<a
                                    href="<?php echo $this->Url->build([
                                                                                                                                                    'controller' => 'Pages',
                                                                                                                                                    'action' => 'pricing'
                                                                                                                                                ]) ?>"
                                    target="_blank">check pricing</a></p>
                            <p>Note: As part of the software agreement, we also offer 20 hours of no-cost development
                                support worth GBP 300 complementary. So any integration that falls within 20 hours will
                                be at no cost.</p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter support">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-5.png" width="25px"> Support and Service Level Agreements</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How does the RemitSo support team handle customer queries?</h4>
                            <p>You can contact the RemitSo support team directly via WhatsApp, Skype, or email. Our
                                typical response time is between 1 to 30 minutes during working hours.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What service level agreements (SLAs) does RemitSo offer? </h4>
                            <p><strong>We offer two SLA options:</strong></p>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li><strong>Basic Support: </strong> Resolution times vary based on issue severity</li>
                                <li><strong>Small: </strong> 30 minutes to 2 hours</li>
                                <li><strong>Medium: </strong> 1 business day</li>
                                <li><strong>Large: </strong> 2 business days</li>

                                <li class="mt-3"><strong>Premium Support: </strong> A dedicated technical account
                                    manager provides personalized support and faster resolution times (typically 30
                                    minutes to 1 business day).</li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter billing">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-3.png" width="25px"> Costs and Billing</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Are server and hosting costs included in your pricing, or would they be an additional
                                expense? </h4>
                            <p>Server and hosting costs are separate and will be based on your location, jurisdiction,
                                and requirements. We utilize dedicated servers (not shared) and will provide you with a
                                monthly AWS invoice for transparency. </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Are there any integration costs associated with the core banking platform? </h4>
                            <p>Yes, there may be integration costs, which will be calculated at our standard development
                                cost mentioned earlier. To estimate an accurate timeline, we need to understand your
                                specific requirements and analyze the effort involved. </p>
                        </div>
                        <hr class="faq-line-dash">

                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter started">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-6.png" width="25px"> Getting Started</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Do I need a licence to use RemitSo?</h4>
                            <p>Yes, a valid licence that allows you to operate as a money transfer operator in your
                                business jurisdiction </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How does RemitSo ensure compliance with regulations like AML and KYC?</h4>
                            <p>RemitSo has robust compliance features built-in, including KYC/AML checks, transaction
                                monitoring, and reporting. We help you stay ahead of regulatory requirements and
                                mitigate risks.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Can RemitSo integrate with my existing systems and third-party services?
                            </h4>
                            <p>Yes, RemitSo seamlessly integrates with a wide range of third-party systems, including
                                banks, payment gateways, and other financial institutions. Our extensive API library
                                ensures smooth data exchange and efficient processes.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Does RemitSo offer a mobile app and website to end customers?
                            </h4>
                            <p>Yes, RemitSo provides a customizable website, mobile applications for iOS and Android,
                                enabling your customers to send and receive money conveniently on their smartphones.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4> Is RemitSo compliant with international regulations?</h4>
                            <p>Yes, RemitSo is designed to comply with global regulations, including KYC, AML, and other
                                anti-fraud measures. Our compliance features help you mitigate risk and maintain the
                                highest standards of regulatory adherence.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Is RemitSo a cloud-based or on-premise solution?</h4>
                            <p>RemitSo is a cloud-based money transfer application software, which means you can access
                                it from anywhere with an internet connection. It eliminates the need for complex
                                on-premise installations and maintenance.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4> Does RemitSo provides API Documentation?</h4>
                            <p>For MTOs with their own development teams, we provide detailed client API documentation,
                                enabling them to build and integrate their own web and mobile applications seamlessly
                                with our backend system.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4> Can MTOs suggest amendments to the UI/UX and App flows to fit their specific business
                                use case? </h4>
                            <p>Yes, absolutely! RemitSo is designed to be fully customizable to your specific business
                                flows and requirements. </p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter supported-payment">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-7.webp" width="25px"> Supported Payment Types</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4> Does RemitSo support both Peer-to-Peer (P2P) and business-to-business (B2B) payments?
                            </h4>
                            <p>Yes, RemitSo supports both peer-to-peer (P2P) and B2B payments. Our platform is designed
                                with robust P2P functionality for instant, automated transactions. While B2B payments
                                are currently processed manually by our team, we are actively working on automating this
                                process to provide the same seamless experience as our P2P service. </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What is the difference between P2P and B2B payments on RemitSo?</h4>
                            <p>P2P payments are designed for personal transactions between individuals and offer
                                instant, automated settlement through API integrations. B2B payments cater to businesses
                                and require a manual review process by our team before settlement. This ensures accuracy
                                and security for higher-value transactions.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Why are B2B payments not automated yet?
                            </h4>
                            <p>We understand the importance of automation for all types of transactions. While our
                                initial focus was on perfecting the P2P experience, we are committed to bringing the
                                same level of automation to B2B payments. This is a key priority on our roadmap, and we
                                are actively developing solutions to streamline the B2B payment process.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>When can I expect automated B2B payments on RemitSo?
                            </h4>
                            <p>We are diligently working on bringing automated B2B payments to RemitSo as soon as
                                possible. While we don't have a definitive timeline yet, we will keep our customers
                                updated on our progress through our website and other communication channels.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4> What are the benefits of using RemitSo for B2B payments even though it's currently
                                manual?
                            </h4>
                            <p>Even with the current manual process, RemitSo offers several advantages for B2B payments:
                            </p>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li><strong>Secure Platform:</strong> Our platform is built with robust security
                                    measures to protect your transactions.
                                </li>
                                <li><strong>Dedicated Support:</strong> Our team provides personalized support to guide
                                    you through the B2B payment process.
                                </li>
                                <li><strong>White Label Solution:</strong> RemitSo can be customized to match your brand
                                    identity, providing a seamless experience for your clients.
                                </li>
                                <li><strong>Future-Proof Solution:</strong> With automated B2B payments on our roadmap,
                                    you can be confident that you're investing in a platform that is constantly evolving
                                    to meet your needs.
                                </li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                    </div>
                </div>
                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter innovation">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-8.webp" width="25px"> Innovation </h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What makes RemitSo more than just another money transfer software?
                            </h4>
                            <p>RemitSo is committed to driving innovation in the global money transfer industry. We're
                                not just building software; we're developing cutting-edge technologies to make
                                international payments faster, more accessible, and more convenient for everyone. Our
                                team of experts constantly researches and develops new features to give our clients a
                                competitive edge and provide their customers with a seamless experience. </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What are some of the upcoming innovations RemitSo is working on? </h4>
                            <p>We have several exciting features in the pipeline! Here are a few highlights:
                            </p>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li><strong>Dynamic Price Controller:</strong> This tool will analyze market rates in
                                    real-time and automatically adjust your exchange rates to ensure you offer the most
                                    competitive prices while maximizing profit margins. (Expected release: August 2025)
                                </li>
                                <li><strong>WhatsApp Integration:</strong> Soon, your customers will be able to send
                                    money internationally as easily as sending a message! Our WhatsApp integration will
                                    eliminate the need for app downloads and logins, making transfers incredibly
                                    convenient. (Expected release: July 2025)
                                </li>
                                <li><strong>Multi-Currency Wallet:</strong> We're developing a multi-currency wallet
                                    that will allow your customers to securely store and manage various currencies in
                                    one place. This will make international transactions faster and smoother. (Expected
                                    release: March 2025)
                                </li>
                                <li><strong>Accessibility for the Visually Impaired:</strong> RemitSo is committed to
                                    inclusivity. We're working on features that utilize computer vision to help visually
                                    impaired customers use your app through voice commands and sensory feedback.
                                    (Expected release: February 2026)
                                </li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How can I stay updated on the latest RemitSo innovations?
                            </h4>
                            <p>We encourage you to request a demo to experience these innovations firsthand as they are
                                released. You can also stay informed by visiting our website and following us on social
                                media for the latest news and announcements.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What is the "Dynamic Price Controller" and how will it benefit my business?
                            </h4>
                            <p>The Dynamic Price Controller is a game-changer for managing your exchange rates. It acts
                                like an autopilot for your pricing, constantly monitoring market fluctuations and
                                automatically adjusting your rates to optimize competitiveness and profitability. This
                                means you can offer the best possible prices to your customers while ensuring healthy
                                margins for your business.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Why is RemitSo focusing on accessibility for the visually impaired?
                            </h4>
                            <p> We believe that everyone should have equal access to financial services, regardless of
                                their abilities. By incorporating features like voice commands and sensory feedback, we
                                aim to create a more inclusive platform that empowers visually impaired individuals to
                                manage their international payments independently and with confidence.
                            </p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter integrations">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-9.png" width="25px"> Integrations</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Do you currently have payout networks integrated on your platform? If so, can you
                                confirm the names? </h4>
                            <p>Yes, we have several payout partners already integrated, including: Junipay, DSG Pay,
                                Tranglo, bKash, Muthoot, Monoova. We are also in the process of integrating with
                                additional partners and aggressively expanding our network.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Do customers have to sign separate agreements with all the third-party providers you
                                currently have integrated (if any)?</h4>
                            <p>We act as an introducer and technology partner, and if the implementation scope falls
                                under our 20-hour no-cost policy, we don’t charge. However, a separate agreement with
                                the providers is necessary. </p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter customization">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-10.png" width="25px"> Customization</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Can MTOs suggest amendments to the UI/UX and App flows to fit their specific business
                                use case? </h4>
                            <p>Yes, absolutely! RemitSo is designed to be fully customizable to your specific business
                                flows and requirements. </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Can we integrate any additional or other applications? </h4>
                            <p>Yes, we can do on-demand customization at our standard development rate..<a
                                    href="<?php echo $this->Url->build([
                                                                                                                        'controller' => 'Pages',
                                                                                                                        'action' => 'pricing'
                                                                                                                    ]) ?>" target="_blank">check pricing</a></p>

                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter partners">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-11.png" width="25px"> Partners</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Do you currently have payout networks integrated on your platform? If so, can you
                                confirm the names? </h4>
                            <p>Yes, we have several payout partners already integrated, including: Junipay, DSG Pay,
                                Tranglo, bKash, Muthoot, Monoova. We are also in the process of integrating with
                                additional partners and aggressively expanding our network</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Do customers have to sign separate agreements with all the third-party providers you
                                currently have integrated?</h4>
                            <p>We act as an introducer and technology partner, if you sign up with any existing partner
                                you don’t have to pay anything. However, a separate agreement with the providers is
                                necessary.</p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter system-validation">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-12.png" width="25px"> System Validation</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What data can the system validate?</h4>
                            <p>The system can validate various data points, including names, account numbers, mobile
                                numbers, network types, connectivity issues, and account balance limits, depending on
                                the availability of required APIs.</p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter reports">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-13.png" width="25px"> Business Intelligence Reports</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What types of reports can the system currently generate?</h4>
                            <p>The system provides various reports, including settlement reports, reconciliation
                                reports, and reports showing transaction details such as principal amount, destination
                                amount, wholesale FX rate, and retail FX rate.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Can the platform generate custom reports? </h4>
                            <p>Yes, custom reports can be generated to meet specific requirements.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What statement options are available for the back office?</h4>
                            <p>The back office can download statements of transaction history in Excel and PDF, access
                                reports for specific beneficiaries, and receive statements automatically by email every
                                month. </p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>




                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter licensing">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-13.png" width="25px"> Licensing & Regulations</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What is the process to start a money transfer business in the UAE?</h4>
                            <p>To start a money transfer business in the UAE, choose the appropriate licensing
                                authority, prepare the required documentation, and follow the application process.
                                Ensure compliance with AML/KYC regulations.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What are the requirements for a UAE money transfer license?</h4>
                            <p>The UAE remittance license requirements include a business plan, proof of capital
                                adequacy, compliance policies, and operational resources. Specific requirements may vary
                                depending on the licensing body.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How long does it take to get a money transfer license in the UAE?</h4>
                            <p>Timelines vary:
                                Central Bank: Around 60 days.
                                ADGM/DIFC: A few weeks to months, depending on feedback rounds.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What is the cost of obtaining a money transfer license in the UAE?</h4>
                            <p>Costs depend on the licensing authority, capital requirements, and additional setup
                                expenses. Contact the relevant body for detailed fee structures.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Can I operate a money transfer business without a license?</h4>
                            <p>No. Operating without a UAE Money Services License is illegal and can result in severe
                                penalties.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How do I ensure compliance with UAE money transfer regulations?</h4>
                            <p>Implement robust AML/KYC systems, maintain transparent records, and stay updated with
                                regulatory changes. Partnering with compliance experts can help.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Which is better: Central Bank, ADGM, or DIFC licensing?</h4>
                            <p>It depends on your business needs. The Central Bank is suitable for non-free-zone
                                businesses, while ADGM and DIFC cater to free-zone entities with specific benefits.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Can RemitSo assist with money transfer business setup?</h4>
                            <p>Yes! RemitSo specializes in supporting businesses with financial operations and
                                compliance. Visit RemitSo to learn more.</p>
                        </div>
                        <hr class="faq-line-dash">


                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Do I Need a Physical Presence in Canada?</h4>
                            <p>No, not for Foreign MSBs. However, Domestic MSBs require a local presence to simplify
                                compliance and banking processes.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How Long Does the Licensing Process Take?</h4>
                            <p>The process usually takes 3 to 5 months, depending on your preparation and chosen service
                                package.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What Are the Costs for Ready-Made MSB Companies?</h4>
                            <p>Ready-made companies are available for 25,000 EUR, including compliance and corporate
                                setup.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What Happens If I Miss RPAA Deadlines?</h4>
                            <p>Failure to meet RPAA deadlines can result in service suspension for up to 60 days or
                                longer.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Can I Operate Internationally with a Canadian MSB License?</h4>
                            <p>Yes, an MSB licence allows international operations, subject to jurisdictional
                                restrictions based on your advertising strategies.</p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter operations">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <!-- <h2><img src="img/remit-faq/ic-13.png" width="25px"> Business Operations</h2> -->
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What are B2B international payments?</h4>
                            <p>B2B international payments are transactions between businesses in different countries,
                                enabling cross-border trade and supporting global operations.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What challenges do businesses face with B2B payments?</h4>
                            <p>Common challenges include compliance, currency exchange risks, high fees, delayed
                                payments, and security concerns.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How can digital wallets benefit B2B transactions?</h4>
                            <p>Digital wallets provide a fast, secure payment method with reduced fees, making them a
                                popular choice for businesses looking to streamline transactions.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Why is compliance important in B2B payments?</h4>
                            <p>Compliance with regulations like AML and KYC prevents fraud and protects businesses from
                                penalties, ensuring safe, legal transactions.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What trends are influencing B2B payments in 2024?</h4>
                            <p>Blockchain adoption, API-based solutions, AI-driven fraud prevention, and demand for
                                consumer-like experiences are key trends shaping the B2B payment landscape.</p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>
            </div>
            <div class="row faq-for-mob">
                <div class="col-lg-4">
                    <div class="faq-dropdown-wrapper">
                        <select id="faq-category-select" class="faq-select">
                            <option value="started" selected>Getting Started</option>
                            <option value="platform-cap">Platform Capabilities</option>
                            <option value="security">Security and Compliance</option>
                            <option value="kyc">KYC/AML Compliance</option>
                            <option value="support">Support and Service Level Agreements</option>
                            <option value="billing">Costs and Billing</option>
                            <option value="supported-payment">Supported Payment Types</option>
                            <option value="innovation">Innovation</option>
                            <option value="integrations">Integrations</option>
                            <option value="customization">Customization</option>
                            <option value="partners">Partners</option>
                            <option value="system-validation">System Validation</option>
                            <option value="reports">Business Intelligence Reports</option>
                            <option value="licensing">Licensing & Regulations</option>
                            <option value="operations">Business Operations</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="col-lg-8 portfolio-item mt-4 faq-content platform-cap">
                        <div class="remit-faq-data-text text-white">
                            <!-- <h2><img src="img/remit-faq/ic-1.png" width="25px"> Platform Capabilities</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What is RemitSo's transaction processing capacity?</h4>
                                <p>RemitSo is designed to handle high transaction volumes. It can easily process 60
                                    transactions per
                                    minute and scale up to 100 or more as needed.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Will the RemitSo platform experience lag or crashes if the transaction limit is
                                    exceeded? </h4>
                                <p>To ensure a smooth experience, any requests exceeding the processing capacity are
                                    queued intelligently, preventing system crashes or lag.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Does RemitSo support multiple currencies? </h4>
                                <p>Yes, RemitSo is designed to handle global transactions and supports a wide range of
                                    currencies.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>As a RemitSo master admin, can I create customized access controls for my partners
                                    and agents?</h4>
                                <p>Absolutely! RemitSo's white-label platform provides granular access control features.
                                    You can define roles with specific permissions, manage data access, and ensure your
                                    users only see what's essential for their needs.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Does the system come with a Load Balancer? If yes, how does the load balancer work?
                                </h4>
                                <p>The system uses AWS Elastic Load Balancer (ELB) to efficiently distribute traffic
                                    across multiple servers. This ensures high availability, scalability, and optimal
                                    performance, even under increased load. </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What load balancing features are available?</h4>
                                <p>The load balancer supports distribution based on predetermined percentages to
                                    different third-party payout networks, distribution based on delivery method type
                                    (cash pickup, bank deposit, mobile money, etc.), and distribution based on telco
                                    type. </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What types of promotions are available? Are you open to incorporating additional
                                    promotion types based on customer requirements? </h4>
                                <p>The system comes with flexible promotion options, including the ability to add coupon
                                    codes. We are also happy to work with you to incorporate additional promotion types
                                    to meet your specific needs.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What types of loyalty programs are available? Are you willing to add or amend
                                    loyalty programs to align with a company's needs? </h4>
                                <p>Currently, the system doesn't come with a dedicated loyalty program module. However,
                                    we have a similar module that allows you to categorize customers and offer different
                                    rates, charges, and discounts as needed.</p>
                            </div>
                            <hr class="faq-line-dash">
                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content security">
                        <div class="remit-faq-data-text text-white">
                            <!-- <h2><img src="img/remit-faq/ic-4.png" width="25px"> Security and Compliance</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>How does RemitSo address data security and compliance, especially regarding GDPR?
                                </h4>
                                <p>
                                    RemitSo prioritizes data security and compliance with regulations like GDPR. The
                                    platform can be deployed on servers within your local jurisdiction, giving you
                                    control over your customer data and ensuring adherence to regional data protection
                                    laws.
                                </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What security measures are in place to protect sensitive financial data within
                                    RemitSo? </h4>
                                <p class="mb-3"><strong>RemitSo employs multiple layers of security:</strong></p>
                                <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                    <li>Data encryption (both in transit and at rest)</li>
                                    <li>Role-based access controls</li>
                                    <li>Regular security audits and vulnerability assessments</li>
                                    <li>Multi-factor authentication</li>
                                </ul>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>How does RemitSo ensure disaster recovery? </h4>
                                <p>By default, RemitSo backs up data up to 00:00 (midnight) of the previous day. More
                                    frequent backups or extended retention periods can be arranged at additional cost.
                                </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>How does RemitSo protect against cyber attacks? </h4>
                                <p>RemitSo utilizes AWS WAF (Web Application Firewall) with pre-configured security
                                    rules to protect against common cyber attacks. We also recommend integrating tools
                                    like Cloudflare for enhanced security.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Does RemitSo include built-in sanctions screening? </h4>
                                <p>Yes, RemitSo provides sanctions screening at no cost to its customers. This
                                    functionality is powered by sanctionlookup.io and is fully integrated into the
                                    platform.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Can back office users set compliance limits and alerts within the system?</h4>
                                <p>Yes, the system allows for the configuration of compliance limits and alerts, such as
                                    transaction limits, to ensure regulatory compliance. Alerts are generated when
                                    predefined thresholds are exceeded.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Are cases automatically assigned for alerts and triggers? </h4>
                                <p>Currently, flagged alerts are reviewed manually, but automated case assignment is
                                    planned for future development. </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Do you have any solutions embedded (not third-party) already available? </h4>
                                <p>Yes, we have built-in compliance features. You can set various compliance rules and
                                    document requirements based on transaction amounts and other criteria. We can fully
                                    customize these rules to your preferences. The system triggers email alerts to
                                    compliance members as needed. </p>
                            </div>
                            <hr class="faq-line-dash">
                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content kyc">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-2.png" width="25px"> KYC/AML Compliance</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>How does RemitSo help Money Transfer Operators with KYC and AML compliance?</h4>
                                <p>RemitSo comes pre-integrated with a leading AML/KYC solution to help you meet your
                                    compliance
                                    obligations.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Can Money Transfer Operators integrate their own KYC/AML policies?</h4>
                                <p>Yes, RemitSo can be integrated with other AML/KYC solutions upon request.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Are ID verification, screening, and transaction monitoring costs included in your
                                    quotes? If yes, which company do you have integrated at the moment? </h4>
                                <p>The system comes with built-in integration for Sumsub. All you need is a license with
                                    Sumsub. The system also comes with a manual verification module at no cost.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4> Can we integrate any additional or other applications? </h4>
                                <p>Yes, we can do on-demand customization at our standard development rate of as per our
                                    standard rates..<a
                                        href="<?php echo $this->Url->build([
                                                                                                                                                    'controller' => 'Pages',
                                                                                                                                                    'action' => 'pricing'
                                                                                                                                                ]) ?>"
                                        target="_blank">check pricing</a></p>
                                <p>Note: As part of the software agreement, we also offer 20 hours of no-cost
                                    development support worth GBP 300 complementary. So any integration that falls
                                    within 20 hours will be at no cost.</p>
                            </div>
                            <hr class="faq-line-dash">

                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content support">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-5.png" width="25px"> Support and Service Level Agreements</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>How does the RemitSo support team handle customer queries?</h4>
                                <p>You can contact the RemitSo support team directly via WhatsApp, Skype, or email. Our
                                    typical response time is between 1 to 30 minutes during working hours.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What service level agreements (SLAs) does RemitSo offer? </h4>
                                <p><strong>We offer two SLA options:</strong></p>
                                <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                    <li><strong>Basic Support: </strong> Resolution times vary based on issue severity
                                    </li>
                                    <li><strong>Small: </strong> 30 minutes to 2 hours</li>
                                    <li><strong>Medium: </strong> 1 business day</li>
                                    <li><strong>Large: </strong> 2 business days</li>

                                    <li class="mt-3"><strong>Premium Support: </strong> A dedicated technical account
                                        manager provides personalized support and faster resolution times (typically 30
                                        minutes to 1 business day).</li>
                                </ul>
                            </div>
                            <hr class="faq-line-dash">
                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content  billing">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-3.png" width="25px"> Costs and Billing</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Are server and hosting costs included in your pricing, or would they be an
                                    additional expense? </h4>
                                <p>Server and hosting costs are separate and will be based on your location,
                                    jurisdiction, and requirements. We utilize dedicated servers (not shared) and will
                                    provide you with a monthly AWS invoice for transparency. </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Are there any integration costs associated with the core banking platform? </h4>
                                <p>Yes, there may be integration costs, which will be calculated at our standard
                                    development cost mentioned earlier. To estimate an accurate timeline, we need to
                                    understand your specific requirements and analyze the effort involved. </p>
                            </div>
                            <hr class="faq-line-dash">
                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content started">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-6.png" width="25px"> Getting Started</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Do I need a licence to use RemitSo?</h4>
                                <p>Yes, a valid licence that allows you to operate as a money transfer operator in your
                                    business jurisdiction </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>How does RemitSo ensure compliance with regulations like AML and KYC?</h4>
                                <p>RemitSo has robust compliance features built-in, including KYC/AML checks,
                                    transaction monitoring, and reporting. We help you stay ahead of regulatory
                                    requirements and mitigate risks.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Can RemitSo integrate with my existing systems and third-party services?
                                </h4>
                                <p>Yes, RemitSo seamlessly integrates with a wide range of third-party systems,
                                    including banks, payment gateways, and other financial institutions. Our extensive
                                    API library ensures smooth data exchange and efficient processes.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Does RemitSo offer a mobile app and website to end customers?
                                </h4>
                                <p>Yes, RemitSo provides a customizable website, mobile applications for iOS and
                                    Android, enabling your customers to send and receive money conveniently on their
                                    smartphones.
                                </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4> Is RemitSo compliant with international regulations?</h4>
                                <p>Yes, RemitSo is designed to comply with global regulations, including KYC, AML, and
                                    other anti-fraud measures. Our compliance features help you mitigate risk and
                                    maintain the highest standards of regulatory adherence.
                                </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Is RemitSo a cloud-based or on-premise solution?</h4>
                                <p>RemitSo is a cloud-based money transfer application software, which means you can
                                    access it from anywhere with an internet connection. It eliminates the need for
                                    complex on-premise installations and maintenance.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4> Does RemitSo provides API Documentation?</h4>
                                <p>For MTOs with their own development teams, we provide detailed client API
                                    documentation, enabling them to build and integrate their own web and mobile
                                    applications seamlessly with our backend system.
                                </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4> Can MTOs suggest amendments to the UI/UX and App flows to fit their specific
                                    business use case? </h4>
                                <p>Yes, absolutely! RemitSo is designed to be fully customizable to your specific
                                    business flows and requirements. </p>
                            </div>
                            <hr class="faq-line-dash">
                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content supported-payment">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-7.webp" width="25px"> Supported Payment Types</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4> Does RemitSo support both Peer-to-Peer (P2P) and business-to-business (B2B)
                                    payments?</h4>
                                <p>Yes, RemitSo supports both peer-to-peer (P2P) and B2B payments. Our platform is
                                    designed with robust P2P functionality for instant, automated transactions. While
                                    B2B payments are currently processed manually by our team, we are actively working
                                    on automating this process to provide the same seamless experience as our P2P
                                    service. </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What is the difference between P2P and B2B payments on RemitSo?</h4>
                                <p>P2P payments are designed for personal transactions between individuals and offer
                                    instant, automated settlement through API integrations. B2B payments cater to
                                    businesses and require a manual review process by our team before settlement. This
                                    ensures accuracy and security for higher-value transactions.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Why are B2B payments not automated yet?
                                </h4>
                                <p>We understand the importance of automation for all types of transactions. While our
                                    initial focus was on perfecting the P2P experience, we are committed to bringing the
                                    same level of automation to B2B payments. This is a key priority on our roadmap, and
                                    we are actively developing solutions to streamline the B2B payment process.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>When can I expect automated B2B payments on RemitSo?
                                </h4>
                                <p>We are diligently working on bringing automated B2B payments to RemitSo as soon as
                                    possible. While we don't have a definitive timeline yet, we will keep our customers
                                    updated on our progress through our website and other communication channels.
                                </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4> What are the benefits of using RemitSo for B2B payments even though it's currently
                                    manual?
                                </h4>
                                <p>Even with the current manual process, RemitSo offers several advantages for B2B
                                    payments:
                                </p>
                                <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                    <li><strong>Secure Platform:</strong> Our platform is built with robust security
                                        measures to protect your transactions.
                                    </li>
                                    <li><strong>Dedicated Support:</strong> Our team provides personalized support to
                                        guide you through the B2B payment process.
                                    </li>
                                    <li><strong>White Label Solution:</strong> RemitSo can be customized to match your
                                        brand identity, providing a seamless experience for your clients.
                                    </li>
                                    <li><strong>Future-Proof Solution:</strong> With automated B2B payments on our
                                        roadmap, you can be confident that you're investing in a platform that is
                                        constantly evolving to meet your needs.
                                    </li>
                                </ul>
                            </div>
                            <hr class="faq-line-dash">

                        </div>
                    </div>
                    <div class="  col-lg-8 portfolio-item mt-4 faq-content innovation">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-8.webp" width="25px"> Innovation </h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What makes RemitSo more than just another money transfer software?
                                </h4>
                                <p>RemitSo is committed to driving innovation in the global money transfer industry.
                                    We're not just building software; we're developing cutting-edge technologies to make
                                    international payments faster, more accessible, and more convenient for everyone.
                                    Our team of experts constantly researches and develops new features to give our
                                    clients a competitive edge and provide their customers with a seamless experience.
                                </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What are some of the upcoming innovations RemitSo is working on? </h4>
                                <p>We have several exciting features in the pipeline! Here are a few highlights:
                                </p>
                                <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                    <li><strong>Dynamic Price Controller:</strong> This tool will analyze market rates
                                        in real-time and automatically adjust your exchange rates to ensure you offer
                                        the most competitive prices while maximizing profit margins. (Expected release:
                                        August 2025)
                                    </li>
                                    <li><strong>WhatsApp Integration:</strong> Soon, your customers will be able to send
                                        money internationally as easily as sending a message! Our WhatsApp integration
                                        will eliminate the need for app downloads and logins, making transfers
                                        incredibly convenient. (Expected release: July 2025)
                                    </li>
                                    <li><strong>Multi-Currency Wallet:</strong> We're developing a multi-currency wallet
                                        that will allow your customers to securely store and manage various currencies
                                        in one place. This will make international transactions faster and smoother.
                                        (Expected release: March 2025)
                                    </li>
                                    <li><strong>Accessibility for the Visually Impaired:</strong> RemitSo is committed
                                        to inclusivity. We're working on features that utilize computer vision to help
                                        visually impaired customers use your app through voice commands and sensory
                                        feedback. (Expected release: February 2026)
                                    </li>
                                </ul>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>How can I stay updated on the latest RemitSo innovations?
                                </h4>
                                <p>We encourage you to request a demo to experience these innovations firsthand as they
                                    are released. You can also stay informed by visiting our website and following us on
                                    social media for the latest news and announcements.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What is the "Dynamic Price Controller" and how will it benefit my business?
                                </h4>
                                <p>The Dynamic Price Controller is a game-changer for managing your exchange rates. It
                                    acts like an autopilot for your pricing, constantly monitoring market fluctuations
                                    and automatically adjusting your rates to optimize competitiveness and
                                    profitability. This means you can offer the best possible prices to your customers
                                    while ensuring healthy margins for your business.
                                </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Why is RemitSo focusing on accessibility for the visually impaired?
                                </h4>
                                <p> We believe that everyone should have equal access to financial services, regardless
                                    of their abilities. By incorporating features like voice commands and sensory
                                    feedback, we aim to create a more inclusive platform that empowers visually impaired
                                    individuals to manage their international payments independently and with
                                    confidence.
                                </p>
                            </div>
                            <hr class="faq-line-dash">

                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content integrations">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-9.png" width="25px"> Integrations</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Do you currently have payout networks integrated on your platform? If so, can you
                                    confirm the names? </h4>
                                <p>Yes, we have several payout partners already integrated, including: Junipay, DSG Pay,
                                    Tranglo, bKash, Muthoot, Monoova. We are also in the process of integrating with
                                    additional partners and aggressively expanding our network.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Do customers have to sign separate agreements with all the third-party providers you
                                    currently have integrated (if any)?</h4>
                                <p>We act as an introducer and technology partner, and if the implementation scope falls
                                    under our 20-hour no-cost policy, we don’t charge. However, a separate agreement
                                    with the providers is necessary. </p>
                            </div>
                            <hr class="faq-line-dash">

                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content  customization">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-10.png" width="25px"> Customization</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Can MTOs suggest amendments to the UI/UX and App flows to fit their specific
                                    business use case? </h4>
                                <p>Yes, absolutely! RemitSo is designed to be fully customizable to your specific
                                    business flows and requirements. </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Can we integrate any additional or other applications? </h4>
                                <p>Yes, we can do on-demand customization at our standard development rate..<a
                                        href="<?php echo $this->Url->build([
                                                                                                                        'controller' => 'Pages',
                                                                                                                        'action' => 'pricing'
                                                                                                                    ]) ?>" target="_blank">check pricing</a></p>

                            </div>
                            <hr class="faq-line-dash">

                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content  partners">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-11.png" width="25px"> Partners</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Do you currently have payout networks integrated on your platform? If so, can you
                                    confirm the names? </h4>
                                <p>Yes, we have several payout partners already integrated, including: Junipay, DSG Pay,
                                    Tranglo, bKash, Muthoot, Monoova. We are also in the process of integrating with
                                    additional partners and aggressively expanding our network</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Do customers have to sign separate agreements with all the third-party providers you
                                    currently have integrated?</h4>
                                <p>We act as an introducer and technology partner, if you sign up with any existing
                                    partner you don’t have to pay anything. However, a separate agreement with the
                                    providers is necessary.</p>
                            </div>
                            <hr class="faq-line-dash">

                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content system-validation">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-12.png" width="25px"> System Validation</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What data can the system validate?</h4>
                                <p>The system can validate various data points, including names, account numbers, mobile
                                    numbers, network types, connectivity issues, and account balance limits, depending
                                    on the availability of required APIs.</p>
                            </div>
                            <hr class="faq-line-dash">

                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content reports">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-13.png" width="25px"> Business Intelligence Reports</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What types of reports can the system currently generate?</h4>
                                <p>The system provides various reports, including settlement reports, reconciliation
                                    reports, and reports showing transaction details such as principal amount,
                                    destination amount, wholesale FX rate, and retail FX rate.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Can the platform generate custom reports? </h4>
                                <p>Yes, custom reports can be generated to meet specific requirements.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What statement options are available for the back office?</h4>
                                <p>The back office can download statements of transaction history in Excel and PDF,
                                    access reports for specific beneficiaries, and receive statements automatically by
                                    email every month. </p>
                            </div>
                            <hr class="faq-line-dash">

                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content licensing">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-13.png" width="25px"> Licensing & Regulations</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What is the process to start a money transfer business in the UAE?</h4>
                                <p>To start a money transfer business in the UAE, choose the appropriate licensing
                                    authority, prepare the required documentation, and follow the application process.
                                    Ensure compliance with AML/KYC regulations.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What are the requirements for a UAE money transfer license?</h4>
                                <p>The UAE remittance license requirements include a business plan, proof of capital
                                    adequacy, compliance policies, and operational resources. Specific requirements may
                                    vary depending on the licensing body.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>How long does it take to get a money transfer license in the UAE?</h4>
                                <p>Timelines vary:
                                    Central Bank: Around 60 days.
                                    ADGM/DIFC: A few weeks to months, depending on feedback rounds.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What is the cost of obtaining a money transfer license in the UAE?</h4>
                                <p>Costs depend on the licensing authority, capital requirements, and additional setup
                                    expenses. Contact the relevant body for detailed fee structures.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Can I operate a money transfer business without a license?</h4>
                                <p>No. Operating without a UAE Money Services License is illegal and can result in
                                    severe penalties.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>How do I ensure compliance with UAE money transfer regulations?</h4>
                                <p>Implement robust AML/KYC systems, maintain transparent records, and stay updated with
                                    regulatory changes. Partnering with compliance experts can help.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Which is better: Central Bank, ADGM, or DIFC licensing?</h4>
                                <p>It depends on your business needs. The Central Bank is suitable for non-free-zone
                                    businesses, while ADGM and DIFC cater to free-zone entities with specific benefits.
                                </p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Can RemitSo assist with money transfer business setup?</h4>
                                <p>Yes! RemitSo specializes in supporting businesses with financial operations and
                                    compliance. Visit RemitSo to learn more.</p>
                            </div>
                            <hr class="faq-line-dash">


                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Do I Need a Physical Presence in Canada?</h4>
                                <p>No, not for Foreign MSBs. However, Domestic MSBs require a local presence to simplify
                                    compliance and banking processes.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>How Long Does the Licensing Process Take?</h4>
                                <p>The process usually takes 3 to 5 months, depending on your preparation and chosen
                                    service package.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What Are the Costs for Ready-Made MSB Companies?</h4>
                                <p>Ready-made companies are available for 25,000 EUR, including compliance and corporate
                                    setup.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What Happens If I Miss RPAA Deadlines?</h4>
                                <p>Failure to meet RPAA deadlines can result in service suspension for up to 60 days or
                                    longer.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Can I Operate Internationally with a Canadian MSB License?</h4>
                                <p>Yes, an MSB licence allows international operations, subject to jurisdictional
                                    restrictions based on your advertising strategies.</p>
                            </div>
                            <hr class="faq-line-dash">

                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content operations">
                        <div class="remit-faq-data-text mt-4 text-white">
                            <!-- <h2><img src="img/remit-faq/ic-13.png" width="25px"> Business Operations</h2> -->
                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What are B2B international payments?</h4>
                                <p>B2B international payments are transactions between businesses in different
                                    countries, enabling cross-border trade and supporting global operations.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What challenges do businesses face with B2B payments?</h4>
                                <p>Common challenges include compliance, currency exchange risks, high fees, delayed
                                    payments, and security concerns.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>How can digital wallets benefit B2B transactions?</h4>
                                <p>Digital wallets provide a fast, secure payment method with reduced fees, making them
                                    a popular choice for businesses looking to streamline transactions.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>Why is compliance important in B2B payments?</h4>
                                <p>Compliance with regulations like AML and KYC prevents fraud and protects businesses
                                    from penalties, ensuring safe, legal transactions.</p>
                            </div>
                            <hr class="faq-line-dash">

                            <div class="remit-faq-data-text-down mt-3">
                                <h4>What trends are influencing B2B payments in 2024?</h4>
                                <p>Blockchain adoption, API-based solutions, AI-driven fraud prevention, and demand for
                                    consumer-like experiences are key trends shaping the B2B payment landscape.</p>
                            </div>
                            <hr class="faq-line-dash">

                        </div>
                    </div>

                </div>

            </div>
            <div class="row text-center justify-content-center mt-5">
                <div class="col-lg-8">
                    <p class="text-white text-center">We've highlighted most common FAQs, still looking for specific
                        answers</p>
                    <a class="btn btn-outline-light hero-btn mt-4 " href="" data-toggle="modal"
                        data-target="#exampleModal-request-demo-2"> Request Demo </a>
                </div>
            </div>
        </div>
    </section>

    <section class="custom-bg">
    <div class="container">
    <div class="row remit-gap cross-border-bg align-items-center justify-content-between">
            <div class="col-lg-5">
                <div class="cross-border-text text-white">
                    <h4>Assess the platform's architecture, security, and scalability</h4>

                    <div class="cross-border-anch mt-4">
                        <a href="/technicalfaqs" >
                        Technical FAQs <span> → </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="cross-border-text text-center">
                    <img src="img/tech-faqs.png" class="img-fluid">
                </div>
            </div>
          </div>
    </div>
   </section>

</main>