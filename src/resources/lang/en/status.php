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
        0 => 'Chờ xử lý',
        1 => 'Đang xử lý',
        2 => 'Hoàn thành',
        3 => 'Đã huỷ'
    ],

    'shipping' => [
        0 => 'Chưa yêu cầu ship',
        1 => 'Chưa ship',
        2 => 'Đã gửi ship một phần đơn hàng',
        3 => 'Đã gửi ship',
        4 => 'Hoàn thành ship',
    ],

    'payment' => [
        0 => 'Chờ xử lý',
        1 => 'Đã xác thực',
        2 => 'Đã thanh toán',
        3 => 'Đã hoàn tiền một phần',
        4 => 'Đã hoàn tiền',
        5 => 'Voided',
    ]
];