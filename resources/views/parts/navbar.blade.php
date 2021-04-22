    <div class="navbar">
        <nav class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row-content">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-1 col-sm-1 col-0"></div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7 col-8 links">
                        <span>Contacts</span>
                        <span>Restaurants</span>
                        <span>Pages</span>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-4 col-4">
                        @if (Route::has('login'))
                        <div class="top-right">
                            @auth
                                <a href="{{ url('/') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                         @endif
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-1 col-sm-0 col-0"></div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row-menu">
                <div class="bars">
                    <a href="#"><i class="fas fa-bars"></i></a>
                </div>
                <div class="hamburger-menu col-12">
                    <ul>
                        @if (Route::has('login'))
                        <li>
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </li>
                    @endif
                        <li><a>Contacts</a></li>
                        <li><a href="/business">Restaurants</a></li>
                        <li><a>Pages</a></li>
                    </ul>
                    <a href="#" class="close">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
