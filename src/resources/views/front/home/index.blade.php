@extends('layouts.master')
@section('title','Pokofarms - Home')
@section('content')
    <!-- Slider -->
    @include('front.home.slider')
    <!-- End Slider -->

    <section id="farm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-sec">
                        <h1>Pokofarms products </h1>
                        <h4>-The bests for you-</h4>
                        <div class="ab-intro">
                            <p>We are <span>Online Market</span> of organic fruits, vegetables, juices and dried fruits. Visit our site for a complete list of 
                            exclusive we are stocking.</p>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="farm-it">
                        <i class="organie-carrot"></i>
                        <div class="title">
                            @lang('home.about-us')
                        </div>
                        <p>Cur tantas regiones barbarorum peat dibus obiit, tot mariata uisque euismod convallis eros quis lacinia </p>
                        <a href="#" class="readmore3">@lang('common.more-details')</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="farm-it">
                        <i class="organie-tractor"></i>
                        <div class="title">
                            @lang('home.product-origin')
                        </div>
                        <p>Cur tantas regiones barbarorum peat dibus obiit, tot mariata uisque euismod convallis eros quis lacinia </p>
                        <a href="#" class="readmore3">@lang('common.more-details')</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="farm-it">
                        <i class="organie-egg"></i>
                        <div class="title">
                            @lang('home.product-quality')
                        </div>
                        <p>Cur tantas regiones barbarorum peat dibus obiit, tot mariata uisque euismod convallis eros quis lacinia </p>
                        <a href="#" class="readmore3">@lang('common.more-details')</a>
                    </div>
                </div>
            </div>
<!--             <div class="row">
                <div class="col-md-12">
                    <div class="farm-img">
                        <img src="{{ asset('frontend/images/uploads/farm-img.jpg') }}" alt="farm">
                    </div>
                </div>
            </div> -->
        </div>
    </section>    

    <!-- Products -->
    @include('front.home.products')
    <!-- End Products -->

    <!-- Blogs -->
    @include('front.home.blogs')
    <!-- End Blogs -->
@endsection