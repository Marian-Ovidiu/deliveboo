<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- vuejs --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    {{-- style --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- javascript --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Deliveboo - @yield('title')</title>
</head>
<body>

    <div class="wrapper">

        @yield('content')
        @include('parts.footer')

    </div>


</body>
</html>
