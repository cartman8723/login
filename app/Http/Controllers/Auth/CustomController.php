<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        try {
            return view('auth.login');
        } catch (\Exception $e) {

        }
    }

    public function authenticate(LoginFormRequest $request)
    {
        try {
           return $this->authService->authUserEmail($request);
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un error inesperado. Inténtalo de nuevo.');
        }
    }
}
