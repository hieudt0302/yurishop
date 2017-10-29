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
        0 => 'ペンディング',
        1 => 'プロセッシング',
        2 => '完成',
        3 => 'キャンセルされた'
    ],

    'shipping' => [
        0 => '未依頼',
        1 => '調整中',
        2 => '一部が発送された',
        3 => '発送された',
        4 => '届いた',
    ],

    'payment' => [
        0 => 'ペンディング',
        1 => '承認済',
        2 => '支払済',
        3 => '御返金',
        4 => '返金済',
        5 => 'Voided',
    ]
];