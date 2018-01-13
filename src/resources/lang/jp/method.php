<?php

return [
    'shipping' => [
        // 2 => [
        //     'name' => 'ピックアップ',
        //     'description' => 'お客様が弊社のショールームで取る'
        // ],
        1 => [
            'name' => 'シップ',
            'description' => '業者さんがお客様の指定住所へ届ける。'
        ],
       
    ],

    'payment' => [
        1 => [
           'name' => '後払い',
           'description' => '商品が届いた時、現金で払う。'
        ],
        2 =>[
            'name' => '前払い',
            'description' =>'注文が確認した後、弊社の担当が詳細に連絡する。'
        ],
       
    ]
];