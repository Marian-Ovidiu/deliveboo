    <header>
        <nav class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0"></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-10 links">
                        <span>Contacts</span>
                        <span>Restaurants</span>
                        <span>Pages</span>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-2">
                        @if (Route::has('login'))
                        <div class="top-right">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                         @endif
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0"></div>
                </div>
            </div>
        </nav>
    </header>
