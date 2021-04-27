@php
if ($edit) {
  $method = 'PUT';
  $url = route('product.update', compact('product'));
  $submit = 'Modifica';
} else {
  $method = 'POST';
  $url = route('product.store');
  $submit = 'Crea';
}
@endphp


@section('content')

<section class="form-section">

    {{-- Form --}}
    <form action="{{ $url }}" method="post" enctype="multipart/form-data" class="row">
    @csrf
    @method( $method )

    {{-- Form Header --}}
    <div class="form-section-header col-12">
        <div class="content">
            <div class="form-section-header-data">
            <div class="titles">
                Aggiungi piatto
            </div>
            </div>
            <div class="form-section-header-img">
            <img src="{{asset ('img/00-business.jpg')}}" alt="Deliveroo">
            </div>
        </div>
    </div>

     {{-- row: name --}}
    <div class="col-10 mx-auto">
        <div class="form-group">
            <label for="name"><b>Nome Piatto</b></label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="title" name="name"
            value="{{ isset($product) ? $product->name : '' }}">
            <div class="invalid-feedback">
            {{ $errors->first('name') }}
            </div>
        </div>
    </div>
    {{-- / row: name --}}

    {{-- / row: ingredients --}}
    <div class="col-10 mx-auto">
        <div class="form-group">
            <label for="ingredients"><b>Ingredienti</b></label>
            <input type="text" class="form-control {{ $errors->has('ingredients') ? 'is-invalid' : '' }}" id="ingredients" name="ingredients"
            value="{{ isset($product) ? $product->ingredients : '' }}">
            <div class="invalid-feedback">
            {{ $errors->first('ingredients') }}
            </div>
        </div>
    </div>
    {{-- / row: ingredients --}}

    {{-- / row: description --}}
    <div class="col-10 mx-auto">
        <label for="description"><b>Descrizione</b></label>
        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" rows="6">@if (isset($product)){{ $product->description }}@endif</textarea>
        <div class="invalid-feedback">
        {{ $errors->first('description') }}
        </div>
    </div>
    {{-- / row: description --}}

    <div class="row no-gutters" style="width: 100%; text-align:center">

    <div class="offset-1"></div>

    {{-- / row: price --}}
    <div class="col-4" style="padding:0 15px;">
        <label for="price"><b>Prezzo</b></label>
        <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price"
        value="{{ isset($product) ? $product->price : '' }}">
        <div class="invalid-feedback">
        {{ $errors->first('price') }}
        </div>
    </div>
    {{-- / row: price --}}

    {{-- row: image --}}
    <div class="col-4" style="padding:0 15px;">
        <label for="img"><b>Immagine</b></label>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="file" class="form-control {{ $errors->has('img') ? 'is-invalid' : '' }}"  id="img" name="img" accept="image/*">
        @if (isset($product))
        <small>[ {{ substr($product->img, 10) }} ]</small>
        @endif
        <div class="invalid-feedback">
        {{ $errors->first('img') }}
        </div>
    </div>
    {{-- / row: image --}}

    {{-- row: visible --}}
    <div class="col-2" style="padding: 35px 15px 0 15px">
        <label for="visible"><b>Disponibile</b></label>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" id="visible" name="visible" value="1" @if(isset($product) && $product->visible == 1) checked @endif>
    </div>
    {{-- row: visible --}}
    <div class="offset-1"></div>
    </div>



    @if (!isset($product))
        <input type="hidden" name="business_id" id="business_id" value="{{ $business_id }}">
    @endif

    <div class="offset-1"></div>

    <button type="submit" class="btn btn-primary" style="margin-top: 20px;">{{$submit}} prodotto</button>

    </form>

@endsection
