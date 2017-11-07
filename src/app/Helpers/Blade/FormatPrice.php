<?php
namespace App\Helpers\Blade;

class FormatPrice {

    public static function price($price, $type = null) {
        switch ($type) {
            case 'usd':
                return '$' . str_replace('.00', '',number_format(str_replace( ',', '', $price), 2, '.', ',')); 
            case 'usd-f':
                return '$' . $price; 
            case 'vnd-f':
                return $price . 'đ';
            default:
                return str_replace(',00', '',number_format(str_replace( ',', '', $price), 2, ',', '.')) . 'đ';
        } 
    }
}
