@extends('layouts.base')
@section('title', 'Gestione menù')

@section('content')
   {{-- Header --}}
    <section class="business-header row no-gutters">
        <div class="offset-1"></div>
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 business-header-jumbotronn">
            <div class="business-header-jumbotronn-container">
                <div class="business-header-jumbotronn-container-title">{{ $business->name }}</div>
                <div class="business-header-jumbotronn-container-types">
                    @foreach ($business->types as $id => $type)
                        {{ $type->name }}
                        @if ($id != (count($business->types) - 1))
                        |
                        @endif
                    @endforeach
                </div>
                <a href="{{ route('add-prod', [ 'id' => $business->id ]) }}">Aggiungi un nuovo piatto</a>
            </div>
            <div class="business-header-jumbotronn-container">
                <div class="business-header-jumbotronn-container-img">
                    <img src="{{asset( $business->logo ) }}" alt="Deliveboo">
                </div>
            </div>
        </div>
        <div class="offset-1"></div>
    </section>
    {{--  End Header --}}

    {{--  Info --}}
    <section class="info-row row no-gutters">
        <div class="info-row-content col-12">
            <div class="info-row-content-left" >
                <span><b>Apertura</b> : {{ \Carbon\Carbon::parse( $business->opening_time )->format('H:i') }}</span>
                <span><b>Chiusura</b> : {{ \Carbon\Carbon::parse( $business->closing_time )->format('H:i') }}</span>
                <span><b>Day-off</b> : {{ $business->closing_day }}</span>
            </div>
            <div class="info-row-content-right">
                <span>{{ $business->address }}</span>
                <span><b>Tel.</b> : {{ $business->telephone }}</span>
            </div>
        </div>
    </section>
    {{--  End Info --}}

    {{-- Main --}}
    <section id="app" class="business-main">
