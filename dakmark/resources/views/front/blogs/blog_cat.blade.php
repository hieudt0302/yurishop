
@extends('layouts.master')
@section('title',$seo_title)
@section('content')
     <!-- Head Section -->
    <section class="small-section bg-gray-lighter">
        <div class="relative container align-left">
            
            <div class="row">
                
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Blog</h1>
                    <div class="hs-line-4 font-alt black">
                        We share our best ideas in our blog
                    </div>
                </div>
                
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="#">Home</a>&nbsp;/&nbsp;<a href="#">Blog</a>&nbsp;/&nbsp;<span>{{ $blogCat->name }}</span>
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
                    
                    <div class="row multi-columns-row">
                
                        @foreach($blogs as $blog)
                        <?php $blogSeo = \DB::table('seo')->where('system_id', $blog->system_id)->first(); ?>                
                        <!-- Post Item -->
                        <div class="col-md-6 col-lg-6 mb-60 mb-xs-40">
                            
                            <div class="post-prev-img">
                                <a href="{{ route('front.item.show',$blogSeo->slug) }}"><img src="{{ asset('public/assets/img/blog/' . $blog->thumb) }}" alt="" /></a>
                            </div>
                            
                            <div class="post-prev-title font-alt">
                                <a href="{{ route('front.item.show',$blogSeo->slug) }}">{{ $blog->title }}</a>
                            </div>
                            
                            <div class="post-prev-info font-alt">
                                <a href="">John Doe</a> | {!! date("d-m-Y",strtotime($blog->create_time)) !!} | <i class="fa fa-eye"></i>{{ $blog->views }}
                            </div>
                            
                            <div class="post-prev-text">
                                @if($blog->introduce != '')
                                    {{ truncate($blog->introduce,300) }}
                                @endif
                            </div>
                            
                            <div class="post-prev-more">
                                <a href="{{ route('front.item.show',$blogSeo->slug) }}" class="btn btn-mod btn-gray btn-round">@lang('blog.read-more') <i class="fa fa-angle-right"></i></a>
                            </div>
                            
                        </div>
                        <!-- End Post Item -->
                        @endforeach
                        
                    </div>
                    
                    <!-- Pagination -->
                    <div class="pagination">
                        <a href=""><i class="fa fa-angle-left"></i></a>
                        <a href="" class="active">1</a>
                        <a href="">2</a>
                        <a href="">3</a>
                        <a class="no-active">...</a>
                        <a href="">9</a>
                        <a href=""><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!-- End Pagination -->
                    
                </div>
                <!-- End Content -->
                
                <!-- Sidebar -->
                <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
                    
                    <!-- Search Widget -->
                    <div class="widget">
                        <form class="form-inline form" role="form">
                            <div class="search-wrap">
                                <button class="search-button animate" type="submit" title="Start Search">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" class="form-control search-field" placeholder="Search...">
                            </div>
                        </form>
                    </div>
                    <!-- End Search Widget -->
                    
                    <!-- Widget -->
                    <div class="widget">
                        
                        <h5 class="widget-title font-alt">Categories</h5>
                        
                        <div class="widget-body">
                            <ul class="clearlist widget-menu">
                                <li>
                                    <a href="#" title="">Branding</a>
                                    <small>
                                        - 7
                                    </small>
                                </li>
                                <li>
                                    <a href="#" title="">Design</a>
                                    <small>
                                        - 15
                                    </small>
                                </li>
                                <li>
                                    <a href="#" title="">Development</a>
                                    <small>
                                        - 3
                                    </small>
                                </li>
                                <li>
                                    <a href="#" title="">Photography</a>
                                    <small>
                                        - 5
                                    </small>
                                </li>
                                <li>
                                    <a href="#" title="">Other</a>
                                    <small>
                                        - 1
                                    </small>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- End Widget -->
                    
                    <!-- Widget -->
                    <div class="widget">
                        
                        <h5 class="widget-title font-alt">@lang('blog.last-posts')</h5>
                        
                        <div class="widget-body">
                            <ul class="clearlist widget-posts">

                                @foreach($blogs as $blog)
                                <?php $blogSeo = \DB::table('seo')->where('system_id', $blog->system_id)->first(); ?>    
                                <li class="clearfix">
                                    <a href=""><img src="images/blog/previews/post-prev-1.jpg" alt="" class="widget-posts-img" /></a>
                                    <div class="widget-posts-descr">
                                        <a href="#" title="">{{$blog->title}}</a>
                                        Posted by John Doe on {!! date("d-m-Y",strtotime($blog->create_time)) !!} 
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        
                    </div>
                    <!-- End Widget -->
                    
                    <!-- Widget -->
                    <div class="widget">
                        
                        <h5 class="widget-title font-alt">Archive</h5>
                        
                        <div class="widget-body">
                            <ul class="clearlist widget-menu">
                                <li>
                                    <a href="#" title="">February 2014</a>
                                </li>
                                <li>
                                    <a href="#" title="">January 2014</a>
                                </li>
                                <li>
                                    <a href="#" title="">December 2013</a>
                                </li>
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