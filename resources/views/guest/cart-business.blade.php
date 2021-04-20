@extends('admin.layout')

@section('content')

<div id="cart" class="container">
  <div v-show="cart.length > 0">
    <div v-for="product in cart">
      <hr>
      [ #@{{product.id}} | @{{product.name}} | Qt. @{{product.quantity}} | Eur. @{{product.price}} ]
      <br>
      <br>
      @{{amount()}}
      <br>
      <hr>
    </div>
  </div>
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
      </thead>
      <tbody>
        @foreach ($business->products as $product)
          <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->business_id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->ingredients }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->visible }}</td>
            <td><img src="{{ asset($product->img) }}" width="150px" height="150px"></td>
            <td>
              <button type="button" class="btn btn-primary" @click="add({{$product->id}}, '{{$product->name}}', {{$product->price}})">Add</button>
              <br><br>
              <button type="button" class="btn btn-warning" @click="quantityUp({{$product->id}}, {{$product->price}})">+</button>
              <br><br>
              <button type="button" class="btn btn-warning" @click="quantintyDown({{$product->id}}, {{$product->price}})">-</button>
              <br><br>
              <button type="button" class="btn btn-danger" @click="remove({{$product->id}})">x</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>
<script src="{{ asset('js/cart.js') }}"></script>
@endsection
