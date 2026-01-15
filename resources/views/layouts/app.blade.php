<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-topbar-color="dark" class="h-full">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Autenticarme') | {{ env('APP_NAME') }} </title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/Logo_ConectIA_Capital.svg') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="preload" as="image" href="assets/images/Fondo.png">
    <link rel="preload" as="image" href="assets/images/Foto2.png">
</head>

<body>
    @include('sweetalert::alert')
    <x-Spinner />

    @yield('content')
    <script src="{{ url('assets/js/scripts.js') }}"></script>
    <script src="{{ url('assets/js/scripts-tailwind.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('assets/js/captcha-handler.js') }}"></script>
</body>

</html>
