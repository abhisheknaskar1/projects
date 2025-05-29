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
                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/CvmYBe-DoDQ?si=HnqAwU7bw7VZe5PH&autoplay=1&mute=1&rel=0&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="blog-desc">
                        <!-- <p class="date-author"><span>June 8, 2023</span><span>Abhishek Agrawal</span></p> -->
                        <h1><?php echo __('Why Choose Remitso: Streamlining International Money Transfers') ?></h1>
                        <p><?php echo __("In an increasingly globalized world, the need for reliable and efficient international money transfers has never been more paramount. Enter ") ?><a href='<?php echo $this->Url->build('/') ?>'><?php echo __('Remitso') ?></a><?php echo __(", the innovative remittance software designed to streamline this complex process while offering unique features tailored for businesses of all sizes.") ?></p>
                        <p class="font-weight-bold"><?php echo __('The Remitso Advantage') ?></p>
                        <p><a href='<?php echo $this->Url->build('/') ?>'><?php echo __('Remitso ') ?></a><?php echo __("is a tech platform that goes beyond being a simple digital tool. It serves as an enabler, allowing money transfer operators to digitize their operations and stay ahead of the competitive curve. Let's delve into the key advantages that set Remitso apart.") ?></p>
                        <p class="font-weight-bold"><?php echo __('Operational Efficiency') ?></p>
                        <p><a href='<?php echo $this->Url->build('/') ?>'><?php echo __('Remitso ') ?></a><?php echo __('understands the time-sensitive nature of money transfers and the need for businesses to operate optimally. A user-friendly interface allows for easy transaction management, ensuring swift, hassle-free money transfers across borders.') ?></p>
                        <p class="font-weight-bold"><?php echo __('Comprehensive Regulatory Compliance') ?></p>
                        <p><?php echo __("In international money transfers, regulatory compliance is not just necessary but a mandate. Remitso's advanced platform assists enterprise users in navigating the complex realm of local operational licenses, helping ensure compliance with regulations across different jurisdictions.") ?></p>
                        <p class="font-weight-bold"><?php echo __('Robust Security') ?></p>
                        <p><a href='<?php echo $this->Url->build('/') ?>'><?php echo __('Remitso ') ?></a><?php echo __("prioritizes your security. With state-of-the-art encryption and stringent data protection measures, it guarantees the safety of each transaction, giving users the peace of mind they need when dealing with sensitive financial information.") ?></p>
                        <p class="font-weight-bold"><?php echo __('Tailored Solutions') ?></p>
                        <p><?php echo __("Every business is unique, and so are its remittance needs. That's why Remitso offers customizable solutions, enabling money transfer operators to adapt the platform to their specific requirements and making international money transfers a seamless part of their operations.") ?></p>
                        <p class="font-weight-bold"><?php echo __('Embrace the Future with Remitso') ?></p>
                        <p><?php echo __('The world is moving fast, and the financial sector is no exception. Digital remittance solutions like Remitso are not just the future—they are present. By providing a comprehensive platform for swift, secure, and compliant international money transfers, Remitso is leading the way in the remittance sector.') ?></p>
                        <p><?php echo __('Choose Remitso and redefine the way you manage international money transfers. Discover a world where remittances are not a hurdle but a tool for growth and efficiency.') ?></p>
                        <p class="font-weight-bold"><?php echo __('Conclusion') ?></p>
                        <p><?php echo __("Remitso stands as a beacon of efficiency and reliability in the complex realm of international money transfers. By leveraging the power of advanced tech and a deep understanding of the financial sector's needs, it offers an unmatched solution for businesses worldwide. Choose Remitso today and revolutionize your remittance process.") ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
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
                <div class="blog-column mb-5">
                    <div class="blog-image">
                        <img src="<?php echo $this->Url->image('/img/blog/blog4.png') ?>" alt="">
                    </div>
                    <div class="blog-desc">
                        <h1><?php echo __('Advantages Of Cloud-Based Services') ?></h1>
                        <p class="description"><?php echo __('The advent of cloud-based services has undisputedly optimised cost-benefits and competitive advantages for businesses. As per a Study by the International Data Group, almost 70% of businesses utilise Cloud technology in one or multiple capacities. Moreover, a Dell Report too finds that investing in Cloud accelerated revenue growth by a whopping 53%.') ?></p>
                        <p class="mt-4"><a class="link-btn" href="<?php echo $this->Url->build([
                                                                        'controller' => 'Blogs',
                                                                        'action' => 'cloudServices',
                                                                    ]) ?>"><?php echo __('Continue Reading') ?></a></p>
                    </div>
                </div>
            </div>
        </div><!--//row-->
    </div>
</section>