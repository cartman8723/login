<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
         return Socialite::driver('google')
        ->stateless()
        ->with(['prompt' => 'select_account'])
        ->redirect();
    }

    public function callback(Request $request)
    {
        try {
            return $this->authService->authUserGoogle();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
