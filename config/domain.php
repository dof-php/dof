<?php

return [
    'http.port.route' => 'api',

    'http.port.pipein' => [
    ],

    'http.port.pipeout' => [
        \Dof\Framework\OFB\Pipe\ResponseSupport::class,
        \Dof\Framework\OFB\Pipe\GraphQLAlike::class,
    ],

    'http.port.wraperr' => \Dof\Framework\OFB\Wrapper\Classic::class,

    'http.port.wrapout' => \Dof\Framework\OFB\Wrapper\Classic::class,
];
