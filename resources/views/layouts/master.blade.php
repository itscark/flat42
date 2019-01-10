<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>

<body>
<div id="app">
        @if(auth()->check() && auth()->user()->flat_id != null)
            <wg-info v-if="showModal" @close="showModal = false"></wg-info>
        @endif
    @include('layouts.nav')

    @yield('hero-section')

    <div class="container mt-5">
        @yield('content')
    </div>
</div>

</body>
@include('layouts.footer')
</html>

