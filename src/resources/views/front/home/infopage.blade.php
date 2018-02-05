@extends('layouts.master') 
@section('title','Pô Kô Farms')

@section('content')

<!-- Head Section -->
<section class="page-header mb-lg">

    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>

            <li class="active">{{$info_page_translation->title}}</li>
        </ul>
    </div>
</section>
<!-- End Head Section -->


<!-- Info Page Section -->
<div class="container">

    <h2><strong>{{$info_page_translation->title}}</h2>

    <div class="row">
        <div class="col-md-12">
            <p>{!! $info_page_translation->content !!}</p>
        </div>
    </div>

</div>

<!-- End Info Page Section -->

@endsection