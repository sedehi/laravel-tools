<?php

use Illuminate\Support\Str;

if (!function_exists('utf8_slug')) {
    function utf8_slug($title, $separator = '-')
    {
        return Str::slug($title, $separator, null);
    }
}