@extends('layouts.master')
@section('title','Pô Kô Farms - Home')
@section('content')

<!-- Slider -->
@include('front.home.slider')
 <!-- End Slider -->
<!-- <section id="decorate">
    <div class="row">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <img src={{ asset('images/trust-nature.png') }} alt="decorate">
            </div>
        </div>
    </div>
</section> -->
<div class="about">
    <div class="container">

        <div class="row">

            <!-- Video -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="ab-intro">
                        <p>- <b>{{$video_message->translation->title??""}}</b> -</p>
                        <p>"{{$video_message->translation->description??""}}"</p>
                        </br>
                    </div>
                </div>
            </div>

            <div class="video-section">
                <div class="video-wrapper">
                    <iframe width="560" height="315" src="{{ __('home.home-video-url')}}?autoplay=1&amp;rel=0&amp;mute=1" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <!-- End Video -->            
        </div>

        <div class="row is-same-height">
            <div class="col-md-3 col-sm-3 col-xs-12 ab-items">
                <div class="ab-item">
                    <img src="{{ asset('images/logo/poko.png') }}" alt="">
                    <h2>@lang('home.about-us')</h2>
                    <p>{{ str_pad($pokofarms_message->translation->description??"",200) }}</p>
                    <a class="learnmore" href="{{url('/about')}}">@lang('common.more-details')</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 ab-items">
                <div class="ab-item">
                    <img src="{{ asset('images/logo/origin.png') }}" alt="">
                    <h2>@lang('home.product-origin')</h2>
                    <p>{{ str_pad($product_origin->translation->description??"",200) }}</p>
                    <a class="learnmore" href="{{url('/product-origin')}}">@lang('common.more-details')</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 ab-items">
                <div class="ab-item">
                    <img src="{{ asset('images/logo/fairtrade.png') }}" alt="">
                    <h2>@lang('home.product-quality')</h2>
                    <p>{{ str_pad($product_quality->translation->description??"",200) }}</p>
                    <a class="learnmore" href="{{url('/product-quality')}}">@lang('common.more-details')</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 ab-items">
                <div class="ab-item">
                    <img src="{{ asset('images/logo/community-icon.png') }}" alt="">
                    <h2>@lang('home.community')</h2>
                    <p>{{ str_pad($community_category->translation->description??"",200)}}</p>
                    <a class="learnmore" href="{{url('subject/posts/'.$community_category->slug)}}">@lang('common.more-details')</a>
                </div>
            </div>            
        </div>

    </div>
</div>      
    <!-- Quotes -->
    @include('front.home.quotes')
    <!-- End Quotes -->
        
    <!-- Promo -->
    @include('front.home.promo')
    <!-- End Promo -->

    <!-- Products -->
    @include('front.home.products')
    <!-- End Products -->


    <!-- Subscribe -->
<!--     @include('front.home.subscribe') -->
    <!-- End Subscribe -->    

    <!-- Blogs -->
<!--     @include('front.home.blogs') -->
    <!-- End Blogs -->

    <!-- Social -->

    <!-- End Social -->
@endsection