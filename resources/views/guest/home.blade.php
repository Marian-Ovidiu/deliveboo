
@extends('layouts.base')
@section('title', 'Home Page')

@section('content')

<main id="app" class="main-home">
    <div class="row">
        <div class="col-xl-12  col-lg-12 col-md-12 col-sm-12 col-12 row-jumbotronn">
            <div class="row-jumbotronn-row row">
                <div class="col-xl-12  col-lg-12 col-md-12 col-12 row-jumbotronn-row-title fl">
                    Deliveboo
                </div>
            </div>
            <div class="row-jumbotronn-row row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 row-jumbotronn-row-subtitle fl">
                    Delivered fresh and hot at your doorstep
                </div>
            </div>

            <div class="row-jumbotronn-row row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 row-jumbotronn-row-space fl"></div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 row-jumbotronn-row-search fl">
                    <div class="input-group border rounded-pill p-3">
                        <input type="search" placeholder="Cerca per nome" class="form-control" @keyup = "filterBusinessesByName(query)" class="form-control" v-model="query" >
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 row-jumbotronn-row-space fl"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 row-types">
            <div class="row-types-row row">
                <div class="col-xl-12 col-lg-12 col-md-12 row-types-row-title fl">
                    Scegli per categoria
                </div>
            </div>
            <div class="row-types-row row">
                <div class="col-xl-2 col-lg-2 col-md-2 row-types-row-space fl"></div>
                <div class="col-xl-8 col-lg-8 col-md-8 row-types-row-types fl">
                    <div class="row-types-row-types-row row">
                        <div class="col-xl-3 col-lg-4 col-md-5 row-types-row-types-row-type" v-for="(type, i) in allTypes">
                            <div class="row-types-row-types-row-type-t">
                                <a href="#restaurants-row" v-on:click="filterBusinessesByTypes(type.name)">
                                    <img alt="type.name" v-bind:src="type.img" class="rounded" width="200" height="100">
                                    <h6>
                                        <span style="color:black;">@{{ type.name }}</span>
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 row-types-row-space fl"></div>
            </div>
        </div>
    </div>

    <div class="row" id="restaurants-row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row-restaurants">
            <div class="row-restaurants-row row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row-restaurants-row-title">Choose From Most Popular</div>
            </div>
            <div class="row-restaurants-row row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row-restaurants-row-subtitle">
                    All the top restaurant in your city
                </div>
                <div v-if="businessesForType.length === 0 && !showBusinessesToRender"
                class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row-restaurants-row-subtitle">
                    Non sono presenti ristoranti in questa categoria!
                </div>
            </div>


            <div id="restaurants" data-spy="restaurants" data-target="#restaurants" class="row-restaurants-row row">
                <div class="col-xl-1 col-lg-1  col-md-1 col-sm-0 col-3 row-restaurants-row-space fl"></div>
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-6 row-restaurants-row-cards fl">

                    <div class="row-restaurants-row-cards-row row">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 row-restaurants-row-cards-row-card"
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
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 row-restaurants-row-cards-row-card"
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
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-0 col-3 row-restaurants-row-space fl"></div>
            </div>


        </div>
    </div>
</main>

@endsection
