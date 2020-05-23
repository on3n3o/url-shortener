<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect($short)
    {
        if(!ShortLink::where('short', $short)->exists()){
            abort(404);
        }
        return redirect(ShortLink::where('short', $short)->first()->url);
    }
}
