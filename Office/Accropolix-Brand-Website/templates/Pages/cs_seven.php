<?php

declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section class="hero-slider inner-hero case-studies-marketing-hero py-0">
    <div class="container">
        <div class="text-left text-compile text-white">
            <h2 class="mb-4">2x Faster Deployments with Real-Time ETL Pipeline and Predictive Healthcare Models</h2>
            <!-- <h4>Build A team, Drive Growth </h4> -->
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Project Type</h3>
        </div>

        <div class="row project-type align-items-center justify-content-center">
            <div class="col-lg-3">
                <div class="project-type-text text-center">
                    <span>Advanced Data Engineering</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="project-type-text text-center">
                    <span> ETL Process Optimization</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="project-type-text text-center">
                    <span>Predictive Analytics Development</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Overview</h3>
        </div>
        <div class="row client-text-data text-center align-items-center justify-content-center">
            <div class="col-lg-10">
                <p>We optimised the ETL pipelines for a major healthcare provider, speeding up insights and improving the accuracy of predictive analytics for patient outcomes. By redesigning the data pipeline, we increased dashboard query performance by 7X. This allowed for better health monitoring, leading to improved patient care and operational efficiency. It also saved costs by streamlining data processes, reducing errors, and minimising delays in critical data availability, which are crucial for timely patient treatment decisions.</p>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row client-text-data align-items-center justify-content-center project-type">
            <div class="col-lg-5">
                <div class="summary-result">
                    <img src="/img/case-studies/case-study-4/business-challenges.webp" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7">
                <h4>Business Challenge</h4>
                <p>The customer is a leading healthcare provider with thousands of medical devices installed across hospitals and clinics. These devices automate essential processes such as patient monitoring and medical testing, generating data on metrics like heart rate and blood pressure fluctuations, which are captured by sensors and collected on a centralised IoT server. The customer utilises an in-house developed dashboard to monitor this data and predict potential equipment malfunctions, patient health deteriorations, and other critical incidents. However, the dashboard is slow, not scalable, and depends on manual data updates every 2-3 days, resulting in significant delays in generating insights and predicting health-related issues.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <div class="row client-text-data  align-items-center justify-content-center project-type">
            <div class="col-lg-7">
                <h4>The client wanted to enable</h4>
                <ul class="case-study-data-upd"></ul>
                <li>Central monitoring and diagnosis of medical equipment across various healthcare facilities while ensuring the cost of integrating more devices remains low and consistent.</li>
                <li>A solution to more accurately forecast potential downtimes and malfunctions of medical equipment in a cost-effective manner, potentially saving millions of dollars by preventing medical errors and unnecessary procedures.</li>
                <li>Near real-time updates to their dashboards for better operational visibility and more responsive patient care.</li>
                </ul>

            </div>
            <div class="col-lg-5">
                <div class="summary-result">
                    <img src="/img/case-studies/case-study-4/client-wanted.webp" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Accropolix’s Solution</h3>
        </div>
        <div class="row client-text-data align-items-center justify-content-center project-type">
            <div class="col-lg-12">
                <ul class="case-study-data-upd"></ul>
                <li>We built an ETL data pipeline that improved historical insights from IoT-equipped medical devices, used by QA analysts, healthcare administrators, and the procurement team.</li>
                <li>To enable faster query processing times, we developed a Spark-based data lake along with a high-speed dashboard.</li>
                <li>We utilised open-source technologies to seamlessly integrate and scale the predictive analytics and forecasting components within the new solution, while also automating the deployment process.</li>
                <li>A centralised IoT MQTT Broker collected healthcare-related IoT data, such as patient telemetry and fault data from sensors across healthcare facilities.</li>
                <li>The raw data was enriched, processed, and harmonised before being stored in an S3 data lake, which served as the backbone for monitoring and analytical operations.</li>
                <li>Data was routed through several Airflow and PySpark-based pipelines, which processed the data to generate feature tables displayed in the dashboard's user interface.</li>
                <li>These pipelines utilised machine learning scripts to predict and forecast health-related events and equipment performance.</li>
                <li>Dashboards were updated using SQL-based queries powered by tools such as Trino, Databricks, and Delta Lake.</li>
                <li>We designed appropriate tables based on data from various pipelines, with the flexibility to modify them to meet evolving healthcare requirements.</li>
                <li>The data was further processed through a specialised healthcare data platform using tools like Amazon HealthLake, enabling the development of predictive machine learning models.</li>
                </ul>

            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Migration Strategy Plan</h3>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <div class="case-sol-img">
                    <img src="/img/case-studies/case-study-4/migration-diagram.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Business Outcomes</h3>
        </div>
        <div class="row client-text-data text-center align-items-center justify-content-center">
            <div class="col-lg-10">
                <p>Accropolix developed a highly efficient and almost instant ETL data pipeline for the healthcare provider that speed up query processing times and increased the system's ability to handle more data. This setup improved the way dashboards are monitored, making it quicker to spot and fix potential issues. The entire system uses infrastructure as code, which helps speed up the introduction of new updates and features. Moreover, the approach helps keep costs low when new features are added.</p>
            </div>
        </div>
        <div class="row mt-3 client-text-data  align-items-center justify-content-center">
            <div class="col-lg-4">
                <div class="case-bus ">
                    <p><strong>1. 7x improvement in query performance</strong></p>
                    <p><strong>2. 3 days to 1 hour reduction in data update speed</strong></p>
                    <p><strong>3. 2x faster deployment time for new features</strong></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row client-text-data align-items-center justify-content-center text-compile mt-4">
            <div class="col-lg-10">
                <div class="case-sol-text text-center">
                    <h4 class="font-weight-bold">About Accropolix</h4>
                    <p>Accropolix specialises in predictive modelling and ETL pipelines, enhancing healthcare efficiency through optimised data processing and real-time alerts for improved patient care outcomes.</p>
                </div>
            </div>
        </div>

        <div class="row client-text-data align-items-center justify-content-center text-compile mt-4">
            <div class="col-lg-10">
                <div class="case-sol-text text-center">
                    <h4 class="font-weight-bold">Begin Your Project!</h4>
                    <p>Reach out to us at vivek@accropolix.ai to create strong and scalable data pipelines.</p>
                </div>
            </div>
        </div>
    </div>
</section>