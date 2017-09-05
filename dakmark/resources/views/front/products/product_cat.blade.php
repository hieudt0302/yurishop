
@extends('layouts.master')
@section('title',$seo_title)
@section('content')

<div class="container product-cat">
    <div class="row cat-name">
        <span>{{ $productCat->name }}</span>
    </div>
    <div class="row">
            @foreach($products as $product)
            <?php $productSeo = \DB::table('seo')->where('system_id', $product->system_id)->first(); ?>
            <div class="col-md-3 col-sm-4 col-xs-6 product-single">
                <a href="{{ route('front.product.show',$productSeo->slug) }}" class="product-url">
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
</div>

@endsection