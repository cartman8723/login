<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        try {
            $user = $request->user();
            if ($user->hasRole('tech')) {
                return redirect()->intended('https://admin.investta.test');
            } elseif ($user->hasRole('user')) {
                return redirect()->intended('/user/home');
            } else {
                return redirect()->intended('/');
            }

        } catch (\Exception $e) {

        }
    }
}
