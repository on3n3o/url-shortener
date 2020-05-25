<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $shortLinks = \Auth::user()->links()->paginate();
        return view('home', compact('shortLinks'));
    }

}
