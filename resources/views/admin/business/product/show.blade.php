@extends('admin.layout')

@section('content')

  <div class="dashboard container">

    {{-- Business Dashboar Header --}}
    <div class="card mb-3">
      <img src="{{asset($business->logo)}}" class="card-img-top" height="350">
      <div class="card-body">
        <h5 class="card-title">{{$business->name}}</h5>
        <hr>
        <h6>
          [ @foreach ($business->types as $id=>$type)
            {{ $type->name }}
            @if ($id != (count($business->types) - 1))
              |
            @endif
          @endforeach ]
        </h6>
      </div>
    </div>
    {{-- / Business Dashboar Header --}}

    <div class="dashboard-business-nav">

      {{-- Business Dashboar Side-data-bar --}}
      <div class="card" style="width: 18rem;">
        <img src="{{asset($business->logo)}}" class="card-img-top" alt="...">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{$business->address}}</li>
          <li class="list-group-item">Tel: </li>
          <li class="list-group-item">Email: </li>
          <li class="list-group-item">Apertura: {{$business->opening_time}}</li>
          <li class="list-group-item">Chiusura: {{$business->closing_time}}</li>
          <li class="list-group-item">Day Off: {{$business->opening_time}}</li>
        </ul>
        <div class="card-body">
          <h5 class="card-title">Descrizione:</h5>
          <p class="card-text">{{$business->description}}</p>
        </div>
        <div class="card-body">
          <a href="{{route('business.edit', compact('business'))}}" class="btn btn-secondary btn-sm">Modifica dati</a>
        </div>
      </div>
      {{-- / Business Dashboar Side-data-br --}}

      {{-- Business Dashboar Orders --}}
      <div>
        <big><b>Prodotti:</b></big>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{route('product.createss', ['business_id' => $business->id])}}" class="btn btn-primary btn-md">Aggiungi prodotto</a>
        <br>
        <br>
        @foreach ($business->products as $product)
          <div class="card" style="width: 18rem;">
            <img src="{{$product->img}}" class="card-img-top" alt="{{$product->name}}">
            <div class="card-body">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text">{{$product->description}}</p>
              <a href="#" class="btn btn-info">Modifica</a>
              <a href="#" class="btn btn-danger">Cancella</a>
            </div>
          </div>
        @endforeach
      </div>
      {{-- / Business Dashboar Orders --}}

    </div>


  @endsection
