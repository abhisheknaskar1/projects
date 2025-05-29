<?php
namespace App\Utility;

/**
 * Class InlineImage
 * @package App\Utility
 */
class InlineImage
{
    public static function getDataURI($image, $mime = null) {
        return 'data: '.(function_exists('mime_content_type') ? mime_content_type($image) : $mime).';base64,'.base64_encode(file_get_contents($image));
    }
}
