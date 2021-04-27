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

$days = [
  'Lunedì',
  'Martedì',
  'Mercoledì',
  'Giovedì',
  'Venerdì',
  'Sabato',
  'Domenica'
]
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
                {{$submit}} ristorante
            </div>
            </div>
            <div class="form-section-header-img">
            <img src="{{asset ('img/00-business.jpg')}}" alt="Deliveroo">
            </div>
        </div>
    </div>


    <div class = "container">
        {{-- Form --}}
        <form class = "row" action="{{ $url }}" method="post" enctype="multipart/form-data">
            @csrf
            @method( $method )

            {{-- row: name --}}
            <div class="col-12">
                <div class="form-group">
                    <label for="name"><b>Nome Risorante</b></label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name"
                    value="{{ isset($business) ? $business->name : '' }}">
                    <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                    </div>
                </div>
            </div>
            {{-- / row: name --}}

            {{-- / row: types --}}
            <div class="col-12">
                <div class="form-group">
                    <label for="type[]"><b>Categoria</b></label>
                    <select class="custom-select" name="type[]" id="type_id" multiple required>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (isset($business) && $business->types->contains($type->id)) selected @endif>
                        {{ $type->name }}
                        </option>
                    @endforeach
                    </select>
                </div>
            </div>
            {{-- / row: types --}}

            {{-- row: description --}}
            <div class="col-12">
                <div class="form-group">
                    <label for="description"><b>Descrizione</b></label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                    id="description" name="description" rows="6"> @if(isset($business)) {{ $business->description }} @endif
                    </textarea>
                    <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                    </div>
                </div>
            </div>
            {{-- / row: description --}}

            {{-- row: address --}}
            <div class="col-lg-6 col-xs-12">
                <div class="form-group ">
                    <label for="address"><b>Indirizzo</b></label>
                    <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address"
                    name="address" value="{{ isset($business) ? $business->address : '' }}">
                    <div class="invalid-feedback">
                    {{ $errors->first('address') }}
                    </div>
                </div>
            </div>
            {{-- / row: address --}}

            {{-- row: logo --}}
            <div class="col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="logo"><b>Logo</b></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="file" id="logo" name="logo" accept="image/*">
                    @if (isset($business))
                        <small>
                            <br>&nbsp;File caricato in precedenza: {{ substr($business->logo, 12) }}
                        </small>
                    @endif
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                </div>
            </div>
            {{-- / row: logo --}}

            {{-- row: opening time--}}
            <div class="col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="opening_time"><b>Orario apertura del ristorante</b></label>
                    <input type="time" class="form-control" id="opening_time" name="opening_time" value="{{ isset($business) ? $business->opening_time : '' }}">
                </div>
            </div>
            {{-- / row: opening time--}}

            {{-- row: closing time --}}
            <div class="col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="closing_time"><b>Orario chiusura del ristorante</b></label>
                    <input type="time" class="form-control" id="closing_time" name="closing_time"  value="{{ isset($business) ? $business->closing_time : '' }}">
                </div>
            </div>
            {{-- / row: closing time --}}

            {{-- row: closing day --}}
            <div class="col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="closing_day"><b>Giorno di chiusura</b></label>
                    <select class="custom-select" name="closing_day" id="closing_day">
                    @foreach ($days as $day)
                        <option value="{{ $day }}"
                        @if (isset($business) && $business->closing_day === $day) selected @endif>
                        {{ $day }}
                        </option>
                    @endforeach
                    </select>
                </div>
            </div>
            {{-- / row: closing day --}}

            {{-- / row: business email --}}
            <div class="col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="email"><b>Email Risorante</b></label>
                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email"  value="{{ isset($business) ? $business->email : '' }}">
                    <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                    </div>
                </div>
            </div>
            {{-- / row: business email --}}

            {{-- row: telephone --}}
            <div class="col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="telephone">
                        <b>Numero di telefono del Ristorante</b>
                    </label>
                    <input id="telephone" type="text" class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" name="telephone"  value="{{ isset($business) ? $business->telephone : '' }}">
                    <div class="invalid-feedback">
                    {{ $errors->first('telephone') }}
                    </div>
                </div>
            </div>
            {{-- / row: telephone --}}

            {{-- / row: business website --}}
            <div class="col-lg-6 col-xs-12">
                <div class="form-group">
                    <label for="website">
                        <b>Sito web del Risorante (facoltativo)</b>
                    </label>
                    <input type="text" class="form-control" id="website" name="website"  value="{{ isset($business) ? $business->website : '' }}">
                </div>
            </div>
            {{-- / row: business website --}}

            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

            <div class="col-6">
                <button type="submit" class="btn btn-primary">{{$submit}} Ristorante</button>
            </div>
        </form>
    </div>
</section>
@endsection
