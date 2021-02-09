<?php

namespace App\Http\Controllers;

use App\Events\Redirected;
use App\ShortLink;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect(Request $request, $short)
    {
        if(in_array($request->header('user-agent', null), config('redirect.user-agent-crawlers'))){
            $short_link = ShortLink::where('short', $short)->firstOrFail();
            return redirect($short_link->url);
        }
        $start = microtime(true);
        $short_link = \Cache::remember('short_link_' . $short, config('redirect.ttl'), function () use ($short) {
            return ShortLink::where('short', $short)->firstOrFail();
        });
        event(new Redirected($short_link, $request));
        $time_elapsed = microtime(true) - $start;
        return view('redirect', compact('short_link', 'time_elapsed'));
    }
}
