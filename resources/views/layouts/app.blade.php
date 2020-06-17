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
    <div id="cookie-law" class="notification is-warning is-light" style="z-index: 999; position: fixed; top: 10px; left: 30%;">
        <button class="delete"></button>
        Our site uses cookies. Learn more at: <a href="{{route('privacy-policy')}}">{{route('privacy-policy')}}</a>
    </div>
    <section class="hero is-fullheight is-default is-bold">
        <div class="hero-head">
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
        </div>

        <div class="hero-body">
            @yield('content')
        </div>

        <div class="hero-foot">
            <footer class="footer">
                <div class="content has-text-centered">
                    <p>
                        <strong>Url Shortener</strong> by <a href="https://github.com/on3n3o">Marcin Maciejewski</a>. The source code is licensed
                        <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                        is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.<br>
                        Code created with <i class="fa fa-heart has-text-danger"></i> in <a href="https://github.com/on3n3o/url-shortener">https://github.com/on3n3o/url-shortener</a>
                        @if(isset($time_elapsed))
                        <p class="has-text-grey-lighter">Time elapsed on DB({{$time_elapsed ?? ''}} s) on node XXXXXXXXXX</p>
                        @endif
                    </p>
                </div>
            </footer>
        </div>
    </section>
    @stack('scripts')
    <script>
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return null;
        }

        if(getCookie('seen-cookie-law')){
            var cookieBox = document.getElementById('cookie-law');
            cookieBox.style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', () => {
            (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                $notification = $delete.parentNode;
                $delete.addEventListener('click', () => {
                    setCookie('seen-cookie-law', true, 365);
                    $notification.parentNode.removeChild($notification);
                });
            });
        });
    </script>
</body>

</html>