<?php

return [
    'runtime' => [
        'permission' => [
            'owner' => 'www',
            'group' => 'www',
            'mode'  => 0664,
        ],
    ],
    'web.error.wrapper' => \Dof\Framework\OFB\Wrapper\Classic::class,
    'web.exception.wrapper' => \Dof\Framework\OFB\Wrapper\Classic::class,
    // 'web.exception.wrapper' => ['code', 'info', 'more'],
];
