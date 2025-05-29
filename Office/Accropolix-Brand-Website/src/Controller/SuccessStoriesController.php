<?php
declare(strict_types=1);

namespace App\Controller;

class SuccessStoriesController extends AppController
{
    /**
     * @return void
     */
    public function aPersonalReflection()
    {
        $ogImage = '/img/blog/success-tactical-seo1.png';
        $ogUrl = 'a-personal-reflection-our-digital-odyssey-with-accropolix';
        $titleForLayout = __('A Personal Reflection: Our Digital Odyssey with Accropolix');
        $title = __('');
        $desc = __('');
        $this->set(compact('titleForLayout', 'title', 'desc', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function aFounderPersonalAccount()
    {
        $ogImage = '/img/blog/GTM(1).png';
        $ogUrl = 'a-founders-personal-account-our-digital-transformation-with-accropolix';
        $titleForLayout = __('A Founder\'s Personal Account: Our Digital Transformation with Accropolix');
        $title = __('');
        $desc = __('');
        $this->set(compact('titleForLayout', 'title', 'desc', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function aGameChangingPartnership()
    {
        $ogImage = '/img/blog/success-Deep sales1.png';
        $ogUrl = 'a-game-changing-partnership-how-deep-sales-approach-revitalized-our-sales-strategy';
        $titleForLayout = __('A Game-Changing Partnership: How Deep Sales Approach Revitalized Our Sales Strategy');
        $title = __('');
        $desc = __('');
        $this->set(compact('titleForLayout', 'title', 'desc', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function leveragingContentMarketing()
    {
        $ogImage = '/img/blog/Content Marketing.png';
        $ogUrl = 'leveraging-content-marketing-to-drive-client-growth';
        $titleForLayout = __('Leveraging Content Marketing to Drive Client Growth');
        $title = __('');
        $desc = __('');
        $this->set(compact('titleForLayout', 'title', 'desc', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function insideSalesRevolution()
    {
        $ogImage = '/img/blog/inside sales .png';
        $ogUrl = 'inside-sales-revolution-a-strategic-partnership-with-accropolix';
        $titleForLayout = __('Inside Sales Revolution- A Strategic Partnership With Accropolix');
        $title = __('');
        $desc = __('');
        $this->set(compact('titleForLayout', 'title', 'desc', 'ogImage', 'ogUrl'));
    }

    /**
     * @return void
     */
    public function triumphInSalesDevelopment()
    {
        $ogImage = '/img/blog/sdr.png';
        $ogUrl = 'triumph-in-sales-development-the-accropolix-strategy';
        $titleForLayout = __('Triumph in Sales Development - The Accropolix Strategy');
        $title = __('');
        $desc = __('');
        $this->set(compact('titleForLayout', 'title', 'desc', 'ogImage', 'ogUrl'));
    }
}
