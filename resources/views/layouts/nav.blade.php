@if (Route::has('login'))
    <div class="nav-wrapper">
        <div class="nav-icon">
            <a href="{{ route('welcome') }}">
                @svg('favicon-black-white', 'nav-icon')
            </a>
        </div>

        <ul class="buttons">
            <li class="nav-btn">
                <a href="" class="btn">Blog</a>
            </li>

            <li class="nav-btn">
                <a class="btn" href="">Über Uns</a>
            </li>

            @if(!auth()->check())
                <li class="nav-btn">
                    <a class="btn" href="{{ route('login') }}">Login</a>
                </li>

                <li class="nav-btn">
                    <a class="btn" href="{{ route('register') }}">Register</a>
                </li>
            @else
                <li class="nav-btn">
                    <a class="btn" href="{{ route('logout') }}">Logout</a>
                </li>
            @endif
        </ul>
    </div>
@endif