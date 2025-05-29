<?php
/**
 * @var App\View\AppView $this
 */
?>
<section id="blogs" class="blog-section inner-blog custom-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-column">
                    <div class="blog-image h-75 mb-4">
                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/zoxkROVdYnc?si=wf1pboc7n8q-8Rl5&autoplay=1&mute=1&rel=0&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="blog-desc">
                        <!-- <p class="date-author"><span>October 15, 2022</span><span>Abhishek Agrawal</span></p> -->
                        <h1><?php echo __('HOW REMITSO MAINTAINS CYBER-SECURITY?') ?></h1>
                        <p><?php echo __('API security incidents are on the rise, approximately 94% of companies have experienced an API security incident in the past 12 months and 64% companies have delayed application rollouts as a direct result of API security and 55% companies discovered a vulnerability in an API in the last One Year.') ?></p>
                        <p><?php echo __("API security is not the only challenge faced by companies that are operating online. Breach of data and trust is also a significant threat to companies that offer digital services to their clients. It genuinely doesn't matter if you are a big or small organization everyone is prone to such attacks. Furthermore such threats are not restricted to specific industries if you have a web presence you are vulnerable to intrusions attempts.") ?></p>
                        <p><?php echo __('According to data shared by IBM security X-Force a significantly new number of vulnerabilities were discovered in between 2017 and 2021. According to industry estimates 4 out of 5 and vulnerabilities exploited in 2021 were new vulnerabilities. Over 50% of all cyber-attacks targeted small to medium sized enterprises and unfortunately 60% of those hacked shut shop within 6 months (Cybersecurity Ventures, 2021).  DDoS attacks can affect up to 25% of the total internet traffic in the country and is expected to reach 14.5 million by the end of 2022 (Cisco,2019).') ?></p>
                        <p class="font-weight-bold"><?php echo __('HOW DOES REMITSO’S INTELLIGENT CYBER-SECURITY SYSTEM RESPOND TO SEARCH CYBER THREATS?') ?></p>
                        <p><?php echo __('RemitSo has strategic partnership with intelligent Web Application Firewall providers that use machine learning and artificial intelligence to anticipate and respond to attacks in real time. It deduces pattern from traffic logs and more data sources and learns behaviours of cyber criminals to make cyber security simple and effective.') ?></p>
                        <p class="font-weight-bold"><?php echo __('OUR INTELLIGENT CYBER THREAT MANAGEMENT SYSTEM WORKS ON THE FOLLOWING PRINCIPLES.') ?></p>
                        <p><?php echo __('1. It is cloud native') ?></p>
                        <p><?php echo __('2. Based on AI/ML threat profiling') ?></p>
                        <p><?php echo __('3. Deploys threat intelligence') ?></p>
                        <p><?php echo __('4. Easy to deploy.') ?></p>
                        <p><?php echo __('To know more about RemitSo’s features, please feel free') ?><a class="link-btn-none" href="<?php echo $this->Url->build([
                                                                                                                                        'controller' => 'Pages',
                                                                                                                                        'action' => 'contact',
                                                                                                                                    ]) ?>"><?php echo __(' get in touch with us.') ?></a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-column mb-5">
                    <div class="blog-image">
                        <img src="<?php echo $this->Url->image('/img/blog/blog1.jpg') ?>" alt="">
                    </div>
                    <div class="blog-desc">
                        <h1><?php echo __('Payment Services Directive 2 (PSD2) to Benefit Consumers and Businesses') ?></h1>
                        <p>
                            <?php echo __('The implementation of the Payment Services Directive 2 (PSD2) by the Council of the
                            European Union in late 2015 has brought about the equitable treatment of Third Party
                            Providers (TPPs), granting them assured technical access to the Banking Payment Systems.
                            This stand has supported innovative online transactions, mobile payments, and the safe
                            facilitation of cross-border European Payment Services.') ?></p>
                        <p class="mt-4"><a class="link-btn" href="<?php echo $this->Url->build(['controller' => 'Blogs', 'action' => 'paymentServices']) ?>"><?php echo __('Continue Reading') ?></a></p>
                    </div>
                </div>
                <div class="blog-column mb-5">
                    <div class="blog-image">
                        <img src="<?php echo $this->Url->image('/img/blog/blog2.png') ?>" alt="">
                    </div>
                    <div class="blog-desc">
                        <h1><?php echo __('API Integration – The Future of Fintech Payment') ?></h1>
                        <p><?php echo __('The implementation of the Payment Services Directive 2 (PSD2) by the Council of the European Union in late 2015 has brought about the equitable treatment of Third Party Providers (TPPs), granting them assured technical access to the Banking Payment Systems.') ?></p>
                        <p class="mt-4"><a class="link-btn" href="<?php echo $this->Url->build(['controller' => 'Blogs', 'action' => 'apiIntegration']) ?>"><?php echo __('Continue Reading') ?></a></p>
                    </div>
                </div>
            </div>
        </div><!--//row-->
    </div>
</section>