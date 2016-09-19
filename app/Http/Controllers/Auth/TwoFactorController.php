<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Authy;
use Exception;
use FlashAlert;
use Illuminate\Http\Request;
use Validator;

class TwoFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Enable two-factor authentication.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|null
     */
    public function postEnable(Request $request)
    {
        if (!is_null($response = $this->validateEnablingTwoFactorAuth($request))) {
            return redirect(url('home'))->withErrors($response);
        }

        $input = $request->all();

        $user = Auth::user();

        $user->setAuthPhoneInformation(
            $input['country-code'], $input['authy-cellphone']
        );

        // Check if the user wants to receive token via SMS
        $sms = false;
        if (!empty($input['sms'])) {
            $sms = true;
        }

        try {
            Authy::getProvider()->register($user, $sms);

            $user->save();
        } catch (Exception $e) {
            app(ExceptionHandler::class)->report($e);

            FlashAlert::error('Error', 'The provided phone information is invalid.');
        }

        FlashAlert::success('Success', 'Two-factor authentication has been enabled!');

        return redirect(url('home'));
    }

    /**
     * Validate an incoming request to enable two-factor authentication.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response|null
     */
    protected function validateEnablingTwoFactorAuth(Request $request)
    {
        $input = $request->all();

        if (isset($input['phone_number'])) {
            $input['authy-cellphone'] = preg_replace('/[^0-9]/', '', $input['authy-cellphone']);
        }

        $validator = Validator::make($input, [
            'country-code'    => 'required|numeric|integer',
            'authy-cellphone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
    }

    /**
     * Disable two-factor authentication.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|nul
     */
    public function postDisable(Request $request)
    {
        $user = Auth::user();

        try {
            Authy::getProvider()->delete($user);

            $user->save();
        } catch (Exception $e) {
            app(ExceptionHandler::class)->report($e);

            FlashAlert::error('Error', 'Unable to Delete User');
        }

        FlashAlert::success('Success', 'Two-factor authentication has been disabled!');

        return redirect(url('home'));
    }
}
