<?php

return [
    'supports_credentials' => true,
    'allowed_origins' => [
        'http://localhost:3001',  // Your frontend URL
    ],
    'allowed_methods' => ['*'],  // Or specify methods like ['GET', 'POST']
    'allowed_headers' => ['*'], // Or specify headers
    'exposed_headers' => [],
    'max_age' => 0,
    'hosts' => [],
];
