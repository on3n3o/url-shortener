<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function __invoke($uuid)
    {
        $short_link = ShortLink::where('uuid', $uuid)->firstOrFail();

        return view('stats', compact('short_link'));
    }
}
