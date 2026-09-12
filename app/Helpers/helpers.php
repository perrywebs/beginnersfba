<?php

if (!function_exists('format_number_shorthand')) {
    function format_number_shorthand($number) {
        if ($number >= 1000 && $number < 1000000) {
            return number_format($number / 1000, 1) . 'k';
        } elseif ($number >= 1000000 && $number < 1000000000) {
            return number_format($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000000000) {
            return number_format($number / 1000000000, 1) . 'B';
        }

        return $number;
    }
}
