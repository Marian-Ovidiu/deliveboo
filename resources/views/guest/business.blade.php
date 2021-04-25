@extends('layouts.base')
@section('title', 'Home Page')

@section('content')
    {{-- Header --}}
    <div class="header-restaurant">
        <div class="header-restaurant-row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 header-restaurant-row-jumbotronn" style="background-image: url('{{ $business->logo }}')">
                <div class="header-restaurant-row-jumbotronn-cover row">
                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 header-restaurant-row-jumbotronn-cover-space"></div>
                    {{-- Header Left --}}
                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 header-restaurant-row-jumbotronn-cover-logo">
                        <div class="header-restaurant-row-jumbotronn-cover-logo-img fl" style="background-image: url('{{ $business->logo }}')"></div>
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
                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 header-restaurant-row-jumbotronn-cover-space"></div>
                </div>
            </div>
        </div>
    </div>
    {{--  End Header --}}

    {{-- Main --}}
    <div id="app" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 business-main">
        <div class="business-main-row row">
            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 business-main-row-space"></div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 business-main-row-content">
                <div class="business-main-row-content-row row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-10 business-main-row-content-row-products">
                        <div class="business-main-row-content-row-products-row row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 business-main-row-content-row-products-row-title">I nostri piatti</div>
                        </div>
                        <div class="business-main-row-content-row-products-row row">
                            @foreach ($business->products()->get() as $product)
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 business-main-row-content-row-products-row-product">
                                <div class="business-main-row-content-row-products-row-product-row row">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 business-main-row-content-row-products-row-product-row-name">
                                        <div class="business-main-row-content-row-products-row-product-row-name-img"  style="background-image: url({{ $product->img }});"></div>
                                        <div class="business-main-row-content-row-products-row-product-row-name-container">
                                            <span class="business-main-row-content-row-products-row-product-row-name-container-title">{{ $product->name }}</span><br>
                                            <span class="business-main-row-content-row-products-row-product-row-name-container-description">{{ $product->description }}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 business-main-row-content-row-products-row-product-row-price"><strong>Prezzo</strong> <br><br> {{ $product->price }}€</div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 business-main-row-content-row-products-row-product-row-options" style="text-align: center">
                                        <button type="button" class="business-main-row-content-row-products-row-product-row-options-btn" v-on:click = "add({{$product->id}}, '{{$product->name}}', {{$product->price}})">+</button><br><br>
                                        <button type="button" class="business-main-row-content-row-products-row-product-row-options-btn" v-on:click = "remove({{$product->id}}, {{$product->price}})">-</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        <aside class="col-md-3 mt-5 ml-5">
            <div class="card mb-3">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label>Coupon</label>
                            <div class="input-group">
                                <input type="text" class="form-control coupon" v-model="couponCode" name="" placeholder="Coupon code">
                                <span class="input-group-append">
                                    <div class="btn btn-primary btn-apply coupon">
                                        Applica
                                    </div>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <dl v-for="item in cart">
                            <dt>
                                @{{item.name}} x
                                @{{item.quantity}} <br>
                                @{{item.price}} €
                            </dt>
                        </dl>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <dl>
                            <span><strong>Prezzo totale:</strong></span>
                            <span class="text-right ml-3">&euro; @{{amount}}</span>
                        </dl>
                        {{-- <dl>
                            <dt><strong>Sconto:</strong></dt>
                            <dd class="text-right text-danger ml-3"></dd>
                        </dl>
                        <dl>
                            <dt><strong>Prezzo scotanto:</strong></dt>
                            <dd class="text-right text-dark ml-3"></dd>
                        </dl> --}}
                        <hr>
                        <a v-on:click="saveCart()" href="{{ asset(route('cart-checkout', compact('business')))}}" class="btn btn-out btn-primary btn-square btn-main" data-abc="true">Checkout</a>
                    </div>
                </div>
            </div>

        </aside>
    </div>
    {{-- End Main --}}
@endsection
