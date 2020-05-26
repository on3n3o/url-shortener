<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/additional.css') }}" rel="stylesheet">
</head>

<body>
    <section class="hero is-fullheight is-default is-bold">
        <div class="hero-head">
            <!-- <nav class="navbar">
                <div class="container is-vcentered has-text-info">
                    <small>Our site uses cookies. Check <a>here</a> how it works.</small>
                </div>
            </nav> -->
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="../">
                            <img src="/img/logo.png" alt="{{ config('app.name', 'Laravel') }}" alt="Logo">
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
                                    <li @if(isset($selected) && $selected=='dashboard' ) class="is-active" @endif ><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                                    @endauth
                                    <li @if(isset($selected) && $selected=='features' ) class="is-active" @endif ><a href="{{ route('features') }}">{{ __('Features') }}</a></li>
                                    @guest
                                    <li @if(isset($selected) && $selected=='login' ) class="is-active" @endif ><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                    <li @if(isset($selected) && $selected=='register' ) class="is-active" @endif ><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
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
        </div>

        <div class="hero-body">
            <div class="container">
                @yield('content')
            </div>
        </div>

        <div class="hero-foot">
            <footer class="footer">
                <div class="content has-text-centered">
                    <p>
                        <strong>Url Shortener</strong> by <a href="https://github.com/on3n3o">Marcin Maciejewski</a>. The source code is licensed
                        <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                        is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.<br>
                        Code created with <i class="fa fa-heart has-text-danger"></i> in <a href="https://github.com/on3n3o/url-shortener">https://github.com/on3n3o/url-shortener</a>
                    </p>
                </div>
            </footer>
        </div>
    </section>
    @stack('scripts')
</body>

</html>