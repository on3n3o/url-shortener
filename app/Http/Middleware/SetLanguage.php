<?php

namespace App\Http\Middleware;

use Closure;

class SetLanguage
{
    protected $except_urls = [
        'api/*'
    ];

    public function handle($request, Closure $next)
    {
        $locale = $request->getLocale();
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $locale = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE'])[0];
        }
        config(['app.locale' => $locale]);
        return $next($request);
    }
}