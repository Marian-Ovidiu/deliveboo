
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- Vuejs --}}
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
  {{-- Style --}}
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  {{-- Script --}}
  <script src="{{ asset('js/app.js') }}" defer></script>
  <title>Deliveboo - @yield('title')</title>
</head>
<body>
  {{-- WRAPPER CONTAINER --}}
  <div class="wrapper">

    {{-- Header --}}
    <header class="top-header">
      {{-- head-logo --}}
      <div class="top-header-logo">
        <img src="{{ asset('img/00-logo.jpg') }}" alt="Deliveboo">
      </div>
      {{-- / head-logo --}}
      {{-- head-menu-LG --}}
      <nav class="top-header-menu">
        <ul>
          <li><a href="{{ route('public-home') }}"><span>Home</span></a></li>
          @auth
            <li><a href="{{ route('dashboard') }}">Area ristoratore [{{ Auth::user()->name }}]</a></li>
          @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Registrati</a></li>
          @endauth
        </ul>
      </nav>
      {{-- / head-menu-LG --}}
    </header>
    {{-- / Header --}}
    @yield('content')
    @include('parts.footer')

  </div>
  {{-- / WRAPPER CONTAINER --}}


</body>
</html>
