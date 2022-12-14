<?php

use Illuminate\Support\Str;

if (!function_exists('utf8_slug')) {
    function utf8_slug($title, $separator = '-')
    {
        return Str::slug($title, $separator, null);
    }
}

if (!function_exists('digits_to_english')) {
    function digits_to_english($string)
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

if (!function_exists('mask_number_phone')) {
    function mask_number_phone($number)
    {
        return substr($number, 0, 4) . str_repeat('*', (strlen($number) - 8)) . substr($number, -4);
    }
}
if (!function_exists('digits_to_persian')) {
    function digits_to_persian($string)
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


if (!function_exists('arabic_to_persian')) {
function arabic_to_persian($string)
{
    $characters = [
        'ك'  => 'ک',
        'ـ'  => '',
        'دِ' => 'د',
        'بِ' => 'ب',
        'زِ' => 'ز',
        'ة' => 'ه',
        'ذِ' => 'ذ',
        'شِ' => 'ش',
        'سِ' => 'س',
        'ى'  => 'ی',
        'ي'  => 'ی',
        '١'  => '۱',
        '٢'  => '۲',
        '٣'  => '۳',
        '٤'  => '۴',
        '٥'  => '۵',
        '٦'  => '۶',
        '٧'  => '۷',
        '٨'  => '۸',
        '٩'  => '۹',
        '٠'  => '۰',
    ];
    return str_replace(array_keys($characters), array_values($characters), $string);
}
}