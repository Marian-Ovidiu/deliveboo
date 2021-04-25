@extends('layouts.base')
@section('title', 'Home Page')

@section('content')
    {{-- Header --}}
    <div class="header-row row">
        <div class="offset-1"></div>
        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 header-row-jumbotronn">
            <div class="header-row-jumbotronn-container fl">
                <div class="header-row-jumbotronn-container-img" style="background-image: url('{{ $business->logo }}')"></div>
            </div>
            <div class="header-row-jumbotronn-container fl">
                <div class="header-row-jumbotronn-container-title">{{ $business->name }}</div>
                <div class="header-row-jumbotronn-container-types" style="margin-bottom: 25px;">
                    @foreach ($business->types as $id => $type)
                        {{ $type->name }}
                        @if ($id != (count($business->types) - 1))
                        |
                        @endif
                    @endforeach
                </div>
                <a href="{{ route('add-prod', [ 'id' => $business->id ]) }}">Aggiungi un nuovo piatto</a>
            </div>
        </div>
        <div class="offset-1"></div>
    </div>
    {{--  End Header --}}

    {{-- Main --}}
    <div id="app" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 main-row row">
        <div class="offset-1"></div>
        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-10 col-10 main-row-main">
            <div class="main-row-main-row row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 main-row-main-row-title">I nostri piatti</div>
            </div>
            <div class="main-row-main-row row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 main-row-main-row-products">
                @foreach ($business->products()->get() as $product)
                    <div class="main-row-main-row-products-row row">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 main-row-main-row-products-row-name">
                            <div class="main-row-main-row-products-row-name-img fl" style="background-image: url({{ $product->img }});"></div>
                            <div class="main-row-main-row-products-row-name-container fl">
                                <span class="main-row-main-row-products-row-name-container-title">{{ $product->name }}</span><br>
                                <span class="main-row-main-row-products-row-name-container-description">{{ $product->description }}</span>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 main-row-main-row-products-row-price"><strong>Prezzo</strong> <br><br> {{ $product->price }}€</div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 main-row-main-row-products-row-options" style="text-align: center">
                            <a class="main-row-main-row-products-row-options-btn btn" href="{{ route('product.edit', compact('product'))}}">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                            <form action="{{route('product.destroy', compact('product'))}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="main-row-main-row-products-row-options-btn btn" style="margin-top: 20px;color: #000138;">
                                    <i class="fas fa-meteor"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <aside class="col-3 info-restaurant">

            <div class="card">
            <section class="card-sidebar">
                <div class="card-sidebar-info"><b>Info Ristorante</b></div>
                <div class="card-sidebar-info">Indirizzo: <span>{{$business->address}}</span> </div>
                <div class="card-sidebar-info">Tel: {{$business->telephone}}</div>
                <div class="card-sidebar-info">Email: {{$business->email}} </div>
                <div class="card-sidebar-info">Apertura: {{$business->opening_time}}</div>
                <div class="card-sidebar-info">Chiusura: {{$business->closing_time}}</div>
                <div class="card-sidebar-info">Day Off: {{$business->opening_time}}</div>
                <div class="card-sidebar-info"><h6><b>Descrizione</b></h6>
                    <p class="sidebar-text">{{$business->description}}</p>
                </div>
                <div class="card-sidebar-info">
                    <b>Category</b><br>
                    @foreach ($business->types as $id=>$type)
                        {{ $type->name }}
                            @if ($id != (count($business->types) - 1))
                            |
                            @endif
                    @endforeach
                </div>
            </section>

        </aside>
        <div class="offset-1"></div>
    </div>
    {{-- End Main --}}
@endsection
