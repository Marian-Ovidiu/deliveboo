@extends('deliveboo-layouts.deliveboo')
@section('content')


<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Fluid jumbotron</h1>
      <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
</div>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @foreach ( $types as $type )
                <a href="#" class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ $type->img }}" alt="{{ $type->name }}">
                        <div class="card-body">
                            <p class="card-text">{{ $type->name }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <!--
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                                -->
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @foreach ( $businesses as $business )
                <a href="#" class="col-md-4">
                    <div class="card mb-4 box-shadow" style="min-height: 400px">
                        <img class="card-img-top" src="{{ $business->logo }}" style="height: 200px" alt="{{ $business->name }}">
                        <div class="card-body">
                            <h4 class="card-text">{{ $business->name }}</h4>
                            <p class="card-text">{{ $business->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <!--
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                                -->
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>


@endsection
