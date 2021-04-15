@extends('layouts.app')

@section('title', 'index Products')

@section('content')

    <form action="{{ route('businesses.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Nome Risorante</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name"
                placeholder="Nome Ristorante">
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>

            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description"
                    name="description" rows="6"></textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            </div>

            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address"
                    name="address" placeholder="Indirizzo">
                <div class="invalid-feedback">
                    {{ $errors->first('address') }}
                </div>
            </div>

            <div class="form-group">
                <label for="logo">Logo Ristorante</label>
                <input type="text" class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo"
                    name="logo" placeholder="Logo">
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

            <button type="submit" class="btn btn-primary">Crea</button>
    </form>

@endsection
