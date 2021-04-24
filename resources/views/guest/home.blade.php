@extends('layouts.base')
@section('title', 'Home')

@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  {{-- HOME CONTAINER  --}}
  <div id="app" class="home-container">

    {{-- Jumbotron --}}


    <div class="row-jumbotron">
      <div class="row">

        <div class="row-jumbotron-left col-md-8 col-sm-12">
          <div class="row-jumbotron-row row">
            <div class="col-sm-12 row-jumbotron-row-title">
              Cerca. Scegli. Ordina.
            </div>
          </div>
          <div class="row-jumbotron-row row">
            <div class="col-xl-12 col-lg-12 col-md-12 row-jumbotron-row-subtitle">
              Il tuo ristorante preferito a casa con un click.
            </div>
          </div>
          <div class="row-jumbotron-row row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 row-jumbotron-row-space"></div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 row-jumbotron-row-search">
              <div class="input-group border rounded-pill p-3">
                <input type="search" placeholder="Inserisci il nome del ristorante..." class="form-control" @keyup = "filterBusinessesByName(query)" class="form-control" v-model="query" >
              </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 row-jumbotron-row-space"></div>
          </div>
        </div>
        <div class="row-jumbotron-right col-md-4 col-sm-12">
          <img src="{{asset('img/01-home.png')}}" alt="Deliveboo">

        </div>
      </div>
    </div>


    {{-- / Jumbotron --}}

    {{-- Search by type --}}
    <section class="types">
      <h2>Le nostre categorìe</h2>
      <ul>
        <li v-for="(type, i) in allTypes">
          <a href="#restaurants-row" v-on:click="filterBusinessesByTypes(type.name)">
            <img alt="type.name" v-bind:src="type.img">
            <span class="type-name">@{{ type.name }}</span>
          </a>
        </li>
      </ul>
    </section>

    {{-- / Search by type --}}

    {{-- Restaurant List --}}
    <div class="row" id="restaurants-row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 row-restaurants">
        <div class="row-restaurants-row row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 row-restaurants-row-title">Choose From Most Popular</div>
        </div>
        <div class="row-restaurants-row row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 row-restaurants-row-subtitle">
            All the top restaurant in your city
          </div>

          {{-- compare se non ci sono ristoranti che appartengono alla categoria cliccata --}}
          <div v-if="businessesForType.length === 0 && !showBusinessesToRender"
          class="col-xl-12 col-lg-12 col-md-12 col-sm-12 row-restaurants-row-subtitle">
          Non sono presenti ristoranti in questa categoria!
        </div>
      </div>


      <div id="restaurants" data-spy="restaurants" data-target="#restaurants" class="row-restaurants-row row">
        <div class="col-xl-1 col-lg-1  col-md-1 col-sm-0 col-3 row-restaurants-row-space"></div>
        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-6 row-restaurants-row-cards">

          <div class="row-restaurants-row-cards-row row">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 row-restaurants-row-cards-row-card"
            v-for="(business, i) in businessesToRender"
            v-bind:key="i"
            v-if="businessesForType.length === 0 && showBusinessesToRender">
            <a class="row-restaurants-row-cards-row-card-click" v-bind:href="'business/'+ business.id">
              <div class="row-restaurants-row-cards-row-card-click-product">
                <div class="row-restaurants-row-cards-row-card-click-product-img" :style="{ 'background-image': 'url(' + business.logo + ')' }"></div>
                <div class="row-restaurants-row-cards-row-card-click-product-body">
                  <div class="row-restaurants-row-cards-row-card-click-product-body-name">
                    @{{ business.name }}
                  </div>
                  <div class="row-restaurants-row-cards-row-card-click-product-body-description">
                    @{{ business.description }}
                  </div>
                  <div class="row-restaurants-row-cards-row-card-click-product-body-title">Orari</div>
                  <div class="row-restaurants-row-cards-row-card-click-product-body-hours">
                    <span>Dalle: @{{ business.opening_time }}</span><br>
                    <span>Alle: @{{ business.closing_time }}</span>
                  </div>
                  <div class="row-restaurants-row-cards-row-card-click-product-body-address">
                    <i class="fas fa-map-marker-alt"></i>
                    @{{ business.address }}
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="row-restaurants-row-cards-row row">
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 row-restaurants-row-cards-row-card"
          v-for="(business, i) in businessesForType"
          v-bind:key="i"
          v-if="businessesForType.length > 0">
          <a class="row-restaurants-row-cards-row-card-click" v-bind:href="'business/'+ business.id">
            <div class="row-restaurants-row-cards-row-card-click-product-img" :style="{ 'background-image': 'url(' + business.logo + ')' }"></div>
            <div class="row-restaurants-row-cards-row-card-click-product-body">
              <div class="row-restaurants-row-cards-row-card-click-product-body-name">
                @{{ business.name }}
              </div>
              <div class="row-restaurants-row-cards-row-card-click-product-body-description">
                @{{ business.description }}
              </div>
              <div class="row-restaurants-row-cards-row-card-click-product-body-title">Orari</div>
              <div class="row-restaurants-row-cards-row-card-click-product-body-hours">
                <span>Dalle: @{{ business.opening_time }}</span><br>
                <span>Alle: @{{ business.closing_time }}</span>
              </div>
              <div class="row-restaurants-row-cards-row-card-click-product-body-address">
                <i class="fas fa-map-marker-alt"></i>
                @{{ business.address }}
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-0 col-3 row-restaurants-row-space">
    </div>
    {{-- / Restaurant List --}}

  </div>

@endsection
