<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;

class ShortenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url|max:2048',
        ]);

        $shortLink = ShortLink::create([
            'url' => $request->get('link'),
            'user_id' => \Auth::user()->id ?? null,
        ]);

        return view('shorten', compact('shortLink'));
    }

    public function redirect()
    {
        return redirect('/');
    }
}
