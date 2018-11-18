<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>

<body>
@include('layouts.nav')

@yield('hero-section')

<div class="container mt-5">
    <div id="app">
        @yield('content')
    </div>
</div>
@include('layouts.footer')
</body>
@include('layouts.scripts')
</html>

