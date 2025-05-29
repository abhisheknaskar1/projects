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
                    <h4 class="text-white mt-4">Your questions on architecture, security, and scalability are addressed. For a detailed technical walkthrough</h4>
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
            <div class="row faq-for-deskt faq-text-bg ">
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
                    <button class="btn btn-default flex align-items-center filter-button filter-faq-desk active" data-filter="platform-over"> <img src="/img/faq-ic/ic-1.png" alt="" class="img-fluid"> Platform Overview</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="technology-stack"><img src="/img/faq-ic/ic-2.png" alt="" class="img-fluid"> Technology Stack</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="security"><img src="/img/faq-ic/ic-3.png" alt="" class="img-fluid"> Security & Compliance</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="dependencies"> <img src="/img/faq-ic/ic-4.png" alt="" class="img-fluid"> Dependencies & Technology Licensing</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="infrastructure"><img src="/img/faq-ic/ic-5.png" alt="" class="img-fluid"> Infrastructure & DevOps</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="partner"> <img src="/img/faq-ic/ic-6.png" alt="" class="img-fluid"> Partner & Agent Management</button>
                    <button class="btn btn-default filter-button filter-faq-desk" data-filter="scalability"> <img src="/img/faq-ic/ic-7.png" alt="" class="img-fluid"> Scalability & Resilience</button>
    
                 </div>
                 

                </div>
                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter platform-over">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Provide a high-level overview of the platform and its key features.</h4>
                            <p>RemitSo, a brand owned by Prymera Consulting Private limited is an Enterprise grade software platform designed to manage money transfer business operations. Some key features/core modules include:  </p>
                            <div class="remit-faq-sub">
                                <p>1.⁠ ⁠Risk mitigation</p>
                                <p>2.⁠ ⁠Customer onboarding and KYC</p>
                                <p>3.⁠ ⁠Ongoing due-diligence</p>
                                <p>4.⁠ ⁠Anti Money Laundering / Counter Finance of Terrorism</p>
                                <p>5.⁠ ⁠Sanction Screening</p>
                                <p>6. Rule based transaction processing system</p>
                                <p>7.⁠ ⁠Role based access management</p>
                                <p>8.⁠ ⁠Automation of workflows</p>
                                <p>9.⁠ ⁠Accounting</p>
                                <p>10.⁠ ⁠Audit Logs</p>
                                <p>11.⁠ ⁠Data Security and compliance</p>
                                <p><strong>Model: </strong>  cloud-based application.</p>
                            </div>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Frontend (Mobile App)</h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>Built using Flutter, providing a cross-platform experience for Android and iOS.</li>
                                <li>Manages user authentication, onboarding, transaction processing, and KYC submissions.</li>
                                <li>Communicates with the backend via RESTful APIs and WebSockets for real-time updates.</li>
                                <li>Integrates with third-party services like Volume (for payment) and Sumsub (for identity verification).</li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Backend</h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>Developed in Laravel (PHP), serving as the core processing engine.</li>
                                <li>Implements a modular service structure for handling payments, compliance, transaction workflows, and user management.</li>
                                <li>Uses event-driven processing with AWS SQS to handle asynchronous tasks like transaction approvals, risk evaluations, and payout processing.</li>
                                <li>Payment Processing: Volume Pay is integrated to process payments and settlements.</li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Database</h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>PostgreSQL serves as the primary relational database, ensuring ACID-compliant transactions.</li>
                                <li>Uses UUIDs for primary keys to ensure global uniqueness across all records.</li>
                                <li>Redis is used for caching frequently accessed data to optimize performance.</li>
                                <li>Identity Verification & Compliance:</li>
                                <li>Sumsub handles KYC and AML checks, including:</li>
                                <li>Document verification (passports, ID cards, bank statements).</li>
                                <li>Face match and liveness detection.</li>
                                <li>Risk scoring based on document authenticity and user history.</li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Rule-Based AML System</h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>Configurable policies, limits, and risk thresholds based on transaction behavior.
                                </li>
                                <li>Automated transaction monitoring to flag suspicious activities.
                                </li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Messaging & Orchestration
                            </h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>AWS SQS (Simple Queue Service) for event-driven processing, ensuring scalable and fault-tolerant transaction handling.
                                </li>
                                <li>AWS SNS (Simple Notification Service) for real-time notifications and alerts.
                                </li>
                                <li>AWS SES (Simple Email Service) for secure email communication, including transaction confirmations and regulatory notices.
                                </li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Infrastructure & Deployment</h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>Fully hosted on AWS, leveraging managed services for scalability and security.
                                </li>
                                <li>AWS Lambda is used for processing lightweight tasks asynchronously.
                                </li>
                                <li>S3 storage for document uploads (e.g., KYC documents, receipts, compliance reports).
                                </li>
                                <li>Laravel Vapor used for infrastructure automation and deployment management.
                                </li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4> What is your current production uptime SLA? </h4>
                            <p>99.99% </p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>
                <div class="col-lg-8 bg-faq-black portfolio-item mt-4 filter technology-stack">
                    <div class="remit-faq-data-text text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Backend technology and frameworks used</h4>
                            <p>PHP 8.3, Laravel 12</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Frontend technologies</h4>
                            <p>Flutter 3.23.2, Vue.js,  React</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Database engine and version</h4>
                            <p>Postgresql 17</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Hosting environment</h4>
                            <p>AWS Lambda
                            </p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>
                

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter security">
                    <div class="remit-faq-data-text text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Have you conducted a Penetration Test in the past 12 months?</h4>
                            <p>
                            Yes
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Do you use automated vulnerability-scanning tools (Snyk, Dependabot, etc.)?
                            </h4>
                            <p>Yes (Dependabot )</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How are security patches and updates managed? (E.g., libraries, PHP, Flutter dependencies) </h4>
                            <p class="mb-2"><strong>Monitoring & Tracking:</strong></p>
                            <p>We continuously monitor security advisories and vulnerability databases for PHP, Laravel, Flutter, and other dependencies. Dependabot tracks outdated or vulnerable packages.</p>

                            <p class="mb-2"><strong>Update Process:</strong></p>
                            <p>Critical security patches are applied immediately following a review and testing process.</p>
                            <p>Routine updates (e.g., framework and library updates) are scheduled in maintenance sprints to prevent breaking changes.
                            </p>
                            <p>We follow semantic versioning guidelines to assess impact before upgrading dependencies.
                            </p>

                            <p class="mb-2"><strong>Testing & Deployment:
                            </strong></p>
                            <p>All updates go through staging environments for testing before being deployed to production.</p>

                            <p class="mb-2"><strong>System-Level Security Updates:</strong></p>
                            <p>The infrastructure is continuously monitored for OS-level security updates (e.g., RHEL updates on AWS).</p>
                            <p>Security patches for AWS-managed services (e.g., Lambda, RDS) are handled within AWS maintenance windows.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Describe your access control policies (RBAC, MFA, etc.).</h4>
                            <p class="mb-2"><strong>Access Control (RBAC + ABAC):
                            </strong></p>
                            <p>Uses RBAC (Role-Based Access Control) for standard user roles (e.g., Admin, Agent, Customer).
                            </p>
                            <p>Implements ABAC (Attribute-Based Access Control) to restrict access based on transaction type, country, and risk level.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How do you manage PII encryption (at rest/in transit)?</h4>
                            <p class="mb-2">PII is encrypted at rest using AES-256 and in transit using TLS 1.2 or 1.3. We employ robust encryption methods for PII, including column-level encryption at rest for sensitive fields like name and phone number. 
                            </p>
                            <p>For data in transit, we utilize secure protocols like TLS/SSL to ensure confidentiality.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Describe your incident response process and reporting timelines.</h4>
                            <p class="mb-2"><strong>24/7 Monitoring:
                            </strong>
                            </p>
                            <p>Our system is continuously monitored using AWS CloudWatch, Datadog, and Uptimerobot for performance issues, system alerts, and service outages. 
                            </p>
                            <p>In case of any disruptions, alerts trigger predefined responses and notifications to the Incident Response Team (IRT), which operates 24/7
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter dependencies">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Are there any open-source components with GPL/AGPL licenses?</h4>
                            <p>No, we do not use open-source components with GPL or AGPL licenses to avoid copyleft obligations that could require us to disclose proprietary source code.</p>
                            <p>We primarily use MIT, Apache 2.0, and BSD licensed components, which allow commercial use without imposing source code distribution requirements. 
                            </p>
                            <p>All third-party dependencies are reviewed for license compliance before integration.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How do you track license compliance for dependencies?</h4>
                            <p>We track license compliance for dependencies through: </p>
                            <p>Software Bill of Materials (SBOM): We generate an SBOM to list all dependencies and their associated licenses.
                            </p>
                            <p>Manual Review: The team reviews dependencies when adding new packages or updating existing ones to ensure compliance with our licensing policies.
                            </p>
                            <p>Policy-Based Restrictions: We avoid dependencies with GPL/AGPL licenses if they conflict with our business needs.
                            </p>
                            <p>While we do not conduct formal audits or use automated license scanning tools, we maintain awareness of our dependencies and their licensing terms as part of our development workflow.
                            </p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter infrastructure">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Describe your CI/CD pipeline (tools, process, approvals).</h4>
                            <p><strong>Validation & Deployment</strong></p>
                            <p>Laravel Vapor is used for infrastructure automation and deployment management. The document also mentions CI/CD pipelines for security patches.</p>
                            <p>Fixes undergo internal testing and code reviews before deployment.</p>
                            <p>Security patches are rolled out using CI/CD pipelines for quick implementation.
                            </p>
                            <p>Post-deployment validation ensures the issue is resolved without regressions.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How is Infrastructure-as-Code (IaC) implemented? (Terraform, CloudFormation)</h4>
                            <p>CI/CD pipeline: Laravel Vapor is used for infrastructure automation and deployment management.
                            </p>
                            <p>Infrastructure-as-Code (IaC): Implemented using Laravel Vapor.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Are automated backups in place? Describe the process and frequency.
                            </h4>
                            <p>Daily backups of data and configurations are taken across all critical systems, including databases, application data, and server configurations. 
                            </p>
                            <p>These backups are stored across different availability zones (AZs) for redundancy.
                            </p>

                            <p><strong>Snapshotting:
                            </strong></p>
                            <p>Snapshots of databases are taken regularly for quick restoration in case of failure.</p>

                            <p><strong>High Availability (HA) Setup
                            </strong></p>
                            <p>Redundant Network Architecture:</p>

                            <p>Our network architecture is designed to avoid single points of failure. This includes multi-AZ deployment for all critical components (e.g., web servers, databases, queues, etc.) to ensure that traffic can be rerouted if one part of the system fails.</p>

                            <p><strong>AWS Lambda for High Availability:
                            </strong></p>
                            <p>We use AWS Lambda to ensure high availability by leveraging its ability to run code in response to events across multiple AWS regions. 
                            </p>
                            <p>Lambda functions can be triggered automatically to handle failures or disruptions, ensuring system continuity with minimal human intervention.
                            </p>

                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How is monitoring and alerting implemented (CloudWatch, X-Ray, etc.)?
                            </h4>
                            <p><strong>Monitoring & Alerts
                            </strong>
                            </p>
                            <p>We use advanced monitoring tools to track access, detect anomalies, and prevent breaches.
                            </p>

                            <p><strong>Access Logs & Monitoring
                            </strong></p>
                            <p>All authentication attempts, failed logins, and access events are logged.</p>
                            <p>Logs are stored securely and reviewed periodically.</p>
                            <p>AWS CloudTrail & SIEM tools are used for detecting suspicious activity.
                            </p>

                            <p><strong>Real-time Breach Alerts
                            </strong></p>
                            <p>Repeated failed login attempts trigger account lockout & alerts.</p>
                            <p>Anomalous behavior detection (e.g., logins from unusual locations or devices).</p>

                            <p><strong>Audit Logs & Forensics
                            </strong></p>
                            <p>Admin and compliance officers have access to audit logs to track who accessed what data. 
                            </p>
                            <p>Immutable logs ensure that access records cannot be tampered with.
                            </p>

                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Do you use Multi-Account AWS structure or single account?
                            </h4>
                            <p>Single Account Per Deployment
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        
                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter partner">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Describe your commission management process and configuration flexibility.
                            </h4>
                            <p>Our commission management system is designed to be highly configurable, supporting various commission structures based on business needs.</p>

                            <p><strong>Commission Structure</strong></p>
                            <p>Agent and Business Split: Commissions can be split between the agent and the business based on predefined rules.</p>
                            <p>FX Markup Earnings: Agents can earn commissions through foreign exchange (FX) markups in addition to standard transaction fees.</p>

                            <p><strong>Configuration Flexibility
                            </strong></p>
                            <p>Percentage-Based or Fixed Fees: The system supports both percentage-based and fixed commissions for agents and the business.</p>
                            <p>Custom Rules:  Businesses can define custom commission rules, including special rates for specific agents or partners.</p>
                            <p>Real-Time Updates: Changes to commission structures can be applied dynamically without requiring system downtime.</p>
                            <p>This flexible commission model ensures adaptability to different business models while maintaining transparency and automation in commission calculations.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How is agent onboarding managed? (Manual, automated, APIs)</h4>
                            <p>Agent onboarding is managed manually to ensure proper verification and compliance with business policies. </p>

                            <p><strong>Onboarding Steps:
                            </strong></p>

                            <p>Agent Application Submission – Agents provide necessary details, including identification and business credentials.
                            </p>
                            <p>Manual Verification – The submitted information is reviewed for accuracy and compliance.</p>
                            <p>Approval and Account Creation – Once verified, the agent is manually added to the system.</p>
                            <p>Commission & Access Configuration – The agent’s commission structure and permissions are set up based on predefined rules.</p>
                            <p>Training & Activation – Agents receive onboarding guidance before they can start processing transactions.</p>
                            <p>This manual approach ensures that only verified agents are onboarded, reducing risk while maintaining compliance with business and regulatory requirements.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What levels of role-based access are implemented for partners and agents? </h4>
                            <p>The system provides a configurable role-based access control (RBAC) framework, allowing businesses to define roles and permissions based on their operational needs. </p>

                            <p>Businesses can create custom roles for partners and agents, specifying granular access levels.</p>

                            <p>Permissions can be assigned for actions such as transaction processing, reporting, fee configuration, and compliance reviews.
                            </p>
                            <p>Access can be restricted to specific functionalities, ensuring data security and operational control.</p>
                            <p>The system supports hierarchical role structures, enabling businesses to set different levels of authority within their partner and agent network.</p>
                            <p>This flexibility allows businesses to tailor access control without modifying core system logic, ensuring adaptability to diverse operational models.</p>
                        </div>
                        <hr class="faq-line-dash">

                    </div>
                </div>

                <div class="  col-lg-8 bg-faq-black portfolio-item mt-4 filter scalability">
                    <div class="remit-faq-data-text mt-4 text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4> What are your Disaster Recovery (DR) and failover processes?
                            </h4>
                            <p><strong>Disaster Recovery Strategy (DRS)</strong></p>
                            <p>Cloud-Based Infrastructure (AWS):</p>
                            <p>Our infrastructure is fully hosted on AWS to take advantage of its built-in redundancy, scalability, and fault tolerance. Key elements include: </p>

                            <p><strong>Multi-Region Deployment:</strong></p>
                            <p>Critical services are replicated across multiple AWS regions to ensure availability in case of regional outages. This ensures that if one region experiences a disruption, services can failover to another region. </p>

                            <p><strong>Automated Failover: </strong></p>
                            <p>Services, databases, and APIs are designed for automated failover in the event of infrastructure failure, ensuring minimal service disruption. </p>

                            <p><strong>Backups: </strong></p>
                            <p>Daily backups of data and configurations are taken across all critical systems, including databases, application data, and server configurations. These backups are stored across different availability zones (AZs) for redundancy. </p>

                            <p><strong>Snapshotting: </strong></p>
                            <p>Snapshots of databases are taken regularly for quick restoration in case of failure.</p>

                            <p><strong>High Availability (HA) Setup Redundant Network Architecture: </strong></p>
                            <p>Our network architecture is designed to avoid single points of failure. This includes multi-AZ deployment for all critical components (e.g., web servers, databases, queues, etc.) to ensure that traffic can be rerouted if one part of the system fails.</p>

                            <p><strong>AWS Lambda for High Availability: </strong></p>
                            <p>We use AWS Lambda to ensure high availability by leveraging its ability to run code in response to events across multiple AWS regions. </p>
                            <p>Lambda functions can be triggered automatically to handle failures or disruptions, ensuring system continuity with minimal human intervention.</p>

                            <p><strong>Data Integrity and Backup </strong></p>
                            <p><strong>Real-Time Data Replication: </strong></p>
                            <p>Real-time data replication between primary and backup systems ensures that we are always working with the most up-to-date information. This helps minimize the impact of data loss during service disruptions.</p>

                            <p><strong>Backup Testing: </strong></p>
                            <p>We regularly test data restoration from backups to ensure the integrity and reliability of our backup systems. This ensures that recovery times are minimized during actual incidents.
                            </p>

                            <p><strong>Post-Incident Review and Continuous Improvement </strong></p>
                            <p><strong>Root Cause Analysis (RCA): </strong></p>
                            <p>After a major disruption or incident, we conduct a Root Cause Analysis to identify the cause of the disruption, evaluate the effectiveness of our response, and implement improvements to prevent recurrence.
                            </p>
                            <p><strong>Testing and Drills:
                            </strong></p>
                            <p>Regular disaster recovery drills and business continuity simulations are conducted to ensure that all team members are prepared to respond quickly and effectively to any disruption, minimizing downtime and service impact.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What is your current maximum transaction throughput per Second?</h4>
                            <p>Since we are using AWS Lambda, our maximum transaction throughput per second depends on several factors:</p>
                            <p>Lambda Concurrency Limits: AWS Lambda scales automatically based on incoming requests. The default concurrency limit per region is 1,000 concurrent executions, but this can be increased upon request.</p>
                            <p>Execution Duration: If each transaction takes 100ms, we can handle 10 transactions per second per concurrent execution. With 1,000 concurrent executions, that means 10,000 transactions per second at default limits.</p>
                            <p>Database and External API Limits: Throughput is also constrained by database performance and third-party APIs (e.g., payment gateways).</p>
                            <p>To optimize throughput, we:</p>
                            <p>Use asynchronous processing with AWS SQS and SNS.</p>
                            <p>Implement batch processing where applicable.</p>
                            <p>Monitor and scale database read/write capacities dynamically.</p>
                            <p>If required, we can request AWS to increase our concurrency limits to achieve even higher throughput.
                            </p>
                        </div>
                        <hr class="faq-line-dash">
                    </div>
                </div>
                
            </div>
            <div class="row faq-for-mob">
                <div class="col-lg-4">
                    <div class="faq-dropdown-wrapper">
                        <select id="faq-category-select" class="faq-select">
                            <option value="plat-over" selected>Platform Overview</option>
                            <option value="tech-stack">Technology Stack</option>
                            <option value="security">Security & Compliance </option>
                            <option value="dependencies">Dependencies & Technology Licensing
                            </option>
                            <option value="infrastructure">Infrastructure & DevOps</option>
                            <option value="partner">Partner & Agent Management</option>
                            <option value="scalability">Scalability & Resilience</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-6">
                <div class="  col-lg-8 portfolio-item mt-4 faq-content plat-over">
                        <div class="remit-faq-data-text mt-4 text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Provide a high-level overview of the platform and its key features.</h4>
                            <p>RemitSo, a brand owned by Prymera Consulting Private limited is an Enterprise grade software platform designed to manage money transfer business operations. Some key features/core modules include:  </p>
                            <div class="remit-faq-sub">
                                <p>1.⁠ ⁠Risk mitigation</p>
                                <p>2.⁠ ⁠Customer onboarding and KYC</p>
                                <p>3.⁠ ⁠Ongoing due-diligence</p>
                                <p>4.⁠ ⁠Anti Money Laundering / Counter Finance of Terrorism</p>
                                <p>5.⁠ ⁠Sanction Screening</p>
                                <p>6. Rule based transaction processing system</p>
                                <p>7.⁠ ⁠Role based access management</p>
                                <p>8.⁠ ⁠Automation of workflows</p>
                                <p>9.⁠ ⁠Accounting</p>
                                <p>10.⁠ ⁠Audit Logs</p>
                                <p>11.⁠ ⁠Data Security and compliance</p>
                                <p><strong>Model: </strong>  cloud-based application.</p>
                            </div>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Frontend (Mobile App)</h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>Built using Flutter, providing a cross-platform experience for Android and iOS.</li>
                                <li>Manages user authentication, onboarding, transaction processing, and KYC submissions.</li>
                                <li>Communicates with the backend via RESTful APIs and WebSockets for real-time updates.</li>
                                <li>Integrates with third-party services like Volume (for payment) and Sumsub (for identity verification).</li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Backend</h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>Developed in Laravel (PHP), serving as the core processing engine.</li>
                                <li>Implements a modular service structure for handling payments, compliance, transaction workflows, and user management.</li>
                                <li>Uses event-driven processing with AWS SQS to handle asynchronous tasks like transaction approvals, risk evaluations, and payout processing.</li>
                                <li>Payment Processing: Volume Pay is integrated to process payments and settlements.</li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Database</h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>PostgreSQL serves as the primary relational database, ensuring ACID-compliant transactions.</li>
                                <li>Uses UUIDs for primary keys to ensure global uniqueness across all records.</li>
                                <li>Redis is used for caching frequently accessed data to optimize performance.</li>
                                <li>Identity Verification & Compliance:</li>
                                <li>Sumsub handles KYC and AML checks, including:</li>
                                <li>Document verification (passports, ID cards, bank statements).</li>
                                <li>Face match and liveness detection.</li>
                                <li>Risk scoring based on document authenticity and user history.</li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Rule-Based AML System</h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>Configurable policies, limits, and risk thresholds based on transaction behavior.
                                </li>
                                <li>Automated transaction monitoring to flag suspicious activities.
                                </li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Messaging & Orchestration
                            </h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>AWS SQS (Simple Queue Service) for event-driven processing, ensuring scalable and fault-tolerant transaction handling.
                                </li>
                                <li>AWS SNS (Simple Notification Service) for real-time notifications and alerts.
                                </li>
                                <li>AWS SES (Simple Email Service) for secure email communication, including transaction confirmations and regulatory notices.
                                </li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4 class="mb-3">Infrastructure & Deployment</h4>
                            <ul style="list-style: disc; line-height: 1.6; margin-left: 20px;">
                                <li>Fully hosted on AWS, leveraging managed services for scalability and security.
                                </li>
                                <li>AWS Lambda is used for processing lightweight tasks asynchronously.
                                </li>
                                <li>S3 storage for document uploads (e.g., KYC documents, receipts, compliance reports).
                                </li>
                                <li>Laravel Vapor used for infrastructure automation and deployment management.
                                </li>
                            </ul>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4> What is your current production uptime SLA? </h4>
                            <p>99.99% </p>
                        </div>
                        <hr class="faq-line-dash">
                        </div>
                    </div>
                    <div class="col-lg-8 portfolio-item mt-4 faq-content tech-stack">
                        <div class="remit-faq-data-text text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Backend technology and frameworks used</h4>
                            <p>PHP 8.3, Laravel 12</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Frontend technologies</h4>
                            <p>Flutter 3.23.2, Vue.js,  React</p>
                        </div>
                        <hr class="faq-line-dash">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Database engine and version</h4>
                            <p>Postgresql 17</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Hosting environment</h4>
                            <p>AWS Lambda
                            </p>
                        </div>
                        <hr class="faq-line-dash">
                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content security">
                        <div class="remit-faq-data-text text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Have you conducted a Penetration Test in the past 12 months?</h4>
                            <p>
                            Yes
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Do you use automated vulnerability-scanning tools (Snyk, Dependabot, etc.)?
                            </h4>
                            <p>Yes (Dependabot )</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How are security patches and updates managed? (E.g., libraries, PHP, Flutter dependencies) </h4>
                            <p class="mb-2"><strong>Monitoring & Tracking:</strong></p>
                            <p>We continuously monitor security advisories and vulnerability databases for PHP, Laravel, Flutter, and other dependencies. Dependabot tracks outdated or vulnerable packages.</p>

                            <p class="mb-2"><strong>Update Process:</strong></p>
                            <p>Critical security patches are applied immediately following a review and testing process.</p>
                            <p>Routine updates (e.g., framework and library updates) are scheduled in maintenance sprints to prevent breaking changes.
                            </p>
                            <p>We follow semantic versioning guidelines to assess impact before upgrading dependencies.
                            </p>

                            <p class="mb-2"><strong>Testing & Deployment:
                            </strong></p>
                            <p>All updates go through staging environments for testing before being deployed to production.</p>

                            <p class="mb-2"><strong>System-Level Security Updates:</strong></p>
                            <p>The infrastructure is continuously monitored for OS-level security updates (e.g., RHEL updates on AWS).</p>
                            <p>Security patches for AWS-managed services (e.g., Lambda, RDS) are handled within AWS maintenance windows.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Describe your access control policies (RBAC, MFA, etc.).</h4>
                            <p class="mb-2"><strong>Access Control (RBAC + ABAC):
                            </strong></p>
                            <p>Uses RBAC (Role-Based Access Control) for standard user roles (e.g., Admin, Agent, Customer).
                            </p>
                            <p>Implements ABAC (Attribute-Based Access Control) to restrict access based on transaction type, country, and risk level.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How do you manage PII encryption (at rest/in transit)?</h4>
                            <p class="mb-2">PII is encrypted at rest using AES-256 and in transit using TLS 1.2 or 1.3. We employ robust encryption methods for PII, including column-level encryption at rest for sensitive fields like name and phone number. 
                            </p>
                            <p>For data in transit, we utilize secure protocols like TLS/SSL to ensure confidentiality.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Describe your incident response process and reporting timelines.</h4>
                            <p class="mb-2"><strong>24/7 Monitoring:
                            </strong>
                            </p>
                            <p>Our system is continuously monitored using AWS CloudWatch, Datadog, and Uptimerobot for performance issues, system alerts, and service outages. 
                            </p>
                            <p>In case of any disruptions, alerts trigger predefined responses and notifications to the Incident Response Team (IRT), which operates 24/7
                            </p>
                        </div>
                        <hr class="faq-line-dash">
                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content dependencies">
                        <div class="remit-faq-data-text mt-4 text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Are there any open-source components with GPL/AGPL licenses?</h4>
                            <p>No, we do not use open-source components with GPL or AGPL licenses to avoid copyleft obligations that could require us to disclose proprietary source code.</p>
                            <p>We primarily use MIT, Apache 2.0, and BSD licensed components, which allow commercial use without imposing source code distribution requirements. 
                            </p>
                            <p>All third-party dependencies are reviewed for license compliance before integration.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How do you track license compliance for dependencies?</h4>
                            <p>We track license compliance for dependencies through: </p>
                            <p>Software Bill of Materials (SBOM): We generate an SBOM to list all dependencies and their associated licenses.
                            </p>
                            <p>Manual Review: The team reviews dependencies when adding new packages or updating existing ones to ensure compliance with our licensing policies.
                            </p>
                            <p>Policy-Based Restrictions: We avoid dependencies with GPL/AGPL licenses if they conflict with our business needs.
                            </p>
                            <p>While we do not conduct formal audits or use automated license scanning tools, we maintain awareness of our dependencies and their licensing terms as part of our development workflow.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content infrastructure">
                        <div class="remit-faq-data-text mt-4 text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Describe your CI/CD pipeline (tools, process, approvals).</h4>
                            <p><strong>Validation & Deployment</strong></p>
                            <p>Laravel Vapor is used for infrastructure automation and deployment management. The document also mentions CI/CD pipelines for security patches.</p>
                            <p>Fixes undergo internal testing and code reviews before deployment.</p>
                            <p>Security patches are rolled out using CI/CD pipelines for quick implementation.
                            </p>
                            <p>Post-deployment validation ensures the issue is resolved without regressions.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How is Infrastructure-as-Code (IaC) implemented? (Terraform, CloudFormation)</h4>
                            <p>CI/CD pipeline: Laravel Vapor is used for infrastructure automation and deployment management.
                            </p>
                            <p>Infrastructure-as-Code (IaC): Implemented using Laravel Vapor.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Are automated backups in place? Describe the process and frequency.
                            </h4>
                            <p>Daily backups of data and configurations are taken across all critical systems, including databases, application data, and server configurations. 
                            </p>
                            <p>These backups are stored across different availability zones (AZs) for redundancy.
                            </p>

                            <p><strong>Snapshotting:
                            </strong></p>
                            <p>Snapshots of databases are taken regularly for quick restoration in case of failure.</p>

                            <p><strong>High Availability (HA) Setup
                            </strong></p>
                            <p>Redundant Network Architecture:</p>

                            <p>Our network architecture is designed to avoid single points of failure. This includes multi-AZ deployment for all critical components (e.g., web servers, databases, queues, etc.) to ensure that traffic can be rerouted if one part of the system fails.</p>

                            <p><strong>AWS Lambda for High Availability:
                            </strong></p>
                            <p>We use AWS Lambda to ensure high availability by leveraging its ability to run code in response to events across multiple AWS regions. 
                            </p>
                            <p>Lambda functions can be triggered automatically to handle failures or disruptions, ensuring system continuity with minimal human intervention.
                            </p>

                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How is monitoring and alerting implemented (CloudWatch, X-Ray, etc.)?
                            </h4>
                            <p><strong>Monitoring & Alerts
                            </strong>
                            </p>
                            <p>We use advanced monitoring tools to track access, detect anomalies, and prevent breaches.
                            </p>

                            <p><strong>Access Logs & Monitoring
                            </strong></p>
                            <p>All authentication attempts, failed logins, and access events are logged.</p>
                            <p>Logs are stored securely and reviewed periodically.</p>
                            <p>AWS CloudTrail & SIEM tools are used for detecting suspicious activity.
                            </p>

                            <p><strong>Real-time Breach Alerts
                            </strong></p>
                            <p>Repeated failed login attempts trigger account lockout & alerts.</p>
                            <p>Anomalous behavior detection (e.g., logins from unusual locations or devices).</p>

                            <p><strong>Audit Logs & Forensics
                            </strong></p>
                            <p>Admin and compliance officers have access to audit logs to track who accessed what data. 
                            </p>
                            <p>Immutable logs ensure that access records cannot be tampered with.
                            </p>

                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Do you use Multi-Account AWS structure or single account?
                            </h4>
                            <p>Single Account Per Deployment
                            </p>
                        </div>
                        <hr class="faq-line-dash">
                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content  partner">
                        <div class="remit-faq-data-text mt-4 text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4>Describe your commission management process and configuration flexibility.
                            </h4>
                            <p>Our commission management system is designed to be highly configurable, supporting various commission structures based on business needs.</p>

                            <p><strong>Commission Structure</strong></p>
                            <p>Agent and Business Split: Commissions can be split between the agent and the business based on predefined rules.</p>
                            <p>FX Markup Earnings: Agents can earn commissions through foreign exchange (FX) markups in addition to standard transaction fees.</p>

                            <p><strong>Configuration Flexibility
                            </strong></p>
                            <p>Percentage-Based or Fixed Fees: The system supports both percentage-based and fixed commissions for agents and the business.</p>
                            <p>Custom Rules:  Businesses can define custom commission rules, including special rates for specific agents or partners.</p>
                            <p>Real-Time Updates: Changes to commission structures can be applied dynamically without requiring system downtime.</p>
                            <p>This flexible commission model ensures adaptability to different business models while maintaining transparency and automation in commission calculations.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>How is agent onboarding managed? (Manual, automated, APIs)</h4>
                            <p>Agent onboarding is managed manually to ensure proper verification and compliance with business policies. </p>

                            <p><strong>Onboarding Steps:
                            </strong></p>

                            <p>Agent Application Submission – Agents provide necessary details, including identification and business credentials.
                            </p>
                            <p>Manual Verification – The submitted information is reviewed for accuracy and compliance.</p>
                            <p>Approval and Account Creation – Once verified, the agent is manually added to the system.</p>
                            <p>Commission & Access Configuration – The agent’s commission structure and permissions are set up based on predefined rules.</p>
                            <p>Training & Activation – Agents receive onboarding guidance before they can start processing transactions.</p>
                            <p>This manual approach ensures that only verified agents are onboarded, reducing risk while maintaining compliance with business and regulatory requirements.</p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What levels of role-based access are implemented for partners and agents? </h4>
                            <p>The system provides a configurable role-based access control (RBAC) framework, allowing businesses to define roles and permissions based on their operational needs. </p>

                            <p>Businesses can create custom roles for partners and agents, specifying granular access levels.</p>

                            <p>Permissions can be assigned for actions such as transaction processing, reporting, fee configuration, and compliance reviews.
                            </p>
                            <p>Access can be restricted to specific functionalities, ensuring data security and operational control.</p>
                            <p>The system supports hierarchical role structures, enabling businesses to set different levels of authority within their partner and agent network.</p>
                            <p>This flexibility allows businesses to tailor access control without modifying core system logic, ensuring adaptability to diverse operational models.</p>
                        </div>
                        <hr class="faq-line-dash">
                        </div>
                    </div>

                    <div class="  col-lg-8 portfolio-item mt-4 faq-content scalability">
                        <div class="remit-faq-data-text mt-4 text-white">
                        <div class="remit-faq-data-text-down mt-3">
                            <h4> What are your Disaster Recovery (DR) and failover processes?
                            </h4>
                            <p><strong>Disaster Recovery Strategy (DRS)</strong></p>
                            <p>Cloud-Based Infrastructure (AWS):</p>
                            <p>Our infrastructure is fully hosted on AWS to take advantage of its built-in redundancy, scalability, and fault tolerance. Key elements include: </p>

                            <p><strong>Multi-Region Deployment:</strong></p>
                            <p>Critical services are replicated across multiple AWS regions to ensure availability in case of regional outages. This ensures that if one region experiences a disruption, services can failover to another region. </p>

                            <p><strong>Automated Failover: </strong></p>
                            <p>Services, databases, and APIs are designed for automated failover in the event of infrastructure failure, ensuring minimal service disruption. </p>

                            <p><strong>Backups: </strong></p>
                            <p>Daily backups of data and configurations are taken across all critical systems, including databases, application data, and server configurations. These backups are stored across different availability zones (AZs) for redundancy. </p>

                            <p><strong>Snapshotting: </strong></p>
                            <p>Snapshots of databases are taken regularly for quick restoration in case of failure.</p>

                            <p><strong>High Availability (HA) Setup Redundant Network Architecture: </strong></p>
                            <p>Our network architecture is designed to avoid single points of failure. This includes multi-AZ deployment for all critical components (e.g., web servers, databases, queues, etc.) to ensure that traffic can be rerouted if one part of the system fails.</p>

                            <p><strong>AWS Lambda for High Availability: </strong></p>
                            <p>We use AWS Lambda to ensure high availability by leveraging its ability to run code in response to events across multiple AWS regions. </p>
                            <p>Lambda functions can be triggered automatically to handle failures or disruptions, ensuring system continuity with minimal human intervention.</p>

                            <p><strong>Data Integrity and Backup </strong></p>
                            <p><strong>Real-Time Data Replication: </strong></p>
                            <p>Real-time data replication between primary and backup systems ensures that we are always working with the most up-to-date information. This helps minimize the impact of data loss during service disruptions.</p>

                            <p><strong>Backup Testing: </strong></p>
                            <p>We regularly test data restoration from backups to ensure the integrity and reliability of our backup systems. This ensures that recovery times are minimized during actual incidents.
                            </p>

                            <p><strong>Post-Incident Review and Continuous Improvement </strong></p>
                            <p><strong>Root Cause Analysis (RCA): </strong></p>
                            <p>After a major disruption or incident, we conduct a Root Cause Analysis to identify the cause of the disruption, evaluate the effectiveness of our response, and implement improvements to prevent recurrence.
                            </p>
                            <p><strong>Testing and Drills:
                            </strong></p>
                            <p>Regular disaster recovery drills and business continuity simulations are conducted to ensure that all team members are prepared to respond quickly and effectively to any disruption, minimizing downtime and service impact.
                            </p>
                        </div>
                        <hr class="faq-line-dash">

                        <div class="remit-faq-data-text-down mt-3">
                            <h4>What is your current maximum transaction throughput per Second?</h4>
                            <p>Since we are using AWS Lambda, our maximum transaction throughput per second depends on several factors:</p>
                            <p>Lambda Concurrency Limits: AWS Lambda scales automatically based on incoming requests. The default concurrency limit per region is 1,000 concurrent executions, but this can be increased upon request.</p>
                            <p>Execution Duration: If each transaction takes 100ms, we can handle 10 transactions per second per concurrent execution. With 1,000 concurrent executions, that means 10,000 transactions per second at default limits.</p>
                            <p>Database and External API Limits: Throughput is also constrained by database performance and third-party APIs (e.g., payment gateways).</p>
                            <p>To optimize throughput, we:</p>
                            <p>Use asynchronous processing with AWS SQS and SNS.</p>
                            <p>Implement batch processing where applicable.</p>
                            <p>Monitor and scale database read/write capacities dynamically.</p>
                            <p>If required, we can request AWS to increase our concurrency limits to achieve even higher throughput.
                            </p>
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
                    <h4>Find answers to common questions asked by customers
                    </h4>

                    <div class="cross-border-anch mt-4">
                        <a href="/frequently-asked-questions" >
                        General FAQs <span> → </span>
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