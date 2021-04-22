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
    <div class="wrapper">
      @yield('content')
    </div>
  </body>

</html>
