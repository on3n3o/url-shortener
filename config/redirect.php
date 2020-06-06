<?php

return [
    'ttl' => env('REDIRECT_REDIS_TTL', 86400),
    'stall_seconds' => env('REDIRECT_STALL_SECONDS', 5)
];