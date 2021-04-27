
@extends('layouts.base')
@section('title', 'Menù')

@section('content')
  {{-- Header --}}
  <section class="business-header">
    <div class="row no-gutters">
      <div class="offset-1"></div>
      <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 business-header-row-jumbotronn">
        <div class="business-header-row-jumbotronn-container fl">
          <div class="business-header-row-jumbotronn-container-img" style="background-image: url('{{ $business->logo }}')"></div>
        </div>
        <div class="business-header-row-jumbotronn-container fl">
          <div class="business-header-row-jumbotronn-container-title">{{ $business->name }}</div>
          <div class="business-header-row-jumbotronn-container-types">
            @foreach ($business->types as $id => $type)
              {{ $type->name }}
              @if ($id != (count($business->types) - 1))
                |
              @endif
            @endforeach
          </div>
        </div>
      </div>
      <div class="offset-1"></div>
    </div>
  </section>
  {{--  End Header --}}

  {{-- Main --}}
  <section id="app" class="business-main">
    <div class="row no-gutters">
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
                  <div class="business-main-row-main-row-products-row-name-img fl" style="background-image: url({{asset( $product->img )}});"></div>
                  <div class="business-main-row-main-row-products-row-name-container fl">
                    <span class="business-main-row-main-row-products-row-name-container-title">{{ $product->name }}</span><br>
                    <span class="business-main-row-main-row-products-row-name-container-description">{{ $product->description }}</span>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 business-main-row-main-row-products-row-price"><strong>Prezzo</strong> <br><br> {{ $product->price }}€</div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 business-main-row-main-row-products-row-options" style="text-align: center">
                  <button type="button" class="business-main-row-main-row-products-row-options-btn" v-on:click = "add({{$product->id}}, '{{$product->name}}', {{$product->price}})">+</button><br><br>
                  <button type="button" class="business-main-row-main-row-products-row-options-btn" v-on:click = "remove({{$product->id}}, {{$product->price}})">-</button>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <aside class="col-xl-3 col-lg-3 col-md-3 col-sm-10 col-10">
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
              <span class="text-right ml-3">&euro; @{{amount}}</span>
            </dl>
            <dl v-if="flagVerificaCoupon">Sconto applicato!</dl>
            <hr>
            <a v-on:click="saveCart()" href="{{ asset(route('cart-checkout', compact('business')))}}" class="btn btn-out btn-primary btn-square btn-main" data-abc="true">Checkout</a>
          </div>
        </div>
      </aside>
      <div class="offset-1"></div>
    </div>
  </section>
  {{-- End Main --}}
@endsection
