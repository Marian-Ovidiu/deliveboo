<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Deliveboo</title>

      <!-- Scripts -->
      <script src="https://cdn.jsdelivr.net/npm/vue"></script>
      <script src="{{ asset('js/app.js') }}" defer></script>

      <!-- Styles -->
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body>
      {{-- Header --}}
    <header class="top-header">

        {{-- head-logo --}}
        <div class="top-header-logo">
          <img src="{{ asset('img/00-logo.gif') }}" alt="Deliveboo">
        </div>
        {{-- / head-logo --}}

        {{-- head-menu-SM --}}
        <nav class="top-header-menu sm">
          <i @click="viewHambMenu()" class="fas fa-bars" v-if="!hambMenu"></i>
          <ul class="top-header-menu-sm" v-if="hambMenu">
            <li>
              <i @click="viewHambMenu()" class="fas fa-times"></i>
            </li>
            <li><a href="{{ route('public-home') }}"><span>Home</span></a></li>
            @auth
              <li><a href="{{ route('dashboard') }}">Area ristoratore &nbsp; <small>[{{ Auth::user()->name }}]</small></a></li>
            @else
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Registrati</a></li>
            @endauth
          </ul>
        </nav>
        {{-- / head-menu-SM --}}

        {{-- head-menu-LG --}}
        <nav class="top-header-menu lg">
          <ul class="top-header-menu-lg">
            <li><a href="{{ route('public-home') }}"><span>Home</span></a></li>
            @auth
              <li><a href="{{ route('dashboard') }}">Area ristoratore &nbsp;{{ ucwords(Auth::user()->name) }}</a></li>
              <li>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            @else
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Registrati</a></li>
            @endauth
          </ul>
        </nav>
        {{-- / head-menu-LG --}}
      </header>
      {{-- / Header --}}

    <div class="wrapper">
      @yield('content')
    </div>
  </body>

</html>
