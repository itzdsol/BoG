<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homepage');
    }

    public function contractor_signup()
    {
        return view('contractor_signup_page');
    }

    public function vendor_signup()
    {
        return view('vendor_signup_page');
    }
}
