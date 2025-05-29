<?php

declare(strict_types=1);

namespace App\Controller;

class PagesController extends AppController
{
    /**
     * @return void
     */
    public function index()
    {
        $titleForLayout = __('Global Management Consulting Firm | Business Success Strategy');
        $title = __('Research. Engineer. Transform. | Accropolix');
        $desc = __('Drive business growth with our leading B2B lead generation agency in India. Maximize ROI with targeted marketing strategies tailored to your business needs.');
        $keywords = __('Best Lead Generation Company In India, Best Lead Generation Services In India, Lead Generation Services, Lead Generation Company');
        // $ogImage = '/img/hero-image.png';
        $ogUrl = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function contact()
    {
        $ogUrl = 'contact ';
        $ogImage = '/img/about-bg.jpg';
        $titleForLayout = 'Contact | Accropolix';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function about()
    {
        $ogUrl = 'pages/about';
        $ogImage = '/img/about-bg.jpg';
        $titleForLayout = 'About | Accropolix';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function privacyPolicy()
    {
        $ogUrl = 'pages/privacy-policy';
        $ogImage = '/img/privacy-bg.jpg';
        $titleForLayout = 'Privacy Policy | Accropolix';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function landingForm()
    {
        $ogUrl = 'ebook.accropolix.ai';
        $titleForLayout = 'Welcome To Revitaas';
        $ogImage = '/assets/img/ebook.png';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function justBeginningToExplore()
    {
        $ogUrl = 'pages/just-beginning-to-explore';
        $ogImage = '/img/blog-hero.jpg';
        $titleForLayout = 'Just Beginning To Explore';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function additionalInsightsAndWhitePaper()
    {
        $ogUrl = 'pages/additional-insights-and-white-paper';
        $ogImage = '/img/blog-hero.jpg';
        $titleForLayout = 'Additional Insights And White Paper';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function becomingAwareOfChallenges()
    {
        $ogUrl = 'pages/becoming-aware-of-challenges';
        $ogImage = '/img/blog-hero.jpg';
        $titleForLayout = 'Becoming Aware Of Challenges';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function exploringPotentialSolutions()
    {
        $ogUrl = 'pages/exploring-potential-solutions';
        $ogImage = '/img/blog-hero.jpg';
        $titleForLayout = 'Exploring Potential Solutions';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function fullyAwareAndReadyToEngage()
    {
        $ogUrl = 'pages/fully-aware-and-ready-to-engage';
        $ogImage = '/img/blog-hero.jpg';
        $titleForLayout = 'Fully Aware And Ready To Engage';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function thankYou()
    {
        $ogUrl = 'thank-you';
        $ogImage = '/img/banner2.jpg';
        $titleForLayout = 'Thank You';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function caseStudyThankYou()
    {
        $ogUrl = 'case-study-thank-you';
        $ogImage = '/img/banner2.jpg';
        $titleForLayout = 'Thank You';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function ebookThankYou()
    {
        $ogUrl = 'ebook-thank-you';
        $ogImage = '/img/banner2.jpg';
        $titleForLayout = 'Thank You';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function goToMarket()
    {
        $titleForLayout = __('B2B Go-To-Market Strategy Consulting | GTM Services For B2B');
        $title = __('B2B Go-To-Market Strategy Consulting | GTM Services For B2B');
        $desc = __('Conquer your B2B launch with expert Go-To-Market Strategy Consulting in India. Increase ROI and win deals faster. Trusted GTM services for B2B success.');
        $keywords = __('');
        $ogUrl = 'go-to-market';
        $ogImage = '/img/gtm-hero.png';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function externalCommunication()
    {
        $titleForLayout = __('B2B Content Marketing Agency | Content Creation Services');
        $title = __('B2B Content Marketing Agency | Content Creation Services');
        $desc = __('B2B Content Marketing Agency trusted by industry leaders. Top content creation services in India for lead generation & brand growth. We create engaging content!');
        $keywords = __('');
        $ogUrl = 'external-communication';
        $ogImage = '/img/external-com-hero.jpg';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function caseStudy()
    {
        $titleForLayout = __('Case Studies');
        $title = __('Case Studies');
        $desc = __('How We Made Our ITaaS Client Business Development Easy with Persona Based Lead Generation!');
        $keywords = __('');
        $ogUrl = 'success-stories';
        $ogImage = '/img/b2bcase-study-banner10.jpg';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function podcast()
    {
        $ogUrl = 'podcast';
        $ogImage = '/img/podcast-hero.png';
        $titleForLayout = 'Podcast';
        $this->set(compact('titleForLayout', 'ogUrl', 'ogImage'));
    }

    /**
     * @return void
     */
    public function services()
    {
        $titleForLayout = __('Services');
        $title = __('Services');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'services';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function accelerateMarket()
    {
        $titleForLayout = __('accelerate-market');
        $title = __('accelerate-market');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'accelerate-market';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function accroSeo()
    {
        $titleForLayout = __('accro-seo');
        $title = __('accro-seo');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'accro-seo';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function metierSeoLanding()
    {
        $titleForLayout = __('SEO-Consulting');
        $title = __('SEO-Consulting');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'SEO-Consulting';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
        // $this->set('accroSeoLanding', true);
        $this->viewBuilder()->setLayout('default_seo');
    }

     /**
     * @return void
     */
    public function dishaSeoLanding()
    {
        $titleForLayout = __('SEO Consulting Services to Boost Online Visibility');
        $title = __('SEO Consulting Services to Boost Online Visibility');
        $desc = __('Expert SEO consulting to increase traffic, improve rankings, and grow your business with tailored strategies.');
        $keywords = __('');
        $ogUrl = 'www.accropolix.ai/disha-seo-consulting';
        $ogImage = 'https://www.accropolix.ai/img/disha-logo.png';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
        // $this->set('accroSeoLanding', true);
        $this->viewBuilder()->setLayout('default_disha');
    }
    
    
    /**
     * @return void
     */
    public function thankYouSeo()
    {
        $titleForLayout = __('Thank-you-seo');
        $title = __('thank-you-seo');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'thank-you-seo';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function customerStories()
    {
        $titleForLayout = __('Customer-stories | Accropolix');
        $title = __('customer-stories');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'customer-stories';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function csOne()
    {
        $titleForLayout = __('Customer-stories');
        $title = __('customer-stories');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'customer-stories';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function csTwo()
    {
        $titleForLayout = __('Customer-stories');
        $title = __('customer-stories');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'customer-stories';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function csThree()
    {
        $titleForLayout = __('Customer-stories');
        $title = __('customer-stories');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'customer-stories';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function csFour()
    {
        $titleForLayout = __('Customer-stories');
        $title = __('customer-stories');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'customer-stories';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function csFive()
    {
        $titleForLayout = __('Customer-stories');
        $title = __('customer-stories');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'customer-stories';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function career()
    {
        $titleForLayout = __('Career | Accropolix');
        $title = __('career');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'career';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function dataAnalytics()
    {
        $titleForLayout = __('Data And Analytics | Accropolix');
        $title = __('Data And Analytics');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Data And Analytics';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function marketingAutomation()
    {
        $titleForLayout = __('Marketing Automation | Accropolix');
        $title = __('Marketing Automation');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Marketing Automation';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function revops()
    {
        $titleForLayout = __('Revops | Accropolix');
        $title = __('Revops');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Revops';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function productEngineering()
    {
        $titleForLayout = __('Product Engineering | Accropolix');
        $title = __('Product Engineering');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Product Engineering';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function financialCompliance()
    {
        $titleForLayout = __('Financial Compliance | Accropolix');
        $title = __('Financial Compliance');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Financial Compliance';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function gtm()
    {
        $titleForLayout = __('Go to market | Accropolix');
        $title = __('Go to market');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Go to market';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }



    /**
     * @return void
     */
    public function salesAcceleration()
    {
        $titleForLayout = __('Sales Acceleration | Accropolix');
        $title = __('Sales Acceleration');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Sales Acceleration';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function hrResearch()
    {
        $titleForLayout = __('HR Research | Accropolix');
        $title = __('HR Research ');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'HR Research ';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function realEstate()
    {
        $titleForLayout = __('Real Estate | Accropolix');
        $title = __('career');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'career';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function dataDriven()
    {
        $titleForLayout = __('Data Driven | Accropolix');
        $title = __('data driven');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'data driven';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function soumya()
    {
        $titleForLayout = __('Marketing Automation | Accropolix');
        $title = __('Marketing Automation');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Marketing Automation';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function dataEngg()
    {
        $titleForLayout = __('Marketing Automation | Accropolix');
        $title = __('Marketing Automation');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Marketing Automation';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function caseStudies()
    {
        $titleForLayout = __('Case Studies | Accropolix');
        $title = __('Case Studies');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Case Studies';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }


    /**
     * @return void
     */
    public function caseStudiesTwo()
    {
        $titleForLayout = __('Case Studies Retail Marketing | Accropolix');
        $title = __('Case Studies Retail Marketing');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Case Studies Retail Marketing';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function csSix()
    {
        $titleForLayout = __('Customer Stories | Strategic Competency Mapping Lifts Productivity');
        $title = __('Strategic Competency Mapping Lifts Productivity');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Strategic Competency Mapping Lifts Productivity';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function csSeven()
    {
        $titleForLayout = __('Customer Stories | 2x Faster Deployments with Real-Time ETL Pipeline and Predictive Healthcare Models');
        $title = __('2x Faster Deployments with Real-Time ETL Pipeline and Predictive Healthcare Models');
        $desc = __('');
        $keywords = __('');
        $ogUrl = '2x Faster Deployments with Real-Time ETL Pipeline and Predictive Healthcare Models';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function extra()
    {
        $titleForLayout = __('extra');
        $title = __('extra');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'extra';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
    }


    /**
     * @return void
     */
    public function thankYouSeoAudit()
    {
        $titleForLayout = __('Thank You Seo Audit');
        $title = __('Thank You Seo Audit');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Thank You Seo Audit';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
        $this->viewBuilder()->setLayout('default_seo');
    }


    /**
     * @return void
     */
    public function thankYouSeoCaseStudies()
    {
        $titleForLayout = __('Thank You Seo Case Studies');
        $title = __('Thank You Seo Case Studies');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Thank You Seo Case Studies';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
        $this->viewBuilder()->setLayout('default_seo');
    }


    /**
     * @return void
     */
    public function thankYouSeoFreeConsulation()
    {
        $titleForLayout = __('Thank You Seo Free Consulation');
        $title = __('Thank You Seo Free Consulation');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'Thank You Seo Free Consulation';
        $ogImage = '';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
        $this->viewBuilder()->setLayout('default_seo');
    }

     /**
     * @return void
     */
    public function genAi()
    {
        $titleForLayout = __('Generative AI');
        $title = __('gen-ai');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'gen-ai';
        $ogImage = '/img/logo-footer.png';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));       
    }
}
