<?php

return [

    # 'default' => env('DB_CONNECTION', 'mongodb'),
    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [
        /*
        'mongodb' => [
            'driver'   => 'mongodb',
            'dsn'      => env('DB_MONGO_URI', 'mongodb://127.0.0.1:27017'),
            'database' => env('DB_MONGO_DATABASE', 'phone_validator'),
        ],
        */
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'phone_validator'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    ],

    'migrations' => 'migrations',
];