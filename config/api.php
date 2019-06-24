<?php
return [
    'status' => [
        'success' => 'success',
        'fail'    => 'fail'
    ],
    'msg'    => [
        'success' => 'success',
        'fail'    => 'fail'
    ],
    'code'   => [
        'success'  => 1,
        'fail'     => 0,
        // user code 1100 - 1199
        'users'    => [
            'email_exists'             => 1100,
            'phone_exists'             => 1101,
            'email_password_incorrect' => 1102,
            'email_have_not_verify'    => 1103,
            'email_is_not_exists'      => 1104,
            'token_is_not_exists'      => 1105,
        ],
        // database
        // database code 1200 -1200
        'database' => [
            'row_not_found' => 1200,
            'row_exists'    => 1201
        ]
    ]
];
