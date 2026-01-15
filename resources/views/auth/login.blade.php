@extends('layouts.app')
@section('content')

    <body class="overflow-x-hidden">
        <div class="flex flex-col md:flex-row">
            <div class="md:sticky top-0 flex-1 h-52 md:h-screen overflow-hidden rounded-none md:rounded-r-[50px]">
                <img class="h-52 w-full md:h-full object-cover object-top md:object-[30%] xl:object-[10%]"
                    src="{{ url('assets/images/Foto2.png') }}" alt="background image" />
            </div>
            <div class="relative flex-1 pb-14">
                <div class="items-center z-10 relative justify-center flex p-3 h-full">
                    <div class="p-3">
                        <a href="#" class="block w-full sm:w-104 m-auto mb-6">
                            <img src="{{ url('assets/images/imagen_logo.jpg') }}" alt="logo" />
                        </a>
                        <p class="text-grey text-xl mb-10 font-unbounded font-light">¡Te damos la bienvenida! <br />Accede a
                            tu cuenta aquí.</p>
                        <form action="{{ route('autenticarme') }}" method="post">
                            @csrf
                            <div class="mb-5 flex flex-col gap-1">
                                <label for="email" class="text-grey text-base font-unbounded">Correo electrónico</label>
                                <input id="email" name="email"
                                    class="text-grey outline-none rounded-lg w-full px-3.5 py-3.5 border border-grey @error('email') border-red-500 @enderror"
                                    type="email" required>
                                @error('email')
                                    <p class="font-unbounded text-xs text-red-500 mt-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5 flex flex-col gap-1">
                                <label for="password" class="text-grey text-base font-unbounded">Contraseña</label>
                                <div class="relative mb-3">
                                    <input type="password" id="password" name="password"
                                        class="password-input text-grey outline-none rounded-lg w-full px-3.5 py-3.5 border border-grey mt-3 @error('password') border-red-500 @enderror"
                                        required>
                                    <button type="button"
                                        class="toggle-password absolute right-1 p-2 rounded-full top-[60%] -translate-y-2/4">
                                        <span class="icon-show" style="display: inline;">
                                            <!-- Ícono ojo tachado-->
                                            <svg width="25" height="22" viewBox="0 0 25 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.125 11.4375C7.125 8.49805 9.51855 6.0625 12.5 6.0625C15.4395 6.0625 17.875 8.49805 17.875 11.4375C17.875 14.4189 15.4395 16.8125 12.5 16.8125C9.51855 16.8125 7.125 14.4189 7.125 11.4375ZM12.5 14.7969C14.3477 14.7969 15.8594 13.3271 15.8594 11.4375C15.8594 9.58984 14.3477 8.07813 12.5 8.07813C12.458 8.07813 12.416 8.07813 12.374 8.07813C12.458 8.33008 12.5 8.54004 12.5 8.75C12.5 10.2617 11.2822 11.4375 9.8125 11.4375C9.56055 11.4375 9.35059 11.4375 9.14063 11.3535C9.14063 11.3955 9.14063 11.4375 9.14063 11.4375C9.14063 13.3271 10.6104 14.7969 12.5 14.7969ZM4.39551 5.43262C6.36914 3.58496 9.09863 2.03125 12.5 2.03125C15.8594 2.03125 18.5889 3.58496 20.5625 5.43262C22.5361 7.23828 23.8379 9.42188 24.4678 10.9336C24.5937 11.2695 24.5937 11.6475 24.4678 11.9834C23.8379 13.4531 22.5361 15.6367 20.5625 17.4844C18.5889 19.332 15.8594 20.8437 12.5 20.8437C9.09863 20.8437 6.36914 19.332 4.39551 17.4844C2.42188 15.6367 1.12012 13.4531 0.490235 11.9834C0.364259 11.6475 0.364259 11.2695 0.490235 10.9336C1.12012 9.42188 2.42188 7.23828 4.39551 5.43262ZM12.5 4.04688C9.72852 4.04688 7.50293 5.30664 5.78125 6.90234C4.14356 8.41406 3.05176 10.1777 2.46387 11.4375C3.05176 12.6973 4.14356 14.5029 5.78125 16.0146C7.50293 17.6104 9.72852 18.8281 12.5 18.8281C15.2295 18.8281 17.4551 17.6104 19.1768 16.0146C20.8145 14.5029 21.9062 12.6973 22.4941 11.4375C21.9062 10.1777 20.8145 8.41406 19.1768 6.90234C17.4551 5.30664 15.2295 4.04688 12.5 4.04688Z"
                                                    fill="#ADC5F1" />
                                            </svg>
                                        </span>
                                        <span class="icon-hide" style="display: none;">
                                            <!-- Ícono ojo normal-->
                                            <svg width="25" height="22" fill="#ADC5F1"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.125 11.4375C7.125 8.49805 9.51855 6.0625 12.5 6.0625C15.4395 6.0625 17.875 8.49805 17.875 11.4375C17.875 14.4189 15.4395 16.8125 12.5 16.8125C9.51855 16.8125 7.125 14.4189 7.125 11.4375ZM12.5 14.7969C14.3477 14.7969 15.8594 13.3271 15.8594 11.4375C15.8594 9.58984 14.3477 8.07813 12.5 8.07813C12.458 8.07813 12.416 8.07813 12.374 8.07813C12.458 8.33008 12.5 8.54004 12.5 8.75C12.5 10.2617 11.2822 11.4375 9.8125 11.4375C9.56055 11.4375 9.35059 11.4375 9.14063 11.3535C9.14063 11.3955 9.14063 11.4375 9.14063 11.4375C9.14063 13.3271 10.6104 14.7969 12.5 14.7969ZM4.39551 5.43262C6.36914 3.58496 9.09863 2.03125 12.5 2.03125C15.8594 2.03125 18.5889 3.58496 20.5625 5.43262C22.5361 7.23828 23.8379 9.42188 24.4678 10.9336C24.5937 11.2695 24.5937 11.6475 24.4678 11.9834C23.8379 13.4531 22.5361 15.6367 20.5625 17.4844C18.5889 19.332 15.8594 20.8437 12.5 20.8437C9.09863 20.8437 6.36914 19.332 4.39551 17.4844C2.42188 15.6367 1.12012 13.4531 0.490235 11.9834C0.364259 11.6475 0.364259 11.2695 0.490235 10.9336C1.12012 9.42188 2.42188 7.23828 4.39551 5.43262ZM12.5 4.04688C9.72852 4.04688 7.50293 5.30664 5.78125 6.90234C4.14356 8.41406 3.05176 10.1777 2.46387 11.4375C3.05176 12.6973 4.14356 14.5029 5.78125 16.0146C7.50293 17.6104 9.72852 18.8281 12.5 18.8281C15.2295 18.8281 17.4551 17.6104 19.1768 16.0146C20.8145 14.5029 21.9062 12.6973 22.4941 11.4375C21.9062 10.1777 20.8145 8.41406 19.1768 6.90234C17.4551 5.30664 15.2295 4.04688 12.5 4.04688Z"
                                                    fill="#ADC5F1" />
                                                <path d="M2 2L23 20" stroke="#ADC5F1" stroke-width="2" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="font-unbounded text-xs text-red-500 mt-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <a href="#"
                                onclick="document.getElementById('recoverPasswordModal').classList.remove('hidden')"
                                class="text-primary-dark mb-10 ml-auto font-unbounded text-grey text-base block w-max underline">
                                ¿Olvidaste tu contraseña?
                            </a>

                            <div class="w-full">
                                <div class="captcha-container">
                                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"
                                        data-callback="onCaptchaSuccess" data-expired-callback="onCaptchaExpired">
                                    </div>
                                </div>
                                @error('g-recaptcha-response')
                                    <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-3">
                                <button id="loginButton" type="submit"
                                    class="flex justify-center items-center bg-gray-400 cursor-not-allowed rounded-full text-lg font-unbounded text-white w-full py-3 px-3.5"
                                    disabled>
                                    Ingresar
                                </button>


                            </div>
                        </form>
                        <a href="{{ route('auth.google.login') }}"
                            class="flex font-light justify-center gap-2 items-center bg-white rounded-full text-lg hover:bg-white-cloud font-unbounded text-grey w-full py-3 px-3.5">
                            <img src="https://goodies.icons8.com/web/common/social/social_google.svg" alt="icon"
                                class="i8-social-login__icon">
                            Continuar con Google
                        </a>
                    </div>
                    <div id="recoverPasswordModal"
                        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
                            <h2 class="text-xl font-semibold mb-4">¿Olvidaste tu contraseña?</h2>
                            <p class="text-gray-700 mb-6">Contacta a tu equipo de tecnologia</p>
                            <div class="text-right">
                                <button onclick="document.getElementById('recoverPasswordModal').classList.add('hidden')"
                                    class="bg-red-500 text-white px-4 py-2 rounded-full">
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="absolute bottom-0" src="{{ url('assets/images/circulos.png') }}" alt="login decoration" />
            </div>
        </div>
    </body>
    <style>
        /* Contenedor para el captcha para mejor control */
        .captcha-container {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 2rem;
            margin-top: 1rem;
        }

        /* Estilos base para el captcha */
        .g-recaptcha {
            transform-origin: center center;
            width: auto !important;
        }

        /* Pantallas grandes (por defecto) */
        @media (min-width: 640px) {
            .g-recaptcha {
                transform: scale(1.35);
            }
        }

        /* Pantallas medianas grandes */
        @media (min-width: 525px) and (max-width: 639px) {
            .g-recaptcha {
                transform: scale(1.54) !important;
            }
        }

        /* Pantallas medianas */
        @media (min-width: 456px) and (max-width: 524px) {
            .g-recaptcha {
                transform: scale(1.);
            }
        }

        /* Pantallas pequeñas */
        @media (min-width: 401px) and (max-width: 455px) {
            .g-recaptcha {
                transform: scale(1.14);
            }
        }

        /* Pantallas más pequeñas */
        @media (min-width: 327px) and (max-width: 400px) {
            .g-recaptcha {
                transform: scale(0.88);
            }

            .captcha-container {
                margin-bottom: 0.2rem;
                margin-top: 0.2rem;
            }
        }

        /* Pantallas muy pequeñas */
        @media (max-width: 326px) {
            .g-recaptcha {
                transform: scale(0.70);
            }

            .captcha-container {
                margin-bottom: 0.1rem;
                margin-top: 0.1rem;
            }
        }
    </style>
@endsection
