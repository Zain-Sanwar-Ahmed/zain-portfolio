
<?php

return [

    'paths' => ['api/*', 'up'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'https://zain-portfolio-eta.vercel.app',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
