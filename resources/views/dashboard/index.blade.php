@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="min-h-screen flex flex-col items-center justify-center px-4 bg-cover bg-center bg-no-repeat" style="background-image: url('assets/images/Fondo.png')">

    <!-- Encabezado -->
    <div class="text-center mb-16">
        <p class="text-white text-3xl  mt-2">Bienvenido {{ auth()->user()->names . ' ' . auth()->user()->last_names }}</p>
        <p class="text-white text-lg ">Selecciona tu espacio</p>
    </div>

    <!-- Grid de 4 contenedores en una sola fila -->
    <div class="w-full max-w-7xl grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 md:gap-6 gap-12 mb-10">
        <!-- ConectIA Capital -->
        <div class="bg-white rounded-3xl shadow pt-12 pb-5 px-5 mx-auto w-[15rem] min-h-[260px] md:w-[12rem] xl:w-[15rem] flex flex-col relative">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <img src="{{ asset('assets/images/Logo_ConectIA_Capital.svg') }}" alt="Logo ConectIA Capital" class="w-24 h-auto">
            </div>
            <h2 class="font-bold text-lg mb-4 text-center">inmobiliaria</h2>
            @foreach ($apps as $app)
            
                @if ($app->company == 'Conectia Capital' && $app->name != 'Auth')
                @can('tech-permissions')
                <a href="{{ route('redirect.app', $app->id) }}" target="_blank">
                    <div class="bg-[#e7e3ff] transition p-2 rounded text-center mb-2">
                        {{ $app->name }}
                    </div>
                </a>
                @endcan
                @endif
            @endforeach
            <a href="" target="_blank">
                <div class="bg-[#e7e3ff] transition p-2 rounded text-center mb-2">
                    Ayuda TI
                </div>
            </a>
        </div>
        <div class="bg-white rounded-3xl shadow pt-12 pb-5 px-5 mx-auto w-[15rem] min-h-[260px] md:w-[12rem] xl:w-[15rem] flex flex-col relative">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <img src="{{ asset('assets/images/Logo_Leario.svg') }}" alt="Logo leario" class="w-24 h-auto">
            </div>
            <h2 class="font-bold text-lg mb-4 text-center">Leario</h2>
            @foreach ($apps as $app)
                @if ($app->company == 'Leario')
                    <a href="{{ route('redirect.app', $app->id) }}" target="_blank">
                        <div class="bg-blue-100 hover:bg-blue-200 transition p-2 rounded text-center mb-2">
                            {{ $app->name }}
                        </div>
                    </a>
                @endif
            @endforeach
            <a href="https://investta.com" target="_blank">
                <div class="bg-blue-100 hover:bg-blue-200 transition p-2 rounded text-center mb-2">
                    WEB
                </div>
            </a>
        </div>
        <div class="bg-white rounded-3xl shadow pt-12 pb-5 px-5 mx-auto w-[15rem] min-h-[260px] md:w-[12rem] xl:w-[15rem] flex flex-col relative">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <img src="{{ asset('assets/images/Logo_Muntt.svg') }}" alt="Logo Munnt" class="w-24 h-auto">
            </div>
            <h2 class="font-bold text-lg mb-4 text-center">Muntt</h2>
            @foreach ($apps as $app)
                @if ($app->company == 'Munnt')
                    <a href="{{ route('redirect.app', $app->id) }}" target="_blank">
                        <div class="bg-[#F4FFE6] transition p-2 rounded text-center mb-2">
                            {{ $app->name }}
                        </div>
                    </a>
                @endif
            @endforeach
            <a href="https://muntt.com" target="_blank">
                <div class="bg-[#F4FFE6] transition p-2 rounded text-center mb-2">
                    WEB
                </div>
            </a>
        </div>
        <div class="bg-white rounded-3xl shadow pt-12 pb-5 px-5 mx-auto w-[15rem] min-h-[260px] md:w-[12rem] xl:w-[15rem] flex flex-col relative">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <img src="{{ asset('assets/images/Logo_Uelt.svg') }}" alt="Logo Uelt" class="w-24 h-auto">
            </div>
            <h2 class="font-bold text-lg mb-4 text-center">Uelt</h2>
            @foreach ($apps as $app)
                @if ($app->company == 'Uelt')
                    <a href="{{ route('redirect.app', $app->id) }}" target="_blank">
                        <div class="bg-[#E9FFF6] transition p-2 rounded text-center mb-2">
                            {{ $app->name }}
                        </div>
                    </a>
                @endif
            @endforeach
            <a href="https://uelt.com" target="_blank">
                <div class="bg-[#E9FFF6] transition p-2 rounded text-center mb-2">
                    WEB
                </div>
            </a>
        </div>
    </div>
    <div class="w-full max-w-5xl flex justify-center mt-8">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-[#EF4444] text-white px-6 py-2 rounded-full text-xl font-semibold shadow">
            Cerrar sesión
        </button>
        </form>
    </div>
    <p class="text-white text-lg mt-6">¿Quieres cambiar tu contraseña? <a href="#" class="font-bold underline decoration-2 underline-offset-4" onclick="document.getElementById('updatePassword').classList.remove('hidden')">actualizala aquí</a></p>
    <div id="updatePassword" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <form action="{{route('users.update-password')}}" method="post" class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
            @csrf
            @method('PUT')
            <h2 class="font-bold text-lg mb-4 text-center">Actualizar contraseña</h2>
            <div class="relative mb-3">
                <label for="password" class="text-grey text-base">Ingresa tu contraseña actual</label>
                <input type="password" id="password" name="password" class="password-input text-grey outline-none rounded-lg w-full px-3.5 py-3.5 border border-grey mt-3 @error('password') border-red-500 @enderror" required >
                <button type="button" class="toggle-password absolute right-1 p-2 rounded-full top-[70%] -translate-y-2/4">
                    <span class="icon-show" style="display: inline;">
                        <!-- Ícono ojo tachado-->
                        <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.125 11.4375C7.125 8.49805 9.51855 6.0625 12.5 6.0625C15.4395 6.0625 17.875 8.49805 17.875 11.4375C17.875 14.4189 15.4395 16.8125 12.5 16.8125C9.51855 16.8125 7.125 14.4189 7.125 11.4375ZM12.5 14.7969C14.3477 14.7969 15.8594 13.3271 15.8594 11.4375C15.8594 9.58984 14.3477 8.07813 12.5 8.07813C12.458 8.07813 12.416 8.07813 12.374 8.07813C12.458 8.33008 12.5 8.54004 12.5 8.75C12.5 10.2617 11.2822 11.4375 9.8125 11.4375C9.56055 11.4375 9.35059 11.4375 9.14063 11.3535C9.14063 11.3955 9.14063 11.4375 9.14063 11.4375C9.14063 13.3271 10.6104 14.7969 12.5 14.7969ZM4.39551 5.43262C6.36914 3.58496 9.09863 2.03125 12.5 2.03125C15.8594 2.03125 18.5889 3.58496 20.5625 5.43262C22.5361 7.23828 23.8379 9.42188 24.4678 10.9336C24.5937 11.2695 24.5937 11.6475 24.4678 11.9834C23.8379 13.4531 22.5361 15.6367 20.5625 17.4844C18.5889 19.332 15.8594 20.8437 12.5 20.8437C9.09863 20.8437 6.36914 19.332 4.39551 17.4844C2.42188 15.6367 1.12012 13.4531 0.490235 11.9834C0.364259 11.6475 0.364259 11.2695 0.490235 10.9336C1.12012 9.42188 2.42188 7.23828 4.39551 5.43262ZM12.5 4.04688C9.72852 4.04688 7.50293 5.30664 5.78125 6.90234C4.14356 8.41406 3.05176 10.1777 2.46387 11.4375C3.05176 12.6973 4.14356 14.5029 5.78125 16.0146C7.50293 17.6104 9.72852 18.8281 12.5 18.8281C15.2295 18.8281 17.4551 17.6104 19.1768 16.0146C20.8145 14.5029 21.9062 12.6973 22.4941 11.4375C21.9062 10.1777 20.8145 8.41406 19.1768 6.90234C17.4551 5.30664 15.2295 4.04688 12.5 4.04688Z"
                                fill="#ADC5F1"/>
                        </svg>
                    </span>
                    <span class="icon-hide" style="display: none;">
                        <!-- Ícono ojo normal-->
                        <svg width="25" height="22" fill="#ADC5F1" xmlns="http://www.w3.org/2000/svg">
                            <path
                            d="M7.125 11.4375C7.125 8.49805 9.51855 6.0625 12.5 6.0625C15.4395 6.0625 17.875 8.49805 17.875 11.4375C17.875 14.4189 15.4395 16.8125 12.5 16.8125C9.51855 16.8125 7.125 14.4189 7.125 11.4375ZM12.5 14.7969C14.3477 14.7969 15.8594 13.3271 15.8594 11.4375C15.8594 9.58984 14.3477 8.07813 12.5 8.07813C12.458 8.07813 12.416 8.07813 12.374 8.07813C12.458 8.33008 12.5 8.54004 12.5 8.75C12.5 10.2617 11.2822 11.4375 9.8125 11.4375C9.56055 11.4375 9.35059 11.4375 9.14063 11.3535C9.14063 11.3955 9.14063 11.4375 9.14063 11.4375C9.14063 13.3271 10.6104 14.7969 12.5 14.7969ZM4.39551 5.43262C6.36914 3.58496 9.09863 2.03125 12.5 2.03125C15.8594 2.03125 18.5889 3.58496 20.5625 5.43262C22.5361 7.23828 23.8379 9.42188 24.4678 10.9336C24.5937 11.2695 24.5937 11.6475 24.4678 11.9834C23.8379 13.4531 22.5361 15.6367 20.5625 17.4844C18.5889 19.332 15.8594 20.8437 12.5 20.8437C9.09863 20.8437 6.36914 19.332 4.39551 17.4844C2.42188 15.6367 1.12012 13.4531 0.490235 11.9834C0.364259 11.6475 0.364259 11.2695 0.490235 10.9336C1.12012 9.42188 2.42188 7.23828 4.39551 5.43262ZM12.5 4.04688C9.72852 4.04688 7.50293 5.30664 5.78125 6.90234C4.14356 8.41406 3.05176 10.1777 2.46387 11.4375C3.05176 12.6973 4.14356 14.5029 5.78125 16.0146C7.50293 17.6104 9.72852 18.8281 12.5 18.8281C15.2295 18.8281 17.4551 17.6104 19.1768 16.0146C20.8145 14.5029 21.9062 12.6973 22.4941 11.4375C21.9062 10.1777 20.8145 8.41406 19.1768 6.90234C17.4551 5.30664 15.2295 4.04688 12.5 4.04688Z"
                            fill="#ADC5F1"/>
                            <path d="M2 2L23 20" stroke="#ADC5F1" stroke-width="2"/>
                        </svg>
                    </span>
                </button>
            </div>
            @error('password')
                <p class="text-xs text-red-500 mt-3">{{ $message }}</p>
            @enderror
            <div class="relative mb-3">
                <label for="newPassword" class="text-grey text-base">Ingresa tu nueva contraseña</label>
                <input type="password" id="newPassword" name="new_password" class="password-input text-grey outline-none rounded-lg w-full px-3.5 py-3.5 border border-grey mt-3 @error('new_password') border-red-500 @enderror" required >
                <button type="button" class="toggle-password absolute right-1 p-2 rounded-full top-[70%] -translate-y-2/4">
                    <span class="icon-show" style="display: inline;">
                        <!-- Ícono ojo tachado-->
                        <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.125 11.4375C7.125 8.49805 9.51855 6.0625 12.5 6.0625C15.4395 6.0625 17.875 8.49805 17.875 11.4375C17.875 14.4189 15.4395 16.8125 12.5 16.8125C9.51855 16.8125 7.125 14.4189 7.125 11.4375ZM12.5 14.7969C14.3477 14.7969 15.8594 13.3271 15.8594 11.4375C15.8594 9.58984 14.3477 8.07813 12.5 8.07813C12.458 8.07813 12.416 8.07813 12.374 8.07813C12.458 8.33008 12.5 8.54004 12.5 8.75C12.5 10.2617 11.2822 11.4375 9.8125 11.4375C9.56055 11.4375 9.35059 11.4375 9.14063 11.3535C9.14063 11.3955 9.14063 11.4375 9.14063 11.4375C9.14063 13.3271 10.6104 14.7969 12.5 14.7969ZM4.39551 5.43262C6.36914 3.58496 9.09863 2.03125 12.5 2.03125C15.8594 2.03125 18.5889 3.58496 20.5625 5.43262C22.5361 7.23828 23.8379 9.42188 24.4678 10.9336C24.5937 11.2695 24.5937 11.6475 24.4678 11.9834C23.8379 13.4531 22.5361 15.6367 20.5625 17.4844C18.5889 19.332 15.8594 20.8437 12.5 20.8437C9.09863 20.8437 6.36914 19.332 4.39551 17.4844C2.42188 15.6367 1.12012 13.4531 0.490235 11.9834C0.364259 11.6475 0.364259 11.2695 0.490235 10.9336C1.12012 9.42188 2.42188 7.23828 4.39551 5.43262ZM12.5 4.04688C9.72852 4.04688 7.50293 5.30664 5.78125 6.90234C4.14356 8.41406 3.05176 10.1777 2.46387 11.4375C3.05176 12.6973 4.14356 14.5029 5.78125 16.0146C7.50293 17.6104 9.72852 18.8281 12.5 18.8281C15.2295 18.8281 17.4551 17.6104 19.1768 16.0146C20.8145 14.5029 21.9062 12.6973 22.4941 11.4375C21.9062 10.1777 20.8145 8.41406 19.1768 6.90234C17.4551 5.30664 15.2295 4.04688 12.5 4.04688Z"
                                fill="#ADC5F1"/>
                        </svg>
                    </span>
                    <span class="icon-hide" style="display: none;">
                        <!-- Ícono ojo normal-->
                        <svg width="25" height="22" fill="#ADC5F1" xmlns="http://www.w3.org/2000/svg">
                            <path
                            d="M7.125 11.4375C7.125 8.49805 9.51855 6.0625 12.5 6.0625C15.4395 6.0625 17.875 8.49805 17.875 11.4375C17.875 14.4189 15.4395 16.8125 12.5 16.8125C9.51855 16.8125 7.125 14.4189 7.125 11.4375ZM12.5 14.7969C14.3477 14.7969 15.8594 13.3271 15.8594 11.4375C15.8594 9.58984 14.3477 8.07813 12.5 8.07813C12.458 8.07813 12.416 8.07813 12.374 8.07813C12.458 8.33008 12.5 8.54004 12.5 8.75C12.5 10.2617 11.2822 11.4375 9.8125 11.4375C9.56055 11.4375 9.35059 11.4375 9.14063 11.3535C9.14063 11.3955 9.14063 11.4375 9.14063 11.4375C9.14063 13.3271 10.6104 14.7969 12.5 14.7969ZM4.39551 5.43262C6.36914 3.58496 9.09863 2.03125 12.5 2.03125C15.8594 2.03125 18.5889 3.58496 20.5625 5.43262C22.5361 7.23828 23.8379 9.42188 24.4678 10.9336C24.5937 11.2695 24.5937 11.6475 24.4678 11.9834C23.8379 13.4531 22.5361 15.6367 20.5625 17.4844C18.5889 19.332 15.8594 20.8437 12.5 20.8437C9.09863 20.8437 6.36914 19.332 4.39551 17.4844C2.42188 15.6367 1.12012 13.4531 0.490235 11.9834C0.364259 11.6475 0.364259 11.2695 0.490235 10.9336C1.12012 9.42188 2.42188 7.23828 4.39551 5.43262ZM12.5 4.04688C9.72852 4.04688 7.50293 5.30664 5.78125 6.90234C4.14356 8.41406 3.05176 10.1777 2.46387 11.4375C3.05176 12.6973 4.14356 14.5029 5.78125 16.0146C7.50293 17.6104 9.72852 18.8281 12.5 18.8281C15.2295 18.8281 17.4551 17.6104 19.1768 16.0146C20.8145 14.5029 21.9062 12.6973 22.4941 11.4375C21.9062 10.1777 20.8145 8.41406 19.1768 6.90234C17.4551 5.30664 15.2295 4.04688 12.5 4.04688Z"
                            fill="#ADC5F1"/>
                            <path d="M2 2L23 20" stroke="#ADC5F1" stroke-width="2"/>
                        </svg>
                    </span>
                </button>
            </div>
            @error('new_password')
                <p class="text-xs text-red-500 mt-3">{{ $message }}</p>
            @enderror
            <div class="relative mb-3">
                <label for="confirmNewPassword" class="text-grey text-base">Confirma tu nueva contraseña</label>
                <input type="password" id="confirmNewPassword" name="confirm_new_password" class="password-input text-grey outline-none rounded-lg w-full px-3.5 py-3.5 border border-grey mt-3 @error('new_password') border-red-500 @enderror" required >
                <button type="button" class="toggle-password absolute right-1 p-2 rounded-full top-[70%] -translate-y-2/4">
                    <span class="icon-show" style="display: inline;">
                        <!-- Ícono ojo tachado-->
                        <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.125 11.4375C7.125 8.49805 9.51855 6.0625 12.5 6.0625C15.4395 6.0625 17.875 8.49805 17.875 11.4375C17.875 14.4189 15.4395 16.8125 12.5 16.8125C9.51855 16.8125 7.125 14.4189 7.125 11.4375ZM12.5 14.7969C14.3477 14.7969 15.8594 13.3271 15.8594 11.4375C15.8594 9.58984 14.3477 8.07813 12.5 8.07813C12.458 8.07813 12.416 8.07813 12.374 8.07813C12.458 8.33008 12.5 8.54004 12.5 8.75C12.5 10.2617 11.2822 11.4375 9.8125 11.4375C9.56055 11.4375 9.35059 11.4375 9.14063 11.3535C9.14063 11.3955 9.14063 11.4375 9.14063 11.4375C9.14063 13.3271 10.6104 14.7969 12.5 14.7969ZM4.39551 5.43262C6.36914 3.58496 9.09863 2.03125 12.5 2.03125C15.8594 2.03125 18.5889 3.58496 20.5625 5.43262C22.5361 7.23828 23.8379 9.42188 24.4678 10.9336C24.5937 11.2695 24.5937 11.6475 24.4678 11.9834C23.8379 13.4531 22.5361 15.6367 20.5625 17.4844C18.5889 19.332 15.8594 20.8437 12.5 20.8437C9.09863 20.8437 6.36914 19.332 4.39551 17.4844C2.42188 15.6367 1.12012 13.4531 0.490235 11.9834C0.364259 11.6475 0.364259 11.2695 0.490235 10.9336C1.12012 9.42188 2.42188 7.23828 4.39551 5.43262ZM12.5 4.04688C9.72852 4.04688 7.50293 5.30664 5.78125 6.90234C4.14356 8.41406 3.05176 10.1777 2.46387 11.4375C3.05176 12.6973 4.14356 14.5029 5.78125 16.0146C7.50293 17.6104 9.72852 18.8281 12.5 18.8281C15.2295 18.8281 17.4551 17.6104 19.1768 16.0146C20.8145 14.5029 21.9062 12.6973 22.4941 11.4375C21.9062 10.1777 20.8145 8.41406 19.1768 6.90234C17.4551 5.30664 15.2295 4.04688 12.5 4.04688Z"
                                fill="#ADC5F1"/>
                        </svg>
                    </span>
                    <span class="icon-hide" style="display: none;">
                        <!-- Ícono ojo normal-->
                        <svg width="25" height="22" fill="#ADC5F1" xmlns="http://www.w3.org/2000/svg">
                            <path
                            d="M7.125 11.4375C7.125 8.49805 9.51855 6.0625 12.5 6.0625C15.4395 6.0625 17.875 8.49805 17.875 11.4375C17.875 14.4189 15.4395 16.8125 12.5 16.8125C9.51855 16.8125 7.125 14.4189 7.125 11.4375ZM12.5 14.7969C14.3477 14.7969 15.8594 13.3271 15.8594 11.4375C15.8594 9.58984 14.3477 8.07813 12.5 8.07813C12.458 8.07813 12.416 8.07813 12.374 8.07813C12.458 8.33008 12.5 8.54004 12.5 8.75C12.5 10.2617 11.2822 11.4375 9.8125 11.4375C9.56055 11.4375 9.35059 11.4375 9.14063 11.3535C9.14063 11.3955 9.14063 11.4375 9.14063 11.4375C9.14063 13.3271 10.6104 14.7969 12.5 14.7969ZM4.39551 5.43262C6.36914 3.58496 9.09863 2.03125 12.5 2.03125C15.8594 2.03125 18.5889 3.58496 20.5625 5.43262C22.5361 7.23828 23.8379 9.42188 24.4678 10.9336C24.5937 11.2695 24.5937 11.6475 24.4678 11.9834C23.8379 13.4531 22.5361 15.6367 20.5625 17.4844C18.5889 19.332 15.8594 20.8437 12.5 20.8437C9.09863 20.8437 6.36914 19.332 4.39551 17.4844C2.42188 15.6367 1.12012 13.4531 0.490235 11.9834C0.364259 11.6475 0.364259 11.2695 0.490235 10.9336C1.12012 9.42188 2.42188 7.23828 4.39551 5.43262ZM12.5 4.04688C9.72852 4.04688 7.50293 5.30664 5.78125 6.90234C4.14356 8.41406 3.05176 10.1777 2.46387 11.4375C3.05176 12.6973 4.14356 14.5029 5.78125 16.0146C7.50293 17.6104 9.72852 18.8281 12.5 18.8281C15.2295 18.8281 17.4551 17.6104 19.1768 16.0146C20.8145 14.5029 21.9062 12.6973 22.4941 11.4375C21.9062 10.1777 20.8145 8.41406 19.1768 6.90234C17.4551 5.30664 15.2295 4.04688 12.5 4.04688Z"
                            fill="#ADC5F1"/>
                            <path d="M2 2L23 20" stroke="#ADC5F1" stroke-width="2"/>
                        </svg>
                    </span>
                </button>
            </div>
            @error('confirm_new_password')
                <p class="text-xs text-red-500 mt-3">{{ $message }}</p>
            @enderror
            <small id="passwordError" class="text-red-500 text-sm hidden mt-1">Las contraseñas no coinciden</small>
            <div class="text-right mt-5">
                <a href="#" onclick="document.getElementById('updatePassword').classList.add('hidden')"
                    class="items-center bg-[#DFDEF9] px-4 py-2 rounded-full mr-4">
                    Cerrar
                </a>
                <button type="submit" id="submitUpdatePassword"
                    class="items-center bg-primary text-white rounded-full px-4 py-2">
                    Actualizar
                </button>
            </div>
        </div>
    </div>
</div>
@if ($errors->has('password') || $errors->has('new_password') || $errors->has('confirm_new_password'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('updatePassword');
            if (modal) {
                modal.classList.remove('hidden');
            }
        });
    </script>
@endif

@endsection
