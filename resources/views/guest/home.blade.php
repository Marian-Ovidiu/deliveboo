{{-- MARIAN --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- font awesome --}}
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/> --}}
    {{-- vuejs --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    {{-- style --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{ config('app.name', 'Deliveboo') }}</title>
</head>
<body>
    <div class="wrapper">

    @include('parts.header')

    <main id="app" class="main-home">
        <div class="row">
            <div class="col-12 row-jumbotronn">
                <div class="row-jumbotronn-row row">
                    <div class="col-12 row-jumbotronn-row-title fl">
                        Deliveboo
                    </div>
                </div>
                <div class="row-jumbotronn-row row">
                    <div class="col-12 row-jumbotronn-row-subtitle fl">
                        Delivered fresh and hot at your doorstep
                    </div>
                </div>

                <div class="row-jumbotronn-row row">
                    <div class="col-2 row-jumbotronn-row-space fl"></div>
                    <div class="col-8 row-jumbotronn-row-search fl">
                        <div class="input-group border rounded-pill p-3">
                            <input type="search" placeholder="Cerca per nome" class="form-control" @keyup="emptyBussinessesForType()" class="form-control" v-model="query" >
                        </div>
                    </div>
                    <div class="col-2 row-jumbotronn-row-space fl"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 row-types">
                <div class="row-types-row row">
                    <div class="col-12 row-types-row-title fl">
                        Scegli per categoria
                    </div>
                </div>
                <div class="row-types-row row">
                    <div class="col-2 row-types-row-space fl"></div>
                    <div class="col-8 row-types-row-types fl">
                        <div class="row-types-row-types-row row">
                            <div class="col-3 row-types-row-types-row-type" v-for="(type, i) in types">
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
                    <div class="col-2 row-types-row-space fl"></div>
                </div>
            </div>
        </div>

        <div class="row" id="restaurants-row">
            <div class="col-12 row-restaurants">
                <div class="row-restaurants-row row">
                    <div class="col-12 row-restaurants-row-title">Choose From Most Popular</div>
                </div>
                <div class="row-restaurants-row row">
                    <div class="col-12 row-restaurants-row-subtitle">All the top restaurant in your city</div>
                </div>
                <div id="restaurants" data-spy="restaurants" data-target="#restaurants" class="row-restaurants-row row">
                    <div class="col-1 row-restaurants-row-space fl"></div>
                    <div class="col-10 row-restaurants-row-cards fl">

                        <div class="row-restaurants-row-cards-card"
                            v-for="(business, i) in businesses"
                            v-bind:key="i"
                            v-if="searchFunction(business.name)">
                            <a v-bind:href="'business/'+ business.id">
                                <div class="row-restaurants-row-cards-card-img" :style="{ 'background-image': 'url(' + business.logo + ')' }"></div>
                                <div class="row-restaurants-row-cards-card-body">
                                    <div class="row-restaurants-row-cards-card-body-name">
                                        @{{ business.name }}
                                    </div>
                                    <div class="row-restaurants-row-cards-card-body-description">
                                        @{{ business.description }}
                                    </div>
                                    <div class="row-restaurants-row-cards-card-body-title">Orari</div>
                                    <div class="row-restaurants-row-cards-card-body-hours">
                                    <span>Dalle: @{{ business.opening_time }}</span><br>
                                    <span>Alle: @{{ business.closing_time }}</span>
                                    </div>
                                    <div class="row-restaurants-row-cards-card-body-address">
                                        <i class="fas fa-map-marker-alt"></i>
                                        @{{ business.address }}
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="row-restaurants-row-cards-card"
                            v-for="(business, i) in businessesForType"
                            v-bind:key="i"
                            v-if="businessesForType.length > 0">
                            <a v-bind:href="'business/'+ business.id">
                                <div class="row-restaurants-row-cards-card-img" :style="{ 'background-image': 'url(' + business.logo + ')' }"></div>
                                <div class="row-restaurants-row-cards-card-body">
                                    <div class="row-restaurants-row-cards-card-body-name">
                                        @{{ business.name }}
                                    </div>
                                    <div class="row-restaurants-row-cards-card-body-description">
                                        @{{ business.description }}
                                    </div>
                                    <div class="row-restaurants-row-cards-card-body-title">Orari</div>
                                    <div class="row-restaurants-row-cards-card-body-hours">
                                    <span>Dalle: @{{ business.opening_time }}</span><br>
                                    <span>Alle: @{{ business.closing_time }}</span>
                                    </div>
                                    <div class="row-restaurants-row-cards-card-body-address">
                                        <i class="fas fa-map-marker-alt"></i>
                                        @{{ business.address }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-1 row-restaurants-row-space fl"></div>
                </div>
            </div>
        </div>
    </main>
    @include('parts.footer')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
