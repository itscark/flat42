@if (Route::has('login'))
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="main-nav-bar">
        <div class="container mx-auto nav-wrapper">
            @if(auth()->check())
                <router-link to="/home" exact class="navbar-brand navbar-brand-mobile">Flat42</router-link>
            @else
                <a class="navbar-brand navbar-brand-mobile" href="{{secure_url(route('home'))}}">Flat42</a>
            @endif
            <div class="navbar-collapse" id="navbarNav">
                @if(auth()->check() && auth()->user()->flat_id != null && auth()->user()->role == 'user')
                    <div class="navbar-nav mr-auto dektop-nav">
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

                    <div class="navbar-nav mr-auto mobile-nav">
                        <router-link to="/home" tag="div" exact class="nav-item-mobile">
                            <a class="nav-link-mobile"><i class="fas fa-home nav-link-mobile"></i></a>
                        </router-link>
                        <router-link to="/shopping" tag="div" class="nav-item-mobile">
                            <a class="nav-link-mobile"><i class="fas fa-shopping-cart nav-link-mobile"></i></a>
                        </router-link>
                        <router-link to="/events" tag="div" class="nav-item-mobile">
                            <a class="nav-link-mobile"><i class="far fa-calendar-alt nav-link-mobile"></i></a>
                        </router-link>
                        <router-link to="/cleaning" tag="div" class="nav-item-mobile">
                            <a class="nav-link-mobile"><i class="fas fa-broom nav-link-mobile"></i></a>
                        </router-link>

                        <div class="nav-item-mobile" id="mobile-menu-icon">
                            <a class="nav-link-mobile" @click="toggle = !toggle"><i
                                        class="fas fa-bars nav-link-mobile"></i></a>
                        </div>
                        @if(auth()->check())
                            <div class="mobile-menu-slider">
                                <transition name="slide">
                                    <div v-if="toggle">
                                        <div class="nav-item-mobile toggle-nav">
                                            <a class="mobile-button nav-link-mobile"
                                               href="{{ secure_url(route('logout')) }}"
                                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt nav-link-mobile"></i>
                                            </a>
                                        </div>
                                        @if(auth()->check() && auth()->user()->flat_id != null && auth()->user()->role == 'user')
                                            <div class="nav-item-mobile toggle-nav">
                                                <a class="mobile-button nav-link-mobile" id="show-modal"
                                                   @click="showModal = true">
                                                    <i class="fas fa-info nav-link-mobile"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </transition>
                            </div>

                        @endif
                    </div>

                @endif
                @if(!auth()->check())
                    <div class="my-2 my-lg-0 ml-auto">
                        <a class="btn btn-primary" href="{{ secure_url(route('login')) }}"> <i
                                    class="fas fa-sign-in-alt"></i>
                            Login</a>
                        <a class="btn btn-primary" href="{{secure_url(route('register')) }}"><i
                                    class="fas fa-user-plus"></i>
                            Register</a>
                    </div>
                @else
                    <div class="nav-buttons">
                        @if(auth()->check() && auth()->user()->flat_id != null && auth()->user()->role == 'user')
                            <button class="btn btn-primary ml-2 m-margin dektop-button" id="show-modal"
                                    @click="showModal = true"><i
                                        class="fas fa-info"></i> WG Info
                            </button>
                        @endif

                        <a class="btn btn-primary ml-auto m-margin dektop-button"
                           href="{{ secure_url(route('logout')) }}"
                           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ secure_url(route('logout')) }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </nav>
@endif

