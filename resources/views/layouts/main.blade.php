<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/cb44df0ebf.js"></script>
</head>
<body>
<div class="wrapper">

    <div class="news">

        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="news-container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <!-- {{ config('app.name', 'Laravel') }} -->
                    <i class="fa fa-signal" aria-hidden="true"></i>
                    Новостной сайт
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @yield('menu')
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if(Auth::User()->avatar) <img src="{{ Auth::User()->avatar }}" width="40px"
                                                           alt="avatar">  @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profileUpdate') }}"> Профиль</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main>
            <div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }} <br>

                        @if(session('id'))
                            <a href="{{ route('news.NewsOne', session('id')) }}">Перейти</a><br>
                        @endif

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            @yield('content')
        </main>
    </div>
    <footer class="footer mt-auto ">
        <div class="footer-content">
            <div class="footer-text">
                <p>
                    <i class="fa fa-copyright" aria-hidden="true"></i> Ознакомительный тестовый новостной агрегатор
                </p>
            </div>
            <div class="footer-links">
                <a href="mailto:shutovandrey@yandex.ru"><i class="fa fa-envelope-open-o info-link"
                                                           aria-hidden="true"></i></a>
                <a href="https://t.me/andrey_vs_you"><i class="fa fa-telegram info-link" aria-hidden="true"></i></a>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
