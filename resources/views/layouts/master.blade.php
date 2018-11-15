<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>

<body>
@include('layouts.nav')
<div id="app">
    @yield('content')
</div>
@include('layouts.footer')
</body>
@include('layouts.scripts')
</html>

