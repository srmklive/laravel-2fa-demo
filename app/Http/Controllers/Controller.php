<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Srmklive\Authy\Services\Authy as TwoFactorAuthenticationProvider;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var \Srmklive\Authy\Services\Authy
     */
    protected $provider;

    public function __construct()
    {
        $this->provider = new TwoFactorAuthenticationProvider();
    }
}
