<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-clr-light-bg">
    @include('partials.nav')
    <section class="max-w-[92%] mx-auto">
        @yield('content')
    </section>
</body>

</html>