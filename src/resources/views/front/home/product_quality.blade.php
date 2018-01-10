@extends('layouts.master') 
@section('title','Pô Kô Farms')

@section('content')

<!-- Head Section -->
<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$info_page_translation->title}}</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Head Section -->

<section id="farm">
    <div class="container">     
        <div class="row">
            <div class="col-md-12">
                <div class="heading-sec">
                    <h2>@lang('quality.message')</h2>
                </div>
            </div>
        </div>             
        <div class="row">
            <div class="col-md-4">
                <div class="farm-it">
                    <i class="ion-erlenmeyer-flask-bubbles"></i>
                    <div class="title">
                        @lang('quality.title1')
                    </div>
                    <p>@lang('quality.detail1')</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="farm-it">
                    <i class="ion-android-sync"></i>
                    <div class="title">
                        @lang('quality.title2')
                    </div>
                    <p>@lang('quality.detail2')</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="farm-it">
                    <i class="ion-ios-search-strong"></i>
                    <div class="title">
                        @lang('quality.title3')
                    </div>
                    <p>@lang('quality.detail3')</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="farm-img">
                    <img src="frontend/images/uploads/farm-img.jpg" alt="farm">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Info Page Section -->
<!-- <section class="page-section" id="about">
    <div class="container relative">
        <div class="section-text mb-50 mb-sm-20">
            <div class="row">
                {!! $info_page_translation->content !!}
            </div>
        </div>
    </div>
</section> -->

<!-- End Info Page Section -->

@endsection