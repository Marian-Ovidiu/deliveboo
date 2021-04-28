
@extends('layouts.base')
@section('title', 'Menù')

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
                <span class="business-main-row-main-row-products-container-description">
                    @if (strlen($product->description > 100))
                        {{substr( $product->description, 0, 100)}}[...]
                    @else
                        {{$product->description}}
                    @endif
                </span>
            </div>
            <div class="business-main-row-main-row-products-price"><div><strong>Prezzo</strong></div><div style="margin: 0 10px">{{ $product->price }}€</div></div>
            <div class="business-main-row-main-row-products-options" style="text-align: center">
                <button type="button" class="business-main-row-main-row-products-options-btn" v-on:click = "add({{$product->id}}, '{{$product->name}}', {{$product->price}})">+</button><br>
                <button type="button" class="business-main-row-main-row-products-options-btn" v-on:click = "remove({{$product->id}}, {{$product->price}})">-</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <aside class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card mb-3">
          <div class="card-body">
            <form>
              <div class="form-group">
                <label>Coupon</label>
                <div class="input-group">
                  <input type="text" class="form-control coupon" v-model="couponCode" name="" placeholder="Coupon code">
                  <span class="input-group-append">
                    <div @click="discountCoupon()" class="btn btn-primary btn-apply coupon">
                      Applica
                    </div>
                  </span>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body">
            <dl v-for="item in cart">
              <dt>
                @{{item.name}} x
                @{{item.quantity}} <br>
                @{{item.price}} €
              </dt>
            </dl>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <dl>
              <span><strong>Prezzo totale:</strong></span>
              <span v-if="flagVerificaCoupon" style="text-decoration: line-through;">&euro; @{{preDiscountAmount}}</span>
              <span class="text-right ml-3">&euro; @{{amount}}</span>
            </dl>
            <dl v-if="flagVerificaCoupon">Applicato sconto del 20%!</dl>
            <hr>
            <a v-on:click="saveCart()" href="{{ asset(route('cart-checkout', compact('business')))}}" class="btn btn-out btn-primary btn-square btn-main" data-abc="true">Checkout</a>
          </div>
        </div>
      </aside>
      <div class="col-xl-1 col-lg-1 col-md-1 col-sm-0"></div>
    </div>
  </section>
  {{-- End Main --}}
@endsection
