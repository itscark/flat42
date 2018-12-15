@if (Route::has('login'))

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/">
                    Flat42
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if(!auth()->check())
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Blog</a>
                    </li>
                </ul>
            @else
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


                    @endif
                </ul>
                @if(!auth()->check())
                    <div class="my-2 my-lg-0">

                        <a class="btn btn-primary" href="{{ route('login') }}"> <i class="fas fa-sign-in-alt"></i> Login</a>

                        <a class="btn btn-primary" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>
                            Register</a>
                    </div>
                @else

                    <a class="btn btn-primary" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                @endif
            @endif


        </div>
    </nav>

