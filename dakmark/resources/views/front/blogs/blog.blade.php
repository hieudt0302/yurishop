@extends('layouts.master')
@section('title',$seo_title)
@section('content')
   
    <!-- Head Section -->
    <section class="small-section bg-gray-lighter">
        <div class="relative container align-left">
            
            <div class="row">
                
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">@lang('header.blog')</h1>
                    <div class="hs-line-4 font-alt black">
                        We share our best ideas in our blog
                    </div>
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
                            
                            <h1 class="mt-0 font-alt">{{ $blog->title }}</h1>
                        
                            {!! $blog->content !!}
                              
                        </div>
                        <!-- End Text -->
                        
                    </div>
                    <!-- End Post -->
                
                    <!-- Comments -->
                    <div class="mb-80 mb-xs-40">
                        
                        <h4 class="blog-page-title font-alt">{{ __('blog.comment') }}<small class="number">(3)</small></h4>
                        
                        <ul class="media-list text comment-list clearlist">
                            
                            <!-- Comment Item -->
                            <li class="media comment-item">
                                
                                <a class="pull-left" href="#"><img class="media-object comment-avatar" src="images/user-avatar.png" alt="" width="50" height="50"></a>
                                
                                <div class="media-body">
                                    
                                    <div class="comment-item-data">
                                        <div class="comment-author">
                                            <a href="#">John Doe</a>
                                        </div>
                                        Feb 9, 2014, at 10:23<span class="separator">&mdash;</span>
                                        <a href="#"><i class="fa fa-comment"></i>&nbsp;Reply</a>
                                    </div>
                                    
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.
                                    </p>
                                    
                                    <!-- Comment of second level -->
                                    <div class="media comment-item">
                                        
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
                                        
                                    </div>
                                    <!-- End Comment of second level -->
                                    
                                </div>
                                
                            </li>
                            <!-- End Comment Item -->
                            
                            <!-- Comment Item -->
                            <li class="media comment-item">
                                
                                <a class="pull-left" href="#"><img class="media-object comment-avatar" src="images/user-avatar.png" alt=""></a>
                                
                                <div class="media-body">
                                    
                                    <div class="comment-item-data">
                                        <div class="comment-author">
                                            <a href="#">Emma Johnson</a>
                                        </div>
                                        Feb 9, 2014, at 10:37<span class="separator">&mdash;</span>
                                        <a href="#"><i class="fa fa-comment"></i>&nbsp;Reply</a>
                                    </div>
                                    
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.
                                    </p>
                                    
                                </div>
                                
                            </li>
                            <!-- End Comment Item -->
                            
                            <!-- Comment Item -->
                            <li class="media comment-item">
                                
                                <a class="pull-left" href="#"><img class="media-object comment-avatar" src="images/user-avatar.png" alt=""></a>
                                
                                <div class="media-body">
                                    
                                    <div class="comment-item-data">
                                        <div class="comment-author">
                                            <a href="#">John Doe</a>
                                        </div>
                                        Feb 9, 2014, at 10:3<span class="separator">&mdash;</span>
                                        <a href="#"><i class="fa fa-comment"></i>&nbsp;Reply</a>
                                    </div>
                                    
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.
                                    </p>
                                    
                                </div>
                                
                            </li>
                            <!-- End Comment Item -->
                            
                        </ul>
                        
                    </div>
                    <!-- End Comments -->
                    
                    
                    <!-- Add Comment -->
                    <div class="mb-80 mb-xs-40">
                        
                        <h4 class="blog-page-title font-alt">{{ __('blog.leave-a-comment') }}t</h4>
                        
                        <!-- Form -->
                        <form method="post" action="#" id="form" role="form" class="form">
                            
                            <div class="row mb-20 mb-md-10">
                                
                                <div class="col-md-6 mb-md-10">
                                    <!-- Name -->
                                    <input type="text" name="name" id="name" class="input-md form-control" placeholder="{{ __('blog.name') }} *" maxlength="100" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <!-- Email -->
                                    <input type="email" name="email" id="email" class="input-md form-control" placeholder="{{ __('blog.email') }} *" maxlength="100" required>
                                </div>
                                
                            </div>
                            
                            <!-- Comment -->
                            <div class="mb-30 mb-md-10">
                                <textarea name="text" id="text" class="input-md form-control" rows="6" placeholder="{{ __('blog.comment') }} *" maxlength="400" required></textarea>
                            </div>
                            
                            <!-- Send Button -->
                            <button type="submit" class="btn btn-mod btn-medium btn-round btn-round">
                                {{ __('blog.send-comment') }}
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
                        <form class="form-inline form" role="form">
                            <div class="search-wrap">
                                <button class="search-button animate" type="submit" title="Start Search">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" class="form-control search-field" placeholder="{{ __('common.search') }}">
                            </div>
                        </form>
                    </div>
                    <!-- End Search Widget -->
                    
                    <!-- Widget -->
                    <div class="widget">
                        
                        <h5 class="widget-title font-alt">@lang('common.categories')</h5>
                        
                        <div class="widget-body">
                            <ul class="clearlist widget-menu">
                               <?php 
                                    $blogCats = \DB::table('blog_cat')->where('parent_id', 0)->where('is_show',1)->orderBy('sort_order', 'asc')->get();
                                ?>
                                @if(!empty($blogCats))                                
                                <!-- Sub -->
                                    
                                    @foreach ($blogCats as $bCat)
                                    <?php $bCatSeo = \DB::table('seo')->where('system_id', $bCat->system_id)->first(); ?>                                    
                                    <li>
                                        <a href="{{ route('front.item.show',$bCatSeo->slug) }}" title="{{ $bCat->name }}">
                                            {{ $bCat->name }}
                                        </a> 
                                        <small>
                                            - 5
                                        </small>                                        
                                    </li>
                                    @endforeach
                                    
                                <!-- End Sub -->
                                @endif
                            </ul>
                        </div>
                        
                    </div>
                    <!-- End Widget -->
                    
                    <!-- Widget -->
                    <div class="widget">
                        
                        <h5 class="widget-title font-alt">@lang('blog.last-posts')</h5>
                        
                        <div class="widget-body">
                            <ul class="clearlist widget-posts">

                                @foreach($top_new_blogs as $blog)
                                <?php $blogSeo = \DB::table('seo')->where('system_id', $blog->system_id)->first(); ?>    
                                <li class="clearfix">
                                    <a href=""><img src="images/blog/previews/post-prev-1.jpg" alt="" class="widget-posts-img" /></a>
                                    <div class="widget-posts-descr">
                                        <a href="#" title="">{{$blog->title}}</a>
                                        @lang('blog.posted-on') {!! date("d-m-Y",strtotime($blog->create_time)) !!} 
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        
                    </div>
                    <!-- End Widget -->

                    <!-- Widget -->
                    <div class="widget">
                        
                        <h5 class="widget-title font-alt">@lang('blog.most-viewed-posts')</h5>
                        
                        <div class="widget-body">
                            <ul class="clearlist widget-posts">

                                @foreach($top_view_blogs as $blog)
                                <?php $blogSeo = \DB::table('seo')->where('system_id', $blog->system_id)->first(); ?>    
                                <li class="clearfix">
                                    <a href=""><img src="images/blog/previews/post-prev-1.jpg" alt="" class="widget-posts-img" /></a>
                                    <div class="widget-posts-descr">
                                        <a href="#" title="">{{$blog->title}}</a>
                                        @lang('blog.posted-on') {!! date("d-m-Y",strtotime($blog->create_time)) !!} 
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

<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e677888203d659a"></script>
@endsection
