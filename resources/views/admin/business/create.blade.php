@extends('layouts.base')

@section('content')
  <div class="container">

    @include('admin.business.part.form', [ 'edit' => false ])

  </div>
@endsection
