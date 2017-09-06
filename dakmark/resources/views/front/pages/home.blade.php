

@extends('layouts.master')
@section('title','Cà phê Đak Hà - Trang chủ')
@section('content')

    <link  href="{{url('/')}}/public/assets/css/coreSlider.css" rel="stylesheet" type="text/css">
    <script src="{{url('/')}}/public/assets/js/coreSlider.js"></script>
    <script>
    $('#example1').coreSlider({
      pauseOnHover: false,
      interval: 3000,
      controlNavEnabled: true
    });

    </script>

</div>  
<!--banner-->

    <!--content-->
<div class="content">
     <!--new-arrivals-->
        <div class="new-arrivals-w3agile">
            <div class="container">
                <h2 class="tittle">@lang('home.new-products')</h2>
                <div class="arrivals-grids equalheight">
                    @foreach($new_products as $product)
                    <div class="col-md-3 arrival-grid simpleCart_shelfItem columns">
                        <div class="grid-arr">
                            <div  class="grid-arrival">
                                <figure>        
                                    <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                        <div class="grid-img">
                                            <img  src="{{ asset('public/assets/img/product/' . $product->thumb) }}" class="img-responsive"  alt="">
                                        </div>          
                                    </a>        
                                </figure>   
                            </div>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="women">
                                <h6><a href="single.html">{{ $product->name }}</a></h6>
                                <div class="price">
                                   @if($product->is_promote == 1)
                                    <p ><del>{!! price_format($product->default_price,'VNĐ') !!}</del>
                                    <em class="item_price">{!! price_format($product->promote_price,'VNĐ') !!}</em></p>
                                    @else
                                   <span class="cur-price">{!! price_format($product->default_price,'VNĐ') !!}</span>
                                    @endif
                                </div>
                                <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <!--new-arrivals-->
    <!--best-sellers-->
        <div class="best-sellers-w3agile">
            <div class="container">
                <h2 class="tittle">@lang('home.best-sellers')</h2>
                <div class="arrivals-grids">
                    @foreach($best_sellers as $product)
                    <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                        <div class="grid-arr">
                            <div  class="grid-arrival">
                                <figure>        
                                    <a href="" class="product-url">
                                        <div class="grid-img">
                                            <img  src="{{ asset('public/assets/img/product/' . $product->thumb) }}" class="img-responsive"  alt="">
                                        </div>          
                                    </a>        
                                </figure>   
                            </div>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="women">
                                <h6><a href="single.html">{{ $product->name }}</a></h6>
                             <div class="price">
                                   @if($product->is_promote == 1)
                                    <p ><del>{!! price_format($product->default_price,'VNĐ') !!}</del>
                                    <em class="item_price">{!! price_format($product->promote_price,'VNĐ') !!}</em></p>
                                    @else
                                   <span class="cur-price">{!! price_format($product->default_price,'VNĐ') !!}</span>
                                    @endif
                                </div>
                                <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <!--best-sellers-->
    <!--our-blogs-->
        <div class="our-blogs-w3agile">
            <div class="container">
                <h2 class="tittle">@lang('home.our-blogs')</h2>
                <div class="arrivals-grids">
                    @foreach($new_blogs as $blog)
                    <div class="col-md-4 arrival-grid simpleCart_shelfItem">
                        <div class="grid-arr">
                            <div  class="grid-arrival">
                                <figure>        
                                    <a href="" class="product-url">
                                        <div class="grid-img-blog">
                                            <img  src="{{ asset('public/assets/img/blog/' . $blog->thumb) }}" class="img-responsive"  alt="">
                                        </div>          
                                    </a>        
                                </figure>   
                            </div>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="women">
                                <h6><a href="single.html">{{ $blog->title }}</a></h6>
                                 <div class="price">
                                    {{ str_limit($blog->introduce, $limit = 120, $end = '...') }}
                                </div>
                                <a href="#" data-text="View more" class="my-cart-b item_add">@lang('common.more-details')</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <!--our-blogs-->  
</div>
<!--content-->

<script>
    $(document).ready(function(){

    });
</script>    
@endsection
