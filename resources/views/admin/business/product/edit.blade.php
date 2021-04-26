@extends('layouts.base')
@section('title', 'Modifica piatto')

@section('content')
  <div class="container">

    @include('admin.business.product.part.form', [ 'edit' => true ])

  </div>
@endsection
