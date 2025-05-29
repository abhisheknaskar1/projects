<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class ProvidersController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->Auth->allow();
        parent::beforeFilter($event);
    }

    public function unitedKingdom()
    {
        $titleForLayout = 'Money Transfer Software Providers in the United Kingdom';
        $this->set(compact('titleForLayout'));
    }

    public function unitedStates()
    {
        $titleForLayout = 'Money Transfer Software Providers in the United States';
        $this->set(compact('titleForLayout'));
    }

    public function uae()
    {
        $titleForLayout = 'Money Transfer Software Providers in the UAE';
        $this->set(compact('titleForLayout'));
    }

    public function australia()
    {
        $titleForLayout = 'Money Transfer Software Providers in Australia';
        $this->set(compact('titleForLayout'));
    }

    public function newZealand()
    {
        $titleForLayout = 'Money Transfer Software Providers in New Zealand';
        $this->set(compact('titleForLayout'));
    }

    public function germany()
    {
        $titleForLayout = 'Money Transfer Software Providers in Germany';
        $this->set(compact('titleForLayout'));
    }

    public function france()
    {
        $titleForLayout = 'Money Transfer Software Providers in France';
        $this->set(compact('titleForLayout'));
    }
}
