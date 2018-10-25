<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    @include('layouts.nav')
</nav>
<body id="app">
<main class="py-4">
    @yield('content')
</main>
</body>
</html>

