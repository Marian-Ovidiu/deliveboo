@extends('templates.base')

@section('title', 'index Products')

@section('content')

<form action="{{ route('business.store') }}" method="post">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="name">Nome Risorante</label>
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Nome Ristorante">
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" placeholder="Descrizione">
            <div class="invalid-feedback">
                {{ $errors->first('description') }}
            </div>
        </div>

        <div class="form-group">
            <label for="address">Indirizzo</label>
            <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address" name="address" rows="6"></textarea>
            <div class="invalid-feedback">
                {{ $errors->first('address') }}
            </div>
        </div>

        <div class="form-group">
            <label for="logo">Logo Ristorante</label>
            <textarea class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo" name="logo" rows="6"></textarea>
            <div class="invalid-feedback">
                {{ $errors->first('logo') }}
            </div>
        </div>

        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

        <button type="submit" class="btn btn-primary">Crea</button>
</form>

@endsection
