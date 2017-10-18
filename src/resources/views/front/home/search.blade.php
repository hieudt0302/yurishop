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
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="left-it">
                    <h5>Showing <span class="sub">1-12 of 134</span> results</h5>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="right-it">
                </div>
            </div>
        </div>
        @foreach($products as $key => $product)
            @if($key == 0 || $key%4 === 0)
            <div class="row">
                <div class="products-it">
            @endif                    
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="pro-it">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <img class="pro-img" src="frontend/images/uploads/p1.jpg" alt="">
                            <div class="pro-infor">
                                <h2>{{$product->translation->name??$product->name}}</h2>
                                <span class="pro-cost">{{$product->price}}</span>
                            </div>
                            <div class="hover-inner">   
                                <a class="search" href="{{url('/products')}}/{{$product->slug}}" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-search" aria-hidden="true"></i></a>
                                <a class="cart" href="{{url('/products')}}/{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                <a class="wishlist" href="#"  data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>
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
                    <ul>
                        <li class="prev"><a href="#">prev</a></li>
                        <li class="num"><a href="#">1</a></li>
                        <li class="num active"><a href="#">2</a></li>
                        <li class="num"><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li class="num2"><a href="#">13</a></li>
                        <li class="num2"><a href="#">14</a></li>
                        <li class="next"><a href="#">next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

    <hr>

<section class="bloglistpost-v1 bloglistpost-v2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="left-it">
                    <h5>Showing <span class="sub">1-12 of 134</span> results</h5>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="right-it">
                </div>
            </div>
        </div>        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="left">
                    @if(!empty($search_key) && count($posts)==0)
                        @lang('common.zero-search-message')&nbsp;{{$search_key}}
                    @endif 
                </div>

                <!-- Post -->
                @foreach($posts as $post_tran)
                @if($post_tran->post->published==1)
                <div class="blogpost-v1">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="video2">
                                <img src="{{asset('/storage/images/blog/')}}/{{$post_tran->post->img}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="blog-it-content">
                                <div class="date">
                                    <span>@lang('blog.posted-by') {{$post_tran->post->author->last_name}} {{$post_tran->post->author->first_name}}, {{ date('d-m-Y', strtotime($post_tran->post->created_at)) }}</span>
                                </div>                                
                                <h2><a href="{{url('/')}}/posts/{{$post_tran->post->slug}}">{{$post_tran->title}}</a></h2>
                                <p>{{$post_tran->excerpt}} </p>
                                <div class="sub-button">
                                    <a class="readmore" href="{{url('/')}}/posts/{{$post_tran->post->slug}}">@lang('common.read-more')</a>
                                </div>                                                          
                            </div>
                        </div>
                    </div>
                </div>
                </br></br>
                @endif
                @endforeach
                <!-- End Post -->            
                
            </div>
        </div>
    </div>
</section>

@endsection
