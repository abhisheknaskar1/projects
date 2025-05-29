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
                    <div class="blog-image h-75">
                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/WTo5P13qA7k?si=Ap-khfOT1nj_JnF1&autoplay=1&mute=1&rel=0&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="blog-desc">
                        <!-- <p class="date-author"><span>June 9, 2023</span><span>Abhishek Agrawal</span></p> -->
                        <h1><?php echo __('Safeguarding Your Customers’ International Money Transfer Transactions: How Remitso Ensures Security') ?></h1>
                        <p><?php echo __("In international money transfers, security isn't just a feature—it's a necessity. One of the most significant concerns for international money transfer operators is the safety of their transactions. That's where Remitso comes into play. Let's explore how ") ?><a href='<?php echo $this->Url->build('/') ?>'><?php echo __('Remitso ') ?></a><?php echo __("prioritizes security, safeguarding every transaction and offering peace of mind to agents who use this Remittance-as-a-service platform.") ?></p>
                        <p class="font-weight-bold"><?php echo __("Remitso's Security Features") ?></p>
                        <p><?php echo __("Remitso's security framework is comprehensive, combining advanced technology with stringent procedures to offer robust protection. Let's delve into these critical components.") ?></p>
                        <p class="font-weight-bold"><?php echo __('Advanced Encryption') ?></p>
                        <p><a href='<?php echo $this->Url->build('/') ?>'><?php echo __('Remitso ') ?></a><?php echo __('utilizes state-of-the-art encryption technology to secure data. Each transaction is encrypted using advanced algorithms, ensuring that sensitive information is kept confidential and secure throughout the process.') ?></p>
                        <p class="font-weight-bold"><?php echo __('Secure Infrastructure') ?></p>
                        <p><?php echo __("Remitso's digital infrastructure is designed to resist intrusions and maintain data integrity. Leveraging cloud technology and deploying secure servers minimizes the risk of data breaches and ensures operational continuity.") ?></p>
                        <p class="font-weight-bold"><?php echo __('Rigorous Access Control') ?></p>
                        <p><a href='<?php echo $this->Url->build('/') ?>'><?php echo __('Remitso ') ?></a><?php echo __("implements strict access control measures. User roles and permissions are defined to limit access to sensitive information. This ensures that only authorized personnel can access critical data, reducing the risk of internal security breaches.") ?></p>
                        <p class="font-weight-bold"><?php echo __('Regular Security Audits') ?></p>
                        <p><?php echo __("To maintain its high-security standards, the cyber-security team at Remitso conducts regular security audits. These rigorous checks help identify and rectify potential vulnerabilities before they can be exploited, ensuring the platform remains secure at all times.") ?></p>
                        <p class="font-weight-bold"><?php echo __('Compliance with Global Standards') ?></p>
                        <p><?php echo __('In addition to its own security measures, Remitso complies with global security standards for financial transactions. This adherence to globally recognized best practices provides additional protection for the transactions you process for your customers.') ?></p>
                        <p class="font-weight-bold"><?php echo __('Conclusion') ?></p>
                        <p><?php echo __("In the digital age, security is paramount, especially regarding financial transactions. By providing advanced encryption, secure infrastructure, rigorous access control, regular security audits, and adherence to global standards, Remitso ensures that every transaction you process is safeguarded.") ?></p>
                        <p><?php echo __("With ") ?><a href='<?php echo $this->Url->build('/') ?>'><?php echo __('Remitso') ?></a><?php echo __(", you're not just choosing a platform for your international money transfer business; You're making a wise decision by prioritizing a smoother customer experience. Trust Remitso to provide your cross-border money transfer business with the most secure and efficient solution.") ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-column mb-5">
                    <div class="blog-image">
                        <img src="<?php echo $this->Url->image('/img/blog/blog6.webp') ?>" alt="">
                    </div>
                    <div class="blog-desc">
                        <h1><?php echo __('Why Choose Remitso: Streamlining International Money Transfers') ?></h1>
                        <p class="description"><?php echo __('In an increasingly globalized world, the need for reliable and efficient international money transfers has never been more paramount. Enter Remitso, the innovative remittance software designed to streamline this complex process while offering unique features tailored for businesses of all sizes.') ?></p>
                        <p class="mt-4"><a class="link-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Blogs',
                                                                        'action' => 'blog6',
                                                                    ]) ?>"><?php echo __('Continue Reading') ?></a></p>
                    </div>
                </div>
                <div class="blog-column mb-5">
                    <div class="blog-image">
                        <img src="<?php echo $this->Url->image('/img/blog/blog5.png') ?>" alt="">
                    </div>
                    <div class="blog-desc">                        
                        <h1><?php echo __('How Remitso Maintains Cyber Security?') ?></h1>
                        <p class="description"><?php echo __('API security incidents are on the rise, approximately 94% of companies have experienced an API security incident in the past 12 months and 64% companies have delayed application rollouts as a direct result of API security and 55% companies discovered a vulnerability in an API in the last One Year.API security incidents are on the rise, approximately 94% of companies have experienced an API security incident in the past 12 months and 64% companies have delayed application rollouts as a direct result of API security and 55% companies discovered a vulnerability in an API in the last One Year.') ?></p>
                        <p class="mt-4"><a class="link-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Blogs',
                                                                        'action' => 'cyberSecurity',
                                                                    ]) ?>"><?php echo __('Continue Reading') ?></a></p>
                    </div>
                </div>
            </div>
        </div><!--//row-->
    </div>
</section>