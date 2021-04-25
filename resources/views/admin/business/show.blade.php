@extends('layouts.base')
@section('title', 'Home Page')

@section('content')
    {{-- Header --}}
    <div class="header">
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
                            <div class="header-restaurant-row-jumbotronn-cover-logo-box-adding">
                                <a href="{{ route('add-prod', [ 'id' => $business->id ]) }}" class="btn btn-sm"><div class="header-restaurant-row-jumbotronn-cover-logo-box-adding-create">Aggiungi Piatto</div></a>
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

                    <div class="card">
                    <section class="create-contain-row-sidebar" style="display:block">
                        <div class="create-contain-row-sidebar-info">Indirizzo: <span>{{$business->address}}</span> </div>
                        <div class="create-contain-row-sidebar-info">Tel: {{$business->telephone}}</div>
                        <div class="create-contain-row-sidebar-info">Email: {{$business->email}} </div>
                        <div class="create-contain-row-sidebar-info">Apertura: {{$business->opening_time}}</div>
                        <div class="create-contain-row-sidebar-info">Chiusura: {{$business->closing_time}}</div>
                        <div class="create-contain-row-sidebar-info">Day Off: {{$business->opening_time}}</div>
                        <div class="create-contain-row-sidebar-description"><h5><b>Descrizione:</b> </h5>
                            <p class="sidebar-text">{{$business->description}}</p>
                        </div>
                        <div class="create-contain-row-sidebar-info">
                            Category:
                            @foreach ($business->types as $id=>$type)
                                {{ $type->name }}
                                    @if ($id != (count($business->types) - 1))
                                    |
                                    @endif
                            @endforeach
                        </div>
                    </section>

            </aside>
        </div>
    </div>
    {{-- End Main --}}
@endsection
