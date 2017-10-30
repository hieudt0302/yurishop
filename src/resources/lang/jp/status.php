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
        0 => 'Pending',
        1 => 'Processing',
        2 => 'Complete',
        3 => 'Cancelled'
    ],

    'shipping' => [
        0 => 'Shipping Not Required',
        1 => 'Not Yet Shipped',
        2 => 'Partially Shipped',
        3 => 'Shipped',
        4 => 'Delivered',
    ],

    'payment' => [
        0 => 'Pending',
        1 => 'Authorized',
        2 => 'Paid',
        3 => 'Partially Refunded',
        4 => 'Refunded',
        5 => 'Voided',
    ]
];