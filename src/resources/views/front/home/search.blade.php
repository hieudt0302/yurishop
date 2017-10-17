@extends('layouts.master')
@section('title','Pokofarms - Tìm kiếm')
@section('content')

<div class="container search">
    <div class="row search-title">@lang('common.search-message') "<span class="keyword">{{ $search_key }}</span>"</div>
    <div class="row products">
        <div class="col-md-12 search-subject">@lang('product.product')</div>
        @if(!empty($products))
        <div class="row multi-columns-row">
            <div class="products-it grid">
            @foreach($products as $product)
                <div class="pro-it col-md-3 col-sm-6 col-xs-12
                            <?php if($product->is_new) echo 'new';
                                  elseif($product->is_hot) echo 'hot';
                                  elseif($product->is_sale) echo 'sale'; ?>">
                    <p>
                        @if($product->is_new) <span class="new">new</span> 
                        @elseif($product->is_hot) <span class="hot">hot</span>
                        @elseif($product->is_sale) <span class="sale-pr">sale</span> @endif
                    </p>
                    <img class="pro-img" src="images/uploads/p1.jpg" alt="">
                    <div class="pro-infor">
                        <h2><a href="{{url('/products')}}/{{$product->id}}">{{$product->name}}</a></h2>
                        <span class="pro-cost">
                            @if($product->special_price != 0 && $product->special_price_start_date  <= $product->special_price_end_date )
                            <del class="section-text">{{$product->price}}</del> &nbsp;
                            <strong>{{$product->special_price}}</strong>
                            @else
                                @if($product->old_price > 0)
                                <del class="section-text">{{$product->old_price}}</del> &nbsp;
                                @endif
                                <strong>{{$product->price}}</strong>
                            @endif
                        </span>
                    </div>
                    <div class="hover-inner">   
                        <a class="search" href="{{url('/products')}}/{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Quick view">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
                        <a class="cart" href="#" data-toggle="tooltip" data-placement="top" title="Add to cart">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                        <a class="wishlist" href="#"  data-toggle="tooltip" data-placement="top" title="Add to wishlist">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            @endforeach                             
            </div>  
        </div>
        <div class="pagination">{!! $products->appends(request()->input())->render() !!}</div>
        @else
        <div class="col-md-12 null">@lang('common.no-result')</div>
        @endif
    </div>
    <div class="row blog-box">
        <div class="col-md-12 search-subject">@lang('header.blog')</div>
        @if(!empty($blogs))
        <div class="row multi-columns-row">
            
        </div>
        <div class="pagination">{!! $blogs->appends(request()->input())->render() !!}</div>
        @else
        <div class="col-md-12 null">@lang('common.no-result')</div>
        @endif
    </div>
</div>

@endsection
