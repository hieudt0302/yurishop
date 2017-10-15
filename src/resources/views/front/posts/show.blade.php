@extends('layouts.master')
@section('title', $post->title) 
@section('header')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')
<!-- Head Section -->
<section class="small-section bg-gray-lighter pt-30 pb-30">
    <div class="relative container align-left">

        <div class="row">

            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">@lang('header.blog')</h1>
            </div>

            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="#">@lang('header.home')</a>&nbsp;/&nbsp;<a href="#">@lang('header.blog')</a>
                </div>

            </div>
        </div>

    </div>
</section>
<!-- End Head Section -->


<!-- Section -->
<section class="page-section">
    <div class="container relative">

        <div class="row">

            <!-- Content -->
            <div class="col-sm-8">

                <!-- Post -->
                <div class="blog-item mb-80 mb-xs-40">

                    <!-- Text -->
                    <div class="blog-item-body">

                        <h1 class="mt-0 font-alt">{{$post->translation->title}}</h1>
                        <div class="lead">
                            <p>
                                {{$post->author->last_name}} {{$post->author->first_name}} | {{ date('d-m-Y', strtotime($post->created_at)) }} | <a href="{{url('/menu')}}/{{$post_category->slug}}/{{$post->category->slug}}">{{$post->category->translation->name}}</a>
                            </p>
                        </div>
                        <hr>
                        <!-- End Text -->

                        <!-- Media Gallery -->
                        <div class="blog-media mt-40 mb-40 mb-xs-30">
                            <a href="#"><img src="{{ asset('images/blog/' . $post->img) }}" alt="" /></a>      
                        </div>

                        <!-- End Text -->
                          
                        <!-- This is contnet of the post -->
                        <!-- TODO: Render html -->
                        {!! $post->translation->content !!}
                    </div>
                    <!-- End Text -->
                </div>
                <!-- End Post -->

                <!-- Comments -->
                <div class="mb-80 mb-xs-40">
                    <h4 class="blog-page-title font-alt">{{ __('blog.comment') }}<small class="number">({{count($post->comments)}})</small></h4>

                    <ul class="media-list text comment-list clearlist">
                        <!-- Comment Item -->
                        @foreach($post->comments as  $comment)
                        <li class="media comment-item">
                            <a class="pull-left" href="#"><img class="media-object comment-avatar" src="{{asset('images/user-avatar.png')}}" alt="" width="50" height="50"></a>
                            <div class="media-body">
                                <div class="comment-item-data">
                                    <div class="comment-author">
                                        <a href="#">{{$comment->name}}</a>
                                    </div>
                                    {{$comment->created_at}}<span class="separator">&mdash;</span>
                                    <a href="#"><i class="fa fa-comment"></i>&nbsp;Reply</a>
                                </div>

                                <p>
                                    {{$comment->comment}}
                                </p>

                                <!-- Comment of second level -->
                                <!-- TODO: Make second level -->
                                <!-- <div class="media comment-item">

                                    <a class="pull-left" href="#"><img class="media-object comment-avatar" src="images/user-avatar.png" alt=""></a>

                                    <div class="media-body">

                                        <div class="comment-item-data">
                                            <div class="comment-author">
                                                <a href="#">Sam Brin</a>
                                            </div>
                                            Feb 9, 2014, at 10:27<span class="separator">&mdash;</span>
                                            <a href="#"><i class="fa fa-comment"></i>&nbsp;Reply</a>
                                        </div>

                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.
                                        </p>


                                    </div>

                                </div> -->
                                <!-- End Comment of second level -->
                            </div>
                        </li>
                        @endforeach
                        <!-- End Comment Item -->
                    </ul>

                </div>
                <!-- End Comments -->


                <!-- Add Comment -->
                <div class="mb-80 mb-xs-40">

                    <h4 class="blog-page-title font-alt">@lang('blog.leave-a-comment')</h4>

                    <!-- Form -->
                    <form method="post" action="{{url('/posts')}}/{{$post->slug}}/comment" id="form" role="form" class="form">
                        {{ csrf_field() }}
                        <input type="hidden" id="post_slug" name="post_slug" value="{{$post->slug}}">
                        @guest
                        <div class="row mb-20 mb-md-10">
                            <div class="col-md-6 mb-md-10">
                                <!-- Name -->
                                <input type="name" name="name" id="name" class="input-md form-control" placeholder="{{ __('blog.name') }} *" maxlength="100" required>
                            </div>

                            <div class="col-md-6 ">
                                <!-- Email -->
                                <input type="email" name="email" id="email" class="input-md form-control" placeholder="{{ __('blog.email') }} *" maxlength="100" required>
                            </div>

                        </div>
                        @else
                            <input type="hidden" id="reader_id" name="reader_id" value="{{Auth::user()->id}}">
                            <input type="hidden" id="name" name="name" value="{{Auth::user()->last_name}} {{Auth::user()->first_name}}">
                            <input type="hidden" id="email" name="email" value="{{Auth::user()->email}}">
                        @endguest
                        <div class="mb-20 mb-md-10">
                            <!-- Website -->
                            <input type="website" name="website" id="website" class="input-md form-control" placeholder="Website" maxlength="100" >
                        </div>

                        <!-- Comment -->
                        <div class="mb-30 mb-md-10">
                            <textarea name="comment" id="text" class="input-md form-control" rows="6" placeholder="{{ __('blog.comment') }}" maxlength="400"></textarea>
                        </div>

                        <!-- Send Button -->
                        <button type="submit" class="btn btn-mod btn-medium btn-round btn-round">
                            @lang('blog.send-comment')
                        </button>

                    </form>
                    <!-- End Form -->

                </div>
                <!-- End Add Comment -->

            </div>
            <!-- End Content -->

            <!-- Sidebar -->
            <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">

                <!-- Search Widget -->
                <div class="widget">
                    {!! Form::open(array('method'=>'post','url' => '/posts','class'=>'form-inline form','role'=>'form')) !!}
                        <div class="search-wrap">
                            <button class="search-button animate" type="submit" title="Start Search">
                                <i class="fa fa-search"></i>
                            </button>
                            <input type="text" class="form-control search-field" name="key" placeholder="{{ __('common.search') }}">                        
                        </div>
                    {!! Form::close() !!}
                </div>
                <!-- End Search Widget -->

                <!-- Widget -->
                <div class="widget">

                    <h5 class="widget-title font-alt">@lang('common.categories')</h5>

                    <div class="widget-body">
                        <ul class="clearlist widget-menu">
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

                </div>
                <!-- End Widget -->

                <!-- Widget -->
                <div class="widget">

                    <h5 class="widget-title font-alt">Tags</h5>

                    <div class="widget-body">
                        <div class="tags">
                            <a href="">Design</a>
                            <a href="">Portfolio</a>
                            <a href="">Digital</a>
                            <a href="">Branding</a>
                            <a href="">Theme</a>
                            <a href="">Clean</a>
                            <a href="">UI & UX</a>
                            <a href="">Love</a>
                        </div>
                    </div>

                </div>
                <!-- End Widget -->

                <!-- Widget -->
                <div class="widget">

                    <h5 class="widget-title font-alt">@lang('blog.last-posts')</h5>

                    <div class="widget-body">
                        <ul class="clearlist widget-posts">
                            @foreach($last_posts as $post)
                            <li class="clearfix">
                                <a href=""><img src="{{ asset('images/blog/preview/' . $post->img) }}" alt="" class="widget-posts-img" /></a>
                                <div class="widget-posts-descr">
                                    <a href="{{url('/posts')}}/{{$post->slug}}" title="">{{$post->translation->title}}</a> @lang('blog.posted-by') {{$post->author->last_name}} {{$post->author->first_name}} {{ date('F d, Y', strtotime($post->created_at)) }}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Widget -->

            </div>
            <!-- End Sidebar -->
        </div>

    </div>
</section>
<!-- End Section -->
@endsection