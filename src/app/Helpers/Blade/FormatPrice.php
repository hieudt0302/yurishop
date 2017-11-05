<?php
namespace App\Helpers\Blade;

class FormatPrice {

    public static function price($price, $type = null) {
        switch ($type) {
            case 'vnd':
                return number_format($price, 2, '.', ','); //etc: 5,500,000.69 
                break;
            default:
                return number_format($price, 2, ',', '.'); //etc: 5.500.000,69
        } 
    }
}
