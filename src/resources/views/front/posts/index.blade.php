@extends('layouts.master')
@section('title','Poko Farms - Post') 
@section('header')
<!-- Share Nav -->
@include('layouts.share')
@endsection
@section('content')

<section class="page-header mb-lg">

    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>

            <li class="active">Blog</li>
        </ul>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="toolbar">
            </div>

            <div class="blog-posts">
                @foreach($posts as $post)
                <article class="post post-large">
                    <div class="post-image">
                        <div class="owl-carousel owl-theme" data-plugin-options="{'items':1}">
                            <div>
                                <div class="img-thumbnail">
                                    <img class="img-responsive" src="{{asset('/storage/images/blog/')}}/{{$post->img}}" alt="Post">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="post-date">
                        <span class="day">{{ date('d', strtotime($post->created_at)) }}</span>
                        <span class="month">{{ date('m', strtotime($post->created_at)) }}</span>
                    </div>

                    <div class="post-content">

                        <h2><a href="{{url('/')}}/posts/{{$post->slug}}">{{$post->translation->title}}</a></h2>
                        <p>{{$post->translation->excerpt??""}}</p>

                        <a href="{{url('/')}}/posts/{{$post->slug}}" class="btn btn-xs btn-link">Đọc thêm</a>

                        <div class="post-meta">
                            <span><i class="fa fa-user"></i> Đăng bởi <a href="#">{{$post->author->first_name}}</a> </span>
                            <span><i class="fa fa-tag"></i>
                                @foreach($post->tags as $tag)
                                <a href="{{url('/subject/posts/tags')}}/{{$tag->slug}}">{{$tag->name}}</a>&nbsp; 
                                @endforeach                                
                            </span>
                        </div>

                    </div>
                </article>
                @endforeach
            </div>

            <div class="toolbar">
                <div class="sorter">
                    <ul class="pagination">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <aside class="sidebar">

                <h4>Danh mục blog</h4>
                <ul class="nav nav-list">
                    @foreach($categories as $category)
                    <li><a href="{{url('/subject')}}/{{$post_category->slug}}/{{$category->slug}}">{{$category->translation->name}}</a></li>
                    @endforeach
                </ul>

                <h4>Bài viết gần đây</h4>
                <ul class="simple-post-list">
                    @foreach($lastPosts as $post)
                    <li>
                        <div class="post-image">
                            <div class="img-thumbnail">
                                <a href="{{url('/posts')}}/{{$post->slug}}">
                                    <img src="{{asset('/storage/images/blog/preview/')}}/{{$post->img}}" alt="Post">
                                </a>
                            </div>
                        </div>
                        <div class="post-info">
                            <a href="{{url('/posts')}}/{{$post->slug}}">{{$post->translation->title}}</a>
                            <div class="post-meta">
                                {{$post->author->first_name}} | {{ date('d-m-Y', strtotime($post->created_at)) }}
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>

                <h4>Tags</h4>
                <div class="tagcloud">
                    @foreach($tags as $tag)
                    <a href="{{url('/subject/posts/tags')}}/{{$tag->slug}}">{{$tag->name}}</a>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>
</div>    
@endsection