<?php

declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section class="hero-slider inner-hero case-studies-marketing-hero py-0">
    <div class="container">
        <div class="text-left text-compile text-white">
            <h2 class="mb-4">Retail Marketing Data Pipelines and Data Warehouse</h2>
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
                    <span>Data Warehouse</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="project-type-text text-center">
                    <span>Data Pipelines</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="project-type-text text-center">
                    <span>Data Integration</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="project-type-text text-center">
                    <span>ETL/ELT</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="project-type-text text-center">
                    <span>Cloud Migration</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="project-type-text text-center">
                    <span>Scalable Architecture</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="project-type-text text-center">
                    <span>Analytics Platform</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Client Overview</h3>
        </div>
        <div class="row client-text-data text-center align-items-center justify-content-center">
            <div class="col-lg-10">
                <p>The client is a Texas-based retail company that provides storage solutions. Since 1988, they have become one of the biggest in their field by expanding their business and enhancing customer service.</p>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Summary of Results</h3>
        </div>
        <div class="row client-text-data align-items-center justify-content-center project-type">
            <div class="col-lg-5">
                <div class="summary-result">
                    <img src="/img/case-studies/case-study-2/result.webp" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7">
                <ul class="case-study-data-upd">
                    <li>The client’s data science team successfully integrated Google Analytics 360 data into their analytical models.</li>
                    <li>This data is now accessible through both Google BigQuery and the client’s on-premises data warehouse.</li>
                    <li>The integration provides a strong foundation for future projects.</li>
                    <li>It enables the client to use BigQuery and Analytics 360 for additional use cases.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">The Challenges</h3>
        </div>
        <div class="row client-text-data  align-items-center justify-content-center project-type">
            <div class="col-lg-7">
                <p>The client used Google Analytics 360 to improve tracking on their website and mobile app. They needed to share this data across different teams for real-time analysis but faced challenges integrating it into their existing systems. They required a smooth data pipeline to transfer Analytics 360 data to their on-premises SQL Server data warehouse, ensuring it worked well with their current setup and could grow in the future. To solve this, they hired Accropolix to create and implement a solution that met their immediate needs and supported future growth.</p>

            </div>
            <div class="col-lg-5">
                <div class="summary-result">
                    <img src="/img/case-studies/case-study-2/challenges.webp" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">The Requirements</h3>
        </div>
        <div class="row client-text-data align-items-center justify-content-center project-type">
            <div class="col-lg-5">
                <div class="summary-result">
                    <img src="/img/case-studies/case-study-2/requirement.webp" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7">
                <p class=" mb-2">The client teamed up with Accropolix to build a new data platform with these main goals:
                </p>
                <ul class="case-study-data-upd">
                <li>The data science team needed Google Analytics data for their work.</li>
                <li>This data had to be added to their current SQL Server data warehouse.</li>
                <li>The new data pipelines needed to handle more data and changing needs.</li>
                <li>The system should be cost-effective and use serverless solutions to reduce extra work.</li>
                </ul>

            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">The Solution</h3>
        </div>
        <p class="text-center ">We started by setting up the BigQuery Data Transfer Service to automatically export Google Analytics 360 data into a partitioned BigQuery table every day. This made sure both intraday and previous day data were available for analysis. To integrate this data into the client’s on-premises SQL Server data warehouse, we created a series of cloud-based workflows.
        </p>
        <p class="text-center ">Instead of just using built-in monitoring services, we used Google Cloud Functions and Eventarc to detect new data tables in BigQuery. This triggered automated processes using Cloud Functions to flatten and process the data efficiently.
        </p>
        <p class="text-center ">To ensure smooth and reliable data movement between systems, we used Apache Airflow for workflow orchestration. This helped us manage the ETL (Extract, Transform, Load) process, ensuring timely delivery. The flattened data was then exported to a time-partitioned Google Cloud Storage bucket. From there, the client’s on-premises systems retrieved the data, which was then loaded into their SQL Server data warehouse using custom ETL scripts and Apache Nifi for data transformation.
        </p>
        <p class="text-center ">This setup provided the client with a scalable and cost-effective solution, making sure the marketing data was easily accessible for real-time analysis and future growth.
        </p>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-6">
                <div class="case-sol-img">
                    <img src="/img/case-studies/case-study-2/solution.webp" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row client-text-data align-items-center justify-content-center text-compile mt-4">
            <div class="col-lg-10">
                <div class="case-sol-text text-center">
                    <h4 class="font-weight-bold">About Accropolix</h4>
                    <p>Accropolix is a premier data engineering firm specializing in the design and implementation of advanced data architectures and solutions. We empower businesses to fully leverage their data through our expertise in cloud services, data integration, and analytics.</p>
                    <p>Our commitment is to deliver customized solutions that enhance operational efficiency and provide actionable insights, utilizing best practices in data engineering to address the unique needs of each client.</p>
                </div>
            </div>
        </div>
    </div>
</section>