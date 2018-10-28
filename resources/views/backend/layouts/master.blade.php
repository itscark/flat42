<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('backend.layouts.head')
</head>
<nav>
    @include('backend.layouts.nav')
</nav>
<body>
<main class="main-container">
    @yield('content')
</main>
</body>
<footer>
    @include('backend.layouts.footer')
</footer>
</html>

