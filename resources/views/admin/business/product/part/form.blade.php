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

{{-- Form --}}
<form action="{{ $url }}" method="post" enctype="multipart/form-data">
  @csrf
  @method( $method )

  {{-- row: name --}}
  <div class="form-group">
    <label for="name">Nome Piatto</label>
    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="title" name="name"
    value="{{ isset($product) ? $product->name : '' }}">
    <div class="invalid-feedback">
      {{ $errors->first('name') }}
    </div>
  </div>
  {{-- / row: name --}}

  {{-- / row: ingredients --}}
  <div class="form-group">
    <label for="ingredients">Ingredienti</label>
    <input type="text" class="form-control {{ $errors->has('ingredients') ? 'is-invalid' : '' }}" id="ingredients" name="ingredients"
    value="{{ isset($product) ? $product->ingredients : '' }}">
    <div class="invalid-feedback">
      {{ $errors->first('ingredients') }}
    </div>
  </div>
  {{-- / row: ingredients --}}

  {{-- / row: description --}}
  <div class="form-group">
    <label for="description">Descrizione</label>
    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" rows="6">@if (isset($product)){{ $product->description }}@endif</textarea>
    <div class="invalid-feedback">
      {{ $errors->first('description') }}
    </div>
  </div>
  {{-- / row: description --}}

  {{-- / row: price --}}
  <div class="form-group">
    <label for="price">Prezzo</label>
    <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price"
    value="{{ isset($product) ? $product->price : '' }}">
    <div class="invalid-feedback">
      {{ $errors->first('price') }}
    </div>
  </div>
  {{-- / row: price --}}

  {{-- row: image --}}
  <div class="form-group">
    <label for="img"><b>Immagine</b></label>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="file" class="form-control {{ $errors->has('img') ? 'is-invalid' : '' }}"  id="img" name="img" accept="image/*">
    @if (isset($product))
      <small>[ {{ substr($product->img, 12) }} ]</small>
    @endif
    <div class="invalid-feedback">
      {{ $errors->first('img') }}
    </div>
  </div>
  {{-- / row: image --}}

  {{-- row: visible --}}
  <div class="form-group">
    <label for="visible">Disponibile</label>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" id="visible" name="visible" value="1" @if(isset($product) && $product->visible == 1) checked @endif>
  </div>
  {{-- row: visible --}}

  @if (!isset($product))
    <input type="hidden" name="business_id" id="business_id" value="{{ $business_id }}">
  @endif

  <button type="submit" class="btn btn-primary">{{$submit}} prodotto</button>
</form>
