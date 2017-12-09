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
        1 => 'Pending',
        2 => 'Processing',
        3 => 'Complete',
        4 => 'Cancelled'
    ],

    'shipping' => [
        1 => 'Shipping Not Required',
        2 => 'Not Yet Shipped',
        3 => 'Partially Shipped',
        4 => 'Shipped',
        5 => 'Delivered',
    ],

    'payment' => [
        1 => 'Pending',
        2 => 'Authorized',
        3 => 'Paid',
        4 => 'Partially Refunded',
        5 => 'Refunded',
        6 => 'Voided',
    ]
];