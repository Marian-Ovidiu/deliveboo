@extends('layouts.app')

@section('title', 'index Products')

@section('content')

<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Logo</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Indirizzo</th>
        <th scope="col">Prodotti</th>
        <th scope="col">Apertura</th>
        <th scope="col">Chiusura</th>
        <th scope="col">Day_off</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($businesses as $business)
            <tr>
                <th scope="row">{{$business->id}}</th>
                <td><img src="{{asset($business->logo)}}" width="150px" height="150px"></td>
                <td><b>{{$business->name}}</b></td>
                <td>{{$business->description}}</td>
                <td>{{$business->address}}</td>
                <td>{{count($business->products)}}</td>
                <td>{{$business->opening_time}}</td>
                <td>{{$business->closing_time}}</td>
                <td>{{$business->closing_day}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
