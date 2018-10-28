<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend.layouts.head')
</head>
<nav>
    @include('frontend.layouts.nav')
</nav>
<body id="app">
<main class="main-container">
    @yield('content')
</main>
</body>
<footer>
    @include('frontend.layouts.footer')
</footer>
</html>

