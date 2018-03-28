@extends('layouts.master')
@section('title','Pô Kô Farms - Home')
@section('content')

<!-- Slider -->
<!-- @include('front.home.slider') -->
 <!-- End Slider -->


<div role="main" class="main">
    
    <div class="home-slider-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme home-banner-slider" data-plugin-options="{'items':1, 'loop': false, 'margin': 5}">
                        @foreach($sliders as $slider)
                        <div>
                            <img class="img-responsive" src="{{asset('/storage/'.$slider->image) }}" alt="Slide">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banners-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="banner">
                        <h3>MỸ PHẨM</h3>
                        <a href="#">
                            <img src="frontend/img/banners/banner-hp-1.jpg" alt="Banner">
                        </a>
                        <div class="banner-caption">CẬP NHẬT XU HƯỚNG</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="banner">
                        <h3>THỜI TRANG</h3>
                        <a href="#">
                            <img src="frontend/img/banners/banner-hp-2.jpg" alt="Banner">
                        </a>
                        <div class="banner-caption">LUÔN NHIỀU MẪU SALE MẠNH</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="banner">
                        <h3>MẸ & BÉ</h3>
                        <a href="#">
                            <img src="frontend/img/banners/banner-hp-3.jpg" alt="Banner">
                        </a>
                        <div class="banner-caption">MẸ KHỎE BÉ KHỎE</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-lg">
        <h2 class="slider-title v2">
            <span class="inline-title">SẢN PHẨM MỚI</span>
            <span class="line"></span>
        </h2>

        <div class="owl-carousel owl-theme manual top-products-carousel">
            @php($curDate = Carbon\Carbon::now())            
            @foreach ($new_products as $product)
            <div class="product">
                <figure class="product-image-area">
                    <a href="{{url('/products')}}/{{$product->slug}}" title="Product Name" class="product-image">
                        <img src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="Product Name">
                    </a>
                    <a href="{{url('/products')}}/{{$product->slug}}" class="product-quickview">
                        <i class="fa fa-share-square-o"></i>
                        <span>Chi tiết</span>
                    </a>

                    <div class="product-actions">
                        <a href="#" class="addtocart" title="Thêm vào giỏ hàng">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>                    
                    @if($product->special_price != 0 && $product->special_price_start_date  <= $curDate && $curDate <= $product->special_price_end_date )
                    <div class="product-label"><span class="discount">SALE</span></div>
                    @endif
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="{{url('/products')}}/{{$product->slug}}" title="Product Name">{{$product->translation->name??$product->name}}</a></h2>
                    <div class="product-ratings">
                        <div class="ratings-box">
                            <div class="rating" style="width:{{$product->comments->avg('rate')/5*100}}%"></div>
                        </div>
                    </div>

                    <div class="product-price-box">
                        @if($product->special_price != 0 && $product->special_price_start_date  <= $curDate && $curDate <= $product->special_price_end_date )
                        <span class="old-price">{{FormatPrice::price($product->price)}}</span>
                        <span class="product-price">{{FormatPrice::price($product->special_price)}}</span>
                        @else
                        <span class="product-price">{{FormatPrice::price($product->price)}}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>

    <div class="container mb-xlg">

        <div class="owl-carousel owl-theme manual clients-carousel owl-no-narrow">
            <a href="#" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/demos/shop/brands/brand1.png" alt="Brand">
            </a>
            <a href="#" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/demos/shop/brands/brand2.png" alt="Brand">
            </a>
            <a href="#" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/demos/shop/brands/brand3.png" alt="Brand">
            </a>
            <a href="#" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/demos/shop/brands/brand4.png" alt="Brand">
            </a>
            <a href="#" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/demos/shop/brands/brand5.png" alt="Brand">
            </a>
            <a href="#" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/demos/shop/brands/brand1.png" alt="Brand">
            </a>
            <a href="#" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/demos/shop/brands/brand2.png" alt="Brand">
            </a>
        </div>
    </div>

</div>
@endsection