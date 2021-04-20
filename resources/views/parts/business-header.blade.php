<main class="main-restaurant">
    <div class="main-restaurant-row">
        <div class="col-12 main-restaurant-row-jumbotronn" style="background-image: url('{{ $business->logo }}')">
            <div class="main-restaurant-row-jumbotronn-cover row">
                <div class="col-1 main-restaurant-row-jumbotronn-cover-space"></div>
                <div class="col-5 main-restaurant-row-jumbotronn-cover-logo">
                    <div class="main-restaurant-row-jumbotronn-cover-logo-img fl">
                        <img src="{{ $business->logo }}" alt="logo" width="60" height="60">
                    </div>
                    <div class="main-restaurant-row-jumbotronn-cover-logo-box fl">
                        <div class="main-restaurant-row-jumbotronn-cover-logo-box-title">{{ $business->name }}</div>
                        {{-- @foreach ($business->types()->get() as $type)
                        <div class="main-restaurant-row-jumbotronn-cover-logo-box-types">{{ $type->name }}</div>
                        @endforeach --}}
                        <div class="main-restaurant-row-jumbotronn-cover-logo-box-types">
                            @foreach ($business->types as $id => $type)
                                {{ $type->name }}
                                @if ($id != (count($business->types) - 1))
                                |
                                @endif
                            @endforeach
                        </div>
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
