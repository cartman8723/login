<!DOCTYPE html>
<html lang="es" data-topbar-color="dark">

<head>
    <meta charset="utf-8"/>
    <title>Autenticarme | {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/head.js"></script>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="auth-fluid-pages pb-0">
{{ $slot }}
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script>
    $("[data-password]").on("click", function () {
        "false" == $(this).attr("data-password") ? ($(this).siblings("input").attr("type", "text"), $(this).attr("data-password", "true"), $(this).addClass("show-password")) : ($(this).siblings("input").attr("type", "password"), $(this).attr("data-password", "false"), $(this).removeClass("show-password"))
    });
</script>
</body>
</html>
