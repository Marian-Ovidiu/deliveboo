<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- CSRF Token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Vuejs --}}
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

  {{-- Style --}}
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  {{-- Script --}}
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <title>Deliveboo - @yield('title')</title>

  <link rel="icon" href="img/00-fav.png">
</head>

<body>

  {{-- WRAPPER CONTAINER --}}
  <div id="app" class="wrapper">

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

    {{-- Main content --}}
    <main>
      @yield('content')
    </main>
    {{-- / Main content --}}

    {{-- Footer --}}
    <footer class="bottom-footer">
      <div class="bottom-footer-columns content">
        <ul>
          <li class="bottom-footer-columns-title">
            Città popolari
          </li>
          <li>Roma</li>
          <li>Torino</li>
          <li>Milano</li>
          <li>Napoli</li>
          <li>Firenze</li>
          <li>Venezia</li>
          <li>Rimini</li>
        </ul>
        <ul>
          <li class="bottom-footer-columns-title">
            About
          </li>
          <li>Faq</li>
          <li>Termini & condizioni</li>
          <li>Lavora con noi</li>
          <li>Contatti</li>
        </ul>
        <ul>
          <li class="bottom-footer-columns-title">
            deliveboo
          </li>
          <li>Sede Operativa</li>
          <li>Via Carducci 12 20123 Milano</li>
          <li>02 40031288</li>
        </ul>
        <ul class="logo">
          <li>
            <img src="{{asset('img/01-logo.png')}}" alt="Deliveboo">
            <br />
            <br />
          </li>
          <li>
            Copyright (c) 2021
            <br />
          </li>
          <li>
            <small>Boolean [ #Classe25 | Team 5 ]</small>
          </li>
        </ul>
    </footer>
    {{-- / Footer --}}

  </div>
  {{-- / WRAPPER CONTAINER --}}


</body>
</html>
