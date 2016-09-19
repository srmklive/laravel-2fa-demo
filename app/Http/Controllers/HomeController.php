<?php

namespace App\Http\Controllers;

use Auth;
use Authy;
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $twofactor_enabled = Authy::getProvider()->isEnabled($user);

        return view('home', compact('twofactor_enabled'));
    }
}
