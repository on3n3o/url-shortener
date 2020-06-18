<?php

namespace App\Http\Controllers;

use App\ShortLink;

class StatsController extends Controller
{
    public function __invoke($uuid)
    {
        $short_link = ShortLink::where('uuid', $uuid)->firstOrFail();
        $userAgents = $short_link->userAgents()->paginate();
        $countries = $short_link->countries;
        return view('stats', compact('short_link', 'userAgents', 'countries'));
    }
}
