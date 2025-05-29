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
                        <img src="<?php echo $this->Url->image('/img/blog/blog2.png')?>" alt="">
                    </div>
                    <div class="blog-desc">
                        <h1><?php echo __('API Integration – The Future of Fintech Payment')?></h1>
                        <p><?php echo __('The evolution of Application Programming Interfaces (APIs) displays defining historical phases in terms of web development and software architecture. Traditionally, APIs have played vital roles in exhibiting data services of software applications through predefined resources like Objects, Methods and URIs (Universal Resource Identifiers). In modern times, APIs acquire fundamental importance in software design, providing complex and detailed generalisations that leverage modular and decentralised software programming tasks by reusing codes. ')?></p>
                        <p><?php echo __("One of the core requisites of such programming tasks is the seamless integration of widespread functionalities offered by APIs. Consequently, the present-day API Orientation necessitates the indispensable element of API Reference Documentation, acknowledging developers' perspectives.")?></p>
                        <h2 class="font-weight-bold mt-4 mb-3"><?php echo __('BENEFITS OF API')?></h2>
                        <p><?php echo __('The benefits of APIs are most starkly reflected in the emergence of the API Economy in the last decade, with a majority of the Fortune 500 Enterprises adopting APIs for competitive advantage. This matter is manifested in the large-scale Productisation and Monetisation of Data, achieved through the sale of access to valuable digital assets granted by APIs. Moreover, the configurability of APIs can be shared through unified platforms without sacrificing access control, statistical analysis or related security policies. Besides, modern frameworks like RESTful APIs are compatible with Cloud Applications and Services, as these eliminate the friction caused by unsought additional integration layers.')?></p>
                        <p><?php echo __('API Management has evolved considerably to be hassle-free, involving the reuse of Integration Assets and allowing the implementation of cutting-edge security protocols like JWT, OpenID, and OAuth (Open Authorization), amongst others. This fact is inextricably linked to rigorous security measures grounded on Transport Layer Security (TLS) encryption. Subsequently, API Management aims to harmonise API Gateways, API Developer Portal, Analytics and Reporting and API Lifecycle Management, resulting in end-to-end services. Using popular API Management tools like SoapUI and JMeter, Organisations cater to various requirements, like strategising digital transformation and addressing GDPR requirements. The adoption of APIs, therefore, stands perfectly in tune with the current trends of collaborative and flexible business models. Concerning the financial industry and markets, this paves the path for automated trading tactics that could potentially revolutionise conventional business processes. ')?></p>
                        <h2 class="font-weight-bold mt-4 mb-3"><?php echo __('Why is Documenting APIs important?')?></h2>
                        <p><?php echo __('Exploratory and empirical studies conducted by researchers in recent years have formulated specific, insightful guidelines to channelise and streamline API Documentation. Undisputedly, these findings apply to advanced paradigms like REST (Representational State Transfer) that expose data by resources accessible through Standardised HTTP Requests like POST, GET or DELETE. Very often, the high-level superstructure of API Documentation engenders insurmountable hindrances for developers. Moreover, blindly reusing codes tend to be misleading and ambiguous while carrying out programming tasks, thus paying little dividends. ')?></p>
                        <p><?php echo __('One of the significant implications for ideal API Documentation relates to content organisation. It is imperative to build API Documentation per category indicating the content domain or functionalities of APIs rather than the mistakenly prioritised "types of information". In other words, this reorganisation of content ought to be specific, whereby minimalist documentation would suffice to illustrate the nature of the task. ')?></p>
                        <p><?php echo __('Another essential need is the integration of conceptual information with associated tasks. This aspect is particularly crucial in obtaining clarity concerning usage scenarios. In the long run, this can facilitate a robust Search Function, enabling improved content categorisation and straightforward navigation. However, grasping the interplay of API Elements is also subject to the codification of said concepts to capitalise on background knowledge. It is to be noted that exemplification of codes demands diligent construction, fostering a clarified demonstration of the intended use of APIs in a holistic and usable manner. ')?></p>
                        <h2 class="font-weight-bold mt-4 mb-3"><?php echo __('BENEFITS OF DOCUMENTATION')?></h2>
                        <p><?php echo __('The developer-friendly API Documentation has led to greater standardisations and customisations for the lifecycle and maintenance of APIs. Consequently, this optimises the performance and scalability, thus ensuring impregnable security and governance. It implies a reconceptualisation of "API Usability", reaffirming that APIs are being treated more as products than codes. In other words, it justifies the consideration of APIs as "Services", harbouring more controlled deployment and development.')?></p>
                        <p><?php echo __('The prevalence of APIs currently has also given rise to the obscurity and ambiguity faced by the users while finalising the choice of APIs. Lamothe (2020) opines that contravention of API Constraints inevitably leads to vulnerabilities in security matters. Thus, it is of utmost importance to bridge the gaping gulf between API Developers and API Users by devising necessary User Modifications and including easy API Migration Techniques for the users. Lamothe suggests that this can be materialised by state-of-the-art engineering practices banking on open source technologies that can re-establish the feedback loop between the users and developers. These measures can also play crucial roles in mitigating other API risks, such as issues in testing, integration problems and cyber misconfigurations. ')?></p>
                        <h2 class="font-weight-bold mt-4 mb-3"><?php echo __('REMITSO')?></h2>
                        <p><?php echo __('RemitSo software can integrate with any product, platform or ecosystem if it offers API documentation. This attribute makes RemitSo work seamlessly for you and helps you deliver high-quality and reliable services to your remittance business customers. To know more about us, please click here.')?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-column mb-5">
                    <div class="blog-image">
                        <img src="<?php echo $this->Url->image('/img/blog/blog1.jpg')?>" alt="">
                    </div>
                    <div class="blog-desc">
                        <h1><?php echo __('Payment Services Directive 2 (PSD2) to Benefit Consumers and Businesses')?></h1>
                        <p>
                            <?php echo __('The implementation of the Payment Services Directive 2 (PSD2) by the Council of the
                            European Union in late 2015 has brought about the equitable treatment of Third Party
                            Providers (TPPs), granting them assured technical access to the Banking Payment Systems.
                            This stand has supported innovative online transactions, mobile payments, and the safe
                            facilitation of cross-border European Payment Services.')?></p>
                        <p class="mt-4"><a class="link-btn" href="<?php echo $this->Url->build(['controller' => 'Blogs', 'action' => 'paymentServices'])?>"><?php echo __('Continue Reading')?></a></p>
                    </div>
                </div>
                <div class="blog-column mb-5">
                    <div class="blog-image">
                        <?php echo $this->Html->image('/img/blog/blog5.png')?>
                    </div>
                    <div class="blog-desc">
                        <h1><?php echo __('How Remitso Maintains Cyber Security?')?></h1>
                        <p class="description"><?php echo __('API security incidents are on the rise, approximately 94% of companies have experienced an API security incident in the past 12 months and 64% companies have delayed application rollouts as a direct result of API security and 55% companies discovered a vulnerability in an API in the last One Year.API security incidents are on the rise, approximately 94% of companies have experienced an API security incident in the past 12 months and 64% companies have delayed application rollouts as a direct result of API security and 55% companies discovered a vulnerability in an API in the last One Year.')?></p>
                        <p class="mt-4"><a class="link-btn" href="<?php echo $this->Url->build([
                                'controller' => 'Blogs',
                                'action' => 'cyberSecurity',
                            ])?>"><?php echo __('Continue Reading')?></a></p>
                    </div>
                </div>
            </div>
        </div><!--//row-->
    </div>
</section>
