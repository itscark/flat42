@if (Route::has('login'))
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container mx-auto">
            @if(auth()->check())
                <router-link to="/home" exact class="navbar-brand">Flat42</router-link>
            @else
                <a class="navbar-brand" href="{{route('home')}}">Navbar</a>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @if(!auth()->check())
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ active_menu(Route::currentRouteName(), 'blog', 0, 4) }}">
                            <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                        </li>
                    </ul>
                @elseif(auth()->check() && auth()->user()->flat_id != null && auth()->user()->role == 'user')
                    <div class="navbar-nav mr-auto">
                        <router-link to="/home" tag="li" exact class="nav-item">
                            <a class="nav-link">News</a>
                        </router-link>
                        <router-link to="/shopping" tag="li" class="nav-item">
                            <a class="nav-link">Shopping</a>
                        </router-link>
                        <router-link to="/events" tag="li" class="nav-item">
                            <a class="nav-link">Events</a>
                        </router-link>
                        <router-link to="/cleaning" tag="li" class="nav-item">
                            <a class="nav-link">Cleaning</a>
                        </router-link>
                    </div>
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

                    @if(auth()->check() && auth()->user()->flat_id != null && auth()->user()->role == 'user')
                        <button class="btn btn-primary ml-2" id="show-modal" @click="showModal = true"><i
                                    class="fas fa-info"></i> WG Info
                        </button>
                    @endif
                @endif
            </div>
        </div>
    </nav>
@endif

