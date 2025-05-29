<?php

declare(strict_types=1);
/**
 * @var \App\View\AppView $this
 */
?>
<header>
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo mr-auto mb-0"><a href="<?php echo $this->Url->build('/'); ?>"><img
                    src="<?php echo $this->Url->image('logo-footer.png'); ?>" width="200px" alt=""></a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'index',
                                                        ]); ?>"><?php echo __('Home'); ?></a>
                </li>
                <li class="dropdown"><a href="#"><span>Services</span> <i class="bx bx-chevron-down"></i></a>
                    <ul>
                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'dataAnalytics',
                                        ]); ?>">Data And Analytics</a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'revops',
                                        ]); ?>">Revenue Operations (RevOps)</a></li>
                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'productEngineering',
                                        ]); ?>">Product Engineering</a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'financialCompliance',
                                        ]); ?>">Financial Compliance Management</a></li>
                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'gtm',
                                        ]); ?>">Digital Go To Market</a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'hrResearch',
                                        ]); ?>">HR Research </a></li>
                        <!-- <li><a href="https://xpedico.in/">Real Estate Feasibility Research</a></li> -->
                    </ul>
                </li>

                <!-- <li class="dropdown"><a href="#"><span>Product</span> <i class="bx bx-chevron-down"></i></a>
                    <ul>
                        <li><a href="https://remitso.com/">RemitSo</a></li>
                    </ul>
                </li> -->
                <li><a class="nav-link scrollto" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'customerStories',
                                                        ]); ?>"><?php echo __('Customer Stories'); ?></a>
                </li>
                <li><a class="nav-link scrollto" href="<?php echo $this->Url->build([
                                                            'controller' => 'Blogs',
                                                            'action' => 'index',
                                                        ]); ?>"><span><?php echo __('Insights'); ?></span></i></a>
                </li>
                <li><a class="nav-link scrollto" href="<?php echo $this->Url->build([
                                                            'controller' => 'Pages',
                                                            'action' => 'career',
                                                        ]); ?>"><?php echo __('Career'); ?></a>
                </li>
                <li><a class="getstarted scrollto" href="<?php echo $this->Url->build([
                                                                'controller' => 'Pages',
                                                                'action' => 'contact',
                                                            ]); ?>"><?php echo __('Get Started'); ?></a>
                </li>
            </ul>
            <i class="bx bx-menu mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>