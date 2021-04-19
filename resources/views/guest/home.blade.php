{{-- MARIAN --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <div class="wrapper">
        @include('parts.header')


    <main class="main-home">
        <div class="row">
            <div class="col-12 row-jumbotronn">
                <div class="row-jumbotronn-row row">
                    <div class="col-12 row-jumbotronn-row-title fl">
                        Deliveboo
                    </div>
                </div>
                <div class="row-jumbotronn-row row">
                    <div class="col-12 row-jumbotronn-row-subtitle fl">
                        Delivered fresh and hot at your doorstep
                    </div>
                </div>
                <div class="row-jumbotronn-row row">
                    <div class="col-2 row-jumbotronn-row-space fl"></div>
                    <div class="col-8 row-jumbotronn-row-search fl">
                        <div class="input-group border rounded-pill p-3">
                            <div class="input-group-prepend">
                              <span class="btn form-control"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="search" placeholder="What're you searching for?" class="form-control">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-primary rounded-pill">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 row-jumbotronn-row-space fl"></div>
                </div>
                <div class="row-jumbotronn-row row">
                    <div class="col-2 row-jumbotronn-row-space fl"></div>
                    <div class="col-8 row-jumbotronn-row-types fl">
                        <div class="row-jumbotronn-row-types-row row">
                            <div class="col-3 row-jumbotronn-row-types-row-type">
                                <div class="row-jumbotronn-row-types-row-type-t"><a href="http://foodbakery.chimpgroup.com/foodstop/listings/?foodbakery_restaurant_category=breakfast"><img alt="" src="http://foodbakery.chimpgroup.com/foodstop/wp-content/uploads/top-icon-1.png"><h6 style="color:#ffffff !important;"><span>BreakFast</span></h6></a></div>
                            </div>
                            <div class="col-3 row-jumbotronn-row-types-row-type">
                                <div class="row-jumbotronn-row-types-row-type-t"><a href="http://foodbakery.chimpgroup.com/foodstop/listings/?foodbakery_restaurant_category=dinner"><img alt="" src="http://foodbakery.chimpgroup.com/foodstop/wp-content/uploads/top-icon-1-03.png"><h6 style="color:#ffffff !important;"><span>Dinner</span></h6></a></div>
                            </div>
                            <div class="col-3 row-jumbotronn-row-types-row-type">
                                <div class="row-jumbotronn-row-types-row-type-t"><a href="http://foodbakery.chimpgroup.com/foodstop/listings/?foodbakery_restaurant_category=lunch"><img alt="" src="http://foodbakery.chimpgroup.com/foodstop/wp-content/uploads/top-icon-1-02.png"><h6 style="color:#ffffff !important;"><span>Lunch</span></h6></a></div>
                            </div>
                            <div class="col-3 row-jumbotronn-row-types-row-type">
                                <div class="row-jumbotronn-row-types-row-type-t"><a href="http://foodbakery.chimpgroup.com/foodstop/listings/?foodbakery_restaurant_category=delivery"><img alt="" src="http://foodbakery.chimpgroup.com/foodstop/wp-content/uploads/top-icon-1-04.png"><h6 style="color:#ffffff !important;"><span>Delivery</span></h6></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 row-jumbotronn-row-space fl"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 row-restaurants">
                <div class="row-restaurants-row row">
                    <div class="col-12 row-restaurants-row-title">Choose From Most Popular</div>
                </div>
                <div class="row-restaurants-row row">
                    <div class="col-12 row-restaurants-row-subtitle">All the top restaurant in your city</div>
                </div>
                <div class="row-restaurants-row row">
                    <div class="col-2 row-restaurants-row-space fl"></div>
                    <div class="col-8 row-restaurants-row-cards fl">
                        <div class="row-restaurants-row-cards-row row">
                            <div class="col-4 row-restaurants-row-cards-row-card ">
                                <div class="row-restaurants-row-cards-row-card-img">
                                    <img src="http://foodbakery.chimpgroup.com/foodstop/wp-content/uploads/cover-photo03-1-359x212.jpg" alt="">
                                </div>
                                <div class="row-restaurants-row-cards-row-card-body">
                                    <div class="row-restaurants-row-cards-row-card-body-name">Natural Food</div>
                                    <div class="row-restaurants-row-cards-row-card-body-type">Type of food : Apple Juice, Carrot Juice</div>
                                    <div class="row-restaurants-row-cards-row-card-body-address"><i class="fa fa-map-marker" aria-hidden="true"></i> Italy, Legnano</div>
                                    <div class="row-restaurants-row-cards-row-card-body-stars">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="row-restaurants-row-cards-row-card-body-status">
                                        OPEN
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 row-restaurants-row-cards-row-card ">
                                <div class="row-restaurants-row-cards-row-card-img">
                                    <img src="http://foodbakery.chimpgroup.com/foodstop/wp-content/uploads/cover-photo01-1-359x212.jpg" alt="">
                                </div>
                                <div class="row-restaurants-row-cards-row-card-body">
                                    <div class="row-restaurants-row-cards-row-card-body-name">Kfc – Kentucky</div>
                                    <div class="row-restaurants-row-cards-row-card-body-type">Type of food : Hot Dogs, Pizza, Stakes</div>
                                    <div class="row-restaurants-row-cards-row-card-body-address"><i class="fa fa-map-marker" aria-hidden="true"></i> Italy, Legnano</div>
                                    <div class="row-restaurants-row-cards-row-card-body-stars">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="row-restaurants-row-cards-row-card-body-status">
                                        CLOSE
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 row-restaurants-row-cards-row-card ">
                                <div class="row-restaurants-row-cards-row-card-img">
                                    <img src="http://foodbakery.chimpgroup.com/foodstop/wp-content/uploads/cover-photo09-1-359x212.jpg" alt="">
                                </div>
                                <div class="row-restaurants-row-cards-row-card-body">
                                    <div class="row-restaurants-row-cards-row-card-body-name">McDonalds</div>
                                    <div class="row-restaurants-row-cards-row-card-body-type">Type of food : BreakFast, Delivery</div>
                                    <div class="row-restaurants-row-cards-row-card-body-address"><i class="fa fa-map-marker" aria-hidden="true"></i> Italy, Legnano</div>
                                    <div class="row-restaurants-row-cards-row-card-body-stars">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="row-restaurants-row-cards-row-card-body-status">
                                        OPEN
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 row-restaurants-row-space fl"></div>
                </div>
            </div>
        </div>
    </main>
    @include('parts.footer')
    </div>
</body>
</html>
