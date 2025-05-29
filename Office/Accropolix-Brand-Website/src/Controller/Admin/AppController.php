<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController as BaseController;
use Authentication\Controller\Component\AuthenticationComponent;
use Cake\Event\EventInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AppController
 * @package App\Controller\Admin
 *
 * @property AuthenticationComponent $Authentication
 * @property ResponseInterface $response
 */

class AppController extends BaseController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->FormProtection->setConfig([
            'validate' => false
        ]);
    }
}
