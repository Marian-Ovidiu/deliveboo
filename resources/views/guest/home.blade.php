@extends('layouts.base')
@section('title', 'Home')

@section('content')
  {{-- HOME CONTAINER  --}}
  <div id="app" class="home-container">

    {{-- Jumbotron --}}
    <div class="row-jumbotron">
      <div class="row content">
        <div class="row-jumbotron-left col-md-8 col-sm-12">
          <div class="row-jumbotron-row row">
            <div class="col-sm-12 titles">
              Cerca. Scegli. Ordina.
            </div>
          </div>
          <div class="row-jumbotron-row row">
            <div class="col-sm-12 subtitles">
              Il tuo ristorante preferito a casa con un click.
            </div>
          </div>
          <div class="row-jumbotron-row row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 row-jumbotron-row-space"></div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 row-jumbotron-row-search">
              <div class="input-group border rounded-pill p-3">
                <input type="search" placeholder="Inserisci il nome del ristorante..." class="form-control" @keyup = "filterBusinessesByName(query)" @keyup.enter = "scrollToBottom()" class="form-control" v-model="query" >
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
      <div class="content">
        <h2 class="titles">Le nostre categorìe</h2>
        <ul>
          <li v-for="(type, i) in allTypes">
            <a href="#restaurants-row" v-on:click="filterBusinessesByTypes(type.name)">
              <img alt="type.name" v-bind:src="type.img">
              <span class="type-name">@{{ type.name }}</span>
            </a>
          </li>
        </ul>
      </div>
    </section>
    {{-- / Search by type --}}

    {{-- Businesses List --}}
    <section class="businesses" id="restaurants-row">
      <div class="content">

        <h2 class="titles">Scegli il tuo ristorante</h2>
        <h3 class="subtitles">Consulta il menu e ordina i prodotti che vuoi</h3>
        <h2 class="error" v-if="viewNoResults()">
          Non sono presenti ristoranti in questa categoria! &nbsp; : (
        </h2>

        <ul class="business">
        {{-- by name --}}
          <li class="business-item" v-if="viewNamesResults()" v-for="(business, i) in businessesToRender" :key="i">
            <a :href="'business/'+ business.id">
              <div class="business-item-top">
                <div class="business-item-top-logo">
                  <img :src="business.logo" alt="business.name">
                </div>
                <h3>@{{ business.name }}</h3>
              </div>
              <div class="business-item-description" v-if="business.description.length > 100">
                @{{ business.description.slice(0, 100) }}[...]
              </div>
              <div class="business-item-description" v-else>
                @{{ business.description }}
              </div>
              <div class="business-item-time">
                <span>Dalle: @{{ business.opening_time }}</span><br>
                <span>Alle: @{{ business.closing_time }}</span>
              </div>
              <div class="business-item-address">
                <i class="fas fa-map-marker-alt"></i>
                @{{ business.address }}
              </div>
            </a>
          </li>
          {{-- / by name --}}
          {{-- by type --}}
          <li class="business-item" v-if="viewTypesResults()" v-for="(business, i) in businessesForType" :key="i">
            <a :href="'business/'+ business.id">
              <div class="business-item-top">
                <div class="business-item-top-logo">
                  <img :src="business.logo" alt="business.name">
                </div>
                <h3>@{{ business.name }}</h3>
              </div>
              <div class="business-item-description" v-if="business.description.length > 100">
                @{{ business.description.slice(0, 100) }}[...]
              </div>
              <div v-else>
                @{{ business.description }}
              </div>
              <div class="business-item-time">
                <span>Dalle: @{{ business.opening_time }}</span><br>
                <span>Alle: @{{ business.closing_time }}</span>
              </div>
              <div class="business-item-address">
                <i class="fas fa-map-marker-alt"></i>
                @{{ business.address }}
              </div>
            </a>
          </li>
          {{-- / by type --}}
        </ul>
      </div>
    </section>
    {{-- / Businesses List --}}

  </div>
  {{-- /HOME CONTAINER  --}}
@endsection
