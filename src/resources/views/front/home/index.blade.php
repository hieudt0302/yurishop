@extends('layouts.master')
@section('title','Pokofarms - Home')
@section('content')

    <!-- Social Bar -->
   <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59eb390395f7b200121c29f0&product=sticky-share-buttons"></script>
   <!-- End Social Bar -->
   
    <!-- Slider -->
    @include('front.home.slider')
    <!-- End Slider -->

<section id="decorate">
    <div class="row">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <img src={{ asset('images/trust-nature.png') }} alt="decorate">
            </div>
        </div>
    </div>
</section>
<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="ab-intro">
                    <p>@lang('common.poko-message')</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="ab-item">
                    <img src="{{ asset('images/logo/poko.jpg') }}" alt="">
                    <h2>@lang('home.about-us')</h2>
                    <p>{{$about_us->translation->description}}</p>
                    <a class="learnmore" href="{{url('/about')}}">@lang('common.more-details')</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="ab-item">
                    <img src="{{ asset('images/logo/origin.jpg') }}" alt="">
                    <h2>@lang('home.product-origin')</h2>
                    <p>{{$product_origin->translation->description}}</p>
                    <a class="learnmore" href="{{url('/product-origin')}}">@lang('common.more-details')</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="ab-item">
                    <img src="{{ asset('images/logo/fairtrade.jpg') }}" alt="">
                    <h2>@lang('home.product-quality')</h2>
                    <p>{{$product_quality->translation->description}}</p>
                    <a class="learnmore" href="{{url('/product-quality')}}">@lang('common.more-details')</a>
                </div>
            </div>
        </div>
    </div>
</div>      
    
    <!-- Products -->
    @include('front.home.products')
    <!-- End Products -->

    <!-- Blogs -->
    @include('front.home.blogs')
    <!-- End Blogs -->

    <!-- Social -->

    <!-- End Social -->
@endsection