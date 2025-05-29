<?php
declare(strict_types=1);

namespace App\Controller;

class ProcessController extends AppController
{
    /**
     * @return void
     */
    public function discovery()
    {
        $titleForLayout = __('Discovery');
        $title = __('Discovery');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'process/discovery';
        $ogImage = '/img/process_hero.png';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
        $this->viewBuilder()->setLayout('default_1');
    }

    /**
     * @return void
     */
    public function strategy()
    {
        $titleForLayout = __('Strategy Development');
        $title = __('Strategy Development');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'process/strategy';
        $ogImage = '/img/process_hero.png';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
        $this->viewBuilder()->setLayout('default_1');
    }

    /**
     * @return void
     */
    public function implementation()
    {
        $titleForLayout = __('Implementation');
        $title = __('Implementation');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'process/implementation';
        $ogImage = '/img/process_hero.png';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
        $this->viewBuilder()->setLayout('default_1');
    }

    /**
     * @return void
     */
    public function analysis()
    {
        $titleForLayout = __('Analysis and Optimization');
        $title = __('Analysis and Optimization');
        $desc = __('');
        $keywords = __('');
        $ogUrl = 'process/analysis';
        $ogImage = '/img/process_hero.png';
        $this->set(compact('titleForLayout', 'title', 'desc', 'keywords', 'ogImage', 'ogUrl'));
        $this->viewBuilder()->setLayout('default_1');
    }
}
