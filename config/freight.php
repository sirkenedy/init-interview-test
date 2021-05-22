<?php

return [
    'country' => [
        'us' => [
            'flat_rate' => 1500,
        ],
        'uk' => [
            'flat_rate' => 800,
        ],
    ],

    'transport' => [
        'air' => [
            'base_fee' => 50000,
            'per_kg' => 10000,
        ],
        'sea' => [
            'base_fee' => 10000,
            'per_kg' => 2000,
        ],
    ],

    'tax' => 0.1,


];