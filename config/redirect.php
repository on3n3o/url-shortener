<?php

return [
    'ttl' => env('REDIRECT_REDIS_TTL', 86400),
    'stall_seconds' => env('REDIRECT_STALL_SECONDS', 5),
    'user-agent-crawlers' => [
        'facebookexternalhit/1.1',
        'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)',
    ]
];