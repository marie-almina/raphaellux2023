<?php

namespace App\Helpers;

class TemplateHelper
{   
    public static function cutWords(string $str, int $limit = 20) : string
    {
        $words = explode(' ', $str);
        $output = '';
        $i = 0;
        foreach ($words as $word) {
            $output .= $word . ' ';
            if ($i >= $limit) {
                break;
            }
            $i++;
        }
        if ($i >= $limit) {
            $output .= '...';
        }
        return $output;
    }
}