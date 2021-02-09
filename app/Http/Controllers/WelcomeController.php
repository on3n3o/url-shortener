<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /** @todo how to cache so menu would be dynamic instead cached */
    public function index()
    {
        // return \Cache::remember('view_welcome', config('view.ttl'), function () {
        //     return view('welcome')->render();
        // });
        return view('welcome');
    }

    public function features()
    {
        // return \Cache::remember('view_features', config('view.ttl'), function () {
        //     return view('features')->render();
        // });
        return view('features');
    }
}
