<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
    <script src="{{asset('js/app.js')}}"></script>

        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>

    <header>
        <div class="container">
            <h1>Deliveboo</h1>
        </div>
    </header>

    <div class="container">
        @yield('content')

    </div>

</body>
</html>
