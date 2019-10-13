<?php

return [
    'default' => 'mysql57-rw',
    'pool' => [
        'mysql57-rw' => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => 3306,
            'user' => 'user',
            'passwd' => 'pswd',
            'dbname' => 'dbname',
        ],
    ],
    'master' => [
        'mysql57-master-0' => [
            'mysql57-rw',
        ],
    ],
    'slave' => [
        'mysql57-slave-0' => [
            'mysql57-rw',
        ],
    ],
];
