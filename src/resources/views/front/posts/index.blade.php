@extends('layouts.master')
@section('title','Dakmark Foods - Post') 
@section('header')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')

<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>blog list 02</h1>
                <ul class="breadcumb">
                    <li><a href="#">Home</a></li>
                    <li><span>/</span>Blog list 02</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="bloglistpost-v1 bloglistpost-v2">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">

                <div class="left">
                    @if(!empty($search_key) && count($posts)==0)
                        @lang('common.zero-search-message')&nbsp;{{$search_key}}
                    @endif 
                </div>                

                <!-- Post -->
                @foreach($posts as $post)
                <div class="blogpost-v2">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="video2">
                                <img src="{{ asset('images/blog/' . $post->img) }}" alt="">
                                <a class="video-play2" href="{{url('/')}}/posts/{{$post->slug}}"><img  src="{{ asset('images/blog/' . $post->img) }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="blog-it-content2">
                                <div class="date">
                                    <span>@lang('blog.posted-by') {{$post->author->last_name}} {{$post->author->first_name}}, {{ date('d-m-Y', strtotime($post->created_at)) }}</span>
                                </div>                                
                                <h2><a href="{{url('/')}}/posts/{{$post->slug}}">{{$post->translation->title}}</a></h2>
                                <p>{{$post->translation->excerpt}} </p>
                                <a class="readmore2" href="{{url('/')}}/posts/{{$post->slug}}">/ &nbsp; Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
                <!-- End Post -->                
                
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="bg-sidebar">
                    <div class="search">

                        {!! Form::open(array('method'=>'post','url' => '/posts','class'=>'form-inline form','role'=>'form')) !!}
                            <div class="search-wrap">
                                <button class="search-button hidden" type="submit" title="Start Search">
                                    <i class="fa fa-search"></i>
                                </button>
                                @if(!empty($search_key))
                                    <input type="text" class="search-input" name="key" placeholder="{{$search_key}}">
                                    <i class="fa fa-search" aria-hidden="true"></i>                                                                
                                @else
                                    <input type="text" class="search-input" name="key" placeholder="{{ __('common.search') }}">
                                    <i class="fa fa-search" aria-hidden="true"></i>                                                               
                                @endif  
                            </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="categories">
                        <h1 class="cate-heading">@lang('common.categories')</h1>
                        <ul>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{url('/menu')}}/{{$post_category->slug}}/{{$category->slug}}" title="">{{$category->translation->name}}</a>
                                <small>
                                    - {{$category->postsCount}}
                                </small>
                            </li>
                            @endforeach                            
                        </ul>
                    </div>
                    <div class="pp-posts">
                        <h1 class="cate-heading">@lang('blog.last-posts')</h1>
                        @foreach($lastPosts as $post)                        
                        <div class="pp-post-it">
                            <img src="{{ asset('images/blog/preview/' . $post->img) }}" alt="post1">
                            <div class="pp-infor">
                                <div class="date">
                                    <span>@lang('blog.posted-by') {{$post->author->last_name}} {{$post->author->first_name}} {{ date('d-m-Y', strtotime($post->created_at)) }}</span>
                                </div>
                                <h5><a href="{{url('/posts')}}/{{$post->slug}}">{{$post->translation->title}}</a></h5>
                            </div>
                        </div>
                        @endforeach        
                    </div>
                    <div class="searchbytag">
                        <h1 class="cate-heading">Search by Tags</h1>
                        <ul class="tags">
                            <li><a href="galleryv1.html">coffee</a></li>
                            <li><a href="galleryv1.html">che</a></li>
                            <li><a href="galleryv1.html">green</a></li>
                            <li><a href="galleryv1.html">natural</a></li>
                            <li><a href="galleryv1.html">healthy</a></li>                            
                            @foreach($tags as $tag)
                            <li><a href="">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="blogpanigation">
    <div class="container">
        <div class="col-md-9">
            <ul>
                <li class="prev"><a href="#">prev</a></li>
                <li class="num active"><a href="#">1</a></li>
                <li class="num"><a href="#">2</a></li>
                <li class="num"><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li class="num2"><a href="#">13</a></li>
                <li class="num2"><a href="#">14</a></li>
                <li class="next"><a href="#">next</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- End Section -->
@endsection