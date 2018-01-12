@extends('layouts.master') 
@section('title','Pô Kô Farms')

@section('content')

<!-- Head Section -->


<!-- <section id="aboutv1">
    <div class="container">
        <div class="row">
            <div class="decorate">
                <img src="frontend/images/logo2.png" alt="decorate">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="ab-intro">
                    <p>{!! $info_page_translation->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="aboutflowerabv2 about floweraboutv4">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="ab-flow-r">
                    <div class="ab-flower-it">
                        <h1>{{$info_page_translation->title}}</h1>
                        <p>{!! $info_page_translation->content !!} </p>
                    </div>
                    <div class="ab-flower-it">
                        <h1>Our vision</h1>
                        <p>Pô Kô Farms determines to become a sustainable development cooperative, that helps farmers to have a better life through responsible coffee producing. Furthermore, Pô Kô Farms will be the first choice of customers who want to buy Fairtrade certified coffee in particular and agricutural  products in general from Vietnam.</p>
                    </div>
                    <div class="ab-flower-it">
                        <h1>Our mission</h1>
                        <p>Pô Kô Farms aims to become a cooperative that specializes in producing and supplying high quality Fairtrade certified coffee for current buyers and new customers in the future.
By growing and selling Fairtrade certified coffee, Pô Kô Farms wishes to improve farmers income and quality of life for their  households .
Sharing together and developing together, make the world better with quality coffee.
 </p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <img src="frontend/images/uploads/abflow-right.png" alt="">
            </div>
        </div>
    </div>
</div> -->

<div class="about aboutv2 floweraboutv1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="heading-sec">
                    <h1>{{$info_page_translation->title}}</h1>
                    <h4 class="green">-{!! $info_page_translation->description !!}-</h4>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="ab-decorate">
                    <img src="frontend/images/logo2.png" alt="">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="ab-intro">
                    <p>{!! $info_page_translation->content !!} </p>
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="ab-item">
                    <img src="frontend/images/uploads/abflower1.png" alt="">
                    <h2>@lang('about.our-vision')</h2>
                    <p>@lang('about.vision-details')</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="ab-item">
                    <img src="frontend/images/uploads/abflower2.png" alt="">
                    <h2>@lang('about.our-mission')</h2>
                    <p>@lang('about.mission-details')</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="farm-img">
            <img src="frontend/images/uploads/aboutv1-bg-footer.jpg" alt="farm">
        </div>
    </div>
</div>

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