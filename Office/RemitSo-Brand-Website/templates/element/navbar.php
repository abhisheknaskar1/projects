<?php

/**
 * @var App\View\AppView $this
 */

$controller = $this->getRequest()->getParam('controller');
$action = $this->getRequest()->getParam('action');
?>

<header id="top-beamer" class="beamer-header">
    <div class="container">
        <!-- <object data="/assets/pdf/RemitSo-Architecture.pdf" type="aplication/pdf" width="100%">
            <a href="/assets/pdf/RemitSo-Architecture.pdf"
                download="RemitSo-Architecture.pdf" class="doc-pdf beamer-link">See how RemitSo ensures regulatory readiness. <span>Click Here → </span></a>
        </object> -->
        <a class="text-white" href="https://www.remitso.com/blogs/futuristic-mobile-app-security" target="_blank"
            >Futuristic Mobile App Security Approach With App Integrity & App Attest APIs <span>Click Here → </span></a>
    </div>
</header>

<header id="header" class="fixed-top-head header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between py-2">
        <a href="<?php echo $this->Url->build('/') ?>" class="logo"><img src="/img/remitso-logo.png" alt="" class="img-fluid" width="150px"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="<?php echo $this->Url->build('/') ?>">Home</a></li>
                <li><a class="nav-link scrollto active" href="<?php echo $this->Url->build([
                                                                    'controller' => 'Pages',
                                                                    'action' => 'pricing'
                                                                ]) ?>">Pricing</a></li>

                <li><a class="nav-link scrollto active" href="<?php echo $this->Url->build([
                                                                    'controller' => 'Pages',
                                                                    'action' => 'features'
                                                                ]) ?>">Feature</a></li>

                <!-- <li><a class="nav-link scrollto active" href="<?php echo $this->Url->build([
                                                                    'controller' => 'Pages',
                                                                    'action' => 'faq'
                                                                ]) ?>">FAQs</a></li> -->
                <li class="dropdown">
                    <a href="#"><span>FAQs</span> <i class="bx bx-chevron-down dropdown-icon"></i></a>
                    <ul class="header-for-p">
                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'faq',
                                        ]) ?>">General FAQs</a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'technicalfaqs',
                                        ]) ?>">Technical FAQs</a></li>
                    </ul>
                </li>
                <!-- <li><a class="nav-link scrollto active" href="https://www.demo.remitso.com" target="_blank">Live Demo</a></li> -->

                <!-- <li class="dropdown">
                    <a href="#"><span>Software</span> <i class="bx bx-chevron-down dropdown-icon"></i></a>
                    <ul class="header-for-p">
                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'pricing'
                                        ]) ?>">Pricing</a></li> -->

                <!-- <li><a href="<?php echo $this->Url->build([
                                        'controller' => 'Pages',
                                        'action' => 'features'
                                    ]) ?>">Feature</a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'faq'
                                        ]) ?>">FAQs</a></li> -->

                <!-- <li class="dropdown">
                        <a href="#"><span>Prototype</span> <i class="bx bx-chevron-right dropdown-icon"></i></a>
                        <ul class="drop-app-web">
                          <li><a href="#">App</a></li>
                          <li><a href="#">Website</a></li>
                        </ul>
                      </li>  -->
                <!-- </ul>
                </li> -->
                <!-- 
                <li class="dropdown">
                    <a href="#"><span> Consulting</span> <i class="bx bx-chevron-down dropdown-icon"></i></a>
                    <ul class="header-for-p">
                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'consulting'
                                        ]) ?>">Remittance Consulting</a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'development'
                                        ]) ?>">Custom Development </a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'aml'
                                        ]) ?>">AML Consulting </a></li>
                    </ul>
                </li> -->

                <li class="dropdown">
                    <a href="#"><span>Industries</span> <i class="bx bx-chevron-down dropdown-icon"></i></a>
                    <ul class="header-for-p">
                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'bank',
                                        ]) ?>">Banks</a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'neoBank',
                                        ]) ?>">Neo Banks</a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'creditUnion',
                                        ]) ?>">Credit Unions </a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'fintech',
                                        ]) ?>">Fintechs </a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'moneyTransfer',
                                        ]) ?>">MSB </a></li>

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'exchangeHouse',
                                        ]) ?>">Exchange Houses </a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#"><span>Solutions</span> <i class="bx bx-chevron-down dropdown-icon"></i></a>
                    <ul class="header-for-p">
                    <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'consulting'
                                        ]) ?>">Remittance Consulting</a></li>
                        <li><a href="https://compliance.remitso.com/" target="_blank">Compliance Consulting</a></li>

                        <!-- <li><a href="https://sanctionlookup.io/" target="_blank">Sanction Screening</a></li> -->

                        <li><a href="/money-transfer-software-development" target="_blank">Bespoke </a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#"><span>Insights</span> <i class="bx bx-chevron-down dropdown-icon"></i></a>
                    <ul class="header-for-p">
                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Blogs',
                                            'action' => 'index'
                                        ]) ?>">Blog</a></li>

                        <!-- <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'faq'
                                        ]) ?>">FAQs</a></li> -->

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'caseStudies'
                                        ]) ?>">Case Studies </a></li>

                        <!-- <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'innovation'
                                        ]) ?>">Innovation </a></li> -->

                        <!-- <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'whitepaper'
                                        ]) ?>">WhitePaper </a></li> -->
                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'expert'
                                        ]) ?>">Expert Desk </a></li>  
                    </ul>
                </li>

                <!-- <li class="dropdown">
                    <a href="#"><span>Discover</span> <i class="bx bx-chevron-down dropdown-icon"></i></a>
                    <ul class="header-for-p">
                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'expert'
                                        ]) ?>">Expert Corner </a></li>                                         

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'consulting'
                                        ]) ?>">Remittance Consulting </a></li>                        

                        <li><a href="<?php echo $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'team'
                                        ]) ?>">Team </a></li>

                        <li><a href="https://remitso.zohorecruit.in/jobs/Careers">Career </a></li>

                    </ul>
                </li> -->

                <li><a class="nav-link scrollto hero-btn text-dark active" href="https://webapp.remitso.com/" target="_blank">Interactive Tour
                </a></li>

                <!-- <li>
                    <a href="#" class="btn btn-outline-light hero-btn text-dark mt-4 mb-3" href="https://www.demo.remitso.com" target="_blank"> Live Demo</a>
                </li> -->
            </ul>
            <i class="bx bx-menu mobile-nav-toggle"></i>
        </nav>
    </div>
</header>