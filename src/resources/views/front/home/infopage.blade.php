@extends('layouts.master') 
@section('title','Poko Farms')

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