<<<<<<< HEAD
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  business-main row">
            <div class="offset-1"></div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-10 col-10 business-main-row-main">
                <div class="business-main-row-main-row row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 business-main-row-main-row-title">I nostri piatti</div>
                </div>
                <div class="business-main-row-main-row row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 business-main-row-main-row-products">
                        @foreach ($business->products()->get() as $product)
                        <div class="business-main-row-main-row-products-row row">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 business-main-row-main-row-products-row-name">
                                <div class="business-main-row-main-row-products-row-name-img fl" style="background-image: url('{{asset( $product->img )}}');"></div>
                                <div class="business-main-row-main-row-products-row-name-container fl">
                                    <span class="business-main-row-main-row-products-row-name-container-title">{{ $product->name }}</span><br>
                                    <span class="business-main-row-main-row-products-row-name-container-description">{{ $product->description }}</span>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 business-main-row-main-row-products-row-price"><strong>Prezzo</strong> <br><br> {{ $product->price }}€</div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 business-main-row-main-row-products-row-options" style="text-align: center">
                                <a class="business-main-row-main-row-products-row-options-btn btn" href="{{ route('product.edit', compact('product'))}}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <form action="{{route('product.destroy', compact('product'))}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="business-main-row-main-row-products-row-options-btn btn" style="margin-top: 20px;color: #000138;">
=======
        <div class="row no-gutters">
            <div class="offset-1"></div>
            <div class="col-xl-7 col-lg-7 col-md-10 col-sm-10 col-10 business-main-row-main">
                <div class="business-main-row-main-row row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 business-main-row-main-row-title">I nostri piatti</div>
                </div>
                @foreach ($business->products()->get() as $product)
                    <div class="business-main-row-main-row row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 business-main-row-main-row-products">
                            <div class="business-main-row-main-row-products-img" style="background-image: url({{asset( $product->img )}});"></div>
                            <div class="business-main-row-main-row-products-container">
                                <span class="business-main-row-main-row-products-container-title">{{ $product->name }}</span><br>
                                <span class="business-main-row-main-row-products-container-description"> {{substr( $product->description, 0, 100)}}[...]</span>
                            </div>
                            <div class="business-main-row-main-row-products-price"><div><strong>Prezzo</strong></div><div style="margin: 0 10px">{{ $product->price }}€</div></div>
                            <div class="business-main-row-main-row-products-options" style="text-align: center">
                                <a class="business-main-row-main-row-products-options-btn"  href="{{ route('product.edit', compact('product'))}}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <form action="{{route('product.destroy', compact('product'))}}" method="POST" class="no-gutters">
                                    @method('DELETE')
                                    @csrf
                                    <button class="business-main-row-main-row-products-options-btn"  style="color: #000138;">
>>>>>>> e399331093bc9ba9d0c3484de6ec9e3c5413f5ef
                                        <i class="fas fa-meteor"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
<<<<<<< HEAD
                        @endforeach
                    </div>
                </div>
            </div>
            <aside class="col-3 info-restaurant">

                <div class="card">
                <section class="card-sidebar">
                    <div class="card-sidebar-info"><b>Info Ristorante</b></div>
                    <div class="card-sidebar-info">Indirizzo: <span>{{$business->address}}</span> </div>
                    <div class="card-sidebar-info">Tel: {{$business->telephone}}</div>
                    <div class="card-sidebar-info">Email: {{$business->email}} </div>
                    <div class="card-sidebar-info">Apertura: {{$business->opening_time}}</div>
                    <div class="card-sidebar-info">Chiusura: {{$business->closing_time}}</div>
                    <div class="card-sidebar-info">Day Off: {{$business->opening_time}}</div>
                    <div class="card-sidebar-info"><h6><b>Descrizione</b></h6>
                        <p class="sidebar-text">{{$business->description}}</p>
                    </div>
                    <div class="card-sidebar-info">
                        <b>Category</b><br>
                        @foreach ($business->types as $id=>$type)
                            {{ $type->name }}
                                @if ($id != (count($business->types) - 1))
                                |
                                @endif
                        @endforeach
                    </div>
                </section>

            </aside>
            <div class="offset-1"></div>
        </div>

        <div class="row">
            <div class="col-10 mx-auto">
                <h4 id="report" class="ml-3">Report</h4>
                <canvas class="my-4 w-100" id="myChart" width="900" height="380" color="white"></canvas>
            </div>
        </div>

=======
                    </div>
                @endforeach
            </div>
            <aside class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 info-restaurant">
                <div class="card">
                    <section class="card-sidebar">
                        <div class="card-sidebar-info"><b>Info Ristorante</b></div>
                        <div class="card-sidebar-info">Indirizzo: <span>{{$business->address}}</span> </div>
                        <div class="card-sidebar-info">Tel: {{$business->telephone}}</div>
                        <div class="card-sidebar-info">Email: {{$business->email}} </div>
                        <div class="card-sidebar-info">Apertura: {{$business->opening_time}}</div>
                        <div class="card-sidebar-info">Chiusura: {{$business->closing_time}}</div>
                        <div class="card-sidebar-info">Day Off: {{$business->opening_time}}</div>
                        <div class="card-sidebar-info"><h6><b>Descrizione</b></h6>
                            <p class="sidebar-text">{{$business->description}}</p>
                        </div>
                        <div class="card-sidebar-info">
                            <b>Category</b><br>
                            @foreach ($business->types as $id=>$type)
                                {{ $type->name }}
                                    @if ($id != (count($business->types) - 1))
                                    |
                                    @endif
                            @endforeach
                        </div>
                    </section>
                </div>
            </aside>

        <div class="offset-1"></div>
        </div>
>>>>>>> e399331093bc9ba9d0c3484de6ec9e3c5413f5ef
    </section>
    {{-- End Main --}}

    <script>
        const orders = {!! $orders !!};
        // const orders = JSON.parse(`<?php echo $orders; ?>`);
        let result = {
            "01": {
                totalOrders: 0,
                money: 0,
                monthName: "Gennaio",
            },
            "02": {
                totalOrders: 0,
                money: 0,
                monthName: "Febbraio",
            },
            "03": {
                totalOrders: 0,
                money: 0,
                monthName: "Marzo",
            },
            "04": {
                totalOrders: 0,
                money: 0,
                monthName: "Aprile",
            },
        }
        orders.forEach(order => {
            result[order.created_at.slice(5,7)].totalOrders += 1;
            result[order.created_at.slice(5,7)].money += order.amount;
        });

        // console.log(result)

        const orderValues = []; // restaurant's order, from the api
        const moneyValues = []; // restaurant's money gained, from the api
        const monthValues = []; // months
        for (let key in result) {
            orderValues.push(result[key].totalOrders);
            moneyValues.push(result[key].money);
            monthValues.push(result[key].monthName);
        }
    </script>

    <script>
        $(function(){
        //get the pie chart canvas
            var cData = JSON.parse(`<?php echo $orders; ?>`);
            var ctx = $("#myChart");
            // var ctx = document.getElementById('myChart').getContext('2d');
            // var myChart = new Chart(ctx, {
            var data = {
                labels: [...monthValues],
                datasets: [
                    // first graph
                    {
                        label: 'Numero ordini', // legend
                        data: [...orderValues], // the y value adapt automatically to contain all the values in the array
                        fill: false, // fil color under the graph
                        backgroundColor: '#71bed1', // color of the graph under the line
                        borderColor: '#71bed1', // graph line color
                        borderWidth: 1.5, // width of the graph line
                        tension: 0.1, // roundness of the graph line
                    },
                    // second graph
                    {
                        label: 'Totale incasso in euro', // legend
                        data: [...moneyValues],
                        fill: false,
                        backgroundColor: '#ff6e54', // color of the graph under the line
                        borderColor: '#ff6e54',
                        borderWidth: 1.5,
                        tension: 0.1,
                    }
                ],
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: "#fff"
                            },
                            ticks: {
                                fontColor: 'white'
                            },
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: 'white'
                            },
                        }]
                    },
                }
            }
        });
    </script>
@endsection
