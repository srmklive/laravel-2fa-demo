<?php

namespace App\Http\Controllers;

use Srmklive\Authy\Services\Authy as TwoFactorProvider;

class HomeController extends Controller
{
    /**
     * @var \Srmklive\Authy\Services\Authy
     */
    private $provider;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->provider = new TwoFactorProvider();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $twofactor_enabled = $this->provider->isEnabled($user);

        return view('home', compact('twofactor_enabled'));
    }
}
