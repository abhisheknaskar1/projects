<?php
namespace App\Utility;

/**
 * Class EmailObfuscator
 * @package Remittance\Utility
 */

class EmailObfuscator
{

    /**
     * @param $email
     * @param null $class
     * @return string
     */
    public static function obfuscate($email, $class = null)
    {
        $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
        $key = str_shuffle($character_set);
        $cipher_text = '';
        $id = 'e'.mt_rand(1,999999999);
        for ( $i=0; $i<strlen($email); $i+=1) {
          $cipher_text.= $key[strpos($character_set,$email[$i])];
        }
        $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';
        $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';
        $script.= 'document.getElementById("'.$id.'").innerHTML="<a class=\\"'.$class.'\\" href=\\"mailto:"+d+"\\">"+d+"</a>"';
        $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")";
        $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';
        return '<span id="'.$id.'">[javascript protected email address]</span>'.$script;
    }    
}
