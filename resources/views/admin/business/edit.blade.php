@extends('layouts.base')
@section('title', 'Modifica ristorante')

@section('content')
  <div class="container">

    @include('admin.business.part.form', [ 'edit' => true ])

  </div>
@endsection
