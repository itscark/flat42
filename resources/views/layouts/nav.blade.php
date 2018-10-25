@if (Route::has('login'))
    <div class="nav-wrapper">
        <div class="nav-icon">
            <a href="{{ route('welcome') }}">
                @svg('favicon-black-white')
            </a>
        </div>
        <ul>
            <li>
                <a href="">Blog</a>

            </li>

            <li>
                <a href="">Über Uns</a>
            </li>

            @if(!auth()->check())
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>

                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
            @else
                <li>
                    <a href="{{ route('logout') }}">Logout</a>
                </li>
            @endif
        </ul>
    </div>
@endif