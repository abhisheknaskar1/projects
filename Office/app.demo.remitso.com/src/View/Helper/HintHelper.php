<?php
namespace App\View\Helper;
use Cake\View\Helper\FormHelper;
use Cake\View\Helper\HtmlHelper;
use Cake\View\Helper\UrlHelper;

/**
 * @property UrlHelper $Url
 * @property HtmlHelper $Html
 */
class HintHelper extends FormHelper
{
    public function build($hint = NULL)
    {
      $hintHtm  = '';
      if ( $hint ) {
        $hintHtm  .= '<a tabindex="-1" data-toggle="popover" data-trigger="hover" data-placement="top" class="text-dark" data-content="'.$hint.'" href="javascript:;"><i class="mdi mdi-information-outline"></i></a>';
      }
      return $hintHtm;
    }
}
