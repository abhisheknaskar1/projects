<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Client;
use Cake\Core\Configure;

use Cake\Event\EventInterface;

class PagesController extends AppController
{
    /**
     * @param EventInterface $event
     * @return void
     */
    public function beforeFilter(EventInterface $event)
    {
        $this->Auth->allow();
        parent::beforeFilter($event);
    }

    /**
     * @return void
     */
    public function index()
    {
        $titleForLayout = 'International Money Transfer Software for Managing Operations';
        $title = 'International Money Transfer Software for Managing Operations';
        $desc = 'Simplify global money transfer operations with our software. Designed for banks, fintech, and operators to manage KYC, AML, payouts, and compliance seamlessly';
        $currentUrl = 'https://www.remitso.com/';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }    

    /**
     * @return void
     */
    public function faq()
    {
        $titleForLayout = 'Frequently Asked Questions';
        $title = 'Frequently Asked Questions';
        $desc = '';
        $currentUrl = 'www.remitso.com/frequently-asked-questions';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function contact()
    {
        $titleForLayout = __("Contact | RemitSo Your Money Transfer Business Needs");
        $title = 'Contact | RemitSo Your Money Transfer Business Needs';
        $desc = 'Reach out to RemitSo for all inquiries about our money transfer software and remittance solutions. Our experts are here to support your business.';
        $currentUrl = 'www.remitso.com/contact';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }


    /**
     * @return void
     */
    public function thankYou()
    {
        // $this->viewBuilder()->disableAutoLayout();
        $titleForLayout = __("Thank You");
        $title = 'Thank You';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function features()
    {
        $titleForLayout = __("Key Features: International Money Transfer Software");
        $title = 'Key Features: International Money Transfer Software';
        $desc = 'RemitSo’s software offers everything you need to securely manage international money transfers and remittance operations, with full compliance and efficiency.';
        $currentUrl = 'www.remitso.com/features';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function pricing()
    {
        $titleForLayout = __("Affordable International Money Transfer Software Pricing");
        $title = 'Affordable International Money Transfer Software Pricing';
        $desc = 'Explore flexible pricing for white-label, international, and remittance software solutions. Tailored plans for businesses of all sizes managing global money transfers.';
        $currentUrl = 'www.remitso.com/Pricing';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function caseStudy()
    {
        $titleForLayout = __("Download Case Study");
        $title = 'Case Study';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function startupSupport()
    {
        $titleForLayout = __("Start Your Money Transfer Business with RemitSo Solutions");
        $title = 'Start Your Money Transfer Business with RemitSo Solutions';
        $desc = 'RemitSo offers comprehensive support for your money transfer business. Get licensing assistance, secure payment gateway integration, and global reach.';
        $currentUrl = 'www.remitso.com/start-up-support';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function privacyPolicy()
    {
        $titleForLayout = __("Remitso | Privacy Policy");
        $title = 'Privacy Policy';
        $desc = '';
        $currentUrl = 'www.remitso.com/privacy-policy';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function landing()
    {
        $titleForLayout = __("Remitso | Request Demo");
        $title = 'Request Demo';
        $desc = '';
        $currentUrl = 'www.remitso.com/request-demo';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function whitepaper()
    {
        $titleForLayout = __(" ");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function terms()
    {
        $titleForLayout = __("RemitSo | Terms");
        $title = 'Terms';
        $desc = '';
        $currentUrl = 'www.remitso.com/terms';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function team()
    {
        $titleForLayout = __("RemitSo | Team");
        $title = 'Team';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function partner()
    {
        $titleForLayout = __("Partner with RemitSo: Expand Global Payment Possibilities");
        $title = '';
        $desc = 'Collaborate with RemitSo to unlock global opportunities. Join a trusted network delivering seamless, secure remittance solutions that empower growth.';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function ourExpertise()
    {
        $titleForLayout = __("Money Transfer Software Development for Global Payments");
        $title = '';
        $desc = 'Discover tailored money transfer software development services. Create secure, compliant, and scalable solutions to power seamless international transactions.';
        $currentUrl = 'www.remitso.com/money-transfer-software-development';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function event()
    {
        $titleForLayout = __("RemitSo at Global Tech Summits & Conferences | Industry Insights");
        $title = '';
        $desc = "Stay updated on RemitSo's participation in tech summits, conferences, and global events. Discover how we’re shaping the future of international money transfers.";
        $currentUrl = 'www.remitso.com/event';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function indexDemo()
    {
        $titleForLayout = __("RemitSo | index demo");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function error()
    {
        $titleForLayout = __("");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function innovation()
    {
        $titleForLayout = __("Innovation in Global Money Transfer");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function support()
    {
        $titleForLayout = __("support");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function consulting()
    {
        $titleForLayout = __("Money Transfer & Remittance Consulting For Business Growth");
        $title = 'Money Transfer & Remittance Consulting For Business Growth';
        $desc = 'Boost your money transfer business with expert consulting services. From AML and marketing strategies to remittance software solutions and global payout networks, we help you grow smarter and faster.';
        $currentUrl = 'https://remitso.com/remittance-consulting';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function htmlSitemap()
    {
        $titleForLayout = __("");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function aml()
    {
        $titleForLayout = __("AML-Consulting");
        $title = 'AML-Consulting';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function caseStudies()
    {
        $titleForLayout = __("Remitso Case Studies");
        $title = 'Remitso Case Studies';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

     /**
     * @return void
     */
    public function regulatoryQuestions()
    {
        $titleForLayout = __("Regulatory Questions");
        $title = 'Regulatory Questions';
        $desc = '';
        $currentUrl = '';
        // $ogImage = 'https://www.remitso.com/img/logo-dark.png';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

       /**
     * @return void
     */
    public function bank()
    {
        $titleForLayout = __("Bank");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

       /**
     * @return void
     */
    public function creditUnion()
    {
        $titleForLayout = __("Credit Union");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

       /**
     * @return void
     */
    public function exchangeHouse()
    {
        $titleForLayout = __("Exchange House");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

       /**
     * @return void
     */
    public function fintech()
    {
        $titleForLayout = __("Fintech");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

       /**
     * @return void
     */
    public function neoBank()
    {
        $titleForLayout = __("Neo Bank");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

       /**
     * @return void
     */
    public function moneyTransfer()
    {
        $titleForLayout = __("Money Transfer");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    
       /**
     * @return void
     */
    public function expert()
    {
        $titleForLayout = __("expert");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function technicalfaqs()
    {
        $titleForLayout = __("Technical FAQs");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }

    /**
     * @return void
     */
    public function thankyouwhite()
    {
        $titleForLayout = __("Thank you");
        $title = '';
        $desc = '';
        $currentUrl = '';
        $this->set(compact('titleForLayout', 'desc', 'currentUrl'));
    }
}
