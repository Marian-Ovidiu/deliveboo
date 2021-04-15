@extends('layouts.app')

@section('title', 'index Products')

@section('content')

<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Business ID</th>
        <th scope="col">Name</th>
        <th scope="col">Ingredients</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Visible</th>
        <th scope="col">Img</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->business_id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->ingredients}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->visible}}</td>
                <td><img src="{{asset($product->img)}}" width="150px" height="150px"></td>

            </tr>
        @endforeach
    </tbody>
</table>



@endsection
