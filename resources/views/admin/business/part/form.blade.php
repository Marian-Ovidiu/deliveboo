@php
if ($edit) {
  $method = 'PATCH';
  $url = route('business.update', compact('business'));
  $submit = 'Modifica';
} else {
  $method = 'POST';
  $url = route('business.store');
  $submit = 'Crea';
}
@endphp

<form action="{{ $url }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('POST')
  <div class="form-group">
    <label for="name">Nome Risorante</label>
    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name"
    placeholder="Nome Ristorante" value="{{ isset($business) ? $business->name : '' }}">
    <div class="invalid-feedback">
      {{ $errors->first('name') }}
    </div>

    <div class="form-group">
      <label for="description">Descrizione</label>
      <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description"
        name="description" rows="6">
        @if (isset($business))
          {{ $business->description }}
        @endif
      </textarea>
        <div class="invalid-feedback">
          {{ $errors->first('description') }}
        </div>
      </div>

      <div class="form-group">
        <label for="address">Indirizzo</label>
        <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address"
        name="address" placeholder="Indirizzo" value="{{ isset($business) ? $business->address : '' }}">
        <div class="invalid-feedback">
          {{ $errors->first('address') }}
        </div>
      </div>

      <div class="form-group">
        <label for="logo">Logo Ristorante</label>
        @if (isset($business))
          <br>
          <small>
            {{ $business->logo }}
          </small>
          <br>
        @endif
        <input type="file" name="logo" class="form-control" id="logo">
        <div class="invalid-feedback">
          {{ $errors->first('logo') }}
        </div>
      </div>

      <div class="form-group">
        <label for="type[]">Categoria</label>
        <select class="custom-select" name="type[]" id="type_id" multiple>
          @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
          @endforeach
        </select>
      </div>


      <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

      <button type="submit" class="btn btn-primary">{{$submit}} Ristorante</button>
    </form>

  </div>
