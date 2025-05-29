<?php
/**
 * @var App\View\AppView $this
 */
?>
<?php
/**
 * @var App\View\AppView $this
 */
?>
<section id="blogs" class="blog-section inner-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-column">
                    <div class="blog-image h-75">
                        <img src="<?php echo $this->Url->image('blog3.jpg')?>" alt="">
                    </div>
                    <div class="blog-desc">
                        <p class="date-author"><span><?php echo __('July 7, 2022')?></span><span><?php echo __('Vivek Sharma')?></span> </p>
                        <h1><?php echo __('International Money Transfer Business')?></h1>
                        <p><?php echo __('The implementation of the Payment Services Directive 2 (PSD2) by the Council of the European Union in late 2015 has brought about the equitable treatment of Third Party Providers (TPPs), granting them assured technical access to the Banking Payment Systems.')?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-column mb-5">
                    <div class="blog-image">
                        <img src="<?php echo $this->Url->image('blog2.jpg')?>" alt="">
                    </div>
                    <div class="blog-desc">
                        <p class="date-author"> <span><?php echo __('July 7, 2022')?></span> <span><?php echo __(' Vivek Sharma')?></span></p>
                        <h1><?php echo __('API Integration – The Future of Fintech Payment')?></h1>
                        <p><?php echo __('The implementation of the Payment Services Directive 2 (PSD2) by the Council of the European Union in late 2015 has brought about the equitable treatment of Third Party Providers (TPPs), granting them assured technical access to the Banking Payment Systems.')?></p>
                    </div>
                </div>
                <div class="blog-column mb-5">
                    <div class="blog-image">
                        <img src="<?php echo $this->Url->image('blog1.jpg')?>" alt="">
                    </div>
                    <div class="blog-desc">
                        <p class="date-author"><span><?php echo __('July 7, 2022')?></span><span><?php echo __('Vivek Sharma')?></span></p>
                        <h1><?php echo __('Payment Services Directive 2 (PSD2) to Benefit Consumers and Businesses')?></h1>
                        <p>
                            <?php echo __('The implementation of the Payment Services Directive 2 (PSD2) by the Council of the
                            European Union in late 2015 has brought about the equitable treatment of Third Party
                            Providers (TPPs), granting them assured technical access to the Banking Payment Systems.
                            This stand has supported innovative online transactions, mobile payments, and the safe
                            facilitation of cross-border European Payment Services. Commissioner Jonathan Hill,
                            accountable for Financial Stability, Financial Services and Capital Markets Union, had stated,
                            &quot;This legislation is a step towards a digital single market; it will benefit consumers and
                            businesses and help the economy grow.&quot;')?></p>
                        <p class="mt-4"><a href="<?php echo $this->Url->build(['controller' => 'Blogs', 'action' => 'paymentServices'])?>"><?php echo __('Continue Reading')?></a></p>
                    </div>
                </div>
            </div>
        </div><!--//row-->
    </div>
</section>
