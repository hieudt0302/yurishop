@extends('layouts.master')
@section('title','Pô Kô Farms - Home')
@section('content')

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
                        <a href="/subject/products/my-pham">
                            <img src="frontend/img/banners/banner-hp-1.jpg" alt="Banner">
                        </a>
                        <div class="banner-caption">CẬP NHẬT XU HƯỚNG</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="banner">
                        <h3>THỜI TRANG</h3>
                        <a href="/subject/products/thoi-trang">
                            <img src="frontend/img/banners/banner-hp-2.jpg" alt="Banner">
                        </a>
                        <div class="banner-caption">LUÔN NHIỀU MẪU SALE MẠNH</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="banner">
                        <h3>MẸ & BÉ</h3>
                        <a href="/subject/products/me-va-be">
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
                    <a href="{{url('/products')}}/{{$product->slug}}" title="" class="product-image">
                        <img src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="">
                    </a>                   
                    @if($product->special_price != 0 && $product->special_price_start_date  <= $curDate && $curDate <= $product->special_price_end_date )
                    <div class="product-label"><span class="discount">SALE</span></div>
                    @endif
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="{{url('/products')}}/{{$product->slug}}">{{$product->translation->name??$product->name}}</a></h2>
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

    <div class="container mb-lg">
        <h2 class="slider-title v2">
            <span class="inline-title">SẢN PHẨM ĐƯỢC YÊU THÍCH</span>
            <span class="line"></span>
        </h2>

        <div class="owl-carousel owl-theme manual top-products-carousel">           
            @foreach ($best_sellers_products as $product)
            <div class="product">
                <figure class="product-image-area">
                    <a href="{{url('/products')}}/{{$product->slug}}" title="" class="product-image">
                        <img src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="">
                    </a>
                   
                    @if($product->special_price != 0 && $product->special_price_start_date  <= $curDate && $curDate <= $product->special_price_end_date )
                    <div class="product-label"><span class="discount">SALE</span></div>
                    @endif
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="{{url('/products')}}/{{$product->slug}}">{{$product->translation->name??$product->name}}</a></h2>
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

    <div class="container mb-lg">
        <h2 class="slider-title v2">
            <span class="inline-title">SALES</span>
            <span class="line"></span>
        </h2>

        <div class="owl-carousel owl-theme manual top-products-carousel">            
            @foreach ($sale_products as $product)
            <div class="product">
                <figure class="product-image-area">
                    <a href="{{url('/products')}}/{{$product->slug}}" title="" class="product-image">
                        <img src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="">
                    </a>                   
                    @if($product->special_price != 0 && $product->special_price_start_date  <= $curDate && $curDate <= $product->special_price_end_date )
                    <div class="product-label"><span class="discount">SALE</span></div>
                    @endif
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="{{url('/products')}}/{{$product->slug}}">{{$product->translation->name??$product->name}}</a></h2>
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

    <hr>          

    <div class="container">
        <h2 class="slider-title v2 heading-primary text-center mt-sm">
            THƯƠNG HIỆU CHÍNH 
        </h2>        

        <div class="owl-carousel owl-theme manual clients-carousel owl-no-narrow">
            <a href="{{url('/subject/products/tags/shisheido')}}" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/brands/shisheido.png" alt="Brand">
            </a>
            <a href="{{url('/subject/products/tags/shu_uemura')}}" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/brands/shu_uemura.jpg" alt="Brand">
            </a>
            <a href="{{url('/subject/products/tags/kose')}}" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/brands/kose.png" alt="Brand">
            </a>
            <a href="{{url('/subject/products/tags/kanebo')}}" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/brands/kanebo.png" alt="Brand">
            </a>            
            <a href="{{url('/subject/products/tags/muji')}}" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/brands/muji.png" alt="Brand">
            </a>
            <a href="{{url('/subject/products/tags/hm')}}" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/brands/hm.png" alt="Brand">
            </a>
            <a href="{{url('/subject/products/tags/uniqlo')}}" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/brands/uniqlo.png" alt="Brand">
            </a>
            <a href="{{url('/subject/products/tags/gu')}}" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/brands/gu.png" alt="Brand">
            </a>
            <a href="{{url('/subject/products/tags/meiji')}}" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/brands/meiji.png" alt="Brand">
            </a>
            <a href="{{url('/subject/products/tags/morinaga')}}" title="Brand Name" class="client">
                <img class="img-responsive" src="frontend/img/brands/morinaga.jpg" alt="Brand">
            </a>                        
        </div>
    </div>

    <hr>

    <div class="container">
        <h2 class="slider-title v2 heading-primary text-center mt-sm">
            BÀI VIẾT MỚI 
        </h2>

        <div>
            @foreach($new_blogs as $post)
            <article class="post col-md-6">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="post-image">
                            <div class="img-thumbnail">
                                <a href="{{url('/posts')}}/{{$post->slug}}">
                                    <img class="img-responsive" src="{{asset('/storage/images/blog/preview/')}}/{{$post->img}}" alt="Post">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-7">
                        <div class="post-date">
                            <span class="day">{{ date('d', strtotime($post->created_at)) }}</span>
                            <span class="month">{{ date('m', strtotime($post->created_at)) }}</span>
                        </div>

                        <div class="post-content">

                            <h2><a href="{{url('/')}}/posts/{{$post->slug}}">{{$post->translation->title}}</a></h2>
                            <p>{{ str_limit($post->translation->excerpt??"", $limit = 150, $end = '...') }}</p>

                            <a href="{{url('/')}}/posts/{{$post->slug}}" class="btn btn-link">Đọc thêm</a>

                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>


</div>
@endsection