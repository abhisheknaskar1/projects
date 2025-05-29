<?php

declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 */
?>
<section class="about-area section-padding">
    <div class="container">
        <div class="section__midline-heading">
            <h3 class="">Blog</h3>
        </div>
        <div class="row d-flex align-items-center">
            <div class="col-lg-4 mb-4">
                <div class="">
                    <?php
                    $array = [
                        [
                            '',
                            __(''),
                            '/predictiveAnalytics',
                            __('abcd'),
                            __('efgh'),
                            __(''),
                            '/img/blog/7-ways.webp',
                            __('7 Ways Predictive Analytics is Changing the Recruitment Process')
                        ],
                        [
                            '',
                            __(''),
                            '/whyAgileProductEngg',
                            __('Product Engineering'),
                            __(''),
                            __(''),
                            '/img/blog/why-agile-product.webp',
                            __('Why Agile Product Engineering is Key to Efficient Software Development')
                        ],
                        [
                            '',
                            __(''),
                            '/comprehensiveGuide',
                            __('PEP & Sanctioned Entity Screening'),
                            __('AML consulting services'),
                            __(''),
                            '/img/blog/comprehensive-guide.webp',
                            __('Comprehensive Guide to PEP and Sanctioned Entity Screening for Financial Crime Prevention in 2024')
                        ],
                        [
                            '',
                            __(''),
                            '/sevenBestPractices',
                            __('Marketing Automation'),
                            __('Gap Analysis'),
                            __(''),
                            '/img/blog/a3.webp',
                            __('7 Best Practices for Creating a Successful Marketing Automation Strategy in 2024')
                        ],
                        [
                            '',
                            __(''),
                            '/fiveProvenGtm',
                            __('Path to market'),
                            __('Marketing automation'),
                            __(''),
                            '/img/blog/a2.webp',
                            __('5 Proven Go-To-Market Tactics Every Business Needs in 2024')
                        ],
                        [
                            '',
                            __(''),
                            '/aiImpacting',
                            __('Sales Acceleration Consulting'),
                            __('Marketing automation'),
                            __(''),
                            '/img/blog/ai.webp',
                            __('How AI is Impacting The Future of Digital Marketing in 2024')
                        ],
                        [
                            '',
                            __(''),
                            '/hrMetrics',
                            __('HR Metrics'),
                            __('HR Research Consulting'),
                            __(''),
                            '/img/blog/5-data.webp',
                            __('5 Data-Driven HR Metrics Every HR Professional Should Track')
                        ],
                        [
                            '',
                            __(''),
                            '/aiPoweredPrescription',
                            __('Artificial intelligence'),
                            __(''),
                            __(''),
                            '/img/blog/how-ai-img-1.webp',
                            __('How a AI powered Prescription Safety App Secures £50,000 Seed Funding into MVP Stage')
                        ],
                        [
                            '',
                            __(''),
                            '/predictiveAnalytics',
                            __('Predictive Analytics'),
                            __('HR Research Consulting'),
                            __(''),
                            '/img/blog/7-ways.webp',
                            __('7 Ways Predictive Analytics is Changing the Recruitment Process')
                        ],

                        [
                            '',
                            __(''),
                            '/topFifteenOpen',
                            __('Data engineering'),
                            __('Descriptive analytics'),
                            __(''),
                            '/img/blog/top-15.jpeg',
                            __('Top 15 Open Source Data Engineering Tools to Dominate 2024-25')
                        ],
                    ];

                    // ['/img/blog/7-ways.webp', __('7 Ways Predictive Analytics is Changing the Recruitment Process'), __(''), '/predictiveAnalytics'];


                    // --------------- Reverse ---------------
                    $array = array_reverse($array);

                    $total_data = count($array);
                    $per_page = 4;

                    if (isset($_GET['page']) > 0) {
                        $page = intval($_GET['page']);
                    } else {
                        $page = 1;
                    }

                    if (empty($page) || $page == 1) {
                        $start_val = 0;
                        $end_val = $per_page - 1;
                    } else {
                        $start_val = ($page * $per_page) - $per_page;
                        $end_val = $start_val + $per_page - 1;
                    }

                    // ----------------blogs----------------
                    // for ($i = $start_val; $i <= $end_val; $i++) {
                    //     if (!($i >= $total_data)) {
                    //         echo '
                    //         <div class="media blog-user-media mb-4">
                    //             <div class="media-body">
                    //               <div class="blog-image ml-3">
                    //                 <a href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $array[$i][2]]) . '">
                    //                     <img class="img-fluid" src="' . $array[$i][6] . '" alt="">
                    //                 </a>                              
                    //               </div>
                    //                 <h5 class="mt-0"><a href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $array[$i][2]]) . '">' . $array[$i][7] . '</a></h5>
                    //                 <p>' . $array[$i][3] . '</p>
                    //                 <p class="blog-date text-muted"><span class="mr-2">' . $array[$i][4] . '</span><span>' . $array[$i][5] . '</span></p>
                    //             </div>

                    //         </div>';
                    //     }
                    // }
                    for ($i = $start_val; $i <= $end_val; $i++) {
                        if (!($i >= $total_data)) {
                            echo '
                            <div class="blog-multiple-column d-flex w-100 ">
                
                                <a style="text-decoration: none;" href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $array[$i][2]]) . '">
                
                                    <div class="cust-gallery-product">
                                        <div class="cust-gallery-product-img">
                                            <img class="img-fluid" src="' . $array[$i][6] . '" alt="">
                                        </div>
                                        <div class="cust-gallery-product-text text-compile">
                                            <h4 class="font-weight-bold text-dark">
                                                <h5 class="mt-0"><a href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $array[$i][2]]) . '">' . $array[$i][7] . '</a></h5>
                
                                                <div class="cust-st-data-text mt-2">
                                                    <p><span class="cust-bg-2"> ' . $array[$i][3] . '</span> <span class="cust-bg-2"> ' . $array[$i][4] . '</span> </p>
                                                </div>
                                                <div class="cust-st-data-text">
                                                    <div class="mb-2">
                                                        <a class="btn show-btn" href="' . $this->Url->build(['controller' => 'Blogs', 'action' => $array[$i][2]]) . '">Learn More</a>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                            </div>';
                        }
                    }

                    // ------------- Pagination -------------
                    $less_than = $total_data / $per_page;
                    if ($less_than > intval($less_than)) {
                        $less_than = $less_than + 1;
                    }

                    if ($total_data > 1) {
                        echo ' <nav style="text-align:center" aria-label="Page navigation example">
                        <div class="pagination justify-content-center">';
                        echo ' <li class="page-item" style="font-size: 24px;">';
                        echo $page - 1 > 0 ? '<a href="?page=' . ($page - 1) . '" tabindex="-1"><i class="bx bx-chevron-left"></i></a>' : '<i class="bx bx-chevron-left"></i>';
                        echo '</li>';

                        for ($i = 1; $i <= $less_than; $i++) {
                            if ($page == $i) {
                                echo ' <li style="font-size: 24px;">
                                <a href="?page=' . $i . '" class="paginator-1" >';
                            } else {
                                echo '<li style="font-size: 24px;">
                                <a  href="?page=' . $i . '" class="paginator">';
                            }
                            echo $i;
                            echo '</a>&nbsp;';
                        }

                        echo ' <li class="page-item" style="font-size: 24px;">';
                        echo $page + 1 <= $less_than ? '<a href="?page=' . ($page + 1) . '"><i class="bx bx-chevron-right"></i></a>' : '<i class="bx bx-chevron-right"></i>';
                        echo '</li>
                     </ul></nav>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</section><!--//section end-->