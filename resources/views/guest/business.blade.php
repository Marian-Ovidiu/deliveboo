<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    {{-- font awesome --}}
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/> --}}
    {{-- vuejs --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script> --}}
    {{-- style --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{ config('app.name', 'Deliveboo') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <title>Ristoranti</title>
</head>
<body>
    <div class="wrapper">
        @include('parts.navbar')
        @include('parts.business-header')
        @include('parts.cart')
    </div>

</body>
</html>
