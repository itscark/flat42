<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
<div id="app">
    <flash-message class="flash-message"></flash-message>
    @if(auth()->check() && auth()->user()->flat_id != null)
        <wg-info v-if="showModal" @close="showModal = false"></wg-info>
    @endif
    @include('layouts.nav')

    <div class="container mt-5">
        @if(auth()->check() && auth()->user()->flat_id != null)
            <transition name="fade" mode="out-in" enter-active-class="animated fadeIn faster" leave-active-class="animated fadeOut faster">
                <router-view></router-view>
            </transition>
        @endif
        @yield('content')
    </div>
</div>

@include('layouts.footer')
</body>
</html>

