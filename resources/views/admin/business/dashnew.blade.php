{{-- @dump($chart) --}}
{{-- @dump($graphicsOrder) --}}

@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col-md-2 d-none d-md-block bg-white sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column ml-5 mt-5">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file"></span>
                    Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="shopping-cart"></span>
                    Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Statistiche</h1>
        </div>
        <canvas class="my-4" id="my-chart" width="900" height="380"></canvas>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">I miei Ristoranti</h1>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!-- CHARTS -->
<script>
    $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#my-chart");

      //pie chart data
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

      //options
      var options = {
        // scale: {

        // },
        responsive: true,
        title: {
            display: true,
            position: "top",
            text: "Last Week Registered Users -  Day Wise Count",
            fontSize: 18,
            fontColor: "#111"
        },
        legend: {
            display: true,
            position: "bottom",
            labels: {
                fontColor: "#333",
                fontSize: 16
            }
        }
      };

      //create Bar Chart class object
      var chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
      });

  });
</script>
@endsection
