
@php
  $timestamp = strtotime(Auth::user()->created_at);
  $user_date = date("d m Y", $timestamp);
@endphp

@extends('admin.layout')

@section('content')

  <div class="dashboard container">

    {{-- User Header --}}
    <div class="user-header">
      <div class="user-header-avatar">
        <img src="{{ asset('img/00-user-dash.png') }}" alt="{{ Auth::user()->name }}">
      </div>
      <div class="user-header-data">
        <h3>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>
        <h5>{{ Auth::user()->email }}</h5>
        <h5>P.IVA: {{ Auth::user()->vat }}</h5>
        <h6>Utente dal {{$user_date}}</h6>
      </div>
      <div class="user-header-button">
        <a href="{{ route('business.create') }}" class="btn btn-primary btn-lg">
          <i class="bi bi-plus-circle-fill"></i>
        Crea Nuovo Ristorante
      </a>
      </div>
    </div>
    {{-- /User Header --}}

    @if (!empty($businesses))
      <h4 class="user-businesses-title">I tuoi Ristoranti</h4>
      <table class="table table-striped">
        <tbody>
          @foreach ($businesses as $business)
            <tr>
              <td><img src="{{ asset($business->logo) }}" width="150px" height="150px"></td>
              <td>
                <b>{{ $business->name }}</b>
                <hr>
                [
                @foreach ($business->types as $id=>$type)
                  {{ $type->name }}
                  @if ($id != (count($business->types) - 1))
                    |
                  @endif
                @endforeach
                ]
              </td>
              <td>{{ $business->address }}</td>
              <td>
                <a href="{{ route('business.show', compact('business')) }}" class="btn btn-primary btn-sm">Visualizza</a>
                <br>
                <br>
                <br>
                <a href="{{ route('business.edit', compact('business')) }}" class="btn btn-secondary btn-sm">Modifica</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>

@endsection
