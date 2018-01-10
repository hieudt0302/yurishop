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
<section id="decorate">
    <div class="row">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <img src="frontend/images/logo2.png" alt="decorate">
            </div>
        </div>
    </div>
</section>
<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="ab-intro">
                    <p>{!! $info_page_translation->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info Page Section -->
<section class="page-section" id="about">
    <div class="container relative">
        <div class="section-text mb-50 mb-sm-20">
            <div class="row">
                {!! $info_page_translation->content !!}
            </div>
        </div>
    </div>
</section>

<!-- End Info Page Section -->

@endsection