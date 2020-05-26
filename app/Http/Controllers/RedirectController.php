<?php

namespace App\Http\Controllers;

use App\Events\Redirected;
use App\ShortLink;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect(Request $request, $short)
    {
        $start = microtime(true);
        $short_link = \Cache::remember('short_link_' . $short, config('redirect.ttl'), function () use ($short) {
            return ShortLink::where('short', $short)->firstOrFail();
        });
        event(new Redirected($short_link, $request));
        $time_elapsed = microtime(true) - $start;
        return view('redirect', compact('short_link', 'time_elapsed'));
    }
}
