@extends('layouts.master')
@section('title','Tìm kiếm')
@section('content')

<div class="container search">
    <div class="row search-title">Kết quả tìm kiếm từ khóa "<span class="keyword">{{ $keyword }}</span>"</div>
    <div class="row product-box">
        <div class="col-md-12 search-subject">Sản phẩm</div>
        @if(!empty($products))
        <div class="col-md-12 product-list">
            @foreach($products as $product)
            <?php $productSeo = \DB::table('seo')->where('system_id', $product->system_id)->first(); ?>
            <div class="col-md-3 col-sm-4 col-xs-6 product-single">
                <a href="{{ route('front.item.show',$productSeo->slug) }}" class="product-url">
                    <img class="product-thumb" src="{{ asset('public/assets/img/product/' . $product->thumb) }}" alt="{{ $product->name }}" />
                    <span class="product-name">{{ $product->name }}</span>
                    @if($product->introduce != '')
                    <div class="product-info">
                        <p>{{ $product->introduce }}</p>
                    </div>
                    @endif
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="col-md-12 null">Không có sản phẩm nào</div>
        @endif
    </div>
    <div class="row blog-box">
        <div class="col-md-12 search-subject">Bài viết</div>
        @if(!empty($blogs))
        <div class="col-md-12 blog-list">
            @foreach($blogs as $blog)
            <?php $blogSeo = \DB::table('seo')->where('system_id', $blog->system_id)->first(); ?>
            <div class="col-md-3 col-sm-4 col-xs-6 blog-single">
                <a href="{{ route('front.item.show',$blogSeo->slug) }}" class="blog-url" title="{{ $blog->title }}">
                    <img class="blog-thumb" src="{{ asset('public/assets/img/blog/' . $blog->thumb) }}" alt="{{ $blog->title }}" />
                    <span class="blog-title">{{ $blog->title }}</span>
                    @if($blog->introduce != '')
                    <div class="blog-info">
                        <p>{{ $blog->introduce }}</p>
                    </div>
                    @endif
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="col-md-12 null">Không có bài viết nào</div>
        @endif
    </div>
</div>

@endsection
