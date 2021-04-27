@extends('layouts.base')
@section('title', 'Crea ristorante')

@section('content')
  <div class="container">

    @include('admin.business.part.form', [ 'edit' => false ])

  </div>
@endsection
