@extends('layouts.master')
@section('title',$seo_title)
@section('content')
   
<div class="container blog">
    <div class="col-md-8 blog-wrapper">
        <div class="row">
            <div class="blog-header">
                Ngày đăng : {!! date("d-m-Y",strtotime($blog->create_time)) !!}
                - Lượt xem : {{ $blog->views }}
            </div>
            <h3 class="blog-title">{{ $blog->title }}</h3>
            <p class="blog-content">{!! $blog->content !!}</p>
        </div>
        <div class="row social">
            <div class="addthis_toolbox addthis_default_style " style="margin:10px 0;">
                <a class="addthis_button_facebook_like at300b" fb:like:layout="button_count"></a>
                <a class="addthis_button_google_plusone at300b" g:plusone:size="medium"></a>
                <a class="addthis_button_preferred_1"></a>
                <a class="addthis_button_preferred_2"></a>
                <a class="addthis_button_preferred_3"></a>
                <a class="addthis_button_preferred_4"></a>
                <a href="#" class="addthis_button_compact at300m"></a>
                <a class="addthis_counter addthis_bubble_style"></a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row top-new">
            <span class="subject">Mới nhất</span>
            <ul>
                @foreach ($top_new_blogs as $newBlog)
                <?php $blogSeo = \DB::table('seo')->where('system_id',$newBlog->system_id)->first(); ?>
                <li>
                    <div class="col-md-3 blog-thumb">
                        <a href="{{ route('front.item.show',$blogSeo->slug) }}" title="{{ $newBlog->title }}">
                            <img src="{{ asset('public/assets/img/blog/' . $newBlog->thumb) }}" alt="{{ $newBlog->title }}" />
                        </a>
                    </div>
                    <div class="col-md-9 blog-detail">
                        <a href="{{ route('front.item.show',$blogSeo->slug) }}" title="{{ $newBlog->title }}">
                            <span class="blog-title">{{ $newBlog->title }}</span>
                        </a>
                        <div class="blog-info">
                            <i class="fa fa-clock-o"></i>{!! date("d-m-Y",strtotime($newBlog->create_time)) !!}
                        </div>
                        <div class="blog-info">
                            <i class="fa fa-eye"></i>{{ $newBlog->views }}
                        </div>
                    </div>
                </li>   
                @endforeach
            </ul>
        </div>
        <div class="row top-view">
            <span class="subject">Xem nhiều nhất</span>
            <ul>
                @foreach ($top_view_blogs as $viewBlog)
                <?php $blogSeo = \DB::table('seo')->where('system_id',$viewBlog->system_id)->first(); ?>
                <li>
                    <div class="col-md-3 blog-thumb">
                        <a href="{{ route('front.item.show',$blogSeo->slug) }}" title="{{ $viewBlog->title }}">
                            <img src="{{ asset('public/assets/img/blog/' . $viewBlog->thumb) }}" alt="{{ $viewBlog->title }}" />
                        </a>
                    </div>
                    <div class="col-md-9 blog-detail">
                        <a href="{{ route('front.item.show',$blogSeo->slug) }}" title="{{ $viewBlog->title }}">
                            <span class="blog-title">{{ $viewBlog->title }}</span>
                        </a>
                        <div class="blog-info">
                            <i class="fa fa-eye"></i>{{ $viewBlog->views }}
                        </div>
                        <div class="blog-info">
                            <i class="fa fa-clock-o"></i>{!! date("d-m-Y",strtotime($viewBlog->create_time)) !!}
                        </div>
                    </div>
                </li>   
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e677888203d659a"></script>
@endsection
