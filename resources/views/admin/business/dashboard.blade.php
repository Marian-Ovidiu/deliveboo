@php
  $timestamp = strtotime(Auth::user()->created_at);
  $user_date = date("d m Y", $timestamp);
@endphp

@extends('layouts.base')
@section('content')

{{-- User Header --}}
<header class="header-dashboard">
    <div class="header-dashboard-row">
            <div class=" header-dashboard-row-jumbotronn" style="background-image: url('https://wallpaperaccess.com/full/1306153.jpg')">
            <div class="  header-dashboard-row-jumbotronn-cover row">
                <div class="col-1 header-dashboard-row-jumbotronn-cover-space"></div>
                {{--immagine--}}
                <div class="col-5 header-dashboard-row-jumbotronn-cover-logo">
                    <div class="header-dashboard-row-jumbotronn-cover-logo-img fl">
                        <img src="{{ asset('img/00-user-dash.png') }}" alt="{{ Auth::user()->name }}"" style="width:50px ">
                    </div>

                    <div class="header-dashboard-row-jumbotronn-cover-logo-box fl">
                        <h3>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>
                        <h5>{{ Auth::user()->email }}</h5>
                        <h5>P.IVA: {{ Auth::user()->vat }}</h5>
                        <h6>Utente dal {{ $user_date }}</h6>
                    </div>
                </div>
                <div class="col-5 header-dashboard-row-jumbotronn-cover-btn">
                    <div class="header-dashboard-row-jumbotronn-cover-btn fl">
                        <div class="header-dashboard-row-jumbotronn-cover-btn ">
                            <a href="{{ route('business.create') }}">
                                <button> Crea Nuovo Ristorante</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1 header-dashboard-row-jumbotronn-cover-space"></div>
        </div>
    </div>
</header>
{{-- /User Header --}}

<div class="container-fluid">
    <main class="main-dashboard">
        <h2 class="main-dashboard-title">I tuoi Ristoranti</h2>
        <div class="main-dashboard-row row">
            <div class="col-2 main-dashboard-row-space"></div>
            <div class="col-8 main-dashboard-row-container">
                <div class="main-dashboard-row-container-row row">
                    @if (!empty($businesses))
                        @foreach ($businesses as $business)
                            <div class="col-4 main-dashboard-row-container-row-card">
                                <div class="main-dashboard-row-container-row-card-restaurant">
                                    <div class="main-dashboard-row-container-row-card-restaurant-img" style="background-image:url({{ asset($business->logo) }})"></div>
                                        <h2>{{ $business->name }}</h2>
                                        <hr>
                                        <span>
                                            @foreach ($business->types as $id=>$type)
                                            {{ $type->name }}
                                            @if ($id != (count($business->types) - 1))
                                            |
                                            @endif
                                            @endforeach
                                            <div>{{ $business->address }}</div>
                                        </span>
                                    </div>
                                    <div>
                                        <a href="{{ route('business.show', compact('business')) }}" class="btn btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{ route('business.edit', compact('business')) }}" class="btn  btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            <div class="col-2 main-dashboard-row-space"></div>
        </div>
    </main>
</div>
{{-- </div> --}}
@endsection
