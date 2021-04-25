@extends('layouts.base')

@section('content')
  <div class="container">

    @include('admin.business.product.part.form', [ 'edit' => true ])

  </div>
@endsection
