@php
  $timestamp = strtotime(Auth::user()->created_at);
  $user_date = date("d m Y", $timestamp);
@endphp

@extends('layouts.base')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse dash-nav">
            <div class="position-sticky pt-3">

                {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>info</span>
                </h6> --}}

                <ul class="nav flex-column mt-5 ml-5">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('business.create') }}">
                            <i class="fas fa-plus"></i>
                            Crea ristorante
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#report">
                            <i class="fas fa-chart-bar"></i>
                            Report mensile
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 col-lg-10 px-md-0 overflow-auto dash-main">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom dash-header">
                <ul class="col-md-3 justify-content-start text-left">
                    <li><h2>Ciao</h2></li>
                    <li><h4>{{ ucfirst(Auth::user()->name) }}</h4></li>
                </ul>
                <ul class="col-md-3 justify-content-end text-right">
                    <li><h6>{{ Auth::user()->email }}</h6></li>
                    <li><h6>P.IVA: {{ Auth::user()->vat }}</h6></li>
                    <li><h6>Ristoratore dal {{ $user_date }}</h6></li>
                </ul>
            </div>

            <h4 class="ml-3">I miei Ristoranti</h4>

            <ul class="business justify-content-start dash-main">
            @foreach ($businesses as $business)
                <li class="business-item">
                    {{-- <a href="#"> --}}
                    <div class="business-item-top">
                        <div class="business-item-top-logo">
                            <img src="{{ $business->logo }}" alt="{{ $business->name }}">
                        </div>
                        <h3>{{ $business->name }}</h3>
                    </div>
                    <div class="business-item-description text-green">
                        {{ $business->description }}
                    </div>
                    <div class="business-item-time">
                        <span>Dalle: {{ $business->opening_time }}</span><br>
                        <span>Alle: {{ $business->closing_time }}</span>
                    </div>
                    <div class="business-item-address text-green">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $business->address }}
                    </div>
                    {{-- </a> --}}
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

            <h4 id="report" class="ml-3">Fatturato mensile</h4>
            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

        </main>
    </div>

    <script>
    $(function(){
        // get bar chart canvas
        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        var ctx = $("#myChart");

        // bar chart data
        var data = {
          labels: cData.label,
          datasets: [
            {
              label: "Ordini andati a buon fine",
              data: cData.data,
              backgroundColor: [
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
                "#1D7A46",
                "#CDA776",
              ],
              borderColor: [
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
                "#1D7A46",
                "#F4A460",
                "#CDA776",
              ],
              borderWidth: [1, 1, 1, 1, 1, 1, 1]
            }
          ]
        };

        // options
        var options = {
          responsive: true,
          title: {
            display: true,
            position: "top",
            text: "",
            fontSize: 16,
            fontColor: "#fff"
          },
          legend: {
            display: true,
            position: "bottom",
            labels: {
              fontColor: "#fff",
              fontSize: 16
            }
          },
          layout: {
            fontColor: "#fff"
          }
        };
        // create Bar Chart class object
        var chart1 = new Chart(ctx, {
          type: "bar",
          data: data,
          options: options
        });
    });
  </script>

</div>
@endsection
