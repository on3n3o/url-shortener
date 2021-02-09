<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function __invoke()
    {
        return view('privacy-policy');
    }
}
