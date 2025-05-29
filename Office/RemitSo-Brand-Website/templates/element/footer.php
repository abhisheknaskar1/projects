<?php

/**
 * @var App\View\AppView $this
 */

use App\Utility\EmailObfuscator;
?>
<footer class="footer">
    <div class="container bottom_border">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 mb-4">
                        <div class="mb-3">
                            <a href="#">
                                <img src="<?php echo $this->Url->build('/') ?>img/logo.svg" width="200" alt="">
                            </a>
                            <p class=" mt-3"> RemitSo is a brand owned by Prymera Consulting Pvt Ltd.
                            </p>
                            <p class=" mt-3"> DUNS Number: 853171738
                            </p>
                        </div>
                        <ul class="social_footer_ul">
                            <li><a href="https://www.linkedin.com/company/remitso"><img src="/img/linkedin.png" width="20" alt=""></a></li>
                            <li><a href="https://www.facebook.com/RemitSo-102108359275532"><img src="/img/facebook.png" width="20" alt=""></a></li>
                            <li><a href="https://x.com/remit_so?t=j_tCBlyyCtnT32NOCGCmkA&s=08"><img src="/img/twitter.png" width="20" alt=""></a></li>
                            <li><a href="https://www.instagram.com/remit.so?igsh=MW5leDU4cnp2MDg2cw=="><img src="/img/instagram.png" width="20" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="headin5_amrc col_white_amrc pt2"><?php echo __('Ecosystem') ?></h5>
                        <ul class="footer_ul_amrc">

                            <!-- <li><a href="<?php echo $this->Url->build('/') ?>"><?php echo __('Home') ?></a></li> -->

                            <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Pages',
                                                'action' => 'ourExpertise',
                                            ]) ?>"><?php echo __('Remittance Software Development') ?></a></li>

                            <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Pages',
                                                'action' => 'regulatoryQuestions'
                                            ]) ?>"><?php echo __('Regulatory Questions') ?></a></li>

                            <!-- <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Pages',
                                                'action' => 'team'
                                            ]) ?>">Team </a></li>

                            <li><a href="https://remitso.zohorecruit.in/jobs/Careers">Career </a></li> -->
                        </ul>
                    </div>

                    <div class="col-lg-2">
                        <h5 class="headin5_amrc col_white_amrc pt2"><?php echo __('Software') ?></h5>
                        <ul class="footer_ul_amrc">

                            <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Pages',
                                                'action' => 'pricing',
                                            ]) ?>"><?php echo __('Pricing') ?></a></li>

                            <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Pages',
                                                'action' => 'features',
                                            ]) ?>"><?php echo __('Features') ?></a></li>

                            <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Pages',
                                                'action' => 'faq',
                                            ]) ?>"><?php echo __('FAQs') ?></a></li>

                            <li><a href="" data-toggle="modal" data-target="#exampleModal-request-demo-2"><?php echo __('Request Demo') ?></a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2">
                        <h5 class="headin5_amrc col_white_amrc pt2"><?php echo __('Quick Links') ?></h5>
                        <ul class="footer_ul_amrc">

                            <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Pages',
                                                'action' => 'privacyPolicy',
                                            ]) ?>"><?php echo __('Privacy Policy') ?></a></li>

                            <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Pages',
                                                'action' => 'terms',
                                            ]) ?>"><?php echo __('Terms') ?></a></li>

                            <!-- <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Pages',
                                                'action' => 'event',
                                            ]) ?>"><?php echo __('News') ?></a></li> -->

                            <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Blogs',
                                                'action' => 'index',
                                            ]) ?>"><?php echo __('Insights') ?></a></li>

                            <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Pages',
                                                'action' => 'team',
                                            ]) ?>"><?php echo __('Team') ?></a></li>

                            <li><a href="https://remitso.zohorecruit.in/jobs/Careers"><?php echo __('Career') ?></a></li>

                            <li><a href="<?php echo $this->Url->build([
                                                'controller' => 'Pages',
                                                'action' => 'contact',
                                            ]) ?>"><?php echo __('Contact Us') ?></a></li>
                        </ul>
                    </div>

                    <div class=" col-lg-3">
                        <h5 class="headin5_amrc col_white_amrc pt2"><?php echo __('Find us') ?></h5>
                        <p><strong>Registered Address
                            </strong></p>
                        <p> 65 Chulia St, #46-00 OCBC Centre, Singapore 049513 </p>
                        <p><strong>Global sales and customer service
                            </strong></p>
                        <p> Bizzhub Aspire, 100 Feet Rd, Koramangala, Bengaluru, Karnataka 560095 India
                        </p>

                        <p><strong>Global Delivery Office
                            </strong></p>
                        <p> GN34/1, Aurora Water Front, Unit 10, Floor 16th, Sector V, Salt Lake, Kolkata 700091 India
                        </p>

                        <!-- <p><ion-icon class="mr-2 md hydrated" name="call-outline" role="img" aria-label="call outline"></ion-icon><?php echo __('+44 20 7193 7878 ') ?></p> -->
                        <p><?php echo __(' Connect@remitso.com ') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-3">
        <p class="text-center"><?php echo __('Copyright @2025 | ') ?><a href="<?php echo $this->Url->build('/') ?>"><?php echo __('remitso.com') ?></a></p>
    </div>
</footer>