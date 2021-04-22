@extends('admin.layout')

@section('content')

<div class="wrap">
    <header class="header-show">
        <div class="header-show-row">
             <div class=" header-show-row-jumbotronn" style="background-image: url('{{asset($business->logo)}}">
                <div class="header-show-row-jumbotronn-cover">
                    {{$business->name}}


                </div>
                <div class="col-1 header-show-row-jumbotronn-cover-space"></div>
            </div>
        </div>
    </header>
</div>






































@endsection

