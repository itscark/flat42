@if (Route::has('login'))
    <div class="nav-wrapper">
        <div class="nav-icon">
            <a href="{{ route('welcome') }}">
                @svg('favicon-black-white', 'nav-icon')
            </a>
        </div>

        <input type="checkbox" id="menu-toggle"/>
        <label id="trigger" for="menu-toggle"></label>
        <label id="burger" for="menu-toggle"></label>
        <ul id="menu">
            <li class="nav-btn">
                <a href="{{ route('home') }}" class="btn">News</a>
            </li>
            <li class="nav-btn">
                <a class="btn" href="/shopping">Einkaufsliste</a>
            </li>
            <li class="nav-btn">
                <a class="btn" href="{{ route('event.index') }}">Events</a>
            </li>
            <li class="nav-btn">
                <a class="btn" href="">Putzplan</a>
            </li>
            <li class="nav-btn">
                <a class="btn" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>

    </div>

@endif