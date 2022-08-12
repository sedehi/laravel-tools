<?php

use Illuminate\Support\Str;

if (!function_exists('utf8_slug')) {
    function utf8_slug($title, $separator = '-')
    {
        return Str::slug($title, $separator, null);
    }
}

if (!function_exists('digitsToEnglish')) {
    function digitsToEnglish($string)
    {
        $characters = [
            // arabic
            '١' => '۱',
            '٢' => '۲',
            '٣' => '۳',
            '٤' => '۴',
            '٥' => '۵',
            '٦' => '۶',
            '٧' => '۷',
            '٨' => '۸',
            '٩' => '۹',
            '٠' => '۰',
            // persian
            '۱' => '1',
            '۲' => '2',
            '۳' => '3',
            '۴' => '4',
            '۵' => '5',
            '۶' => '6',
            '۷' => '7',
            '۸' => '8',
            '۹' => '9',
            '۰' => '0',
        ];
        return str_replace(array_keys($characters), array_values($characters), $string);
    }
}


if (!function_exists('digitsToEnglish')) {
    function digitsToEnglish($string)
    {
        $characters = [
            // persian
            '1' => '۱',
            '2' => '۲',
            '3' => '۳',
            '4' => '۴',
            '5' => '۵',
            '6' => '۶',
            '7' => '۷',
            '8' => '۸',
            '9' => '۹',
            '0' => '۰',
        ];
        return str_replace(array_keys($characters), array_values($characters), $string);
    }
}