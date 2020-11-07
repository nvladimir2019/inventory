<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') Inventory</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('style')
    @yield('javaScript')
</head>
<body>
    <header>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('main') }}">INVENTORY</a>

                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#links" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#account" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @auth
                <div class="collapse navbar-collapse" id="links">
                    <div class="navbar-nav">
                        <a class="nav-link" href="{{ route('workplaces') }}">Рабочие места</a>
                        <a class="nav-link" href="{{ route('inventory') }}">Инвентарь</a>
                        <a class="nav-link" href="{{ route('employees') }}">Сотрудники</a>
                        <a class="nav-link" href="{{ route('directory') }}">Справочники</a>
                    </div>
                </div>
                @endauth

                <div class="collapse navbar-collapse" id="account">
                    <div class="navbar-nav ml-auto">
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">Авторизация</a>
{{--                            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>--}}
                        @endguest
                        @auth
                            <a class="nav-link" href="#">{{ Auth::user()->username }}</a>
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Выход</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endauth
                    </div>
                </div>

            </div>
        </nav>







        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('main') }}">INVENTORY</a>
            <div class="nav navbar-nav navbar-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('workplaces') }}">Рабочие места</a>
                    <a class="nav-link" href="{{ route('inventory') }}">Инвентарь</a>
                    <a class="nav-link" href="{{ route('directory') }}">Справочники</a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="account">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Log in</a></li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    @yield('main')
</body>
</html>
