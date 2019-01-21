@if (Route::has('login'))

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Flat42</a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if(!auth()->check())
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.index') }}">Blog</a>
                        </li>
                    </ul>
                @elseif(auth()->check() && auth()->user()->flat_id != null && auth()->user()->role == 'User')
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/shopping">Einkaufsliste</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('event.index') }}">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cleaning.index') }}">Putzplan</a>
                        </li>
                    </ul>
                @endif

                @if(!auth()->check())
                    <div class="my-2 my-lg-0">
                        <a class="btn btn-primary" href="{{ route('login') }}"> <i class="fas fa-sign-in-alt"></i>
                            Login</a>
                        <a class="btn btn-primary" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>
                            Register</a>
                    </div>
                @else
                    <a class="btn btn-primary ml-auto" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    @if(auth()->check() && auth()->user()->flat_id != null && auth()->user()->role == 'User')
                        <button class="btn btn-primary ml-2" id="show-modal" @click="showModal = true"><i
                                    class="fas fa-info"></i> WG Info
                        </button>
                    @endif
                @endif
            </div>
        </div>
    </nav>
@endif

