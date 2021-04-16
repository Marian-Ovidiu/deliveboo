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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <div class="container d-flex justify-content-between align-items-center">
                    <a class="navbar-brand d-flex" href="#"><img class=""src="img/deliveroo-logo.png" alt="deliveroo_logo"></a>
                    <input class="form-control me-2 nav-form" type="search" placeholder="Cerca il ristorante..." aria-label="Search">
                    <div class="nav_btn">
                        <ul>
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                <div class="hamburger">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid menu d-flex justify-content-center d-none">
        <ul class="list-unstyled text-center">
            <li><input class="form-control me-2 menu-form" type="search" placeholder="Cerca il ristorante..." aria-label="Search"></li>
            <li><a href="#"><i class="fas fa-sign-in-alt"></i> &#32; Sign in</a></li>
            <li><a href="#"><i class="fas fa-user"></i> &#32; Login</a></li>
        </ul>
    </div>
</header>
</body>
</html>
