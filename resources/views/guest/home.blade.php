@extends('layouts.base')
@section('title', 'Home')

@section('content')
  {{-- HOME CONTAINER  --}}
  <div id="app" class="home-container">

    {{-- Jumbotron --}}
    <section class="topjumbotron">
      <div class="content">

        <div class="topjumbotron-left">
          <div class="titles">
            Cerca. Scegli. Ordina.
          </div>
          <div class="subtitles">
            Il tuo ristorante preferito a casa con un click.
          </div>
          <div class="input-group border rounded-pill p-3">
            <input type="search" placeholder="Inserisci il nome del ristorante" class="form-control" @keyup.enter = "scrollDown()"  @keyup = "filterBusinessesByName(query)" v-model="query" >
          </div>
        </div>

        <div class="topjumbotron-right">
          <img src="{{asset('img/01-home.png')}}" alt="Deliveboo">
        </div>
      </div>
    </section>
    {{-- / Jumbotron --}}

    {{-- Search by type --}}
    <section class="types">
      <div class="content">
        <h2 class="titles">Le nostre categorie</h2>
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
        <h2 class="error" v-if="viewNoResultsType()">
          Non sono presenti ristoranti in questa categoria! &nbsp;&nbsp; <b>: (</b>
        </h2>
        <h2 class="error" v-if="viewNoResultsName()">
          Non sono presenti ristoranti con questo nome! &nbsp;&nbsp; <b>: (</b>
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
