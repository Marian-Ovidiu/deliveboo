@extends('admin.layout')

@section('content')

<div class="wrapper">
    <header class="header-show">
        <div class="header-show-row">
             <div class=" header-show-row-jumbotronn row " style="background-image: url('{{asset($business->logo)}}')">
                <div class=" col-6 header-show-row-jumbotronn-cover">
                    <h1>{{$business->name}}</h1>
                </div>
                <div class="col-1 header-show-row-jumbotronn-cover-space"></div>
            </div>
        </div>
    </header>
    <div class="row">
    <div class="col-1 space"></div>
    <div class="col-2 title">
        <h2><b>{{$business->name}}</b> <a href="{{ route('business.edit', compact('business')) }}" class="btn btn-md"><i class="fa fa-edit" aria-hidden="true"></i></a></h2>
    </div>
    <div class="col-7 title">
        <h2><b>Prodotti  </b><a href="{{ route('add-prod', [ 'id' => $business->id ]) }}" class="btn btn-md"><i class="fa fa-plus-square" aria-hidden="true"></i></a></h2>

    </div>
    <div class="col-2 space"></div>
    </div>
    <div class="container-fluid">
        <main class="create ">
            <div class="col-1 create-space"></div>
            <div class="create-contain">
                <div class="create-contain-row row">
                        <section class="col-2 create-contain-row-sidebar">
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



                        <section class="col-8 create-contain-product">
                            <div class="create-contain-product-row row">
                                    @foreach ($business->products as $product)
                                    <div class="col-3 create-contain-product-row-item">
                                        <div class="create-contain-product-row-item-content">
                                             <div class="create-contain-product-row-item-img" style="background-image: url('{{asset($product->img)}}')" alt="{{$product->name}}"></div>
                                                <h5><b>{{$product->name}}</b></h5>
                                                <p class="create-contain-product-row-item-content-description"><b>{{$product->description}}</b></p>
                                                <p><b>Eur. {{$product->price}}</b></p>
                                                <a href="{{ route('product.edit', compact('product')) }}" class="btn btn-md"><i class="fa fa-edit" aria-hidden="true"></i></a>

                                                <button type="button" class="btn btn-md" data-toggle="modal" data-target="#delete{{$product->id}}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                @include('admin.business.part.modal')
                                         </div>
                                    </div>
                                    @endforeach
                                </div>
                        </section>
                    </div>
                </div>
            </div>

                <div class="col-2 create-space ""></div>
        </main>
    </div>
</div>






































@endsection

