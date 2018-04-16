@extends('layouts.master')
@section('title', $post->title) 
@section('header')
<!-- Share Nav -->
@include('layouts.share')
@endsection
@section('content')

<section class="page-header mb-lg">

    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>

            <li><a href="#">Blog</a></li>
            <li class="active">{{$post->translation->title??$post->title}}</li>
        </ul>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="blog-posts single-post">

                <article class="post post-large blog-single-post">

                    <div class="post-date">
                        <span class="day">{{ date('d', strtotime($post->created_at)) }}</span>
                        <span class="month">{{ date('m', strtotime($post->created_at)) }}</span>
                    </div>

                    <div class="post-content">

                        <h2><a href="#">{{$post->translation->title??$post->title}}</a></h2>

                        <div class="post-meta">
                            <span><i class="fa fa-user"></i> Đăng bởi <a href="#">{{$post->author->first_name}}</a> </span>
                            <span><i class="fa fa-tag"></i>
                                @foreach($post->tags as $tag)
                                <a href="{{url('/subject/posts/tags')}}/{{$tag->slug}}">{{$tag->name}}</a>&nbsp;  
                                @endforeach
                             </span>
                            <span><i class="fa fa-comments"></i> <a href="#">{{count($post->comments)}} Đánh giá</a></span>
                        </div>

                        {!! $post->translation->content??'' !!}
                        
                        <div class="post-block post-share">
                            <h3 class="h4 heading-primary"><i class="fa fa-share"></i>Chia sẻ bài viết</h3>

                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style ">
                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
                            <!-- AddThis Button END -->

                        </div>

                    </div>
                </article>

            </div>
        </div>

        <div class="col-md-3">
            <aside class="sidebar">

                <h4>Danh mục blog</h4>
                <ul class="nav nav-list">
                    @foreach($categories as $category)
                    <li><a href="{{url('/menu')}}/{{$post_category->slug}}/{{$category->slug}}">{{$category->translation->name}}</a></li>
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