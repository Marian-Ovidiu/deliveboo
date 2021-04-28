@extends('layouts.base')
@section('title', 'Gestione menù')

@section('content')

  {{-- Header --}}
  <section class="busines-header">
      <div class="content">
          <div class="busines-header-data">
          <div class="titles">
              {{ $business->name }}
          </div>
          <div class="subtitles">
            @foreach ($business->types as $id => $type)
                {{ $type->name }}
                @if ($id != (count($business->types) - 1))
                |
                @endif
            @endforeach
            <br><br>
            <a class="btn" href="{{ route('add-prod', [ 'id' => $business->id ]) }}">Aggiungi un nuovo piatto</a>
          </div>
          </div>
          <div class="busines-header-img">
          <img src="{{asset( $business->logo ) }}" alt="Deliveroo">
          </div>
      </div>
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
                                        <i class="fas fa-meteor"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Statistics --}}
                <div style="text-align: center; margin-top: 30px">
                  <IFRAME
                  name = "chartjs"
                  src = "{{ route('stats', [ 'id' => $business->id ]) }}"
                  width = "90%"
                  height = "700"
                  scrolling	= "0"
                  frameborder	= "0"
                  marginwidth = "0"
                  marginheight = "0"
                  >
                  </IFRAME>
                </div>
              {{-- / Statistics --}}

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
                        <div class="card-sidebar-info">Day Off: {{$business->closing_day}}</div>
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
                        <div align="center">
                          <br>
                          <a class="btn" href="{{ route('business.edit', compact('business'))}}">Modifica Dati</a>
                          <br><br>
                        </div>
                    </section>
                </div>
            </aside>

        <div class="offset-1"></div>
        </div>
    </section>
    {{-- End Main --}}

@endsection
