@extends('templates.base')

@section('title', 'index Products')

@section('content')

<form action="{{ route('product.store') }}" method="post">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="name">Nome Piatto</label>
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="title" name="name" placeholder="Inserisci il nome del piatto">
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredienti</label>
            <input type="text" class="form-control {{ $errors->has('ingredients') ? 'is-invalid' : '' }}" id="ingredients" name="ingredients" placeholder="Inserisi gli ingredienti">
            <div class="invalid-feedback">
                {{ $errors->first('ingredients') }}
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" rows="6"></textarea>
            <div class="invalid-feedback">
                {{ $errors->first('description') }}
            </div>
        </div>

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price" placeholder="Inserisi il prezzo">
            <div class="invalid-feedback">
                {{ $errors->first('price') }}
            </div>
        </div>

        <div class="form-group">
            <label for="img">Immagine</label>
            <input type="text" class="form-control {{ $errors->has('img') ? 'is-invalid' : '' }}" id="img" name="img" placeholder="Inserisi l'url dell'immagine">
            <div class="invalid-feedback">
                {{ $errors->first('img') }}
            </div>
        </div>

        <div class="form-group">
            <label for="visible">Visibiltà</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input" name="visible" id="visible" value="1">
        </div>

        <input type="hidden" name="business_id" id="business_id" value="1" >

        <button type="submit" class="btn btn-primary">Crea</button>
</form>

@endsection
