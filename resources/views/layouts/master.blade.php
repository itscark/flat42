<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>

<body>
<div id="app">
    <wg-info v-if="showModal" @close="showModal = false"></wg-info>
    @include('layouts.nav')

    @yield('hero-section')

    <div class="container mt-5">
        @yield('content')
    </div>
</div>
@include('layouts.footer')
@include('layouts.scripts')
</body>
</html>

