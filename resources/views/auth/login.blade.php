@extends('layouts.app')
@section('content')

    <body class="overflow-x-hidden min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black relative" style="background-attachment: fixed;">
        <!-- Elementos decorativos de fondo -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-amber-500/20 to-yellow-600/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-1/2 -left-40 w-96 h-96 bg-gradient-to-br from-gray-400/10 to-gray-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute -bottom-40 right-1/4 w-72 h-72 bg-gradient-to-br from-amber-600/15 to-yellow-500/10 rounded-full blur-3xl animate-pulse delay-2000"></div>
        </div>

        <!-- Grid pattern overlay -->
        <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>

        <!-- Líneas decorativas -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-1/4 w-px h-full bg-gradient-to-b from-transparent via-amber-500/30 to-transparent"></div>
            <div class="absolute top-0 right-1/4 w-px h-full bg-gradient-to-b from-transparent via-gray-400/30 to-transparent"></div>
        </div>

        <!-- Contenedor principal -->
        <div class="relative min-h-screen flex items-center justify-center p-4 md:p-6">
            <!-- Card del login -->
            <div class="w-full max-w-md bg-gradient-to-br from-gray-900/90 to-black/90 backdrop-blur-xl rounded-3xl shadow-2xl border border-amber-500/20 p-8 md:p-10 transform hover:scale-[1.01] transition-all duration-300 hover:shadow-amber-500/20">
                
                <!-- Logo text -->
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-unbounded font-bold bg-gradient-to-r from-amber-400 via-yellow-500 to-amber-600 bg-clip-text text-transparent mb-2">
                        INNOVATEX
                    </h1>
                    <div class="h-1 w-20 bg-gradient-to-r from-amber-500 to-yellow-600 mx-auto rounded-full"></div>
                </div>

                <!-- Título mejorado -->
                <div class="mb-8 text-center">
                    <h2 class="text-gray-100 text-2xl mb-2 font-unbounded font-bold">¡Bienvenido!</h2>
                    <p class="text-gray-400 text-sm font-unbounded font-light">
                        Accede a tu cuenta para continuar
                    </p>
                </div>

                <!-- Formulario -->
                <form action="{{ route('autenticarme') }}" method="post" class="space-y-5">
                    @csrf
                    
                    <!-- Campo de email -->
                    <div class="group">
                        <label for="email" class="text-gray-300 text-sm font-unbounded font-medium mb-2 block">
                            Correo electrónico
                        </label>
                        <div class="relative">
                            <input id="email" name="email"
                                class="text-gray-100 outline-none rounded-xl w-full px-4 py-3.5 border-2 border-gray-700 bg-gray-900/50
                                       focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition-all duration-300
                                       hover:border-gray-600 placeholder-gray-600
                                       @error('email') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"
                                type="email" required placeholder="tu@email.com">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500 group-focus-within:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                        </div>
                        @error('email')
                            <p class="font-unbounded text-xs text-red-400 mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Campo de contraseña -->
                    <div class="group">
                        <label for="password" class="text-gray-300 text-sm font-unbounded font-medium mb-2 block">
                            Contraseña
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="password-input text-gray-100 outline-none rounded-xl w-full px-4 py-3.5 border-2 border-gray-700 bg-gray-900/50
                                       focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition-all duration-300
                                       hover:border-gray-600 placeholder-gray-600
                                       @error('password') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"
                                required placeholder="••••••••">
                            <button type="button"
                                class="toggle-password absolute right-3 top-1/2 -translate-y-1/2 p-2 rounded-lg hover:bg-gray-800 transition-colors">
                                <span class="icon-show inline-flex items-center justify-center w-5 h-5">
                                    <svg width="20" height="20" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                                        <path d="M7.125 11.4375C7.125 8.49805 9.51855 6.0625 12.5 6.0625C15.4395 6.0625 17.875 8.49805 17.875 11.4375C17.875 14.4189 15.4395 16.8125 12.5 16.8125C9.51855 16.8125 7.125 14.4189 7.125 11.4375ZM12.5 14.7969C14.3477 14.7969 15.8594 13.3271 15.8594 11.4375C15.8594 9.58984 14.3477 8.07813 12.5 8.07813C12.458 8.07813 12.416 8.07813 12.374 8.07813C12.458 8.33008 12.5 8.54004 12.5 8.75C12.5 10.2617 11.2822 11.4375 9.8125 11.4375C9.56055 11.4375 9.35059 11.4375 9.14063 11.3535C9.14063 11.3955 9.14063 11.4375 9.14063 11.4375C9.14063 13.3271 10.6104 14.7969 12.5 14.7969ZM4.39551 5.43262C6.36914 3.58496 9.09863 2.03125 12.5 2.03125C15.8594 2.03125 18.5889 3.58496 20.5625 5.43262C22.5361 7.23828 23.8379 9.42188 24.4678 10.9336C24.5937 11.2695 24.5937 11.6475 24.4678 11.9834C23.8379 13.4531 22.5361 15.6367 20.5625 17.4844C18.5889 19.332 15.8594 20.8437 12.5 20.8437C9.09863 20.8437 6.36914 19.332 4.39551 17.4844C2.42188 15.6367 1.12012 13.4531 0.490235 11.9834C0.364259 11.6475 0.364259 11.2695 0.490235 10.9336C1.12012 9.42188 2.42188 7.23828 4.39551 5.43262ZM12.5 4.04688C9.72852 4.04688 7.50293 5.30664 5.78125 6.90234C4.14356 8.41406 3.05176 10.1777 2.46387 11.4375C3.05176 12.6973 4.14356 14.5029 5.78125 16.0146C7.50293 17.6104 9.72852 18.8281 12.5 18.8281C15.2295 18.8281 17.4551 17.6104 19.1768 16.0146C20.8145 14.5029 21.9062 12.6973 22.4941 11.4375C21.9062 10.1777 20.8145 8.41406 19.1768 6.90234C17.4551 5.30664 15.2295 4.04688 12.5 4.04688Z" fill="#9CA3AF"/>
                                    </svg>
                                </span>
                                <span class="icon-hide inline-flex items-center justify-center w-5 h-5" style="display: none;">
                                    <svg width="20" height="20" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                                        <path d="M7.125 11.4375C7.125 8.49805 9.51855 6.0625 12.5 6.0625C15.4395 6.0625 17.875 8.49805 17.875 11.4375C17.875 14.4189 15.4395 16.8125 12.5 16.8125C9.51855 16.8125 7.125 14.4189 7.125 11.4375ZM12.5 14.7969C14.3477 14.7969 15.8594 13.3271 15.8594 11.4375C15.8594 9.58984 14.3477 8.07813 12.5 8.07813C12.458 8.07813 12.416 8.07813 12.374 8.07813C12.458 8.33008 12.5 8.54004 12.5 8.75C12.5 10.2617 11.2822 11.4375 9.8125 11.4375C9.56055 11.4375 9.35059 11.4375 9.14063 11.3535C9.14063 11.3955 9.14063 11.4375 9.14063 11.4375C9.14063 13.3271 10.6104 14.7969 12.5 14.7969ZM4.39551 5.43262C6.36914 3.58496 9.09863 2.03125 12.5 2.03125C15.8594 2.03125 18.5889 3.58496 20.5625 5.43262C22.5361 7.23828 23.8379 9.42188 24.4678 10.9336C24.5937 11.2695 24.5937 11.6475 24.4678 11.9834C23.8379 13.4531 22.5361 15.6367 20.5625 17.4844C18.5889 19.332 15.8594 20.8437 12.5 20.8437C9.09863 20.8437 6.36914 19.332 4.39551 17.4844C2.42188 15.6367 1.12012 13.4531 0.490235 11.9834C0.364259 11.6475 0.364259 11.2695 0.490235 10.9336C1.12012 9.42188 2.42188 7.23828 4.39551 5.43262ZM12.5 4.04688C9.72852 4.04688 7.50293 5.30664 5.78125 6.90234C4.14356 8.41406 3.05176 10.1777 2.46387 11.4375C3.05176 12.6973 4.14356 14.5029 5.78125 16.0146C7.50293 17.6104 9.72852 18.8281 12.5 18.8281C15.2295 18.8281 17.4551 17.6104 19.1768 16.0146C20.8145 14.5029 21.9062 12.6973 22.4941 11.4375C21.9062 10.1777 20.8145 8.41406 19.1768 6.90234C17.4551 5.30664 15.2295 4.04688 12.5 4.04688Z" fill="#9CA3AF"/>
                                        <path d="M2 2L23 20" stroke="#9CA3AF" stroke-width="2"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        @error('password')
                            <p class="font-unbounded text-xs text-red-400 mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Enlace de recuperación -->
                    <div class="flex justify-end">
                        <a href="#"
                            onclick="document.getElementById('recoverPasswordModal').classList.remove('hidden')"
                            class="text-amber-500 hover:text-amber-400 font-unbounded text-sm font-medium underline-offset-4 hover:underline transition-all">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>

                    <!-- Captcha -->
                    <div class="w-full">
                        <div class="captcha-container bg-gray-950/50 rounded-xl p-4 border-2 border-gray-800">
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"
                                data-callback="onCaptchaSuccess" data-expired-callback="onCaptchaExpired">
                            </div>
                        </div>
                        @error('g-recaptcha-response')
                            <span class="text-red-400 text-sm mt-2 block flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="flex flex-col gap-4 pt-2">
                        <button id="loginButton" type="submit"
                            class="relative flex justify-center items-center bg-gradient-to-r from-gray-700 to-gray-800 cursor-not-allowed 
                                   rounded-xl text-base font-unbounded font-semibold text-gray-400 w-full py-3.5 px-4
                                   transition-all duration-300 overflow-hidden group shadow-lg border border-gray-700"
                            disabled>
                            <span class="relative z-10">Ingresar</span>
                        </button>

                        <!-- Divisor -->
                        <div class="relative flex items-center my-2">
                            <div class="flex-grow border-t border-gray-700"></div>
                            <span class="flex-shrink mx-4 text-gray-500 text-sm font-unbounded">o continúa con</span>
                            <div class="flex-grow border-t border-gray-700"></div>
                        </div>

                        <!-- Google button -->
                        <a href="{{ route('auth.google.login') }}"
                            class="flex font-medium justify-center gap-3 items-center bg-gray-900/50 hover:bg-gray-800/50 
                                   rounded-xl text-base font-unbounded text-gray-300 w-full py-3.5 px-4
                                   border-2 border-gray-700 hover:border-amber-500/50 hover:shadow-lg hover:shadow-amber-500/10
                                   transition-all duration-300 transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                            Continuar con Google
                        </a>
                    </div>
                </form>
            </div>

            <!-- Modal mejorado -->
            <div id="recoverPasswordModal"
                class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center hidden z-50 p-4">
                <div class="bg-gradient-to-br from-gray-900 to-black border border-amber-500/30 rounded-2xl shadow-2xl p-8 max-w-md w-full transform transition-all animate-fade-in">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-amber-500/20 to-yellow-600/20 rounded-full border border-amber-500/30">
                        <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-unbounded font-semibold mb-3 text-center text-gray-100">¿Olvidaste tu contraseña?</h2>
                    <p class="text-gray-400 text-center mb-8 font-unbounded">Contacta a tu equipo de tecnología para restablecer tu contraseña</p>
                    <div class="flex gap-3">
                        <button onclick="document.getElementById('recoverPasswordModal').classList.add('hidden')"
                            class="flex-1 bg-gradient-to-r from-amber-600 to-yellow-600 hover:from-amber-500 hover:to-yellow-500 text-black font-unbounded font-bold px-6 py-3 rounded-xl transition-all duration-300 shadow-lg hover:shadow-amber-500/30">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <style>
        /* Grid pattern para el fondo */
        .bg-grid-pattern {
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        /* Animación de pulse con delays */
        .delay-1000 {
            animation-delay: 1s;
        }

        .delay-2000 {
            animation-delay: 2s;
        }

        /* Animación de fade-in */
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }

        /* Botón de login con estado activo */
        #loginButton:not(:disabled) {
            background: linear-gradient(135deg, #f59e0b 0%, #eab308 100%);
            color: #000;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(245, 158, 11, 0.3);
            border-color: #f59e0b;
        }

        #loginButton:not(:disabled):hover {
            background: linear-gradient(135deg, #d97706 0%, #ca8a04 100%);
            box-shadow: 0 15px 40px rgba(245, 158, 11, 0.4);
            transform: translateY(-2px);
        }

        #loginButton:not(:disabled):active {
            transform: translateY(0);
            box-shadow: 0 5px 20px rgba(245, 158, 11, 0.3);
        }

        /* Contenedor del captcha */
        .captcha-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .g-recaptcha {
            transform-origin: center center;
            width: auto !important;
        }

        /* Responsive captcha */
        @media (min-width: 640px) {
            .g-recaptcha {
                transform: scale(1.0);
            }
        }

        @media (min-width: 525px) and (max-width: 639px) {
            .g-recaptcha {
                transform: scale(1.0) !important;
            }
        }

        @media (min-width: 456px) and (max-width: 524px) {
            .g-recaptcha {
                transform: scale(0.95);
            }
        }

        @media (min-width: 401px) and (max-width: 455px) {
            .g-recaptcha {
                transform: scale(0.9);
            }
        }

        @media (min-width: 327px) and (max-width: 400px) {
            .g-recaptcha {
                transform: scale(0.85);
            }
        }

        @media (max-width: 326px) {
            .g-recaptcha {
                transform: scale(0.75);
            }
        }

        /* Estilos para inputs con autofill */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0 30px #111827 inset !important;
            -webkit-text-fill-color: #f3f4f6 !important;
            box-shadow: 0 0 0 30px #111827 inset !important;
        }
    </style>
@endsection