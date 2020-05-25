<?php

namespace App\Http\Controllers;

use App\Events\Redirected;
use App\ShortLink;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect(Request $request, $short)
    {
        $short_link = ShortLink::where('short', $short)->firstOrFail();
        event(new Redirected($short_link, $request));
        return redirect($short_link->url);
    }
}
