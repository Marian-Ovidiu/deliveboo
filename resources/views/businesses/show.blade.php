{{-- @dump($business); --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class='table table-hover table-dark'>
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
                <th scope="col">Category</th>
            </tr>
            <tr>
                <th scope="row">{{ $business->id }}</th>
                <td><img src="{{ asset($business->logo) }}" width="150px" height="150px"></td>
                <td><b>{{ $business->name }}</b></td>
                <td>{{ $business->description }}</td>
                <td>{{ $business->address }}</td>
                <td>{{ count($business->products) }}</td>
                <td>{{ $business->opening_time }}</td>
                <td>{{ $business->closing_time }}</td>
                <td>{{ $business->closing_day }}</td>
                <td>
                    @foreach ($business->types as $type)
                        {{ $type->name }}
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection
