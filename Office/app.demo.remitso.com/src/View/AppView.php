<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use App\View\Helper\HintHelper;
use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 * @property HintHelper $Hint
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadHelper("Hint");
        $this->Paginator->setTemplates([
            'number' => '<a class="item" href="{{url}}">{{text}}</a>',
            'current' => '<a class="item active" href="{{url}}">{{text}}</a>',
            'prevActive' => '<a class="item" href="{{url}}"><i class="mdi mdi-skip-previous"></i></a>',
            'prevDisabled' => '<a class="item disabled" href="javascript:void()"><i class="mdi mdi-skip-previous"></i></a>',
            'nextActive' => '<a class="item" href="{{url}}"><i class="mdi mdi-skip-next"></i></a>',
            'nextDisabled' => '<a class="item disabled" href="javascript:void()"><i class="mdi mdi-skip-next"></i></a>'
        ]);
    }
}
