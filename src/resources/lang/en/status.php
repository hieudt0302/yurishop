<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Status[Order,Shipping,Payment] Reset Language Lines
    |--------------------------------------------------------------------------
    | 
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */

    'order' => [
        1 => 'Chờ xử lý',
        2 => 'Đang xử lý',
        3 => 'Hoàn thành',
        4 => 'Đã huỷ'
    ],

    'shipping' => [
        1 => 'Chưa yêu cầu ship',
        2 => 'Chưa ship',
        3 => 'Đã gửi ship một phần đơn hàng',
        4 => 'Đã gửi ship',
        5 => 'Đã giao hàng',
    ],

    'payment' => [
        1 => 'Chờ xử lý',
        2 => 'Đã xác thực',
        3 => 'Đã thanh toán',
        4 => 'Đã hoàn tiền một phần',
        5 => 'Đã hoàn tiền',
        6 => 'Hủy bỏ',
    ]
];