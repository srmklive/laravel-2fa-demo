<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use FlashAlert;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Send the post-authentication response.
     *
     * @param \Illuminate\Http\Request                   $request
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, Authenticatable $user)
    {
        if (authy()->isEnabled($user)) {
            return $this->logoutAndRedirectToTokenScreen($request, $user);
        }

        FlashAlert::success('Success', 'You have successfully logged in!');

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Generate a redirect response to the two-factor token screen.
     *
     * @param \Illuminate\Http\Request                   $request
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function logoutAndRedirectToTokenScreen(Request $request, Authenticatable $user)
    {
        $this->guard()->logout();

        $request->session()->put('authy:auth:id', $user->id);

        return redirect(url('auth/token'));
    }
}
