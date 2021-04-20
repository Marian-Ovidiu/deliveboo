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
    <title>RIstoranti</title>
</head>
<body>
    <div class="wrapper">
        @include('parts.header')

        <main class="main-restaurant">
            <div class="main-restaurant-row">
                <div class="col-12 main-restaurant-row-jumbotronn" style="background-image: url('https://wallpaperaccess.com/full/1306153.jpg')">
                    <div class="main-restaurant-row-jumbotronn-cover row">
                        <div class="col-1 main-restaurant-row-jumbotronn-cover-space"></div>
                        <div class="col-5 main-restaurant-row-jumbotronn-cover-logo">
                            <div class="main-restaurant-row-jumbotronn-cover-logo-img fl">
                                <img src="http://foodbakery.chimpgroup.com/foodstop/wp-content/uploads/kfc-1.png" alt="logo">
                            </div>
                            <div class="main-restaurant-row-jumbotronn-cover-logo-box fl">
                                <div class="main-restaurant-row-jumbotronn-cover-logo-box-title">Kfc – Kentucky</div>
                                <div class="main-restaurant-row-jumbotronn-cover-logo-box-types">Hot Dogs, Pizza & Stakes</div>
                            </div>
                        </div>
                        <div class="col-5 main-restaurant-row-jumbotronn-cover-info">
                            <div class="main-restaurant-row-jumbotronn-cover-info-box fl">
                                <div class="main-restaurant-row-jumbotronn-cover-info-box-icon"><i class="fas fa-motorcycle"></i></div>
                            </div>
                            <div class="main-restaurant-row-jumbotronn-cover-info-box ">
                                <div class="main-restaurant-row-jumbotronn-cover-info-box-fee">Delivery fee: €5.00</div>
                                <div class="main-restaurant-row-jumbotronn-cover-info-box-minOrder">Min Order : €10.00</div>
                            </div>
                            <div class="main-restaurant-row-jumbotronn-cover-info-box">
                                <select class="main-restaurant-row-jumbotronn-cover-info-box-select">
                                    <option value="">Today : 09:00 am - 09:30 pm</option>
                                    <option value="">Monday:09:00 am - 09:30 pm</option>
                                    <option value="">Tuesday:09:00 am - 09:45 pm</option>
                                    <option value="">Wednesday:09:00 am - 04:15 pm</option>
                                    <option value="">Thursday:09:00 am - 07:45 pm</option>
                                    <option value="">Friday:06:00 am - 11:00 pm</option>
                                    <option value="">Saturday:09:00 am - 04:00 pm</option>
                                    <option value="">Sunday:12:00 am - 12:00 am</option>
                                </select>
                            </div>

                        <div class="col-1 main-restaurant-row-jumbotronn-cover-space"></div>
                    </div>
                </div>
            </div>
            <div class="main-restaurant-row">

            </div>
        <main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-dropdownhover.min.js"></script>
</body>
</html>
