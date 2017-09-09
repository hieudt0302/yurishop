
@extends('layouts.master')
@section('title',$seo_title)
@section('content')

<div class="container blog-cat">
    <div class="row cat-name">
        <span>{{ $blogCat->name }}</span>
    </div>
    <div class="row">
            @foreach($blogs as $blog)
            <?php $blogSeo = \DB::table('seo')->where('system_id', $blog->system_id)->first(); ?>
            <div class="col-md-4 col-sm-6 col-xs-12 blog-single">
                <div class="col-md-4">
                    <a href="{{ route('front.item.show',$blogSeo->slug) }}" title="{{ $blog->title }}" class="blog-url">
                        <img class="blog-thumb" src="{{ asset('public/assets/img/blog/' . $blog->thumb) }}" alt="{{ $blog->title }}" />
                        @if($blog->introduce != '')
                        <div class="blog-intro">
                            {{ truncate($blog->introduce,300) }}
                        </div>
                        @endif
                    </a>
                </div>
                <div class="col-sm-8">
                    <a href="{{ route('front.item.show',$blogSeo->slug) }}" title="{{ $blog->title }}">
                        <span class="blog-title">{{ $blog->title }}</span>
                    </a>
                    <div class="blog-info"><i class="fa fa-clock-o"></i>{!! date("d-m-Y",strtotime($blog->create_time)) !!}</div>
                    <div class="blog-info"><i class="fa fa-eye"></i>{{ $blog->views }}</div>
                </div>
            </div>
            @endforeach
    </div>    
</div>

@endsection