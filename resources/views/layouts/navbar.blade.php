<nav class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <img src="/img/logo.png" alt="{{ config('app.name', 'github.com/on3n3o/url-shortener') }}" alt="Logo">
                <h3 class="title is-3">{{ \Str::upper(config('app.name', 'github.com/on3n3o/url-shortener')) }}</h3>
            </a>
            <span class="navbar-burger burger" data-target="navbarMenu">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
        <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-end">
                <div class="tabs is-right">
                    <ul>
                        <li @if(!isset($selected)) class="is-active" @endif><a href="/">{{ __('Home') }}</a></li>
                        @auth
                        <li @if(isset($selected) && $selected=='dashboard' ) class="is-active" @endif><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                        @endauth
                        <li @if(isset($selected) && $selected=='features' ) class="is-active" @endif><a href="{{ route('features') }}">{{ __('Features') }}</a></li>
                        @guest
                        <li @if(isset($selected) && $selected=='login' ) class="is-active" @endif><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li @if(isset($selected) && $selected=='register' ) class="is-active" @endif><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(el => {
                el.addEventListener('click', () => {

                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>