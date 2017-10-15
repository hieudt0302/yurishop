@extends('layouts.master') 
@section('title','Dakmark Foods')
@section('header')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection 
@section('content')

<!-- Head Section -->
<section class="small-section bg-dark-alfa-30 pt-30 pb-30" style="background-image:url('{{ asset('public/assets/rhythm/images/foods/caphe.jpg') }}');">
    <div class="relative container align-left">

        <div class="row">

            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{$info_page_translation->title}}</h1>
            </div>

            <div class="col-md-4 mt-30">
            </div>
        </div>

    </div>
</section>
<!-- End Head Section -->


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