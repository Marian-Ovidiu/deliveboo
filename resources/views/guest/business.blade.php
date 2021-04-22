@extends('layouts.base')
@section('title', 'Home Page')

@section('content')
    {{-- Header --}}
    <div class="header-restaurant">
        <div class="header-restaurant-row">
            <div class="col-12 header-restaurant-row-jumbotronn" style="background-image: url('{{ $business->logo }}')">
                <div class="header-restaurant-row-jumbotronn-cover row">
                    <div class="col-1 header-restaurant-row-jumbotronn-cover-space"></div>
                    {{-- Header Left --}}
                    <div class="col-5 header-restaurant-row-jumbotronn-cover-logo">
                        <div class="header-restaurant-row-jumbotronn-cover-logo-img fl">
                            <img src="{{ $business->logo }}" alt="logo" width="60" height="60">
                        </div>
                        <div class="header-restaurant-row-jumbotronn-cover-logo-box fl">
                            <div class="header-restaurant-row-jumbotronn-cover-logo-box-title">{{ $business->name }}</div>
                            {{-- @foreach ($business->types()->get() as $type)
                            <div class="header-restaurant-row-jumbotronn-cover-logo-box-types">{{ $type->name }}</div>
                            @endforeach --}}
                            <div class="header-restaurant-row-jumbotronn-cover-logo-box-types">
                                @foreach ($business->types as $id => $type)
                                    {{ $type->name }}
                                    @if ($id != (count($business->types) - 1))
                                    |
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- Header Right --}}
                    <div class="col-5 header-restaurant-row-jumbotronn-cover-info">
                        <div class="header-restaurant-row-jumbotronn-cover-info-box">
                            <div class="header-restaurant-row-jumbotronn-cover-info-box-icon"><i class="fas fa-motorcycle"></i></div>
                        </div>
                        <div class="header-restaurant-row-jumbotronn-cover-info-box-fee">
                            <div class="header-restaurant-row-jumbotronn-cover-info-box">Delivery fee: €5.00</div>
                            <div class="header-restaurant-row-jumbotronn-cover-info-box">Min Order : €10.00</div>
                        </div>
                        <div class="header-restaurant-row-jumbotronn-cover-info-box">
                            <select class="header-restaurant-row-jumbotronn-cover-info-box-select">
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
                        <div class="col-1 header-restaurant-row-jumbotronn-cover-space"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  End Header --}}

    {{-- Main --}}
    <div id="app" class="col-12 business-main">
        <div class="business-main-row row">
            <div class="col-1 business-main-row-space"></div>
            {{-- Main Menu --}}
            <div class="business-main-row-content col-5">
                <div class="business-main-row-content-row row">
                    <div class="col-12 business-main-row-content-row-products">
                        <div class="business-main-row-content-row-products-row row">
                            <div class="col-12 business-main-row-content-row-products-row-title">I nostri piatti</div>
                        </div>
                        <div class="business-main-row-content-row-products-row row">
                            @foreach ($business->products()->get() as $product)
                            <div class="col-12 business-main-row-content-row-products-row-product">
                                <div class="business-main-row-content-row-products-row-product-row row">
                                    <div class="col-9 business-main-row-content-row-products-row-product-row-name">
                                        <div class="business-main-row-content-row-products-row-product-row-name-img"  style="background-image: url({{ $product->img }});"></div>
                                        <div class="business-main-row-content-row-products-row-product-row-name-container">
                                            <span class="business-main-row-content-row-products-row-product-row-name-container-title">{{ $product->name }}</span><br>
                                            <span class="business-main-row-content-row-products-row-product-row-name-container-description">{{ $product->description }}</span>
                                        </div>
                                    </div>
                                    <div class="col-1 business-main-row-content-row-products-row-product-row-price"><strong>Prezzo</strong> <br><br> {{ $product->price }}€</div>
                                    <div class="col-2 business-main-row-content-row-products-row-product-row-options" style="text-align: center">
                                        <button type="button" class="btn btn-primary" v-on:click = "add({{$product->id}}, '{{$product->name}}', {{$product->price}})" style="width: 95%; margin-top: 20px;">Add</button><br><br>
                                        <button type="button" class="btn btn-warning" v-on:click = "quantityUp({{$product->id}}, {{$product->price}})" style="width: 45%;" >+</button>
                                        <button type="button" class="btn btn-warning" v-on:click = "quantintyDown({{$product->id}}, {{$product->price}})" style="width: 45%;">-</button><br><br>
                                        <button type="button" class="btn btn-danger" v-on:click = "remove({{$product->id}})" style="width: 95%;">Remove</button>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{--End Main Menu --}}
            {{-- Main Cart --}}
            <div class="col-5 business-main-row-container">
                <div class="business-main-row-container-row row">
                    <div class="col-1 business-main-row-container-row-space"></div>
                    <div class="col-10 business-main-row-container-row-cart">
                        <div class="row">
                            <div class="col-md-8 cart">
                                <div class="row">
                                    <div class="col-12"><strong>Shopping Cart</strong></div>
                                </div>
                                <div v-for="product in cart" class="row main align-items-center" style="display: flex;">
                                    <div class="col-5">@{{product.name}}</div>
                                    <div class="col-3" style="">X @{{product.quantity}}</div>
                                    <div class="col-4" style="background-color: ">&euro; @{{product.price}}</div>
                                </div>
                            </div>
                            <div class="col-md-4 summary">
                                <div class="row">
                                    <div class="col-12"><strong>Summary</strong></div>
                                </div>
                                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                    <div class="col">TOTAL ITEMS</div>
                                    <div class="col text-right">3 Items</div>
                                </div>
                                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                    <div class="col">TOTAL PRICE</div>
                                    <div class="col text-right">&euro; 137.00</div>
                                </div>
                                <a class="btn btn-primary" v-on:click="saveCart()" href="{{asset(route('cart-checkout', compact('business')))}}">Checkout</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 business-main-row-space"></div>
                </div>
            </div>
            {{-- End Main Cart --}}
        </div>
    </div>
    {{-- End Main --}}
@endsection
