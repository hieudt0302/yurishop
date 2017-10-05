@extends('layouts.master')
@section('title','Tìm kiếm')
@section('content')

<div class="container search">
    <div class="row search-title">@lang('common.search-message') "<span class="keyword">{{ $keyword }}</span>"</div>
    <div class="row product-box">
        <div class="col-md-12 search-subject">@lang('product.product')</div>
        @if(!empty($products))
        <div class="row multi-columns-row">
    
            @foreach($products as $product)
            <?php $productSeo = \DB::table('seo')->where('system_id', $product->system_id)->first(); ?>
            <!-- Shop Item -->
            <div class="col-md-4 col-lg-4 mb-60 mb-xs-40">
                
                <div class="post-prev-img">
                    
                    <a href="{{ route('front.item.show',$productSeo->slug) }}"><img src="{{ asset('public/assets/img/product/' . $product->thumb) }}" alt="" /></a>
                    
                    @if($product->is_promote == 1)
                    <div class="intro-label">
                        <span class="label label-danger bg-red">Sale</span>
                    </div>
                    @endif 

                </div>
                
                <div class="post-prev-title font-alt align-center">
                    <a href="{{ route('front.item.show',$productSeo->slug) }}">{{ $product->name }}</a>
                </div>

                <div class="post-prev-text align-center">
                    @if($product->is_promote == 1)
                    <del>{!! price_format($product->default_price,'VNĐ') !!}</del>
                    &nbsp;
                    <strong>{!! price_format($product->promote_price,'VNĐ') !!}</strong>
                    @else
                    <strong>{!! price_format($product->default_price,'VNĐ') !!}</strong>
                    @endif    
                </div>
                
                <div class="post-prev-more align-center">
                    <a href="#" class="btn btn-mod btn-gray btn-round"><i class="fa fa-shopping-cart"></i> @lang('shoppings.add-cart')</a>
                </div>
                
            </div>
            <!-- End Shop Item -->
            @endforeach
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
    
            @foreach($blogs as $blog)
            <?php $blogSeo = \DB::table('seo')->where('system_id', $blog->system_id)->first(); ?>                
            <!-- Post Item -->
            <div class="col-md-6 col-lg-6 mb-60 mb-xs-40">
                
                <div class="post-prev-img">
                    <a href="{{ route('front.item.show',$blogSeo->slug) }}"><img src="{{ asset('public/assets/img/blog/' . $blog->thumb) }}" alt="" /></a>
                </div>
                
                <div class="post-prev-title font-alt">
                    <a href="{{ route('front.item.show',$blogSeo->slug) }}">{{ $blog->title }}</a>
                </div>
                
                <div class="post-prev-info font-alt">
                    <a href="">John Doe</a> | {!! date("d-m-Y",strtotime($blog->create_time)) !!} | <i class="fa fa-eye"></i>{{ $blog->views }}
                </div>
                
                <div class="post-prev-text">
                    @if($blog->introduce != '')
                        {{ truncate($blog->introduce,300) }}
                    @endif
                </div>
                
                <div class="post-prev-more">
                    <a href="{{ route('front.item.show',$blogSeo->slug) }}" class="btn btn-mod btn-gray btn-round">@lang('blog.read-more') <i class="fa fa-angle-right"></i></a>
                </div>
                
            </div>
            <!-- End Post Item -->
            @endforeach
            
        </div>
        <div class="pagination">{!! $blogs->appends(request()->input())->render() !!}</div>
        @else
        <div class="col-md-12 null">@lang('common.no-result')</div>
        @endif
    </div>
</div>

@endsection
