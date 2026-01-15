<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Activitylog\Models\Activity;
use function activity;

class AuthService
{

    public function __construct()
    {

    }

    public function authUserEmail($request)
    {
        try {
            $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required'
        ]);

        // Verificar el CAPTCHA con Google
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!data_get($response->json(), 'success')) {
            toast('Captcha inválido. Por favor intenta nuevamente.', 'error');
            return back();
        }
        if (Auth::attempt($request->only('email', 'password')) ) {
            if(auth()->user()->status != 'activo'){
                Auth::logout();
                toast('Tu usuario no se encuentra activo para iniciar sesión, contacta a tu equipo de tecnología.', 'error');
                return redirect()->route("login");
            }
            activity('login_success')
                ->causedBy(auth()->user())
                ->log('ha iniciado sesión en la plataforma auth');
            toast('Bienvenido', 'success');
            return redirect()->route('index.apps');
        }else{
            toast('Correo electrónico o contraseña incorrectos. Por favor, verifica tus credenciales e inténtalo de nuevo.', 'error');
        }
        return back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function authUserGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            session(['googleUser' => $googleUser]);
            $user = User::where('email', $googleUser->email)->first();
            if($user->status != 'activo'){
                toast('Tu usuario no se encuentra activo para iniciar sesión, contacta a tu equipo de tecnología.', 'error');
                return redirect()->route("login");
            }
            if ($user) {
                Auth::login($user);
                activity('login_success')
                    ->causedBy(auth()->user())
                    ->log('ha iniciado sesión en la plataforma auth con google');
                toast('Bienvenido', 'success');
                return redirect()->route('index.apps');
            }
            toast('Tu usuario no se encuentra activo para iniciar sesión, contacta a tu equipo de tecnología.', 'error');
            return redirect()->route("login");
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
