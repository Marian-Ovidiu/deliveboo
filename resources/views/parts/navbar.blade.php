    <header>
        <nav class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <span>Contacts</span>
                        <span>Restaurants</span>
                        <span>Pages</span>
                    </div>
                    <div class="col-4">
                        @if (Route::has('login'))
                        <div class="top-right links">
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
                    <div class="col-2"></div>
                </div>
            </div>
        </nav>
    </header>
