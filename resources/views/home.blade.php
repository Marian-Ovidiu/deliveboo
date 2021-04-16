@extends('deliveboo-layouts.deliveboo')
@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Fluid jumbotron</h1>
      <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
</div>

<section class="pt-5 pb-5">
    <div class="container">
      <div class="row">
          <div class="col-12">
              <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                      <div class="carousel-item active">
                          <div class="row">
                                @foreach ($types as $type)
                                    <div class="col-lg-3 col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="{{ $type->name }}" src="{{ $type->img }}">
                                            <div class="card-body">
                                                <h4 class="card-title">{{ $type->name }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                          </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
