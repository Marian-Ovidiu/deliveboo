@extends('admin.layout')

@section('content')
  <div class="container">

    @include('admin.business.part.form', [ 'edit' => true ])

  </div>
@endsection
