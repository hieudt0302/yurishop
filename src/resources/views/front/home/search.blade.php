@extends('layouts.master')
@section('title','Pokofarms - Tìm kiếm')
@section('content')

<!-- Head Section -->
<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>@lang('common.search-results')</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Head Section -->


<section class="shopgrid products">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="heading-sec">
                    <h1>@lang('header.products')</h1>                
                </div>              
            </div>
            <div class="left">
                @if(!empty($search_key) && count($products)==0)
                    @lang('common.zero-search-message')&nbsp;{{$search_key}}
                @endif 
            </div>            
        </div>
        @foreach($products as $key => $product_tran)
            @if($key == 0 || $key%4 === 0)
            <div class="row">
                <div class="products-it">
            @endif                    
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="pro-it">
                            <a href="{{url('/products')}}/{{$product_tran->product->slug}}">
                            <img class="pro-img" src="{{ asset('/storage') }}/{{$product_tran->product->GetMediaByOrderAsc()->source??'images/no-image.png'}}" alt="">
                            <div class="pro-infor">
                                <h2>{{$product_tran->name??$product_tran->product->name}}</h2>
                                <span class="pro-cost">{{$product_tran->product->price}}</span>
                            </div>
                        </div>
                    </div>
            @if(($key > 0 && ($key+1) %4 === 0) || $key +1 ===count($products))
                </div>
            </div>
            @endif
        @endforeach
        
        
        <div class="row">
            <div class="blogpanigation">
                <div class="col-md-12 col-sm-12 col-xs-12">
<!--                     <ul>
                        <li class="prev"><a href="#">prev</a></li>
                        <li class="num"><a href="#">1</a></li>
                        <li class="num active"><a href="#">2</a></li>
                        <li class="num"><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li class="num2"><a href="#">13</a></li>
                        <li class="num2"><a href="#">14</a></li>
                        <li class="next"><a href="#">next</a></li>
                    </ul> -->
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<hr>

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-sec">
                    <h1>@lang('header.blogs')</h1>
                </div>
            </div>
        </div>      
        <div class="row">

            <div class="left">
                @if(!empty($search_key) && count($posts)==0)
                    @lang('common.zero-search-message')&nbsp;{{$search_key}}
                @endif 
            </div>

            @if(!empty($search_key) && count($posts)!=0)
            @foreach($posts as $post_tran)
            @if($post_tran->post->published)
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="blog-it-left">
                    <a href="{{url('/posts')}}/{{$post_tran->post->slug}}">
                        <img class="blog-img" src="{{asset('/storage/images/blog/')}}/{{$post_tran->post->img}}" alt="">
                    </a>
                    <div class="blog-ct-left">
                        <div class="date">
                            <span>{!! date('F jS, Y', strtotime($post_tran->post->updated_at)) !!}</span>
                        </div>
                        <h2><a href="{{url('/posts')}}/{{$post_tran->post->slug}}"> {{ $post_tran->title??'' }} </a></h2>
                        <p> {{ $post_tran->excerpt??'' }} </p>
                        <a class="readmore2" href="{{url('/posts')}}/{{$post_tran->post->slug}}">/ &nbsp; @lang('common.more-details')</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif
        </div>

        <div class="row">
            <div class="blogpanigation">
                <div class="col-md-12 col-sm-12 col-xs-12">
<!--                     <ul>
                        <li class="prev"><a href="#">prev</a></li>
                        <li class="num"><a href="#">1</a></li>
                        <li class="num active"><a href="#">2</a></li>
                        <li class="num"><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li class="num2"><a href="#">13</a></li>
                        <li class="num2"><a href="#">14</a></li>
                        <li class="next"><a href="#">next</a></li>
                    </ul> -->
                    {{ $posts->links() }}
                </div>
            </div>
        </div>    
    </div>
</div>

@endsection
