@if (session()->has('user'))
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-clr-light-bg">
    @include('partials.nav')
    <section class="max-w-[92%] mx-auto">
        @yield('content')
    </section>
</body>
</html>
@else
<?php header('Location: ' . route('admin.login')); exit(); ?>
@endif