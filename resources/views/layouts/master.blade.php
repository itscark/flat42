<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<nav>
    @include('layouts.nav')
</nav>
<body id="app">
<main class="main-container">
    @yield('content')
</main>
</body>
<footer>
    @include('layouts.footer')
</footer>
</html>

