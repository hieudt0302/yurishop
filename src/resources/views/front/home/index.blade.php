@extends('layouts.master')
@section('title','Pokofarms - Home')
@section('content')
    <!-- Slider -->
    @include('front.home.slider')
    <!-- End Slider -->

    <!-- About -->
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="ab-intro">
                        <p>We are <span>Online Market</span> of organic fruits, vegetables, juices and dried fruits. Visit our site for a complete list of 
                        exclusive we are stocking.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="ab-item">
                        <img src="{{asset('frontend/images/uploads/ab1.png')}}" alt="">
                        <h2>@lang('home.about-us')</h2>
                        <p>About Us </p>
                        <a class="learnmore" href="/about-us">learn more</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="ab-item">
                        <img src="{{asset('frontend/images/uploads/ab2.png')}}" alt="">
                        <h2>@lang('home.product-origin')</h2>
                        <p>Product Origin </p>
                        <a class="learnmore" href="/product-origin">learn more</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="ab-item">
                        <img src="{{asset('frontend/images/uploads/ab3.png')}}" alt="">
                        <h2>@lang('home.product-quality')</h2>
                        <p>Product Quality </p>
                        <a class="learnmore" href="/product-quality">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Products -->
    @include('front.home.products')
    <!-- End Products -->

    <!-- Blogs -->
    @include('front.home.blogs')
    <!-- End Blogs -->
@endsection