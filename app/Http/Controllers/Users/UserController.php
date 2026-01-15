<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordFormRequest;

class UserController extends Controller
{
    public function updatePassword(UpdatePasswordFormRequest $request)
    {
        try {
            $user = Auth::user();
            if (!Hash::check($request->password, $user->password)) {
                toast('La contraseña actual no es correcta.', 'error');
                return back();
            }
            if($request->confirm_new_password!=$request->new_password){
                toast('La confirmacion de la contraseña nueva no coincide.', 'error');
                return back();
            }
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            toast('Contraseña cambiada correctamente. Por favor, inicia sesión con tu nueva contraseña.', 'success');
            return redirect()->route('login');

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
