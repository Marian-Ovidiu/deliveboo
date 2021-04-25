@php
  $timestamp = strtotime(Auth::user()->created_at);
  $user_date = date("d m Y", $timestamp);
@endphp

@extends('layouts.base')
@section('content')

<header class="row d-flex align-items-center">
    <div class="offset-1"></div>
    <div class="content col-5">
        <div class="content-img">
            <img src="{{ asset('img/00-user-dash.png') }}" alt="{{ Auth::user()->name }}" style="width:50px ">
        </div>
        <div class="content-info">
            <h3>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>
            <h5>{{ Auth::user()->email }}</h5>
            <h5>P.IVA: {{ Auth::user()->vat }}</h5>
            <h6>Utente dal {{ $user_date }}</h6>
        </div>
    </div>
    <div class="col-5 d-flex justify-content-center">
        <a href="{{ route('business.create') }}">
            <button> Crea Nuovo Ristorante</button>
        </a>
    </div>
    <div class="offset-1"></div>

</header>

<main class="row">
    <div class="offset-1"></div>
    <div class="col-10">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-8"></div>
        </div>
    </div>
    <div class="offset-1"></div>
</main>

{{--
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
</div> --}}
@endsection
