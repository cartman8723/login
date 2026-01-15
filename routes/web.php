<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apps\AppsLandingController;
use App\Livewire\Auth\Login;
use App\Livewire\Desktop\Ecosystem;
use App\Http\Controllers\Auth\CustomController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Users\UserController;

Route::redirect('/register', '/login');
Route::redirect('/', '/login');

/*
 *  Autenticacion Correo y contraseña
 */
Route::get('/', [CustomController::class, 'login'])->name('login');
Route::post('autenticarme', [CustomController::class, 'authenticate'])->name('autenticarme');
/*
 *  Autenticacion por google
 */
Route::get('auth/google/login', [GoogleController::class, 'login'])->name('auth.google.login');
Route::get('auth/google/callback', [GoogleController::class, 'callback'])->name('auth.google.callback');


Route::middleware(['auth:sanctum','my_permission', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('ecosistema', Ecosystem::class)->name('ecosystem');
    Route::get('inicio', [AppsLandingController::class, 'index'])->name('index.apps');
    Route::get('redireccion/{id}', [AppsLandingController::class, 'redirectToApp'])->name('redirect.app');
    Route::put('update/password',[UserController::class,'updatePassword'])->name('users.update-password');
});
