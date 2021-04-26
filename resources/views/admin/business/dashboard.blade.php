@php
  $timestamp = strtotime(Auth::user()->created_at);
  $user_date = date("d m Y", $timestamp);
@endphp

@extends('layouts.base')
@section('content')

    <header class="row-header row d-flex align-items-center no-gutters">
        <div class="offset-1"></div>
        <div class="content col-3">
            <div class="content-img">
                <img src="{{ asset('img/00-user-dash.png') }}" alt="{{ Auth::user()->name }}" style="width:50px ">
            </div>
            <h3>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <div class="content-info">

                <h5>{{ Auth::user()->email }}</h5>
                <h5>P.IVA: {{ Auth::user()->vat }}</h5>
                <h6>Utente dal {{ $user_date }}</h6>
            </div>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <a href="{{ route('business.create') }}">
                <button> Crea Nuovo Ristorante</button>
            </a>
        </div>
        <div class="offset-1"></div>
    </header>

    <main class="row-main row no-gutters">
        <div class="offset-1"></div>
        <div class="col-10 row-main-restaurants">
            <div class="row row-main-restaurants-row">
                <h1 class="col-12 row-main-restaurants-row-title">I miei Ristoranti</h1>
            </div>
            <div class="row-main-restaurants-row row">
                <div class="col-12 row-main-restaurants-row-restaurant">
                    @if (!empty($businesses))
                        <div class= "row-main-restaurants-row-restaurant-card">
                            <ul class="business">
                                @foreach ($businesses as $business)
                                    <li class="business-item">
                                    <a href="#">
                                        <div class="business-item-top">
                                            <div class="business-item-top-logo">
                                                <img src="{{ $business->logo }}" alt="{{ $business->name }}">
                                            </div>
                                            <h3>{{ $business->name }}</h3>
                                        </div>
                                        <div class="business-item-description">
                                            {{ $business->description }}
                                        </div>
                                        <div class="business-item-time">
                                            <span>Dalle: {{ $business->opening_time }}</span><br>
                                            <span>Alle: {{ $business->closing_time }}</span>
                                        </div>
                                        <div class="business-item-address">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $business->address }}
                                        </div>
                                    </a>
                                    <div class="business-item-actions">
                                        <a href="{{ route('business.show', compact('business'))}}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('business.edit', compact('business'))}}">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                    <div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="offset-1"></div>
    </main>
@endsection
