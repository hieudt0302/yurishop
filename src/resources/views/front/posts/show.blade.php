@extends('layouts.master')
@section('title', $post->title) 
@section('header')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')
<section class="blogsingle">
    <img class="blog-img" src="images/uploads/blogsingle.png" alt="">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="blogsingle-content">
                    <div class="date">
                        <span>@lang('blog.posted-by') {{$post->author->last_name}} {{$post->author->first_name}}, {{ date('d-m-Y', strtotime($post->created_at)) }}</span>
                    </div>
                    <h1>{{$post->translation->title}} </h1>
                    <p class="quote">{{$post->translation->excerpt}}</p>
                    

                    <!-- Post content -->
                    {!! $post->translation->content !!}
                    <!-- End post content -->
                    <br><br>
                    <!-- tags -->
                    <div class="tags">
                        <i class="fa fa-tag" aria-hidden="true"></i>
                        <a href="#">fruits</a>, <a href="#">vegetables</a>, <a href="#">oganic store</a>
                        <span class="share"><a href="#"><i class="fa fa-share-alt" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Share"></i>Share this post</a></span>
                    </div>
                    <hr>

                    <!-- comment -->
                    <div class="comment">
                        <h2 class="cmt-heading">{{ __('blog.comment') }}<span>({{count($post->comments)}})</span></h2>
                        @foreach($post->comments as  $comment)
                        <div class="cmt-it">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="images/uploads/cmt1.png" alt="">
                                </div>
                                <div class="col-md-10">
                                    <div class="cmt-content">
                                        <h4><a href="#">{{$comment->name}}</a><li class="date">{{$comment->created_at}}</li></h4>
                                        <p>{{$comment->comment}}</p>
                                        <a class="reply" href="#"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr>
                    <!-- comment form -->
                    <form class="post-cmt" method="post" action="{{url('/posts')}}/{{$post->slug}}/comment" id="form" role="form">
                        <label>@lang('blog.leave-a-comment')</label>
                            {{ csrf_field() }}
                            <div class="row">
                                @guest
                                <div class="col-md-6">
                                    <input class="name" type="text" placeholder="{{ __('blog.name') }} *">
                                </div>
                                <div class="col-md-6">
                                    <input class="email" type="text" placeholder="{{ __('blog.email') }} *">
                                </div>
                                @else
                                    <input type="hidden" id="reader_id" name="reader_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" id="name" name="name" value="{{Auth::user()->last_name}} {{Auth::user()->first_name}}">
                                    <input type="hidden" id="email" name="email" value="{{Auth::user()->email}}">
                                @endguest                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input  name="comment" class="comt" type="textarea" placeholder="{{ __('blog.comment') }}*">
                                </div>
                            </div>
                            <input class="submit" type="submit" value="{{ __('blog.send-comment') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection