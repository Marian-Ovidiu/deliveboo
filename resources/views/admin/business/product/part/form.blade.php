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

@extends('layouts.base')


@section('content')

<section class="form-section">
       {{-- Form Header --}}
       <div class="form-section-header">
        <div class="content">
            <div class="form-section-header-data">
            <div class="titles">
                Utente ristoratore
            </div>
            <div class="subtitles">
                {{$submit}} prodotto
            </div>
            </div>
            <div class="form-section-header-img">
            <img src="{{asset ('img/00-product.jpg')}}" alt="Deliveroo">
            </div>
        </div>
    </div>

    <div class = "container">

        {{-- Form --}}
        <form class="row" action="{{ $url }}" method="post" enctype="multipart/form-data">
        @csrf
        @method( $method )

            {{-- row: name --}}
            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nome Piatto</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="title" name="name"
                    value="{{ isset($product) ? $product->name : '' }}">
                    <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                    </div>
                </div>
            </div>
            {{-- / row: name --}}

            {{-- / row: ingredients --}}
            <div class="col-12">
                <div class="form-group">
                    <label for="ingredients">Ingredienti</label>
                    <textarea class="form-control {{ $errors->has('ingredients') ? 'is-invalid' : '' }}" id="ingredients" name="ingredients" rows="6">@if (isset($product)){{ $product->ingredients }}@endif</textarea>
                    <div class="invalid-feedback">
                    {{ $errors->first('ingredients') }}
                    </div>
                </div>
            </div>
            {{-- / row: ingredients --}}

            {{-- / row: description --}}
            <div class="col-12">
                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" rows="6">@if (isset($product)){{ $product->description }}@endif</textarea>
                    <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                    </div>
                </div>
            </div>
            {{-- / row: description --}}

            {{-- / row: price --}}
            <div class="col-12">
                <div class="form-group">
                    <label for="price">Prezzo</label>
                    <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price"
                    value="{{ isset($product) ? $product->price : '' }}">
                    <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                    </div>
                </div>
            </div>
            {{-- / row: price --}}

            {{-- row: image --}}
            <div class="col-12">
                <div class="form-group">
                    <label for="img">
                        <b>Immagine</b>
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="file" class="form-control {{ $errors->has('img') ? 'is-invalid' : '' }}"  id="img" name="img" accept="image/*">
                        @if (isset($product))
                            <small> File caricato in precedenza: <br> {{ substr($product->img, 12) }}</small>
                        @endif
                    <div class="invalid-feedback">
                        {{ $errors->first('img') }}
                    </div>
                </div>
            </div>
            {{-- / row: image --}}

            {{-- row: visible --}}
            <div class="col-12">
                <div class="form-group">
                    <label for="visible">Disponibile</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="visible" name="visible" value="1"
                    @if (isset($product) && $product->visible == 1)
                        checked
                    @endif>
                </div>
            </div>
            {{-- row: visible --}}

            @if (!isset($product))
                <input type="hidden" name="business_id" id="business_id" value="{{ $business_id }}">
            @endif

            <div class="col-12">
                <button type="submit" class="btn btn-primary">{{$submit}} prodotto</button>
            </div>
        </form>
    </div>
</section>
@endsection
